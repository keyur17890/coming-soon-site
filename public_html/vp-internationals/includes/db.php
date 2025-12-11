<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - DATABASE CONNECTION & MANAGEMENT
 * ═══════════════════════════════════════════════════════════════
 *
 * Secure database connection handler with PDO.
 * Features connection pooling, retry logic, and query logging.
 *
 * @package     VPInternationals
 * @subpackage  Database
 * @author      VP Internationals
 * @copyright   2016-2025 VP Internationals
 * @license     Proprietary
 * @version     2.0.0
 *
 * IMPROVEMENTS IMPLEMENTED:
 * - Point 32: UTF8MB4 charset for emoji support
 * - Point 33: SET NAMES utf8mb4 after connection
 * - Point 34: PDO persistent connections for pooling
 * - Point 35: Transaction wrapper methods
 * - Point 36: Query logging for development
 * - Point 37: Slow query logging (>1 second)
 * - Point 38: Connection retry logic for resilience
 * - Point 39: Secure error messages (no sensitive info in production)
 * - Point 40: Connection health check method
 * ═══════════════════════════════════════════════════════════════
 */

// Prevent direct access
if (!defined('VP_ACCESS')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

/**
 * Database Connection Manager
 *
 * Singleton pattern implementation for database connections.
 * Provides secure, efficient database access with logging.
 */
class Database
{
    /**
     * @var PDO|null PDO connection instance
     */
    private static ?PDO $connection = null;

    /**
     * @var int Connection retry attempts
     */
    private static int $retryAttempts = 3;

    /**
     * @var int Retry delay in seconds
     */
    private static int $retryDelay = 1;

    /**
     * @var bool Whether query logging is enabled
     */
    private static bool $loggingEnabled = false;

    /**
     * @var float Slow query threshold in seconds
     */
    private static float $slowQueryThreshold = 1.0;

    /**
     * @var int Active transaction count (for nested transactions)
     */
    private static int $transactionCount = 0;

    /**
     * Get database connection (singleton pattern)
     *
     * @return PDO Database connection
     * @throws PDOException If connection fails after retries
     */
    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::connect();
        }

        return self::$connection;
    }

    /**
     * Establish database connection with retry logic (Point 38)
     *
     * @throws PDOException If connection fails after all retries
     */
    private static function connect(): void
    {
        $lastException = null;

        for ($attempt = 1; $attempt <= self::$retryAttempts; $attempt++) {
            try {
                self::createConnection();
                return; // Success
            } catch (PDOException $e) {
                $lastException = $e;

                // Log the failed attempt
                vp_log_error("Database connection attempt {$attempt} failed", 'warning', [
                    'error' => $e->getMessage()
                ]);

                // Don't sleep on the last attempt
                if ($attempt < self::$retryAttempts) {
                    sleep(self::$retryDelay);
                }
            }
        }

        // All retries failed
        vp_log_error('Database connection failed after all retries', 'error', [
            'attempts' => self::$retryAttempts
        ]);

        // Point 39: Don't expose sensitive info in production
        if (EnvLoader::isProduction()) {
            throw new PDOException('Database connection unavailable. Please try again later.');
        } else {
            throw $lastException;
        }
    }

    /**
     * Create the actual PDO connection
     *
     * @throws PDOException If connection fails
     */
    private static function createConnection(): void
    {
        // Build DSN with utf8mb4 charset (Point 32)
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_PORT,
            DB_NAME,
            DB_CHARSET // utf8mb4
        );

        // PDO options with persistent connections (Point 34)
        $options = [
            // Error handling
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

            // Return associative arrays by default
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

            // Use native prepared statements
            PDO::ATTR_EMULATE_PREPARES => false,

            // Point 34: Enable persistent connections for connection pooling
            PDO::ATTR_PERSISTENT => true,

            // Connection timeout
            PDO::ATTR_TIMEOUT => 5,

            // Set MySQL attributes
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci",
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
        ];

        // Create connection
        self::$connection = new PDO($dsn, DB_USER, DB_PASS, $options);

        // Point 33: Ensure UTF8MB4 encoding
        self::$connection->exec("SET NAMES utf8mb4");
        self::$connection->exec("SET CHARACTER SET utf8mb4");
        self::$connection->exec("SET character_set_connection=utf8mb4");

        // Set timezone to match PHP
        $timezone = date('P'); // e.g., +05:30
        self::$connection->exec("SET time_zone='{$timezone}'");

        // Set strict mode for better data integrity
        self::$connection->exec("SET sql_mode='STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");

        // Initialize logging settings
        self::$loggingEnabled = !EnvLoader::isProduction() || EnvLoader::isDebug();
        self::$slowQueryThreshold = EnvLoader::getFloat('SLOW_QUERY_THRESHOLD', 1.0);
    }

    /**
     * Point 40: Check database connection health
     *
     * @return bool True if connection is healthy
     */
    public static function isHealthy(): bool
    {
        try {
            $conn = self::getConnection();
            $stmt = $conn->query('SELECT 1');
            return $stmt->fetchColumn() === '1';
        } catch (PDOException $e) {
            vp_log_error('Database health check failed', 'error', [
                'error' => $e->getMessage()
            ]);
            return false;
        }
    }

    /**
     * Point 40: Get connection status details
     *
     * @return array Connection status information
     */
    public static function getStatus(): array
    {
        try {
            $conn = self::getConnection();

            return [
                'connected' => true,
                'server_version' => $conn->getAttribute(PDO::ATTR_SERVER_VERSION),
                'driver' => $conn->getAttribute(PDO::ATTR_DRIVER_NAME),
                'connection_status' => $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS),
                'server_info' => $conn->getAttribute(PDO::ATTR_SERVER_INFO),
            ];
        } catch (PDOException $e) {
            return [
                'connected' => false,
                'error' => EnvLoader::isProduction() ? 'Connection failed' : $e->getMessage()
            ];
        }
    }

    /**
     * Execute a query with logging (Points 36-37)
     *
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return PDOStatement Executed statement
     */
    public static function query(string $sql, array $params = []): PDOStatement
    {
        $conn = self::getConnection();

        $startTime = microtime(true);

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);

            $executionTime = microtime(true) - $startTime;

            // Point 36-37: Log query (and flag slow queries)
            if (self::$loggingEnabled) {
                vp_log_query($sql, $params, $executionTime);
            }

            return $stmt;
        } catch (PDOException $e) {
            $executionTime = microtime(true) - $startTime;

            // Log failed query
            vp_log_error('Query execution failed', 'error', [
                'query' => EnvLoader::isProduction() ? '[hidden]' : $sql,
                'execution_time' => $executionTime,
                'error' => $e->getMessage()
            ]);

            // Point 39: Secure error message
            if (EnvLoader::isProduction()) {
                throw new PDOException('A database error occurred. Please try again.');
            }
            throw $e;
        }
    }

    /**
     * Fetch single row from query result
     *
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return array|null Row data or null if not found
     */
    public static function fetchOne(string $sql, array $params = []): ?array
    {
        $stmt = self::query($sql, $params);
        $result = $stmt->fetch();
        return $result !== false ? $result : null;
    }

    /**
     * Fetch all rows from query result
     *
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return array Array of rows
     */
    public static function fetchAll(string $sql, array $params = []): array
    {
        $stmt = self::query($sql, $params);
        return $stmt->fetchAll();
    }

    /**
     * Fetch single column value
     *
     * @param string $sql SQL query
     * @param array $params Query parameters
     * @return mixed Column value or false if not found
     */
    public static function fetchColumn(string $sql, array $params = [])
    {
        $stmt = self::query($sql, $params);
        return $stmt->fetchColumn();
    }

    /**
     * Get count from query
     *
     * @param string $table Table name
     * @param string $where WHERE clause (without WHERE keyword)
     * @param array $params Query parameters
     * @return int Row count
     */
    public static function count(string $table, string $where = '', array $params = []): int
    {
        $sql = "SELECT COUNT(*) FROM `{$table}`";
        if (!empty($where)) {
            $sql .= " WHERE {$where}";
        }
        return (int) self::fetchColumn($sql, $params);
    }

    /**
     * Insert row and return insert ID
     *
     * @param string $table Table name
     * @param array $data Column => value pairs
     * @return int|string Last insert ID
     */
    public static function insert(string $table, array $data)
    {
        $columns = array_keys($data);
        $placeholders = array_fill(0, count($columns), '?');

        $sql = sprintf(
            'INSERT INTO `%s` (`%s`) VALUES (%s)',
            $table,
            implode('`, `', $columns),
            implode(', ', $placeholders)
        );

        self::query($sql, array_values($data));

        return self::getConnection()->lastInsertId();
    }

    /**
     * Update rows in table
     *
     * @param string $table Table name
     * @param array $data Column => value pairs
     * @param string $where WHERE clause
     * @param array $whereParams WHERE clause parameters
     * @return int Number of affected rows
     */
    public static function update(string $table, array $data, string $where, array $whereParams = []): int
    {
        $setParts = [];
        foreach (array_keys($data) as $column) {
            $setParts[] = "`{$column}` = ?";
        }

        $sql = sprintf(
            'UPDATE `%s` SET %s WHERE %s',
            $table,
            implode(', ', $setParts),
            $where
        );

        $params = array_merge(array_values($data), $whereParams);
        $stmt = self::query($sql, $params);

        return $stmt->rowCount();
    }

    /**
     * Delete rows from table
     *
     * @param string $table Table name
     * @param string $where WHERE clause
     * @param array $params Query parameters
     * @return int Number of affected rows
     */
    public static function delete(string $table, string $where, array $params = []): int
    {
        $sql = "DELETE FROM `{$table}` WHERE {$where}";
        $stmt = self::query($sql, $params);
        return $stmt->rowCount();
    }

    // ═══════════════════════════════════════════════════════════════
    // POINT 35: TRANSACTION WRAPPER METHODS
    // ═══════════════════════════════════════════════════════════════

    /**
     * Begin a database transaction
     *
     * Supports nested transactions using savepoints.
     *
     * @return bool Success status
     */
    public static function beginTransaction(): bool
    {
        $conn = self::getConnection();

        if (self::$transactionCount === 0) {
            $result = $conn->beginTransaction();
        } else {
            // Nested transaction: use savepoint
            $conn->exec("SAVEPOINT trans_" . self::$transactionCount);
            $result = true;
        }

        self::$transactionCount++;

        if (self::$loggingEnabled) {
            vp_log_query('BEGIN TRANSACTION (level: ' . self::$transactionCount . ')', [], 0);
        }

        return $result;
    }

    /**
     * Commit the current transaction
     *
     * @return bool Success status
     */
    public static function commit(): bool
    {
        $conn = self::getConnection();

        if (self::$transactionCount === 0) {
            return false; // No active transaction
        }

        self::$transactionCount--;

        if (self::$transactionCount === 0) {
            $result = $conn->commit();
        } else {
            // Nested transaction: release savepoint
            $conn->exec("RELEASE SAVEPOINT trans_" . self::$transactionCount);
            $result = true;
        }

        if (self::$loggingEnabled) {
            vp_log_query('COMMIT (level: ' . (self::$transactionCount + 1) . ')', [], 0);
        }

        return $result;
    }

    /**
     * Rollback the current transaction
     *
     * @return bool Success status
     */
    public static function rollback(): bool
    {
        $conn = self::getConnection();

        if (self::$transactionCount === 0) {
            return false; // No active transaction
        }

        self::$transactionCount--;

        if (self::$transactionCount === 0) {
            $result = $conn->rollBack();
        } else {
            // Nested transaction: rollback to savepoint
            $conn->exec("ROLLBACK TO SAVEPOINT trans_" . self::$transactionCount);
            $result = true;
        }

        if (self::$loggingEnabled) {
            vp_log_query('ROLLBACK (level: ' . (self::$transactionCount + 1) . ')', [], 0);
        }

        return $result;
    }

    /**
     * Execute callback within a transaction
     *
     * Automatically commits on success, rolls back on exception.
     *
     * @param callable $callback Function to execute
     * @return mixed Callback return value
     * @throws Exception If callback throws exception
     */
    public static function transaction(callable $callback)
    {
        self::beginTransaction();

        try {
            $result = $callback(self::getConnection());
            self::commit();
            return $result;
        } catch (Exception $e) {
            self::rollback();
            throw $e;
        }
    }

    /**
     * Check if currently in a transaction
     *
     * @return bool True if in transaction
     */
    public static function inTransaction(): bool
    {
        return self::$transactionCount > 0;
    }

    /**
     * Get current transaction nesting level
     *
     * @return int Transaction level (0 = not in transaction)
     */
    public static function getTransactionLevel(): int
    {
        return self::$transactionCount;
    }

    // ═══════════════════════════════════════════════════════════════
    // UTILITY METHODS
    // ═══════════════════════════════════════════════════════════════

    /**
     * Quote identifier (table/column name)
     *
     * @param string $identifier Identifier to quote
     * @return string Quoted identifier
     */
    public static function quoteIdentifier(string $identifier): string
    {
        return '`' . str_replace('`', '``', $identifier) . '`';
    }

    /**
     * Build WHERE clause from conditions array
     *
     * @param array $conditions Column => value pairs
     * @param string $operator AND or OR
     * @return array [where_clause, params]
     */
    public static function buildWhere(array $conditions, string $operator = 'AND'): array
    {
        if (empty($conditions)) {
            return ['1=1', []];
        }

        $parts = [];
        $params = [];

        foreach ($conditions as $column => $value) {
            if ($value === null) {
                $parts[] = "`{$column}` IS NULL";
            } else {
                $parts[] = "`{$column}` = ?";
                $params[] = $value;
            }
        }

        $whereClause = implode(" {$operator} ", $parts);

        return [$whereClause, $params];
    }

    /**
     * Build ORDER BY clause
     *
     * @param array $orderBy Column => direction pairs
     * @return string ORDER BY clause
     */
    public static function buildOrderBy(array $orderBy): string
    {
        if (empty($orderBy)) {
            return '';
        }

        $parts = [];
        foreach ($orderBy as $column => $direction) {
            $direction = strtoupper($direction) === 'DESC' ? 'DESC' : 'ASC';
            $parts[] = "`{$column}` {$direction}";
        }

        return 'ORDER BY ' . implode(', ', $parts);
    }

    /**
     * Build LIMIT clause
     *
     * @param int $limit Number of rows
     * @param int $offset Starting offset
     * @return string LIMIT clause
     */
    public static function buildLimit(int $limit, int $offset = 0): string
    {
        if ($limit <= 0) {
            return '';
        }

        if ($offset > 0) {
            return "LIMIT {$offset}, {$limit}";
        }

        return "LIMIT {$limit}";
    }

    /**
     * Close the database connection
     */
    public static function close(): void
    {
        self::$connection = null;
        self::$transactionCount = 0;
    }

    /**
     * Enable or disable query logging
     *
     * @param bool $enabled Enable logging
     */
    public static function setLogging(bool $enabled): void
    {
        self::$loggingEnabled = $enabled;
    }

    /**
     * Set slow query threshold
     *
     * @param float $seconds Threshold in seconds
     */
    public static function setSlowQueryThreshold(float $seconds): void
    {
        self::$slowQueryThreshold = $seconds;
    }
}

/**
 * Shorthand function for getting database connection
 *
 * @return PDO Database connection
 */
function db(): PDO
{
    return Database::getConnection();
}
