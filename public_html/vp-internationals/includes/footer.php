<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - FOOTER TEMPLATE
 * ═══════════════════════════════════════════════════════════════
 *
 * Global footer template with newsletter, contact info,
 * LocalBusiness schema, and optimized scripts.
 *
 * @package     VPInternationals
 * @subpackage  Templates
 * @author      VP Internationals
 * @copyright   2016-2025 VP Internationals
 * @license     Proprietary
 * @version     2.0.0
 *
 * IMPROVEMENTS IMPLEMENTED:
 * - Points 75-78: Security (CSRF, reCAPTCHA, obfuscation)
 * - Points 79-82: Performance (lazy load, defer, conditional GSAP)
 * - Points 83-90: Accessibility (ARIA, focus styles, labels)
 * - Points 91-96: SEO (LocalBusiness schema)
 * - Points 97-109: Content optimization
 * ═══════════════════════════════════════════════════════════════
 */

// Prevent direct access
if (!defined('VP_ACCESS')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

// ─────────────────────────────────────────────────────────────────
// POINT 75-76: CSRF TOKEN GENERATION FOR NEWSLETTER
// ─────────────────────────────────────────────────────────────────
/**
 * Generate CSRF token if not exists
 */
function generate_csrf_token(): string
{
    if (!isset($_SESSION[CSRF_TOKEN_NAME]) || !isset($_SESSION[CSRF_TOKEN_NAME . '_time'])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
        $_SESSION[CSRF_TOKEN_NAME . '_time'] = time();
    }

    // Check if token has expired (Point 10 from config.php)
    if (time() - $_SESSION[CSRF_TOKEN_NAME . '_time'] > CSRF_TOKEN_EXPIRY) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
        $_SESSION[CSRF_TOKEN_NAME . '_time'] = time();
    }

    return $_SESSION[CSRF_TOKEN_NAME];
}

$csrf_token = generate_csrf_token();

// ─────────────────────────────────────────────────────────────────
// POINTS 91-96: LOCALBUSINESS SCHEMA
// ─────────────────────────────────────────────────────────────────
/**
 * Generate LocalBusiness schema with complete information
 */
function generate_local_business_schema(): string
{
    // Point 92: Opening Hours Specification
    $openingHours = [];
    $dayMapping = [
        'monday' => 'Monday',
        'tuesday' => 'Tuesday',
        'wednesday' => 'Wednesday',
        'thursday' => 'Thursday',
        'friday' => 'Friday',
        'saturday' => 'Saturday',
        'sunday' => 'Sunday'
    ];

    foreach (BUSINESS_HOURS as $day => $hours) {
        if ($hours !== null) {
            $openingHours[] = [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => $dayMapping[$day],
                'opens' => $hours['open'],
                'closes' => $hours['close']
            ];
        }
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => SITE_URL . '#localbusiness',
        'name' => COMPANY_NAME,
        'description' => SEO_DEFAULT_DESCRIPTION,
        'url' => SITE_URL,
        'telephone' => COMPANY_PHONE,
        'email' => COMPANY_EMAIL,
        'image' => SITE_URL . 'assets/images/logo.png',
        'logo' => SITE_URL . 'assets/images/logo.png',

        // Point 93: Geo coordinates
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => COMPANY_COORDINATES['latitude'],
            'longitude' => COMPANY_COORDINATES['longitude']
        ],

        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => COMPANY_ADDRESS['street'],
            'addressLocality' => COMPANY_ADDRESS['city'],
            'addressRegion' => COMPANY_ADDRESS['state'],
            'postalCode' => COMPANY_ADDRESS['postal_code'],
            'addressCountry' => COMPANY_ADDRESS['country']
        ],

        // Point 94: Price range
        'priceRange' => '$$',

        // Point 95: Payment accepted
        'paymentAccepted' => 'Cash, Credit Card, Bank Transfer, PayPal',

        // Point 96: Area served
        'areaServed' => array_map(function($area) {
            return [
                '@type' => 'Country',
                'name' => $area['country']
            ];
        }, SERVICE_AREAS),

        // Opening hours
        'openingHoursSpecification' => $openingHours,

        // Additional info
        'foundingDate' => (string) COMPANY_FOUNDING_YEAR,
        'sameAs' => array_values(SOCIAL_LINKS),
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Business Services',
            'itemListElement' => array_map(function($service) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['name'],
                        'description' => $service['short_description']
                    ]
                ];
            }, SERVICES)
        ]
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// Footer link groups (Point 108: Reusable component)
$footer_services = [
    ['name' => 'CV & Resume Formatting', 'url' => SITE_URL . 'cv-formatting'],
    ['name' => 'Web Design & Development', 'url' => SITE_URL . 'web-design-development'],
    ['name' => 'SEO Services', 'url' => SITE_URL . 'seo-services'],
    ['name' => 'Graphic Design & Branding', 'url' => SITE_URL . 'graphic-design'],
    ['name' => 'Data Entry & Processing', 'url' => SITE_URL . 'data-entry-processing'],
    ['name' => 'Web Application Development', 'url' => SITE_URL . 'web-application-development']
];

$footer_company = [
    ['name' => 'About Us', 'url' => SITE_URL . 'about'],
    ['name' => 'Portfolio & Case Studies', 'url' => SITE_URL . 'portfolio'],
    ['name' => 'Blog & Insights', 'url' => SITE_URL . 'blog'],
    ['name' => 'Careers', 'url' => SITE_URL . 'careers'],
    ['name' => 'Contact Us', 'url' => SITE_URL . 'contact']
];

$footer_support = [
    ['name' => 'FAQ', 'url' => SITE_URL . 'faq'],
    ['name' => 'Privacy Policy', 'url' => SITE_URL . 'privacy-policy'],
    ['name' => 'Terms & Conditions', 'url' => SITE_URL . 'terms-conditions'],
    ['name' => 'Refund Policy', 'url' => SITE_URL . 'refund-policy'],
    ['name' => 'Sitemap', 'url' => SITE_URL . 'sitemap']
];
?>
    </main>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- FOOTER (Point 85: role="contentinfo") -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <footer class="site-footer" role="contentinfo">

        <!-- Newsletter Section (Points 104-107) -->
        <section class="footer__newsletter" aria-labelledby="newsletter-heading">
            <div class="container">
                <div class="newsletter__content">
                    <div class="newsletter__text">
                        <!-- Point 104: Rewritten heading -->
                        <h2 id="newsletter-heading" class="newsletter__title">
                            Subscribe for Expert Tips & Exclusive Offers
                        </h2>
                        <!-- Point 105: Rewritten description -->
                        <p class="newsletter__description">
                            Get weekly insights on CV writing, web design trends, and SEO strategies delivered to your inbox.
                        </p>
                    </div>

                    <!-- Points 75-76: Newsletter form with CSRF and reCAPTCHA -->
                    <form class="newsletter__form"
                          id="newsletter-form"
                          action="<?php echo SITE_URL; ?>newsletter-submit"
                          method="POST"
                          aria-describedby="newsletter-privacy">

                        <!-- Point 75: CSRF Token -->
                        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">

                        <!-- Point 76: reCAPTCHA token placeholder (filled by JS) -->
                        <input type="hidden" name="recaptcha_token" id="recaptcha-token">

                        <div class="newsletter__input-group">
                            <!-- Point 86: Proper label association -->
                            <label for="newsletter-email" class="visually-hidden">Email Address</label>
                            <input type="email"
                                   id="newsletter-email"
                                   name="email"
                                   class="newsletter__input"
                                   placeholder="Enter your email address"
                                   required
                                   autocomplete="email"
                                   aria-required="true"
                                   aria-describedby="newsletter-error">

                            <!-- Point 106: Updated button text -->
                            <button type="submit" class="newsletter__button">
                                Subscribe Now
                                <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Point 87: Error message container with aria-describedby -->
                        <p id="newsletter-error" class="newsletter__error" role="alert" aria-live="polite" hidden></p>

                        <!-- Point 107: Privacy text -->
                        <p id="newsletter-privacy" class="newsletter__privacy">
                            We respect your privacy. Unsubscribe anytime.
                        </p>
                    </form>
                </div>
            </div>
        </section>

        <!-- Main Footer Content -->
        <div class="footer__main">
            <div class="container">
                <div class="footer__grid">

                    <!-- Company Info Column -->
                    <div class="footer__column footer__column--brand">
                        <a href="<?php echo SITE_URL; ?>" class="footer__logo" aria-label="<?php echo COMPANY_NAME; ?> Home">
                            <svg class="footer__logo-icon" viewBox="0 0 48 48" width="48" height="48" aria-hidden="true">
                                <circle cx="24" cy="24" r="22" fill="#83c601"/>
                                <text x="24" y="30" text-anchor="middle" fill="#0a0e27" font-size="20" font-weight="bold">VP</text>
                            </svg>
                            <span class="footer__logo-text">VP <span>Internationals</span></span>
                        </a>

                        <!-- Point 97: Keyword-rich tagline -->
                        <p class="footer__tagline">
                            Professional CV Formatting, Web Design & Digital Marketing Services
                        </p>

                        <!-- Point 98: Keyword-rich description -->
                        <p class="footer__description">
                            VP Internationals delivers ISO-certified CV formatting, web design, SEO, and data entry services to businesses in UK, USA, Australia, and Canada since 2016.
                        </p>

                        <!-- Point 101: Trust signals -->
                        <p class="footer__trust">
                            <strong>ISO 9001:2015 & ISO 27001:2022 Certified</strong><br>
                            50,000+ Projects Delivered | 98% Client Retention Rate
                        </p>

                        <!-- Social Links (Point 84: aria-label for each) -->
                        <div class="footer__social">
                            <span class="footer__social-label">Follow Us:</span>
                            <a href="<?php echo SOCIAL_LINKS['facebook']; ?>"
                               class="footer__social-link"
                               aria-label="Follow VP Internationals on Facebook"
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="<?php echo SOCIAL_LINKS['twitter']; ?>"
                               class="footer__social-link"
                               aria-label="Follow VP Internationals on Twitter"
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            <a href="<?php echo SOCIAL_LINKS['linkedin']; ?>"
                               class="footer__social-link"
                               aria-label="Follow VP Internationals on LinkedIn"
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                            <a href="<?php echo SOCIAL_LINKS['instagram']; ?>"
                               class="footer__social-link"
                               aria-label="Follow VP Internationals on Instagram"
                               target="_blank"
                               rel="noopener noreferrer">
                                <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Point 99-100: Services Links with full keyword names -->
                    <div class="footer__column">
                        <h3 class="footer__heading">Our Services</h3>
                        <ul class="footer__links">
                            <?php foreach ($footer_services as $link): ?>
                            <li>
                                <a href="<?php echo $link['url']; ?>" class="footer__link">
                                    <?php echo htmlspecialchars($link['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Company Links -->
                    <div class="footer__column">
                        <h3 class="footer__heading">Company</h3>
                        <ul class="footer__links">
                            <?php foreach ($footer_company as $link): ?>
                            <li>
                                <a href="<?php echo $link['url']; ?>" class="footer__link">
                                    <?php echo htmlspecialchars($link['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Support Links -->
                    <div class="footer__column">
                        <h3 class="footer__heading">Support</h3>
                        <ul class="footer__links">
                            <?php foreach ($footer_support as $link): ?>
                            <li>
                                <a href="<?php echo $link['url']; ?>" class="footer__link">
                                    <?php echo htmlspecialchars($link['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Point 102: Contact Section with updated heading -->
                    <div class="footer__column footer__column--contact">
                        <h3 class="footer__heading">Get In Touch - Free Consultation</h3>

                        <address class="footer__contact">
                            <!-- Point 103: Location text -->
                            <p class="footer__contact-location">
                                Serving clients globally from Vadodara, India
                            </p>

                            <div class="footer__contact-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                                </svg>
                                <span><?php echo htmlspecialchars(COMPANY_ADDRESS['full']); ?></span>
                            </div>

                            <!-- Point 78: Obfuscated phone -->
                            <div class="footer__contact-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                                </svg>
                                <?php echo vp_obfuscate_phone(PHONE_DISPLAY, true); ?>
                            </div>

                            <!-- Point 77: Obfuscated email -->
                            <div class="footer__contact-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                                <?php echo vp_obfuscate_email(COMPANY_EMAIL, true); ?>
                            </div>

                            <!-- WhatsApp (Point 80: Using config constant) -->
                            <div class="footer__contact-item">
                                <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', WHATSAPP_NUMBER); ?>"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   aria-label="Chat with us on WhatsApp">
                                    WhatsApp Us
                                </a>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom-content">
                    <!-- Point 109: Dynamic copyright year -->
                    <p class="footer__copyright">
                        &copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All Rights Reserved.
                    </p>
                    <p class="footer__made-with">
                        Made with <span aria-label="love">❤</span> in India for the World
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- Back to Top Button (Points 88-90) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <button type="button"
            class="back-to-top"
            id="back-to-top"
            aria-label="Back to top"
            hidden>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 4l-8 8h5v8h6v-8h5z" fill="currentColor"/>
        </svg>
    </button>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- LocalBusiness Schema (Points 91-96) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <?php echo generate_local_business_schema(); ?>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- SCRIPTS (Points 79-82) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->

    <!-- Main JavaScript (Point 81: defer) -->
    <script src="<?php echo SITE_URL; ?>assets/js/main.js?v=2.0" defer></script>

    <!-- Point 82: Conditionally load GSAP only on pages that need animations -->
    <?php if (isset($page_has_animations) && $page_has_animations): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js" defer></script>
    <?php endif; ?>

    <!-- Point 76: reCAPTCHA v3 (only on pages with forms) -->
    <?php if (!empty(RECAPTCHA_SITE_KEY) && (isset($page_has_forms) && $page_has_forms)): ?>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo RECAPTCHA_SITE_KEY; ?>" defer></script>
    <script>
        // Initialize reCAPTCHA after it loads
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.ready(function() {
                    // Get token for newsletter form
                    const newsletterForm = document.getElementById('newsletter-form');
                    if (newsletterForm) {
                        newsletterForm.addEventListener('submit', function(e) {
                            e.preventDefault();
                            grecaptcha.execute('<?php echo RECAPTCHA_SITE_KEY; ?>', {action: 'newsletter'})
                                .then(function(token) {
                                    document.getElementById('recaptcha-token').value = token;
                                    newsletterForm.submit();
                                });
                        });
                    }
                });
            }
        });
    </script>
    <?php endif; ?>

    <!-- Point 79: Lazy load Tawk.to chat widget -->
    <?php if (!empty(TAWKTO_PROPERTY_ID) && !empty(TAWKTO_WIDGET_ID) && EnvLoader::isProduction()): ?>
    <script>
        // Load Tawk.to after user interaction or 5 second delay
        var tawkLoaded = false;
        function loadTawkTo() {
            if (tawkLoaded) return;
            tawkLoaded = true;

            var s1 = document.createElement("script");
            s1.async = true;
            s1.src = 'https://embed.tawk.to/<?php echo TAWKTO_PROPERTY_ID; ?>/<?php echo TAWKTO_WIDGET_ID; ?>';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            document.body.appendChild(s1);
        }

        // Load on scroll, click, or after 5 seconds
        ['scroll', 'click', 'touchstart'].forEach(function(event) {
            document.addEventListener(event, loadTawkTo, {once: true, passive: true});
        });
        setTimeout(loadTawkTo, 5000);
    </script>
    <?php endif; ?>

    <!-- Back to Top Button Script (Point 88-90) -->
    <script>
        (function() {
            var backToTop = document.getElementById('back-to-top');
            if (!backToTop) return;

            // Show/hide based on scroll position (Point 90)
            var lastScrollY = window.scrollY;
            var showThreshold = 300;

            function updateBackToTop() {
                var scrollY = window.scrollY;
                if (scrollY > showThreshold) {
                    backToTop.hidden = false;
                } else {
                    backToTop.hidden = true;
                }
                lastScrollY = scrollY;
            }

            // Throttle scroll handler
            var ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    window.requestAnimationFrame(function() {
                        updateBackToTop();
                        ticking = false;
                    });
                    ticking = true;
                }
            }, {passive: true});

            // Point 88: Smooth scroll on click
            backToTop.addEventListener('click', function() {
                // Point 215 (from main.js): Respect prefers-reduced-motion
                var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
                window.scrollTo({
                    top: 0,
                    behavior: prefersReducedMotion ? 'auto' : 'smooth'
                });
            });

            // Initial check
            updateBackToTop();
        })();
    </script>

    <!-- Page-specific scripts -->
    <?php if (isset($page_js) && is_array($page_js)): ?>
        <?php foreach ($page_js as $script): ?>
    <script src="<?php echo SITE_URL; ?>assets/js/<?php echo htmlspecialchars($script); ?>.js?v=2.0" defer></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
