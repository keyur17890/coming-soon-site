<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - CONTACT FORM HANDLER
 * ═══════════════════════════════════════════════════════════════
 * Points 470-493: Secure form submission handler with validation,
 * CSRF protection, reCAPTCHA verification, rate limiting, and
 * email notification
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// ─────────────────────────────────────────────────────────────────
// POINT 470: LOAD CONFIGURATION
// ─────────────────────────────────────────────────────────────────
require_once __DIR__ . '/config.php';

// Set JSON content type for API response
header('Content-Type: application/json; charset=utf-8');

// ─────────────────────────────────────────────────────────────────
// POINT 471: HELPER FUNCTION - JSON RESPONSE
// ─────────────────────────────────────────────────────────────────
function json_response(bool $success, string $message, array $data = [], int $http_code = 200): void
{
    http_response_code($http_code);
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data' => $data,
        'timestamp' => date('c')
    ], JSON_UNESCAPED_SLASHES);
    exit;
}

// ─────────────────────────────────────────────────────────────────
// POINT 472: VERIFY REQUEST METHOD
// ─────────────────────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_response(false, 'Invalid request method. Only POST requests are accepted.', [], 405);
}

// ─────────────────────────────────────────────────────────────────
// POINT 473-475: RATE LIMITING CHECK
// ─────────────────────────────────────────────────────────────────
$client_ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['HTTP_X_REAL_IP'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
$client_ip = explode(',', $client_ip)[0]; // Get first IP if multiple

$rate_limiter = new RateLimiter($client_ip, 'contact_form');

// Allow 5 submissions per hour per IP
if (!$rate_limiter->check(5, 3600)) {
    vp_log_error('Rate limit exceeded for contact form', [
        'ip' => $client_ip,
        'action' => 'contact_form_submit'
    ]);
    json_response(false, 'Too many submissions. Please try again later.', [], 429);
}

// ─────────────────────────────────────────────────────────────────
// POINT 476-478: CSRF TOKEN VALIDATION
// ─────────────────────────────────────────────────────────────────
$csrf_token = $_POST['csrf_token'] ?? '';

if (empty($csrf_token)) {
    json_response(false, 'Security token missing. Please refresh the page and try again.', [], 403);
}

if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $csrf_token)) {
    vp_log_error('CSRF token mismatch', [
        'ip' => $client_ip,
        'action' => 'contact_form_submit'
    ]);
    json_response(false, 'Security token invalid. Please refresh the page and try again.', [], 403);
}

// Check token expiry (30 minutes)
$token_time = $_SESSION['csrf_token_time'] ?? 0;
if (time() - $token_time > 1800) {
    unset($_SESSION['csrf_token'], $_SESSION['csrf_token_time']);
    json_response(false, 'Security token expired. Please refresh the page and try again.', [], 403);
}

// ─────────────────────────────────────────────────────────────────
// POINT 479-480: HONEYPOT CHECK (SPAM PROTECTION)
// ─────────────────────────────────────────────────────────────────
$honeypot = $_POST['website_url'] ?? '';
if (!empty($honeypot)) {
    vp_log_error('Honeypot triggered - spam detected', [
        'ip' => $client_ip,
        'action' => 'contact_form_submit'
    ]);
    // Return success to confuse bots, but don't process
    json_response(true, 'Thank you for your submission.', []);
}

// ─────────────────────────────────────────────────────────────────
// POINT 481-483: reCAPTCHA VERIFICATION
// ─────────────────────────────────────────────────────────────────
$recaptcha_token = $_POST['recaptcha_token'] ?? '';

if (RECAPTCHA_ENABLED && !empty(RECAPTCHA_SECRET_KEY)) {
    if (empty($recaptcha_token)) {
        json_response(false, 'reCAPTCHA verification required. Please try again.', [], 400);
    }

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => RECAPTCHA_SECRET_KEY,
        'response' => $recaptcha_token,
        'remoteip' => $client_ip
    ];

    $recaptcha_options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($recaptcha_data),
            'timeout' => 10
        ]
    ];

    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_response = @file_get_contents($recaptcha_url, false, $recaptcha_context);

    if ($recaptcha_response === false) {
        vp_log_error('reCAPTCHA API request failed', [
            'ip' => $client_ip
        ]);
        // Don't block submission if reCAPTCHA API is down
    } else {
        $recaptcha_result = json_decode($recaptcha_response, true);

        if (!$recaptcha_result['success']) {
            vp_log_error('reCAPTCHA verification failed', [
                'ip' => $client_ip,
                'errors' => $recaptcha_result['error-codes'] ?? []
            ]);
            json_response(false, 'reCAPTCHA verification failed. Please try again.', [], 400);
        }

        // Check score for v3 (threshold 0.5)
        $score = $recaptcha_result['score'] ?? 1;
        if ($score < 0.5) {
            vp_log_error('reCAPTCHA score too low', [
                'ip' => $client_ip,
                'score' => $score
            ]);
            json_response(false, 'Verification failed. Please try again or contact us directly.', [], 400);
        }
    }
}

// ─────────────────────────────────────────────────────────────────
// POINT 484-488: INPUT VALIDATION
// ─────────────────────────────────────────────────────────────────
$errors = [];

// Required fields
$required_fields = ['first_name', 'last_name', 'email', 'company', 'service', 'message', 'consent'];

foreach ($required_fields as $field) {
    if ($field === 'consent') {
        if (!isset($_POST[$field]) || $_POST[$field] !== 'on') {
            $errors[$field] = 'You must agree to the privacy policy';
        }
    } elseif (empty($_POST[$field])) {
        $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required';
    }
}

// Sanitize and validate inputs
$first_name = InputValidator::sanitizeString($_POST['first_name'] ?? '', 2, 50);
$last_name = InputValidator::sanitizeString($_POST['last_name'] ?? '', 2, 50);
$email = InputValidator::sanitizeEmail($_POST['email'] ?? '');
$phone = InputValidator::sanitizeString($_POST['phone'] ?? '', 0, 30);
$company = InputValidator::sanitizeString($_POST['company'] ?? '', 2, 100);
$company_website = InputValidator::sanitizeUrl($_POST['company_website'] ?? '');
$service = InputValidator::sanitizeString($_POST['service'] ?? '', 1, 100);
$budget = InputValidator::sanitizeString($_POST['budget'] ?? '', 0, 50);
$message = InputValidator::sanitizeString($_POST['message'] ?? '', 20, 2000);
$referral_source = InputValidator::sanitizeString($_POST['referral_source'] ?? '', 0, 50);

// Validate first name
if (strlen($first_name) < 2) {
    $errors['first_name'] = 'First name must be at least 2 characters';
}

// Validate last name
if (strlen($last_name) < 2) {
    $errors['last_name'] = 'Last name must be at least 2 characters';
}

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
}

// Block common disposable email domains
$disposable_domains = ['tempmail.com', 'throwaway.com', 'guerrillamail.com', 'mailinator.com'];
$email_domain = strtolower(substr(strrchr($email, '@'), 1));
if (in_array($email_domain, $disposable_domains)) {
    $errors['email'] = 'Please use a business email address';
}

// Validate phone if provided
if (!empty($phone) && !preg_match('/^[\d\s\+\-\(\)\.]+$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number';
}

// Validate company website if provided
if (!empty($company_website) && !filter_var($company_website, FILTER_VALIDATE_URL)) {
    $errors['company_website'] = 'Please enter a valid URL';
}

// Validate message length
if (strlen($message) < 20) {
    $errors['message'] = 'Message must be at least 20 characters';
}

// Validate service selection
$valid_services = [
    'B2B Lead Generation',
    'Data Solutions & List Building',
    'Digital Marketing Services',
    'Web Development & Design',
    'SEO & Content Marketing',
    'Email Marketing Campaigns',
    'Social Media Marketing',
    'Account-Based Marketing (ABM)',
    'Marketing Automation',
    'Other / Multiple Services'
];

if (!in_array($service, $valid_services)) {
    $errors['service'] = 'Please select a valid service';
}

// Return validation errors
if (!empty($errors)) {
    json_response(false, 'Please correct the errors below.', ['errors' => $errors], 400);
}

// ─────────────────────────────────────────────────────────────────
// POINT 489-490: STORE SUBMISSION IN DATABASE
// ─────────────────────────────────────────────────────────────────
$submission_id = null;

try {
    $db = Database::getInstance();
    $pdo = $db->getConnection();

    // Check if contacts table exists, create if not
    $table_check = $pdo->query("SHOW TABLES LIKE 'contact_submissions'");
    if ($table_check->rowCount() === 0) {
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS contact_submissions (
                id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(50) NOT NULL,
                last_name VARCHAR(50) NOT NULL,
                email VARCHAR(255) NOT NULL,
                phone VARCHAR(30) DEFAULT NULL,
                company VARCHAR(100) NOT NULL,
                company_website VARCHAR(255) DEFAULT NULL,
                service VARCHAR(100) NOT NULL,
                budget VARCHAR(50) DEFAULT NULL,
                message TEXT NOT NULL,
                referral_source VARCHAR(50) DEFAULT NULL,
                ip_address VARCHAR(45) NOT NULL,
                user_agent VARCHAR(500) DEFAULT NULL,
                status ENUM('new', 'read', 'replied', 'spam', 'archived') DEFAULT 'new',
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                INDEX idx_email (email),
                INDEX idx_status (status),
                INDEX idx_created_at (created_at)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
        ");
    }

    // Insert submission
    $stmt = $pdo->prepare("
        INSERT INTO contact_submissions
        (first_name, last_name, email, phone, company, company_website, service, budget, message, referral_source, ip_address, user_agent)
        VALUES
        (:first_name, :last_name, :email, :phone, :company, :company_website, :service, :budget, :message, :referral_source, :ip_address, :user_agent)
    ");

    $stmt->execute([
        ':first_name' => $first_name,
        ':last_name' => $last_name,
        ':email' => $email,
        ':phone' => $phone ?: null,
        ':company' => $company,
        ':company_website' => $company_website ?: null,
        ':service' => $service,
        ':budget' => $budget ?: null,
        ':message' => $message,
        ':referral_source' => $referral_source ?: null,
        ':ip_address' => $client_ip,
        ':user_agent' => substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 500)
    ]);

    $submission_id = $pdo->lastInsertId();

} catch (PDOException $e) {
    vp_log_error('Database error storing contact submission', [
        'error' => $e->getMessage(),
        'email' => $email
    ]);
    // Continue without database - still send email notification
}

// ─────────────────────────────────────────────────────────────────
// POINT 491-492: SEND EMAIL NOTIFICATION
// ─────────────────────────────────────────────────────────────────
$email_sent = false;

// Prepare email content
$email_subject = "[VP Internationals] New Inquiry: {$service} - {$company}";

$email_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>New Contact Form Submission</title>
</head>
<body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto;'>
    <div style='background: #83c601; padding: 20px; text-align: center;'>
        <h1 style='color: white; margin: 0;'>New Contact Form Submission</h1>
    </div>

    <div style='padding: 30px; background: #f9f9f9;'>
        <h2 style='color: #0a0e27; border-bottom: 2px solid #83c601; padding-bottom: 10px;'>Contact Details</h2>

        <table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd; width: 35%;'><strong>Name:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($first_name . ' ' . $last_name) . "</td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Email:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><a href='mailto:" . htmlspecialchars($email) . "'>" . htmlspecialchars($email) . "</a></td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Phone:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($phone ?: 'Not provided') . "</td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Company:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($company) . "</td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Website:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($company_website ?: 'Not provided') . "</td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Service:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><span style='background: #83c601; color: white; padding: 3px 10px; border-radius: 3px;'>" . htmlspecialchars($service) . "</span></td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Budget:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($budget ?: 'Not specified') . "</td>
            </tr>
            <tr>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'><strong>Referral Source:</strong></td>
                <td style='padding: 10px 0; border-bottom: 1px solid #ddd;'>" . htmlspecialchars($referral_source ?: 'Not specified') . "</td>
            </tr>
        </table>

        <h2 style='color: #0a0e27; border-bottom: 2px solid #83c601; padding-bottom: 10px; margin-top: 30px;'>Message</h2>
        <div style='background: white; padding: 20px; border-radius: 5px; border-left: 4px solid #83c601;'>
            <p style='margin: 0; white-space: pre-wrap;'>" . htmlspecialchars($message) . "</p>
        </div>

        <h2 style='color: #0a0e27; border-bottom: 2px solid #83c601; padding-bottom: 10px; margin-top: 30px;'>Submission Info</h2>
        <table style='width: 100%; border-collapse: collapse; font-size: 12px; color: #666;'>
            <tr>
                <td style='padding: 5px 0;'><strong>Submission ID:</strong></td>
                <td style='padding: 5px 0;'>#" . ($submission_id ?? 'N/A') . "</td>
            </tr>
            <tr>
                <td style='padding: 5px 0;'><strong>IP Address:</strong></td>
                <td style='padding: 5px 0;'>" . htmlspecialchars($client_ip) . "</td>
            </tr>
            <tr>
                <td style='padding: 5px 0;'><strong>Submitted:</strong></td>
                <td style='padding: 5px 0;'>" . date('F j, Y \a\t g:i A T') . "</td>
            </tr>
        </table>
    </div>

    <div style='background: #0a0e27; padding: 20px; text-align: center;'>
        <p style='color: #999; margin: 0; font-size: 12px;'>
            This email was sent from the VP Internationals website contact form.<br>
            Please respond within 24 hours.
        </p>
    </div>
</body>
</html>
";

// Plain text version for email clients that don't support HTML
$email_body_plain = "
NEW CONTACT FORM SUBMISSION
===========================

Contact Details:
- Name: {$first_name} {$last_name}
- Email: {$email}
- Phone: " . ($phone ?: 'Not provided') . "
- Company: {$company}
- Website: " . ($company_website ?: 'Not provided') . "
- Service: {$service}
- Budget: " . ($budget ?: 'Not specified') . "
- Referral: " . ($referral_source ?: 'Not specified') . "

Message:
{$message}

---
Submission ID: #" . ($submission_id ?? 'N/A') . "
IP: {$client_ip}
Time: " . date('F j, Y \a\t g:i A T') . "
";

// Send email using configured method
if (defined('SMTP_HOST') && !empty(SMTP_HOST)) {
    // Use SMTP (requires PHPMailer or similar)
    // For now, fall back to mail() function
    $to = defined('CONTACT_EMAIL') ? CONTACT_EMAIL : 'info@vpinternationals.com';
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: VP Internationals Website <noreply@vpinternationals.com>',
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . phpversion(),
        'X-Priority: 1'
    ];

    $email_sent = @mail($to, $email_subject, $email_body, implode("\r\n", $headers));

    if (!$email_sent) {
        vp_log_error('Failed to send contact form email notification', [
            'to' => $to,
            'subject' => $email_subject,
            'submission_id' => $submission_id
        ]);
    }
} else {
    // Use PHP mail() function
    $to = defined('CONTACT_EMAIL') ? CONTACT_EMAIL : 'info@vpinternationals.com';
    $headers = [
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset=UTF-8',
        'From: VP Internationals Website <noreply@vpinternationals.com>',
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . phpversion()
    ];

    $email_sent = @mail($to, $email_subject, $email_body, implode("\r\n", $headers));
}

// ─────────────────────────────────────────────────────────────────
// POINT 493: SEND AUTO-REPLY TO USER
// ─────────────────────────────────────────────────────────────────
$auto_reply_subject = "Thank you for contacting VP Internationals - We've received your inquiry";

$auto_reply_body = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Thank You for Contacting Us</title>
</head>
<body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto;'>
    <div style='background: #83c601; padding: 30px; text-align: center;'>
        <h1 style='color: white; margin: 0; font-size: 24px;'>Thank You, " . htmlspecialchars($first_name) . "!</h1>
        <p style='color: white; margin: 10px 0 0; opacity: 0.9;'>We've received your inquiry</p>
    </div>

    <div style='padding: 30px; background: #ffffff;'>
        <p>Thank you for reaching out to VP Internationals. We appreciate your interest in our <strong>" . htmlspecialchars($service) . "</strong> services.</p>

        <p>Our team will review your inquiry and get back to you within <strong>24 business hours</strong>.</p>

        <div style='background: #f5f5f5; padding: 20px; border-radius: 8px; margin: 20px 0;'>
            <h3 style='margin-top: 0; color: #0a0e27;'>What's Next?</h3>
            <ol style='margin-bottom: 0; padding-left: 20px;'>
                <li>Our team will review your requirements</li>
                <li>We'll schedule a free consultation call</li>
                <li>You'll receive a customized proposal</li>
                <li>We'll begin working on your project</li>
            </ol>
        </div>

        <p>In the meantime, feel free to:</p>
        <ul>
            <li><a href='" . SITE_URL . "/services' style='color: #83c601;'>Explore our services</a></li>
            <li><a href='" . SITE_URL . "/portfolio' style='color: #83c601;'>View our portfolio</a></li>
            <li><a href='" . SITE_URL . "/blog' style='color: #83c601;'>Read our latest insights</a></li>
        </ul>

        <p>If you have any urgent questions, don't hesitate to reach out directly:</p>
        <p>
            <strong>Email:</strong> info@vpinternationals.com<br>
            <strong>Phone:</strong> +91-XXX-XXX-XXXX
        </p>

        <p style='margin-top: 30px;'>Best regards,<br><strong>The VP Internationals Team</strong></p>
    </div>

    <div style='background: #0a0e27; padding: 20px; text-align: center;'>
        <p style='color: #999; margin: 0 0 10px; font-size: 14px;'>
            VP Internationals - Driving Business Growth
        </p>
        <p style='margin: 0;'>
            <a href='" . SITE_URL . "' style='color: #83c601; text-decoration: none; margin: 0 10px;'>Website</a>
            <a href='https://linkedin.com/company/vpinternationals' style='color: #83c601; text-decoration: none; margin: 0 10px;'>LinkedIn</a>
            <a href='https://twitter.com/vpinternationals' style='color: #83c601; text-decoration: none; margin: 0 10px;'>Twitter</a>
        </p>
        <p style='color: #666; margin: 15px 0 0; font-size: 11px;'>
            This is an automated response. Please do not reply to this email.
        </p>
    </div>
</body>
</html>
";

$auto_reply_headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: VP Internationals <noreply@vpinternationals.com>',
    'X-Mailer: PHP/' . phpversion()
];

@mail($email, $auto_reply_subject, $auto_reply_body, implode("\r\n", $auto_reply_headers));

// ─────────────────────────────────────────────────────────────────
// REGENERATE CSRF TOKEN
// ─────────────────────────────────────────────────────────────────
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
$_SESSION['csrf_token_time'] = time();

// ─────────────────────────────────────────────────────────────────
// RETURN SUCCESS RESPONSE
// ─────────────────────────────────────────────────────────────────
$rate_limiter->hit();

json_response(
    true,
    'Thank you for your inquiry! We have received your message and will get back to you within 24 business hours.',
    [
        'submission_id' => $submission_id,
        'email_sent' => $email_sent,
        'new_csrf_token' => $_SESSION['csrf_token']
    ]
);
