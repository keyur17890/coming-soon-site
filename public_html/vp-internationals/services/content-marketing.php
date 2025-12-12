<?php
/**
 * VP INTERNATIONALS - CONTENT MARKETING SERVICE PAGE
 * Points 981-1040
 */
declare(strict_types=1);
require_once dirname(__DIR__) . '/config.php';

$page_config = [
    'title' => 'Content Marketing Services | B2B Content Strategy | VP Internationals',
    'meta_description' => 'Strategic B2B content marketing services. Blog writing, whitepapers, case studies, and content strategy that educates, engages, and converts your target audience.',
    'meta_keywords' => 'content marketing, B2B content, blog writing, whitepaper writing, case studies, content strategy, thought leadership, content creation',
    'canonical_url' => SITE_URL . '/services/content-marketing',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/content-marketing-og.jpg',
    'body_class' => 'page-service page-content-marketing',
    'current_page' => 'services'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services'],
    ['name' => 'Content Marketing', 'url' => SITE_URL . '/services/content-marketing']
];

$service = [
    'name' => 'Content Marketing',
    'tagline' => 'Content That Converts',
    'description' => 'We create compelling content that positions your brand as a thought leader and guides prospects through the sales funnel. From blog posts to whitepapers, we deliver strategic content that drives organic traffic, nurtures leads, and supports your sales team.',
    'hero_stats' => [
        ['number' => '1000+', 'label' => 'Articles Written'],
        ['number' => '3x', 'label' => 'Lead Increase'],
        ['number' => '200%', 'label' => 'Organic Growth'],
        ['number' => '50+', 'label' => 'Industries']
    ]
];

$features = [
    ['title' => 'Content Strategy', 'description' => 'Data-driven content planning aligned with buyer journeys. Keyword research, competitive analysis, and editorial calendars.', 'icon' => 'clipboard'],
    ['title' => 'Blog Writing', 'description' => 'SEO-optimized blog posts that drive organic traffic and establish thought leadership in your industry.', 'icon' => 'edit'],
    ['title' => 'Whitepapers & Ebooks', 'description' => 'In-depth, gated content assets that generate leads and demonstrate expertise on complex topics.', 'icon' => 'file-text'],
    ['title' => 'Case Studies', 'description' => 'Compelling customer success stories that showcase results and build credibility with prospects.', 'icon' => 'award'],
    ['title' => 'Infographics', 'description' => 'Visual content that simplifies complex data and earns shares, links, and engagement.', 'icon' => 'bar-chart'],
    ['title' => 'Video Scripts', 'description' => 'Scripts for explainer videos, webinars, and video marketing campaigns that engage and convert.', 'icon' => 'video']
];

$content_types = ['Blog Posts', 'Whitepapers', 'Ebooks', 'Case Studies', 'Infographics', 'Landing Pages', 'Email Sequences', 'Social Content', 'Video Scripts', 'Webinar Content', 'Press Releases', 'Sales Collateral'];

$pricing_plans = [
    ['name' => 'Starter', 'description' => 'For consistent content needs', 'price' => '$2,000', 'unit' => '/month', 'features' => ['4 blog posts/month', 'SEO optimization', 'Editorial calendar', 'Basic graphics', 'Monthly reporting', 'Email support'], 'popular' => false, 'cta' => 'Get Started'],
    ['name' => 'Growth', 'description' => 'Full-service content marketing', 'price' => '$4,500', 'unit' => '/month', 'features' => ['8 blog posts/month', '1 whitepaper/quarter', '2 case studies/quarter', 'Content strategy', 'Dedicated writer', 'Bi-weekly calls', 'Social promotion', 'Performance tracking'], 'popular' => true, 'cta' => 'Most Popular'],
    ['name' => 'Enterprise', 'description' => 'Comprehensive content engine', 'price' => 'Custom', 'unit' => 'pricing', 'features' => ['Unlimited content', 'Full content team', 'Multi-format content', 'Video production', 'Thought leadership', 'Industry research', 'Executive ghostwriting', 'Content distribution'], 'popular' => false, 'cta' => 'Contact Sales']
];

$faqs = [
    ['question' => 'What industries do you write for?', 'answer' => 'We have experience across 50+ B2B industries including technology, SaaS, healthcare, finance, manufacturing, and professional services. Our writers research extensively to deliver accurate, authoritative content.'],
    ['question' => 'How do you ensure content quality?', 'answer' => 'Every piece goes through our quality process: writer assignment based on expertise, editorial review, SEO optimization, plagiarism check, and client approval before publishing.'],
    ['question' => 'Do you handle content distribution?', 'answer' => 'Yes, our Growth and Enterprise plans include content promotion through social media, email newsletters, and outreach. We help ensure your content reaches your target audience.'],
    ['question' => 'Can you match our brand voice?', 'answer' => 'Absolutely. We start with a brand voice workshop to understand your tone, style, and messaging. We create style guides and work closely with your team to ensure consistency.'],
    ['question' => 'Who owns the content?', 'answer' => 'You own all content we create. Once delivered and paid for, you have full rights to use, modify, and republish the content as you see fit.']
];

require_once dirname(__DIR__) . '/includes/header.php';
?>

<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Service","name":"Content Marketing Services","description":"<?php echo htmlspecialchars($page_config['meta_description']); ?>","url":"<?php echo SITE_URL; ?>/services/content-marketing","provider":{"@type":"Organization","name":"<?php echo SITE_NAME; ?>","url":"<?php echo SITE_URL; ?>"},"serviceType":"Content Marketing","areaServed":"Worldwide"}
</script>

<main id="main-content" class="service-page content-marketing-page" role="main">
    <section class="service-hero section" aria-labelledby="service-hero-title">
        <div class="container">
            <div class="service-hero__content">
                <nav class="service-hero__breadcrumb"><a href="<?php echo SITE_URL; ?>/services">← Back to Services</a></nav>
                <span class="service-hero__badge badge badge--primary">Content Marketing</span>
                <h1 id="service-hero-title" class="service-hero__title">Content That <span class="text-gradient">Drives Results</span></h1>
                <p class="service-hero__description"><?php echo htmlspecialchars($service['description']); ?></p>
                <div class="service-hero__cta">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Get Content Strategy</a>
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
                <h2 id="features-title" class="section-header__title">Content Services</h2>
                <p class="section-header__subtitle">Strategic content for every stage of the buyer journey</p>
            </header>
            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                <article class="feature-card">
                    <div class="feature-card__icon"><svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></div>
                    <h3 class="feature-card__title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    <p class="feature-card__description"><?php echo htmlspecialchars($feature['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="content-types section section--gray" aria-labelledby="types-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="types-title" class="section-header__title">Content Types We Create</h2>
            </header>
            <div class="content-types-grid">
                <?php foreach ($content_types as $type): ?>
                <span class="content-type-tag"><?php echo htmlspecialchars($type); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="pricing section section--dark" id="pricing" aria-labelledby="pricing-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <h2 id="pricing-title" class="section-header__title">Content Marketing Pricing</h2>
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
                    <button class="faq-item__question" aria-expanded="false" aria-controls="content-faq-<?php echo $index; ?>"><span><?php echo htmlspecialchars($faq['question']); ?></span><svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    <div class="faq-item__answer" id="content-faq-<?php echo $index; ?>" hidden><p><?php echo htmlspecialchars($faq['answer']); ?></p></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta section"><div class="container"><div class="cta__content"><h2 class="cta__title">Ready to Build Your Content Engine?</h2><p class="cta__description">Let's create a content strategy that drives traffic, generates leads, and builds your brand.</p><a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Get Content Strategy</a></div></div></section>
</main>

<style>
.service-hero{background:linear-gradient(135deg,var(--color-dark) 0%,var(--color-dark-lighter) 100%);color:var(--color-white);padding:var(--space-12) 0 var(--space-16)}.service-hero__breadcrumb{margin-bottom:var(--space-6)}.service-hero__breadcrumb a{color:var(--color-gray-400);text-decoration:none;font-size:var(--font-size-sm)}.service-hero__breadcrumb a:hover{color:var(--color-primary)}.service-hero__badge{margin-bottom:var(--space-4)}.service-hero__title{font-size:clamp(2rem,5vw,3.5rem);font-weight:var(--font-weight-bold);line-height:1.1;margin-bottom:var(--space-6);max-width:800px}.service-hero__description{font-size:var(--font-size-lg);color:var(--color-gray-300);line-height:1.7;margin-bottom:var(--space-8);max-width:700px}.service-hero__cta{display:flex;flex-wrap:wrap;gap:var(--space-4);margin-bottom:var(--space-10)}.service-hero__stats{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-4);max-width:600px}@media(min-width:640px){.service-hero__stats{grid-template-columns:repeat(4,1fr)}}.hero-stat{text-align:center;padding:var(--space-4);background:rgba(255,255,255,.05);border-radius:var(--radius-lg)}.hero-stat__number{display:block;font-size:var(--font-size-2xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.hero-stat__label{font-size:var(--font-size-xs);color:var(--color-gray-400)}.features-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}@media(min-width:640px){.features-grid{grid-template-columns:repeat(2,1fr)}}@media(min-width:1024px){.features-grid{grid-template-columns:repeat(3,1fr)}}.feature-card{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);padding:var(--space-6);transition:all var(--transition-normal)}.feature-card:hover{border-color:var(--color-primary);box-shadow:var(--shadow-md)}.feature-card__icon{display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;background:var(--color-primary-light);border-radius:var(--radius-lg);color:var(--color-primary);margin-bottom:var(--space-4)}.feature-card__title{font-size:var(--font-size-lg);font-weight:var(--font-weight-semibold);color:var(--color-dark);margin-bottom:var(--space-2)}.feature-card__description{font-size:var(--font-size-sm);color:var(--color-gray-600);line-height:1.6}.content-types-grid{display:flex;flex-wrap:wrap;justify-content:center;gap:var(--space-3)}.content-type-tag{background:var(--color-white);color:var(--color-gray-700);font-size:var(--font-size-sm);font-weight:var(--font-weight-medium);padding:var(--space-2) var(--space-4);border-radius:var(--radius-full);box-shadow:var(--shadow-sm)}.pricing-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6);max-width:1000px;margin:0 auto}@media(min-width:768px){.pricing-grid{grid-template-columns:repeat(3,1fr)}}.pricing-card{position:relative;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius-xl);padding:var(--space-6);display:flex;flex-direction:column}.pricing-card--popular{background:var(--color-white);border-color:var(--color-primary);transform:scale(1.05);z-index:1}.pricing-card--popular .pricing-card__name,.pricing-card--popular .pricing-card__description,.pricing-card--popular .pricing-card__features li{color:var(--color-dark)}.pricing-card--popular .pricing-card__price .price{color:var(--color-primary)}.pricing-card__badge{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:var(--color-white);font-size:var(--font-size-xs);font-weight:var(--font-weight-semibold);padding:var(--space-1) var(--space-3);border-radius:var(--radius-full)}.pricing-card__name{font-size:var(--font-size-xl);font-weight:var(--font-weight-bold);color:var(--color-white);margin-bottom:var(--space-1)}.pricing-card__description{font-size:var(--font-size-sm);color:var(--color-gray-400);margin-bottom:var(--space-4)}.pricing-card__price{margin-bottom:var(--space-6)}.pricing-card__price .price{font-size:var(--font-size-3xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.pricing-card__price .unit{font-size:var(--font-size-sm);color:var(--color-gray-400)}.pricing-card__features{list-style:none;padding:0;margin:0 0 var(--space-6);flex-grow:1}.pricing-card__features li{display:flex;align-items:flex-start;gap:var(--space-2);font-size:var(--font-size-sm);color:var(--color-gray-300);padding:var(--space-2) 0}.pricing-card__features svg{flex-shrink:0;color:var(--color-primary);margin-top:2px}.faq-list{max-width:800px;margin:0 auto}.faq-item{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);margin-bottom:var(--space-4);overflow:hidden}.faq-item__question{width:100%;display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);font-size:var(--font-size-base);font-weight:var(--font-weight-medium);text-align:left;color:var(--color-dark);background:transparent;border:none;cursor:pointer}.faq-item__icon{flex-shrink:0;transition:transform var(--transition-normal)}.faq-item__question[aria-expanded="true"] .faq-item__icon{transform:rotate(180deg)}.faq-item__answer{padding:0 var(--space-6) var(--space-5)}.faq-item__answer[hidden]{display:none}.faq-item__answer p{color:var(--color-gray-600);line-height:1.7;margin:0}.cta{background:linear-gradient(135deg,var(--color-primary) 0%,var(--color-primary-dark) 100%);color:var(--color-white);text-align:center}.cta__title{font-size:clamp(1.75rem,4vw,2.5rem);font-weight:var(--font-weight-bold);margin-bottom:var(--space-4)}.cta__description{font-size:var(--font-size-lg);opacity:.9;max-width:600px;margin:0 auto var(--space-8)}.cta .btn--primary{background:var(--color-white);color:var(--color-primary)}.cta .btn--primary:hover{background:var(--color-gray-100)}
</style>
<script>(function(){'use strict';document.querySelectorAll('.faq-item__question').forEach(function(q){q.addEventListener('click',function(){var expanded=this.getAttribute('aria-expanded')==='true';var answer=document.getElementById(this.getAttribute('aria-controls'));document.querySelectorAll('.faq-item__question').forEach(function(btn){btn.setAttribute('aria-expanded','false');var a=document.getElementById(btn.getAttribute('aria-controls'));if(a)a.hidden=true});if(!expanded){this.setAttribute('aria-expanded','true');if(answer)answer.hidden=false}})})})();</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
