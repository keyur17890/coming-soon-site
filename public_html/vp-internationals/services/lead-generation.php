<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - B2B LEAD GENERATION SERVICE PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 681-740: Detailed lead generation service page with
 * features, pricing, process, and Service schema
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once dirname(__DIR__) . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 681-690: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'B2B Lead Generation Services | Qualified Leads on Demand | VP Internationals',
    'meta_description' => 'Get high-quality, verified B2B leads tailored to your ideal customer profile. 98% accuracy, CRM-ready delivery, dedicated support. Start generating leads today.',
    'meta_keywords' => 'B2B lead generation, qualified leads, sales leads, lead generation services, targeted leads, lead generation company, B2B prospecting, demand generation',
    'canonical_url' => SITE_URL . '/services/lead-generation',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/lead-generation-og.jpg',
    'body_class' => 'page-service page-lead-generation',
    'current_page' => 'services'
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services'],
    ['name' => 'B2B Lead Generation', 'url' => SITE_URL . '/services/lead-generation']
];

// ─────────────────────────────────────────────────────────────────
// POINT 691-700: SERVICE DATA
// ─────────────────────────────────────────────────────────────────
$service = [
    'name' => 'B2B Lead Generation',
    'tagline' => 'High-Quality Leads That Convert',
    'description' => 'Our B2B lead generation service delivers pre-qualified prospects that match your ideal customer profile. We use advanced data mining, intent signals, and multi-channel outreach to identify and engage decision-makers ready to buy.',
    'hero_stats' => [
        ['number' => '50M+', 'label' => 'Leads Delivered'],
        ['number' => '98%', 'label' => 'Accuracy Rate'],
        ['number' => '40%', 'label' => 'Avg. Conversion Lift'],
        ['number' => '500+', 'label' => 'Happy Clients']
    ]
];

// Service features
$features = [
    [
        'title' => 'Custom Lead Criteria',
        'description' => 'Define your ideal customer profile with precision. We target by industry, company size, revenue, job title, technology stack, and 50+ other criteria.',
        'icon' => 'filter'
    ],
    [
        'title' => 'Multi-Channel Prospecting',
        'description' => 'We identify leads through LinkedIn, company databases, intent data, web scraping, and proprietary sources for maximum coverage.',
        'icon' => 'layers'
    ],
    [
        'title' => 'Real-Time Verification',
        'description' => 'Every lead undergoes email verification, phone validation, and LinkedIn profile matching to ensure 98%+ accuracy.',
        'icon' => 'check-circle'
    ],
    [
        'title' => 'CRM Integration',
        'description' => 'Leads delivered in your preferred format with seamless integration to Salesforce, HubSpot, Pipedrive, and other CRMs.',
        'icon' => 'refresh'
    ],
    [
        'title' => 'Intent Data Signals',
        'description' => 'Identify prospects actively researching solutions like yours using behavioral intent data and buyer signals.',
        'icon' => 'activity'
    ],
    [
        'title' => 'Dedicated Account Manager',
        'description' => 'A dedicated expert manages your account, optimizes targeting, and ensures quality at every step.',
        'icon' => 'user'
    ]
];

// Lead types offered
$lead_types = [
    [
        'name' => 'Marketing Qualified Leads (MQLs)',
        'description' => 'Leads who have shown interest through content engagement, website visits, or form submissions.',
        'use_case' => 'Top-of-funnel nurturing campaigns'
    ],
    [
        'name' => 'Sales Qualified Leads (SQLs)',
        'description' => 'Leads verified for budget, authority, need, and timeline—ready for sales outreach.',
        'use_case' => 'Direct sales team follow-up'
    ],
    [
        'name' => 'BANT Qualified Leads',
        'description' => 'Prospects meeting Budget, Authority, Need, and Timeline criteria through phone qualification.',
        'use_case' => 'High-value enterprise deals'
    ],
    [
        'name' => 'Appointment Setting',
        'description' => 'Pre-scheduled meetings with qualified decision-makers directly on your calendar.',
        'use_case' => 'Maximizing sales team efficiency'
    ]
];

// Process steps
$process_steps = [
    [
        'step' => '01',
        'title' => 'Define Your ICP',
        'description' => 'We work with you to clearly define your Ideal Customer Profile—industries, company sizes, job titles, technologies, and buying signals that matter.',
        'duration' => 'Day 1-2'
    ],
    [
        'step' => '02',
        'title' => 'Build Target List',
        'description' => 'Our team compiles a targeted list using multiple data sources, proprietary databases, and intent signals to identify your best prospects.',
        'duration' => 'Day 3-5'
    ],
    [
        'step' => '03',
        'title' => 'Verify & Enrich',
        'description' => 'Every contact is verified for accuracy—email deliverability, phone validation, job title confirmation, and data enrichment.',
        'duration' => 'Day 5-7'
    ],
    [
        'step' => '04',
        'title' => 'Deliver & Optimize',
        'description' => 'Leads are delivered in your preferred format. We analyze results and continuously refine targeting for better conversions.',
        'duration' => 'Ongoing'
    ]
];

// Pricing plans
$pricing_plans = [
    [
        'name' => 'Starter',
        'description' => 'Perfect for small teams testing lead gen',
        'price' => '$0.75',
        'unit' => 'per lead',
        'features' => [
            '500+ leads/month',
            'Basic targeting criteria',
            'Email verification',
            'CSV/Excel delivery',
            'Email support',
            '90% accuracy guarantee'
        ],
        'popular' => false,
        'cta' => 'Get Started'
    ],
    [
        'name' => 'Professional',
        'description' => 'Most popular for growing sales teams',
        'price' => '$0.50',
        'unit' => 'per lead',
        'features' => [
            '2,000+ leads/month',
            'Advanced targeting (50+ criteria)',
            'Email + phone verification',
            'Direct CRM integration',
            'Dedicated account manager',
            '95% accuracy guarantee',
            'Intent data signals',
            'Weekly optimization calls'
        ],
        'popular' => true,
        'cta' => 'Most Popular'
    ],
    [
        'name' => 'Enterprise',
        'description' => 'For large-scale lead generation needs',
        'price' => 'Custom',
        'unit' => 'pricing',
        'features' => [
            'Unlimited lead volume',
            'Custom qualification criteria',
            'Multi-channel verification',
            'API access',
            'Dedicated team',
            '98% accuracy guarantee',
            'Real-time delivery',
            'Custom reporting',
            'SLA guarantee'
        ],
        'popular' => false,
        'cta' => 'Contact Sales'
    ]
];

// Industries served
$industries = [
    'Technology & SaaS',
    'Healthcare & Pharma',
    'Financial Services',
    'Manufacturing',
    'Professional Services',
    'Real Estate',
    'Education & E-Learning',
    'Logistics & Supply Chain'
];

// Testimonials
$testimonials = [
    [
        'quote' => 'VP Internationals transformed our sales pipeline. Within 3 months, we saw a 45% increase in qualified meetings. Their lead quality is unmatched.',
        'author' => 'Sarah Mitchell',
        'role' => 'VP of Sales',
        'company' => 'TechScale Solutions',
        'image' => 'testimonial-1.jpg'
    ],
    [
        'quote' => 'The accuracy of their leads is incredible—98% deliverability on emails. Our SDRs are finally focusing on selling instead of data cleanup.',
        'author' => 'Michael Chen',
        'role' => 'Sales Director',
        'company' => 'CloudFirst Inc.',
        'image' => 'testimonial-2.jpg'
    ]
];

// FAQ
$faqs = [
    [
        'question' => 'What information is included with each lead?',
        'answer' => 'Each lead includes: Full name, job title, company name, email address, phone number (when available), LinkedIn URL, company size, industry, and additional firmographic data based on your requirements.'
    ],
    [
        'question' => 'How do you ensure lead quality?',
        'answer' => 'We use a multi-step verification process: email deliverability testing, phone number validation, LinkedIn profile matching, and real-time database cross-referencing. We maintain a 98% accuracy rate and offer replacement guarantees.'
    ],
    [
        'question' => 'What is your replacement policy?',
        'answer' => 'Any lead that bounces, has an invalid phone, or doesn\'t match the agreed criteria will be replaced at no additional cost. We stand behind our quality guarantee.'
    ],
    [
        'question' => 'How quickly can I start receiving leads?',
        'answer' => 'After our initial consultation and ICP definition (1-2 days), you can expect your first batch of verified leads within 5-7 business days. Ongoing delivery is continuous based on your volume requirements.'
    ],
    [
        'question' => 'Can I integrate leads directly into my CRM?',
        'answer' => 'Yes! We offer direct integration with Salesforce, HubSpot, Pipedrive, Zoho, and other major CRMs. We can also deliver via API, CSV, or Google Sheets based on your preference.'
    ],
    [
        'question' => 'Do you offer exclusive leads?',
        'answer' => 'Yes, all leads in our Professional and Enterprise plans are exclusive to you. They are not resold or shared with other clients, ensuring you have first-mover advantage.'
    ]
];

// Include header
require_once dirname(__DIR__) . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 701-705: SERVICE SCHEMA MARKUP -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "B2B Lead Generation Services",
    "description": "<?php echo htmlspecialchars($page_config['meta_description']); ?>",
    "url": "<?php echo SITE_URL; ?>/services/lead-generation",
    "provider": {
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>"
    },
    "areaServed": "Worldwide",
    "serviceType": "B2B Lead Generation",
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Lead Generation Plans",
        "itemListElement": [
            <?php foreach ($pricing_plans as $index => $plan): ?>
            {
                "@type": "Offer",
                "name": "<?php echo htmlspecialchars($plan['name']); ?> Plan",
                "description": "<?php echo htmlspecialchars($plan['description']); ?>",
                "price": "<?php echo $plan['price'] === 'Custom' ? '0' : str_replace('$', '', $plan['price']); ?>",
                "priceCurrency": "USD"
            }<?php echo $index < count($pricing_plans) - 1 ? ',' : ''; ?>
            <?php endforeach; ?>
        ]
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "287",
        "bestRating": "5"
    }
}
</script>

<!-- FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ($faqs as $index => $faq): ?>
        {
            "@type": "Question",
            "name": "<?php echo htmlspecialchars($faq['question']); ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo htmlspecialchars($faq['answer']); ?>"
            }
        }<?php echo $index < count($faqs) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
    ]
}
</script>

<main id="main-content" class="service-page lead-generation-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 706-710: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="service-hero section" aria-labelledby="service-hero-title">
        <div class="container">
            <div class="service-hero__content">
                <nav class="service-hero__breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo SITE_URL; ?>/services">← Back to Services</a>
                </nav>
                <span class="service-hero__badge badge badge--primary">Lead Generation</span>
                <h1 id="service-hero-title" class="service-hero__title">
                    B2B Lead Generation That <span class="text-gradient">Actually Converts</span>
                </h1>
                <p class="service-hero__description">
                    <?php echo htmlspecialchars($service['description']); ?>
                </p>
                <div class="service-hero__cta">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">
                        Get Free Consultation
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="#pricing" class="btn btn--outline btn--lg">View Pricing</a>
                </div>
            </div>
            <div class="service-hero__stats">
                <?php foreach ($service['hero_stats'] as $stat): ?>
                <div class="hero-stat">
                    <span class="hero-stat__number"><?php echo htmlspecialchars($stat['number']); ?></span>
                    <span class="hero-stat__label"><?php echo htmlspecialchars($stat['label']); ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 711-715: FEATURES SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="service-features section" aria-labelledby="features-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Why Choose Us</span>
                <h2 id="features-title" class="section-header__title">Lead Generation Features</h2>
                <p class="section-header__subtitle">
                    Everything you need to fill your pipeline with qualified prospects
                </p>
            </header>

            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                <article class="feature-card">
                    <div class="feature-card__icon">
                        <?php
                        $feature_icons = [
                            'filter' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon></svg>',
                            'layers' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>',
                            'check-circle' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
                            'refresh' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>',
                            'activity' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>',
                            'user' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>'
                        ];
                        echo $feature_icons[$feature['icon']] ?? $feature_icons['check-circle'];
                        ?>
                    </div>
                    <h3 class="feature-card__title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    <p class="feature-card__description"><?php echo htmlspecialchars($feature['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 716-720: LEAD TYPES SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="lead-types section section--gray" aria-labelledby="lead-types-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="lead-types-title" class="section-header__title">Types of Leads We Deliver</h2>
                <p class="section-header__subtitle">
                    Choose the lead qualification level that matches your sales process
                </p>
            </header>

            <div class="lead-types-grid">
                <?php foreach ($lead_types as $type): ?>
                <article class="lead-type-card">
                    <h3 class="lead-type-card__title"><?php echo htmlspecialchars($type['name']); ?></h3>
                    <p class="lead-type-card__description"><?php echo htmlspecialchars($type['description']); ?></p>
                    <div class="lead-type-card__use-case">
                        <span class="label">Best for:</span>
                        <span class="value"><?php echo htmlspecialchars($type['use_case']); ?></span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 721-725: PROCESS SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="service-process section" aria-labelledby="process-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Our Process</span>
                <h2 id="process-title" class="section-header__title">How It Works</h2>
                <p class="section-header__subtitle">
                    From ICP definition to lead delivery in as little as 7 days
                </p>
            </header>

            <div class="process-timeline">
                <?php foreach ($process_steps as $index => $step): ?>
                <article class="process-step">
                    <div class="process-step__marker">
                        <span class="process-step__number"><?php echo $step['step']; ?></span>
                    </div>
                    <div class="process-step__content">
                        <span class="process-step__duration"><?php echo htmlspecialchars($step['duration']); ?></span>
                        <h3 class="process-step__title"><?php echo htmlspecialchars($step['title']); ?></h3>
                        <p class="process-step__description"><?php echo htmlspecialchars($step['description']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 726-730: PRICING SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="pricing section section--dark" id="pricing" aria-labelledby="pricing-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <span class="section-header__badge badge badge--primary">Pricing</span>
                <h2 id="pricing-title" class="section-header__title">Simple, Transparent Pricing</h2>
                <p class="section-header__subtitle">
                    Choose the plan that fits your lead generation needs
                </p>
            </header>

            <div class="pricing-grid">
                <?php foreach ($pricing_plans as $plan): ?>
                <article class="pricing-card <?php echo $plan['popular'] ? 'pricing-card--popular' : ''; ?>">
                    <?php if ($plan['popular']): ?>
                    <span class="pricing-card__badge">Most Popular</span>
                    <?php endif; ?>
                    <h3 class="pricing-card__name"><?php echo htmlspecialchars($plan['name']); ?></h3>
                    <p class="pricing-card__description"><?php echo htmlspecialchars($plan['description']); ?></p>
                    <div class="pricing-card__price">
                        <span class="price"><?php echo htmlspecialchars($plan['price']); ?></span>
                        <span class="unit"><?php echo htmlspecialchars($plan['unit']); ?></span>
                    </div>
                    <ul class="pricing-card__features">
                        <?php foreach ($plan['features'] as $feature): ?>
                        <li>
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                            </svg>
                            <?php echo htmlspecialchars($feature); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn <?php echo $plan['popular'] ? 'btn--primary' : 'btn--outline'; ?> btn--full">
                        <?php echo htmlspecialchars($plan['cta']); ?>
                    </a>
                </article>
                <?php endforeach; ?>
            </div>

            <p class="pricing-note">
                All plans include: No setup fees • Cancel anytime • Replacement guarantee • Dedicated support
            </p>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 731-733: INDUSTRIES SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="industries section" aria-labelledby="industries-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="industries-title" class="section-header__title">Industries We Serve</h2>
                <p class="section-header__subtitle">
                    We have expertise generating leads across multiple B2B verticals
                </p>
            </header>

            <div class="industries-grid">
                <?php foreach ($industries as $industry): ?>
                <span class="industry-tag"><?php echo htmlspecialchars($industry); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 734-736: TESTIMONIALS SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="testimonials section section--gray" aria-labelledby="testimonials-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="testimonials-title" class="section-header__title">What Our Clients Say</h2>
            </header>

            <div class="testimonials-grid">
                <?php foreach ($testimonials as $testimonial): ?>
                <article class="testimonial-card">
                    <blockquote class="testimonial-card__quote">
                        "<?php echo htmlspecialchars($testimonial['quote']); ?>"
                    </blockquote>
                    <footer class="testimonial-card__author">
                        <div class="testimonial-card__avatar">
                            <span><?php echo strtoupper(substr($testimonial['author'], 0, 1)); ?></span>
                        </div>
                        <div class="testimonial-card__info">
                            <cite class="name"><?php echo htmlspecialchars($testimonial['author']); ?></cite>
                            <span class="role"><?php echo htmlspecialchars($testimonial['role']); ?></span>
                            <span class="company"><?php echo htmlspecialchars($testimonial['company']); ?></span>
                        </div>
                    </footer>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 737-739: FAQ SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="service-faq section" aria-labelledby="faq-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="faq-title" class="section-header__title">Frequently Asked Questions</h2>
            </header>

            <div class="faq-list">
                <?php foreach ($faqs as $index => $faq): ?>
                <article class="faq-item">
                    <button class="faq-item__question"
                            aria-expanded="false"
                            aria-controls="lead-faq-<?php echo $index; ?>"
                            id="lead-faq-q-<?php echo $index; ?>">
                        <span><?php echo htmlspecialchars($faq['question']); ?></span>
                        <svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-item__answer"
                         id="lead-faq-<?php echo $index; ?>"
                         role="region"
                         aria-labelledby="lead-faq-q-<?php echo $index; ?>"
                         hidden>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 740: CTA SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="cta section" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta__content">
                <h2 id="cta-title" class="cta__title">Ready to Fill Your Pipeline?</h2>
                <p class="cta__description">
                    Get a free consultation and discover how our lead generation services
                    can help you reach your sales targets.
                </p>
                <div class="cta__actions">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">
                        Start Generating Leads
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SERVICE PAGE SPECIFIC STYLES -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<style>
/* Service Hero */
.service-hero {
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
    color: var(--color-white);
    padding: var(--space-12) 0 var(--space-16);
}

.service-hero__breadcrumb {
    margin-bottom: var(--space-6);
}

.service-hero__breadcrumb a {
    color: var(--color-gray-400);
    text-decoration: none;
    font-size: var(--font-size-sm);
    transition: color var(--transition-fast);
}

.service-hero__breadcrumb a:hover {
    color: var(--color-primary);
}

.service-hero__badge {
    margin-bottom: var(--space-4);
}

.service-hero__title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: var(--font-weight-bold);
    line-height: 1.1;
    margin-bottom: var(--space-6);
    max-width: 800px;
}

.service-hero__description {
    font-size: var(--font-size-lg);
    color: var(--color-gray-300);
    line-height: 1.7;
    margin-bottom: var(--space-8);
    max-width: 700px;
}

.service-hero__cta {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-4);
    margin-bottom: var(--space-10);
}

.service-hero__stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-4);
    max-width: 600px;
}

@media (min-width: 640px) {
    .service-hero__stats {
        grid-template-columns: repeat(4, 1fr);
    }
}

.hero-stat {
    text-align: center;
    padding: var(--space-4);
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
}

.hero-stat__number {
    display: block;
    font-size: var(--font-size-2xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.hero-stat__label {
    font-size: var(--font-size-xs);
    color: var(--color-gray-400);
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 640px) {
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .features-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.feature-card {
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    transition: all var(--transition-normal);
}

.feature-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}

.feature-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: var(--color-primary-light);
    border-radius: var(--radius-lg);
    color: var(--color-primary);
    margin-bottom: var(--space-4);
}

.feature-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.feature-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
}

/* Lead Types */
.lead-types-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 768px) {
    .lead-types-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.lead-type-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
}

.lead-type-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.lead-type-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-4);
}

.lead-type-card__use-case {
    display: flex;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    padding-top: var(--space-4);
    border-top: 1px solid var(--color-gray-200);
}

.lead-type-card__use-case .label {
    color: var(--color-gray-500);
}

.lead-type-card__use-case .value {
    color: var(--color-primary);
    font-weight: var(--font-weight-medium);
}

/* Process Timeline */
.process-timeline {
    max-width: 800px;
    margin: 0 auto;
    position: relative;
}

.process-timeline::before {
    content: '';
    position: absolute;
    left: 30px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--color-gray-200);
}

@media (min-width: 768px) {
    .process-timeline::before {
        left: 50%;
        transform: translateX(-50%);
    }
}

.process-step {
    display: flex;
    gap: var(--space-6);
    margin-bottom: var(--space-8);
    position: relative;
}

@media (min-width: 768px) {
    .process-step {
        justify-content: center;
    }

    .process-step:nth-child(odd) {
        flex-direction: row-reverse;
        text-align: right;
    }
}

.process-step__marker {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 1;
}

.process-step__number {
    color: var(--color-white);
    font-weight: var(--font-weight-bold);
    font-size: var(--font-size-lg);
}

.process-step__content {
    flex: 1;
    max-width: 350px;
}

.process-step__duration {
    display: inline-block;
    font-size: var(--font-size-xs);
    color: var(--color-primary);
    font-weight: var(--font-weight-semibold);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: var(--space-2);
}

.process-step__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.process-step__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
}

/* Pricing */
.pricing-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
    max-width: 1000px;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .pricing-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.pricing-card {
    position: relative;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    display: flex;
    flex-direction: column;
}

.pricing-card--popular {
    background: var(--color-white);
    border-color: var(--color-primary);
    transform: scale(1.05);
    z-index: 1;
}

.pricing-card--popular .pricing-card__name,
.pricing-card--popular .pricing-card__description,
.pricing-card--popular .pricing-card__features li {
    color: var(--color-dark);
}

.pricing-card--popular .pricing-card__price .price {
    color: var(--color-primary);
}

.pricing-card__badge {
    position: absolute;
    top: -12px;
    left: 50%;
    transform: translateX(-50%);
    background: var(--color-primary);
    color: var(--color-white);
    font-size: var(--font-size-xs);
    font-weight: var(--font-weight-semibold);
    padding: var(--space-1) var(--space-3);
    border-radius: var(--radius-full);
}

.pricing-card__name {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-white);
    margin-bottom: var(--space-1);
}

.pricing-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
    margin-bottom: var(--space-4);
}

.pricing-card__price {
    margin-bottom: var(--space-6);
}

.pricing-card__price .price {
    font-size: var(--font-size-3xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.pricing-card__price .unit {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
}

.pricing-card__features {
    list-style: none;
    padding: 0;
    margin: 0 0 var(--space-6);
    flex-grow: 1;
}

.pricing-card__features li {
    display: flex;
    align-items: flex-start;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    color: var(--color-gray-300);
    padding: var(--space-2) 0;
}

.pricing-card__features svg {
    flex-shrink: 0;
    color: var(--color-primary);
    margin-top: 2px;
}

.pricing-note {
    text-align: center;
    color: var(--color-gray-400);
    font-size: var(--font-size-sm);
    margin-top: var(--space-8);
}

/* Industries */
.industries-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-3);
}

.industry-tag {
    background: var(--color-gray-100);
    color: var(--color-gray-700);
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-medium);
    padding: var(--space-2) var(--space-4);
    border-radius: var(--radius-full);
}

/* Testimonials */
.testimonials-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
    max-width: 900px;
    margin: 0 auto;
}

@media (min-width: 768px) {
    .testimonials-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.testimonial-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    box-shadow: var(--shadow-md);
}

.testimonial-card__quote {
    font-size: var(--font-size-base);
    color: var(--color-gray-700);
    line-height: 1.7;
    margin: 0 0 var(--space-6);
    font-style: italic;
}

.testimonial-card__author {
    display: flex;
    align-items: center;
    gap: var(--space-3);
}

.testimonial-card__avatar {
    width: 48px;
    height: 48px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-white);
    font-weight: var(--font-weight-bold);
}

.testimonial-card__info {
    display: flex;
    flex-direction: column;
}

.testimonial-card__info .name {
    font-style: normal;
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
}

.testimonial-card__info .role,
.testimonial-card__info .company {
    font-size: var(--font-size-sm);
    color: var(--color-gray-500);
}

/* FAQ */
.faq-list {
    max-width: 800px;
    margin: 0 auto;
}

.faq-item {
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-lg);
    margin-bottom: var(--space-4);
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
    margin: 0;
}

/* CTA */
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

<!-- FAQ Script -->
<script>
(function() {
    'use strict';
    const faqQuestions = document.querySelectorAll('.faq-item__question');
    faqQuestions.forEach(function(question) {
        question.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            const answer = document.getElementById(this.getAttribute('aria-controls'));
            faqQuestions.forEach(function(q) {
                q.setAttribute('aria-expanded', 'false');
                const a = document.getElementById(q.getAttribute('aria-controls'));
                if (a) a.hidden = true;
            });
            if (!expanded) {
                this.setAttribute('aria-expanded', 'true');
                if (answer) answer.hidden = false;
            }
        });
    });
})();
</script>

<?php
// Include footer
require_once dirname(__DIR__) . '/includes/footer.php';
?>
