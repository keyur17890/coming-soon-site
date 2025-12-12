<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - DATA SOLUTIONS SERVICE PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 741-800: Data solutions & list building service page
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/config.php';

// ─────────────────────────────────────────────────────────────────
// PAGE SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'B2B Data Solutions & List Building Services | VP Internationals',
    'meta_description' => 'Get accurate, enriched B2B databases and custom list building services. 98% data accuracy, GDPR compliant, real-time verification. Power your campaigns with quality data.',
    'meta_keywords' => 'B2B data solutions, list building, data enrichment, email verification, contact database, data cleansing, firmographic data, technographic data',
    'canonical_url' => SITE_URL . '/services/data-solutions',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/data-solutions-og.jpg',
    'body_class' => 'page-service page-data-solutions',
    'current_page' => 'services'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services'],
    ['name' => 'Data Solutions', 'url' => SITE_URL . '/services/data-solutions']
];

// ─────────────────────────────────────────────────────────────────
// SERVICE DATA
// ─────────────────────────────────────────────────────────────────
$service = [
    'name' => 'Data Solutions & List Building',
    'tagline' => 'Power Your Campaigns With Quality Data',
    'description' => 'Get access to verified, enriched B2B contact databases tailored to your specifications. Our data solutions include custom list building, data cleansing, enrichment, and ongoing maintenance to ensure maximum accuracy and deliverability.',
    'hero_stats' => [
        ['number' => '100M+', 'label' => 'Contacts Database'],
        ['number' => '98%', 'label' => 'Data Accuracy'],
        ['number' => '50+', 'label' => 'Data Points'],
        ['number' => 'GDPR', 'label' => 'Compliant']
    ]
];

$features = [
    [
        'title' => 'Custom List Building',
        'description' => 'Build targeted contact lists based on your exact specifications—industry, company size, job titles, location, technology stack, and more.',
        'icon' => 'list'
    ],
    [
        'title' => 'Data Enrichment',
        'description' => 'Enhance your existing database with missing fields—emails, phones, LinkedIn URLs, firmographics, and technographics.',
        'icon' => 'layers'
    ],
    [
        'title' => 'Email Verification',
        'description' => 'Real-time email validation to ensure deliverability. Remove bounces, catch-alls, and invalid addresses from your lists.',
        'icon' => 'mail-check'
    ],
    [
        'title' => 'Phone Validation',
        'description' => 'Verify direct dial numbers and mobile phones. Connect with decision-makers directly without gatekeepers.',
        'icon' => 'phone'
    ],
    [
        'title' => 'Firmographic Data',
        'description' => 'Company details including revenue, employee count, industry classification, headquarters location, and funding status.',
        'icon' => 'building'
    ],
    [
        'title' => 'Technographic Intelligence',
        'description' => 'Know what technologies your prospects use—CRM, marketing automation, cloud providers, and 10,000+ technologies tracked.',
        'icon' => 'cpu'
    ]
];

$data_points = [
    'Contact Information' => ['Full Name', 'Job Title', 'Email Address', 'Direct Phone', 'Mobile Number', 'LinkedIn URL'],
    'Company Details' => ['Company Name', 'Website', 'Industry', 'Employee Count', 'Revenue Range', 'Headquarters'],
    'Firmographics' => ['Founding Year', 'Company Type', 'Ownership', 'Funding Status', 'Parent Company', 'Subsidiaries'],
    'Technographics' => ['CRM Systems', 'Marketing Tools', 'Cloud Providers', 'ERP Systems', 'Analytics Tools', 'Custom Tech Stack']
];

$pricing_plans = [
    [
        'name' => 'List Building',
        'description' => 'Custom contact lists built to spec',
        'price' => '$0.10',
        'unit' => 'per record',
        'features' => ['Custom targeting criteria', 'Email verification included', 'CSV/Excel delivery', 'Basic firmographics', 'One-time delivery', '90% accuracy guarantee'],
        'popular' => false,
        'cta' => 'Get Started'
    ],
    [
        'name' => 'Data Enrichment',
        'description' => 'Enhance your existing database',
        'price' => '$0.05',
        'unit' => 'per record',
        'features' => ['Append missing fields', 'Email + phone verification', 'Firmographic enrichment', 'Technographic data', 'LinkedIn URLs', '95% match rate'],
        'popular' => true,
        'cta' => 'Most Popular'
    ],
    [
        'name' => 'Enterprise Data',
        'description' => 'Full-service data solutions',
        'price' => 'Custom',
        'unit' => 'pricing',
        'features' => ['Unlimited records', 'API access', 'Real-time verification', 'Ongoing data refresh', 'Dedicated data team', '98% accuracy SLA', 'Custom integrations', 'Priority support'],
        'popular' => false,
        'cta' => 'Contact Sales'
    ]
];

$use_cases = [
    ['title' => 'Account-Based Marketing', 'description' => 'Build targeted account lists with decision-maker contacts for personalized ABM campaigns.'],
    ['title' => 'Sales Prospecting', 'description' => 'Equip your sales team with verified contact data to accelerate outreach and pipeline building.'],
    ['title' => 'Email Campaigns', 'description' => 'Ensure high deliverability rates with verified email lists for marketing automation.'],
    ['title' => 'Market Research', 'description' => 'Analyze market segments, identify trends, and understand your total addressable market.']
];

$faqs = [
    ['question' => 'What data sources do you use?', 'answer' => 'We aggregate data from multiple premium sources including LinkedIn, company websites, SEC filings, press releases, job boards, and proprietary web scraping. All data is verified through multiple validation steps.'],
    ['question' => 'How accurate is your data?', 'answer' => 'We maintain 98% accuracy for verified data. This includes email deliverability testing, phone validation, and real-time LinkedIn profile matching. We offer replacement guarantees for any invalid records.'],
    ['question' => 'Is your data GDPR compliant?', 'answer' => 'Yes, all our data collection and processing practices comply with GDPR, CCPA, and other data protection regulations. We only provide B2B business contact data collected through legitimate sources.'],
    ['question' => 'How often is the data updated?', 'answer' => 'Our master database is updated continuously with new records added daily. For ongoing clients, we offer quarterly data refresh services to maintain accuracy as contacts change jobs.'],
    ['question' => 'Can you integrate with our CRM?', 'answer' => 'Yes, we offer direct integration with Salesforce, HubSpot, Pipedrive, and other major CRMs. We also provide API access for custom integrations and real-time data delivery.'],
    ['question' => 'What file formats do you deliver?', 'answer' => 'We deliver data in CSV, Excel, JSON, or directly to your CRM. For enterprise clients, we offer API access and custom data formats based on your requirements.']
];

require_once dirname(__DIR__) . '/includes/header.php';
?>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "B2B Data Solutions & List Building",
    "description": "<?php echo htmlspecialchars($page_config['meta_description']); ?>",
    "url": "<?php echo SITE_URL; ?>/services/data-solutions",
    "provider": {
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>"
    },
    "serviceType": "Data Solutions",
    "areaServed": "Worldwide"
}
</script>

<main id="main-content" class="service-page data-solutions-page" role="main">

    <!-- Hero Section -->
    <section class="service-hero section" aria-labelledby="service-hero-title">
        <div class="container">
            <div class="service-hero__content">
                <nav class="service-hero__breadcrumb" aria-label="Breadcrumb">
                    <a href="<?php echo SITE_URL; ?>/services">← Back to Services</a>
                </nav>
                <span class="service-hero__badge badge badge--primary">Data Solutions</span>
                <h1 id="service-hero-title" class="service-hero__title">
                    B2B Data That <span class="text-gradient">Drives Results</span>
                </h1>
                <p class="service-hero__description"><?php echo htmlspecialchars($service['description']); ?></p>
                <div class="service-hero__cta">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Get Custom Data Quote</a>
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

    <!-- Features Section -->
    <section class="service-features section" aria-labelledby="features-title">
        <div class="container">
            <header class="section-header section-header--center">
                <span class="section-header__badge badge badge--outline">Capabilities</span>
                <h2 id="features-title" class="section-header__title">Data Solutions Features</h2>
                <p class="section-header__subtitle">Comprehensive data services to power your marketing and sales</p>
            </header>
            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                <article class="feature-card">
                    <div class="feature-card__icon">
                        <svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="3" y1="9" x2="21" y2="9"></line>
                            <line x1="9" y1="21" x2="9" y2="9"></line>
                        </svg>
                    </div>
                    <h3 class="feature-card__title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    <p class="feature-card__description"><?php echo htmlspecialchars($feature['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Data Points Section -->
    <section class="data-points section section--gray" aria-labelledby="data-points-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="data-points-title" class="section-header__title">50+ Data Points Available</h2>
                <p class="section-header__subtitle">Comprehensive contact and company information</p>
            </header>
            <div class="data-points-grid">
                <?php foreach ($data_points as $category => $points): ?>
                <div class="data-category">
                    <h3 class="data-category__title"><?php echo htmlspecialchars($category); ?></h3>
                    <ul class="data-category__list">
                        <?php foreach ($points as $point): ?>
                        <li><?php echo htmlspecialchars($point); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Use Cases Section -->
    <section class="use-cases section" aria-labelledby="use-cases-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="use-cases-title" class="section-header__title">Popular Use Cases</h2>
            </header>
            <div class="use-cases-grid">
                <?php foreach ($use_cases as $case): ?>
                <article class="use-case-card">
                    <h3 class="use-case-card__title"><?php echo htmlspecialchars($case['title']); ?></h3>
                    <p class="use-case-card__description"><?php echo htmlspecialchars($case['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing section section--dark" id="pricing" aria-labelledby="pricing-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <span class="section-header__badge badge badge--primary">Pricing</span>
                <h2 id="pricing-title" class="section-header__title">Transparent Data Pricing</h2>
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
                        <li><svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"></path></svg><?php echo htmlspecialchars($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn <?php echo $plan['popular'] ? 'btn--primary' : 'btn--outline'; ?> btn--full"><?php echo htmlspecialchars($plan['cta']); ?></a>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="service-faq section" aria-labelledby="faq-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="faq-title" class="section-header__title">Frequently Asked Questions</h2>
            </header>
            <div class="faq-list">
                <?php foreach ($faqs as $index => $faq): ?>
                <article class="faq-item">
                    <button class="faq-item__question" aria-expanded="false" aria-controls="data-faq-<?php echo $index; ?>">
                        <span><?php echo htmlspecialchars($faq['question']); ?></span>
                        <svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                    <div class="faq-item__answer" id="data-faq-<?php echo $index; ?>" hidden>
                        <p><?php echo htmlspecialchars($faq['answer']); ?></p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta section" aria-labelledby="cta-title">
        <div class="container">
            <div class="cta__content">
                <h2 id="cta-title" class="cta__title">Ready to Power Your Campaigns?</h2>
                <p class="cta__description">Get a custom quote for your data needs. Our team will help you build the perfect dataset.</p>
                <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Request Custom Quote</a>
            </div>
        </div>
    </section>

</main>

<style>
/* Service Hero */
.service-hero{background:linear-gradient(135deg,var(--color-dark) 0%,var(--color-dark-lighter) 100%);color:var(--color-white);padding:var(--space-12) 0 var(--space-16)}
.service-hero__breadcrumb{margin-bottom:var(--space-6)}
.service-hero__breadcrumb a{color:var(--color-gray-400);text-decoration:none;font-size:var(--font-size-sm)}
.service-hero__breadcrumb a:hover{color:var(--color-primary)}
.service-hero__badge{margin-bottom:var(--space-4)}
.service-hero__title{font-size:clamp(2rem,5vw,3.5rem);font-weight:var(--font-weight-bold);line-height:1.1;margin-bottom:var(--space-6);max-width:800px}
.service-hero__description{font-size:var(--font-size-lg);color:var(--color-gray-300);line-height:1.7;margin-bottom:var(--space-8);max-width:700px}
.service-hero__cta{display:flex;flex-wrap:wrap;gap:var(--space-4);margin-bottom:var(--space-10)}
.service-hero__stats{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-4);max-width:600px}
@media(min-width:640px){.service-hero__stats{grid-template-columns:repeat(4,1fr)}}
.hero-stat{text-align:center;padding:var(--space-4);background:rgba(255,255,255,.05);border-radius:var(--radius-lg)}
.hero-stat__number{display:block;font-size:var(--font-size-2xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}
.hero-stat__label{font-size:var(--font-size-xs);color:var(--color-gray-400)}
/* Features */
.features-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}
@media(min-width:640px){.features-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1024px){.features-grid{grid-template-columns:repeat(3,1fr)}}
.feature-card{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);padding:var(--space-6);transition:all var(--transition-normal)}
.feature-card:hover{border-color:var(--color-primary);box-shadow:var(--shadow-md)}
.feature-card__icon{display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;background:var(--color-primary-light);border-radius:var(--radius-lg);color:var(--color-primary);margin-bottom:var(--space-4)}
.feature-card__title{font-size:var(--font-size-lg);font-weight:var(--font-weight-semibold);color:var(--color-dark);margin-bottom:var(--space-2)}
.feature-card__description{font-size:var(--font-size-sm);color:var(--color-gray-600);line-height:1.6}
/* Data Points */
.data-points-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}
@media(min-width:640px){.data-points-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1024px){.data-points-grid{grid-template-columns:repeat(4,1fr)}}
.data-category{background:var(--color-white);border-radius:var(--radius-lg);padding:var(--space-5);box-shadow:var(--shadow-sm)}
.data-category__title{font-size:var(--font-size-base);font-weight:var(--font-weight-bold);color:var(--color-primary);margin-bottom:var(--space-3);padding-bottom:var(--space-2);border-bottom:2px solid var(--color-primary-light)}
.data-category__list{list-style:none;padding:0;margin:0}
.data-category__list li{font-size:var(--font-size-sm);color:var(--color-gray-700);padding:var(--space-1) 0}
/* Use Cases */
.use-cases-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}
@media(min-width:640px){.use-cases-grid{grid-template-columns:repeat(2,1fr)}}
@media(min-width:1024px){.use-cases-grid{grid-template-columns:repeat(4,1fr)}}
.use-case-card{background:var(--color-gray-50);border-radius:var(--radius-lg);padding:var(--space-5);border-left:4px solid var(--color-primary)}
.use-case-card__title{font-size:var(--font-size-base);font-weight:var(--font-weight-bold);color:var(--color-dark);margin-bottom:var(--space-2)}
.use-case-card__description{font-size:var(--font-size-sm);color:var(--color-gray-600);line-height:1.6}
/* Pricing */
.pricing-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6);max-width:1000px;margin:0 auto}
@media(min-width:768px){.pricing-grid{grid-template-columns:repeat(3,1fr)}}
.pricing-card{position:relative;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius-xl);padding:var(--space-6);display:flex;flex-direction:column}
.pricing-card--popular{background:var(--color-white);border-color:var(--color-primary);transform:scale(1.05);z-index:1}
.pricing-card--popular .pricing-card__name,.pricing-card--popular .pricing-card__description,.pricing-card--popular .pricing-card__features li{color:var(--color-dark)}
.pricing-card--popular .pricing-card__price .price{color:var(--color-primary)}
.pricing-card__badge{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:var(--color-white);font-size:var(--font-size-xs);font-weight:var(--font-weight-semibold);padding:var(--space-1) var(--space-3);border-radius:var(--radius-full)}
.pricing-card__name{font-size:var(--font-size-xl);font-weight:var(--font-weight-bold);color:var(--color-white);margin-bottom:var(--space-1)}
.pricing-card__description{font-size:var(--font-size-sm);color:var(--color-gray-400);margin-bottom:var(--space-4)}
.pricing-card__price{margin-bottom:var(--space-6)}
.pricing-card__price .price{font-size:var(--font-size-3xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}
.pricing-card__price .unit{font-size:var(--font-size-sm);color:var(--color-gray-400)}
.pricing-card__features{list-style:none;padding:0;margin:0 0 var(--space-6);flex-grow:1}
.pricing-card__features li{display:flex;align-items:flex-start;gap:var(--space-2);font-size:var(--font-size-sm);color:var(--color-gray-300);padding:var(--space-2) 0}
.pricing-card__features svg{flex-shrink:0;color:var(--color-primary);margin-top:2px}
/* FAQ */
.faq-list{max-width:800px;margin:0 auto}
.faq-item{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);margin-bottom:var(--space-4);overflow:hidden}
.faq-item__question{width:100%;display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);font-size:var(--font-size-base);font-weight:var(--font-weight-medium);text-align:left;color:var(--color-dark);background:transparent;border:none;cursor:pointer}
.faq-item__icon{flex-shrink:0;transition:transform var(--transition-normal)}
.faq-item__question[aria-expanded="true"] .faq-item__icon{transform:rotate(180deg)}
.faq-item__answer{padding:0 var(--space-6) var(--space-5)}
.faq-item__answer[hidden]{display:none}
.faq-item__answer p{color:var(--color-gray-600);line-height:1.7;margin:0}
/* CTA */
.cta{background:linear-gradient(135deg,var(--color-primary) 0%,var(--color-primary-dark) 100%);color:var(--color-white);text-align:center}
.cta__title{font-size:clamp(1.75rem,4vw,2.5rem);font-weight:var(--font-weight-bold);margin-bottom:var(--space-4)}
.cta__description{font-size:var(--font-size-lg);opacity:.9;max-width:600px;margin:0 auto var(--space-8)}
.cta .btn--primary{background:var(--color-white);color:var(--color-primary)}
.cta .btn--primary:hover{background:var(--color-gray-100)}
</style>

<script>
(function(){
    'use strict';
    document.querySelectorAll('.faq-item__question').forEach(function(q){
        q.addEventListener('click',function(){
            var expanded=this.getAttribute('aria-expanded')==='true';
            var answer=document.getElementById(this.getAttribute('aria-controls'));
            document.querySelectorAll('.faq-item__question').forEach(function(btn){
                btn.setAttribute('aria-expanded','false');
                var a=document.getElementById(btn.getAttribute('aria-controls'));
                if(a)a.hidden=true;
            });
            if(!expanded){
                this.setAttribute('aria-expanded','true');
                if(answer)answer.hidden=false;
            }
        });
    });
})();
</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
