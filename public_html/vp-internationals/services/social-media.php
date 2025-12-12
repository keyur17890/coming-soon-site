<?php
/**
 * VP INTERNATIONALS - SOCIAL MEDIA MARKETING SERVICE PAGE
 * Points 1101-1155
 */
declare(strict_types=1);
require_once dirname(__DIR__) . '/config.php';

$page_config = [
    'title' => 'Social Media Marketing Services | B2B Social Strategy | VP Internationals',
    'meta_description' => 'B2B social media marketing services. Build your brand, engage your audience, and generate leads on LinkedIn, Twitter, Facebook, and more. Strategy, content, and advertising.',
    'meta_keywords' => 'social media marketing, B2B social media, LinkedIn marketing, social media strategy, social media management, social ads, content creation, community management',
    'canonical_url' => SITE_URL . '/services/social-media',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/social-media-og.jpg',
    'body_class' => 'page-service page-social-media',
    'current_page' => 'services'
];

$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Services', 'url' => SITE_URL . '/services'],
    ['name' => 'Social Media', 'url' => SITE_URL . '/services/social-media']
];

$service = [
    'name' => 'Social Media Marketing',
    'tagline' => 'Build Your Social Presence',
    'description' => 'We help B2B companies leverage social media to build brand awareness, engage with their audience, and generate qualified leads. Our approach combines strategic organic content with targeted paid campaigns for maximum impact.',
    'hero_stats' => [
        ['number' => '250%', 'label' => 'Engagement Increase'],
        ['number' => '100K+', 'label' => 'Followers Grown'],
        ['number' => '45%', 'label' => 'Lead Cost Reduction'],
        ['number' => '500+', 'label' => 'Campaigns Run']
    ]
];

$features = [
    ['title' => 'Social Strategy', 'description' => 'Data-driven social media strategy aligned with your business goals, target audience, and industry best practices.', 'icon' => 'clipboard'],
    ['title' => 'Content Creation', 'description' => 'Engaging posts, graphics, videos, and stories designed to resonate with your B2B audience and drive engagement.', 'icon' => 'edit'],
    ['title' => 'Community Management', 'description' => 'Active monitoring, response management, and engagement to build relationships and brand loyalty.', 'icon' => 'users'],
    ['title' => 'Paid Social Advertising', 'description' => 'Targeted ad campaigns on LinkedIn, Facebook, Instagram, and Twitter to reach decision-makers and generate leads.', 'icon' => 'target'],
    ['title' => 'Influencer Outreach', 'description' => 'Identify and collaborate with industry influencers to amplify your reach and build credibility.', 'icon' => 'share'],
    ['title' => 'Analytics & Reporting', 'description' => 'Comprehensive tracking of engagement, reach, conversions, and ROI with actionable monthly reports.', 'icon' => 'bar-chart']
];

$platforms = ['LinkedIn', 'Twitter/X', 'Facebook', 'Instagram', 'YouTube', 'TikTok'];

$pricing_plans = [
    ['name' => 'Starter', 'description' => 'For getting started on social', 'price' => '$1,000', 'unit' => '/month', 'features' => ['2 social platforms', '12 posts/month', 'Basic graphics', 'Community monitoring', 'Monthly reporting', 'Email support'], 'popular' => false, 'cta' => 'Get Started'],
    ['name' => 'Growth', 'description' => 'Full social media management', 'price' => '$2,500', 'unit' => '/month', 'features' => ['4 social platforms', '20 posts/month', 'Custom graphics & video', 'Community management', 'Paid ad management', 'Bi-weekly calls', 'Competitor analysis', 'Detailed analytics'], 'popular' => true, 'cta' => 'Most Popular'],
    ['name' => 'Enterprise', 'description' => 'Comprehensive social program', 'price' => 'Custom', 'unit' => 'pricing', 'features' => ['All platforms', 'Unlimited content', 'Video production', 'Influencer partnerships', 'Employee advocacy', 'Social listening', 'Crisis management', 'Executive presence'], 'popular' => false, 'cta' => 'Contact Sales']
];

$faqs = [
    ['question' => 'Which social platforms should my B2B company focus on?', 'answer' => 'For most B2B companies, LinkedIn is essential. Twitter/X is great for thought leadership and news. Facebook and Instagram can work for brand awareness. We\'ll recommend the right mix based on your industry and audience.'],
    ['question' => 'How often should we post on social media?', 'answer' => 'Quality beats quantity. For LinkedIn, 3-5 posts per week is optimal. Twitter can handle more frequent posting. We\'ll develop a content calendar that maximizes engagement without overwhelming your audience.'],
    ['question' => 'Do you create all the content?', 'answer' => 'Yes, our team handles content creation including copywriting, graphics, and video editing. We collaborate with you for approvals and can incorporate your internal content and thought leadership.'],
    ['question' => 'How do you measure social media ROI?', 'answer' => 'We track engagement rates, follower growth, website traffic from social, lead generation, and conversions. For paid campaigns, we measure CPL, ROAS, and pipeline influence.'],
    ['question' => 'Can you manage employee advocacy programs?', 'answer' => 'Yes, our Enterprise plan includes employee advocacy setup and management, helping your team amplify company content and build personal brands.']
];

require_once dirname(__DIR__) . '/includes/header.php';
?>

<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Service","name":"Social Media Marketing Services","description":"<?php echo htmlspecialchars($page_config['meta_description']); ?>","url":"<?php echo SITE_URL; ?>/services/social-media","provider":{"@type":"Organization","name":"<?php echo SITE_NAME; ?>","url":"<?php echo SITE_URL; ?>"},"serviceType":"Social Media Marketing","areaServed":"Worldwide"}
</script>

<main id="main-content" class="service-page social-media-page" role="main">
    <section class="service-hero section" aria-labelledby="service-hero-title">
        <div class="container">
            <div class="service-hero__content">
                <nav class="service-hero__breadcrumb"><a href="<?php echo SITE_URL; ?>/services">← Back to Services</a></nav>
                <span class="service-hero__badge badge badge--primary">Social Media</span>
                <h1 id="service-hero-title" class="service-hero__title">Social Media That <span class="text-gradient">Builds Brands</span></h1>
                <p class="service-hero__description"><?php echo htmlspecialchars($service['description']); ?></p>
                <div class="service-hero__cta">
                    <a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Get Social Audit</a>
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
                <h2 id="features-title" class="section-header__title">Social Media Services</h2>
                <p class="section-header__subtitle">Complete social media management for B2B brands</p>
            </header>
            <div class="features-grid">
                <?php foreach ($features as $feature): ?>
                <article class="feature-card">
                    <div class="feature-card__icon"><svg aria-hidden="true" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg></div>
                    <h3 class="feature-card__title"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    <p class="feature-card__description"><?php echo htmlspecialchars($feature['description']); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="platforms section section--gray" aria-labelledby="platforms-title">
        <div class="container">
            <header class="section-header section-header--center">
                <h2 id="platforms-title" class="section-header__title">Platforms We Manage</h2>
            </header>
            <div class="platforms-grid">
                <?php foreach ($platforms as $platform): ?>
                <span class="platform-tag"><?php echo htmlspecialchars($platform); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="pricing section section--dark" id="pricing" aria-labelledby="pricing-title">
        <div class="container">
            <header class="section-header section-header--center section-header--light">
                <h2 id="pricing-title" class="section-header__title">Social Media Pricing</h2>
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
                    <button class="faq-item__question" aria-expanded="false" aria-controls="social-faq-<?php echo $index; ?>"><span><?php echo htmlspecialchars($faq['question']); ?></span><svg class="faq-item__icon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                    <div class="faq-item__answer" id="social-faq-<?php echo $index; ?>" hidden><p><?php echo htmlspecialchars($faq['answer']); ?></p></div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="cta section"><div class="container"><div class="cta__content"><h2 class="cta__title">Ready to Build Your Social Presence?</h2><p class="cta__description">Get a free social media audit and discover opportunities to grow your brand online.</p><a href="<?php echo SITE_URL; ?>/contact" class="btn btn--primary btn--lg">Get Free Social Audit</a></div></div></section>
</main>

<style>
.service-hero{background:linear-gradient(135deg,var(--color-dark) 0%,var(--color-dark-lighter) 100%);color:var(--color-white);padding:var(--space-12) 0 var(--space-16)}.service-hero__breadcrumb{margin-bottom:var(--space-6)}.service-hero__breadcrumb a{color:var(--color-gray-400);text-decoration:none;font-size:var(--font-size-sm)}.service-hero__breadcrumb a:hover{color:var(--color-primary)}.service-hero__badge{margin-bottom:var(--space-4)}.service-hero__title{font-size:clamp(2rem,5vw,3.5rem);font-weight:var(--font-weight-bold);line-height:1.1;margin-bottom:var(--space-6);max-width:800px}.service-hero__description{font-size:var(--font-size-lg);color:var(--color-gray-300);line-height:1.7;margin-bottom:var(--space-8);max-width:700px}.service-hero__cta{display:flex;flex-wrap:wrap;gap:var(--space-4);margin-bottom:var(--space-10)}.service-hero__stats{display:grid;grid-template-columns:repeat(2,1fr);gap:var(--space-4);max-width:600px}@media(min-width:640px){.service-hero__stats{grid-template-columns:repeat(4,1fr)}}.hero-stat{text-align:center;padding:var(--space-4);background:rgba(255,255,255,.05);border-radius:var(--radius-lg)}.hero-stat__number{display:block;font-size:var(--font-size-2xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.hero-stat__label{font-size:var(--font-size-xs);color:var(--color-gray-400)}.features-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6)}@media(min-width:640px){.features-grid{grid-template-columns:repeat(2,1fr)}}@media(min-width:1024px){.features-grid{grid-template-columns:repeat(3,1fr)}}.feature-card{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);padding:var(--space-6);transition:all var(--transition-normal)}.feature-card:hover{border-color:var(--color-primary);box-shadow:var(--shadow-md)}.feature-card__icon{display:inline-flex;align-items:center;justify-content:center;width:56px;height:56px;background:var(--color-primary-light);border-radius:var(--radius-lg);color:var(--color-primary);margin-bottom:var(--space-4)}.feature-card__title{font-size:var(--font-size-lg);font-weight:var(--font-weight-semibold);color:var(--color-dark);margin-bottom:var(--space-2)}.feature-card__description{font-size:var(--font-size-sm);color:var(--color-gray-600);line-height:1.6}.platforms-grid{display:flex;flex-wrap:wrap;justify-content:center;gap:var(--space-4)}.platform-tag{background:var(--color-white);color:var(--color-dark);font-size:var(--font-size-base);font-weight:var(--font-weight-semibold);padding:var(--space-3) var(--space-6);border-radius:var(--radius-full);box-shadow:var(--shadow-md)}.pricing-grid{display:grid;grid-template-columns:1fr;gap:var(--space-6);max-width:1000px;margin:0 auto}@media(min-width:768px){.pricing-grid{grid-template-columns:repeat(3,1fr)}}.pricing-card{position:relative;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:var(--radius-xl);padding:var(--space-6);display:flex;flex-direction:column}.pricing-card--popular{background:var(--color-white);border-color:var(--color-primary);transform:scale(1.05);z-index:1}.pricing-card--popular .pricing-card__name,.pricing-card--popular .pricing-card__description,.pricing-card--popular .pricing-card__features li{color:var(--color-dark)}.pricing-card--popular .pricing-card__price .price{color:var(--color-primary)}.pricing-card__badge{position:absolute;top:-12px;left:50%;transform:translateX(-50%);background:var(--color-primary);color:var(--color-white);font-size:var(--font-size-xs);font-weight:var(--font-weight-semibold);padding:var(--space-1) var(--space-3);border-radius:var(--radius-full)}.pricing-card__name{font-size:var(--font-size-xl);font-weight:var(--font-weight-bold);color:var(--color-white);margin-bottom:var(--space-1)}.pricing-card__description{font-size:var(--font-size-sm);color:var(--color-gray-400);margin-bottom:var(--space-4)}.pricing-card__price{margin-bottom:var(--space-6)}.pricing-card__price .price{font-size:var(--font-size-3xl);font-weight:var(--font-weight-bold);color:var(--color-primary)}.pricing-card__price .unit{font-size:var(--font-size-sm);color:var(--color-gray-400)}.pricing-card__features{list-style:none;padding:0;margin:0 0 var(--space-6);flex-grow:1}.pricing-card__features li{display:flex;align-items:flex-start;gap:var(--space-2);font-size:var(--font-size-sm);color:var(--color-gray-300);padding:var(--space-2) 0}.pricing-card__features svg{flex-shrink:0;color:var(--color-primary);margin-top:2px}.faq-list{max-width:800px;margin:0 auto}.faq-item{background:var(--color-white);border:1px solid var(--color-gray-200);border-radius:var(--radius-lg);margin-bottom:var(--space-4);overflow:hidden}.faq-item__question{width:100%;display:flex;justify-content:space-between;align-items:center;padding:var(--space-5) var(--space-6);font-size:var(--font-size-base);font-weight:var(--font-weight-medium);text-align:left;color:var(--color-dark);background:transparent;border:none;cursor:pointer}.faq-item__icon{flex-shrink:0;transition:transform var(--transition-normal)}.faq-item__question[aria-expanded="true"] .faq-item__icon{transform:rotate(180deg)}.faq-item__answer{padding:0 var(--space-6) var(--space-5)}.faq-item__answer[hidden]{display:none}.faq-item__answer p{color:var(--color-gray-600);line-height:1.7;margin:0}.cta{background:linear-gradient(135deg,var(--color-primary) 0%,var(--color-primary-dark) 100%);color:var(--color-white);text-align:center}.cta__title{font-size:clamp(1.75rem,4vw,2.5rem);font-weight:var(--font-weight-bold);margin-bottom:var(--space-4)}.cta__description{font-size:var(--font-size-lg);opacity:.9;max-width:600px;margin:0 auto var(--space-8)}.cta .btn--primary{background:var(--color-white);color:var(--color-primary)}.cta .btn--primary:hover{background:var(--color-gray-100)}
</style>
<script>(function(){'use strict';document.querySelectorAll('.faq-item__question').forEach(function(q){q.addEventListener('click',function(){var expanded=this.getAttribute('aria-expanded')==='true';var answer=document.getElementById(this.getAttribute('aria-controls'));document.querySelectorAll('.faq-item__question').forEach(function(btn){btn.setAttribute('aria-expanded','false');var a=document.getElementById(btn.getAttribute('aria-controls'));if(a)a.hidden=true});if(!expanded){this.setAttribute('aria-expanded','true');if(answer)answer.hidden=false}})})})();</script>

<?php require_once dirname(__DIR__) . '/includes/footer.php'; ?>
