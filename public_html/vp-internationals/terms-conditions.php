<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - TERMS AND CONDITIONS PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 545-606: Comprehensive terms of service including
 * usage terms, liability, intellectual property, payment,
 * and dispute resolution
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 545-550: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'Terms and Conditions | VP Internationals - Service Agreement',
    'meta_description' => 'Read VP Internationals terms and conditions. Understand our service agreement, usage policies, liability terms, and your rights when using our services.',
    'meta_keywords' => 'terms and conditions, terms of service, user agreement, VP Internationals terms, service agreement, usage policy',
    'canonical_url' => SITE_URL . '/terms-conditions',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/terms-og-image.jpg',
    'body_class' => 'page-legal page-terms',
    'current_page' => 'terms-conditions',
    'robots' => 'noindex, follow' // Legal pages typically not indexed
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Terms and Conditions', 'url' => SITE_URL . '/terms-conditions']
];

// Last updated date
$last_updated = '2024-01-15';
$effective_date = '2024-01-15';

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 551: LEGAL DOCUMENT SCHEMA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Terms and Conditions",
    "description": "<?php echo htmlspecialchars($page_config['meta_description']); ?>",
    "url": "<?php echo SITE_URL; ?>/terms-conditions",
    "inLanguage": "en-US",
    "isPartOf": {
        "@type": "WebSite",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>"
    },
    "about": {
        "@type": "Thing",
        "name": "Terms of Service"
    },
    "datePublished": "<?php echo $effective_date; ?>",
    "dateModified": "<?php echo $last_updated; ?>",
    "publisher": {
        "@type": "Organization",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>"
    }
}
</script>

<main id="main-content" class="legal-page terms-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 552-553: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="legal-hero section" aria-labelledby="terms-title">
        <div class="container">
            <header class="legal-hero__header">
                <h1 id="terms-title" class="legal-hero__title">Terms and Conditions</h1>
                <p class="legal-hero__meta">
                    <span>Last Updated: <?php echo date('F j, Y', strtotime($last_updated)); ?></span>
                    <span class="separator">|</span>
                    <span>Effective: <?php echo date('F j, Y', strtotime($effective_date)); ?></span>
                </p>
            </header>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 554-606: TERMS AND CONDITIONS CONTENT
    ───────────────────────────────────────────────────────────────── -->
    <section class="legal-content section">
        <div class="container">
            <div class="legal-wrapper">
                <!-- Table of Contents -->
                <nav class="legal-toc" aria-labelledby="toc-title">
                    <h2 id="toc-title" class="legal-toc__title">Table of Contents</h2>
                    <ol class="legal-toc__list">
                        <li><a href="#acceptance">Acceptance of Terms</a></li>
                        <li><a href="#definitions">Definitions</a></li>
                        <li><a href="#services">Our Services</a></li>
                        <li><a href="#eligibility">Eligibility</a></li>
                        <li><a href="#accounts">User Accounts</a></li>
                        <li><a href="#use-restrictions">Acceptable Use</a></li>
                        <li><a href="#intellectual-property">Intellectual Property</a></li>
                        <li><a href="#payment">Payment Terms</a></li>
                        <li><a href="#confidentiality">Confidentiality</a></li>
                        <li><a href="#warranties">Warranties & Disclaimers</a></li>
                        <li><a href="#liability">Limitation of Liability</a></li>
                        <li><a href="#indemnification">Indemnification</a></li>
                        <li><a href="#termination">Termination</a></li>
                        <li><a href="#governing-law">Governing Law</a></li>
                        <li><a href="#dispute-resolution">Dispute Resolution</a></li>
                        <li><a href="#general">General Provisions</a></li>
                        <li><a href="#contact">Contact Information</a></li>
                    </ol>
                </nav>

                <!-- Main Content -->
                <article class="legal-article">

                    <!-- POINT 555-556: Acceptance of Terms -->
                    <section id="acceptance" class="legal-section">
                        <h2>1. Acceptance of Terms</h2>
                        <p>Welcome to VP Internationals. These Terms and Conditions ("Terms," "Agreement") constitute a legally binding agreement between you ("Client," "you," "your") and VP Internationals ("Company," "we," "us," "our").</p>

                        <p>By accessing our website at <strong>vpinternationals.com</strong> ("Website"), using our services, or engaging with us in any capacity, you acknowledge that you have read, understood, and agree to be bound by these Terms.</p>

                        <div class="legal-highlight">
                            <strong>Important:</strong> If you do not agree to these Terms, you must not access or use our Website or services. Continued use of our services constitutes acceptance of any updates to these Terms.
                        </div>

                        <p>These Terms apply to all visitors, users, clients, and others who access or use our Website and services. Additional terms may apply to specific services, and such terms will be provided at the time of service engagement.</p>
                    </section>

                    <!-- POINT 557-558: Definitions -->
                    <section id="definitions" class="legal-section">
                        <h2>2. Definitions</h2>
                        <p>For the purposes of these Terms:</p>

                        <dl class="definition-list">
                            <dt>"Services"</dt>
                            <dd>All services offered by VP Internationals, including but not limited to B2B lead generation, data solutions, digital marketing, web development, SEO, content marketing, and related consulting services.</dd>

                            <dt>"Deliverables"</dt>
                            <dd>Any data, leads, reports, websites, content, or other materials provided by VP Internationals as part of our Services.</dd>

                            <dt>"Client Data"</dt>
                            <dd>Any data, information, or materials provided by you to VP Internationals for the purpose of receiving Services.</dd>

                            <dt>"Confidential Information"</dt>
                            <dd>Any non-public information disclosed by either party, including business strategies, client lists, pricing, and proprietary methodologies.</dd>

                            <dt>"Project"</dt>
                            <dd>A specific engagement or scope of work agreed upon between you and VP Internationals.</dd>

                            <dt>"Statement of Work" (SOW)</dt>
                            <dd>A document detailing the specific scope, deliverables, timeline, and pricing for a Project.</dd>
                        </dl>
                    </section>

                    <!-- POINT 559-562: Our Services -->
                    <section id="services" class="legal-section">
                        <h2>3. Our Services</h2>

                        <h3>3.1 Service Description</h3>
                        <p>VP Internationals provides professional B2B services including:</p>
                        <ul>
                            <li><strong>B2B Lead Generation:</strong> Identification and delivery of qualified business leads based on specified criteria</li>
                            <li><strong>Data Solutions:</strong> Data enrichment, verification, and list building services</li>
                            <li><strong>Digital Marketing:</strong> Campaign management, advertising, and promotional services</li>
                            <li><strong>Web Development:</strong> Website design, development, and maintenance</li>
                            <li><strong>SEO & Content:</strong> Search engine optimization and content creation</li>
                            <li><strong>Consulting:</strong> Marketing strategy and business development consulting</li>
                        </ul>

                        <h3>3.2 Service Engagement</h3>
                        <p>Service engagement is formalized through:</p>
                        <ol>
                            <li>Submission of an inquiry through our Website or direct contact</li>
                            <li>Discussion and documentation of your requirements</li>
                            <li>Provision of a proposal or Statement of Work (SOW)</li>
                            <li>Written acceptance of the proposal/SOW</li>
                            <li>Payment of agreed deposits or fees</li>
                        </ol>

                        <h3>3.3 Service Modifications</h3>
                        <p>Any modifications to agreed Services must be documented in writing through a change order signed by both parties. Modifications may affect project timelines and pricing.</p>

                        <h3>3.4 Data Accuracy</h3>
                        <p>While we strive for high accuracy in our lead generation and data services, we cannot guarantee 100% accuracy due to the dynamic nature of business data. We commit to:</p>
                        <ul>
                            <li>Industry-standard verification processes</li>
                            <li>Quality assurance checks on all deliverables</li>
                            <li>Replacement of invalid data as per agreed service terms</li>
                        </ul>
                    </section>

                    <!-- POINT 563-564: Eligibility -->
                    <section id="eligibility" class="legal-section">
                        <h2>4. Eligibility</h2>
                        <p>To use our Services, you must:</p>
                        <ul>
                            <li>Be at least 18 years of age</li>
                            <li>Have the legal capacity to enter into binding contracts</li>
                            <li>Be authorized to act on behalf of your organization (if applicable)</li>
                            <li>Provide accurate and complete information</li>
                            <li>Comply with all applicable laws and regulations</li>
                        </ul>

                        <p>We reserve the right to refuse service to anyone for any reason at any time.</p>
                    </section>

                    <!-- POINT 565-567: User Accounts -->
                    <section id="accounts" class="legal-section">
                        <h2>5. User Accounts</h2>

                        <h3>5.1 Account Creation</h3>
                        <p>Certain Services may require you to create an account. You agree to:</p>
                        <ul>
                            <li>Provide accurate, current, and complete information</li>
                            <li>Maintain and update your information as needed</li>
                            <li>Keep your login credentials secure and confidential</li>
                            <li>Notify us immediately of any unauthorized access</li>
                        </ul>

                        <h3>5.2 Account Responsibilities</h3>
                        <p>You are responsible for all activities that occur under your account. We are not liable for any loss or damage arising from unauthorized use of your account.</p>

                        <h3>5.3 Account Termination</h3>
                        <p>We may suspend or terminate your account if:</p>
                        <ul>
                            <li>You violate these Terms</li>
                            <li>Your account is used for fraudulent or illegal activities</li>
                            <li>You fail to pay for Services</li>
                            <li>Required by law or regulatory authorities</li>
                        </ul>
                    </section>

                    <!-- POINT 568-571: Acceptable Use -->
                    <section id="use-restrictions" class="legal-section">
                        <h2>6. Acceptable Use</h2>

                        <h3>6.1 Permitted Use</h3>
                        <p>You may use our Website and Services for legitimate business purposes in compliance with these Terms and all applicable laws.</p>

                        <h3>6.2 Prohibited Activities</h3>
                        <p>You agree NOT to:</p>
                        <ul>
                            <li>Use our Services for any illegal or unauthorized purpose</li>
                            <li>Violate any applicable laws, regulations, or third-party rights</li>
                            <li>Resell, sublicense, or redistribute our Services or Deliverables without authorization</li>
                            <li>Use leads or data for spam, harassment, or unsolicited communications</li>
                            <li>Attempt to gain unauthorized access to our systems or data</li>
                            <li>Interfere with or disrupt our Website or Services</li>
                            <li>Use automated systems (bots, scrapers) to access our Website without permission</li>
                            <li>Misrepresent your identity or affiliation</li>
                            <li>Upload malicious code, viruses, or harmful content</li>
                            <li>Engage in any activity that could damage our reputation</li>
                        </ul>

                        <h3>6.3 Data Usage Compliance</h3>
                        <p>When using data or leads provided by us, you must:</p>
                        <ul>
                            <li>Comply with all applicable data protection laws (GDPR, CAN-SPAM, CCPA, etc.)</li>
                            <li>Use data only for the agreed-upon purposes</li>
                            <li>Honor opt-out requests promptly</li>
                            <li>Implement appropriate security measures</li>
                            <li>Not share data with unauthorized third parties</li>
                        </ul>
                    </section>

                    <!-- POINT 572-575: Intellectual Property -->
                    <section id="intellectual-property" class="legal-section">
                        <h2>7. Intellectual Property</h2>

                        <h3>7.1 Our Intellectual Property</h3>
                        <p>VP Internationals retains all rights, title, and interest in:</p>
                        <ul>
                            <li>Our Website, including design, layout, and code</li>
                            <li>Our brand, logo, trademarks, and service marks</li>
                            <li>Our proprietary methodologies, processes, and tools</li>
                            <li>Our databases, software, and technology platforms</li>
                            <li>All content created by us unless explicitly transferred</li>
                        </ul>

                        <h3>7.2 Client Intellectual Property</h3>
                        <p>You retain all rights to:</p>
                        <ul>
                            <li>Client Data you provide to us</li>
                            <li>Your brand assets, logos, and trademarks</li>
                            <li>Pre-existing materials you provide</li>
                        </ul>

                        <h3>7.3 Deliverables Ownership</h3>
                        <p>Upon full payment:</p>
                        <ul>
                            <li><strong>Custom Websites:</strong> You own the custom website code and content created specifically for you</li>
                            <li><strong>Lead Data:</strong> You receive a license to use the data for agreed purposes</li>
                            <li><strong>Custom Content:</strong> You own original content created specifically for you</li>
                            <li><strong>Third-Party Materials:</strong> Subject to their respective licenses</li>
                        </ul>

                        <h3>7.4 License Grant</h3>
                        <p>You grant us a limited license to use your Client Data and brand assets solely for the purpose of providing Services.</p>
                    </section>

                    <!-- POINT 576-580: Payment Terms -->
                    <section id="payment" class="legal-section">
                        <h2>8. Payment Terms</h2>

                        <h3>8.1 Pricing</h3>
                        <p>Pricing for Services is detailed in proposals, quotes, or Statements of Work. All prices are in USD unless otherwise specified.</p>

                        <h3>8.2 Payment Schedule</h3>
                        <p>Standard payment terms:</p>
                        <ul>
                            <li><strong>Project Work:</strong> 50% advance, 50% upon completion (or as specified in SOW)</li>
                            <li><strong>Retainer Services:</strong> Monthly advance payment</li>
                            <li><strong>Subscription Services:</strong> As per subscription terms</li>
                        </ul>

                        <h3>8.3 Payment Methods</h3>
                        <p>We accept:</p>
                        <ul>
                            <li>Bank wire transfer</li>
                            <li>Credit/debit cards (via secure payment gateway)</li>
                            <li>PayPal</li>
                            <li>Other methods as agreed</li>
                        </ul>

                        <h3>8.4 Late Payments</h3>
                        <p>If payment is not received by the due date:</p>
                        <ul>
                            <li>A late fee of 1.5% per month may be applied</li>
                            <li>Services may be suspended until payment is received</li>
                            <li>We may pursue collection through appropriate channels</li>
                            <li>You are responsible for any collection costs and legal fees</li>
                        </ul>

                        <h3>8.5 Refunds</h3>
                        <p>Refund policies vary by service type:</p>
                        <ul>
                            <li><strong>Lead Generation:</strong> Replacement of invalid leads as per service agreement</li>
                            <li><strong>Project Work:</strong> Pro-rated refund for incomplete work if project is cancelled</li>
                            <li><strong>Subscriptions:</strong> As per specific subscription terms</li>
                        </ul>
                        <p>All refund requests must be submitted in writing within 14 days of delivery.</p>

                        <h3>8.6 Taxes</h3>
                        <p>You are responsible for all applicable taxes, including VAT, GST, or sales tax, unless we are required by law to collect them.</p>
                    </section>

                    <!-- POINT 581-583: Confidentiality -->
                    <section id="confidentiality" class="legal-section">
                        <h2>9. Confidentiality</h2>

                        <h3>9.1 Confidential Information</h3>
                        <p>Both parties agree to maintain the confidentiality of any non-public information shared during the course of engagement, including but not limited to:</p>
                        <ul>
                            <li>Business strategies and plans</li>
                            <li>Client lists and contact information</li>
                            <li>Pricing and financial information</li>
                            <li>Proprietary methodologies and processes</li>
                            <li>Technical specifications and trade secrets</li>
                        </ul>

                        <h3>9.2 Confidentiality Obligations</h3>
                        <p>Each party agrees to:</p>
                        <ul>
                            <li>Use Confidential Information only for the purposes of the engagement</li>
                            <li>Not disclose Confidential Information to third parties without consent</li>
                            <li>Take reasonable measures to protect Confidential Information</li>
                            <li>Return or destroy Confidential Information upon request</li>
                        </ul>

                        <h3>9.3 Exceptions</h3>
                        <p>Confidentiality obligations do not apply to information that:</p>
                        <ul>
                            <li>Is or becomes publicly available through no fault of the receiving party</li>
                            <li>Was known to the receiving party prior to disclosure</li>
                            <li>Is independently developed without use of Confidential Information</li>
                            <li>Must be disclosed by law or court order</li>
                        </ul>
                    </section>

                    <!-- POINT 584-587: Warranties & Disclaimers -->
                    <section id="warranties" class="legal-section">
                        <h2>10. Warranties & Disclaimers</h2>

                        <h3>10.1 Our Warranties</h3>
                        <p>VP Internationals warrants that:</p>
                        <ul>
                            <li>Services will be provided with reasonable skill and care</li>
                            <li>We have the right to provide the Services</li>
                            <li>We will comply with applicable laws and regulations</li>
                            <li>Deliverables will substantially conform to agreed specifications</li>
                        </ul>

                        <h3>10.2 Disclaimers</h3>
                        <div class="legal-highlight legal-highlight--warning">
                            <p><strong>EXCEPT AS EXPRESSLY STATED, ALL SERVICES AND DELIVERABLES ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT.</strong></p>
                        </div>

                        <p>We do not warrant that:</p>
                        <ul>
                            <li>Services will be uninterrupted, error-free, or secure</li>
                            <li>Results achieved will meet your specific expectations</li>
                            <li>All leads or data will be 100% accurate or current</li>
                            <li>Any specific business outcomes will be achieved</li>
                        </ul>

                        <h3>10.3 Third-Party Services</h3>
                        <p>We are not responsible for the availability, quality, or terms of any third-party services integrated with our Services.</p>
                    </section>

                    <!-- POINT 588-591: Limitation of Liability -->
                    <section id="liability" class="legal-section">
                        <h2>11. Limitation of Liability</h2>

                        <div class="legal-highlight legal-highlight--important">
                            <p><strong>TO THE MAXIMUM EXTENT PERMITTED BY LAW:</strong></p>
                        </div>

                        <h3>11.1 Exclusion of Certain Damages</h3>
                        <p>VP Internationals shall not be liable for any:</p>
                        <ul>
                            <li>Indirect, incidental, special, or consequential damages</li>
                            <li>Loss of profits, revenue, or business opportunities</li>
                            <li>Loss of data or goodwill</li>
                            <li>Damages arising from service interruptions</li>
                            <li>Damages from third-party actions or services</li>
                        </ul>

                        <h3>11.2 Liability Cap</h3>
                        <p>Our total cumulative liability for any claims arising from these Terms or Services shall not exceed the greater of:</p>
                        <ul>
                            <li>The total fees paid by you in the 12 months preceding the claim, or</li>
                            <li>$1,000 USD</li>
                        </ul>

                        <h3>11.3 Essential Basis</h3>
                        <p>These limitations reflect the allocation of risk between the parties and are an essential element of these Terms.</p>
                    </section>

                    <!-- POINT 592-593: Indemnification -->
                    <section id="indemnification" class="legal-section">
                        <h2>12. Indemnification</h2>

                        <h3>12.1 Your Indemnification</h3>
                        <p>You agree to indemnify, defend, and hold harmless VP Internationals and our officers, directors, employees, and agents from any claims, damages, losses, liabilities, costs, and expenses (including legal fees) arising from:</p>
                        <ul>
                            <li>Your use of our Services or Website</li>
                            <li>Your violation of these Terms</li>
                            <li>Your violation of any applicable laws or third-party rights</li>
                            <li>Your misuse of data or leads provided by us</li>
                            <li>Content or materials you provide to us</li>
                        </ul>

                        <h3>12.2 Indemnification Process</h3>
                        <p>We will promptly notify you of any claim and provide reasonable cooperation. You shall have control over the defense, provided that any settlement does not adversely affect our rights.</p>
                    </section>

                    <!-- POINT 594-596: Termination -->
                    <section id="termination" class="legal-section">
                        <h2>13. Termination</h2>

                        <h3>13.1 Termination by You</h3>
                        <p>You may terminate Services:</p>
                        <ul>
                            <li>As specified in your Statement of Work</li>
                            <li>With 30 days written notice for ongoing services</li>
                            <li>Subject to payment of fees for work completed</li>
                        </ul>

                        <h3>13.2 Termination by Us</h3>
                        <p>We may terminate or suspend Services immediately if:</p>
                        <ul>
                            <li>You breach these Terms</li>
                            <li>You fail to make timely payments</li>
                            <li>Required by law</li>
                            <li>We cease operations</li>
                        </ul>
                        <p>For convenience, we may terminate with 30 days written notice.</p>

                        <h3>13.3 Effects of Termination</h3>
                        <p>Upon termination:</p>
                        <ul>
                            <li>All outstanding payments become due</li>
                            <li>Your license to use our Services terminates</li>
                            <li>Confidentiality obligations survive</li>
                            <li>We will provide reasonable transition assistance</li>
                            <li>Sections 7, 9, 10, 11, 12, 14, and 15 survive termination</li>
                        </ul>
                    </section>

                    <!-- POINT 597-599: Governing Law -->
                    <section id="governing-law" class="legal-section">
                        <h2>14. Governing Law</h2>

                        <h3>14.1 Applicable Law</h3>
                        <p>These Terms shall be governed by and construed in accordance with the laws of India, without regard to conflict of law principles.</p>

                        <h3>14.2 Jurisdiction</h3>
                        <p>Any legal proceedings arising from these Terms shall be brought exclusively in the courts located in [City], India. You consent to personal jurisdiction in these courts.</p>

                        <h3>14.3 Language</h3>
                        <p>These Terms are written in English. Any translations are provided for convenience only, and the English version shall prevail in case of discrepancies.</p>
                    </section>

                    <!-- POINT 600-602: Dispute Resolution -->
                    <section id="dispute-resolution" class="legal-section">
                        <h2>15. Dispute Resolution</h2>

                        <h3>15.1 Informal Resolution</h3>
                        <p>Before initiating formal proceedings, both parties agree to attempt to resolve disputes informally by contacting each other and negotiating in good faith for at least 30 days.</p>

                        <h3>15.2 Mediation</h3>
                        <p>If informal resolution fails, the parties agree to attempt mediation before a mutually agreed mediator. Mediation costs shall be shared equally.</p>

                        <h3>15.3 Arbitration</h3>
                        <p>If mediation is unsuccessful, disputes may be resolved through binding arbitration in accordance with the rules of the Indian Council of Arbitration. The arbitration shall take place in [City], India.</p>

                        <h3>15.4 Class Action Waiver</h3>
                        <p>You agree to resolve disputes only on an individual basis and waive any right to participate in class actions or class-wide arbitration.</p>
                    </section>

                    <!-- POINT 603-604: General Provisions -->
                    <section id="general" class="legal-section">
                        <h2>16. General Provisions</h2>

                        <h3>16.1 Entire Agreement</h3>
                        <p>These Terms, together with any SOWs, proposals, and policies referenced herein, constitute the entire agreement between you and VP Internationals.</p>

                        <h3>16.2 Amendments</h3>
                        <p>We reserve the right to modify these Terms at any time. Material changes will be notified via email or Website notice. Continued use after changes constitutes acceptance.</p>

                        <h3>16.3 Severability</h3>
                        <p>If any provision of these Terms is found unenforceable, the remaining provisions shall remain in full force and effect.</p>

                        <h3>16.4 Waiver</h3>
                        <p>Our failure to enforce any right or provision shall not constitute a waiver of such right or provision.</p>

                        <h3>16.5 Assignment</h3>
                        <p>You may not assign these Terms without our written consent. We may assign our rights to a successor entity.</p>

                        <h3>16.6 Force Majeure</h3>
                        <p>Neither party shall be liable for delays or failures due to circumstances beyond reasonable control, including natural disasters, war, terrorism, labor disputes, or government actions.</p>

                        <h3>16.7 Notices</h3>
                        <p>Notices shall be sent to the email addresses on file and shall be effective upon receipt.</p>

                        <h3>16.8 Relationship of Parties</h3>
                        <p>The parties are independent contractors. Nothing in these Terms creates a partnership, joint venture, or employment relationship.</p>
                    </section>

                    <!-- POINT 605-606: Contact Information -->
                    <section id="contact" class="legal-section">
                        <h2>17. Contact Information</h2>
                        <p>For questions about these Terms or our Services, please contact us:</p>

                        <div class="contact-info-box">
                            <h3>VP Internationals - Legal Department</h3>
                            <p><strong>Email:</strong> <a href="mailto:legal@vpinternationals.com">legal@vpinternationals.com</a></p>
                            <p><strong>General Inquiries:</strong> <a href="mailto:info@vpinternationals.com">info@vpinternationals.com</a></p>
                            <p><strong>Phone:</strong> +91-XXX-XXX-XXXX</p>
                            <p><strong>Address:</strong><br>
                            VP Internationals<br>
                            Attn: Legal Department<br>
                            Business District<br>
                            City, State 000000<br>
                            India</p>
                        </div>

                        <div class="legal-highlight">
                            <p><strong>Thank you for choosing VP Internationals.</strong> We look forward to building a successful partnership with you.</p>
                        </div>
                    </section>

                </article>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- LEGAL PAGE SPECIFIC STYLES (Same as Privacy Policy) -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<style>
/* Legal Hero */
.legal-hero {
    background: linear-gradient(135deg, var(--color-dark) 0%, var(--color-dark-lighter) 100%);
    color: var(--color-white);
    padding: var(--space-12) 0;
    text-align: center;
}

.legal-hero__title {
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: var(--font-weight-bold);
    margin-bottom: var(--space-4);
}

.legal-hero__meta {
    font-size: var(--font-size-sm);
    color: var(--color-gray-400);
}

.legal-hero__meta .separator {
    margin: 0 var(--space-2);
}

/* Legal Content Wrapper */
.legal-wrapper {
    display: grid;
    grid-template-columns: 1fr;
    gap: var(--space-8);
}

@media (min-width: 1024px) {
    .legal-wrapper {
        grid-template-columns: 280px 1fr;
    }
}

/* Table of Contents */
.legal-toc {
    background: var(--color-gray-50);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    position: sticky;
    top: 100px;
    height: fit-content;
}

.legal-toc__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-bold);
    margin-bottom: var(--space-4);
    color: var(--color-dark);
}

.legal-toc__list {
    list-style: decimal;
    padding-left: var(--space-5);
    margin: 0;
}

.legal-toc__list li {
    margin-bottom: var(--space-2);
}

.legal-toc__list a {
    color: var(--color-gray-600);
    text-decoration: none;
    font-size: var(--font-size-sm);
    transition: color var(--transition-fast);
}

.legal-toc__list a:hover {
    color: var(--color-primary);
}

/* Legal Article */
.legal-article {
    background: var(--color-white);
    padding: var(--space-8);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.legal-section {
    margin-bottom: var(--space-10);
    padding-bottom: var(--space-8);
    border-bottom: 1px solid var(--color-gray-200);
}

.legal-section:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.legal-section h2 {
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-bottom: var(--space-4);
    padding-top: var(--space-4);
}

.legal-section h3 {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
    margin-top: var(--space-6);
    margin-bottom: var(--space-3);
}

.legal-section h4 {
    font-size: var(--font-size-base);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
    margin-top: var(--space-4);
    margin-bottom: var(--space-2);
}

.legal-section p {
    color: var(--color-gray-700);
    line-height: 1.8;
    margin-bottom: var(--space-4);
}

.legal-section ul,
.legal-section ol {
    margin-bottom: var(--space-4);
    padding-left: var(--space-6);
    color: var(--color-gray-700);
}

.legal-section li {
    margin-bottom: var(--space-2);
    line-height: 1.7;
}

.legal-section a {
    color: var(--color-primary);
    text-decoration: underline;
}

.legal-section a:hover {
    color: var(--color-primary-dark);
}

/* Definition List */
.definition-list {
    margin: var(--space-6) 0;
}

.definition-list dt {
    font-weight: var(--font-weight-bold);
    color: var(--color-dark);
    margin-top: var(--space-4);
}

.definition-list dd {
    margin-left: var(--space-4);
    color: var(--color-gray-700);
    margin-bottom: var(--space-2);
}

/* Legal Highlight Box */
.legal-highlight {
    background: var(--color-primary-light);
    border-left: 4px solid var(--color-primary);
    padding: var(--space-4) var(--space-5);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    margin: var(--space-6) 0;
}

.legal-highlight p {
    margin-bottom: 0;
}

.legal-highlight ul {
    margin-bottom: 0;
}

.legal-highlight--important {
    background: #fef3c7;
    border-color: #f59e0b;
}

.legal-highlight--warning {
    background: #fee2e2;
    border-color: #ef4444;
}

/* Contact Info Box */
.contact-info-box {
    background: var(--color-gray-50);
    padding: var(--space-6);
    border-radius: var(--radius-lg);
    margin: var(--space-6) 0;
}

.contact-info-box h3 {
    margin-top: 0;
    color: var(--color-primary);
}

.contact-info-box p {
    margin-bottom: var(--space-2);
}

.contact-info-box a {
    color: var(--color-primary);
}

/* Mobile TOC */
@media (max-width: 1023px) {
    .legal-toc {
        position: relative;
        top: 0;
    }
}

/* Print Styles */
@media print {
    .legal-toc {
        display: none;
    }

    .legal-article {
        box-shadow: none;
        padding: 0;
    }

    .legal-section {
        page-break-inside: avoid;
    }
}
</style>

<?php
// Include footer
require_once __DIR__ . '/includes/footer.php';
?>
