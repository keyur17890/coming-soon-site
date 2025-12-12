<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - DYNAMIC XML SITEMAP
 * ═══════════════════════════════════════════════════════════════
 * Points 1266-1272: Dynamic XML sitemap generator for SEO
 * Automatically generates sitemap with all pages, services,
 * portfolio items, and blog posts
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Prevent direct access errors - load config silently
error_reporting(0);

// Set content type to XML
header('Content-Type: application/xml; charset=utf-8');

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 1266-1268: SITEMAP DATA STRUCTURE
// ─────────────────────────────────────────────────────────────────

/**
 * Static pages with their priorities and change frequencies
 */
$static_pages = [
    ['loc' => '', 'priority' => '1.0', 'changefreq' => 'weekly'],
    ['loc' => '/about', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services', 'priority' => '0.9', 'changefreq' => 'weekly'],
    ['loc' => '/portfolio', 'priority' => '0.8', 'changefreq' => 'weekly'],
    ['loc' => '/blog', 'priority' => '0.9', 'changefreq' => 'daily'],
    ['loc' => '/contact', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/privacy-policy', 'priority' => '0.3', 'changefreq' => 'yearly'],
    ['loc' => '/terms-conditions', 'priority' => '0.3', 'changefreq' => 'yearly']
];

/**
 * Service pages
 */
$service_pages = [
    ['loc' => '/services/lead-generation', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/data-solutions', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/digital-marketing', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/web-development', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/seo', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/content-marketing', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/email-marketing', 'priority' => '0.8', 'changefreq' => 'monthly'],
    ['loc' => '/services/social-media', 'priority' => '0.8', 'changefreq' => 'monthly']
];

/**
 * Portfolio/Case study pages
 */
$portfolio_pages = [
    ['loc' => '/portfolio/techcorp-saas-lead-generation', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/portfolio/medifast-healthcare-digital-marketing', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/portfolio/financehub-fintech-web-development', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/portfolio/globalretail-ecommerce-seo', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/portfolio/datamax-b2b-database-solutions', 'priority' => '0.7', 'changefreq' => 'monthly'],
    ['loc' => '/portfolio/cloudserve-enterprise-abm', 'priority' => '0.7', 'changefreq' => 'monthly']
];

/**
 * Blog posts - In production, these would be fetched from database
 */
$blog_pages = [
    ['loc' => '/blog/ultimate-guide-b2b-lead-generation-2024', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-20'],
    ['loc' => '/blog/email-marketing-strategies-that-convert', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-12'],
    ['loc' => '/blog/seo-best-practices-b2b-websites-2024', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-10'],
    ['loc' => '/blog/content-marketing-strategy-drives-leads', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-08'],
    ['loc' => '/blog/account-based-marketing-implementation-guide', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-05'],
    ['loc' => '/blog/b2b-digital-marketing-trends-2024', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-03'],
    ['loc' => '/blog/linkedin-marketing-b2b-lead-generation', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2024-01-01'],
    ['loc' => '/blog/data-driven-decision-making-b2b-marketing', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2023-12-28'],
    ['loc' => '/blog/technical-seo-audit-checklist-b2b', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => '2023-12-25']
];

// ─────────────────────────────────────────────────────────────────
// POINT 1269-1272: XML SITEMAP GENERATION
// ─────────────────────────────────────────────────────────────────

// Current date for lastmod
$current_date = date('Y-m-d');

// Helper function to escape XML special characters
function xmlEscape(string $string): string {
    return htmlspecialchars($string, ENT_XML1 | ENT_QUOTES, 'UTF-8');
}

// Start XML output
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php
// ─────────────────────────────────────────────────────────────────
// Static Pages
// ─────────────────────────────────────────────────────────────────
foreach ($static_pages as $page):
?>
    <url>
        <loc><?= xmlEscape(SITE_URL . $page['loc']) ?></loc>
        <lastmod><?= $current_date ?></lastmod>
        <changefreq><?= $page['changefreq'] ?></changefreq>
        <priority><?= $page['priority'] ?></priority>
    </url>
<?php endforeach; ?>

<?php
// ─────────────────────────────────────────────────────────────────
// Service Pages
// ─────────────────────────────────────────────────────────────────
foreach ($service_pages as $page):
?>
    <url>
        <loc><?= xmlEscape(SITE_URL . $page['loc']) ?></loc>
        <lastmod><?= $current_date ?></lastmod>
        <changefreq><?= $page['changefreq'] ?></changefreq>
        <priority><?= $page['priority'] ?></priority>
    </url>
<?php endforeach; ?>

<?php
// ─────────────────────────────────────────────────────────────────
// Portfolio Pages
// ─────────────────────────────────────────────────────────────────
foreach ($portfolio_pages as $page):
?>
    <url>
        <loc><?= xmlEscape(SITE_URL . $page['loc']) ?></loc>
        <lastmod><?= $current_date ?></lastmod>
        <changefreq><?= $page['changefreq'] ?></changefreq>
        <priority><?= $page['priority'] ?></priority>
    </url>
<?php endforeach; ?>

<?php
// ─────────────────────────────────────────────────────────────────
// Blog Posts
// ─────────────────────────────────────────────────────────────────
foreach ($blog_pages as $page):
?>
    <url>
        <loc><?= xmlEscape(SITE_URL . $page['loc']) ?></loc>
        <lastmod><?= $page['lastmod'] ?? $current_date ?></lastmod>
        <changefreq><?= $page['changefreq'] ?></changefreq>
        <priority><?= $page['priority'] ?></priority>
    </url>
<?php endforeach; ?>

</urlset>
