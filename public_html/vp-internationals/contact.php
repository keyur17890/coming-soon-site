<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - CONTACT PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 398-469: Contact page with form, validation, CSRF,
 * reCAPTCHA, and ContactPage schema
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 398-405: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'Contact VP Internationals | Get Free B2B Lead Generation Consultation',
    'meta_description' => 'Contact VP Internationals for expert B2B lead generation, digital marketing & web development services. Get a free consultation. Response within 24 hours guaranteed.',
    'meta_keywords' => 'contact VP Internationals, B2B lead generation inquiry, digital marketing consultation, web development quote, get in touch',
    'canonical_url' => SITE_URL . '/contact',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/contact-og-image.jpg',
    'body_class' => 'page-contact',
    'current_page' => 'contact'
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Contact Us', 'url' => SITE_URL . '/contact']
];

// ─────────────────────────────────────────────────────────────────
// POINT 406-415: CONTACT PAGE SCHEMA DATA
// ─────────────────────────────────────────────────────────────────
$contact_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'ContactPage',
    'name' => 'Contact VP Internationals',
    'description' => $page_config['meta_description'],
    'url' => $page_config['canonical_url'],
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => SITE_NAME,
        'url' => SITE_URL,
        'logo' => SITE_URL . '/assets/images/logo.svg',
        'email' => 'info@vpinternationals.com',
        'telephone' => '+91-XXXXXXXXXX',
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'contactType' => 'sales',
                'email' => 'sales@vpinternationals.com',
                'availableLanguage' => ['English', 'Hindi']
            ],
            [
                '@type' => 'ContactPoint',
                'contactType' => 'customer support',
                'email' => 'support@vpinternationals.com',
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '18:00'
                ]
            ]
        ],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Business District',
            'addressLocality' => 'City',
            'addressRegion' => 'State',
            'postalCode' => '000000',
            'addressCountry' => 'IN'
        ]
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 416-420: CONTACT METHODS DATA
// ─────────────────────────────────────────────────────────────────
$contact_methods = [
    [
        'icon' => 'mail',
        'title' => 'Email Us',
        'primary' => 'info@vpinternationals.com',
        'secondary' => 'sales@vpinternationals.com',
        'description' => 'We respond to all emails within 24 hours',
        'link' => 'mailto:info@vpinternationals.com'
    ],
    [
        'icon' => 'phone',
        'title' => 'Call Us',
        'primary' => '+91-XXX-XXX-XXXX',
        'secondary' => 'Mon-Fri: 9 AM - 6 PM IST',
        'description' => 'Speak directly with our team',
        'link' => 'tel:+91XXXXXXXXXX'
    ],
    [
        'icon' => 'message',
        'title' => 'Live Chat',
        'primary' => 'Chat with us',
        'secondary' => 'Available 24/7',
        'description' => 'Instant support via live chat',
        'link' => '#tawk-chat'
    ],
    [
        'icon' => 'location',
        'title' => 'Visit Us',
        'primary' => 'Business District',
        'secondary' => 'City, State, India',
        'description' => 'Schedule a meeting at our office',
        'link' => '#office-location'
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 421-425: SERVICE INQUIRY OPTIONS
// ─────────────────────────────────────────────────────────────────
$service_options = [
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

// ─────────────────────────────────────────────────────────────────
// POINT 426-430: BUDGET RANGE OPTIONS
// ─────────────────────────────────────────────────────────────────
$budget_options = [
    'Under $1,000',
    '$1,000 - $5,000',
    '$5,000 - $10,000',
    '$10,000 - $25,000',
    '$25,000 - $50,000',
    '$50,000+',
    'Not Sure / Need Consultation'
];

// ─────────────────────────────────────────────────────────────────
// POINT 431-435: FAQ DATA FOR CONTACT PAGE
// ─────────────────────────────────────────────────────────────────
$contact_faqs = [
    [
        'question' => 'What is your typical response time?',
        'answer' => 'We respond to all inquiries within 24 business hours. For urgent matters, we recommend calling us directly or using our live chat feature for immediate assistance.'
    ],
    [
        'question' => 'Do you offer free consultations?',
        'answer' => 'Yes! We offer complimentary 30-minute consultation calls to understand your requirements and discuss how our services can help achieve your business goals.'
    ],
    [
        'question' => 'What information should I include in my inquiry?',
        'answer' => 'Please include details about your business, target audience, current marketing efforts, goals, timeline, and budget range. The more information you provide, the better we can tailor our response.'
    ],
    [
        'question' => 'Do you work with businesses outside India?',
        'answer' => 'Absolutely! We serve clients globally with a strong presence in North America, Europe, and Asia-Pacific regions. Our team operates across multiple time zones to ensure seamless communication.'
    ]
];

// Generate CSRF token for form
if (!isset($_SESSION['csrf_token']) || empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    $_SESSION['csrf_token_time'] = time();
}
$csrf_token = $_SESSION['csrf_token'];

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 436: CONTACT PAGE SCHEMA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
<?php echo json_encode($contact_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<!-- FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ($contact_faqs as $index => $faq): ?>
        {
            "@type": "Question",
            "name": "<?php echo htmlspecialchars($faq['question']); ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo htmlspecialchars($faq['answer']); ?>"
            }
        }<?php echo $index < count($contact_faqs) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
    ]
}
</script>

<main id="main-content" class="contact-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 437-440: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="contact-hero section" aria-labelledby="contact-hero-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--primary">Get In Touch</span>
                <h1 id="contact-hero-title" class="section-header__title">
                    Let's Discuss Your <span class="text-gradient">Business Growth</span>
                </h1>
                <p class="section-header__subtitle">
                    Ready to accelerate your B2B lead generation? Our team of experts is here to help.
                    Fill out the form below or reach out through any of our contact channels.
                </p>
            </header>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 441-445: CONTACT METHODS SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="contact-methods section section--gray" aria-labelledby="methods-title">
        <div class="container">
            <h2 id="methods-title" class="sr-only">Contact Methods</h2>
            <div class="contact-methods__grid">
                <?php foreach ($contact_methods as $method): ?>
                <a href="<?php echo htmlspecialchars($method['link']); ?>" class="contact-method-card">
                    <div class="contact-method-card__icon">
                        <?php
                        $method_icons = [
                            'mail' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
                            'phone' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>',
                            'message' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>',
                            'location' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>'
                        ];
                        echo $method_icons[$method['icon']] ?? $method_icons['mail'];
                        ?>
                    </div>
                    <h3 class="contact-method-card__title"><?php echo htmlspecialchars($method['title']); ?></h3>
                    <p class="contact-method-card__primary"><?php echo htmlspecialchars($method['primary']); ?></p>
                    <p class="contact-method-card__secondary"><?php echo htmlspecialchars($method['secondary']); ?></p>
                    <p class="contact-method-card__description"><?php echo htmlspecialchars($method['description']); ?></p>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 446-465: CONTACT FORM SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="contact-form-section section" aria-labelledby="form-title">
        <div class="container">
            <div class="contact-form__wrapper">
                <div class="contact-form__info">
                    <h2 id="form-title" class="contact-form__title">Send Us a Message</h2>
                    <p class="contact-form__description">
                        Fill out the form and our team will get back to you within 24 hours.
                        All fields marked with <span class="required-star">*</span> are required.
                    </p>

                    <div class="contact-form__benefits">
                        <h3 class="contact-form__benefits-title">What happens next?</h3>
                        <ul class="contact-form__benefits-list">
                            <li>
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                                </svg>
                                <span>We'll review your requirements within 24 hours</span>
                            </li>
                            <li>
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                                </svg>
                                <span>Schedule a free consultation call</span>
                            </li>
                            <li>
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                                </svg>
                                <span>Receive a customized proposal</span>
                            </li>
                            <li>
                                <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                                </svg>
                                <span>Start growing your business</span>
                            </li>
                        </ul>
                    </div>

                    <div class="contact-form__trust">
                        <p class="contact-form__trust-text">Trusted by 500+ businesses worldwide</p>
                        <div class="contact-form__trust-badges">
                            <span class="trust-badge">GDPR Compliant</span>
                            <span class="trust-badge">ISO 27001</span>
                            <span class="trust-badge">24/7 Support</span>
                        </div>
                    </div>
                </div>

                <div class="contact-form__form-container">
                    <form id="contact-form"
                          class="contact-form"
                          action="<?php echo SITE_URL; ?>/contact-submit"
                          method="POST"
                          novalidate
                          aria-describedby="form-status">

                        <!-- CSRF Token -->
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

                        <!-- Honeypot field (spam protection) -->
                        <div class="form-honeypot" aria-hidden="true">
                            <label for="website_url">Website URL</label>
                            <input type="text" name="website_url" id="website_url" tabindex="-1" autocomplete="off">
                        </div>

                        <!-- Form Status Message -->
                        <div id="form-status" class="form-status" role="alert" aria-live="polite"></div>

                        <!-- Row 1: Name fields -->
                        <div class="form-row form-row--two-col">
                            <div class="form-group">
                                <label for="first_name" class="form-label">
                                    First Name <span class="required-star" aria-label="required">*</span>
                                </label>
                                <input type="text"
                                       id="first_name"
                                       name="first_name"
                                       class="form-input"
                                       required
                                       minlength="2"
                                       maxlength="50"
                                       autocomplete="given-name"
                                       aria-describedby="first_name_error"
                                       placeholder="John">
                                <span id="first_name_error" class="form-error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="form-label">
                                    Last Name <span class="required-star" aria-label="required">*</span>
                                </label>
                                <input type="text"
                                       id="last_name"
                                       name="last_name"
                                       class="form-input"
                                       required
                                       minlength="2"
                                       maxlength="50"
                                       autocomplete="family-name"
                                       aria-describedby="last_name_error"
                                       placeholder="Doe">
                                <span id="last_name_error" class="form-error" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- Row 2: Email and Phone -->
                        <div class="form-row form-row--two-col">
                            <div class="form-group">
                                <label for="email" class="form-label">
                                    Business Email <span class="required-star" aria-label="required">*</span>
                                </label>
                                <input type="email"
                                       id="email"
                                       name="email"
                                       class="form-input"
                                       required
                                       autocomplete="email"
                                       aria-describedby="email_error"
                                       placeholder="john@company.com">
                                <span id="email_error" class="form-error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">
                                    Phone Number
                                </label>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       class="form-input"
                                       autocomplete="tel"
                                       aria-describedby="phone_error"
                                       placeholder="+1 (555) 000-0000">
                                <span id="phone_error" class="form-error" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- Row 3: Company and Website -->
                        <div class="form-row form-row--two-col">
                            <div class="form-group">
                                <label for="company" class="form-label">
                                    Company Name <span class="required-star" aria-label="required">*</span>
                                </label>
                                <input type="text"
                                       id="company"
                                       name="company"
                                       class="form-input"
                                       required
                                       maxlength="100"
                                       autocomplete="organization"
                                       aria-describedby="company_error"
                                       placeholder="Acme Corporation">
                                <span id="company_error" class="form-error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="company_website" class="form-label">
                                    Company Website
                                </label>
                                <input type="url"
                                       id="company_website"
                                       name="company_website"
                                       class="form-input"
                                       autocomplete="url"
                                       aria-describedby="company_website_error"
                                       placeholder="https://www.company.com">
                                <span id="company_website_error" class="form-error" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- Row 4: Service and Budget -->
                        <div class="form-row form-row--two-col">
                            <div class="form-group">
                                <label for="service" class="form-label">
                                    Service Interested In <span class="required-star" aria-label="required">*</span>
                                </label>
                                <select id="service"
                                        name="service"
                                        class="form-select"
                                        required
                                        aria-describedby="service_error">
                                    <option value="">Select a service</option>
                                    <?php foreach ($service_options as $service): ?>
                                    <option value="<?php echo htmlspecialchars($service); ?>"><?php echo htmlspecialchars($service); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span id="service_error" class="form-error" aria-live="polite"></span>
                            </div>

                            <div class="form-group">
                                <label for="budget" class="form-label">
                                    Estimated Budget
                                </label>
                                <select id="budget"
                                        name="budget"
                                        class="form-select"
                                        aria-describedby="budget_error">
                                    <option value="">Select budget range</option>
                                    <?php foreach ($budget_options as $budget): ?>
                                    <option value="<?php echo htmlspecialchars($budget); ?>"><?php echo htmlspecialchars($budget); ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <span id="budget_error" class="form-error" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- Row 5: Message -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="message" class="form-label">
                                    Your Message <span class="required-star" aria-label="required">*</span>
                                </label>
                                <textarea id="message"
                                          name="message"
                                          class="form-textarea"
                                          required
                                          minlength="20"
                                          maxlength="2000"
                                          rows="5"
                                          aria-describedby="message_error message_counter"
                                          placeholder="Tell us about your project, goals, target audience, and timeline..."></textarea>
                                <div class="form-textarea__footer">
                                    <span id="message_error" class="form-error" aria-live="polite"></span>
                                    <span id="message_counter" class="form-counter">0 / 2000</span>
                                </div>
                            </div>
                        </div>

                        <!-- Row 6: How did you hear about us -->
                        <div class="form-row">
                            <div class="form-group">
                                <label for="referral_source" class="form-label">
                                    How did you hear about us?
                                </label>
                                <select id="referral_source"
                                        name="referral_source"
                                        class="form-select">
                                    <option value="">Please select</option>
                                    <option value="Google Search">Google Search</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Referral">Referral from colleague/friend</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Industry Event">Industry Event</option>
                                    <option value="Blog/Article">Blog or Article</option>
                                    <option value="Email">Email</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 7: Consent checkbox -->
                        <div class="form-row">
                            <div class="form-group form-group--checkbox">
                                <input type="checkbox"
                                       id="consent"
                                       name="consent"
                                       class="form-checkbox"
                                       required
                                       aria-describedby="consent_error">
                                <label for="consent" class="form-label form-label--checkbox">
                                    I agree to the <a href="<?php echo SITE_URL; ?>/privacy-policy" target="_blank" rel="noopener">Privacy Policy</a>
                                    and consent to receiving marketing communications. <span class="required-star" aria-label="required">*</span>
                                </label>
                                <span id="consent_error" class="form-error" aria-live="polite"></span>
                            </div>
                        </div>

                        <!-- reCAPTCHA Notice -->
                        <div class="form-recaptcha-notice">
                            <p>This site is protected by reCAPTCHA and the Google
                                <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a> and
                                <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">Terms of Service</a> apply.
                            </p>
                        </div>

                        <!-- Hidden reCAPTCHA token -->
                        <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                        <!-- Submit Button -->
                        <div class="form-row">
                            <button type="submit" class="btn btn--primary btn--lg btn--full" id="submit-btn">
                                <span class="btn__text">Send Message</span>
                                <span class="btn__loading" aria-hidden="true">
                                    <svg class="spinner" viewBox="0 0 24 24" width="20" height="20">
                                        <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-width="3" stroke-dasharray="31.4" stroke-linecap="round"></circle>
                                    </svg>
                                    Sending...
                                </span>
                                <svg class="btn__icon" aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 466: FAQ SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="contact-faq section section--gray" aria-labelledby="faq-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="faq-title" class="section-header__title">Frequently Asked Questions</h2>
                <p class="section-header__subtitle">Quick answers to common questions about contacting us</p>
            </header>

            <div class="faq-list" itemscope itemtype="https://schema.org/FAQPage">
                <?php foreach ($contact_faqs as $index => $faq): ?>
                <article class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                    <button class="faq-item__question"
                            aria-expanded="false"
                            aria-controls="faq-answer-<?php echo $index; ?>"
                            id="faq-question-<?php echo $index; ?>">
                        <span itemprop="name"><?php echo htmlspecialchars($faq['question']); ?></span>
                        <svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-item__answer"
                         id="faq-answer-<?php echo $index; ?>"
                         role="region"
                         aria-labelledby="faq-question-<?php echo $index; ?>"
                         itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer"
                         hidden>
                        <p itemprop="text"><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 467-468: OFFICE LOCATION / MAP SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="office-location section" id="office-location" aria-labelledby="location-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="location-title" class="section-header__title">Our Office Location</h2>
                <p class="section-header__subtitle">Visit us at our headquarters for a face-to-face meeting</p>
            </header>

            <div class="office-location__content">
                <div class="office-location__details">
                    <div class="office-address">
                        <h3 class="office-address__title">VP Internationals Headquarters</h3>
                        <address class="office-address__text">
                            Business District<br>
                            City, State 000000<br>
                            India
                        </address>
                    </div>

                    <div class="office-hours">
                        <h3 class="office-hours__title">Business Hours</h3>
                        <ul class="office-hours__list">
                            <li><strong>Monday - Friday:</strong> 9:00 AM - 6:00 PM IST</li>
                            <li><strong>Saturday:</strong> 10:00 AM - 2:00 PM IST</li>
                            <li><strong>Sunday:</strong> Closed</li>
                        </ul>
                    </div>

                    <div class="office-contact">
                        <a href="mailto:info@vpinternationals.com" class="btn btn--outline">
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            Email Us
                        </a>
                        <a href="tel:+91XXXXXXXXXX" class="btn btn--outline">
                            <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            Call Us
                        </a>
                    </div>
                </div>

                <div class="office-location__map">
                    <!-- Map placeholder - Replace with actual Google Maps embed -->
                    <div class="map-placeholder" aria-label="Office location map">
                        <div class="map-placeholder__content">
                            <svg aria-hidden="true" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <p>Interactive map will be displayed here</p>
                            <a href="https://maps.google.com" target="_blank" rel="noopener noreferrer" class="btn btn--sm btn--primary">
                                Open in Google Maps
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 469: CTA SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="cta section" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta__content">
                <h2 id="cta-title" class="cta__title">Prefer a Direct Conversation?</h2>
                <p class="cta__description">
                    Schedule a free 30-minute consultation call with our experts.
                    We'll discuss your goals and how we can help achieve them.
                </p>
                <a href="#tawk-chat" class="btn btn--primary btn--lg" id="open-chat-btn">
                    Start Live Chat
                    <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- CONTACT PAGE SPECIFIC STYLES -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<style>
/* Contact Hero */
.contact-hero {
    padding: var(--space-16) 0 var(--space-8);
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
    color: var(--color-white);
}

.contact-hero .section-header__title {
    color: var(--color-white);
}

.contact-hero .section-header__subtitle {
    color: var(--color-gray-300);
}

/* Contact Methods */
.contact-methods__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-4);
}

@media (min-width: 640px) {
    .contact-methods__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .contact-methods__grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.contact-method-card {
    display: block;
    background: var(--color-white);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    text-align: center;
    text-decoration: none;
    color: inherit;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
    border: 2px solid transparent;
}

.contact-method-card:hover {
    border-color: var(--color-primary);
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.contact-method-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: var(--color-primary-light);
    border-radius: 50%;
    color: var(--color-primary);
    margin-bottom: var(--space-4);
}

.contact-method-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.contact-method-card__primary {
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
    color: var(--color-primary);
    margin-bottom: var(--space-1);
}

.contact-method-card__secondary {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    margin-bottom: var(--space-2);
}

.contact-method-card__description {
    font-size: var(--font-size-xs);
    color: var(--color-gray-500);
}

/* Contact Form Section */
.contact-form__wrapper {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-8);
}

@media (min-width: 1024px) {
    .contact-form__wrapper {
        grid-template-columns: 1fr 1.5fr;
        align-items: start;
    }
}

.contact-form__info {
    position: sticky;
    top: 100px;
}

.contact-form__title {
    font-size: var(--font-size-2xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-4);
}

.contact-form__description {
    color: var(--color-gray-600);
    margin-bottom: var(--space-6);
    line-height: 1.7;
}

.required-star {
    color: var(--color-error);
}

.contact-form__benefits {
    background: var(--color-gray-50);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-6);
}

.contact-form__benefits-title {
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-semibold);
    margin-bottom: var(--space-4);
    color: var(--color-dark);
}

.contact-form__benefits-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.contact-form__benefits-list li {
    display: flex;
    align-items: flex-start;
    gap: var(--space-3);
    margin-bottom: var(--space-3);
    font-size: var(--font-size-sm);
    color: var(--color-gray-700);
}

.contact-form__benefits-list li:last-child {
    margin-bottom: 0;
}

.contact-form__benefits-list svg {
    flex-shrink: 0;
    color: var(--color-primary);
    margin-top: 2px;
}

.contact-form__trust {
    text-align: center;
}

.contact-form__trust-text {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    margin-bottom: var(--space-3);
}

.contact-form__trust-badges {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-2);
}

.trust-badge {
    font-size: var(--font-size-xs);
    background: var(--color-primary-light);
    color: var(--color-primary-dark);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
    font-weight: var(--font-weight-medium);
}

/* Form Container */
.contact-form__form-container {
    background: var(--color-white);
    padding: var(--space-8);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-lg);
}

/* Form Honeypot (hidden) */
.form-honeypot {
    position: absolute;
    left: -9999px;
    opacity: 0;
    pointer-events: none;
}

/* Form Status */
.form-status {
    padding: var(--space-4);
    border-radius: var(--radius-md);
    margin-bottom: var(--space-4);
    display: none;
}

.form-status--success {
    display: block;
    background: var(--color-success-light);
    color: var(--color-success);
    border: 1px solid var(--color-success);
}

.form-status--error {
    display: block;
    background: var(--color-error-light);
    color: var(--color-error);
    border: 1px solid var(--color-error);
}

/* Form Rows */
.form-row {
    margin-bottom: var(--space-5);
}

.form-row--two-col {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-5);
}

@media (min-width: 640px) {
    .form-row--two-col {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Form Groups */
.form-group {
    position: relative;
}

.form-group--checkbox {
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    gap: var(--space-3);
}

/* Form Labels */
.form-label {
    display: block;
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.form-label--checkbox {
    flex: 1;
    margin-bottom: 0;
    font-weight: var(--font-weight-normal);
    color: var(--color-gray-600);
    font-size: var(--font-size-sm);
    line-height: 1.5;
}

.form-label--checkbox a {
    color: var(--color-primary);
    text-decoration: underline;
}

/* Form Inputs */
.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: var(--space-3) var(--space-4);
    font-size: var(--font-size-base);
    font-family: inherit;
    color: var(--color-dark);
    background: var(--color-white);
    border: 2px solid var(--color-gray-300);
    border-radius: var(--radius-md);
    transition: all var(--transition-fast);
}

.form-input:hover,
.form-select:hover,
.form-textarea:hover {
    border-color: var(--color-gray-400);
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px var(--color-primary-light);
}

.form-input.is-invalid,
.form-select.is-invalid,
.form-textarea.is-invalid {
    border-color: var(--color-error);
}

.form-input.is-invalid:focus,
.form-select.is-invalid:focus,
.form-textarea.is-invalid:focus {
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.form-textarea__footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: var(--space-2);
}

.form-counter {
    font-size: var(--font-size-xs);
    color: var(--color-gray-500);
}

/* Form Checkbox */
.form-checkbox {
    width: 20px;
    height: 20px;
    flex-shrink: 0;
    accent-color: var(--color-primary);
    cursor: pointer;
}

/* Form Error */
.form-error {
    display: block;
    font-size: var(--font-size-xs);
    color: var(--color-error);
    margin-top: var(--space-1);
    min-height: 1.2em;
}

/* reCAPTCHA Notice */
.form-recaptcha-notice {
    font-size: var(--font-size-xs);
    color: var(--color-gray-500);
    margin-bottom: var(--space-5);
    line-height: 1.5;
}

.form-recaptcha-notice a {
    color: var(--color-gray-600);
    text-decoration: underline;
}

/* Submit Button */
.btn--full {
    width: 100%;
}

.btn__loading {
    display: none;
    align-items: center;
    gap: var(--space-2);
}

.btn.is-loading .btn__text,
.btn.is-loading .btn__icon {
    display: none;
}

.btn.is-loading .btn__loading {
    display: flex;
}

.spinner {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

/* FAQ Section */
.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-4);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
}

.faq-item__question {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: var(--space-5) var(--space-6);
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-medium);
    text-align: left;
    color: var(--color-dark);
    background: transparent;
    border: none;
    cursor: pointer;
    transition: background var(--transition-fast);
}

.faq-item__question:hover {
    background: var(--color-gray-50);
}

.faq-item__icon {
    flex-shrink: 0;
    transition: transform var(--transition-normal);
}

.faq-item__question[aria-expanded="true"] .faq-item__icon {
    transform: rotate(180deg);
}

.faq-item__answer {
    padding: 0 var(--space-6) var(--space-5);
}

.faq-item__answer[hidden] {
    display: none;
}

.faq-item__answer p {
    color: var(--color-gray-600);
    line-height: 1.7;
}

/* Office Location */
.office-location__content {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-8);
}

@media (min-width: 1024px) {
    .office-location__content {
        grid-template-columns: 1fr 1.5fr;
        align-items: start;
    }
}

.office-location__details {
    background: var(--color-white);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.office-address,
.office-hours {
    margin-bottom: var(--space-6);
}

.office-address__title,
.office-hours__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
    margin-bottom: var(--space-3);
}

.office-address__text {
    font-style: normal;
    color: var(--color-gray-600);
    line-height: 1.7;
}

.office-hours__list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.office-hours__list li {
    padding: var(--space-2) 0;
    border-bottom: 1px solid var(--color-gray-200);
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
}

.office-hours__list li:last-child {
    border-bottom: none;
}

.office-contact {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-3);
}

.office-contact .btn {
    flex: 1;
    min-width: 140px;
    justify-content: center;
}

/* Map Placeholder */
.office-location__map {
    min-height: 400px;
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.map-placeholder {
    width: 100%;
    height: 100%;
    min-height: 400px;
    background: var(--color-gray-100);
    display: flex;
    align-items: center;
    justify-content: center;
}

.map-placeholder__content {
    text-align: center;
    padding: var(--space-8);
}

.map-placeholder__content svg {
    color: var(--color-gray-400);
    margin-bottom: var(--space-4);
}

.map-placeholder__content p {
    color: var(--color-gray-500);
    margin-bottom: var(--space-4);
}

/* CTA Section */
.cta {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: var(--color-white);
    text-align: center;
}

.cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: var(--font-weight-bold);
    margin-bottom: var(--space-4);
}

.cta__description {
    font-size: var(--font-size-lg);
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto var(--space-8);
}

.cta .btn--primary {
    background: var(--color-white);
    color: var(--color-primary);
}

.cta .btn--primary:hover {
    background: var(--color-gray-100);
}
</style>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- CONTACT PAGE SPECIFIC SCRIPTS -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script>
(function() {
    'use strict';

    // Form elements
    const form = document.getElementById('contact-form');
    const submitBtn = document.getElementById('submit-btn');
    const formStatus = document.getElementById('form-status');
    const messageTextarea = document.getElementById('message');
    const messageCounter = document.getElementById('message_counter');

    // Character counter for message
    if (messageTextarea && messageCounter) {
        messageTextarea.addEventListener('input', function() {
            const count = this.value.length;
            messageCounter.textContent = count + ' / 2000';
            if (count > 2000) {
                messageCounter.style.color = 'var(--color-error)';
            } else {
                messageCounter.style.color = 'var(--color-gray-500)';
            }
        });
    }

    // Form validation
    const validators = {
        required: (value) => value.trim() !== '',
        email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
        minLength: (value, min) => value.length >= min,
        maxLength: (value, max) => value.length <= max,
        phone: (value) => !value || /^[\d\s\+\-\(\)]+$/.test(value),
        url: (value) => !value || /^https?:\/\/.+/.test(value)
    };

    const errorMessages = {
        first_name: 'Please enter your first name (minimum 2 characters)',
        last_name: 'Please enter your last name (minimum 2 characters)',
        email: 'Please enter a valid business email address',
        company: 'Please enter your company name',
        service: 'Please select a service',
        message: 'Please enter your message (minimum 20 characters)',
        consent: 'You must agree to the privacy policy to proceed'
    };

    function validateField(field) {
        const name = field.name;
        const value = field.value;
        const errorEl = document.getElementById(name + '_error');
        let isValid = true;
        let errorMsg = '';

        // Skip honeypot
        if (name === 'website_url') return true;

        // Required fields
        if (field.hasAttribute('required') && !validators.required(value)) {
            isValid = false;
            errorMsg = errorMessages[name] || 'This field is required';
        }

        // Email validation
        if (isValid && field.type === 'email' && value && !validators.email(value)) {
            isValid = false;
            errorMsg = 'Please enter a valid email address';
        }

        // Min length
        if (isValid && field.hasAttribute('minlength')) {
            const min = parseInt(field.getAttribute('minlength'));
            if (value && !validators.minLength(value, min)) {
                isValid = false;
                errorMsg = errorMessages[name] || 'Minimum ' + min + ' characters required';
            }
        }

        // Phone validation
        if (isValid && field.type === 'tel' && value && !validators.phone(value)) {
            isValid = false;
            errorMsg = 'Please enter a valid phone number';
        }

        // URL validation
        if (isValid && field.type === 'url' && value && !validators.url(value)) {
            isValid = false;
            errorMsg = 'Please enter a valid URL (starting with http:// or https://)';
        }

        // Checkbox validation
        if (field.type === 'checkbox' && field.hasAttribute('required') && !field.checked) {
            isValid = false;
            errorMsg = errorMessages[name] || 'This checkbox is required';
        }

        // Update UI
        if (errorEl) {
            errorEl.textContent = errorMsg;
        }

        if (isValid) {
            field.classList.remove('is-invalid');
        } else {
            field.classList.add('is-invalid');
        }

        return isValid;
    }

    // Real-time validation on blur
    if (form) {
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                validateField(this);
            });
        });
    }

    // Form submission
    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Validate all fields
            const inputs = form.querySelectorAll('input, select, textarea');
            let isValid = true;
            let firstInvalidField = null;

            inputs.forEach(function(input) {
                if (!validateField(input) && isValid) {
                    isValid = false;
                    firstInvalidField = input;
                }
            });

            // Check honeypot
            const honeypot = form.querySelector('[name="website_url"]');
            if (honeypot && honeypot.value) {
                console.warn('Spam detected');
                return;
            }

            if (!isValid) {
                if (firstInvalidField) {
                    firstInvalidField.focus();
                }
                return;
            }

            // Show loading state
            submitBtn.classList.add('is-loading');
            submitBtn.disabled = true;

            try {
                // Get reCAPTCHA token if available
                if (typeof grecaptcha !== 'undefined' && window.RECAPTCHA_SITE_KEY) {
                    const token = await grecaptcha.execute(window.RECAPTCHA_SITE_KEY, {action: 'contact_form'});
                    document.getElementById('recaptcha_token').value = token;
                }

                // Submit form via fetch
                const formData = new FormData(form);
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const result = await response.json();

                if (result.success) {
                    formStatus.className = 'form-status form-status--success';
                    formStatus.textContent = result.message || 'Thank you! Your message has been sent successfully. We will get back to you within 24 hours.';
                    form.reset();
                    messageCounter.textContent = '0 / 2000';

                    // Scroll to status message
                    formStatus.scrollIntoView({ behavior: 'smooth', block: 'center' });
                } else {
                    formStatus.className = 'form-status form-status--error';
                    formStatus.textContent = result.message || 'An error occurred. Please try again or contact us directly.';
                }

            } catch (error) {
                console.error('Form submission error:', error);
                formStatus.className = 'form-status form-status--error';
                formStatus.textContent = 'An error occurred. Please try again or contact us directly at info@vpinternationals.com';
            } finally {
                submitBtn.classList.remove('is-loading');
                submitBtn.disabled = false;
            }
        });
    }

    // FAQ Accordion
    const faqQuestions = document.querySelectorAll('.faq-item__question');
    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            const answer = document.getElementById(this.getAttribute('aria-controls'));

            // Close all other FAQs
            faqQuestions.forEach(function(q) {
                q.setAttribute('aria-expanded', 'false');
                const a = document.getElementById(q.getAttribute('aria-controls'));
                if (a) a.hidden = true;
            });

            // Toggle current
            if (!expanded) {
                this.setAttribute('aria-expanded', 'true');
                if (answer) answer.hidden = false;
            }
        });
    });

    // Open chat button
    const openChatBtn = document.getElementById('open-chat-btn');
    if (openChatBtn) {
        openChatBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (typeof Tawk_API !== 'undefined' && Tawk_API.maximize) {
                Tawk_API.maximize();
            }
        });
    }

})();
</script>

<?php
// Include footer
require_once __DIR__ . '/includes/footer.php';
?>
