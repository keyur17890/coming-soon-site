<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - ABOUT PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 315-397: About Us page with company history, team,
 * mission/vision/values, and AboutPage schema
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 315-320: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'About VP Internationals | 8+ Years of Excellence in B2B Lead Generation',
    'meta_description' => 'Discover VP Internationals - industry leaders in B2B lead generation, web development & digital marketing. 8+ years experience, 500+ satisfied clients worldwide.',
    'meta_keywords' => 'about VP Internationals, B2B lead generation company, digital marketing agency India, web development firm, company history, our team',
    'canonical_url' => SITE_URL . '/about',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/about-og-image.jpg',
    'body_class' => 'page-about',
    'current_page' => 'about'
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'About Us', 'url' => SITE_URL . '/about']
];

// ─────────────────────────────────────────────────────────────────
// POINT 321-330: ABOUT PAGE SCHEMA DATA
// ─────────────────────────────────────────────────────────────────
$about_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    'name' => 'About VP Internationals',
    'description' => $page_config['meta_description'],
    'url' => $page_config['canonical_url'],
    'mainEntity' => [
        '@type' => 'Organization',
        'name' => SITE_NAME,
        'url' => SITE_URL,
        'logo' => SITE_URL . '/assets/images/logo.svg',
        'foundingDate' => '2016',
        'foundingLocation' => [
            '@type' => 'Place',
            'name' => 'India'
        ],
        'numberOfEmployees' => [
            '@type' => 'QuantitativeValue',
            'minValue' => 50,
            'maxValue' => 100
        ],
        'slogan' => 'Driving Business Growth Through Strategic Lead Generation',
        'knowsAbout' => [
            'B2B Lead Generation',
            'Digital Marketing',
            'Web Development',
            'SEO Services',
            'Data Solutions'
        ],
        'award' => [
            'Best B2B Lead Generation Company 2023',
            'Top Digital Marketing Agency India'
        ]
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 331-340: COMPANY TIMELINE DATA
// ─────────────────────────────────────────────────────────────────
$timeline_milestones = [
    [
        'year' => '2016',
        'title' => 'Foundation & Vision',
        'description' => 'VP Internationals was founded with a mission to revolutionize B2B lead generation. Started with a dedicated team of 5 professionals focused on delivering quality over quantity.',
        'achievement' => 'Acquired first 10 international clients'
    ],
    [
        'year' => '2017',
        'title' => 'Expanding Horizons',
        'description' => 'Launched comprehensive digital marketing services and web development division. Expanded team to 25 skilled professionals.',
        'achievement' => 'Crossed 100 satisfied clients milestone'
    ],
    [
        'year' => '2018',
        'title' => 'Technology Integration',
        'description' => 'Implemented AI-powered lead verification systems and automated data enrichment processes. Introduced real-time campaign dashboards.',
        'achievement' => 'Achieved 98% lead accuracy rate'
    ],
    [
        'year' => '2019',
        'title' => 'Global Expansion',
        'description' => 'Extended operations to serve clients across North America, Europe, and Asia-Pacific. Established strategic partnerships with industry leaders.',
        'achievement' => 'Delivered 1 million+ verified leads'
    ],
    [
        'year' => '2020',
        'title' => 'Innovation During Crisis',
        'description' => 'Adapted to remote work while maintaining 100% service delivery. Launched virtual event marketing and webinar lead generation services.',
        'achievement' => 'Zero service disruption, 40% growth'
    ],
    [
        'year' => '2021',
        'title' => 'Data Excellence',
        'description' => 'Introduced GDPR-compliant data solutions and enhanced privacy-focused marketing strategies. Launched intent data services.',
        'achievement' => 'ISO 27001 certification initiated'
    ],
    [
        'year' => '2022',
        'title' => 'Platform Evolution',
        'description' => 'Developed proprietary lead scoring algorithms and predictive analytics dashboard. Expanded team to 75+ professionals.',
        'achievement' => 'Crossed 500 active clients globally'
    ],
    [
        'year' => '2023',
        'title' => 'Industry Leadership',
        'description' => 'Recognized as a top B2B lead generation company. Launched account-based marketing (ABM) services and enhanced CRM integrations.',
        'achievement' => 'Achieved 98% client retention rate'
    ],
    [
        'year' => '2024',
        'title' => 'Future Forward',
        'description' => 'Implementing next-generation AI tools for hyper-personalized lead generation. Expanding service offerings with marketing automation consulting.',
        'achievement' => 'Targeting 50K+ monthly leads delivery'
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 341-355: TEAM MEMBERS DATA
// ─────────────────────────────────────────────────────────────────
$team_members = [
    [
        'name' => 'Leadership Team',
        'role' => 'Executive Management',
        'description' => 'Our experienced leadership team brings 50+ combined years of expertise in B2B marketing, technology, and business development.',
        'image' => 'team-leadership.jpg',
        'expertise' => ['Strategic Planning', 'Business Development', 'Client Relations']
    ],
    [
        'name' => 'Lead Generation Specialists',
        'role' => 'Core Operations',
        'description' => 'Dedicated professionals skilled in identifying, verifying, and nurturing high-quality B2B leads across multiple industries.',
        'image' => 'team-leads.jpg',
        'expertise' => ['Data Mining', 'Lead Qualification', 'CRM Management']
    ],
    [
        'name' => 'Digital Marketing Experts',
        'role' => 'Marketing Division',
        'description' => 'Creative strategists and performance marketers driving campaigns across search, social, email, and content channels.',
        'image' => 'team-marketing.jpg',
        'expertise' => ['SEO/SEM', 'Social Media', 'Content Strategy']
    ],
    [
        'name' => 'Web Development Team',
        'role' => 'Technology Division',
        'description' => 'Full-stack developers and UI/UX designers creating high-converting websites and landing pages that drive results.',
        'image' => 'team-dev.jpg',
        'expertise' => ['Full-Stack Development', 'UI/UX Design', 'Performance Optimization']
    ],
    [
        'name' => 'Data Analytics Team',
        'role' => 'Intelligence Division',
        'description' => 'Data scientists and analysts transforming raw data into actionable insights for strategic decision-making.',
        'image' => 'team-analytics.jpg',
        'expertise' => ['Data Analysis', 'Predictive Modeling', 'Reporting']
    ],
    [
        'name' => 'Client Success Team',
        'role' => 'Customer Experience',
        'description' => 'Dedicated account managers ensuring seamless communication, timely delivery, and exceeding client expectations.',
        'image' => 'team-success.jpg',
        'expertise' => ['Account Management', 'Project Coordination', 'Quality Assurance']
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 356-365: MISSION, VISION, VALUES
// ─────────────────────────────────────────────────────────────────
$company_values = [
    'mission' => [
        'title' => 'Our Mission',
        'content' => 'To empower businesses worldwide with high-quality, verified B2B leads and innovative digital solutions that drive measurable growth and lasting success.',
        'icon' => 'target'
    ],
    'vision' => [
        'title' => 'Our Vision',
        'content' => 'To become the global benchmark for B2B lead generation excellence, known for our unwavering commitment to quality, innovation, and client success.',
        'icon' => 'eye'
    ],
    'values' => [
        [
            'title' => 'Quality First',
            'description' => 'We never compromise on lead quality. Every data point is verified, validated, and enriched to ensure maximum ROI for our clients.',
            'icon' => 'shield-check'
        ],
        [
            'title' => 'Innovation Driven',
            'description' => 'We continuously evolve our methodologies, tools, and strategies to stay ahead of industry trends and deliver cutting-edge solutions.',
            'icon' => 'lightbulb'
        ],
        [
            'title' => 'Client Partnership',
            'description' => 'We view every client relationship as a partnership. Your success is our success, and we go above and beyond to achieve it together.',
            'icon' => 'handshake'
        ],
        [
            'title' => 'Transparency',
            'description' => 'We maintain complete transparency in our processes, reporting, and communication. No hidden fees, no surprises—just honest business.',
            'icon' => 'eye-open'
        ],
        [
            'title' => 'Data Security',
            'description' => 'We treat your data with the highest level of security and comply with global data protection regulations including GDPR.',
            'icon' => 'lock'
        ],
        [
            'title' => 'Continuous Improvement',
            'description' => 'We believe in kaizen—continuous improvement. Every project teaches us something new that makes us better.',
            'icon' => 'trending-up'
        ]
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 366-375: COMPANY STATS
// ─────────────────────────────────────────────────────────────────
$company_stats = [
    [
        'number' => '8+',
        'label' => 'Years of Excellence',
        'description' => 'Delivering quality since 2016'
    ],
    [
        'number' => '500+',
        'label' => 'Global Clients',
        'description' => 'Across 25+ countries'
    ],
    [
        'number' => '50M+',
        'label' => 'Leads Delivered',
        'description' => 'Verified B2B contacts'
    ],
    [
        'number' => '98%',
        'label' => 'Client Retention',
        'description' => 'Long-term partnerships'
    ],
    [
        'number' => '75+',
        'label' => 'Team Members',
        'description' => 'Skilled professionals'
    ],
    [
        'number' => '24/7',
        'label' => 'Support Available',
        'description' => 'Always here for you'
    ]
];

// ─────────────────────────────────────────────────────────────────
// POINT 376-380: CERTIFICATIONS & AWARDS
// ─────────────────────────────────────────────────────────────────
$certifications = [
    [
        'name' => 'ISO 27001',
        'description' => 'Information Security Management',
        'year' => '2022'
    ],
    [
        'name' => 'GDPR Compliant',
        'description' => 'EU Data Protection Standards',
        'year' => '2018'
    ],
    [
        'name' => 'Google Partner',
        'description' => 'Certified Ads Management',
        'year' => '2019'
    ],
    [
        'name' => 'HubSpot Partner',
        'description' => 'Inbound Marketing Certified',
        'year' => '2020'
    ]
];

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 381: ABOUT PAGE SCHEMA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
<?php echo json_encode($about_schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
</script>

<main id="main-content" class="about-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 382-384: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="about-hero section" aria-labelledby="about-hero-title">
        <div class="container">
            <div class="about-hero__content">
                <span class="about-hero__badge badge badge--primary">About Us</span>
                <h1 id="about-hero-title" class="about-hero__title">
                    Driving Business Growth Through <span class="text-gradient">Strategic Lead Generation</span>
                </h1>
                <p class="about-hero__description">
                    Since 2016, VP Internationals has been at the forefront of B2B lead generation,
                    helping businesses worldwide connect with their ideal customers. Our commitment
                    to quality, innovation, and client success has made us a trusted partner for
                    over 500 companies globally.
                </p>
                <div class="about-hero__stats">
                    <?php foreach (array_slice($company_stats, 0, 4) as $stat): ?>
                    <div class="about-hero__stat">
                        <span class="about-hero__stat-number"><?php echo htmlspecialchars($stat['number']); ?></span>
                        <span class="about-hero__stat-label"><?php echo htmlspecialchars($stat['label']); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="about-hero__image">
                <picture>
                    <source srcset="<?php echo SITE_URL; ?>/assets/images/about-hero.webp" type="image/webp">
                    <img src="<?php echo SITE_URL; ?>/assets/images/about-hero.jpg"
                         alt="VP Internationals team collaborating on B2B lead generation strategies"
                         width="600"
                         height="400"
                         loading="eager"
                         class="about-hero__img">
                </picture>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 385-386: MISSION & VISION SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="mission-vision section section--gray" aria-labelledby="mission-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="mission-title" class="section-header__title">Our Purpose & Direction</h2>
                <p class="section-header__subtitle">
                    Guided by a clear mission and an ambitious vision for the future
                </p>
            </header>

            <div class="mission-vision__grid">
                <article class="mission-card">
                    <div class="mission-card__icon">
                        <svg aria-hidden="true" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="mission-card__title"><?php echo htmlspecialchars($company_values['mission']['title']); ?></h3>
                    <p class="mission-card__content"><?php echo htmlspecialchars($company_values['mission']['content']); ?></p>
                </article>

                <article class="mission-card">
                    <div class="mission-card__icon">
                        <svg aria-hidden="true" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="mission-card__title"><?php echo htmlspecialchars($company_values['vision']['title']); ?></h3>
                    <p class="mission-card__content"><?php echo htmlspecialchars($company_values['vision']['content']); ?></p>
                </article>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 387-388: CORE VALUES SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="core-values section" aria-labelledby="values-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Our Foundation</span>
                <h2 id="values-title" class="section-header__title">Core Values That Drive Us</h2>
                <p class="section-header__subtitle">
                    These principles guide every decision we make and every service we deliver
                </p>
            </header>

            <div class="values-grid">
                <?php foreach ($company_values['values'] as $index => $value): ?>
                <article class="value-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="value-card__icon">
                        <?php
                        $icons = [
                            'shield-check' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><path d="M9 12l2 2 4-4"></path></svg>',
                            'lightbulb' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18h6M10 22h4M12 2v1M4.22 4.22l.71.71M1 12h1M4.22 19.78l.71-.71M12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10z"></path></svg>',
                            'handshake' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 0C1.46 6.7 1.33 10.28 4 13l8 8 8-8c2.67-2.72 2.54-6.3.42-8.42z"></path></svg>',
                            'eye-open' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>',
                            'lock' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>',
                            'trending-up' => '<svg aria-hidden="true" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>'
                        ];
                        echo $icons[$value['icon']] ?? $icons['shield-check'];
                        ?>
                    </div>
                    <h3 class="value-card__title"><?php echo htmlspecialchars($value['title']); ?></h3>
                    <p class="value-card__description"><?php echo htmlspecialchars($value['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 389-391: COMPANY TIMELINE
    ───────────────────────────────────────────────────────────────── -->
    <section class="timeline section section--dark" aria-labelledby="timeline-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <span class="section-header__badge badge badge--primary">Our Journey</span>
                <h2 id="timeline-title" class="section-header__title">8+ Years of Growth & Excellence</h2>
                <p class="section-header__subtitle">
                    From humble beginnings to industry leadership—explore our story
                </p>
            </header>

            <div class="timeline__wrapper">
                <div class="timeline__line" aria-hidden="true"></div>

                <?php foreach ($timeline_milestones as $index => $milestone): ?>
                <article class="timeline__item <?php echo $index % 2 === 0 ? 'timeline__item--left' : 'timeline__item--right'; ?>"
                         data-aos="<?php echo $index % 2 === 0 ? 'fade-right' : 'fade-left'; ?>">
                    <div class="timeline__marker" aria-hidden="true">
                        <span class="timeline__year"><?php echo htmlspecialchars($milestone['year']); ?></span>
                    </div>
                    <div class="timeline__content">
                        <h3 class="timeline__title"><?php echo htmlspecialchars($milestone['title']); ?></h3>
                        <p class="timeline__description"><?php echo htmlspecialchars($milestone['description']); ?></p>
                        <span class="timeline__achievement">
                            <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <?php echo htmlspecialchars($milestone['achievement']); ?>
                        </span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 392-393: TEAM SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="team section" aria-labelledby="team-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Our People</span>
                <h2 id="team-title" class="section-header__title">Meet the Team Behind Your Success</h2>
                <p class="section-header__subtitle">
                    75+ skilled professionals dedicated to delivering exceptional results
                </p>
            </header>

            <div class="team-grid">
                <?php foreach ($team_members as $index => $team): ?>
                <article class="team-card" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                    <div class="team-card__image">
                        <picture>
                            <source srcset="<?php echo SITE_URL; ?>/assets/images/<?php echo htmlspecialchars($team['image']); ?>.webp" type="image/webp">
                            <img src="<?php echo SITE_URL; ?>/assets/images/<?php echo htmlspecialchars($team['image']); ?>"
                                 alt="<?php echo htmlspecialchars($team['name']); ?> at VP Internationals"
                                 width="300"
                                 height="200"
                                 loading="lazy"
                                 class="team-card__img">
                        </picture>
                    </div>
                    <div class="team-card__content">
                        <h3 class="team-card__name"><?php echo htmlspecialchars($team['name']); ?></h3>
                        <span class="team-card__role"><?php echo htmlspecialchars($team['role']); ?></span>
                        <p class="team-card__description"><?php echo htmlspecialchars($team['description']); ?></p>
                        <ul class="team-card__expertise" aria-label="Areas of expertise">
                            <?php foreach ($team['expertise'] as $skill): ?>
                            <li class="team-card__skill"><?php echo htmlspecialchars($skill); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 394: CERTIFICATIONS SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="certifications section section--gray" aria-labelledby="cert-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="cert-title" class="section-header__title">Certifications & Partnerships</h2>
                <p class="section-header__subtitle">
                    Industry-recognized certifications that validate our expertise and commitment to excellence
                </p>
            </header>

            <div class="cert-grid">
                <?php foreach ($certifications as $cert): ?>
                <article class="cert-card">
                    <div class="cert-card__icon">
                        <svg aria-hidden="true" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="8" r="7"></circle>
                            <polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline>
                        </svg>
                    </div>
                    <h3 class="cert-card__name"><?php echo htmlspecialchars($cert['name']); ?></h3>
                    <p class="cert-card__description"><?php echo htmlspecialchars($cert['description']); ?></p>
                    <span class="cert-card__year">Since <?php echo htmlspecialchars($cert['year']); ?></span>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 395-396: CTA SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="cta section" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta__content">
                <h2 id="cta-title" class="cta__title">Ready to Partner With Us?</h2>
                <p class="cta__description">
                    Join 500+ businesses that trust VP Internationals for their B2B lead generation
                    and digital marketing needs. Let's discuss how we can help grow your business.
                </p>
                <div class="cta__actions">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">
                        Get In Touch
                        <svg aria-hidden="true" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="<?php echo SITE_URL; ?>/services" class="btn btn--outline btn--lg">
                        Explore Services
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 397: ABOUT PAGE SPECIFIC STYLES -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<style>
/* About Hero */
.about-hero {
    padding: var(--space-16) 0;
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
    color: var(--color-white);
}

.about-hero .container {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-8);
    align-items: center;
}

@media (min-width: 1024px) {
    .about-hero .container {
        grid-template-columns: 1fr 1fr;
    }
}

.about-hero__badge {
    margin-bottom: var(--space-4);
}

.about-hero__title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: var(--font-weight-bold);
    line-height: 1.1;
    margin-bottom: var(--space-6);
}

.about-hero__description {
    font-size: var(--font-size-lg);
    color: var(--color-gray-300);
    line-height: 1.7;
    margin-bottom: var(--space-8);
}

.about-hero__stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-4);
}

@media (min-width: 640px) {
    .about-hero__stats {
        grid-template-columns: repeat(4, 1fr);
    }
}

.about-hero__stat {
    text-align: center;
    padding: var(--space-4);
    background: rgba(255, 255, 255, 0.05);
    border-radius: var(--radius-lg);
}

.about-hero__stat-number {
    display: block;
    font-size: var(--font-size-2xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-primary);
}

.about-hero__stat-label {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
}

.about-hero__image {
    display: none;
}

@media (min-width: 1024px) {
    .about-hero__image {
        display: block;
    }
}

.about-hero__img {
    width: 100%;
    height: auto;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-2xl);
}

/* Mission Vision */
.mission-vision__grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-8);
}

@media (min-width: 768px) {
    .mission-vision__grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.mission-card {
    background: var(--color-white);
    padding: var(--space-8);
    border-radius: var(--radius-xl);
    text-align: center;
    box-shadow: var(--shadow-lg);
    transition: transform var(--transition-normal), box-shadow var(--transition-normal);
}

.mission-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.mission-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    border-radius: 50%;
    color: var(--color-white);
    margin-bottom: var(--space-6);
}

.mission-card__title {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    margin-bottom: var(--space-4);
    color: var(--color-dark);
}

.mission-card__content {
    color: var(--color-gray-600);
    line-height: 1.7;
}

/* Core Values */
.values-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 640px) {
    .values-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .values-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.value-card {
    background: var(--color-white);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--color-gray-200);
    transition: all var(--transition-normal);
}

.value-card:hover {
    border-color: var(--color-primary);
    box-shadow: var(--shadow-lg);
}

.value-card__icon {
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

.value-card__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    margin-bottom: var(--space-2);
    color: var(--color-dark);
}

.value-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
}

/* Timeline */
.timeline__wrapper {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    padding: var(--space-8) 0;
}

.timeline__line {
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--color-primary);
    transform: translateX(-50%);
}

@media (max-width: 767px) {
    .timeline__line {
        left: 20px;
    }
}

.timeline__item {
    position: relative;
    width: 50%;
    padding: var(--space-4);
    box-sizing: border-box;
}

@media (max-width: 767px) {
    .timeline__item {
        width: 100%;
        padding-left: 60px;
    }
}

.timeline__item--left {
    left: 0;
    padding-right: var(--space-8);
    text-align: right;
}

.timeline__item--right {
    left: 50%;
    padding-left: var(--space-8);
    text-align: left;
}

@media (max-width: 767px) {
    .timeline__item--left,
    .timeline__item--right {
        left: 0;
        padding-left: 60px;
        padding-right: var(--space-4);
        text-align: left;
    }
}

.timeline__marker {
    position: absolute;
    top: var(--space-4);
    width: 60px;
    height: 60px;
    background: var(--color-primary);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

.timeline__item--left .timeline__marker {
    right: -30px;
}

.timeline__item--right .timeline__marker {
    left: -30px;
}

@media (max-width: 767px) {
    .timeline__marker {
        left: -10px !important;
        right: auto !important;
        width: 40px;
        height: 40px;
    }
}

.timeline__year {
    color: var(--color-white);
    font-weight: var(--font-weight-bold);
    font-size: var(--font-size-sm);
}

.timeline__content {
    background: rgba(255, 255, 255, 0.05);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    backdrop-filter: blur(10px);
}

.timeline__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-white);
    margin-bottom: var(--space-2);
}

.timeline__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-300);
    line-height: 1.6;
    margin-bottom: var(--space-3);
}

.timeline__achievement {
    display: inline-flex;
    align-items: center;
    gap: var(--space-2);
    font-size: var(--font-size-sm);
    color: var(--color-primary);
    font-weight: var(--font-weight-medium);
}

/* Team Grid */
.team-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-6);
}

@media (min-width: 640px) {
    .team-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .team-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.team-card {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
}

.team-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

.team-card__image {
    height: 180px;
    overflow: hidden;
    background: var(--color-gray-100);
}

.team-card__img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform var(--transition-normal);
}

.team-card:hover .team-card__img {
    transform: scale(1.05);
}

.team-card__content {
    padding: var(--space-6);
}

.team-card__name {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-1);
}

.team-card__role {
    display: block;
    font-size: var(--font-size-sm);
    color: var(--color-primary);
    font-weight: var(--font-weight-medium);
    margin-bottom: var(--space-3);
}

.team-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--space-4);
}

.team-card__expertise {
    display: flex;
    flex-wrap: wrap;
    gap: var(--space-2);
    list-style: none;
    padding: 0;
    margin: 0;
}

.team-card__skill {
    font-size: var(--font-size-xs);
    background: var(--color-gray-100);
    color: var(--color-gray-700);
    padding: var(--space-1) var(--space-2);
    border-radius: var(--radius-full);
}

/* Certifications */
.cert-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--space-6);
}

@media (min-width: 768px) {
    .cert-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.cert-card {
    background: var(--color-white);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-normal);
}

.cert-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.cert-card__icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    border-radius: 50%;
    color: var(--color-white);
    margin-bottom: var(--space-4);
}

.cert-card__name {
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-2);
}

.cert-card__description {
    font-size: var(--font-size-sm);
    color: var(--color-gray-600);
    margin-bottom: var(--space-2);
}

.cert-card__year {
    font-size: var(--font-size-xs);
    color: var(--color-primary);
    font-weight: var(--font-weight-medium);
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
    line-height: 1.7;
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

<?php
// Include footer
require_once __DIR__ . '/includes/footer.php';
?>
