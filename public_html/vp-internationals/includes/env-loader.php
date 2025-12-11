<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - ENVIRONMENT VARIABLE LOADER
 * ═══════════════════════════════════════════════════════════════
 *
 * Loads environment variables from .env file into PHP environment.
 * This file handles secure loading and parsing of configuration.
 *
 * @package     VPInternationals
 * @subpackage  Core
 * @author      VP Internationals
 * @copyright   2016-2025 VP Internationals
 * @license     Proprietary
 * @version     1.0.0
 * ═══════════════════════════════════════════════════════════════
 */

// Prevent direct access
if (!defined('VP_ACCESS')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

/**
 * Environment Loader Class
 *
 * Handles parsing and loading of .env files with support for:
 * - Comments (lines starting with #)
 * - Quoted values (single and double quotes)
 * - Variable interpolation
 * - Multiline values
 */
class EnvLoader
{
    /**
     * @var string Path to the .env file
     */
    private static string $envPath = '';

    /**
     * @var array Cached environment variables
     */
    private static array $cache = [];

    /**
     * @var bool Whether environment has been loaded
     */
    private static bool $loaded = false;

    /**
     * Load environment variables from .env file
     *
     * @param string|null $path Custom path to .env file (optional)
     * @return bool True if loaded successfully, false otherwise
     */
    public static function load(?string $path = null): bool
    {
        // Prevent double loading
        if (self::$loaded) {
            return true;
        }

        // Determine .env file path
        if ($path !== null) {
            self::$envPath = $path;
        } else {
            // Look for .env in the root directory (one level up from public_html)
            $possiblePaths = [
                dirname(__DIR__, 2) . '/.env',           // Two levels up (outside public_html)
                dirname(__DIR__) . '/.env',              // One level up (in vp-internationals)
                __DIR__ . '/../.env',                     // Relative path
            ];

            foreach ($possiblePaths as $possiblePath) {
                if (file_exists($possiblePath) && is_readable($possiblePath)) {
                    self::$envPath = $possiblePath;
                    break;
                }
            }
        }

        // Check if .env file exists
        if (empty(self::$envPath) || !file_exists(self::$envPath)) {
            // Log warning but don't fail - allow defaults to be used
            error_log('VP Internationals: .env file not found. Using default configuration.');
            self::$loaded = true;
            return false;
        }

        // Check if file is readable
        if (!is_readable(self::$envPath)) {
            error_log('VP Internationals: .env file exists but is not readable.');
            self::$loaded = true;
            return false;
        }

        // Parse and load the .env file
        try {
            self::parseEnvFile(self::$envPath);
            self::$loaded = true;
            return true;
        } catch (Exception $e) {
            error_log('VP Internationals: Error parsing .env file: ' . $e->getMessage());
            self::$loaded = true;
            return false;
        }
    }

    /**
     * Parse .env file and set environment variables
     *
     * @param string $path Path to .env file
     * @throws Exception If file cannot be parsed
     */
    private static function parseEnvFile(string $path): void
    {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($lines === false) {
            throw new Exception('Failed to read .env file');
        }

        foreach ($lines as $lineNumber => $line) {
            // Skip comments
            $line = trim($line);
            if (empty($line) || strpos($line, '#') === 0) {
                continue;
            }

            // Skip lines without = sign
            if (strpos($line, '=') === false) {
                continue;
            }

            // Parse key=value pair
            list($key, $value) = self::parseLine($line);

            if ($key !== null) {
                self::setVariable($key, $value);
            }
        }
    }

    /**
     * Parse a single line from .env file
     *
     * @param string $line The line to parse
     * @return array [key, value] or [null, null] if invalid
     */
    private static function parseLine(string $line): array
    {
        // Split on first = only
        $parts = explode('=', $line, 2);

        if (count($parts) !== 2) {
            return [null, null];
        }

        $key = trim($parts[0]);
        $value = trim($parts[1]);

        // Validate key format (alphanumeric and underscores only)
        if (!preg_match('/^[A-Z][A-Z0-9_]*$/i', $key)) {
            return [null, null];
        }

        // Remove surrounding quotes from value
        if ((strpos($value, '"') === 0 && strrpos($value, '"') === strlen($value) - 1) ||
            (strpos($value, "'") === 0 && strrpos($value, "'") === strlen($value) - 1)) {
            $value = substr($value, 1, -1);
        }

        // Handle escape sequences in double-quoted values
        $value = str_replace(['\\n', '\\r', '\\t'], ["\n", "\r", "\t"], $value);

        // Perform variable interpolation for ${VAR} syntax
        $value = preg_replace_callback('/\${([A-Z][A-Z0-9_]*)}/', function($matches) {
            return self::get($matches[1], $matches[0]);
        }, $value);

        return [$key, $value];
    }

    /**
     * Set an environment variable
     *
     * @param string $key Variable name
     * @param string $value Variable value
     */
    private static function setVariable(string $key, string $value): void
    {
        // Store in cache
        self::$cache[$key] = $value;

        // Set in multiple ways for compatibility
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }

    /**
     * Get an environment variable
     *
     * @param string $key Variable name
     * @param mixed $default Default value if not found
     * @return mixed Variable value or default
     */
    public static function get(string $key, $default = null)
    {
        // Check cache first
        if (isset(self::$cache[$key])) {
            return self::$cache[$key];
        }

        // Check various sources
        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }

        if (isset($_ENV[$key])) {
            return $_ENV[$key];
        }

        if (isset($_SERVER[$key])) {
            return $_SERVER[$key];
        }

        return $default;
    }

    /**
     * Get environment variable as boolean
     *
     * @param string $key Variable name
     * @param bool $default Default value
     * @return bool Boolean value
     */
    public static function getBool(string $key, bool $default = false): bool
    {
        $value = self::get($key);

        if ($value === null) {
            return $default;
        }

        // Handle various boolean representations
        $trueValues = ['true', '1', 'yes', 'on', 'enabled'];
        $falseValues = ['false', '0', 'no', 'off', 'disabled', ''];

        $lowerValue = strtolower((string)$value);

        if (in_array($lowerValue, $trueValues, true)) {
            return true;
        }

        if (in_array($lowerValue, $falseValues, true)) {
            return false;
        }

        return $default;
    }

    /**
     * Get environment variable as integer
     *
     * @param string $key Variable name
     * @param int $default Default value
     * @return int Integer value
     */
    public static function getInt(string $key, int $default = 0): int
    {
        $value = self::get($key);

        if ($value === null || !is_numeric($value)) {
            return $default;
        }

        return (int)$value;
    }

    /**
     * Get environment variable as float
     *
     * @param string $key Variable name
     * @param float $default Default value
     * @return float Float value
     */
    public static function getFloat(string $key, float $default = 0.0): float
    {
        $value = self::get($key);

        if ($value === null || !is_numeric($value)) {
            return $default;
        }

        return (float)$value;
    }

    /**
     * Check if environment variable exists
     *
     * @param string $key Variable name
     * @return bool True if exists
     */
    public static function has(string $key): bool
    {
        return self::get($key) !== null;
    }

    /**
     * Get all loaded environment variables
     *
     * @return array All cached variables
     */
    public static function all(): array
    {
        return self::$cache;
    }

    /**
     * Get required environment variable (throws exception if not found)
     *
     * @param string $key Variable name
     * @return string Variable value
     * @throws Exception If variable not found
     */
    public static function getRequired(string $key): string
    {
        $value = self::get($key);

        if ($value === null) {
            throw new Exception("Required environment variable '{$key}' is not set.");
        }

        return $value;
    }

    /**
     * Check if we're in production environment
     *
     * @return bool True if production
     */
    public static function isProduction(): bool
    {
        return strtolower(self::get('ENVIRONMENT', 'production')) === 'production';
    }

    /**
     * Check if we're in development environment
     *
     * @return bool True if development
     */
    public static function isDevelopment(): bool
    {
        return strtolower(self::get('ENVIRONMENT', 'production')) === 'development';
    }

    /**
     * Check if debug mode is enabled
     *
     * @return bool True if debug mode on
     */
    public static function isDebug(): bool
    {
        return self::getBool('DEBUG_MODE', false);
    }
}

/**
 * Helper function for quick environment variable access
 *
 * @param string $key Variable name
 * @param mixed $default Default value
 * @return mixed Variable value or default
 */
function env(string $key, $default = null)
{
    return EnvLoader::get($key, $default);
}

/**
 * Helper function for boolean environment variables
 *
 * @param string $key Variable name
 * @param bool $default Default value
 * @return bool Boolean value
 */
function env_bool(string $key, bool $default = false): bool
{
    return EnvLoader::getBool($key, $default);
}

/**
 * Helper function for integer environment variables
 *
 * @param string $key Variable name
 * @param int $default Default value
 * @return int Integer value
 */
function env_int(string $key, int $default = 0): int
{
    return EnvLoader::getInt($key, $default);
}
