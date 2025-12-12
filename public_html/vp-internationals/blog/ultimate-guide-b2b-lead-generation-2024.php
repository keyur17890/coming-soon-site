<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - BLOG SINGLE POST TEMPLATE
 * ═══════════════════════════════════════════════════════════════
 * Points 1251-1265: Individual blog post page with full content,
 * author info, related posts, and social sharing
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once dirname(__DIR__) . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 1251-1255: BLOG POST DATA
// ─────────────────────────────────────────────────────────────────
$post = [
    'id' => 1,
    'title' => 'The Ultimate Guide to B2B Lead Generation in 2024',
    'slug' => 'ultimate-guide-b2b-lead-generation-2024',
    'excerpt' => 'Discover the most effective strategies, tools, and best practices for generating high-quality B2B leads in today\'s competitive marketplace.',
    'category' => 'Lead Generation',
    'category_slug' => 'lead-generation',
    'author' => [
        'name' => 'Michael Thompson',
        'avatar' => '/assets/images/authors/michael.jpg',
        'role' => 'Head of Marketing',
        'bio' => 'Michael has over 15 years of experience in B2B marketing and lead generation. He has helped hundreds of companies scale their sales pipelines through strategic marketing initiatives.',
        'linkedin' => 'https://linkedin.com/in/michaelthompson',
        'twitter' => 'https://twitter.com/michaelthompson'
    ],
    'date_published' => '2024-01-15',
    'date_modified' => '2024-01-20',
    'read_time' => '12 min read',
    'featured_image' => '/assets/images/blog/lead-gen-guide-featured.jpg',
    'tags' => ['Lead Generation', 'B2B Sales', 'Marketing Strategy', 'ABM', 'Sales Pipeline']
];

// Table of Contents
$toc = [
    ['id' => 'introduction', 'title' => 'Introduction'],
    ['id' => 'what-is-b2b-lead-generation', 'title' => 'What is B2B Lead Generation?'],
    ['id' => 'key-strategies', 'title' => 'Key Lead Generation Strategies'],
    ['id' => 'tools-and-technologies', 'title' => 'Tools & Technologies'],
    ['id' => 'measuring-success', 'title' => 'Measuring Success'],
    ['id' => 'best-practices', 'title' => 'Best Practices for 2024'],
    ['id' => 'conclusion', 'title' => 'Conclusion']
];

// Related Posts
$related_posts = [
    [
        'title' => 'Account-Based Marketing: A Complete Implementation Guide',
        'slug' => 'account-based-marketing-implementation-guide',
        'excerpt' => 'Everything you need to know about implementing ABM strategies.',
        'date' => '2024-01-05',
        'read_time' => '11 min'
    ],
    [
        'title' => '10 Email Marketing Strategies That Actually Convert',
        'slug' => 'email-marketing-strategies-that-convert',
        'excerpt' => 'Learn proven email marketing techniques that drive conversions.',
        'date' => '2024-01-12',
        'read_time' => '8 min'
    ],
    [
        'title' => 'LinkedIn Marketing Strategies for B2B Lead Generation',
        'slug' => 'linkedin-marketing-b2b-lead-generation',
        'excerpt' => 'Maximize your LinkedIn presence to generate quality leads.',
        'date' => '2024-01-01',
        'read_time' => '8 min'
    ]
];

// ─────────────────────────────────────────────────────────────────
// PAGE CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => $post['title'] . ' | VP Internationals Blog',
    'meta_description' => $post['excerpt'],
    'meta_keywords' => implode(', ', $post['tags']) . ', B2B marketing, lead generation guide',
    'canonical_url' => SITE_URL . '/blog/' . $post['slug'],
    'og_type' => 'article',
    'og_image' => SITE_URL . $post['featured_image'],
    'body_class' => 'page-blog-single',
    'current_page' => 'blog'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Blog', 'url' => SITE_URL . '/blog'],
    ['name' => $post['title'], 'url' => $page_config['canonical_url']]
];

include dirname(__DIR__) . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 1256-1257: BLOG POST HEADER -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<article class="blog-single" itemscope itemtype="https://schema.org/BlogPosting">
    <header class="blog-single__header">
        <div class="container">
            <div class="blog-single__header-content">
                <div class="blog-single__meta">
                    <a href="<?= SITE_URL ?>/blog?category=<?= htmlspecialchars($post['category_slug']) ?>" class="blog-single__category" itemprop="articleSection">
                        <?= htmlspecialchars($post['category']) ?>
                    </a>
                    <span class="blog-single__divider" aria-hidden="true">•</span>
                    <time class="blog-single__date" datetime="<?= $post['date_published'] ?>" itemprop="datePublished">
                        <?= date('F d, Y', strtotime($post['date_published'])) ?>
                    </time>
                    <span class="blog-single__divider" aria-hidden="true">•</span>
                    <span class="blog-single__read-time"><?= htmlspecialchars($post['read_time']) ?></span>
                </div>
                <h1 class="blog-single__title" itemprop="headline"><?= htmlspecialchars($post['title']) ?></h1>
                <p class="blog-single__excerpt" itemprop="description"><?= htmlspecialchars($post['excerpt']) ?></p>
                <div class="blog-single__author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                    <div class="blog-single__author-avatar" aria-hidden="true">
                        <span><?= substr($post['author']['name'], 0, 1) ?></span>
                    </div>
                    <div class="blog-single__author-info">
                        <span class="blog-single__author-name" itemprop="name"><?= htmlspecialchars($post['author']['name']) ?></span>
                        <span class="blog-single__author-role"><?= htmlspecialchars($post['author']['role']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Featured Image -->
    <div class="blog-single__featured-image">
        <div class="container">
            <div class="blog-single__image-wrapper">
                <div class="blog-single__image-placeholder" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <polyline points="21 15 16 10 5 21"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- POINT 1258-1262: BLOG POST CONTENT -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <div class="blog-single__body">
        <div class="container">
            <div class="blog-single__layout">
                <!-- Table of Contents Sidebar -->
                <aside class="blog-single__sidebar" aria-label="Table of contents">
                    <nav class="blog-toc">
                        <h2 class="blog-toc__title">Table of Contents</h2>
                        <ul class="blog-toc__list">
                            <?php foreach ($toc as $item): ?>
                            <li class="blog-toc__item">
                                <a href="#<?= htmlspecialchars($item['id']) ?>" class="blog-toc__link">
                                    <?= htmlspecialchars($item['title']) ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>

                    <!-- Social Share -->
                    <div class="blog-share">
                        <h3 class="blog-share__title">Share This Article</h3>
                        <div class="blog-share__buttons">
                            <a href="https://twitter.com/intent/tweet?url=<?= urlencode($page_config['canonical_url']) ?>&text=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="blog-share__btn blog-share__btn--twitter" aria-label="Share on Twitter">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= urlencode($page_config['canonical_url']) ?>&title=<?= urlencode($post['title']) ?>" target="_blank" rel="noopener noreferrer" class="blog-share__btn blog-share__btn--linkedin" aria-label="Share on LinkedIn">
                                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                            <a href="mailto:?subject=<?= urlencode($post['title']) ?>&body=<?= urlencode('Check out this article: ' . $page_config['canonical_url']) ?>" class="blog-share__btn blog-share__btn--email" aria-label="Share via Email">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </a>
                            <button type="button" class="blog-share__btn blog-share__btn--copy" aria-label="Copy link" data-url="<?= htmlspecialchars($page_config['canonical_url']) ?>">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                            </button>
                        </div>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="blog-single__content" itemprop="articleBody">
                    <section id="introduction">
                        <p class="blog-single__lead">B2B lead generation has evolved dramatically over the past few years. With increasing competition and changing buyer behavior, businesses need to adopt modern strategies to stay ahead. This comprehensive guide covers everything you need to know about generating high-quality B2B leads in 2024.</p>
                    </section>

                    <section id="what-is-b2b-lead-generation">
                        <h2>What is B2B Lead Generation?</h2>
                        <p>B2B lead generation is the process of identifying and attracting potential business customers who have shown interest in your products or services. Unlike B2C, B2B lead generation typically involves longer sales cycles, multiple decision-makers, and higher-value transactions.</p>
                        <blockquote class="blog-single__quote">
                            <p>"The best B2B lead generation strategies focus on building relationships and providing value before asking for the sale."</p>
                        </blockquote>
                        <p>Effective lead generation combines multiple channels and tactics to create a steady flow of qualified prospects into your sales pipeline.</p>
                    </section>

                    <section id="key-strategies">
                        <h2>Key Lead Generation Strategies</h2>
                        <p>Here are the most effective B2B lead generation strategies for 2024:</p>

                        <h3>1. Content Marketing</h3>
                        <p>Creating valuable, educational content that addresses your target audience's pain points and challenges. This includes:</p>
                        <ul>
                            <li>In-depth blog posts and articles</li>
                            <li>Whitepapers and industry reports</li>
                            <li>Case studies showcasing client success</li>
                            <li>Video tutorials and webinars</li>
                            <li>Podcasts and audio content</li>
                        </ul>

                        <h3>2. Account-Based Marketing (ABM)</h3>
                        <p>ABM focuses on targeting specific high-value accounts with personalized campaigns. This approach is particularly effective for enterprise sales where deal sizes justify the additional investment.</p>

                        <div class="blog-single__callout">
                            <h4>Pro Tip</h4>
                            <p>Start with your top 50 target accounts and create personalized content specifically for each one. The higher touch approach yields significantly better results.</p>
                        </div>

                        <h3>3. LinkedIn Outreach</h3>
                        <p>LinkedIn remains the most effective social platform for B2B lead generation. Key tactics include:</p>
                        <ul>
                            <li>Optimizing your company and personal profiles</li>
                            <li>Sharing valuable content consistently</li>
                            <li>Engaging with your target audience's posts</li>
                            <li>Using LinkedIn Sales Navigator for prospecting</li>
                            <li>Running targeted LinkedIn advertising campaigns</li>
                        </ul>

                        <h3>4. Email Marketing</h3>
                        <p>Email continues to deliver one of the highest ROIs of any marketing channel. Focus on:</p>
                        <ul>
                            <li>Building segmented email lists</li>
                            <li>Personalizing content based on behavior and preferences</li>
                            <li>Automating nurture sequences</li>
                            <li>A/B testing subject lines and content</li>
                        </ul>

                        <h3>5. SEO and Organic Search</h3>
                        <p>Ranking for high-intent keywords brings qualified traffic to your website. Invest in:</p>
                        <ul>
                            <li>Technical SEO optimization</li>
                            <li>Content creation for target keywords</li>
                            <li>Link building and digital PR</li>
                            <li>Local SEO if applicable</li>
                        </ul>
                    </section>

                    <section id="tools-and-technologies">
                        <h2>Tools & Technologies</h2>
                        <p>The right technology stack can significantly improve your lead generation efficiency:</p>

                        <div class="blog-single__table-wrapper">
                            <table class="blog-single__table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Popular Tools</th>
                                        <th>Use Case</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>CRM</td>
                                        <td>Salesforce, HubSpot, Pipedrive</td>
                                        <td>Lead management & tracking</td>
                                    </tr>
                                    <tr>
                                        <td>Email Automation</td>
                                        <td>Mailchimp, ActiveCampaign, Klaviyo</td>
                                        <td>Nurture sequences & campaigns</td>
                                    </tr>
                                    <tr>
                                        <td>Data Enrichment</td>
                                        <td>ZoomInfo, Clearbit, Apollo</td>
                                        <td>Contact & company data</td>
                                    </tr>
                                    <tr>
                                        <td>Sales Engagement</td>
                                        <td>Outreach, SalesLoft, Reply.io</td>
                                        <td>Multi-channel outreach</td>
                                    </tr>
                                    <tr>
                                        <td>Analytics</td>
                                        <td>Google Analytics, Mixpanel, Heap</td>
                                        <td>Performance tracking</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section id="measuring-success">
                        <h2>Measuring Success</h2>
                        <p>Track these key metrics to measure your lead generation performance:</p>

                        <div class="blog-single__metrics">
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">Lead Volume</span>
                                <span class="blog-single__metric-desc">Total number of leads generated</span>
                            </div>
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">Lead Quality Score</span>
                                <span class="blog-single__metric-desc">Qualification score based on ICP fit</span>
                            </div>
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">Cost Per Lead (CPL)</span>
                                <span class="blog-single__metric-desc">Total spend divided by leads generated</span>
                            </div>
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">Conversion Rate</span>
                                <span class="blog-single__metric-desc">Percentage of leads that convert to opportunities</span>
                            </div>
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">Sales Cycle Length</span>
                                <span class="blog-single__metric-desc">Average time from lead to closed deal</span>
                            </div>
                            <div class="blog-single__metric">
                                <span class="blog-single__metric-name">ROI</span>
                                <span class="blog-single__metric-desc">Revenue generated vs. investment</span>
                            </div>
                        </div>
                    </section>

                    <section id="best-practices">
                        <h2>Best Practices for 2024</h2>
                        <ol>
                            <li><strong>Focus on quality over quantity</strong> - A smaller number of highly qualified leads will outperform a large list of unqualified contacts.</li>
                            <li><strong>Personalize at scale</strong> - Use technology to deliver personalized experiences without sacrificing efficiency.</li>
                            <li><strong>Align sales and marketing</strong> - Ensure both teams have shared goals and definitions of a qualified lead.</li>
                            <li><strong>Invest in data quality</strong> - Clean, accurate data is the foundation of effective lead generation.</li>
                            <li><strong>Test and iterate</strong> - Continuously experiment with new channels, messages, and tactics.</li>
                            <li><strong>Provide value first</strong> - Build trust by helping prospects before asking for anything in return.</li>
                        </ol>
                    </section>

                    <section id="conclusion">
                        <h2>Conclusion</h2>
                        <p>B2B lead generation in 2024 requires a multi-channel approach that combines proven strategies with modern technology. By focusing on providing value, personalizing your outreach, and continuously optimizing based on data, you can build a sustainable pipeline of high-quality leads.</p>
                        <p>Ready to accelerate your B2B lead generation? <a href="<?= SITE_URL ?>/contact">Contact our team</a> to learn how VP Internationals can help you achieve your growth goals.</p>
                    </section>

                    <!-- Tags -->
                    <footer class="blog-single__footer">
                        <div class="blog-single__tags">
                            <span class="blog-single__tags-label">Tags:</span>
                            <?php foreach ($post['tags'] as $tag): ?>
                            <a href="<?= SITE_URL ?>/blog?tag=<?= urlencode($tag) ?>" class="blog-single__tag"><?= htmlspecialchars($tag) ?></a>
                            <?php endforeach; ?>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- POINT 1263: AUTHOR BIO -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <section class="blog-author-bio" aria-labelledby="author-bio-title">
        <div class="container">
            <h2 id="author-bio-title" class="visually-hidden">About the Author</h2>
            <div class="blog-author-bio__card">
                <div class="blog-author-bio__avatar" aria-hidden="true">
                    <span><?= substr($post['author']['name'], 0, 1) ?></span>
                </div>
                <div class="blog-author-bio__content">
                    <h3 class="blog-author-bio__name"><?= htmlspecialchars($post['author']['name']) ?></h3>
                    <p class="blog-author-bio__role"><?= htmlspecialchars($post['author']['role']) ?></p>
                    <p class="blog-author-bio__text"><?= htmlspecialchars($post['author']['bio']) ?></p>
                    <div class="blog-author-bio__social">
                        <a href="<?= htmlspecialchars($post['author']['linkedin']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow on LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="<?= htmlspecialchars($post['author']['twitter']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Follow on Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- POINT 1264-1265: RELATED POSTS -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <section class="blog-related" aria-labelledby="related-title">
        <div class="container">
            <h2 id="related-title" class="blog-related__title">Related Articles</h2>
            <div class="blog-related__grid">
                <?php foreach ($related_posts as $related): ?>
                <article class="blog-related__card">
                    <div class="blog-related__image">
                        <div class="blog-related__image-placeholder" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <polyline points="21 15 16 10 5 21"/>
                            </svg>
                        </div>
                    </div>
                    <div class="blog-related__content">
                        <time class="blog-related__date" datetime="<?= $related['date'] ?>">
                            <?= date('M d, Y', strtotime($related['date'])) ?>
                        </time>
                        <h3 class="blog-related__card-title">
                            <a href="<?= SITE_URL ?>/blog/<?= htmlspecialchars($related['slug']) ?>">
                                <?= htmlspecialchars($related['title']) ?>
                            </a>
                        </h3>
                        <p class="blog-related__excerpt"><?= htmlspecialchars($related['excerpt']) ?></p>
                        <span class="blog-related__read-time"><?= htmlspecialchars($related['read_time']) ?></span>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="blog-cta" aria-labelledby="blog-cta-title">
        <div class="container">
            <div class="blog-cta__content">
                <h2 id="blog-cta-title" class="blog-cta__title">Need Help With Lead Generation?</h2>
                <p class="blog-cta__text">Our experts can help you build a scalable lead generation engine that delivers qualified prospects consistently.</p>
                <a href="<?= SITE_URL ?>/contact" class="btn btn--primary btn--lg">Get Started Today</a>
            </div>
        </div>
    </section>
</article>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- SCHEMA.ORG STRUCTURED DATA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?= htmlspecialchars($post['title']) ?>",
    "description": "<?= htmlspecialchars($post['excerpt']) ?>",
    "image": "<?= SITE_URL . htmlspecialchars($post['featured_image']) ?>",
    "author": {
        "@type": "Person",
        "name": "<?= htmlspecialchars($post['author']['name']) ?>",
        "jobTitle": "<?= htmlspecialchars($post['author']['role']) ?>",
        "url": "<?= htmlspecialchars($post['author']['linkedin']) ?>"
    },
    "publisher": {
        "@type": "Organization",
        "name": "VP Internationals",
        "logo": {
            "@type": "ImageObject",
            "url": "<?= SITE_URL ?>/assets/images/logo.png"
        }
    },
    "datePublished": "<?= $post['date_published'] ?>",
    "dateModified": "<?= $post['date_modified'] ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?= htmlspecialchars($page_config['canonical_url']) ?>"
    },
    "keywords": "<?= htmlspecialchars(implode(', ', $post['tags'])) ?>",
    "articleSection": "<?= htmlspecialchars($post['category']) ?>",
    "wordCount": 1500
}
</script>

<style>
/* ═══════════════════════════════════════════════════════════════ */
/* BLOG SINGLE PAGE STYLES */
/* ═══════════════════════════════════════════════════════════════ */

/* Header */
.blog-single__header {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-gray-900) 0%, var(--color-primary-900) 100%);
    color: var(--color-white);
}
.blog-single__header-content { max-width: 800px; }
.blog-single__meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-4);
    font-size: var(--text-sm);
}
.blog-single__category {
    color: var(--color-accent-400);
    font-weight: 600;
    text-decoration: none;
}
.blog-single__divider { opacity: 0.5; }
.blog-single__title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: var(--spacing-6);
}
.blog-single__excerpt {
    font-size: var(--text-lg);
    opacity: 0.9;
    line-height: 1.7;
    margin-bottom: var(--spacing-8);
}
.blog-single__author {
    display: flex;
    align-items: center;
    gap: var(--spacing-3);
}
.blog-single__author-avatar {
    width: 48px;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-accent-500);
    color: var(--color-white);
    font-weight: 700;
    font-size: var(--text-lg);
    border-radius: 50%;
}
.blog-single__author-name {
    display: block;
    font-weight: 600;
}
.blog-single__author-role {
    display: block;
    font-size: var(--text-sm);
    opacity: 0.8;
}

/* Featured Image */
.blog-single__featured-image {
    margin-top: -60px;
    position: relative;
    z-index: 10;
    padding-bottom: var(--spacing-12);
}
.blog-single__image-wrapper {
    max-width: 900px;
    margin: 0 auto;
    aspect-ratio: 16/9;
    background: var(--color-gray-100);
    border-radius: var(--radius-xl);
    overflow: hidden;
    box-shadow: var(--shadow-xl);
}
.blog-single__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, var(--color-primary-100), var(--color-primary-200));
}
.blog-single__image-placeholder svg {
    width: 80px;
    height: 80px;
    color: var(--color-primary-400);
}

/* Body Layout */
.blog-single__body { padding: var(--spacing-12) 0; }
.blog-single__layout {
    display: grid;
    gap: var(--spacing-10);
}
@media (min-width: 1024px) {
    .blog-single__layout {
        grid-template-columns: 250px 1fr;
    }
}

/* Sidebar */
.blog-single__sidebar {
    position: sticky;
    top: 100px;
    height: fit-content;
}

/* Table of Contents */
.blog-toc {
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
    padding: var(--spacing-6);
    margin-bottom: var(--spacing-6);
}
.blog-toc__title {
    font-size: var(--text-sm);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-gray-500);
    margin-bottom: var(--spacing-4);
}
.blog-toc__list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.blog-toc__item { margin-bottom: var(--spacing-2); }
.blog-toc__link {
    display: block;
    padding: var(--spacing-2);
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    text-decoration: none;
    border-radius: var(--radius-md);
    transition: all var(--transition-base);
}
.blog-toc__link:hover,
.blog-toc__link.active {
    background: var(--color-white);
    color: var(--color-primary-600);
}

/* Social Share */
.blog-share {
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
    padding: var(--spacing-6);
}
.blog-share__title {
    font-size: var(--text-sm);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-gray-500);
    margin-bottom: var(--spacing-4);
}
.blog-share__buttons {
    display: flex;
    gap: var(--spacing-2);
}
.blog-share__btn {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-white);
    border: 1px solid var(--color-gray-200);
    border-radius: var(--radius-md);
    color: var(--color-gray-600);
    transition: all var(--transition-base);
    cursor: pointer;
}
.blog-share__btn:hover { border-color: var(--color-gray-400); }
.blog-share__btn svg { width: 18px; height: 18px; }
.blog-share__btn--twitter:hover { background: #1DA1F2; color: white; border-color: #1DA1F2; }
.blog-share__btn--linkedin:hover { background: #0A66C2; color: white; border-color: #0A66C2; }
.blog-share__btn--email:hover { background: var(--color-gray-700); color: white; border-color: var(--color-gray-700); }
.blog-share__btn--copy:hover { background: var(--color-accent-500); color: white; border-color: var(--color-accent-500); }

/* Content */
.blog-single__content {
    max-width: 720px;
    font-size: var(--text-lg);
    line-height: 1.8;
    color: var(--color-gray-700);
}
.blog-single__content h2 {
    font-size: var(--text-2xl);
    font-weight: 700;
    color: var(--color-gray-900);
    margin: var(--spacing-10) 0 var(--spacing-4);
    scroll-margin-top: 100px;
}
.blog-single__content h3 {
    font-size: var(--text-xl);
    font-weight: 600;
    color: var(--color-gray-900);
    margin: var(--spacing-8) 0 var(--spacing-3);
}
.blog-single__content p { margin-bottom: var(--spacing-6); }
.blog-single__content ul, .blog-single__content ol {
    margin: var(--spacing-6) 0;
    padding-left: var(--spacing-6);
}
.blog-single__content li { margin-bottom: var(--spacing-2); }
.blog-single__content a {
    color: var(--color-primary-600);
    text-decoration: underline;
}
.blog-single__lead {
    font-size: var(--text-xl);
    color: var(--color-gray-600);
    margin-bottom: var(--spacing-8);
}

/* Quote */
.blog-single__quote {
    margin: var(--spacing-8) 0;
    padding: var(--spacing-6) var(--spacing-8);
    background: var(--color-gray-50);
    border-left: 4px solid var(--color-accent-500);
    font-style: italic;
    color: var(--color-gray-700);
}
.blog-single__quote p { margin: 0; }

/* Callout */
.blog-single__callout {
    margin: var(--spacing-8) 0;
    padding: var(--spacing-6);
    background: var(--color-primary-50);
    border-radius: var(--radius-lg);
    border: 1px solid var(--color-primary-200);
}
.blog-single__callout h4 {
    font-size: var(--text-base);
    font-weight: 700;
    color: var(--color-primary-700);
    margin-bottom: var(--spacing-2);
}
.blog-single__callout p {
    margin: 0;
    color: var(--color-primary-800);
}

/* Table */
.blog-single__table-wrapper {
    overflow-x: auto;
    margin: var(--spacing-8) 0;
}
.blog-single__table {
    width: 100%;
    border-collapse: collapse;
    font-size: var(--text-base);
}
.blog-single__table th, .blog-single__table td {
    padding: var(--spacing-3) var(--spacing-4);
    text-align: left;
    border-bottom: 1px solid var(--color-gray-200);
}
.blog-single__table th {
    background: var(--color-gray-50);
    font-weight: 600;
    color: var(--color-gray-900);
}

/* Metrics */
.blog-single__metrics {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: var(--spacing-4);
    margin: var(--spacing-8) 0;
}
@media (min-width: 640px) {
    .blog-single__metrics { grid-template-columns: repeat(3, 1fr); }
}
.blog-single__metric {
    padding: var(--spacing-4);
    background: var(--color-gray-50);
    border-radius: var(--radius-lg);
    text-align: center;
}
.blog-single__metric-name {
    display: block;
    font-weight: 700;
    color: var(--color-gray-900);
    margin-bottom: var(--spacing-1);
}
.blog-single__metric-desc {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-gray-500);
}

/* Footer/Tags */
.blog-single__footer {
    margin-top: var(--spacing-10);
    padding-top: var(--spacing-6);
    border-top: 1px solid var(--color-gray-200);
}
.blog-single__tags {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: var(--spacing-2);
}
.blog-single__tags-label {
    font-weight: 600;
    color: var(--color-gray-700);
}
.blog-single__tag {
    padding: var(--spacing-1) var(--spacing-3);
    background: var(--color-gray-100);
    border-radius: var(--radius-md);
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    text-decoration: none;
    transition: all var(--transition-base);
}
.blog-single__tag:hover {
    background: var(--color-primary-100);
    color: var(--color-primary-700);
}

/* Author Bio */
.blog-author-bio {
    padding: var(--spacing-12) 0;
    background: var(--color-gray-50);
}
.blog-author-bio__card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: var(--spacing-6);
    max-width: 600px;
    margin: 0 auto;
    padding: var(--spacing-8);
    background: var(--color-white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
}
@media (min-width: 640px) {
    .blog-author-bio__card {
        flex-direction: row;
        text-align: left;
    }
}
.blog-author-bio__avatar {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-primary-600);
    color: var(--color-white);
    font-size: var(--text-2xl);
    font-weight: 700;
    border-radius: 50%;
}
.blog-author-bio__name {
    font-size: var(--text-xl);
    font-weight: 700;
    margin-bottom: var(--spacing-1);
}
.blog-author-bio__role {
    display: block;
    font-size: var(--text-sm);
    color: var(--color-primary-600);
    font-weight: 500;
    margin-bottom: var(--spacing-3);
}
.blog-author-bio__text {
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    line-height: 1.6;
    margin-bottom: var(--spacing-4);
}
.blog-author-bio__social {
    display: flex;
    gap: var(--spacing-3);
}
.blog-author-bio__social a {
    width: 36px;
    height: 36px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--color-gray-100);
    color: var(--color-gray-600);
    border-radius: 50%;
    transition: all var(--transition-base);
}
.blog-author-bio__social a:hover {
    background: var(--color-primary-600);
    color: var(--color-white);
}
.blog-author-bio__social svg { width: 18px; height: 18px; }

/* Related Posts */
.blog-related {
    padding: var(--spacing-12) 0;
}
.blog-related__title {
    font-size: var(--text-2xl);
    font-weight: 700;
    margin-bottom: var(--spacing-8);
    text-align: center;
}
.blog-related__grid {
    display: grid;
    gap: var(--spacing-6);
}
@media (min-width: 768px) {
    .blog-related__grid { grid-template-columns: repeat(3, 1fr); }
}
.blog-related__card {
    background: var(--color-white);
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition-base);
}
.blog-related__card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}
.blog-related__image {
    aspect-ratio: 16/10;
    background: var(--color-gray-100);
}
.blog-related__image-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    background: linear-gradient(135deg, var(--color-gray-100), var(--color-gray-200));
}
.blog-related__image-placeholder svg {
    width: 32px;
    height: 32px;
    color: var(--color-gray-400);
}
.blog-related__content { padding: var(--spacing-5); }
.blog-related__date {
    display: block;
    font-size: var(--text-xs);
    color: var(--color-gray-500);
    margin-bottom: var(--spacing-2);
}
.blog-related__card-title {
    font-size: var(--text-base);
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: var(--spacing-2);
}
.blog-related__card-title a {
    color: var(--color-gray-900);
    text-decoration: none;
}
.blog-related__card-title a:hover { color: var(--color-primary-600); }
.blog-related__excerpt {
    font-size: var(--text-sm);
    color: var(--color-gray-600);
    line-height: 1.5;
    margin-bottom: var(--spacing-3);
}
.blog-related__read-time {
    font-size: var(--text-xs);
    color: var(--color-gray-500);
}

/* CTA */
.blog-cta {
    padding: var(--spacing-16) 0;
    background: linear-gradient(135deg, var(--color-accent-600) 0%, var(--color-accent-700) 100%);
    color: var(--color-white);
    text-align: center;
}
.blog-cta__title {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: var(--spacing-4);
}
.blog-cta__text {
    font-size: var(--text-lg);
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto var(--spacing-8);
}
.blog-cta .btn--primary {
    background: var(--color-white);
    color: var(--color-accent-600);
}
</style>

<script>
// ═══════════════════════════════════════════════════════════════
// BLOG SINGLE PAGE JAVASCRIPT
// ═══════════════════════════════════════════════════════════════
document.addEventListener('DOMContentLoaded', function() {
    // Copy link functionality
    const copyBtn = document.querySelector('.blog-share__btn--copy');
    if (copyBtn) {
        copyBtn.addEventListener('click', function() {
            const url = this.dataset.url;
            navigator.clipboard.writeText(url).then(() => {
                this.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>';
                setTimeout(() => {
                    this.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>';
                }, 2000);
            });
        });
    }

    // Active TOC link on scroll
    const tocLinks = document.querySelectorAll('.blog-toc__link');
    const sections = document.querySelectorAll('.blog-single__content section[id]');

    if (tocLinks.length && sections.length) {
        const observerOptions = {
            rootMargin: '-100px 0px -70% 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    tocLinks.forEach(link => link.classList.remove('active'));
                    const activeLink = document.querySelector(`.blog-toc__link[href="#${entry.target.id}"]`);
                    if (activeLink) activeLink.classList.add('active');
                }
            });
        }, observerOptions);

        sections.forEach(section => observer.observe(section));
    }

    // Smooth scroll for TOC links
    tocLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').slice(1);
            const target = document.getElementById(targetId);
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
</script>

<?php include dirname(__DIR__) . '/includes/footer.php'; ?>
