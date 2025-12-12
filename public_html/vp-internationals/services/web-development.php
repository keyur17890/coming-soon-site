<?php
/**
 * VP INTERNATIONALS - WEB DEVELOPMENT SERVICE PAGE
 * Points 861-920
 */
declare(strict_types=1);
require_once dirname(__DIR__) . '/config.php';

$page_config = [
    'title' => 'Web Development & Design Services | High-Converting Websites | VP Internationals',
    'meta_description' => 'Custom web development and design services. We build fast, responsive, SEO-optimized websites that convert visitors into leads. Modern tech stack, mobile-first design.',
    'meta_keywords' => 'web development, website design, landing pages, custom websites, responsive design, WordPress development, e-commerce, web application development',
    'canonical_url' => SITE_URL . '/services/web-development',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/web-development-og.jpg',
    'body_class' => 'page-service page-web-development',
    'current_page' => 'services'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services'],
    ['name' => 'Web Development', 'url' => SITE_URL . '/services/web-development']
];

$service = [
    'name' => 'Web Development & Design',
    'tagline' => 'Websites That Convert',
    'description' => 'We build high-converting websites and landing pages that combine stunning design with technical excellence. Our development process focuses on user experience, speed, SEO, and conversion optimization to maximize your digital presence.',
    'hero_stats' => [
        ['number' => '200+', 'label' => 'Websites Built'],
        ['number' => '95+', 'label' => 'PageSpeed Score'],
        ['number' => '3x', 'label' => 'Conversion Increase'],
        ['number' => '100%', 'label' => 'Responsive']
    ]
];

$features = [
    ['title' => 'Custom Website Design', 'description' => 'Unique, branded designs tailored to your business. No templates—every website is custom-crafted for maximum impact and conversion.', 'icon' => 'layout'],
    ['title' => 'Landing Page Development', 'description' => 'High-converting landing pages for campaigns, product launches, and lead generation. A/B test ready with tracking integration.', 'icon' => 'target'],
    ['title' => 'E-Commerce Solutions', 'description' => 'Shopify, WooCommerce, and custom e-commerce builds. Secure, scalable online stores that drive sales.', 'icon' => 'shopping-cart'],
    ['title' => 'CMS Implementation', 'description' => 'WordPress, HubSpot CMS, and headless CMS solutions. Easy-to-manage websites that grow with your business.', 'icon' => 'edit'],
    ['title' => 'Mobile-First Responsive', 'description' => 'Every site is built mobile-first and tested across devices. Perfect experience on desktop, tablet, and mobile.', 'icon' => 'smartphone'],
    ['title' => 'Performance Optimization', 'description' => 'Lightning-fast load times with Core Web Vitals optimization. 95+ PageSpeed scores that improve SEO and user experience.', 'icon' => 'zap']
];

$tech_stack = ['HTML5/CSS3', 'JavaScript (ES6+)', 'React', 'Next.js', 'WordPress', 'PHP 8', 'Node.js', 'Shopify', 'WooCommerce', 'HubSpot CMS', 'Tailwind CSS', 'GSAP'];

$pricing_plans = [
    ['name' => 'Landing Page', 'description' => 'Single high-converting page', 'price' => '$1,500', 'unit' => 'one-time', 'features' => ['1 custom designed page', 'Mobile responsive', 'Form integration', 'Basic SEO setup', 'Analytics tracking', '2 rounds of revisions'], 'popular' => false, 'cta' => 'Get Started'],
    ['name' => 'Business Website', 'description' => 'Complete business website', 'price' => '$5,000', 'unit' => 'starting', 'features' => ['5-10 custom pages', 'CMS integration', 'Blog setup', 'Contact forms', 'SEO optimization', 'Speed optimization', 'SSL certificate', '30-day support'], 'popular' => true, 'cta' => 'Most Popular'],
    ['name' => 'Enterprise', 'description' => 'Complex web applications', 'price' => 'Custom', 'unit' => 'quote', 'features' => ['Unlimited pages', 'Custom functionality', 'E-commerce/portals', 'API integrations', 'Advanced security', 'Ongoing maintenance', 'Dedicated team', 'Priority support'], 'popular' => false, 'cta' => 'Contact Sales']
];

$faqs = [
    ['question' => 'How long does a typical website project take?', 'answer' => 'Landing pages take 1-2 weeks, business websites 4-6 weeks, and complex projects 8-12 weeks. We provide detailed timelines during our discovery phase based on your specific requirements.'],
    ['question' => 'Do you provide website hosting?', 'answer' => 'We can recommend and help set up hosting on platforms like WP Engine, Cloudways, or Vercel depending on your tech stack. We also offer managed hosting as an add-on service.'],
    ['question' => 'Will I be able to update the website myself?', 'answer' => 'Absolutely! We build on user-friendly CMS platforms and provide training documentation. You\'ll be able to update content, add blog posts, and manage basic changes independently.'],
    ['question' => 'Do you offer ongoing maintenance?', 'answer' => 'Yes, we offer monthly maintenance packages including security updates, backups, performance monitoring, and content updates. Plans start at $200/month.'],
    ['question' => 'Is SEO included in website development?', 'answer' => 'All our websites include technical SEO foundations—proper structure, meta tags, schema markup, XML sitemaps, and speed optimization. For ongoing SEO services, see our SEO packages.']
];

require_once dirname(__DIR__) . '/includes/header.php';
?>

<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Service","name":"Web Development & Design Services","description":"<?php echo htmlspecialchars($page_config['meta_description']); ?>","url":"<?php echo SITE_URL; ?>/services/web-development","provider":{"@type":"Organization","name":"<?php echo SITE_NAME; ?>","url":"<?php echo SITE_URL; ?>"},"serviceType":"Web Development","areaServed":"Worldwide"}
</script>

<main id="main-content" class="service-page web-development-page" role="main">
    <section class="service-hero section" aria-labelledby="service-hero-title">
        <div class="container">
            <div class="service-hero__content">
                <nav class="service-hero__breadcrumb"><a href="<?php echo SITE_URL; ?>/services">← Back to Services</a></nav>
                <span class="service-hero__badge badge badge--primary">Web Development</span>
                <h1 id="service-hero-title" class="service-hero__title">Websites That <span class="text-gradient">Drive Results</span></h1>
                <p class="service-hero__description"><?php echo htmlspecialchars($service['description']); ?></p>
                <div class="service-hero__cta">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Start Your Project</a>
                    <a href="#pricing" class="btn btn--outline btn--lg">View Pricing</a>
                </div>
            </div>
            <div class="service-hero__stats">
                <?php foreach ($service['hero_stats'] as $stat): ?>
                <div class="hero-stat"><span class="hero-stat__number"><?php echo htmlspecialchars($stat['number']); ?></span><span class="hero-stat__label"><?php echo htmlspecialchars($stat['label']); ?></span></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="service-features section" aria-labelledby="features-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="features-title" class="section-header__title">Web Development Services</h2>
                <p class="section-header__subtitle">From landing pages to complex web applications</p>
            </header>
            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                <article class="feature-card">
                    <div class="feature-card__icon"><svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg></div>
                    <h3 class="feature-card__title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    <p class="feature-card__description"><?php echo htmlspecialchars($feature['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="tech-stack section section--gray" aria-labelledby="tech-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="tech-title" class="section-header__title">Technologies We Use</h2>
            </header>
            <div class="tech-grid">
                <?php foreach ($tech_stack as $tech): ?>
                <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="pricing section section--dark" id="pricing" aria-labelledby="pricing-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <h2 id="pricing-title" class="section-header__title">Web Development Pricing</h2>
            </header>
            <div class="pricing-grid">
                <?php foreach ($pricing_plans as $plan): ?>
                <article class="pricing-card <?php echo $plan['popular'] ? 'pricing-card--popular' : ''; ?>">
                    <?php if ($plan['popular']): ?><span class="pricing-card__badge">Most Popular</span><?php endif; ?>
                    <h3 class="pricing-card__name"><?php echo htmlspecialchars($plan['name']); ?></h3>
                    <p class="pricing-card__description"><?php echo htmlspecialchars($plan['description']); ?></p>
                    <div class="pricing-card__price"><span class="price"><?php echo htmlspecialchars($plan['price']); ?></span><span class="unit"><?php echo htmlspecialchars($plan['unit']); ?></span></div>
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

    <section class="service-faq section" aria-labelledby="faq-title">
        <div class="container">
            <header class="section-header section-header--center"><h2 id="faq-title" class="section-header__title">Frequently Asked Questions</h2></header>
            <div class="faq-list">
                <?php foreach ($faqs as $index => $faq): ?>
                <article class="faq-item">
                    <button class="faq-item__question" aria-expanded="false" aria-controls="web-faq-<?php echo $index; ?>"><span><?php echo htmlspecialchars($faq['question']); ?></span><svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    <div class="faq-item__answer" id="web-faq-<?php echo $index; ?>" hidden><p><?php echo htmlspecialchars($faq['answer']); ?></p></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta section"><div class="container"><div class="cta__content"><h2 class="cta__title">Ready to Build Your Website?</h2><p class="cta__description">Let's discuss your project and create a website that drives real business results.</p><a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Start Your Project</a></div></div></section>
</main>

<style>
.service-hero{background:linear-gradient(135deg,var(--color-dark) 0%,var(--color-dark-lighter) 100%);color:var(--color-white);padding:var(--space-12) 0 var(--space-16)}.service-hero__breadcrumb{margin-bottom:var(--space-6)}.service-hero__breadcrumb a{color:var(--color-gray-400);text-decoration:none;font-size:var(--font-size-sm)}.service-hero__breadcrumb a:hover{color:var(--color-primary)}.service-hero__badge{margin-bottom:var(--space-4)}.service-hero__title{font-size:clamp(2rem,5vw,3.5rem);font-weight:var(--font-weight-bold);line-height:1.1;margin-bottom:var(--space-6);max-width:800px}.service-hero__description{font-size:var(--font-size-lg);color:var(--color-gray-300);line-height:1.7;margin-bottom:var(--space-8);max-width:700px}.service-hero__cta{display:flex;flex-wrap:wrap;gap:var(--space-4);margin-bottom:var(--space-10)}.service-hero__stats{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-4);max-width:600px}@media(min-width:640px){.service-hero__stats{grid-template-columns:repeat(4,1fr)}}.hero-stat{text-align:center;padding:var(--space-4);background:rgba(255,255,255,.05);border-radius:var(--radius-lg)}.hero-stat__number{display:block;font-size:var(--font-size-2xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.hero-stat__label{font-size:var(--font-size-xs);color:var(--color-gray-400)}.features-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}@media(min-width:640px){.features-grid{grid-template-columns:repeat(2,1fr)}}@media(min-width:1024px){.features-grid{grid-template-columns:repeat(3,1fr)}}.feature-card{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);padding:var(--space-6);transition:all var(--transition-normal)}.feature-card:hover{border-color:var(--color-primary);box-shadow:var(--shadow-md)}.feature-card__icon{display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;background:var(--color-primary-light);border-radius:var(--radius-lg);color:var(--color-primary);margin-bottom:var(--space-4)}.feature-card__title{font-size:var(--font-size-lg);font-weight:var(--font-weight-semibold);color:var(--color-dark);margin-bottom:var(--space-2)}.feature-card__description{font-size:var(--font-size-sm);color:var(--color-gray-600);line-height:1.6}.tech-grid{display:flex;flex-wrap:wrap;justify-content:center;gap:var(--space-3)}.tech-tag{background:var(--color-white);color:var(--color-gray-700);font-size:var(--font-size-sm);font-weight:var(--font-weight-medium);padding:var(--space-2) var(--space-4);border-radius:var(--radius-full);box-shadow:var(--shadow-sm)}.pricing-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6);max-width:1000px;margin:0 auto}@media(min-width:768px){.pricing-grid{grid-template-columns:repeat(3,1fr)}}.pricing-card{position:relative;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius-xl);padding:var(--space-6);display:flex;flex-direction:column}.pricing-card--popular{background:var(--color-white);border-color:var(--color-primary);transform:scale(1.05);z-index:1}.pricing-card--popular .pricing-card__name,.pricing-card--popular .pricing-card__description,.pricing-card--popular .pricing-card__features li{color:var(--color-dark)}.pricing-card--popular .pricing-card__price .price{color:var(--color-primary)}.pricing-card__badge{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:var(--color-white);font-size:var(--font-size-xs);font-weight:var(--font-weight-semibold);padding:var(--space-1) var(--space-3);border-radius:var(--radius-full)}.pricing-card__name{font-size:var(--font-size-xl);font-weight:var(--font-weight-bold);color:var(--color-white);margin-bottom:var(--space-1)}.pricing-card__description{font-size:var(--font-size-sm);color:var(--color-gray-400);margin-bottom:var(--space-4)}.pricing-card__price{margin-bottom:var(--space-6)}.pricing-card__price .price{font-size:var(--font-size-3xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.pricing-card__price .unit{font-size:var(--font-size-sm);color:var(--color-gray-400)}.pricing-card__features{list-style:none;padding:0;margin:0 0 var(--space-6);flex-grow:1}.pricing-card__features li{display:flex;align-items:flex-start;gap:var(--space-2);font-size:var(--font-size-sm);color:var(--color-gray-300);padding:var(--space-2) 0}.pricing-card__features svg{flex-shrink:0;color:var(--color-primary);margin-top:2px}.faq-list{max-width:800px;margin:0 auto}.faq-item{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);margin-bottom:var(--space-4);overflow:hidden}.faq-item__question{width:100%;display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);font-size:var(--font-size-base);font-weight:var(--font-weight-medium);text-align:left;color:var(--color-dark);background:transparent;border:none;cursor:pointer}.faq-item__icon{flex-shrink:0;transition:transform var(--transition-normal)}.faq-item__question[aria-expanded="true"] .faq-item__icon{transform:rotate(180deg)}.faq-item__answer{padding:0 var(--space-6) var(--space-5)}.faq-item__answer[hidden]{display:none}.faq-item__answer p{color:var(--color-gray-600);line-height:1.7;margin:0}.cta{background:linear-gradient(135deg,var(--color-primary) 0%,var(--color-primary-dark) 100%);color:var(--color-white);text-align:center}.cta__title{font-size:clamp(1.75rem,4vw,2.5rem);font-weight:var(--font-weight-bold);margin-bottom:var(--space-4)}.cta__description{font-size:var(--font-size-lg);opacity:.9;max-width:600px;margin:0 auto var(--space-8)}.cta .btn--primary{background:var(--color-white);color:var(--color-primary)}.cta .btn--primary:hover{background:var(--color-gray-100)}
</style>
<script>(function(){'use strict';document.querySelectorAll('.faq-item__question').forEach(function(q){q.addEventListener('click',function(){var expanded=this.getAttribute('aria-expanded')==='true';var answer=document.getElementById(this.getAttribute('aria-controls'));document.querySelectorAll('.faq-item__question').forEach(function(btn){btn.setAttribute('aria-expanded','false');var a=document.getElementById(btn.getAttribute('aria-controls'));if(a)a.hidden=true});if(!expanded){this.setAttribute('aria-expanded','true');if(answer)answer.hidden=false}})})})();</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
