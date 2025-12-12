<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - SERVICES PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 607-680: Main services listing page with all service
 * offerings, features, and Service schema markup
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 607-615: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'B2B Lead Generation & Digital Marketing Services | VP Internationals',
    'meta_description' => 'Explore VP Internationals comprehensive B2B services: lead generation, data solutions, digital marketing, web development, SEO, content marketing & more. Get results-driven solutions.',
    'meta_keywords' => 'B2B services, lead generation services, digital marketing agency, web development company, SEO services, data solutions, content marketing, email marketing',
    'canonical_url' => SITE_URL . '/services',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/services-og-image.jpg',
    'body_class' => 'page-services',
    'current_page' => 'services'
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services']
];

// ─────────────────────────────────────────────────────────────────
// POINT 616-640: SERVICES DATA
// ─────────────────────────────────────────────────────────────────
$services = [
    [
        'id' => 'lead-generation',
        'title' => 'B2B Lead Generation',
        'slug' => 'lead-generation',
        'short_description' => 'High-quality, verified B2B leads tailored to your ideal customer profile. Accelerate your sales pipeline with targeted prospects.',
        'full_description' => 'Our B2B lead generation service delivers pre-qualified prospects that match your ideal customer profile. We use advanced data mining, intent signals, and multi-channel outreach to identify and engage decision-makers ready to buy.',
        'icon' => 'target',
        'features' => [
            'Custom lead criteria & targeting',
            'Multi-channel prospecting',
            'Real-time lead verification',
            'CRM integration ready',
            'Dedicated account manager',
            'Performance reporting'
        ],
        'benefits' => [
            'Reduce sales cycle by 40%',
            'Increase conversion rates',
            'Lower cost per acquisition',
            'Scale predictably'
        ],
        'price_starting' => '$0.50/lead',
        'popular' => true
    ],
    [
        'id' => 'data-solutions',
        'title' => 'Data Solutions & List Building',
        'slug' => 'data-solutions',
        'short_description' => 'Accurate, enriched B2B databases and custom list building services. Power your campaigns with quality data.',
        'full_description' => 'Get access to verified, enriched B2B contact databases tailored to your specifications. Our data solutions include list building, data cleansing, enrichment, and ongoing maintenance to ensure accuracy.',
        'icon' => 'database',
        'features' => [
            'Custom list building',
            'Data enrichment & append',
            'Email verification',
            'Phone number validation',
            'Firmographic data',
            'Technographic insights'
        ],
        'benefits' => [
            '98% data accuracy',
            'GDPR compliant data',
            'Regular data refresh',
            'Flexible formats'
        ],
        'price_starting' => '$0.10/record',
        'popular' => false
    ],
    [
        'id' => 'digital-marketing',
        'title' => 'Digital Marketing',
        'slug' => 'digital-marketing',
        'short_description' => 'Full-funnel digital marketing strategies that drive brand awareness, engagement, and conversions across all channels.',
        'full_description' => 'Our comprehensive digital marketing services cover everything from strategy development to execution. We create integrated campaigns across paid media, organic channels, and marketing automation to maximize your ROI.',
        'icon' => 'megaphone',
        'features' => [
            'PPC & paid advertising',
            'Marketing automation',
            'Campaign management',
            'A/B testing & optimization',
            'Analytics & reporting',
            'Multi-channel strategy'
        ],
        'benefits' => [
            'Increase brand visibility',
            'Generate qualified leads',
            'Improve ROI on ad spend',
            'Data-driven decisions'
        ],
        'price_starting' => '$1,500/month',
        'popular' => true
    ],
    [
        'id' => 'web-development',
        'title' => 'Web Development & Design',
        'slug' => 'web-development',
        'short_description' => 'Custom websites and landing pages designed to convert. Modern, fast, and optimized for performance.',
        'full_description' => 'We build high-converting websites and landing pages that combine stunning design with technical excellence. Our development process focuses on user experience, speed, and conversion optimization.',
        'icon' => 'code',
        'features' => [
            'Custom website design',
            'Landing page development',
            'E-commerce solutions',
            'CMS implementation',
            'Mobile-first responsive',
            'Performance optimization'
        ],
        'benefits' => [
            'Increase conversions',
            'Improve user experience',
            'Faster page load times',
            'SEO-friendly structure'
        ],
        'price_starting' => '$2,500/project',
        'popular' => false
    ],
    [
        'id' => 'seo',
        'title' => 'Search Engine Optimization',
        'slug' => 'seo',
        'short_description' => 'Dominate search rankings with our proven SEO strategies. Drive organic traffic that converts.',
        'full_description' => 'Our SEO services help you achieve sustainable organic growth through technical optimization, content strategy, and authoritative link building. We focus on ranking for keywords that drive revenue.',
        'icon' => 'search',
        'features' => [
            'Technical SEO audit',
            'On-page optimization',
            'Content strategy',
            'Link building',
            'Local SEO',
            'Rank tracking & reporting'
        ],
        'benefits' => [
            'Higher search rankings',
            'Increased organic traffic',
            'Better qualified leads',
            'Long-term ROI'
        ],
        'price_starting' => '$1,000/month',
        'popular' => false
    ],
    [
        'id' => 'content-marketing',
        'title' => 'Content Marketing',
        'slug' => 'content-marketing',
        'short_description' => 'Strategic content that educates, engages, and converts your target audience throughout the buyer journey.',
        'full_description' => 'We create compelling content that positions your brand as a thought leader and guides prospects through the sales funnel. From blog posts to whitepapers, we deliver content that drives results.',
        'icon' => 'edit',
        'features' => [
            'Content strategy',
            'Blog writing',
            'Whitepapers & ebooks',
            'Case studies',
            'Infographics',
            'Video content'
        ],
        'benefits' => [
            'Establish thought leadership',
            'Nurture leads effectively',
            'Improve SEO performance',
            'Build brand authority'
        ],
        'price_starting' => '$500/piece',
        'popular' => false
    ],
    [
        'id' => 'email-marketing',
        'title' => 'Email Marketing',
        'slug' => 'email-marketing',
        'short_description' => 'High-converting email campaigns that nurture leads and drive engagement. From strategy to execution.',
        'full_description' => 'Our email marketing services cover everything from strategy and list management to campaign creation and automation. We help you build relationships and drive conversions through personalized email communications.',
        'icon' => 'mail',
        'features' => [
            'Email strategy',
            'Campaign design',
            'Marketing automation',
            'List segmentation',
            'A/B testing',
            'Performance analytics'
        ],
        'benefits' => [
            'Higher open rates',
            'Improved click-through',
            'Better lead nurturing',
            'Measurable ROI'
        ],
        'price_starting' => '$750/month',
        'popular' => false
    ],
    [
        'id' => 'social-media',
        'title' => 'Social Media Marketing',
        'slug' => 'social-media',
        'short_description' => 'Build your brand presence and engage your audience across LinkedIn, Twitter, Facebook, and more.',
        'full_description' => 'We help B2B companies leverage social media to build brand awareness, engage with their audience, and generate leads. Our approach combines organic content with targeted paid campaigns.',
        'icon' => 'share',
        'features' => [
            'Social strategy',
            'Content creation',
            'Community management',
            'Paid social ads',
            'Influencer outreach',
            'Analytics & reporting'
        ],
        'benefits' => [
            'Increased brand awareness',
            'Higher engagement rates',
            'Quality lead generation',
            'Competitive advantage'
        ],
        'price_starting' => '$1,000/month',
        'popular' => false
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 641-650: SERVICE PROCESS STEPS
// ─────────────────────────────────────────────────────────────────
$process_steps = [
    [
        'number' => '01',
        'title' => 'Discovery & Strategy',
        'description' => 'We start by understanding your business goals, target audience, and current challenges to develop a customized strategy.',
        'icon' => 'lightbulb'
    ],
    [
        'number' => '02',
        'title' => 'Planning & Setup',
        'description' => 'Our team creates a detailed implementation plan, sets up necessary tools, and prepares all resources for execution.',
        'icon' => 'clipboard'
    ],
    [
        'number' => '03',
        'title' => 'Execution & Delivery',
        'description' => 'We execute the strategy with precision, delivering results according to agreed timelines and quality standards.',
        'icon' => 'rocket'
    ],
    [
        'number' => '04',
        'title' => 'Optimize & Scale',
        'description' => 'Continuous monitoring, analysis, and optimization ensure we maximize results and scale what works best.',
        'icon' => 'trending-up'
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 651-660: WHY CHOOSE US DATA
// ─────────────────────────────────────────────────────────────────
$why_choose_us = [
    [
        'title' => '8+ Years Experience',
        'description' => 'Proven track record of delivering results for 500+ clients across diverse industries.',
        'icon' => 'award'
    ],
    [
        'title' => 'Quality Guaranteed',
        'description' => '98% accuracy rate with rigorous verification processes and quality controls.',
        'icon' => 'shield-check'
    ],
    [
        'title' => 'Dedicated Support',
        'description' => 'Personal account managers and 24/7 support to ensure your success.',
        'icon' => 'headphones'
    ],
    [
        'title' => 'Flexible Solutions',
        'description' => 'Customizable services that scale with your business needs and budget.',
        'icon' => 'sliders'
    ],
    [
        'title' => 'Data Security',
        'description' => 'GDPR compliant with enterprise-grade security and data protection.',
        'icon' => 'lock'
    ],
    [
        'title' => 'Results Driven',
        'description' => 'Performance-based approach with transparent reporting and measurable KPIs.',
        'icon' => 'bar-chart'
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 661-665: SERVICE FAQ DATA
// ─────────────────────────────────────────────────────────────────
$service_faqs = [
    [
        'question' => 'How do I get started with your services?',
        'answer' => 'Getting started is easy! Simply fill out our contact form or schedule a free consultation call. We\'ll discuss your requirements, propose a customized solution, and once approved, our team will begin working on your project immediately.'
    ],
    [
        'question' => 'What industries do you serve?',
        'answer' => 'We serve a wide range of B2B industries including Technology, SaaS, Healthcare, Finance, Manufacturing, Professional Services, and more. Our team has expertise across multiple verticals and can tailor our approach to your specific industry needs.'
    ],
    [
        'question' => 'How do you ensure lead quality?',
        'answer' => 'Our multi-step verification process includes email validation, phone verification, LinkedIn profile matching, and real-time data enrichment. We maintain a 98% accuracy rate and offer replacement guarantees for any invalid data.'
    ],
    [
        'question' => 'What is your pricing model?',
        'answer' => 'We offer flexible pricing based on your specific needs. Options include per-lead pricing, monthly retainers, project-based fees, and custom packages. Contact us for a detailed quote tailored to your requirements.'
    ],
    [
        'question' => 'Do you offer custom solutions?',
        'answer' => 'Absolutely! We understand that every business is unique. Our team works closely with you to develop customized solutions that align with your specific goals, target audience, and budget constraints.'
    ],
    [
        'question' => 'What is your typical turnaround time?',
        'answer' => 'Turnaround times vary by service. Lead generation projects typically deliver first results within 5-7 business days. Web development projects range from 2-8 weeks depending on complexity. We\'ll provide specific timelines during our initial consultation.'
    ]
];

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 666-670: SERVICE SCHEMA MARKUP -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "VP Internationals Services",
    "description": "Comprehensive B2B lead generation and digital marketing services",
    "url": "<?php echo SITE_URL; ?>/services",
    "numberOfItems": <?php echo count($services); ?>,
    "itemListElement": [
        <?php foreach ($services as $index => $service): ?>
        {
            "@type": "ListItem",
            "position": <?php echo $index + 1; ?>,
            "item": {
                "@type": "Service",
                "name": "<?php echo htmlspecialchars($service['title']); ?>",
                "description": "<?php echo htmlspecialchars($service['short_description']); ?>",
                "url": "<?php echo SITE_URL; ?>/services/<?php echo $service['slug']; ?>",
                "provider": {
                    "@type": "Organization",
                    "name": "<?php echo SITE_NAME; ?>",
                    "url": "<?php echo SITE_URL; ?>"
                },
                "areaServed": "Worldwide",
                "hasOfferCatalog": {
                    "@type": "OfferCatalog",
                    "name": "<?php echo htmlspecialchars($service['title']); ?> Plans",
                    "itemListElement": {
                        "@type": "Offer",
                        "priceSpecification": {
                            "@type": "PriceSpecification",
                            "price": "<?php echo htmlspecialchars($service['price_starting']); ?>",
                            "priceCurrency": "USD"
                        }
                    }
                }
            }
        }<?php echo $index < count($services) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
    ]
}
</script>

<!-- FAQ Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        <?php foreach ($service_faqs as $index => $faq): ?>
        {
            "@type": "Question",
            "name": "<?php echo htmlspecialchars($faq['question']); ?>",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "<?php echo htmlspecialchars($faq['answer']); ?>"
            }
        }<?php echo $index < count($service_faqs) - 1 ? ',' : ''; ?>
        <?php endforeach; ?>
    ]
}
</script>

<main id="main-content" class="services-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 671-673: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="services-hero section" aria-labelledby="services-hero-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--primary">Our Services</span>
                <h1 id="services-hero-title" class="section-header__title">
                    Comprehensive B2B Solutions to <span class="text-gradient">Accelerate Your Growth</span>
                </h1>
                <p class="section-header__subtitle">
                    From lead generation to digital marketing, we provide end-to-end services
                    that help B2B companies generate more leads, close more deals, and scale faster.
                </p>
            </header>

            <div class="services-hero__stats">
                <div class="stat-item">
                    <span class="stat-item__number">50M+</span>
                    <span class="stat-item__label">Leads Delivered</span>
                </div>
                <div class="stat-item">
                    <span class="stat-item__number">500+</span>
                    <span class="stat-item__label">Happy Clients</span>
                </div>
                <div class="stat-item">
                    <span class="stat-item__number">98%</span>
                    <span class="stat-item__label">Accuracy Rate</span>
                </div>
                <div class="stat-item">
                    <span class="stat-item__number">8+</span>
                    <span class="stat-item__label">Years Experience</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 674-676: SERVICES GRID
    ───────────────────────────────────────────────────────────────── -->
    <section class="services-grid-section section" aria-labelledby="services-grid-title">
        <div class="container">
            <h2 id="services-grid-title" class="sr-only">Our Service Offerings</h2>

            <div class="services-grid">
                <?php foreach ($services as $service): ?>
                <article class="service-card <?php echo $service['popular'] ? 'service-card--popular' : ''; ?>" id="<?php echo $service['id']; ?>">
                    <?php if ($service['popular']): ?>
                    <span class="service-card__badge">Most Popular</span>
                    <?php endif; ?>

                    <div class="service-card__icon">
                        <?php
                        $icons = [
                            'target' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>',
                            'database' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>',
                            'megaphone' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 11l18-5v12L3 13v-2z"></path><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"></path></svg>',
                            'code' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>',
                            'search' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                            'edit' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>',
                            'mail' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
                            'share' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>'
                        ];
                        echo $icons[$service['icon']] ?? $icons['target'];
                        ?>
                    </div>

                    <h3 class="service-card__title"><?php echo htmlspecialchars($service['title']); ?></h3>
                    <p class="service-card__description"><?php echo htmlspecialchars($service['short_description']); ?></p>

                    <ul class="service-card__features">
                        <?php foreach (array_slice($service['features'], 0, 4) as $feature): ?>
                        <li>
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path>
                            </svg>
                            <?php echo htmlspecialchars($feature); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="service-card__footer">
                        <span class="service-card__price">From <?php echo htmlspecialchars($service['price_starting']); ?></span>
                        <a href="<?php echo SITE_URL; ?>/services/<?php echo $service['slug']; ?>" class="btn btn--outline btn--sm">
                            Learn More
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 677: PROCESS SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="process-section section section--dark" aria-labelledby="process-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <span class="section-header__badge badge badge--primary">How We Work</span>
                <h2 id="process-title" class="section-header__title">Our Proven Process</h2>
                <p class="section-header__subtitle">
                    A systematic approach that delivers consistent results for every client
                </p>
            </header>

            <div class="process-grid">
                <?php foreach ($process_steps as $step): ?>
                <article class="process-card">
                    <span class="process-card__number"><?php echo $step['number']; ?></span>
                    <div class="process-card__icon">
                        <?php
                        $process_icons = [
                            'lightbulb' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18h6M10 22h4M12 2v1M4.22 4.22l.71.71M1 12h1M4.22 19.78l.71-.71M12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10z"></path></svg>',
                            'clipboard' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>',
                            'rocket' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="M12 15l-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>',
                            'trending-up' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>'
                        ];
                        echo $process_icons[$step['icon']] ?? $process_icons['lightbulb'];
                        ?>
                    </div>
                    <h3 class="process-card__title"><?php echo htmlspecialchars($step['title']); ?></h3>
                    <p class="process-card__description"><?php echo htmlspecialchars($step['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 678: WHY CHOOSE US SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="why-choose-section section" aria-labelledby="why-choose-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Why VP Internationals</span>
                <h2 id="why-choose-title" class="section-header__title">Why Clients Choose Us</h2>
                <p class="section-header__subtitle">
                    Trusted by 500+ businesses worldwide for quality, reliability, and results
                </p>
            </header>

            <div class="why-choose-grid">
                <?php foreach ($why_choose_us as $item): ?>
                <article class="why-card">
                    <div class="why-card__icon">
                        <?php
                        $why_icons = [
                            'award' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>',
                            'shield-check' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg>',
                            'headphones' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>',
                            'sliders' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>',
                            'lock' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
                            'bar-chart' => '<svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>'
                        ];
                        echo $why_icons[$item['icon']] ?? $why_icons['award'];
                        ?>
                    </div>
                    <h3 class="why-card__title"><?php echo htmlspecialchars($item['title']); ?></h3>
                    <p class="why-card__description"><?php echo htmlspecialchars($item['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 679: FAQ SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="services-faq section section--gray" aria-labelledby="services-faq-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="services-faq-title" class="section-header__title">Frequently Asked Questions</h2>
                <p class="section-header__subtitle">Find answers to common questions about our services</p>
            </header>

            <div class="faq-list">
                <?php foreach ($service_faqs as $index => $faq): ?>
                <article class="faq-item">
                    <button class="faq-item__question"
                            aria-expanded="false"
                            aria-controls="services-faq-answer-<?php echo $index; ?>"
                            id="services-faq-question-<?php echo $index; ?>">
                        <span><?php echo htmlspecialchars($faq['question']); ?></span>
                        <svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="faq-item__answer"
                         id="services-faq-answer-<?php echo $index; ?>"
                         role="region"
                         aria-labelledby="services-faq-question-<?php echo $index; ?>"
                         hidden>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 680: CTA SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="cta section" aria-labelledby="services-cta-title">
        <div class="container">
            <div class="cta__content">
                <h2 id="services-cta-title" class="cta__title">Ready to Get Started?</h2>
                <p class="cta__description">
                    Let's discuss how our services can help you achieve your business goals.
                    Schedule a free consultation with our experts today.
                </p>
                <div class="cta__actions">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">
                        Get Free Consultation
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="tel:+91XXXXXXXXXX" class="btn btn--outline btn--lg">
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        Call Us Now
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SERVICES PAGE SPECIFIC STYLES -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<style>
/* Services Hero */
.services-hero {
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
    color: var(--color-white);
    padding: var(--space-16) 0;
}

.services-hero .section-header__title {
    color: var(--color-white);
}

.services-hero .section-header__subtitle {
    color: var(--color-gray-300);
}

.services-hero__stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-4);
    max-width: 800px;
    margin: var(--space-10) auto 0;
}

@media (min-width: 768px) {
    .services-hero__stats {
        grid-template-columns: repeat(4, 1fr);
    }
}

.stat-item {
    text-align: center;
    padding: var(--space-4);
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
}

.stat-item__number {
    display: block;
    font-size: var(--font-size-3xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
    margin-bottom: var(--space-1);
}

.stat-item__label {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 768px) {
    .services-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1200px) {
    .services-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.service-card {
    position: relative;
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-xl);
    padding: var(--space-6);
    display: flex;
    flex-direction: column;
    transition: all var(--transition-normal);
}

.service-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

.service-card--popular {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 1px var(--color-primary);
}

.service-card__badge {
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
    white-space: nowrap;
}

.service-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: var(--color-primary-light);
    border-radius: var(--radius-lg);
    color: var(--color-primary);
    margin-bottom: var(--space-4);
}

.service-card__title {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-3);
}

.service-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-4);
    flex-grow: 1;
}

.service-card__features {
    list-style: none;
    padding: 0;
    margin: 0 0 var(--space-5);
}

.service-card__features li {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    color: var(--color-gray-700);
    padding: var(--space-2) 0;
    border-bottom: 1px solid var(--color-gray-100);
}

.service-card__features li:last-child {
    border-bottom: none;
}

.service-card__features svg {
    flex-shrink: 0;
    color: var(--color-primary);
}

.service-card__footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: var(--space-4);
    border-top: 1px solid var(--color-gray-200);
}

.service-card__price {
    font-size: var(--font-size-sm);
    font-weight: var(--font-weight-semibold);
    color: var(--color-primary);
}

/* Process Section */
.process-section {
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
}

.process-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 640px) {
    .process-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .process-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.process-card {
    position: relative;
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    text-align: center;
}

.process-card__number {
    position: absolute;
    top: var(--space-4);
    right: var(--space-4);
    font-size: var(--font-size-3xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
    opacity: 0.3;
}

.process-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: var(--color-primary);
    border-radius: 50%;
    color: var(--color-white);
    margin-bottom: var(--space-4);
}

.process-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-white);
    margin-bottom: var(--space-2);
}

.process-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
    line-height: 1.6;
}

/* Why Choose Section */
.why-choose-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 640px) {
    .why-choose-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .why-choose-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.why-card {
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-lg);
    padding: var(--space-6);
    text-align: center;
    transition: all var(--transition-normal);
}

.why-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-md);
}

.why-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    background: var(--color-primary-light);
    border-radius: 50%;
    color: var(--color-primary);
    margin-bottom: var(--space-4);
}

.why-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.why-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
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
    margin: 0;
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

.cta__actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--space-4);
}

.cta .btn--primary {
    background: var(--color-white);
    color: var(--color-primary);
}

.cta .btn--primary:hover {
    background: var(--color-gray-100);
}

.cta .btn--outline {
    border-color: var(--color-white);
    color: var(--color-white);
}

.cta .btn--outline:hover {
    background: var(--color-white);
    color: var(--color-primary);
}
</style>

<!-- FAQ Accordion Script -->
<script>
(function() {
    'use strict';
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
})();
</script>

<?php
// Include footer
require_once __DIR__ . '/includes/footer.php';
?>
