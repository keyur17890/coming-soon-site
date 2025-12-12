<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - PORTFOLIO PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 1156-1200: Main portfolio listing page showcasing
 * successful client projects and case studies
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 1156-1160: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'Our Portfolio | B2B Marketing Success Stories | VP Internationals',
    'meta_description' => 'Explore VP Internationals portfolio of successful B2B lead generation, digital marketing, and web development projects. See how we\'ve helped businesses grow.',
    'meta_keywords' => 'B2B marketing portfolio, lead generation case studies, digital marketing success stories, web development portfolio, client testimonials',
    'canonical_url' => SITE_URL . '/portfolio',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/portfolio-og-image.jpg',
    'body_class' => 'page-portfolio',
    'current_page' => 'portfolio'
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Portfolio', 'url' => SITE_URL . '/portfolio']
];

// ─────────────────────────────────────────────────────────────────
// POINT 1161-1180: PORTFOLIO DATA
// ─────────────────────────────────────────────────────────────────
$portfolio_categories = [
    'all' => 'All Projects',
    'lead-generation' => 'Lead Generation',
    'digital-marketing' => 'Digital Marketing',
    'web-development' => 'Web Development',
    'seo' => 'SEO Campaigns',
    'data-solutions' => 'Data Solutions'
];

$portfolio_items = [
    [
        'id' => 'techcorp-lead-gen',
        'title' => 'TechCorp SaaS Lead Generation Campaign',
        'slug' => 'techcorp-saas-lead-generation',
        'client' => 'TechCorp Solutions',
        'category' => 'lead-generation',
        'industry' => 'Technology / SaaS',
        'thumbnail' => '/assets/images/portfolio/techcorp-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/techcorp-featured.jpg',
        'short_description' => 'Generated 2,500+ qualified leads in 6 months for enterprise SaaS platform, achieving 340% ROI.',
        'challenge' => 'TechCorp needed to scale their sales pipeline while maintaining lead quality for their enterprise software solution.',
        'solution' => 'Implemented multi-channel ABM strategy targeting C-level executives in Fortune 500 companies with personalized outreach.',
        'results' => [
            ['metric' => '2,500+', 'label' => 'Qualified Leads'],
            ['metric' => '340%', 'label' => 'ROI Achieved'],
            ['metric' => '45%', 'label' => 'Conversion Rate'],
            ['metric' => '60%', 'label' => 'Cost Reduction']
        ],
        'services_used' => ['B2B Lead Generation', 'Account-Based Marketing', 'Email Marketing'],
        'testimonial' => [
            'quote' => 'VP Internationals transformed our lead generation process. The quality of leads exceeded our expectations.',
            'author' => 'Sarah Chen',
            'position' => 'VP of Sales, TechCorp Solutions'
        ],
        'featured' => true,
        'year' => '2024'
    ],
    [
        'id' => 'medifast-digital',
        'title' => 'MediFast Healthcare Digital Transformation',
        'slug' => 'medifast-healthcare-digital-marketing',
        'client' => 'MediFast Healthcare',
        'category' => 'digital-marketing',
        'industry' => 'Healthcare',
        'thumbnail' => '/assets/images/portfolio/medifast-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/medifast-featured.jpg',
        'short_description' => 'Increased organic traffic by 280% and patient inquiries by 150% through integrated digital marketing.',
        'challenge' => 'MediFast needed to increase their online presence and attract more patients in a highly competitive healthcare market.',
        'solution' => 'Developed comprehensive digital marketing strategy combining SEO, content marketing, and targeted PPC campaigns.',
        'results' => [
            ['metric' => '280%', 'label' => 'Traffic Increase'],
            ['metric' => '150%', 'label' => 'More Inquiries'],
            ['metric' => '#1', 'label' => 'Local Rankings'],
            ['metric' => '200%', 'label' => 'Social Growth']
        ],
        'services_used' => ['Digital Marketing', 'SEO', 'Content Marketing', 'PPC'],
        'testimonial' => [
            'quote' => 'Our online presence has never been stronger. VP Internationals delivered exceptional results.',
            'author' => 'Dr. Michael Roberts',
            'position' => 'CEO, MediFast Healthcare'
        ],
        'featured' => true,
        'year' => '2024'
    ],
    [
        'id' => 'fintech-web',
        'title' => 'FinanceHub Platform Development',
        'slug' => 'financehub-fintech-web-development',
        'client' => 'FinanceHub Inc.',
        'category' => 'web-development',
        'industry' => 'Financial Services',
        'thumbnail' => '/assets/images/portfolio/financehub-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/financehub-featured.jpg',
        'short_description' => 'Built a secure, scalable fintech platform handling $50M+ in monthly transactions with 99.99% uptime.',
        'challenge' => 'FinanceHub required a robust, secure platform to handle high-volume financial transactions with regulatory compliance.',
        'solution' => 'Developed custom PHP/MySQL platform with bank-grade security, API integrations, and real-time processing capabilities.',
        'results' => [
            ['metric' => '$50M+', 'label' => 'Monthly Volume'],
            ['metric' => '99.99%', 'label' => 'Uptime'],
            ['metric' => '< 100ms', 'label' => 'Response Time'],
            ['metric' => 'PCI DSS', 'label' => 'Compliant']
        ],
        'services_used' => ['Web Development', 'API Integration', 'Security Audit'],
        'testimonial' => [
            'quote' => 'The platform VP Internationals built has been flawless. Security and performance exceed industry standards.',
            'author' => 'James Wilson',
            'position' => 'CTO, FinanceHub Inc.'
        ],
        'featured' => true,
        'year' => '2023'
    ],
    [
        'id' => 'globalretail-seo',
        'title' => 'GlobalRetail E-commerce SEO Campaign',
        'slug' => 'globalretail-ecommerce-seo',
        'client' => 'GlobalRetail Co.',
        'category' => 'seo',
        'industry' => 'E-commerce / Retail',
        'thumbnail' => '/assets/images/portfolio/globalretail-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/globalretail-featured.jpg',
        'short_description' => 'Achieved first-page rankings for 500+ keywords, driving $2.5M in additional annual revenue.',
        'challenge' => 'GlobalRetail was struggling with organic visibility in a saturated e-commerce market with fierce competition.',
        'solution' => 'Executed technical SEO overhaul, content optimization, and strategic link building targeting high-intent commercial keywords.',
        'results' => [
            ['metric' => '500+', 'label' => 'Keywords Ranked'],
            ['metric' => '$2.5M', 'label' => 'Revenue Increase'],
            ['metric' => '420%', 'label' => 'Organic Traffic'],
            ['metric' => '65%', 'label' => 'Bounce Reduction']
        ],
        'services_used' => ['SEO', 'Content Marketing', 'Technical SEO'],
        'testimonial' => [
            'quote' => 'The ROI from our SEO investment has been incredible. We\'re now dominating our category.',
            'author' => 'Amanda Foster',
            'position' => 'Marketing Director, GlobalRetail'
        ],
        'featured' => false,
        'year' => '2024'
    ],
    [
        'id' => 'datamax-solutions',
        'title' => 'DataMax B2B Database Project',
        'slug' => 'datamax-b2b-database-solutions',
        'client' => 'DataMax Analytics',
        'category' => 'data-solutions',
        'industry' => 'Business Services',
        'thumbnail' => '/assets/images/portfolio/datamax-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/datamax-featured.jpg',
        'short_description' => 'Built and enriched 500,000+ contact database with 98% accuracy for targeted B2B outreach.',
        'challenge' => 'DataMax needed a comprehensive, accurate B2B database to power their sales and marketing operations.',
        'solution' => 'Created custom database with multi-source verification, enrichment, and ongoing maintenance protocols.',
        'results' => [
            ['metric' => '500K+', 'label' => 'Contacts Built'],
            ['metric' => '98%', 'label' => 'Data Accuracy'],
            ['metric' => '35%', 'label' => 'Email Open Rate'],
            ['metric' => '15x', 'label' => 'ROI Achieved']
        ],
        'services_used' => ['Data Solutions', 'List Building', 'Data Enrichment'],
        'testimonial' => [
            'quote' => 'The data quality is exceptional. Our outreach campaigns have never performed better.',
            'author' => 'Robert Chang',
            'position' => 'Head of Sales, DataMax Analytics'
        ],
        'featured' => false,
        'year' => '2023'
    ],
    [
        'id' => 'cloudserve-abm',
        'title' => 'CloudServe Enterprise ABM Campaign',
        'slug' => 'cloudserve-enterprise-abm',
        'client' => 'CloudServe Technologies',
        'category' => 'lead-generation',
        'industry' => 'Cloud Computing',
        'thumbnail' => '/assets/images/portfolio/cloudserve-thumb.jpg',
        'featured_image' => '/assets/images/portfolio/cloudserve-featured.jpg',
        'short_description' => 'Account-based marketing campaign targeting Fortune 1000, resulting in $8M pipeline in 4 months.',
        'challenge' => 'CloudServe needed to penetrate enterprise accounts and shorten their lengthy B2B sales cycle.',
        'solution' => 'Implemented personalized ABM program targeting key decision-makers with multi-touch engagement strategy.',
        'results' => [
            ['metric' => '$8M', 'label' => 'Pipeline Created'],
            ['metric' => '45', 'label' => 'Enterprise Deals'],
            ['metric' => '60%', 'label' => 'Faster Sales Cycle'],
            ['metric' => '12x', 'label' => 'Campaign ROI']
        ],
        'services_used' => ['Account-Based Marketing', 'Lead Generation', 'Content Marketing'],
        'testimonial' => [
            'quote' => 'VP Internationals helped us crack enterprise accounts we\'d been chasing for years.',
            'author' => 'Jennifer Martinez',
            'position' => 'CMO, CloudServe Technologies'
        ],
        'featured' => false,
        'year' => '2024'
    ]
];

// Statistics
$portfolio_stats = [
    ['number' => '200+', 'label' => 'Projects Completed'],
    ['number' => '150+', 'label' => 'Happy Clients'],
    ['number' => '95%', 'label' => 'Client Retention'],
    ['number' => '50M+', 'label' => 'Leads Generated']
];

// Include header
include __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1181-1185: PORTFOLIO HERO SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="portfolio-hero" aria-labelledby="portfolio-hero-title">
    <div class="container">
        <div class="portfolio-hero__content">
            <span class="portfolio-hero__badge">Our Work</span>
            <h1 id="portfolio-hero-title" class="portfolio-hero__title">
                Success Stories That <span class="text-gradient">Speak Results</span>
            </h1>
            <p class="portfolio-hero__description">
                Explore our portfolio of successful B2B marketing campaigns, web development projects,
                and data solutions. Every project represents a partnership built on trust and delivered results.
            </p>
            <div class="portfolio-hero__stats" role="list" aria-label="Portfolio statistics">
                <?php foreach ($portfolio_stats as $stat): ?>
                <div class="portfolio-hero__stat" role="listitem">
                    <span class="portfolio-hero__stat-number"><?= htmlspecialchars($stat['number']) ?></span>
                    <span class="portfolio-hero__stat-label"><?= htmlspecialchars($stat['label']) ?></span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1186-1195: PORTFOLIO GRID WITH FILTERS -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="portfolio-grid-section" aria-labelledby="portfolio-grid-title">
    <div class="container">
        <h2 id="portfolio-grid-title" class="visually-hidden">Our Projects</h2>

        <!-- Filter Navigation -->
        <nav class="portfolio-filters" aria-label="Portfolio category filters">
            <ul class="portfolio-filters__list" role="tablist">
                <?php foreach ($portfolio_categories as $key => $label): ?>
                <li class="portfolio-filters__item" role="presentation">
                    <button
                        class="portfolio-filters__btn<?= $key === 'all' ? ' portfolio-filters__btn--active' : '' ?>"
                        role="tab"
                        aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>"
                        aria-controls="portfolio-grid"
                        data-filter="<?= htmlspecialchars($key) ?>"
                    >
                        <?= htmlspecialchars($label) ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Portfolio Grid -->
        <div id="portfolio-grid" class="portfolio-grid" role="tabpanel" aria-live="polite">
            <?php foreach ($portfolio_items as $item): ?>
            <article
                class="portfolio-card<?= $item['featured'] ? ' portfolio-card--featured' : '' ?>"
                data-category="<?= htmlspecialchars($item['category']) ?>"
                aria-labelledby="portfolio-<?= htmlspecialchars($item['id']) ?>-title"
            >
                <div class="portfolio-card__image">
                    <div class="portfolio-card__image-placeholder" aria-hidden="true">
                        <svg class="portfolio-card__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="8.5" cy="8.5" r="1.5"/>
                            <polyline points="21 15 16 10 5 21"/>
                        </svg>
                    </div>
                    <?php if ($item['featured']): ?>
                    <span class="portfolio-card__badge">Featured</span>
                    <?php endif; ?>
                    <div class="portfolio-card__overlay">
                        <a href="<?= SITE_URL ?>/portfolio/<?= htmlspecialchars($item['slug']) ?>"
                           class="portfolio-card__link"
                           aria-label="View <?= htmlspecialchars($item['title']) ?> case study">
                            View Case Study
                            <svg class="portfolio-card__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="portfolio-card__content">
                    <div class="portfolio-card__meta">
                        <span class="portfolio-card__category"><?= htmlspecialchars($portfolio_categories[$item['category']] ?? $item['category']) ?></span>
                        <span class="portfolio-card__year"><?= htmlspecialchars($item['year']) ?></span>
                    </div>
                    <h3 id="portfolio-<?= htmlspecialchars($item['id']) ?>-title" class="portfolio-card__title">
                        <a href="<?= SITE_URL ?>/portfolio/<?= htmlspecialchars($item['slug']) ?>">
                            <?= htmlspecialchars($item['title']) ?>
                        </a>
                    </h3>
                    <p class="portfolio-card__client">
                        <strong>Client:</strong> <?= htmlspecialchars($item['client']) ?>
                    </p>
                    <p class="portfolio-card__description"><?= htmlspecialchars($item['short_description']) ?></p>

                    <!-- Results Preview -->
                    <div class="portfolio-card__results">
                        <?php foreach (array_slice($item['results'], 0, 2) as $result): ?>
                        <div class="portfolio-card__result">
                            <span class="portfolio-card__result-metric"><?= htmlspecialchars($result['metric']) ?></span>
                            <span class="portfolio-card__result-label"><?= htmlspecialchars($result['label']) ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- Load More Button -->
        <div class="portfolio-grid__actions">
            <button type="button" class="btn btn--outline portfolio-grid__load-more" id="load-more-portfolio" aria-label="Load more portfolio items">
                Load More Projects
            </button>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1196-1198: CLIENT INDUSTRIES SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="portfolio-industries" aria-labelledby="industries-title">
    <div class="container">
        <div class="section-header section-header--center">
            <h2 id="industries-title" class="section-header__title">Industries We've Served</h2>
            <p class="section-header__description">
                Our expertise spans across diverse industries, delivering tailored solutions for each sector's unique challenges.
            </p>
        </div>

        <div class="industries-grid">
            <?php
            $industries = [
                ['icon' => 'laptop', 'name' => 'Technology & SaaS', 'projects' => '45+'],
                ['icon' => 'heart', 'name' => 'Healthcare', 'projects' => '30+'],
                ['icon' => 'dollar', 'name' => 'Financial Services', 'projects' => '35+'],
                ['icon' => 'shopping-cart', 'name' => 'E-commerce & Retail', 'projects' => '40+'],
                ['icon' => 'factory', 'name' => 'Manufacturing', 'projects' => '25+'],
                ['icon' => 'graduation', 'name' => 'Education', 'projects' => '20+'],
                ['icon' => 'building', 'name' => 'Real Estate', 'projects' => '15+'],
                ['icon' => 'briefcase', 'name' => 'Professional Services', 'projects' => '30+']
            ];
            foreach ($industries as $industry):
            ?>
            <div class="industry-card">
                <div class="industry-card__icon" aria-hidden="true">
                    <?= getIndustryIcon($industry['icon']) ?>
                </div>
                <h3 class="industry-card__name"><?= htmlspecialchars($industry['name']) ?></h3>
                <p class="industry-card__count"><?= htmlspecialchars($industry['projects']) ?> Projects</p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1199-1200: CTA SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="portfolio-cta" aria-labelledby="cta-title">
    <div class="container">
        <div class="portfolio-cta__content">
            <h2 id="cta-title" class="portfolio-cta__title">Ready to Be Our Next Success Story?</h2>
            <p class="portfolio-cta__description">
                Let's discuss how we can help you achieve similar results for your business.
            </p>
            <div class="portfolio-cta__actions">
                <a href="<?= SITE_URL ?>/contact" class="btn btn--primary btn--lg">
                    Start Your Project
                </a>
                <a href="<?= SITE_URL ?>/services" class="btn btn--outline btn--lg">
                    Explore Services
                </a>
            </div>
        </div>
    </div>
</section>

<?php
// Helper function for industry icons
function getIndustryIcon(string $icon): string {
    $icons = [
        'laptop' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M2 17h20M8 21h8"/></svg>',
        'heart' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
        'dollar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
        'shopping-cart' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>',
        'factory' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 20h20M4 20V10l6 4V10l6 4V4h4v16"/></svg>',
        'graduation' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 10l-10-6L2 10l10 6 10-6z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
        'building' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22V12h6v10M9 6h.01M15 6h.01M9 10h.01M15 10h.01"/></svg>',
        'briefcase' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>'
    ];
    return $icons[$icon] ?? $icons['briefcase'];
}
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SCHEMA.ORG STRUCTURED DATA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "<?= htmlspecialchars($page_config['title']) ?>",
    "description": "<?= htmlspecialchars($page_config['meta_description']) ?>",
    "url": "<?= htmlspecialchars($page_config['canonical_url']) ?>",
    "isPartOf": {
        "@type": "WebSite",
        "name": "VP Internationals",
        "url": "<?= SITE_URL ?>"
    },
    "mainEntity": {
        "@type": "ItemList",
        "itemListElement": [
            <?php foreach ($portfolio_items as $index => $item): ?>
            {
                "@type": "ListItem",
                "position": <?= $index + 1 ?>,
                "item": {
                    "@type": "CreativeWork",
                    "name": "<?= htmlspecialchars($item['title']) ?>",
                    "description": "<?= htmlspecialchars($item['short_description']) ?>",
                    "url": "<?= SITE_URL ?>/portfolio/<?= htmlspecialchars($item['slug']) ?>",
                    "creator": {
                        "@type": "Organization",
                        "name": "VP Internationals"
                    },
                    "about": {
                        "@type": "Organization",
                        "name": "<?= htmlspecialchars($item['client']) ?>"
                    }
                }
            }<?= $index < count($portfolio_items) - 1 ? ',' : '' ?>
            <?php endforeach; ?>
        ]
    }
}
</script>

<style>
/* ═══════════════════════════════════════════════════════════════ */
/* PORTFOLIO PAGE STYLES */
/* ═══════════════════════════════════════════════════════════════ */

/* Hero Section */
.portfolio-hero {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-800) 100%);
    color: var(--color-white);
}
.portfolio-hero__content { max-width: 800px; margin: 0 auto; text-align: center; }
.portfolio-hero__badge {
    display: inline-block;
    padding: var(--spacing-2) var(--spacing-4);
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-full);
    font-size: var(--text-sm);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    margin-bottom: var(--spacing-4);
}
.portfolio-hero__title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--spacing-6);
}
.portfolio-hero__description {
    font-size: var(--text-lg);
    opacity: 0.9;
    line-height: 1.7;
    margin-bottom: var(--spacing-8);
}
.portfolio-hero__stats {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-6);
    max-width: 600px;
    margin: 0 auto;
}
.portfolio-hero__stat {
    text-align: center;
    padding: var(--spacing-4);
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-lg);
}
.portfolio-hero__stat-number {
    display: block;
    font-size: var(--text-3xl);
    font-weight: 800;
    color: var(--color-accent-400);
}
.portfolio-hero__stat-label {
    display: block;
    font-size: var(--text-sm);
    opacity: 0.8;
    margin-top: var(--spacing-1);
}
@media (min-width: 768px) {
    .portfolio-hero__stats { grid-template-columns: repeat(4, 1fr); }
}

/* Portfolio Filters */
.portfolio-grid-section { padding: var(--spacing-16) 0; }
.portfolio-filters { margin-bottom: var(--spacing-10); }
.portfolio-filters__list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-3);
    list-style: none;
    padding: 0;
    margin: 0;
}
.portfolio-filters__btn {
    padding: var(--spacing-3) var(--spacing-5);
    background: transparent;
    border: 1px solid var(--color-gray-300);
    border-radius: var(--radius-full);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-600);
    cursor: pointer;
    transition: all var(--transition-base);
}
.portfolio-filters__btn:hover,
.portfolio-filters__btn--active {
    background: var(--color-primary-600);
    border-color: var(--color-primary-600);
    color: var(--color-white);
}

/* Portfolio Grid */
.portfolio-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--spacing-8);
}
@media (min-width: 768px) {
    .portfolio-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (min-width: 1024px) {
    .portfolio-grid { grid-template-columns: repeat(3, 1fr); }
}

/* Portfolio Card */
.portfolio-card {
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all var(--transition-base);
}
.portfolio-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}
.portfolio-card--featured { border: 2px solid var(--color-accent-500); }
.portfolio-card__image {
    position: relative;
    aspect-ratio: 16/10;
    background: var(--color-gray-100);
    overflow: hidden;
}
.portfolio-card__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, var(--color-gray-100), var(--color-gray-200));
}
.portfolio-card__icon {
    width: 48px;
    height: 48px;
    color: var(--color-gray-400);
}
.portfolio-card__badge {
    position: absolute;
    top: var(--spacing-3);
    left: var(--spacing-3);
    padding: var(--spacing-1) var(--spacing-3);
    background: var(--color-accent-500);
    color: var(--color-white);
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    border-radius: var(--radius-md);
    z-index: 2;
}
.portfolio-card__overlay {
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity var(--transition-base);
}
.portfolio-card:hover .portfolio-card__overlay { opacity: 1; }
.portfolio-card__link {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-2);
    padding: var(--spacing-3) var(--spacing-6);
    background: var(--color-white);
    color: var(--color-gray-900);
    font-weight: 600;
    border-radius: var(--radius-md);
    text-decoration: none;
    transition: all var(--transition-base);
}
.portfolio-card__link:hover {
    background: var(--color-accent-500);
    color: var(--color-white);
}
.portfolio-card__arrow { width: 16px; height: 16px; }
.portfolio-card__content { padding: var(--spacing-6); }
.portfolio-card__meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: var(--spacing-3);
}
.portfolio-card__category {
    font-size: var(--text-xs);
    font-weight: 600;
    text-transform: uppercase;
    color: var(--color-primary-600);
    letter-spacing: 0.05em;
}
.portfolio-card__year {
    font-size: var(--text-xs);
    color: var(--color-gray-500);
}
.portfolio-card__title {
    font-size: var(--text-lg);
    font-weight: 700;
    margin-bottom: var(--spacing-2);
    line-height: 1.3;
}
.portfolio-card__title a {
    color: var(--color-gray-900);
    text-decoration: none;
}
.portfolio-card__title a:hover { color: var(--color-primary-600); }
.portfolio-card__client {
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    margin-bottom: var(--spacing-3);
}
.portfolio-card__description {
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--spacing-4);
}
.portfolio-card__results {
    display: flex;
    gap: var(--spacing-4);
    padding-top: var(--spacing-4);
    border-top: 1px solid var(--color-gray-200);
}
.portfolio-card__result { text-align: center; flex: 1; }
.portfolio-card__result-metric {
    display: block;
    font-size: var(--text-lg);
    font-weight: 800;
    color: var(--color-primary-600);
}
.portfolio-card__result-label {
    display: block;
    font-size: var(--text-xs);
    color: var(--color-gray-500);
}

/* Grid Actions */
.portfolio-grid__actions {
    text-align: center;
    margin-top: var(--spacing-10);
}

/* Industries Section */
.portfolio-industries {
    padding: var(--spacing-16) 0;
    background: var(--color-gray-50);
}
.industries-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-6);
}
@media (min-width: 768px) {
    .industries-grid { grid-template-columns: repeat(4, 1fr); }
}
.industry-card {
    text-align: center;
    padding: var(--spacing-6);
    background: var(--color-white);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-base);
}
.industry-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}
.industry-card__icon {
    width: 48px;
    height: 48px;
    margin: 0 auto var(--spacing-4);
    color: var(--color-primary-600);
}
.industry-card__icon svg { width: 100%; height: 100%; }
.industry-card__name {
    font-size: var(--text-base);
    font-weight: 600;
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-1);
}
.industry-card__count {
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}

/* CTA Section */
.portfolio-cta {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-accent-600) 0%, var(--color-accent-700) 100%);
    color: var(--color-white);
}
.portfolio-cta__content {
    text-align: center;
    max-width: 700px;
    margin: 0 auto;
}
.portfolio-cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: var(--spacing-4);
}
.portfolio-cta__description {
    font-size: var(--text-lg);
    opacity: 0.9;
    margin-bottom: var(--spacing-8);
}
.portfolio-cta__actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-4);
}
.portfolio-cta .btn--primary {
    background: var(--color-white);
    color: var(--color-accent-600);
}
.portfolio-cta .btn--outline {
    border-color: var(--color-white);
    color: var(--color-white);
}
.portfolio-cta .btn--outline:hover {
    background: var(--color-white);
    color: var(--color-accent-600);
}

/* Animation for filtered items */
.portfolio-card[data-hidden="true"] { display: none; }
</style>

<script>
// ═══════════════════════════════════════════════════════════════
// PORTFOLIO PAGE JAVASCRIPT
// ═══════════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', function() {
    // Portfolio Filter Functionality
    const filterButtons = document.querySelectorAll('.portfolio-filters__btn');
    const portfolioCards = document.querySelectorAll('.portfolio-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active state
            filterButtons.forEach(btn => {
                btn.classList.remove('portfolio-filters__btn--active');
                btn.setAttribute('aria-selected', 'false');
            });
            this.classList.add('portfolio-filters__btn--active');
            this.setAttribute('aria-selected', 'true');

            // Filter cards
            portfolioCards.forEach(card => {
                const category = card.dataset.category;
                if (filter === 'all' || category === filter) {
                    card.removeAttribute('data-hidden');
                    card.style.display = '';
                } else {
                    card.setAttribute('data-hidden', 'true');
                    card.style.display = 'none';
                }
            });
        });
    });

    // Load More functionality (placeholder for AJAX)
    const loadMoreBtn = document.getElementById('load-more-portfolio');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            // In production, this would fetch more items via AJAX
            this.textContent = 'Loading...';
            setTimeout(() => {
                this.textContent = 'No More Projects';
                this.disabled = true;
            }, 1000);
        });
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
