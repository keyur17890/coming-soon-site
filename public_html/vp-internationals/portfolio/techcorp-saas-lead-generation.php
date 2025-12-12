<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - CASE STUDY: TECHCORP SAAS LEAD GENERATION
 * ═══════════════════════════════════════════════════════════════
 * Points 1201-1230: Individual case study page with detailed
 * project information, results, and testimonials
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once dirname(__DIR__) . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 1201-1210: CASE STUDY DATA
// ─────────────────────────────────────────────────────────────────
$case_study = [
    'title' => 'TechCorp SaaS Lead Generation Campaign',
    'client' => 'TechCorp Solutions',
    'industry' => 'Technology / SaaS',
    'duration' => '6 Months',
    'year' => '2024',
    'services' => ['B2B Lead Generation', 'Account-Based Marketing', 'Email Marketing'],
    'thumbnail' => '/assets/images/portfolio/techcorp-thumb.jpg',
    'featured_image' => '/assets/images/portfolio/techcorp-featured.jpg',
    'summary' => 'Generated 2,500+ qualified leads in 6 months for enterprise SaaS platform, achieving 340% ROI through strategic multi-channel ABM approach.',
    'challenge' => 'TechCorp Solutions, a leading enterprise SaaS provider, was struggling to scale their sales pipeline while maintaining lead quality. Their internal team was generating leads, but conversion rates were low, and the cost per acquisition was unsustainable. They needed a partner who could deliver high-quality, sales-ready leads that matched their ideal customer profile.',
    'solution' => [
        'Conducted in-depth ICP analysis to define target accounts and buyer personas',
        'Implemented account-based marketing strategy targeting C-level executives in Fortune 500 companies',
        'Developed personalized multi-channel outreach campaigns across email, LinkedIn, and phone',
        'Created compelling content assets including whitepapers, case studies, and demo videos',
        'Built custom lead scoring model to prioritize high-intent prospects',
        'Integrated campaigns with TechCorp\'s CRM for seamless lead handoff'
    ],
    'results' => [
        ['metric' => '2,500+', 'label' => 'Qualified Leads Generated', 'description' => 'Pre-qualified leads matching ICP criteria'],
        ['metric' => '340%', 'label' => 'Return on Investment', 'description' => 'Campaign ROI over 6 months'],
        ['metric' => '45%', 'label' => 'Lead-to-Meeting Rate', 'description' => 'Leads converted to sales meetings'],
        ['metric' => '60%', 'label' => 'Cost Reduction', 'description' => 'Lower cost per lead vs. internal team'],
        ['metric' => '$4.2M', 'label' => 'Pipeline Generated', 'description' => 'Total pipeline value created'],
        ['metric' => '28', 'label' => 'Deals Closed', 'description' => 'Closed-won deals from campaign']
    ],
    'testimonial' => [
        'quote' => 'VP Internationals transformed our lead generation process. The quality of leads exceeded our expectations, and their ABM approach helped us penetrate accounts we\'d been targeting for years. The team\'s dedication and expertise made them feel like an extension of our own sales organization.',
        'author' => 'Sarah Chen',
        'position' => 'VP of Sales',
        'company' => 'TechCorp Solutions',
        'image' => '/assets/images/testimonials/sarah-chen.jpg'
    ],
    'timeline' => [
        ['month' => 'Month 1', 'title' => 'Discovery & Strategy', 'description' => 'ICP development, target account selection, and campaign planning'],
        ['month' => 'Month 2', 'title' => 'Content & Setup', 'description' => 'Content creation, sequence building, and CRM integration'],
        ['month' => 'Month 3-4', 'title' => 'Campaign Launch', 'description' => 'Multi-channel outreach execution and optimization'],
        ['month' => 'Month 5-6', 'title' => 'Scale & Optimize', 'description' => 'Expanded targeting, A/B testing, and performance refinement']
    ],
    'technologies' => ['Salesforce', 'HubSpot', 'LinkedIn Sales Navigator', 'ZoomInfo', 'Outreach.io', 'Gong'],
    'related_services' => [
        ['title' => 'B2B Lead Generation', 'url' => '/services/lead-generation'],
        ['title' => 'Account-Based Marketing', 'url' => '/services/digital-marketing'],
        ['title' => 'Email Marketing', 'url' => '/services/email-marketing']
    ]
];

// ─────────────────────────────────────────────────────────────────
// PAGE CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => $case_study['title'] . ' | Case Study | VP Internationals',
    'meta_description' => $case_study['summary'],
    'meta_keywords' => 'B2B lead generation case study, SaaS lead generation, enterprise ABM, TechCorp case study, VP Internationals portfolio',
    'canonical_url' => SITE_URL . '/portfolio/techcorp-saas-lead-generation',
    'og_type' => 'article',
    'og_image' => SITE_URL . $case_study['featured_image'],
    'body_class' => 'page-case-study',
    'current_page' => 'portfolio'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Portfolio', 'url' => SITE_URL . '/portfolio'],
    ['name' => $case_study['title'], 'url' => $page_config['canonical_url']]
];

include dirname(__DIR__) . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1211-1215: CASE STUDY HERO -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-hero" aria-labelledby="case-hero-title">
    <div class="container">
        <div class="case-hero__content">
            <div class="case-hero__meta">
                <span class="case-hero__category">Lead Generation</span>
                <span class="case-hero__divider" aria-hidden="true">|</span>
                <span class="case-hero__industry"><?= htmlspecialchars($case_study['industry']) ?></span>
            </div>
            <h1 id="case-hero-title" class="case-hero__title"><?= htmlspecialchars($case_study['title']) ?></h1>
            <p class="case-hero__summary"><?= htmlspecialchars($case_study['summary']) ?></p>
            <div class="case-hero__details">
                <div class="case-hero__detail">
                    <span class="case-hero__detail-label">Client</span>
                    <span class="case-hero__detail-value"><?= htmlspecialchars($case_study['client']) ?></span>
                </div>
                <div class="case-hero__detail">
                    <span class="case-hero__detail-label">Duration</span>
                    <span class="case-hero__detail-value"><?= htmlspecialchars($case_study['duration']) ?></span>
                </div>
                <div class="case-hero__detail">
                    <span class="case-hero__detail-label">Year</span>
                    <span class="case-hero__detail-value"><?= htmlspecialchars($case_study['year']) ?></span>
                </div>
            </div>
            <div class="case-hero__services">
                <?php foreach ($case_study['services'] as $service): ?>
                <span class="case-hero__service-tag"><?= htmlspecialchars($service) ?></span>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="case-hero__image">
            <div class="case-hero__image-placeholder" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1216-1217: KEY RESULTS HIGHLIGHT -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-results-highlight" aria-labelledby="results-title">
    <div class="container">
        <h2 id="results-title" class="visually-hidden">Key Results</h2>
        <div class="case-results-grid">
            <?php foreach (array_slice($case_study['results'], 0, 4) as $result): ?>
            <div class="case-result-card">
                <span class="case-result-card__metric"><?= htmlspecialchars($result['metric']) ?></span>
                <span class="case-result-card__label"><?= htmlspecialchars($result['label']) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1218-1220: CHALLENGE SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-section case-challenge" aria-labelledby="challenge-title">
    <div class="container">
        <div class="case-section__grid">
            <div class="case-section__header">
                <span class="case-section__number">01</span>
                <h2 id="challenge-title" class="case-section__title">The Challenge</h2>
            </div>
            <div class="case-section__content">
                <p class="case-section__text"><?= htmlspecialchars($case_study['challenge']) ?></p>
                <div class="case-challenge__pain-points">
                    <h3 class="case-challenge__subtitle">Key Pain Points</h3>
                    <ul class="case-challenge__list">
                        <li>Low conversion rates from existing lead sources</li>
                        <li>High cost per acquisition impacting profitability</li>
                        <li>Difficulty reaching C-level decision makers</li>
                        <li>Inconsistent pipeline growth month over month</li>
                        <li>Sales team spending time on unqualified leads</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1221-1223: SOLUTION SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-section case-solution" aria-labelledby="solution-title">
    <div class="container">
        <div class="case-section__grid">
            <div class="case-section__header">
                <span class="case-section__number">02</span>
                <h2 id="solution-title" class="case-section__title">Our Solution</h2>
            </div>
            <div class="case-section__content">
                <p class="case-section__intro">We developed a comprehensive ABM strategy tailored to TechCorp's unique needs and target market.</p>
                <div class="case-solution__steps">
                    <?php foreach ($case_study['solution'] as $index => $step): ?>
                    <div class="case-solution__step">
                        <span class="case-solution__step-num"><?= $index + 1 ?></span>
                        <p class="case-solution__step-text"><?= htmlspecialchars($step) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1224: PROJECT TIMELINE -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-timeline" aria-labelledby="timeline-title">
    <div class="container">
        <h2 id="timeline-title" class="case-timeline__title">Project Timeline</h2>
        <div class="case-timeline__track">
            <?php foreach ($case_study['timeline'] as $phase): ?>
            <div class="case-timeline__item">
                <span class="case-timeline__month"><?= htmlspecialchars($phase['month']) ?></span>
                <h3 class="case-timeline__phase"><?= htmlspecialchars($phase['title']) ?></h3>
                <p class="case-timeline__desc"><?= htmlspecialchars($phase['description']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1225-1226: DETAILED RESULTS -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-section case-results" aria-labelledby="detailed-results-title">
    <div class="container">
        <div class="case-section__grid">
            <div class="case-section__header">
                <span class="case-section__number">03</span>
                <h2 id="detailed-results-title" class="case-section__title">The Results</h2>
            </div>
            <div class="case-section__content">
                <p class="case-section__intro">Our strategic approach delivered exceptional results that exceeded TechCorp's expectations.</p>
                <div class="case-results__detailed">
                    <?php foreach ($case_study['results'] as $result): ?>
                    <div class="case-results__item">
                        <div class="case-results__metric"><?= htmlspecialchars($result['metric']) ?></div>
                        <div class="case-results__info">
                            <span class="case-results__label"><?= htmlspecialchars($result['label']) ?></span>
                            <span class="case-results__desc"><?= htmlspecialchars($result['description']) ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1227: TESTIMONIAL -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-testimonial" aria-labelledby="testimonial-title">
    <div class="container">
        <h2 id="testimonial-title" class="visually-hidden">Client Testimonial</h2>
        <blockquote class="case-testimonial__quote">
            <svg class="case-testimonial__icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
            </svg>
            <p class="case-testimonial__text"><?= htmlspecialchars($case_study['testimonial']['quote']) ?></p>
            <footer class="case-testimonial__footer">
                <div class="case-testimonial__avatar" aria-hidden="true">
                    <span><?= substr($case_study['testimonial']['author'], 0, 1) ?></span>
                </div>
                <div class="case-testimonial__author">
                    <cite class="case-testimonial__name"><?= htmlspecialchars($case_study['testimonial']['author']) ?></cite>
                    <span class="case-testimonial__position"><?= htmlspecialchars($case_study['testimonial']['position']) ?>, <?= htmlspecialchars($case_study['testimonial']['company']) ?></span>
                </div>
            </footer>
        </blockquote>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1228: TECHNOLOGIES USED -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-tech" aria-labelledby="tech-title">
    <div class="container">
        <h2 id="tech-title" class="case-tech__title">Technologies & Tools Used</h2>
        <div class="case-tech__grid">
            <?php foreach ($case_study['technologies'] as $tech): ?>
            <span class="case-tech__tag"><?= htmlspecialchars($tech) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1229-1230: RELATED & CTA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="case-cta" aria-labelledby="case-cta-title">
    <div class="container">
        <div class="case-cta__content">
            <h2 id="case-cta-title" class="case-cta__title">Ready to Achieve Similar Results?</h2>
            <p class="case-cta__text">Let's discuss how we can help transform your lead generation and drive measurable growth for your business.</p>
            <div class="case-cta__actions">
                <a href="<?= SITE_URL ?>/contact" class="btn btn--primary btn--lg">Start Your Project</a>
                <a href="<?= SITE_URL ?>/portfolio" class="btn btn--outline btn--lg">View More Case Studies</a>
            </div>
        </div>
        <div class="case-related">
            <h3 class="case-related__title">Related Services</h3>
            <div class="case-related__links">
                <?php foreach ($case_study['related_services'] as $service): ?>
                <a href="<?= SITE_URL . htmlspecialchars($service['url']) ?>" class="case-related__link">
                    <?= htmlspecialchars($service['title']) ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SCHEMA.ORG STRUCTURED DATA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "<?= htmlspecialchars($case_study['title']) ?>",
    "description": "<?= htmlspecialchars($case_study['summary']) ?>",
    "image": "<?= SITE_URL . htmlspecialchars($case_study['featured_image']) ?>",
    "author": {
        "@type": "Organization",
        "name": "VP Internationals",
        "url": "<?= SITE_URL ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "VP Internationals",
        "logo": {
            "@type": "ImageObject",
            "url": "<?= SITE_URL ?>/assets/images/logo.png"
        }
    },
    "datePublished": "<?= $case_study['year'] ?>-01-01",
    "dateModified": "<?= date('Y-m-d') ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?= htmlspecialchars($page_config['canonical_url']) ?>"
    },
    "about": {
        "@type": "Organization",
        "name": "<?= htmlspecialchars($case_study['client']) ?>"
    },
    "mentions": [
        <?php foreach ($case_study['services'] as $index => $service): ?>
        {
            "@type": "Service",
            "name": "<?= htmlspecialchars($service) ?>",
            "provider": {
                "@type": "Organization",
                "name": "VP Internationals"
            }
        }<?= $index < count($case_study['services']) - 1 ? ',' : '' ?>
        <?php endforeach; ?>
    ]
}
</script>

<style>
/* ═══════════════════════════════════════════════════════════════ */
/* CASE STUDY PAGE STYLES */
/* ═══════════════════════════════════════════════════════════════ */

/* Hero Section */
.case-hero {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-gray-900) 0%, var(--color-primary-900) 100%);
    color: var(--color-white);
}
.case-hero .container {
    display: grid;
    gap: var(--spacing-10);
    align-items: center;
}
@media (min-width: 1024px) {
    .case-hero .container { grid-template-columns: 1fr 1fr; }
}
.case-hero__meta {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-4);
    font-size: var(--text-sm);
}
.case-hero__category {
    padding: var(--spacing-1) var(--spacing-3);
    background: var(--color-accent-500);
    border-radius: var(--radius-md);
    font-weight: 600;
}
.case-hero__divider { opacity: 0.5; }
.case-hero__industry { opacity: 0.8; }
.case-hero__title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--spacing-6);
}
.case-hero__summary {
    font-size: var(--text-lg);
    line-height: 1.7;
    opacity: 0.9;
    margin-bottom: var(--spacing-8);
}
.case-hero__details {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-8);
    margin-bottom: var(--spacing-6);
}
.case-hero__detail-label {
    display: block;
    font-size: var(--text-xs);
    text-transform: uppercase;
    letter-spacing: 0.1em;
    opacity: 0.7;
    margin-bottom: var(--spacing-1);
}
.case-hero__detail-value {
    display: block;
    font-size: var(--text-base);
    font-weight: 600;
}
.case-hero__services {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-2);
}
.case-hero__service-tag {
    padding: var(--spacing-2) var(--spacing-3);
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
}
.case-hero__image {
    aspect-ratio: 16/10;
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-xl);
    overflow: hidden;
}
.case-hero__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}
.case-hero__image-placeholder svg {
    width: 64px;
    height: 64px;
    opacity: 0.3;
}

/* Results Highlight */
.case-results-highlight {
    padding: var(--spacing-12) 0;
    background: var(--color-white);
    margin-top: -60px;
    position: relative;
    z-index: 10;
}
.case-results-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-6);
    max-width: 900px;
    margin: 0 auto;
    padding: var(--spacing-8);
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-xl);
}
@media (min-width: 768px) {
    .case-results-grid { grid-template-columns: repeat(4, 1fr); }
}
.case-result-card { text-align: center; }
.case-result-card__metric {
    display: block;
    font-size: var(--text-3xl);
    font-weight: 800;
    color: var(--color-primary-600);
}
.case-result-card__label {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-gray-600);
}

/* Case Sections */
.case-section { padding: var(--spacing-16) 0; }
.case-section__grid {
    display: grid;
    gap: var(--spacing-8);
}
@media (min-width: 768px) {
    .case-section__grid { grid-template-columns: 200px 1fr; gap: var(--spacing-12); }
}
.case-section__number {
    display: block;
    font-size: var(--text-sm);
    font-weight: 700;
    color: var(--color-accent-500);
    margin-bottom: var(--spacing-2);
}
.case-section__title {
    font-size: var(--text-2xl);
    font-weight: 700;
    color: var(--color-gray-900);
}
.case-section__intro {
    font-size: var(--text-lg);
    color: var(--color-gray-700);
    margin-bottom: var(--spacing-8);
}
.case-section__text {
    font-size: var(--text-base);
    color: var(--color-gray-700);
    line-height: 1.8;
}

/* Challenge */
.case-challenge { background: var(--color-gray-50); }
.case-challenge__subtitle {
    font-size: var(--text-lg);
    font-weight: 600;
    margin: var(--spacing-8) 0 var(--spacing-4);
}
.case-challenge__list {
    list-style: none;
    padding: 0;
}
.case-challenge__list li {
    position: relative;
    padding-left: var(--spacing-8);
    margin-bottom: var(--spacing-3);
    color: var(--color-gray-700);
}
.case-challenge__list li::before {
    content: '';
    position: absolute;
    left: 0;
    top: 8px;
    width: 8px;
    height: 8px;
    background: var(--color-red-500);
    border-radius: 50%;
}

/* Solution Steps */
.case-solution__steps {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-4);
}
.case-solution__step {
    display: flex;
    gap: var(--spacing-4);
    padding: var(--spacing-4);
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
}
.case-solution__step-num {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-600);
    color: var(--color-white);
    font-weight: 700;
    border-radius: 50%;
}
.case-solution__step-text {
    margin: 0;
    color: var(--color-gray-700);
    line-height: 1.6;
}

/* Timeline */
.case-timeline {
    padding: var(--spacing-16) 0;
    background: var(--color-primary-900);
    color: var(--color-white);
}
.case-timeline__title {
    text-align: center;
    font-size: var(--text-2xl);
    font-weight: 700;
    margin-bottom: var(--spacing-12);
}
.case-timeline__track {
    display: grid;
    gap: var(--spacing-6);
}
@media (min-width: 768px) {
    .case-timeline__track { grid-template-columns: repeat(4, 1fr); }
}
.case-timeline__item {
    padding: var(--spacing-6);
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-lg);
}
.case-timeline__month {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-accent-400);
    font-weight: 600;
    margin-bottom: var(--spacing-2);
}
.case-timeline__phase {
    font-size: var(--text-lg);
    font-weight: 700;
    margin-bottom: var(--spacing-2);
}
.case-timeline__desc {
    font-size: var(--text-sm);
    opacity: 0.8;
}

/* Detailed Results */
.case-results__detailed {
    display: grid;
    gap: var(--spacing-4);
}
@media (min-width: 768px) {
    .case-results__detailed { grid-template-columns: repeat(2, 1fr); }
}
.case-results__item {
    display: flex;
    align-items: center;
    gap: var(--spacing-4);
    padding: var(--spacing-5);
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
}
.case-results__metric {
    font-size: var(--text-2xl);
    font-weight: 800;
    color: var(--color-primary-600);
    min-width: 100px;
}
.case-results__label {
    display: block;
    font-weight: 600;
    color: var(--color-gray-900);
}
.case-results__desc {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}

/* Testimonial */
.case-testimonial {
    padding: var(--spacing-16) 0;
    background: var(--color-gray-50);
}
.case-testimonial__quote {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}
.case-testimonial__icon {
    width: 48px;
    height: 48px;
    color: var(--color-accent-400);
    margin-bottom: var(--spacing-6);
}
.case-testimonial__text {
    font-size: var(--text-xl);
    font-style: italic;
    color: var(--color-gray-700);
    line-height: 1.8;
    margin-bottom: var(--spacing-8);
}
.case-testimonial__footer {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-4);
}
.case-testimonial__avatar {
    width: 56px;
    height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-600);
    color: var(--color-white);
    font-size: var(--text-xl);
    font-weight: 700;
    border-radius: 50%;
}
.case-testimonial__author { text-align: left; }
.case-testimonial__name {
    display: block;
    font-size: var(--text-base);
    font-weight: 700;
    font-style: normal;
    color: var(--color-gray-900);
}
.case-testimonial__position {
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}

/* Technologies */
.case-tech {
    padding: var(--spacing-12) 0;
    text-align: center;
}
.case-tech__title {
    font-size: var(--text-xl);
    font-weight: 700;
    margin-bottom: var(--spacing-6);
}
.case-tech__grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-3);
}
.case-tech__tag {
    padding: var(--spacing-2) var(--spacing-4);
    background: var(--color-gray-100);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-700);
}

/* CTA Section */
.case-cta {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-accent-600) 0%, var(--color-accent-700) 100%);
    color: var(--color-white);
}
.case-cta__content {
    text-align: center;
    max-width: 700px;
    margin: 0 auto var(--spacing-12);
}
.case-cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: var(--spacing-4);
}
.case-cta__text {
    font-size: var(--text-lg);
    opacity: 0.9;
    margin-bottom: var(--spacing-8);
}
.case-cta__actions {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-4);
}
.case-cta .btn--primary {
    background: var(--color-white);
    color: var(--color-accent-600);
}
.case-cta .btn--outline {
    border-color: var(--color-white);
    color: var(--color-white);
}

/* Related Services */
.case-related {
    border-top: 1px solid rgba(255,255,255,0.2);
    padding-top: var(--spacing-8);
}
.case-related__title {
    text-align: center;
    font-size: var(--text-lg);
    font-weight: 600;
    margin-bottom: var(--spacing-6);
}
.case-related__links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: var(--spacing-4);
}
.case-related__link {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-2);
    padding: var(--spacing-3) var(--spacing-5);
    background: rgba(255,255,255,0.1);
    border-radius: var(--radius-md);
    color: var(--color-white);
    text-decoration: none;
    transition: background var(--transition-base);
}
.case-related__link:hover { background: rgba(255,255,255,0.2); }
.case-related__link svg { width: 16px; height: 16px; }
</style>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
