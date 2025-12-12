<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - BLOG PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 1231-1250: Main blog listing page with categories,
 * featured posts, and article grid
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 1231-1235: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'B2B Marketing Blog | Insights & Strategies | VP Internationals',
    'meta_description' => 'Expert insights on B2B lead generation, digital marketing, SEO, and business growth strategies. Stay updated with the latest trends and best practices.',
    'meta_keywords' => 'B2B marketing blog, lead generation tips, digital marketing insights, SEO strategies, business growth, marketing trends',
    'canonical_url' => SITE_URL . '/blog',
    'og_type' => 'blog',
    'og_image' => SITE_URL . '/assets/images/blog-og-image.jpg',
    'body_class' => 'page-blog',
    'current_page' => 'blog'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Blog', 'url' => SITE_URL . '/blog']
];

// ─────────────────────────────────────────────────────────────────
// POINT 1236-1240: BLOG DATA
// ─────────────────────────────────────────────────────────────────
$blog_categories = [
    'all' => 'All Posts',
    'lead-generation' => 'Lead Generation',
    'digital-marketing' => 'Digital Marketing',
    'seo' => 'SEO',
    'content-marketing' => 'Content Marketing',
    'industry-insights' => 'Industry Insights'
];

$featured_post = [
    'id' => 1,
    'title' => 'The Ultimate Guide to B2B Lead Generation in 2024',
    'slug' => 'ultimate-guide-b2b-lead-generation-2024',
    'excerpt' => 'Discover the most effective strategies, tools, and best practices for generating high-quality B2B leads in today\'s competitive marketplace.',
    'category' => 'lead-generation',
    'author' => [
        'name' => 'Michael Thompson',
        'avatar' => '/assets/images/authors/michael.jpg',
        'role' => 'Head of Marketing'
    ],
    'date' => '2024-01-15',
    'read_time' => '12 min read',
    'featured_image' => '/assets/images/blog/lead-gen-guide-featured.jpg',
    'tags' => ['Lead Generation', 'B2B Sales', 'Marketing Strategy']
];

$blog_posts = [
    [
        'id' => 2,
        'title' => '10 Email Marketing Strategies That Actually Convert',
        'slug' => 'email-marketing-strategies-that-convert',
        'excerpt' => 'Learn proven email marketing techniques that drive engagement and conversions for B2B companies.',
        'category' => 'digital-marketing',
        'author' => ['name' => 'Sarah Johnson', 'avatar' => '/assets/images/authors/sarah.jpg'],
        'date' => '2024-01-12',
        'read_time' => '8 min read',
        'thumbnail' => '/assets/images/blog/email-marketing-thumb.jpg'
    ],
    [
        'id' => 3,
        'title' => 'SEO Best Practices for B2B Websites in 2024',
        'slug' => 'seo-best-practices-b2b-websites-2024',
        'excerpt' => 'A comprehensive guide to optimizing your B2B website for search engines and driving organic traffic.',
        'category' => 'seo',
        'author' => ['name' => 'David Chen', 'avatar' => '/assets/images/authors/david.jpg'],
        'date' => '2024-01-10',
        'read_time' => '10 min read',
        'thumbnail' => '/assets/images/blog/seo-guide-thumb.jpg'
    ],
    [
        'id' => 4,
        'title' => 'How to Build a Content Marketing Strategy That Drives Leads',
        'slug' => 'content-marketing-strategy-drives-leads',
        'excerpt' => 'Step-by-step guide to creating a content strategy that attracts, engages, and converts your ideal customers.',
        'category' => 'content-marketing',
        'author' => ['name' => 'Emily Rodriguez', 'avatar' => '/assets/images/authors/emily.jpg'],
        'date' => '2024-01-08',
        'read_time' => '9 min read',
        'thumbnail' => '/assets/images/blog/content-strategy-thumb.jpg'
    ],
    [
        'id' => 5,
        'title' => 'Account-Based Marketing: A Complete Implementation Guide',
        'slug' => 'account-based-marketing-implementation-guide',
        'excerpt' => 'Everything you need to know about implementing ABM strategies for your B2B organization.',
        'category' => 'lead-generation',
        'author' => ['name' => 'Michael Thompson', 'avatar' => '/assets/images/authors/michael.jpg'],
        'date' => '2024-01-05',
        'read_time' => '11 min read',
        'thumbnail' => '/assets/images/blog/abm-guide-thumb.jpg'
    ],
    [
        'id' => 6,
        'title' => 'The State of B2B Digital Marketing: 2024 Trends Report',
        'slug' => 'b2b-digital-marketing-trends-2024',
        'excerpt' => 'Key trends, statistics, and predictions shaping the B2B digital marketing landscape this year.',
        'category' => 'industry-insights',
        'author' => ['name' => 'Sarah Johnson', 'avatar' => '/assets/images/authors/sarah.jpg'],
        'date' => '2024-01-03',
        'read_time' => '7 min read',
        'thumbnail' => '/assets/images/blog/trends-report-thumb.jpg'
    ],
    [
        'id' => 7,
        'title' => 'LinkedIn Marketing Strategies for B2B Lead Generation',
        'slug' => 'linkedin-marketing-b2b-lead-generation',
        'excerpt' => 'Maximize your LinkedIn presence to generate quality leads and build meaningful business relationships.',
        'category' => 'digital-marketing',
        'author' => ['name' => 'David Chen', 'avatar' => '/assets/images/authors/david.jpg'],
        'date' => '2024-01-01',
        'read_time' => '8 min read',
        'thumbnail' => '/assets/images/blog/linkedin-strategy-thumb.jpg'
    ],
    [
        'id' => 8,
        'title' => 'Data-Driven Decision Making in B2B Marketing',
        'slug' => 'data-driven-decision-making-b2b-marketing',
        'excerpt' => 'How to leverage data and analytics to make smarter marketing decisions and improve ROI.',
        'category' => 'industry-insights',
        'author' => ['name' => 'Emily Rodriguez', 'avatar' => '/assets/images/authors/emily.jpg'],
        'date' => '2023-12-28',
        'read_time' => '9 min read',
        'thumbnail' => '/assets/images/blog/data-driven-thumb.jpg'
    ],
    [
        'id' => 9,
        'title' => 'Technical SEO Audit Checklist for B2B Websites',
        'slug' => 'technical-seo-audit-checklist-b2b',
        'excerpt' => 'A comprehensive checklist to identify and fix technical SEO issues affecting your website\'s performance.',
        'category' => 'seo',
        'author' => ['name' => 'David Chen', 'avatar' => '/assets/images/authors/david.jpg'],
        'date' => '2023-12-25',
        'read_time' => '10 min read',
        'thumbnail' => '/assets/images/blog/seo-audit-thumb.jpg'
    ]
];

// Newsletter subscription
$newsletter_enabled = true;

include __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1241-1242: BLOG HERO SECTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="blog-hero" aria-labelledby="blog-hero-title">
    <div class="container">
        <div class="blog-hero__content">
            <span class="blog-hero__badge">Our Blog</span>
            <h1 id="blog-hero-title" class="blog-hero__title">
                Marketing Insights & <span class="text-gradient">Expert Strategies</span>
            </h1>
            <p class="blog-hero__description">
                Stay ahead of the curve with expert insights on B2B lead generation, digital marketing,
                SEO, and business growth strategies from our team of industry professionals.
            </p>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1243-1244: FEATURED POST -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="blog-featured" aria-labelledby="featured-post-title">
    <div class="container">
        <h2 id="featured-post-title" class="visually-hidden">Featured Article</h2>
        <article class="featured-post" aria-labelledby="featured-<?= $featured_post['id'] ?>-title">
            <div class="featured-post__image">
                <div class="featured-post__image-placeholder" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
                <span class="featured-post__badge">Featured</span>
            </div>
            <div class="featured-post__content">
                <div class="featured-post__meta">
                    <span class="featured-post__category"><?= htmlspecialchars($blog_categories[$featured_post['category']] ?? $featured_post['category']) ?></span>
                    <span class="featured-post__divider" aria-hidden="true">•</span>
                    <time class="featured-post__date" datetime="<?= $featured_post['date'] ?>">
                        <?= date('M d, Y', strtotime($featured_post['date'])) ?>
                    </time>
                    <span class="featured-post__divider" aria-hidden="true">•</span>
                    <span class="featured-post__read-time"><?= htmlspecialchars($featured_post['read_time']) ?></span>
                </div>
                <h3 id="featured-<?= $featured_post['id'] ?>-title" class="featured-post__title">
                    <a href="<?= SITE_URL ?>/blog/<?= htmlspecialchars($featured_post['slug']) ?>">
                        <?= htmlspecialchars($featured_post['title']) ?>
                    </a>
                </h3>
                <p class="featured-post__excerpt"><?= htmlspecialchars($featured_post['excerpt']) ?></p>
                <div class="featured-post__tags">
                    <?php foreach ($featured_post['tags'] as $tag): ?>
                    <span class="featured-post__tag"><?= htmlspecialchars($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="featured-post__author">
                    <div class="featured-post__author-avatar" aria-hidden="true">
                        <span><?= substr($featured_post['author']['name'], 0, 1) ?></span>
                    </div>
                    <div class="featured-post__author-info">
                        <span class="featured-post__author-name"><?= htmlspecialchars($featured_post['author']['name']) ?></span>
                        <span class="featured-post__author-role"><?= htmlspecialchars($featured_post['author']['role']) ?></span>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1245-1248: BLOG GRID WITH FILTERS -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<section class="blog-grid-section" aria-labelledby="blog-grid-title">
    <div class="container">
        <div class="blog-section-header">
            <h2 id="blog-grid-title" class="blog-section-header__title">Latest Articles</h2>
        </div>

        <!-- Category Filters -->
        <nav class="blog-filters" aria-label="Blog category filters">
            <ul class="blog-filters__list" role="tablist">
                <?php foreach ($blog_categories as $key => $label): ?>
                <li class="blog-filters__item" role="presentation">
                    <button
                        class="blog-filters__btn<?= $key === 'all' ? ' blog-filters__btn--active' : '' ?>"
                        role="tab"
                        aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>"
                        aria-controls="blog-grid"
                        data-filter="<?= htmlspecialchars($key) ?>"
                    >
                        <?= htmlspecialchars($label) ?>
                    </button>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Blog Grid -->
        <div id="blog-grid" class="blog-grid" role="tabpanel" aria-live="polite">
            <?php foreach ($blog_posts as $post): ?>
            <article
                class="blog-card"
                data-category="<?= htmlspecialchars($post['category']) ?>"
                aria-labelledby="blog-<?= $post['id'] ?>-title"
            >
                <div class="blog-card__image">
                    <a href="<?= SITE_URL ?>/blog/<?= htmlspecialchars($post['slug']) ?>" tabindex="-1" aria-hidden="true">
                        <div class="blog-card__image-placeholder">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="blog-card__content">
                    <div class="blog-card__meta">
                        <span class="blog-card__category"><?= htmlspecialchars($blog_categories[$post['category']] ?? $post['category']) ?></span>
                        <span class="blog-card__divider" aria-hidden="true">•</span>
                        <time class="blog-card__date" datetime="<?= $post['date'] ?>">
                            <?= date('M d, Y', strtotime($post['date'])) ?>
                        </time>
                    </div>
                    <h3 id="blog-<?= $post['id'] ?>-title" class="blog-card__title">
                        <a href="<?= SITE_URL ?>/blog/<?= htmlspecialchars($post['slug']) ?>">
                            <?= htmlspecialchars($post['title']) ?>
                        </a>
                    </h3>
                    <p class="blog-card__excerpt"><?= htmlspecialchars($post['excerpt']) ?></p>
                    <div class="blog-card__footer">
                        <div class="blog-card__author">
                            <div class="blog-card__author-avatar" aria-hidden="true">
                                <span><?= substr($post['author']['name'], 0, 1) ?></span>
                            </div>
                            <span class="blog-card__author-name"><?= htmlspecialchars($post['author']['name']) ?></span>
                        </div>
                        <span class="blog-card__read-time"><?= htmlspecialchars($post['read_time']) ?></span>
                    </div>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <nav class="blog-pagination" aria-label="Blog pagination">
            <a href="#" class="blog-pagination__btn blog-pagination__btn--prev" aria-disabled="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Previous
            </a>
            <div class="blog-pagination__pages">
                <a href="#" class="blog-pagination__page blog-pagination__page--active" aria-current="page">1</a>
                <a href="#" class="blog-pagination__page">2</a>
                <a href="#" class="blog-pagination__page">3</a>
                <span class="blog-pagination__ellipsis">...</span>
                <a href="#" class="blog-pagination__page">12</a>
            </div>
            <a href="#" class="blog-pagination__btn blog-pagination__btn--next">
                Next
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </nav>
    </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1249-1250: NEWSLETTER SUBSCRIPTION -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<?php if ($newsletter_enabled): ?>
<section class="blog-newsletter" aria-labelledby="newsletter-title">
    <div class="container">
        <div class="blog-newsletter__content">
            <div class="blog-newsletter__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                    <polyline points="22,6 12,13 2,6"/>
                </svg>
            </div>
            <h2 id="newsletter-title" class="blog-newsletter__title">Subscribe to Our Newsletter</h2>
            <p class="blog-newsletter__description">
                Get the latest B2B marketing insights, strategies, and industry updates delivered directly to your inbox. No spam, unsubscribe anytime.
            </p>
            <form class="blog-newsletter__form" action="<?= SITE_URL ?>/newsletter-subscribe" method="POST" aria-label="Newsletter subscription form">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">
                <div class="blog-newsletter__input-group">
                    <label for="newsletter-email" class="visually-hidden">Email address</label>
                    <input
                        type="email"
                        id="newsletter-email"
                        name="email"
                        class="blog-newsletter__input"
                        placeholder="Enter your email address"
                        required
                        aria-describedby="newsletter-privacy"
                    >
                    <button type="submit" class="btn btn--primary blog-newsletter__btn">
                        Subscribe
                    </button>
                </div>
                <p id="newsletter-privacy" class="blog-newsletter__privacy">
                    By subscribing, you agree to our <a href="<?= SITE_URL ?>/privacy-policy">Privacy Policy</a>.
                </p>
            </form>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SCHEMA.ORG STRUCTURED DATA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "VP Internationals Blog",
    "description": "<?= htmlspecialchars($page_config['meta_description']) ?>",
    "url": "<?= htmlspecialchars($page_config['canonical_url']) ?>",
    "publisher": {
        "@type": "Organization",
        "name": "VP Internationals",
        "logo": {
            "@type": "ImageObject",
            "url": "<?= SITE_URL ?>/assets/images/logo.png"
        }
    },
    "blogPost": [
        {
            "@type": "BlogPosting",
            "headline": "<?= htmlspecialchars($featured_post['title']) ?>",
            "description": "<?= htmlspecialchars($featured_post['excerpt']) ?>",
            "url": "<?= SITE_URL ?>/blog/<?= htmlspecialchars($featured_post['slug']) ?>",
            "datePublished": "<?= $featured_post['date'] ?>",
            "author": {
                "@type": "Person",
                "name": "<?= htmlspecialchars($featured_post['author']['name']) ?>"
            }
        }
        <?php foreach (array_slice($blog_posts, 0, 5) as $post): ?>,
        {
            "@type": "BlogPosting",
            "headline": "<?= htmlspecialchars($post['title']) ?>",
            "description": "<?= htmlspecialchars($post['excerpt']) ?>",
            "url": "<?= SITE_URL ?>/blog/<?= htmlspecialchars($post['slug']) ?>",
            "datePublished": "<?= $post['date'] ?>",
            "author": {
                "@type": "Person",
                "name": "<?= htmlspecialchars($post['author']['name']) ?>"
            }
        }
        <?php endforeach; ?>
    ]
}
</script>

<style>
/* ═══════════════════════════════════════════════════════════════ */
/* BLOG PAGE STYLES */
/* ═══════════════════════════════════════════════════════════════ */

/* Hero */
.blog-hero {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-800) 100%);
    color: var(--color-white);
    text-align: center;
}
.blog-hero__badge {
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
.blog-hero__title {
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--spacing-6);
}
.blog-hero__description {
    font-size: var(--text-lg);
    opacity: 0.9;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
}

/* Featured Post */
.blog-featured { padding: var(--spacing-12) 0; }
.featured-post {
    display: grid;
    gap: var(--spacing-8);
    background: var(--color-white);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}
@media (min-width: 768px) {
    .featured-post { grid-template-columns: 1fr 1fr; }
}
.featured-post__image {
    position: relative;
    aspect-ratio: 16/10;
    background: var(--color-gray-100);
}
.featured-post__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, var(--color-primary-100), var(--color-primary-200));
}
.featured-post__image-placeholder svg {
    width: 64px;
    height: 64px;
    color: var(--color-primary-400);
}
.featured-post__badge {
    position: absolute;
    top: var(--spacing-4);
    left: var(--spacing-4);
    padding: var(--spacing-2) var(--spacing-3);
    background: var(--color-accent-500);
    color: var(--color-white);
    font-size: var(--text-xs);
    font-weight: 700;
    text-transform: uppercase;
    border-radius: var(--radius-md);
}
.featured-post__content { padding: var(--spacing-8); }
.featured-post__meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-4);
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}
.featured-post__category {
    color: var(--color-primary-600);
    font-weight: 600;
}
.featured-post__title {
    font-size: var(--text-2xl);
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: var(--spacing-4);
}
.featured-post__title a {
    color: var(--color-gray-900);
    text-decoration: none;
}
.featured-post__title a:hover { color: var(--color-primary-600); }
.featured-post__excerpt {
    color: var(--color-gray-600);
    line-height: 1.7;
    margin-bottom: var(--spacing-4);
}
.featured-post__tags {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-6);
}
.featured-post__tag {
    padding: var(--spacing-1) var(--spacing-3);
    background: var(--color-gray-100);
    border-radius: var(--radius-md);
    font-size: var(--text-xs);
    color: var(--color-gray-600);
}
.featured-post__author {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
}
.featured-post__author-avatar {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-600);
    color: var(--color-white);
    font-weight: 700;
    border-radius: 50%;
}
.featured-post__author-name {
    display: block;
    font-weight: 600;
    color: var(--color-gray-900);
}
.featured-post__author-role {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}

/* Blog Section Header */
.blog-section-header {
    margin-bottom: var(--spacing-6);
}
.blog-section-header__title {
    font-size: var(--text-2xl);
    font-weight: 700;
}

/* Blog Filters */
.blog-grid-section { padding: var(--spacing-12) 0; background: var(--color-gray-50); }
.blog-filters { margin-bottom: var(--spacing-8); }
.blog-filters__list {
    display: flex;
    flex-wrap: wrap;
    gap: var(--spacing-3);
    list-style: none;
    padding: 0;
    margin: 0;
}
.blog-filters__btn {
    padding: var(--spacing-2) var(--spacing-4);
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-full);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-600);
    cursor: pointer;
    transition: all var(--transition-base);
}
.blog-filters__btn:hover,
.blog-filters__btn--active {
    background: var(--color-primary-600);
    border-color: var(--color-primary-600);
    color: var(--color-white);
}

/* Blog Grid */
.blog-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--spacing-6);
}
@media (min-width: 640px) {
    .blog-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (min-width: 1024px) {
    .blog-grid { grid-template-columns: repeat(3, 1fr); }
}

/* Blog Card */
.blog-card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-base);
}
.blog-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}
.blog-card__image {
    aspect-ratio: 16/10;
    background: var(--color-gray-100);
    overflow: hidden;
}
.blog-card__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, var(--color-gray-100), var(--color-gray-200));
}
.blog-card__image-placeholder svg {
    width: 40px;
    height: 40px;
    color: var(--color-gray-400);
}
.blog-card__content { padding: var(--spacing-5); }
.blog-card__meta {
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-3);
    font-size: var(--text-xs);
    color: var(--color-gray-500);
}
.blog-card__category {
    color: var(--color-primary-600);
    font-weight: 600;
}
.blog-card__title {
    font-size: var(--text-lg);
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: var(--spacing-3);
}
.blog-card__title a {
    color: var(--color-gray-900);
    text-decoration: none;
}
.blog-card__title a:hover { color: var(--color-primary-600); }
.blog-card__excerpt {
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--spacing-4);
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.blog-card__footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: var(--spacing-4);
    border-top: 1px solid var(--color-gray-100);
}
.blog-card__author {
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
}
.blog-card__author-avatar {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-600);
    color: var(--color-white);
    font-size: var(--text-xs);
    font-weight: 700;
    border-radius: 50%;
}
.blog-card__author-name {
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-700);
}
.blog-card__read-time {
    font-size: var(--text-xs);
    color: var(--color-gray-500);
}
.blog-card[data-hidden="true"] { display: none; }

/* Pagination */
.blog-pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-4);
    margin-top: var(--spacing-10);
}
.blog-pagination__btn {
    display: inline-flex;
    align-items: center;
    gap: var(--spacing-2);
    padding: var(--spacing-3) var(--spacing-4);
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-600);
    text-decoration: none;
    transition: all var(--transition-base);
}
.blog-pagination__btn:hover:not([aria-disabled="true"]) {
    border-color: var(--color-primary-600);
    color: var(--color-primary-600);
}
.blog-pagination__btn[aria-disabled="true"] {
    opacity: 0.5;
    pointer-events: none;
}
.blog-pagination__btn svg { width: 16px; height: 16px; }
.blog-pagination__pages {
    display: flex;
    align-items: center;
    gap: var(--spacing-2);
}
.blog-pagination__page {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    font-weight: 500;
    color: var(--color-gray-600);
    text-decoration: none;
    transition: all var(--transition-base);
}
.blog-pagination__page:hover,
.blog-pagination__page--active {
    background: var(--color-primary-600);
    border-color: var(--color-primary-600);
    color: var(--color-white);
}
.blog-pagination__ellipsis {
    color: var(--color-gray-400);
}

/* Newsletter */
.blog-newsletter {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-primary-900) 0%, var(--color-primary-800) 100%);
    color: var(--color-white);
}
.blog-newsletter__content {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}
.blog-newsletter__icon {
    width: 64px;
    height: 64px;
    margin: 0 auto var(--spacing-6);
}
.blog-newsletter__icon svg {
    width: 100%;
    height: 100%;
    color: var(--color-accent-400);
}
.blog-newsletter__title {
    font-size: var(--text-2xl);
    font-weight: 800;
    margin-bottom: var(--spacing-4);
}
.blog-newsletter__description {
    font-size: var(--text-base);
    opacity: 0.9;
    margin-bottom: var(--spacing-8);
    line-height: 1.7;
}
.blog-newsletter__input-group {
    display: flex;
    flex-direction: column;
    gap: var(--spacing-3);
    margin-bottom: var(--spacing-4);
}
@media (min-width: 640px) {
    .blog-newsletter__input-group { flex-direction: row; }
}
.blog-newsletter__input {
    flex: 1;
    padding: var(--spacing-4);
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: var(--radius-md);
    font-size: var(--text-base);
    color: var(--color-white);
}
.blog-newsletter__input::placeholder { color: rgba(255,255,255,0.6); }
.blog-newsletter__input:focus {
    outline: none;
    border-color: var(--color-accent-400);
}
.blog-newsletter__btn {
    white-space: nowrap;
}
.blog-newsletter__privacy {
    font-size: var(--text-sm);
    opacity: 0.7;
}
.blog-newsletter__privacy a { color: var(--color-white); }
</style>

<script>
// ═══════════════════════════════════════════════════════════════
// BLOG PAGE JAVASCRIPT
// ═══════════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', function() {
    // Blog Filter Functionality
    const filterButtons = document.querySelectorAll('.blog-filters__btn');
    const blogCards = document.querySelectorAll('.blog-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active state
            filterButtons.forEach(btn => {
                btn.classList.remove('blog-filters__btn--active');
                btn.setAttribute('aria-selected', 'false');
            });
            this.classList.add('blog-filters__btn--active');
            this.setAttribute('aria-selected', 'true');

            // Filter cards
            blogCards.forEach(card => {
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

    // Newsletter Form Submission
    const newsletterForm = document.querySelector('.blog-newsletter__form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = this.querySelector('.blog-newsletter__btn');
            btn.textContent = 'Subscribing...';
            btn.disabled = true;

            // Simulate subscription (replace with actual AJAX call)
            setTimeout(() => {
                btn.textContent = 'Subscribed!';
                this.querySelector('.blog-newsletter__input').value = '';
                setTimeout(() => {
                    btn.textContent = 'Subscribe';
                    btn.disabled = false;
                }, 3000);
            }, 1000);
        });
    }
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
