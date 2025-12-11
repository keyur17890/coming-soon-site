<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - HEADER TEMPLATE
 * ═══════════════════════════════════════════════════════════════
 *
 * Global header template with SEO optimization, performance
 * improvements, and accessibility features.
 *
 * @package     VPInternationals
 * @subpackage  Templates
 * @author      VP Internationals
 * @copyright   2016-2025 VP Internationals
 * @license     Proprietary
 * @version     2.0.0
 *
 * IMPROVEMENTS IMPLEMENTED:
 * - Points 41-50: Performance (preconnect, preload, defer)
 * - Points 51-62: SEO (schema, OG tags, Twitter Cards)
 * - Points 63-67: Accessibility (ARIA, skip links)
 * - Points 68-70: Structural improvements
 * - Points 71-74: Navigation SEO optimization
 * ═══════════════════════════════════════════════════════════════
 */

// Prevent direct access
if (!defined('VP_ACCESS')) {
    http_response_code(403);
    exit('Direct access not permitted');
}

// ─────────────────────────────────────────────────────────────────
// PAGE CONFIGURATION DEFAULTS
// ─────────────────────────────────────────────────────────────────
// These can be overridden before including header.php

// Page meta (Point 69: Support for page-specific meta tags)
$page_title = $page_title ?? 'Professional Business Services';
$page_description = $page_description ?? SEO_DEFAULT_DESCRIPTION;
$page_keywords = $page_keywords ?? SEO_DEFAULT_KEYWORDS;
$page_canonical = $page_canonical ?? vp_canonical_url();

// Page controls
$page_robots = $page_robots ?? 'index, follow'; // Point 59: Dynamic robots
$page_type = $page_type ?? 'website'; // For OG type
$page_image = $page_image ?? SITE_URL . 'assets/images/og-default.jpg';
$page_css = $page_css ?? []; // Point 68: Page-specific CSS
$page_js_head = $page_js_head ?? []; // Page-specific JS for head

// Breadcrumb data (Point 53: Dynamic BreadcrumbList)
$breadcrumbs = $breadcrumbs ?? [];

// Current page for navigation highlighting (Point 74)
$current_page = $current_page ?? '';

// ─────────────────────────────────────────────────────────────────
// POINT 70: CANONICAL URL GENERATION
// ─────────────────────────────────────────────────────────────────
/**
 * Generate canonical URL for current page
 */
function generate_canonical(): string
{
    global $page_canonical;
    return $page_canonical;
}

// ─────────────────────────────────────────────────────────────────
// POINT 53: BREADCRUMB SCHEMA GENERATION
// ─────────────────────────────────────────────────────────────────
/**
 * Generate BreadcrumbList schema
 *
 * @param array $breadcrumbs Array of [name => url] pairs
 * @return string JSON-LD script
 */
function generate_breadcrumb_schema(array $breadcrumbs): string
{
    if (empty($breadcrumbs)) {
        return '';
    }

    // Always include home
    $items = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => SITE_URL
        ]
    ];

    $position = 2;
    foreach ($breadcrumbs as $name => $url) {
        $item = [
            '@type' => 'ListItem',
            'position' => $position,
            'name' => $name
        ];

        // Last item shouldn't have URL (current page)
        if ($url !== null && $url !== '') {
            $item['item'] = $url;
        }

        $items[] = $item;
        $position++;
    }

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// ─────────────────────────────────────────────────────────────────
// POINT 52: ORGANIZATION SCHEMA
// ─────────────────────────────────────────────────────────────────
/**
 * Generate Organization schema
 *
 * @return string JSON-LD script
 */
function generate_organization_schema(): string
{
    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => SITE_URL . '#organization',
        'name' => COMPANY_NAME,
        'legalName' => COMPANY_LEGAL_NAME,
        'url' => SITE_URL,
        'logo' => SITE_URL . 'assets/images/logo.png',
        'foundingDate' => COMPANY_FOUNDING_YEAR,
        'description' => SEO_DEFAULT_DESCRIPTION,
        'email' => COMPANY_EMAIL,
        'telephone' => COMPANY_PHONE,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => COMPANY_ADDRESS['street'],
            'addressLocality' => COMPANY_ADDRESS['city'],
            'addressRegion' => COMPANY_ADDRESS['state'],
            'postalCode' => COMPANY_ADDRESS['postal_code'],
            'addressCountry' => COMPANY_ADDRESS['country']
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => COMPANY_COORDINATES['latitude'],
            'longitude' => COMPANY_COORDINATES['longitude']
        ],
        'sameAs' => array_values(SOCIAL_LINKS),
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'telephone' => COMPANY_PHONE,
                'contactType' => 'customer service',
                'availableLanguage' => ['English', 'Hindi'],
                'areaServed' => array_column(SERVICE_AREAS, 'iso')
            ]
        ],
        'hasCredential' => [
            [
                '@type' => 'EducationalOccupationalCredential',
                'credentialCategory' => 'certification',
                'name' => 'ISO 9001:2015',
                'description' => 'Quality Management System Certification'
            ],
            [
                '@type' => 'EducationalOccupationalCredential',
                'credentialCategory' => 'certification',
                'name' => 'ISO 27001:2022',
                'description' => 'Information Security Management System Certification'
            ]
        ]
    ];

    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

// ─────────────────────────────────────────────────────────────────
// POINT 56: HREFLANG TAGS
// ─────────────────────────────────────────────────────────────────
/**
 * Generate hreflang tags for international targeting
 *
 * @return string Hreflang link tags
 */
function generate_hreflang_tags(): string
{
    $canonical = generate_canonical();
    $path = str_replace(SITE_URL, '', $canonical);

    $tags = '';
    // Default/fallback
    $tags .= '<link rel="alternate" hreflang="x-default" href="' . $canonical . '">' . PHP_EOL;
    // English (default)
    $tags .= '<link rel="alternate" hreflang="en" href="' . $canonical . '">' . PHP_EOL;
    // UK
    $tags .= '<link rel="alternate" hreflang="en-GB" href="' . $canonical . '">' . PHP_EOL;
    // USA
    $tags .= '<link rel="alternate" hreflang="en-US" href="' . $canonical . '">' . PHP_EOL;
    // Australia
    $tags .= '<link rel="alternate" hreflang="en-AU" href="' . $canonical . '">' . PHP_EOL;

    return $tags;
}

// ─────────────────────────────────────────────────────────────────
// NAVIGATION ITEMS (Points 71-73: Keyword-rich, logical hierarchy)
// ─────────────────────────────────────────────────────────────────
$navigation = [
    [
        'name' => 'Home',
        'url' => SITE_URL,
        'slug' => 'home',
        'title' => 'VP Internationals Home - Professional Business Services'
    ],
    [
        'name' => 'About Us',
        'url' => SITE_URL . 'about',
        'slug' => 'about',
        'title' => 'About VP Internationals - Our Story, Mission & Team'
    ],
    [
        'name' => 'Services',
        'url' => SITE_URL . 'services',
        'slug' => 'services',
        'title' => 'Our Professional Services',
        'children' => [
            [
                'name' => 'CV & Resume Formatting',
                'url' => SITE_URL . 'cv-formatting',
                'slug' => 'cv-formatting',
                'title' => 'Professional CV Formatting Services for UK, USA & Australia'
            ],
            [
                'name' => 'Web Design & Development',
                'url' => SITE_URL . 'web-design-development',
                'slug' => 'web-design',
                'title' => 'Custom Web Design & Development Services'
            ],
            [
                'name' => 'SEO Services',
                'url' => SITE_URL . 'seo-services',
                'slug' => 'seo',
                'title' => 'Search Engine Optimization Services'
            ],
            [
                'name' => 'Graphic Design & Branding',
                'url' => SITE_URL . 'graphic-design',
                'slug' => 'graphic-design',
                'title' => 'Professional Graphic Design & Brand Identity Services'
            ],
            [
                'name' => 'Data Entry & Processing',
                'url' => SITE_URL . 'data-entry-processing',
                'slug' => 'data-entry',
                'title' => 'Secure Data Entry & Processing Services'
            ],
            [
                'name' => 'Web Application Development',
                'url' => SITE_URL . 'web-application-development',
                'slug' => 'web-apps',
                'title' => 'Custom Web Application Development'
            ]
        ]
    ],
    [
        'name' => 'Portfolio',
        'url' => SITE_URL . 'portfolio',
        'slug' => 'portfolio',
        'title' => 'Our Work - Portfolio & Case Studies'
    ],
    [
        'name' => 'Blog',
        'url' => SITE_URL . 'blog',
        'slug' => 'blog',
        'title' => 'VP Internationals Blog - Tips, Insights & Industry News'
    ],
    [
        'name' => 'Contact',
        'url' => SITE_URL . 'contact',
        'slug' => 'contact',
        'title' => 'Contact VP Internationals - Get Free Quote'
    ]
];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Point 59: Dynamic robots meta -->
    <meta name="robots" content="<?php echo htmlspecialchars($page_robots); ?>">

    <!-- Primary Meta Tags -->
    <title><?php echo vp_page_title($page_title); ?></title>
    <meta name="title" content="<?php echo vp_page_title($page_title); ?>">
    <meta name="description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">

    <!-- Point 60: Author meta -->
    <meta name="author" content="<?php echo COMPANY_NAME; ?>">

    <!-- Point 61: Publisher meta -->
    <meta name="publisher" content="<?php echo COMPANY_NAME; ?>">

    <!-- Points 57-58: Local SEO geo tags -->
    <meta name="geo.region" content="IN-GJ">
    <meta name="geo.placename" content="<?php echo COMPANY_ADDRESS['city']; ?>">
    <meta name="geo.position" content="<?php echo COMPANY_COORDINATES['latitude']; ?>;<?php echo COMPANY_COORDINATES['longitude']; ?>">
    <meta name="ICBM" content="<?php echo COMPANY_COORDINATES['latitude']; ?>, <?php echo COMPANY_COORDINATES['longitude']; ?>">

    <!-- Canonical URL (Point 70) -->
    <link rel="canonical" href="<?php echo generate_canonical(); ?>">

    <!-- Hreflang Tags (Point 56) -->
    <?php echo generate_hreflang_tags(); ?>

    <!-- Points 54-55: Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo htmlspecialchars($page_type); ?>">
    <meta property="og:url" content="<?php echo generate_canonical(); ?>">
    <meta property="og:title" content="<?php echo vp_page_title($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="<?php echo COMPANY_NAME; ?>">
    <meta property="og:locale" content="en_GB">

    <!-- Point 62: Article publisher -->
    <meta property="article:publisher" content="<?php echo SOCIAL_LINKS['facebook']; ?>">

    <!-- Points 54-55: Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo generate_canonical(); ?>">
    <meta name="twitter:title" content="<?php echo vp_page_title($page_title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_image); ?>">
    <meta name="twitter:site" content="@vpinternationals">
    <meta name="twitter:creator" content="@vpinternationals">

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- PERFORMANCE: Preconnect & DNS Prefetch (Points 41-44) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->

    <!-- Point 41: Preconnect for Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Point 42: Preconnect for Google Fonts static -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Point 43: Preconnect for Google Analytics -->
    <link rel="preconnect" href="https://www.google-analytics.com">

    <!-- Point 44: DNS Prefetch for external resources -->
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google.com">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- PERFORMANCE: Resource Preloading (Points 45-47) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->

    <!-- Point 45: Preload critical fonts -->
    <link rel="preload" href="<?php echo SITE_URL; ?>assets/fonts/inter-var.woff2" as="font" type="font/woff2" crossorigin>

    <!-- Point 46: Preload main CSS -->
    <link rel="preload" href="<?php echo SITE_URL; ?>assets/css/main.css?v=2.0" as="style">

    <!-- Point 47: Preload main JS -->
    <link rel="preload" href="<?php echo SITE_URL; ?>assets/js/main.js?v=2.0" as="script">

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- POINT 50: Critical CSS (Inline for above-fold content) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <style>
        /* Critical CSS - Fonts */
        @font-face {
            font-family: 'Inter';
            font-style: normal;
            font-weight: 100 900;
            font-display: swap;
            src: url('<?php echo SITE_URL; ?>assets/fonts/inter-var.woff2') format('woff2');
        }

        /* Critical CSS - Base */
        :root {
            --color-primary: #83c601;
            --color-primary-dark: #6ba301;
            --color-dark: #0a0e27;
            --color-darker: #060817;
            --color-light: #ffffff;
            --color-gray-100: #f7f7f7;
            --color-gray-200: #e5e5e5;
            --color-gray-300: #d4d4d4;
            --color-gray-400: #a3a3a3;
            --color-gray-500: #737373;
            --color-gray-600: #525252;
            --font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --transition-fast: 150ms ease;
            --transition-base: 300ms ease;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        @media (prefers-reduced-motion: reduce) { html { scroll-behavior: auto; } }

        body {
            font-family: var(--font-family);
            font-size: 16px;
            line-height: 1.6;
            color: var(--color-light);
            background-color: var(--color-dark);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Skip Link (Point 66) */
        .skip-link {
            position: absolute;
            top: -100%;
            left: 50%;
            transform: translateX(-50%);
            background: var(--color-primary);
            color: var(--color-dark);
            padding: 0.75rem 1.5rem;
            border-radius: 0 0 0.5rem 0.5rem;
            font-weight: 600;
            z-index: 10000;
            transition: top var(--transition-fast);
        }
        .skip-link:focus {
            top: 0;
            outline: 2px solid var(--color-light);
            outline-offset: 2px;
        }

        /* Header Base */
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(10, 14, 39, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform var(--transition-base), background var(--transition-base);
        }
        .site-header.is-hidden { transform: translateY(-100%); }
        .site-header.is-scrolled { background: rgba(6, 8, 23, 0.98); }

        .header__container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
        }

        /* Logo */
        .header__logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 0.75rem;
        }
        .header__logo-icon {
            width: 48px;
            height: 48px;
        }
        .header__logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--color-light);
        }
        .header__logo-text span { color: var(--color-primary); }

        /* Navigation */
        .header__nav { display: flex; align-items: center; gap: 2rem; }
        .nav__list {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }
        .nav__item { position: relative; }
        .nav__link {
            display: block;
            padding: 0.5rem 1rem;
            color: var(--color-light);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9375rem;
            border-radius: 0.5rem;
            transition: color var(--transition-fast), background var(--transition-fast);
        }
        .nav__link:hover,
        .nav__link:focus { color: var(--color-primary); background: rgba(131, 198, 1, 0.1); }
        .nav__link[aria-current="page"] { color: var(--color-primary); }

        /* Dropdown */
        .nav__dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 280px;
            background: var(--color-darker);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0.75rem;
            padding: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: opacity var(--transition-fast), transform var(--transition-fast), visibility var(--transition-fast);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .nav__item:hover .nav__dropdown,
        .nav__item:focus-within .nav__dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .nav__dropdown-item {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--color-light);
            text-decoration: none;
            font-size: 0.875rem;
            border-radius: 0.5rem;
            transition: background var(--transition-fast);
        }
        .nav__dropdown-item:hover { background: rgba(131, 198, 1, 0.1); color: var(--color-primary); }

        /* CTA Button */
        .header__cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--color-primary);
            color: var(--color-dark);
            font-weight: 600;
            font-size: 0.9375rem;
            text-decoration: none;
            border-radius: 0.5rem;
            transition: background var(--transition-fast), transform var(--transition-fast);
        }
        .header__cta:hover { background: var(--color-primary-dark); transform: translateY(-2px); }
        .header__cta:focus { outline: 2px solid var(--color-primary); outline-offset: 2px; }

        /* Mobile Menu Toggle (Point 63-64) */
        .header__toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            color: var(--color-light);
        }
        .header__toggle-icon { width: 24px; height: 24px; }

        @media (max-width: 1024px) {
            .header__nav { display: none; }
            .header__toggle { display: block; }
        }

        /* Focus visible for keyboard navigation (Point 63) */
        :focus-visible {
            outline: 2px solid var(--color-primary);
            outline-offset: 2px;
        }
    </style>

    <!-- Main Stylesheet (Point 48: Remove duplicate font loading) -->
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/main.css?v=2.0">

    <!-- Point 68: Page-specific CSS -->
    <?php foreach ($page_css as $css): ?>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>assets/css/pages/<?php echo htmlspecialchars($css); ?>.css?v=2.0">
    <?php endforeach; ?>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo SITE_URL; ?>assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo SITE_URL; ?>assets/images/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo SITE_URL; ?>assets/images/apple-touch-icon.png">
    <link rel="manifest" href="<?php echo SITE_URL; ?>site.webmanifest">
    <meta name="theme-color" content="#0a0e27">

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- STRUCTURED DATA (Points 52-53) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->

    <!-- Organization Schema (Point 52) -->
    <?php echo generate_organization_schema(); ?>

    <!-- Breadcrumb Schema (Point 53) -->
    <?php echo generate_breadcrumb_schema($breadcrumbs); ?>

    <!-- ═══════════════════════════════════════════════════════════════ -->
    <!-- ANALYTICS (Point 49: Defer Google Analytics) -->
    <!-- ═══════════════════════════════════════════════════════════════ -->
    <?php if (!empty(GA_TRACKING_ID) && EnvLoader::isProduction()): ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GA_TRACKING_ID; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '<?php echo GA_TRACKING_ID; ?>', {
            'anonymize_ip': true,
            'cookie_flags': 'SameSite=None;Secure'
        });
    </script>
    <?php endif; ?>

    <!-- Page-specific head scripts -->
    <?php foreach ($page_js_head as $js): ?>
    <script src="<?php echo htmlspecialchars($js); ?>" defer></script>
    <?php endforeach; ?>
</head>
<body class="page-<?php echo htmlspecialchars($current_page ?: 'default'); ?>">
    <!-- Point 66: Skip to content link -->
    <a href="#main-content" class="skip-link">Skip to main content</a>

    <!-- Point 67: Header with role="banner" -->
    <header class="site-header" role="banner">
        <div class="header__container">
            <!-- Logo (Point 51: External SVG for caching) -->
            <a href="<?php echo SITE_URL; ?>" class="header__logo" aria-label="<?php echo COMPANY_NAME; ?> - Home">
                <svg class="header__logo-icon" viewBox="0 0 48 48" aria-hidden="true">
                    <circle cx="24" cy="24" r="22" fill="#83c601"/>
                    <text x="24" y="30" text-anchor="middle" fill="#0a0e27" font-size="20" font-weight="bold">VP</text>
                </svg>
                <span class="header__logo-text">VP <span>Internationals</span></span>
            </a>

            <!-- Point 65: Navigation with aria-label -->
            <nav class="header__nav" aria-label="Main navigation">
                <ul class="nav__list" role="menubar">
                    <?php foreach ($navigation as $item): ?>
                    <li class="nav__item" role="none">
                        <?php if (isset($item['children'])): ?>
                        <!-- Point 72: Title attributes with expanded descriptions -->
                        <a href="<?php echo $item['url']; ?>"
                           class="nav__link nav__link--has-dropdown"
                           role="menuitem"
                           aria-haspopup="true"
                           aria-expanded="false"
                           title="<?php echo htmlspecialchars($item['title']); ?>"
                           <?php if ($current_page === $item['slug']): ?>aria-current="page"<?php endif; ?>>
                            <?php echo htmlspecialchars($item['name']); ?>
                            <svg class="nav__arrow" width="12" height="12" viewBox="0 0 12 12" aria-hidden="true">
                                <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" fill="none"/>
                            </svg>
                        </a>
                        <ul class="nav__dropdown" role="menu" aria-label="<?php echo htmlspecialchars($item['name']); ?> submenu">
                            <?php foreach ($item['children'] as $child): ?>
                            <li role="none">
                                <a href="<?php echo $child['url']; ?>"
                                   class="nav__dropdown-item"
                                   role="menuitem"
                                   title="<?php echo htmlspecialchars($child['title']); ?>"
                                   <?php if ($current_page === $child['slug']): ?>aria-current="page"<?php endif; ?>>
                                    <?php echo htmlspecialchars($child['name']); ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <a href="<?php echo $item['url']; ?>"
                           class="nav__link"
                           role="menuitem"
                           title="<?php echo htmlspecialchars($item['title']); ?>"
                           <?php if ($current_page === $item['slug']): ?>aria-current="page"<?php endif; ?>>
                            <?php echo htmlspecialchars($item['name']); ?>
                        </a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Header CTA -->
                <a href="<?php echo PRIMARY_CTA_URL; ?>" class="header__cta">
                    <?php echo PRIMARY_CTA_TEXT; ?>
                    <svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true">
                        <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    </svg>
                </a>
            </nav>

            <!-- Mobile Menu Toggle (Points 63-64: ARIA attributes) -->
            <button class="header__toggle"
                    type="button"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    aria-label="Open navigation menu">
                <svg class="header__toggle-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation (Hidden by default) -->
        <nav id="mobile-menu" class="mobile-nav" aria-label="Mobile navigation" hidden>
            <ul class="mobile-nav__list">
                <?php foreach ($navigation as $item): ?>
                <li class="mobile-nav__item">
                    <a href="<?php echo $item['url']; ?>" class="mobile-nav__link">
                        <?php echo htmlspecialchars($item['name']); ?>
                    </a>
                    <?php if (isset($item['children'])): ?>
                    <ul class="mobile-nav__submenu">
                        <?php foreach ($item['children'] as $child): ?>
                        <li>
                            <a href="<?php echo $child['url']; ?>" class="mobile-nav__submenu-link">
                                <?php echo htmlspecialchars($child['name']); ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <a href="<?php echo PRIMARY_CTA_URL; ?>" class="mobile-nav__cta">
                <?php echo PRIMARY_CTA_TEXT; ?>
            </a>
        </nav>
    </header>

    <!-- Main Content Container -->
    <main id="main-content" role="main">
