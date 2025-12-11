<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - CORE CONFIGURATION
 * ═══════════════════════════════════════════════════════════════
 *
 * Central configuration file for VP Internationals website.
 * All sensitive credentials are loaded from environment variables.
 *
 * @package     VPInternationals
 * @subpackage  Core
 * @author      VP Internationals
 * @copyright   2016-2025 VP Internationals
 * @license     Proprietary
 * @version     2.0.0
 *
 * SECURITY IMPROVEMENTS:
 * - All credentials loaded from .env file (Points 1-9)
 * - CSRF token expiry validation (Point 10)
 * - Rate limiting implementation (Point 13)
 * - Centralized input validation (Point 14)
 * - Error logging to file (Point 15)
 * - Query logging for debugging (Point 16)
 * - Email obfuscation (Point 17)
 * ═══════════════════════════════════════════════════════════════
 */

// ─────────────────────────────────────────────────────────────────
// POINT 19: PHP VERSION CHECK
// ─────────────────────────────────────────────────────────────────
if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    http_response_code(500);
    exit('VP Internationals requires PHP 8.0 or higher. Current version: ' . PHP_VERSION);
}

// ─────────────────────────────────────────────────────────────────
// SECURITY: DEFINE ACCESS CONSTANT
// ─────────────────────────────────────────────────────────────────
define('VP_ACCESS', true);

// ─────────────────────────────────────────────────────────────────
// POINT 18: ROOT PATH & SITE URL CONSTANTS
// ─────────────────────────────────────────────────────────────────
// ROOT_PATH: Physical server path to vp-internationals directory
define('ROOT_PATH', __DIR__);

// INCLUDES_PATH: Path to includes directory
define('INCLUDES_PATH', ROOT_PATH . '/includes');

// ASSETS_PATH: Path to assets directory
define('ASSETS_PATH', ROOT_PATH . '/assets');

// ─────────────────────────────────────────────────────────────────
// LOAD ENVIRONMENT VARIABLES (Point 11)
// ─────────────────────────────────────────────────────────────────
require_once INCLUDES_PATH . '/env-loader.php';
EnvLoader::load();

// ─────────────────────────────────────────────────────────────────
// POINT 20: TIMEZONE SETTING
// ─────────────────────────────────────────────────────────────────
date_default_timezone_set(env('SITE_TIMEZONE', 'Asia/Kolkata'));

// ─────────────────────────────────────────────────────────────────
// POINT 5: ERROR DISPLAY SETTINGS
// ─────────────────────────────────────────────────────────────────
if (EnvLoader::isProduction()) {
    // Production: Hide all errors from users
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(E_ALL);
    ini_set('log_errors', '1');
    ini_set('error_log', ROOT_PATH . '/logs/php-errors.log');
} else {
    // Development: Show errors for debugging
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

// ─────────────────────────────────────────────────────────────────
// SITE URL CONSTANT (Point 18)
// URL is masked via .htaccess to serve from root without subfolder
// ─────────────────────────────────────────────────────────────────
define('SITE_URL', rtrim(env('SITE_URL', 'https://vpinternationals.com'), '/') . '/');
define('SITE_NAME', env('SITE_NAME', 'VP Internationals'));

// ─────────────────────────────────────────────────────────────────
// POINTS 1-4: DATABASE CONFIGURATION (From Environment Variables)
// ─────────────────────────────────────────────────────────────────
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_NAME', env('DB_NAME', ''));
define('DB_USER', env('DB_USER', ''));
define('DB_PASS', env('DB_PASS', ''));
define('DB_PORT', env_int('DB_PORT', 3306));
define('DB_CHARSET', env('DB_CHARSET', 'utf8mb4'));

// ─────────────────────────────────────────────────────────────────
// POINTS 6-7: SMTP CONFIGURATION (From Environment Variables)
// ─────────────────────────────────────────────────────────────────
define('SMTP_HOST', env('SMTP_HOST', ''));
define('SMTP_PORT', env_int('SMTP_PORT', 587));
define('SMTP_USER', env('SMTP_USER', ''));
define('SMTP_PASS', env('SMTP_PASS', ''));
define('SMTP_FROM_EMAIL', env('SMTP_FROM_EMAIL', 'info@vpinternationals.com'));
define('SMTP_FROM_NAME', env('SMTP_FROM_NAME', 'VP Internationals'));
define('SMTP_ENCRYPTION', env('SMTP_ENCRYPTION', 'tls'));

// ─────────────────────────────────────────────────────────────────
// POINTS 8-9: RECAPTCHA CONFIGURATION (From Environment Variables)
// ─────────────────────────────────────────────────────────────────
define('RECAPTCHA_SITE_KEY', env('RECAPTCHA_SITE_KEY', ''));
define('RECAPTCHA_SECRET_KEY', env('RECAPTCHA_SECRET_KEY', ''));
define('RECAPTCHA_MIN_SCORE', 0.5);

// ─────────────────────────────────────────────────────────────────
// POINT 10: CSRF TOKEN CONFIGURATION
// ─────────────────────────────────────────────────────────────────
// Token expires after 30 minutes (1800 seconds)
define('CSRF_TOKEN_EXPIRY', env_int('CSRF_TOKEN_EXPIRY', 1800));
define('CSRF_TOKEN_NAME', 'vp_csrf_token');

// ─────────────────────────────────────────────────────────────────
// RATE LIMITING CONFIGURATION (Point 13)
// ─────────────────────────────────────────────────────────────────
define('RATE_LIMIT_REQUESTS', env_int('RATE_LIMIT_REQUESTS', 5));
define('RATE_LIMIT_WINDOW', env_int('RATE_LIMIT_WINDOW', 60)); // 60 seconds

// ─────────────────────────────────────────────────────────────────
// THIRD-PARTY INTEGRATIONS
// ─────────────────────────────────────────────────────────────────
define('GA_TRACKING_ID', env('GA_TRACKING_ID', ''));
define('TAWKTO_PROPERTY_ID', env('TAWKTO_PROPERTY_ID', ''));
define('TAWKTO_WIDGET_ID', env('TAWKTO_WIDGET_ID', ''));
define('WHATSAPP_NUMBER', env('WHATSAPP_NUMBER', '+919876543210'));

// ─────────────────────────────────────────────────────────────────
// COMPANY INFORMATION CONSTANTS
// ─────────────────────────────────────────────────────────────────
define('COMPANY_NAME', 'VP Internationals');
define('COMPANY_LEGAL_NAME', 'VP Internationals');
define('COMPANY_FOUNDING_YEAR', 2016);
define('COMPANY_EMAIL', 'info@vpinternationals.com');
define('COMPANY_PHONE', '+91 98765 43210');

// Point 24: Company Tagline
define('COMPANY_TAGLINE', 'Professional Business Services Since 2016');

// Point 25: Company USP
define('COMPANY_USP', 'ISO Certified | 50,000+ Projects | 98% Client Retention');

// Point 30-31: Phone Display Constants
define('PHONE_DISPLAY', '+91 98765 43210');
define('PHONE_LINK', '+919876543210');

// ─────────────────────────────────────────────────────────────────
// ADDRESS INFORMATION
// ─────────────────────────────────────────────────────────────────
define('COMPANY_ADDRESS', [
    'street' => 'Business Center, Main Road',
    'city' => 'Vadodara',
    'state' => 'Gujarat',
    'postal_code' => '390001',
    'country' => 'India',
    'full' => 'Business Center, Main Road, Vadodara, Gujarat 390001, India'
]);

define('COMPANY_COORDINATES', [
    'latitude' => '22.3072',
    'longitude' => '73.1812'
]);

// ─────────────────────────────────────────════════════════════════
// POINTS 21-23: SEO DEFAULT CONSTANTS
// ─────────────────────────────────────────────────────────────────
// Point 21: SEO Title Suffix
define('SEO_TITLE_SUFFIX', ' | VP Internationals');

// Point 22: Default Meta Description
define('SEO_DEFAULT_DESCRIPTION', 'VP Internationals delivers ISO-certified CV formatting, web design, SEO, graphic design, and data entry services to businesses in UK, USA, Australia, and Canada since 2016.');

// Point 23: Default Meta Keywords
define('SEO_DEFAULT_KEYWORDS', 'CV formatting, web design, SEO services, graphic design, data entry, web development, digital marketing, professional services, ISO certified');

// ─────────────────────────────────────────────────────────────────
// POINT 26: SERVICE AREAS ARRAY
// ─────────────────────────────────────────────────────────────────
define('SERVICE_AREAS', [
    [
        'country' => 'United Kingdom',
        'code' => 'UK',
        'iso' => 'GB',
        'currency' => 'GBP',
        'flag' => '🇬🇧'
    ],
    [
        'country' => 'United States',
        'code' => 'USA',
        'iso' => 'US',
        'currency' => 'USD',
        'flag' => '🇺🇸'
    ],
    [
        'country' => 'Australia',
        'code' => 'AUS',
        'iso' => 'AU',
        'currency' => 'AUD',
        'flag' => '🇦🇺'
    ],
    [
        'country' => 'Canada',
        'code' => 'CAN',
        'iso' => 'CA',
        'currency' => 'CAD',
        'flag' => '🇨🇦'
    ],
    [
        'country' => 'India',
        'code' => 'IND',
        'iso' => 'IN',
        'currency' => 'INR',
        'flag' => '🇮🇳'
    ]
]);

// ─────────────────────────────────────────────────────────────────
// POINTS 27-28: CTA TEXT CONSTANTS
// ─────────────────────────────────────────────────────────────────
define('PRIMARY_CTA_TEXT', 'Get Free Quote');
define('SECONDARY_CTA_TEXT', 'View Our Work');
define('PRIMARY_CTA_URL', SITE_URL . 'contact');
define('SECONDARY_CTA_URL', SITE_URL . 'portfolio');

// ─────────────────────────────────────────────────────────────────
// POINT 29: TRUST BADGES ARRAY
// ─────────────────────────────────────────────────────────────────
define('TRUST_BADGES', [
    [
        'icon' => 'iso-9001',
        'title' => 'ISO 9001:2015',
        'description' => 'Quality Management Certified'
    ],
    [
        'icon' => 'iso-27001',
        'title' => 'ISO 27001:2022',
        'description' => 'Information Security Certified'
    ],
    [
        'icon' => 'projects',
        'title' => '50,000+',
        'description' => 'Projects Delivered'
    ],
    [
        'icon' => 'clients',
        'title' => '500+',
        'description' => 'Happy Clients'
    ],
    [
        'icon' => 'retention',
        'title' => '98%',
        'description' => 'Client Retention Rate'
    ],
    [
        'icon' => 'experience',
        'title' => '8+ Years',
        'description' => 'Industry Experience'
    ]
]);

// ─────────────────────────────────────────────────────────────────
// COMPANY STATISTICS
// ─────────────────────────────────────────────────────────────────
define('STATS', [
    'years' => 8,
    'projects' => 50000,
    'clients' => 500,
    'retention' => 98,
    'countries' => 4,
    'team_size' => 50
]);

// ─────────────────────────────────────────────────────────────────
// SERVICES CONFIGURATION
// ─────────────────────────────────────────────────────────────────
define('SERVICES', [
    'cv-formatting' => [
        'name' => 'CV & Resume Formatting',
        'slug' => 'cv-formatting',
        'short_description' => 'ATS-optimized CV formatting for UK, USA, Australian & Canadian markets.',
        'icon' => 'file-text'
    ],
    'web-design' => [
        'name' => 'Web Design & Development',
        'slug' => 'web-design-development',
        'short_description' => 'Custom responsive websites built for conversions.',
        'icon' => 'globe'
    ],
    'seo' => [
        'name' => 'Search Engine Optimization',
        'slug' => 'seo-services',
        'short_description' => 'Data-driven SEO strategies that improve rankings.',
        'icon' => 'trending-up'
    ],
    'graphic-design' => [
        'name' => 'Graphic Design & Branding',
        'slug' => 'graphic-design',
        'short_description' => 'Eye-catching logos, brand identities & marketing materials.',
        'icon' => 'image'
    ],
    'data-entry' => [
        'name' => 'Data Entry & Processing',
        'slug' => 'data-entry-processing',
        'short_description' => 'Accurate, secure & GDPR-compliant data entry services.',
        'icon' => 'database'
    ],
    'web-apps' => [
        'name' => 'Web Application Development',
        'slug' => 'web-application-development',
        'short_description' => 'Custom web applications & SaaS platforms.',
        'icon' => 'code'
    ]
]);

// ─────────────────────────────────────────────────────────────────
// SOCIAL MEDIA LINKS
// ─────────────────────────────────────────────────────────────────
define('SOCIAL_LINKS', [
    'facebook' => 'https://www.facebook.com/vpinternationals',
    'twitter' => 'https://twitter.com/vpinternationals',
    'linkedin' => 'https://www.linkedin.com/company/vpinternationals',
    'instagram' => 'https://www.instagram.com/vpinternationals',
    'youtube' => 'https://www.youtube.com/vpinternationals'
]);

// ─────────────────────────────────────────────────────────────────
// BUSINESS HOURS
// ─────────────────────────────────────────────────────────────────
define('BUSINESS_HOURS', [
    'monday' => ['open' => '09:00', 'close' => '19:00'],
    'tuesday' => ['open' => '09:00', 'close' => '19:00'],
    'wednesday' => ['open' => '09:00', 'close' => '19:00'],
    'thursday' => ['open' => '09:00', 'close' => '19:00'],
    'friday' => ['open' => '09:00', 'close' => '19:00'],
    'saturday' => ['open' => '09:00', 'close' => '17:00'],
    'sunday' => null // Closed
]);

// ═══════════════════════════════════════════════════════════════
// UTILITY FUNCTIONS
// ═══════════════════════════════════════════════════════════════

/**
 * POINT 15: Error Logging Function
 * Logs errors to file instead of displaying them
 *
 * @param string $message Error message
 * @param string $level Error level (error, warning, info, debug)
 * @param array $context Additional context data
 */
function vp_log_error(string $message, string $level = 'error', array $context = []): void
{
    $logDir = ROOT_PATH . '/logs';

    // Create logs directory if it doesn't exist
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $logFile = $logDir . '/error.log';

    $timestamp = date('Y-m-d H:i:s');
    $contextStr = !empty($context) ? ' | Context: ' . json_encode($context) : '';
    $logEntry = "[{$timestamp}] [{$level}] {$message}{$contextStr}" . PHP_EOL;

    error_log($logEntry, 3, $logFile);
}

/**
 * POINT 16: Query Logging Function
 * Logs database queries for debugging (disabled in production)
 *
 * @param string $query The SQL query
 * @param array $params Query parameters
 * @param float $executionTime Query execution time in seconds
 */
function vp_log_query(string $query, array $params = [], float $executionTime = 0): void
{
    // Only log in development or if explicitly enabled
    if (EnvLoader::isProduction() && !EnvLoader::isDebug()) {
        return;
    }

    $logDir = ROOT_PATH . '/logs';

    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $logFile = $logDir . '/queries.log';
    $slowThreshold = EnvLoader::getFloat('SLOW_QUERY_THRESHOLD', 1.0);

    $timestamp = date('Y-m-d H:i:s');
    $isSlowQuery = $executionTime > $slowThreshold;
    $slowMarker = $isSlowQuery ? ' [SLOW]' : '';
    $paramsStr = !empty($params) ? ' | Params: ' . json_encode($params) : '';

    $logEntry = "[{$timestamp}]{$slowMarker} ({$executionTime}s) {$query}{$paramsStr}" . PHP_EOL;

    error_log($logEntry, 3, $logFile);

    // Also log slow queries to separate file
    if ($isSlowQuery) {
        $slowLogFile = $logDir . '/slow-queries.log';
        error_log($logEntry, 3, $slowLogFile);
    }
}

/**
 * POINT 17: Email Obfuscation Function
 * Obfuscates email address to prevent spam harvesting
 *
 * @param string $email Email address to obfuscate
 * @param bool $asLink Return as mailto link
 * @param string $linkText Custom link text (optional)
 * @return string Obfuscated email HTML
 */
function vp_obfuscate_email(string $email, bool $asLink = true, string $linkText = ''): string
{
    $encoded = '';
    $length = strlen($email);

    for ($i = 0; $i < $length; $i++) {
        $encoded .= '&#' . ord($email[$i]) . ';';
    }

    if ($asLink) {
        $mailtoEncoded = '';
        $mailto = 'mailto:' . $email;
        for ($i = 0; $i < strlen($mailto); $i++) {
            $mailtoEncoded .= '&#' . ord($mailto[$i]) . ';';
        }

        $displayText = !empty($linkText) ? htmlspecialchars($linkText) : $encoded;
        return '<a href="' . $mailtoEncoded . '">' . $displayText . '</a>';
    }

    return $encoded;
}

/**
 * Obfuscate phone number for display
 *
 * @param string $phone Phone number
 * @param bool $asLink Return as tel link
 * @return string Obfuscated phone HTML
 */
function vp_obfuscate_phone(string $phone, bool $asLink = true): string
{
    $display = htmlspecialchars($phone);

    if ($asLink) {
        // Remove spaces and special chars for tel: link
        $telNumber = preg_replace('/[^0-9+]/', '', $phone);
        $encoded = '';
        $tel = 'tel:' . $telNumber;
        for ($i = 0; $i < strlen($tel); $i++) {
            $encoded .= '&#' . ord($tel[$i]) . ';';
        }
        return '<a href="' . $encoded . '">' . $display . '</a>';
    }

    return $display;
}

/**
 * POINT 14: Input Validation Class
 */
class InputValidator
{
    /**
     * Sanitize string input
     *
     * @param mixed $input Input to sanitize
     * @return string Sanitized string
     */
    public static function sanitizeString($input): string
    {
        if (!is_string($input)) {
            return '';
        }
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Sanitize email input
     *
     * @param mixed $input Input to sanitize
     * @return string Sanitized email
     */
    public static function sanitizeEmail($input): string
    {
        if (!is_string($input)) {
            return '';
        }
        return filter_var(trim($input), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Validate email format
     *
     * @param string $email Email to validate
     * @return bool True if valid
     */
    public static function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Sanitize integer input
     *
     * @param mixed $input Input to sanitize
     * @return int Sanitized integer
     */
    public static function sanitizeInt($input): int
    {
        return (int) filter_var($input, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * Validate phone number (basic)
     *
     * @param string $phone Phone number to validate
     * @return bool True if valid
     */
    public static function isValidPhone(string $phone): bool
    {
        // Remove common separators and check if remaining is valid
        $cleaned = preg_replace('/[\s\-\.\(\)]+/', '', $phone);
        return preg_match('/^\+?[0-9]{7,15}$/', $cleaned) === 1;
    }

    /**
     * Sanitize URL input
     *
     * @param mixed $input Input to sanitize
     * @return string Sanitized URL
     */
    public static function sanitizeUrl($input): string
    {
        if (!is_string($input)) {
            return '';
        }
        return filter_var(trim($input), FILTER_SANITIZE_URL);
    }

    /**
     * Validate URL format
     *
     * @param string $url URL to validate
     * @return bool True if valid
     */
    public static function isValidUrl(string $url): bool
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Sanitize filename
     *
     * @param string $filename Filename to sanitize
     * @return string Sanitized filename
     */
    public static function sanitizeFilename(string $filename): string
    {
        // Remove any path components
        $filename = basename($filename);
        // Replace potentially dangerous characters
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
        // Remove multiple consecutive underscores
        $filename = preg_replace('/_+/', '_', $filename);
        return $filename;
    }

    /**
     * Validate required fields
     *
     * @param array $data Data to validate
     * @param array $required Required field names
     * @return array Array of missing fields
     */
    public static function validateRequired(array $data, array $required): array
    {
        $missing = [];
        foreach ($required as $field) {
            if (!isset($data[$field]) || trim((string)$data[$field]) === '') {
                $missing[] = $field;
            }
        }
        return $missing;
    }

    /**
     * Validate string length
     *
     * @param string $input Input string
     * @param int $min Minimum length
     * @param int $max Maximum length
     * @return bool True if valid length
     */
    public static function isValidLength(string $input, int $min = 0, int $max = PHP_INT_MAX): bool
    {
        $length = mb_strlen($input);
        return $length >= $min && $length <= $max;
    }
}

/**
 * POINT 13: Rate Limiting Function (IP-based, database stored)
 * Note: Full implementation in includes/rate-limiter.php
 */
class RateLimiter
{
    /**
     * Check if action is rate limited
     *
     * @param string $action Action identifier
     * @param string|null $identifier IP or user identifier
     * @return bool True if rate limited (should block)
     */
    public static function isRateLimited(string $action, ?string $identifier = null): bool
    {
        if ($identifier === null) {
            $identifier = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        }

        // Start session if not started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $key = "rate_limit_{$action}_{$identifier}";
        $now = time();
        $window = RATE_LIMIT_WINDOW;
        $maxRequests = RATE_LIMIT_REQUESTS;

        // Initialize or get existing rate limit data
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = [
                'count' => 0,
                'window_start' => $now
            ];
        }

        $data = &$_SESSION[$key];

        // Reset if window has expired
        if ($now - $data['window_start'] > $window) {
            $data['count'] = 0;
            $data['window_start'] = $now;
        }

        // Check if limit exceeded
        if ($data['count'] >= $maxRequests) {
            vp_log_error("Rate limit exceeded for {$action}", 'warning', [
                'identifier' => $identifier,
                'count' => $data['count']
            ]);
            return true;
        }

        // Increment counter
        $data['count']++;

        return false;
    }

    /**
     * Get remaining requests in current window
     *
     * @param string $action Action identifier
     * @param string|null $identifier IP or user identifier
     * @return int Remaining requests
     */
    public static function getRemainingRequests(string $action, ?string $identifier = null): int
    {
        if ($identifier === null) {
            $identifier = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        }

        $key = "rate_limit_{$action}_{$identifier}";

        if (!isset($_SESSION[$key])) {
            return RATE_LIMIT_REQUESTS;
        }

        return max(0, RATE_LIMIT_REQUESTS - $_SESSION[$key]['count']);
    }
}

/**
 * Generate canonical URL for current page
 *
 * @param string|null $path Custom path (optional)
 * @return string Canonical URL
 */
function vp_canonical_url(?string $path = null): string
{
    if ($path !== null) {
        return SITE_URL . ltrim($path, '/');
    }

    $requestUri = $_SERVER['REQUEST_URI'] ?? '';
    // Remove query string for canonical
    $path = strtok($requestUri, '?');
    // Remove trailing slash except for homepage
    $path = ($path !== '/' && $path !== '') ? rtrim($path, '/') : $path;

    return SITE_URL . ltrim($path, '/');
}

/**
 * Generate page title with suffix
 *
 * @param string $pageTitle Page-specific title
 * @return string Full page title
 */
function vp_page_title(string $pageTitle): string
{
    return htmlspecialchars($pageTitle) . SEO_TITLE_SUFFIX;
}

/**
 * Get service area countries as comma-separated string
 *
 * @return string Countries list
 */
function vp_get_service_countries(): string
{
    $countries = array_column(SERVICE_AREAS, 'country');
    return implode(', ', $countries);
}

/**
 * Format price with currency
 *
 * @param float $amount Amount
 * @param string $currency Currency code
 * @return string Formatted price
 */
function vp_format_price(float $amount, string $currency = 'GBP'): string
{
    $symbols = [
        'GBP' => '£',
        'USD' => '$',
        'AUD' => 'A$',
        'CAD' => 'C$',
        'INR' => '₹',
        'EUR' => '€'
    ];

    $symbol = $symbols[$currency] ?? $currency . ' ';
    return $symbol . number_format($amount, 2);
}

// ─────────────────────────────────────────────────────────────────
// START SESSION (Required for CSRF and Rate Limiting)
// ─────────────────────────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'domain' => '',
        'secure' => EnvLoader::isProduction(),
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// ─────────────────────────────────────────────────────────────────
// CREATE REQUIRED DIRECTORIES
// ─────────────────────────────────────────────────────────────────
$requiredDirs = [
    ROOT_PATH . '/logs',
    ROOT_PATH . '/cache'
];

foreach ($requiredDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}
