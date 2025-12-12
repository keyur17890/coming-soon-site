<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - HOMEPAGE
 * ═══════════════════════════════════════════════════════════════
 *
 * Main landing page with hero, services, benefits, stats,
 * testimonials, process, FAQ, and CTA sections.
 *
 * IMPROVEMENTS IMPLEMENTED:
 * - Points 219-220: CSS extraction to external file
 * - Points 221-223: Dynamic content from config
 * - Points 224-226: Image optimization
 * - Points 227-231: SEO Schema (FAQ, Breadcrumb, WebPage)
 * - Points 232-234: Accessibility (headings, ARIA, links)
 * - Points 235-243: Component conversion & GSAP animations
 * - Points 244-314: SEO content optimization
 * ═══════════════════════════════════════════════════════════════
 */

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// PAGE CONFIGURATION
// ─────────────────────────────────────────────────────────────────

// Point 244: Meta title (60 chars)
$page_title = 'Professional CV Formatting, Web Design & SEO Services';

// Point 245: Meta description (155 chars)
$page_description = 'ISO-certified CV formatting, web design, SEO & data entry services for UK, USA & Australia businesses. 50,000+ projects delivered. Get free quote today!';

// Point 246: Meta keywords
$page_keywords = 'CV formatting service UK, professional web design, SEO agency, data entry outsourcing, graphic design services';

$current_page = 'home';
$page_type = 'website';
$page_css = ['home']; // Point 220: Page-specific CSS
$page_has_animations = true; // Enable GSAP
$page_has_forms = true; // Enable reCAPTCHA

// Point 228: Breadcrumb (single item for homepage)
$breadcrumbs = [];

// ─────────────────────────────────────────────────────────────────
// TESTIMONIALS DATA (Point 222: From config or database)
// ─────────────────────────────────────────────────────────────────
$testimonials = [
    // Point 293: Industry-specific testimonials
    [
        'quote' => 'VP Internationals transformed our CV processing workflow. Their team formats over 200 CVs weekly for us with consistent quality and quick turnaround. A true partner for any recruitment agency.',
        'author' => 'Sarah Mitchell',
        'position' => 'Operations Director',
        'company' => 'Elite Recruitment Group',
        'location' => 'London, UK',
        'image' => 'testimonial-1.jpg',
        'rating' => 5
    ],
    [
        'quote' => 'The website they built for us increased our online enquiries by 150% in just 3 months. Professional, responsive, and they truly understand business needs.',
        'author' => 'James Anderson',
        'position' => 'Managing Director',
        'company' => 'Anderson & Co Solicitors',
        'location' => 'Manchester, UK',
        'image' => 'testimonial-2.jpg',
        'rating' => 5
    ],
    [
        'quote' => 'We\'ve been using their data entry services for 2 years. 99.9% accuracy, GDPR compliant, and their ISO certification gives us complete peace of mind.',
        'author' => 'Michael Chen',
        'position' => 'CEO',
        'company' => 'DataFirst Solutions',
        'location' => 'Sydney, Australia',
        'image' => 'testimonial-3.jpg',
        'rating' => 5
    ]
];

// ─────────────────────────────────────────────────────────────────
// FAQ DATA (Points 299-305)
// ─────────────────────────────────────────────────────────────────
$faqs = [
    [
        'question' => 'What services does VP Internationals offer?',
        'answer' => 'We offer six core services: CV & Resume Formatting (ATS-optimized for UK, USA, Australia markets), Web Design & Development (WordPress, Shopify, custom), SEO Services (on-page, off-page, technical, local), Graphic Design & Branding (logos, marketing materials), Data Entry & Processing (GDPR compliant, 99.9% accuracy), and Web Application Development (React, Node.js, PHP).'
    ],
    [
        'question' => 'Which countries do you serve?',
        'answer' => 'We serve clients globally with a primary focus on the United Kingdom, United States, Australia, Canada, and India. Our team works across multiple time zones to ensure prompt communication and delivery regardless of your location.'
    ],
    [
        'question' => 'What are your turnaround times?',
        'answer' => 'Turnaround varies by service: CV Formatting (24-48 hours standard, same-day express available), Web Design (2-6 weeks depending on complexity), SEO (ongoing monthly service), Graphic Design (3-7 days), Data Entry (24-72 hours for standard projects). Rush delivery is available for most services.'
    ],
    [
        'question' => 'Are your services ISO certified?',
        'answer' => 'Yes, VP Internationals holds dual ISO certification: ISO 9001:2015 for Quality Management ensuring consistent service delivery, and ISO 27001:2022 for Information Security Management protecting your sensitive data. These certifications are independently audited annually.'
    ],
    [
        'question' => 'How do I get started?',
        'answer' => 'Getting started is easy: 1) Contact us via our form, email, or phone with your requirements. 2) Receive a detailed quote within 2 business hours. 3) Approve the quote and share your materials. 4) We deliver quality work within the agreed timeframe. No long-term contracts required.'
    ],
    [
        'question' => 'What payment methods do you accept?',
        'answer' => 'We accept multiple payment methods for your convenience: Bank Transfer (GBP, USD, AUD, EUR, INR), PayPal, Credit/Debit Cards (Visa, Mastercard, Amex), and Wise (TransferWise) for international payments. We offer flexible payment terms for ongoing partnerships.'
    ]
];

// Include header
include INCLUDES_PATH . '/header.php';
?>

    <!-- ═══════════════════════════════════════════════════════════════
         HERO SECTION (Points 247-252)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__background">
            <div class="hero__gradient"></div>
            <div class="hero__pattern"></div>
        </div>

        <div class="container">
            <div class="hero__content" data-animate="fade-up">
                <!-- Point 247: Hero badge -->
                <span class="hero__badge" data-animate="fade-up" data-delay="0.1">
                    <svg class="hero__badge-icon" width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                    ISO 9001 & ISO 27001 Certified Since 2016
                </span>

                <!-- Point 248: Hero H1 -->
                <h1 id="hero-title" class="hero__title" data-animate="fade-up" data-delay="0.2">
                    Professional Business Services That <span>Drive Results</span>
                </h1>

                <!-- Point 249: Hero subtitle -->
                <p class="hero__subtitle" data-animate="fade-up" data-delay="0.3">
                    CV Formatting • Web Design • SEO • Data Entry • Graphic Design — Trusted by 500+ Companies Across UK, USA & Australia
                </p>

                <!-- Points 250-251: CTA buttons -->
                <div class="hero__cta-group" data-animate="fade-up" data-delay="0.4">
                    <a href="<?php echo SITE_URL; ?>contact" class="btn btn--primary btn--lg">
                        Get Your Free Quote
                        <svg class="btn__icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo SITE_URL; ?>services" class="btn btn--secondary btn--lg">
                        Explore Our Services
                    </a>
                </div>

                <!-- Point 252: Hero trust strip -->
                <div class="hero__trust" data-animate="fade-up" data-delay="0.5">
                    <div class="hero__trust-item">
                        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="#fbbf24" d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                        </svg>
                        <span><strong>4.9/5</strong> from 500+ Reviews</span>
                    </div>
                    <div class="hero__trust-divider"></div>
                    <div class="hero__trust-item">
                        <span><strong>50,000+</strong> Projects Delivered</span>
                    </div>
                    <div class="hero__trust-divider"></div>
                    <div class="hero__trust-item">
                        <span><strong>98%</strong> Client Retention</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <a href="#services" class="hero__scroll" aria-label="Scroll to services">
            <span class="hero__scroll-text">Scroll</span>
            <svg class="hero__scroll-icon" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
                <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12l7 7 7-7"/>
            </svg>
        </a>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         SERVICES SECTION (Points 253-273)
         ═══════════════════════════════════════════════════════════════ -->
    <section id="services" class="section section--dark" aria-labelledby="services-title">
        <div class="container">
            <!-- Point 253-255: Section header -->
            <header class="section-header" data-animate="fade-up">
                <span class="section-header__badge">What We Offer</span>
                <h2 id="services-title" class="section-header__title">
                    Comprehensive Business Services for <span>Global Companies</span>
                </h2>
                <p class="section-header__subtitle">
                    From professionally formatted CVs to stunning websites, we deliver excellence across six core service areas.
                </p>
            </header>

            <!-- Service cards grid -->
            <div class="services-grid" data-animate-stagger="0.1">
                <!-- Point 256-258: CV Formatting -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H18C19.1 22 20 21.1 20 20V8L14 2M18 20H6V4H13V9H18V20M9 13V19H7V13H9M15 15V19H17V15H15M11 11V19H13V11H11Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">CV & Resume Formatting</h3>
                    <p class="service-card__description">
                        ATS-optimized CV formatting for UK, USA, Australian & Canadian markets. Professional templates that get interviews.
                    </p>
                    <ul class="service-card__features">
                        <li>ATS-Friendly Formats</li>
                        <li>24-Hour Turnaround</li>
                        <li>Bulk Discounts</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>cv-formatting" class="service-card__link" title="Professional CV Formatting Services for UK, USA & Australia">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>

                <!-- Point 259-261: Web Design -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M16.36 14C16.44 13.34 16.5 12.68 16.5 12C16.5 11.32 16.44 10.66 16.36 10H19.74C19.9 10.64 20 11.31 20 12C20 12.69 19.9 13.36 19.74 14M14.59 19.56C15.19 18.45 15.65 17.25 15.97 16H18.92C17.96 17.65 16.43 18.93 14.59 19.56M14.34 14H9.66C9.56 13.34 9.5 12.68 9.5 12C9.5 11.32 9.56 10.65 9.66 10H14.34C14.43 10.65 14.5 11.32 14.5 12C14.5 12.68 14.43 13.34 14.34 14M12 19.96C11.17 18.76 10.5 17.43 10.09 16H13.91C13.5 17.43 12.83 18.76 12 19.96M8 8H5.08C6.03 6.34 7.57 5.06 9.4 4.44C8.8 5.55 8.35 6.75 8 8M5.08 16H8C8.35 17.25 8.8 18.45 9.4 19.56C7.57 18.93 6.03 17.65 5.08 16M4.26 14C4.1 13.36 4 12.69 4 12C4 11.31 4.1 10.64 4.26 10H7.64C7.56 10.66 7.5 11.32 7.5 12C7.5 12.68 7.56 13.34 7.64 14M12 4.03C12.83 5.23 13.5 6.57 13.91 8H10.09C10.5 6.57 11.17 5.23 12 4.03M18.92 8H15.97C15.65 6.75 15.19 5.55 14.59 4.44C16.43 5.07 17.96 6.34 18.92 8M12 2C6.47 2 2 6.5 2 12C2 17.5 6.47 22 12 22C17.5 22 22 17.5 22 12C22 6.5 17.5 2 12 2Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">Web Design & Development</h3>
                    <p class="service-card__description">
                        Custom responsive websites built for conversions. WordPress, Shopify & custom development for businesses of all sizes.
                    </p>
                    <ul class="service-card__features">
                        <li>Mobile-First Design</li>
                        <li>SEO Optimized</li>
                        <li>Fast Loading</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>web-design-development" class="service-card__link" title="Custom Web Design & Development Services">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>

                <!-- Point 262-264: SEO Services -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M16 6L18.29 8.29L13.41 13.17L9.41 9.17L2 16.59L3.41 18L9.41 12L13.41 16L19.71 9.71L22 12V6H16Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">Search Engine Optimization</h3>
                    <p class="service-card__description">
                        Data-driven SEO strategies that improve rankings & drive organic traffic. Local, national & international SEO expertise.
                    </p>
                    <ul class="service-card__features">
                        <li>On-Page & Off-Page SEO</li>
                        <li>Technical Audits</li>
                        <li>Monthly Reporting</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>seo-services" class="service-card__link" title="Search Engine Optimization Services">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>

                <!-- Point 265-267: Graphic Design -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M20.71 4.04C21.1 3.65 21.1 3 20.71 2.63L18.37 0.29C18 -0.1 17.35 -0.1 16.96 0.29L15 2.25L18.75 6M17.75 7L14 3.25L4 13.25V17H7.75L17.75 7Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">Graphic Design & Branding</h3>
                    <p class="service-card__description">
                        Eye-catching logos, brand identities & marketing materials that make your business stand out from competitors.
                    </p>
                    <ul class="service-card__features">
                        <li>Logo Design</li>
                        <li>Brand Identity</li>
                        <li>Marketing Materials</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>graphic-design" class="service-card__link" title="Professional Graphic Design & Brand Identity Services">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>

                <!-- Point 268-270: Data Entry -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M12 3C7.58 3 4 4.79 4 7V17C4 19.21 7.59 21 12 21S20 19.21 20 17V7C20 4.79 16.42 3 12 3M18 17C18 17.5 15.87 19 12 19S6 17.5 6 17V14.77C7.61 15.55 9.72 16 12 16S16.39 15.55 18 14.77V17M18 12.45C16.7 13.4 14.42 14 12 14C9.58 14 7.3 13.4 6 12.45V9.64C7.47 10.47 9.61 11 12 11C14.39 11 16.53 10.47 18 9.64V12.45M12 9C8.13 9 6 7.5 6 7S8.13 5 12 5C15.87 5 18 6.5 18 7S15.87 9 12 9Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">Data Entry & Processing</h3>
                    <p class="service-card__description">
                        Accurate, secure & GDPR-compliant data entry services. 99.9% accuracy guaranteed with ISO 27001 certification.
                    </p>
                    <ul class="service-card__features">
                        <li>99.9% Accuracy</li>
                        <li>GDPR Compliant</li>
                        <li>Quick Turnaround</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>data-entry-processing" class="service-card__link" title="Secure Data Entry & Processing Services">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>

                <!-- Point 271-273: Web Apps -->
                <article class="service-card" data-animate="fade-up">
                    <div class="service-card__icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8 3C6.9 3 6 3.9 6 5V9C6 10.1 6.9 11 8 11H10V13H6V15H10V21H12V15H16V13H12V11H14C15.1 11 16 10.1 16 9V5C16 3.9 15.1 3 14 3H8M8 5H14V9H8V5M14 15V17H16V15H14M18 15V17H20V15H18M14 19V21H16V19H14M18 19V21H20V19H18Z"/>
                        </svg>
                    </div>
                    <h3 class="service-card__title">Web Application Development</h3>
                    <p class="service-card__description">
                        Custom web applications, SaaS platforms & API integrations using React, Node.js, Python & PHP frameworks.
                    </p>
                    <ul class="service-card__features">
                        <li>Custom Solutions</li>
                        <li>Scalable Architecture</li>
                        <li>Ongoing Support</li>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>web-application-development" class="service-card__link" title="Custom Web Application Development">
                        Learn More
                        <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                        </svg>
                    </a>
                </article>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         WHY CHOOSE US SECTION (Points 274-284)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="section" aria-labelledby="why-title">
        <div class="container">
            <header class="section-header" data-animate="fade-up">
                <span class="section-header__badge">Why VP Internationals</span>
                <h2 id="why-title" class="section-header__title">
                    The Trusted Partner for <span>500+ Global Businesses</span>
                </h2>
                <p class="section-header__subtitle">
                    Since 2016, we've delivered excellence through quality, security, and client-focused service.
                </p>
            </header>

            <div class="benefits-grid" data-animate-stagger="0.1">
                <!-- Point 277-278: ISO Certified Quality -->
                <div class="benefit-card" data-animate="fade-up">
                    <div class="benefit-card__icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M23 12L20.56 9.22L20.9 5.54L17.29 4.72L15.4 1.54L12 3L8.6 1.54L6.71 4.72L3.1 5.53L3.44 9.21L1 12L3.44 14.78L3.1 18.47L6.71 19.29L8.6 22.47L12 21L15.4 22.46L17.29 19.28L20.9 18.46L20.56 14.78L23 12M10 17L6 13L7.41 11.59L10 14.17L16.59 7.58L18 9L10 17Z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-card__title">ISO Certified Quality</h3>
                    <p class="benefit-card__description">
                        Dual ISO certification (9001:2015 & 27001:2022) ensures consistent quality and data security across all projects.
                    </p>
                </div>

                <!-- Point 279-280: Industry Expertise -->
                <div class="benefit-card" data-animate="fade-up">
                    <div class="benefit-card__icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M12 3L1 9L12 15L21 10.09V17H23V9M5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-card__title">Industry Expertise</h3>
                    <p class="benefit-card__description">
                        8+ years serving recruitment agencies, corporates & SMEs across UK, USA, Australia, and Canada markets.
                    </p>
                </div>

                <!-- Point 281-282: Quick Turnaround -->
                <div class="benefit-card" data-animate="fade-up">
                    <div class="benefit-card__icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M12 20C16.4 20 20 16.4 20 12S16.4 4 12 4 4 7.6 4 12 7.6 20 12 20M12 2C17.5 2 22 6.5 22 12S17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2M17 13.9L16.3 15.2L11 12.3V7H12.5V11.4L17 13.9Z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-card__title">Quick Turnaround</h3>
                    <p class="benefit-card__description">
                        Fast delivery without compromising quality. Most projects completed within 24-48 hours of confirmation.
                    </p>
                </div>

                <!-- Point 283-284: Dedicated Support -->
                <div class="benefit-card" data-animate="fade-up">
                    <div class="benefit-card__icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M21 12.22C21 6.73 16.74 3 12 3C7.31 3 3 6.65 3 12.28C2.4 12.62 2 13.26 2 14V16C2 17.1 2.9 18 4 18H5V11.9C5 8.03 8.13 4.9 12 4.9S19 8.03 19 11.9V19H11V21H19C20.1 21 21 20.1 21 19V17.78C21.59 17.47 22 16.86 22 16.14V14.06C22 13.28 21.59 12.57 21 12.22Z"/>
                            <path fill="currentColor" d="M9 14C9.55 14 10 13.55 10 13S9.55 12 9 12 8 12.45 8 13 8.45 14 9 14M15 14C15.55 14 16 13.55 16 13S15.55 12 15 12 14 12.45 14 13 14.45 14 15 14M18 11.03C17.52 8.18 15.04 6 12.05 6C9.02 6 5.76 8.51 6.02 12.45C8.49 11.44 10.35 9.24 10.88 6.56C12.19 9.19 14.88 11 18 11.03Z"/>
                        </svg>
                    </div>
                    <h3 class="benefit-card__title">Dedicated Support</h3>
                    <p class="benefit-card__description">
                        Personal account managers, direct communication channels, and support across multiple time zones.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         STATISTICS SECTION (Points 285-289)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="stats-section section--dark" aria-labelledby="stats-title">
        <div class="container">
            <h2 id="stats-title" class="visually-hidden">Our Achievements</h2>

            <div class="stats-grid" data-animate-stagger="0.15">
                <!-- Point 285 -->
                <div class="stat-card" data-animate="fade-up">
                    <span class="stat-card__number" data-count="8">8+</span>
                    <span class="stat-card__label">Years of Excellence</span>
                </div>

                <!-- Point 286 -->
                <div class="stat-card" data-animate="fade-up">
                    <span class="stat-card__number" data-count="50000">50,000+</span>
                    <span class="stat-card__label">Projects Delivered</span>
                </div>

                <!-- Point 287 -->
                <div class="stat-card" data-animate="fade-up">
                    <span class="stat-card__number" data-count="500">500+</span>
                    <span class="stat-card__label">Happy Clients</span>
                </div>

                <!-- Point 288 -->
                <div class="stat-card" data-animate="fade-up">
                    <span class="stat-card__number" data-count="98">98%</span>
                    <span class="stat-card__label">Client Retention</span>
                </div>
            </div>

            <!-- Point 289: Context text -->
            <p class="stats-section__context" data-animate="fade-up">
                Trusted by recruitment agencies, law firms, healthcare providers, and enterprises worldwide.
            </p>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         PROCESS SECTION (Points 294-298)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="section" aria-labelledby="process-title">
        <div class="container">
            <header class="section-header" data-animate="fade-up">
                <span class="section-header__badge">Our Process</span>
                <h2 id="process-title" class="section-header__title">
                    How We <span>Work</span>
                </h2>
                <p class="section-header__subtitle">
                    A simple, transparent process designed to deliver results efficiently.
                </p>
            </header>

            <div class="process-steps" data-animate-stagger="0.15">
                <!-- Point 295 -->
                <div class="process-step" data-animate="fade-up">
                    <div class="process-step__number">01</div>
                    <h3 class="process-step__title">Share Your Requirements</h3>
                    <p class="process-step__description">
                        Tell us about your project needs through our contact form, email, or phone. The more details, the better we can help.
                    </p>
                </div>

                <div class="process-step__connector" aria-hidden="true">
                    <svg width="40" height="40" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                    </svg>
                </div>

                <!-- Point 296 -->
                <div class="process-step" data-animate="fade-up">
                    <div class="process-step__number">02</div>
                    <h3 class="process-step__title">Receive Custom Quote</h3>
                    <p class="process-step__description">
                        Get a detailed, transparent quote within 2 business hours. No hidden fees, no surprises.
                    </p>
                </div>

                <div class="process-step__connector" aria-hidden="true">
                    <svg width="40" height="40" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                    </svg>
                </div>

                <!-- Point 297 -->
                <div class="process-step" data-animate="fade-up">
                    <div class="process-step__number">03</div>
                    <h3 class="process-step__title">We Deliver Excellence</h3>
                    <p class="process-step__description">
                        Our expert team works on your project with precision and care, keeping you updated throughout.
                    </p>
                </div>

                <div class="process-step__connector" aria-hidden="true">
                    <svg width="40" height="40" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M8.59 16.59L13.17 12L8.59 7.41L10 6L16 12L10 18L8.59 16.59Z"/>
                    </svg>
                </div>

                <!-- Point 298 -->
                <div class="process-step" data-animate="fade-up">
                    <div class="process-step__number">04</div>
                    <h3 class="process-step__title">Review & Refine</h3>
                    <p class="process-step__description">
                        Review the deliverables and request revisions if needed. We're not done until you're 100% satisfied.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         TESTIMONIALS SECTION (Points 290-293)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="section section--dark" aria-labelledby="testimonials-title">
        <div class="container">
            <header class="section-header" data-animate="fade-up">
                <span class="section-header__badge">Testimonials</span>
                <h2 id="testimonials-title" class="section-header__title">
                    What Our <span>Clients Say</span>
                </h2>
                <p class="section-header__subtitle">
                    Don't just take our word for it — hear from businesses we've helped succeed.
                </p>
            </header>

            <div class="testimonials-grid" data-animate-stagger="0.15">
                <?php foreach ($testimonials as $index => $testimonial): ?>
                <article class="testimonial-card" data-animate="fade-up">
                    <div class="testimonial-card__rating" aria-label="<?php echo $testimonial['rating']; ?> out of 5 stars">
                        <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                        <svg width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="#fbbf24" d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                        </svg>
                        <?php endfor; ?>
                    </div>
                    <blockquote class="testimonial-card__quote">
                        "<?php echo htmlspecialchars($testimonial['quote']); ?>"
                    </blockquote>
                    <footer class="testimonial-card__author">
                        <div class="testimonial-card__avatar">
                            <?php echo strtoupper(substr($testimonial['author'], 0, 1)); ?>
                        </div>
                        <div class="testimonial-card__info">
                            <cite class="testimonial-card__name"><?php echo htmlspecialchars($testimonial['author']); ?></cite>
                            <span class="testimonial-card__role"><?php echo htmlspecialchars($testimonial['position']); ?>, <?php echo htmlspecialchars($testimonial['company']); ?></span>
                            <span class="testimonial-card__location"><?php echo htmlspecialchars($testimonial['location']); ?></span>
                        </div>
                    </footer>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         FAQ SECTION (Points 299-305)
         Point 227: FAQPage Schema
         ═══════════════════════════════════════════════════════════════ -->
    <section class="section" aria-labelledby="faq-title">
        <div class="container">
            <header class="section-header" data-animate="fade-up">
                <span class="section-header__badge">FAQ</span>
                <h2 id="faq-title" class="section-header__title">
                    Frequently Asked <span>Questions</span>
                </h2>
            </header>

            <div class="faq-container" data-animate="fade-up">
                <?php foreach ($faqs as $index => $faq): ?>
                <div class="faq__item">
                    <button type="button"
                            class="faq__question"
                            aria-expanded="false"
                            aria-controls="faq-answer-<?php echo $index; ?>"
                            id="faq-question-<?php echo $index; ?>">
                        <span><?php echo htmlspecialchars($faq['question']); ?></span>
                        <svg class="faq__icon" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" d="M7.41 8.59L12 13.17L16.59 8.59L18 10L12 16L6 10L7.41 8.59Z"/>
                        </svg>
                    </button>
                    <div class="faq__answer"
                         id="faq-answer-<?php echo $index; ?>"
                         aria-labelledby="faq-question-<?php echo $index; ?>"
                         hidden>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Point 227: FAQPage Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            <?php foreach ($faqs as $index => $faq): ?>
            {
                "@type": "Question",
                "name": <?php echo json_encode($faq['question']); ?>,
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": <?php echo json_encode($faq['answer']); ?>
                }
            }<?php echo $index < count($faqs) - 1 ? ',' : ''; ?>
            <?php endforeach; ?>
        ]
    }
    </script>

    <!-- ═══════════════════════════════════════════════════════════════
         CTA SECTION (Points 306-310)
         ═══════════════════════════════════════════════════════════════ -->
    <section class="cta-section" aria-labelledby="cta-title">
        <div class="cta-section__background">
            <div class="cta-section__gradient"></div>
        </div>
        <div class="container">
            <div class="cta-section__content" data-animate="fade-up">
                <!-- Point 306 -->
                <h2 id="cta-title" class="cta-section__title">
                    Ready to Elevate Your Business?
                </h2>

                <!-- Point 307 -->
                <p class="cta-section__subtitle">
                    Join 500+ companies who trust VP Internationals for their business service needs.
                </p>

                <!-- Points 308-309: CTA buttons -->
                <div class="cta-section__buttons">
                    <a href="<?php echo SITE_URL; ?>contact" class="btn btn--primary btn--lg">
                        Get Your Free Quote Today
                        <svg class="btn__icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="<?php echo SITE_URL; ?>contact#consultation" class="btn btn--outline btn--lg">
                        Schedule a Consultation
                    </a>
                </div>

                <!-- Point 310: Trust text -->
                <p class="cta-section__trust">
                    <svg width="16" height="16" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill="currentColor" d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                    No commitment required • Response within 2 hours • Free consultation
                </p>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════
         Point 229: WebPage Schema
         ═══════════════════════════════════════════════════════════════ -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "@id": "<?php echo SITE_URL; ?>#webpage",
        "url": "<?php echo SITE_URL; ?>",
        "name": "<?php echo vp_page_title($page_title); ?>",
        "description": "<?php echo htmlspecialchars($page_description); ?>",
        "isPartOf": {
            "@id": "<?php echo SITE_URL; ?>#website"
        },
        "about": {
            "@id": "<?php echo SITE_URL; ?>#organization"
        },
        "primaryImageOfPage": {
            "@type": "ImageObject",
            "url": "<?php echo SITE_URL; ?>assets/images/og-default.jpg"
        },
        "datePublished": "2016-01-01",
        "dateModified": "<?php echo date('Y-m-d'); ?>",
        "inLanguage": "en-GB"
    }
    </script>

    <!-- Point 231: SiteNavigationElement Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SiteNavigationElement",
        "name": "Main Navigation",
        "hasPart": [
            {"@type": "WebPage", "name": "Home", "url": "<?php echo SITE_URL; ?>"},
            {"@type": "WebPage", "name": "About Us", "url": "<?php echo SITE_URL; ?>about"},
            {"@type": "WebPage", "name": "CV Formatting", "url": "<?php echo SITE_URL; ?>cv-formatting"},
            {"@type": "WebPage", "name": "Web Design", "url": "<?php echo SITE_URL; ?>web-design-development"},
            {"@type": "WebPage", "name": "SEO Services", "url": "<?php echo SITE_URL; ?>seo-services"},
            {"@type": "WebPage", "name": "Contact", "url": "<?php echo SITE_URL; ?>contact"}
        ]
    }
    </script>

<?php
// Include footer
include INCLUDES_PATH . '/footer.php';
?>
