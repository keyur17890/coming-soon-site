<?php
/**
 * ═══════════════════════════════════════════════════════════════
 * VP INTERNATIONALS - PRIVACY POLICY PAGE
 * ═══════════════════════════════════════════════════════════════
 * Points 494-544: Comprehensive privacy policy with GDPR
 * compliance, data collection details, user rights, and
 * cookie policy
 *
 * @package     VP_Internationals
 * @version     2.0.0
 * @author      VP Internationals Dev Team
 */

declare(strict_types=1);

// Load configuration
require_once __DIR__ . '/config.php';

// ─────────────────────────────────────────────────────────────────
// POINT 494-500: PAGE-SPECIFIC SEO CONFIGURATION
// ─────────────────────────────────────────────────────────────────
$page_config = [
    'title' => 'Privacy Policy | VP Internationals - Data Protection & GDPR Compliance',
    'meta_description' => 'Read VP Internationals privacy policy. Learn how we collect, use, and protect your personal data. GDPR compliant with transparent data practices.',
    'meta_keywords' => 'privacy policy, data protection, GDPR compliance, cookie policy, personal data, VP Internationals privacy',
    'canonical_url' => SITE_URL . '/privacy-policy',
    'og_type' => 'website',
    'og_image' => SITE_URL . '/assets/images/privacy-og-image.jpg',
    'body_class' => 'page-legal page-privacy',
    'current_page' => 'privacy-policy',
    'robots' => 'noindex, follow' // Legal pages typically not indexed
];

// Breadcrumb configuration
$breadcrumbs = [
    ['name' => 'Home', 'url' => SITE_URL],
    ['name' => 'Privacy Policy', 'url' => SITE_URL . '/privacy-policy']
];

// Last updated date
$last_updated = '2024-01-15';
$effective_date = '2024-01-15';

// Include header
require_once __DIR__ . '/includes/header.php';
?>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- POINT 501: LEGAL DOCUMENT SCHEMA -->
<!-- ═══════════════════════════════════════════════════════════════ -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Privacy Policy",
    "description": "<?php echo htmlspecialchars($page_config['meta_description']); ?>",
    "url": "<?php echo SITE_URL; ?>/privacy-policy",
    "inLanguage": "en-US",
    "isPartOf": {
        "@type": "WebSite",
        "name": "<?php echo SITE_NAME; ?>",
        "url": "<?php echo SITE_URL; ?>"
    },
    "about": {
        "@type": "Thing",
        "name": "Privacy Policy"
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

<main id="main-content" class="legal-page privacy-page" role="main">

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 502-503: HERO SECTION
    ───────────────────────────────────────────────────────────────── -->
    <section class="legal-hero section" aria-labelledby="privacy-title">
        <div class="container">
            <header class="legal-hero__header">
                <h1 id="privacy-title" class="legal-hero__title">Privacy Policy</h1>
                <p class="legal-hero__meta">
                    <span>Last Updated: <?php echo date('F j, Y', strtotime($last_updated)); ?></span>
                    <span class="separator">|</span>
                    <span>Effective: <?php echo date('F j, Y', strtotime($effective_date)); ?></span>
                </p>
            </header>
        </div>
    </section>

    <!-- ─────────────────────────────────────────────────────────────────
         POINT 504-544: PRIVACY POLICY CONTENT
    ───────────────────────────────────────────────────────────────── -->
    <section class="legal-content section">
        <div class="container">
            <div class="legal-wrapper">
                <!-- Table of Contents -->
                <nav class="legal-toc" aria-labelledby="toc-title">
                    <h2 id="toc-title" class="legal-toc__title">Table of Contents</h2>
                    <ol class="legal-toc__list">
                        <li><a href="#introduction">Introduction</a></li>
                        <li><a href="#information-collect">Information We Collect</a></li>
                        <li><a href="#how-use">How We Use Your Information</a></li>
                        <li><a href="#legal-basis">Legal Basis for Processing</a></li>
                        <li><a href="#data-sharing">Data Sharing & Disclosure</a></li>
                        <li><a href="#data-retention">Data Retention</a></li>
                        <li><a href="#your-rights">Your Privacy Rights</a></li>
                        <li><a href="#cookies">Cookie Policy</a></li>
                        <li><a href="#international">International Data Transfers</a></li>
                        <li><a href="#security">Data Security</a></li>
                        <li><a href="#children">Children's Privacy</a></li>
                        <li><a href="#changes">Changes to This Policy</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ol>
                </nav>

                <!-- Main Content -->
                <article class="legal-article">

                    <!-- POINT 505-506: Introduction -->
                    <section id="introduction" class="legal-section">
                        <h2>1. Introduction</h2>
                        <p>Welcome to VP Internationals ("Company," "we," "us," or "our"). We are committed to protecting your personal information and your right to privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website <strong>vpinternationals.com</strong> (the "Website") or use our services.</p>

                        <p>By accessing or using our Website and services, you acknowledge that you have read, understood, and agree to be bound by this Privacy Policy. If you do not agree with the terms of this policy, please do not access the Website or use our services.</p>

                        <div class="legal-highlight">
                            <strong>Key Points:</strong>
                            <ul>
                                <li>We only collect information necessary to provide our services</li>
                                <li>We never sell your personal data to third parties</li>
                                <li>You have full control over your data and can request deletion</li>
                                <li>We comply with GDPR and other applicable data protection laws</li>
                            </ul>
                        </div>
                    </section>

                    <!-- POINT 507-512: Information We Collect -->
                    <section id="information-collect" class="legal-section">
                        <h2>2. Information We Collect</h2>

                        <h3>2.1 Information You Provide Directly</h3>
                        <p>We collect information that you voluntarily provide when you:</p>
                        <ul>
                            <li>Fill out contact forms on our Website</li>
                            <li>Subscribe to our newsletter</li>
                            <li>Request a quote or consultation</li>
                            <li>Create an account or register for our services</li>
                            <li>Communicate with us via email, phone, or other channels</li>
                        </ul>

                        <p>This information may include:</p>
                        <ul>
                            <li><strong>Personal Identifiers:</strong> Name, email address, phone number, job title</li>
                            <li><strong>Business Information:</strong> Company name, company website, industry, company size</li>
                            <li><strong>Communication Data:</strong> Message content, inquiry details, service preferences</li>
                            <li><strong>Account Data:</strong> Username, password (encrypted), account preferences</li>
                        </ul>

                        <h3>2.2 Information Collected Automatically</h3>
                        <p>When you visit our Website, we automatically collect certain information, including:</p>
                        <ul>
                            <li><strong>Device Information:</strong> IP address, browser type and version, operating system, device type</li>
                            <li><strong>Usage Data:</strong> Pages visited, time spent on pages, click patterns, referral source</li>
                            <li><strong>Location Data:</strong> Approximate geographic location based on IP address</li>
                            <li><strong>Cookies & Tracking:</strong> Data collected through cookies, pixels, and similar technologies (see Section 8)</li>
                        </ul>

                        <h3>2.3 Information from Third Parties</h3>
                        <p>We may receive information about you from:</p>
                        <ul>
                            <li>Business partners and data providers</li>
                            <li>Social media platforms (if you interact with us through them)</li>
                            <li>Analytics providers</li>
                            <li>Advertising networks</li>
                        </ul>
                    </section>

                    <!-- POINT 513-516: How We Use Your Information -->
                    <section id="how-use" class="legal-section">
                        <h2>3. How We Use Your Information</h2>
                        <p>We use the information we collect for the following purposes:</p>

                        <h3>3.1 Service Delivery</h3>
                        <ul>
                            <li>To provide and maintain our services</li>
                            <li>To process your inquiries and requests</li>
                            <li>To communicate with you about our services</li>
                            <li>To fulfill our contractual obligations</li>
                        </ul>

                        <h3>3.2 Business Operations</h3>
                        <ul>
                            <li>To analyze and improve our Website and services</li>
                            <li>To develop new features and offerings</li>
                            <li>To conduct research and analytics</li>
                            <li>To prevent fraud and ensure security</li>
                        </ul>

                        <h3>3.3 Marketing & Communications</h3>
                        <ul>
                            <li>To send newsletters and promotional content (with your consent)</li>
                            <li>To personalize your experience on our Website</li>
                            <li>To display relevant advertisements</li>
                            <li>To conduct surveys and gather feedback</li>
                        </ul>

                        <h3>3.4 Legal Compliance</h3>
                        <ul>
                            <li>To comply with applicable laws and regulations</li>
                            <li>To respond to legal requests and prevent harm</li>
                            <li>To enforce our terms of service</li>
                            <li>To protect our rights and property</li>
                        </ul>
                    </section>

                    <!-- POINT 517-519: Legal Basis for Processing -->
                    <section id="legal-basis" class="legal-section">
                        <h2>4. Legal Basis for Processing (GDPR)</h2>
                        <p>If you are located in the European Economic Area (EEA), we process your personal data based on the following legal grounds:</p>

                        <table class="legal-table">
                            <thead>
                                <tr>
                                    <th>Processing Purpose</th>
                                    <th>Legal Basis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Service delivery and contract fulfillment</td>
                                    <td>Contract performance</td>
                                </tr>
                                <tr>
                                    <td>Responding to inquiries</td>
                                    <td>Legitimate interest / Consent</td>
                                </tr>
                                <tr>
                                    <td>Marketing communications</td>
                                    <td>Consent</td>
                                </tr>
                                <tr>
                                    <td>Website analytics and improvement</td>
                                    <td>Legitimate interest</td>
                                </tr>
                                <tr>
                                    <td>Security and fraud prevention</td>
                                    <td>Legitimate interest</td>
                                </tr>
                                <tr>
                                    <td>Legal compliance</td>
                                    <td>Legal obligation</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <!-- POINT 520-522: Data Sharing -->
                    <section id="data-sharing" class="legal-section">
                        <h2>5. Data Sharing & Disclosure</h2>

                        <div class="legal-highlight legal-highlight--important">
                            <strong>Important:</strong> We do NOT sell, rent, or trade your personal information to third parties for their marketing purposes.
                        </div>

                        <p>We may share your information with:</p>

                        <h3>5.1 Service Providers</h3>
                        <p>We work with trusted third-party service providers who assist us in operating our business:</p>
                        <ul>
                            <li>Cloud hosting and infrastructure providers</li>
                            <li>Email service providers</li>
                            <li>Analytics and tracking services</li>
                            <li>Customer relationship management (CRM) tools</li>
                            <li>Payment processors</li>
                        </ul>
                        <p>These providers are contractually bound to protect your data and use it only for specified purposes.</p>

                        <h3>5.2 Business Transfers</h3>
                        <p>In the event of a merger, acquisition, or sale of assets, your information may be transferred as part of the transaction. We will notify you of any such change.</p>

                        <h3>5.3 Legal Requirements</h3>
                        <p>We may disclose your information if required by law or in response to valid legal processes, such as court orders or subpoenas.</p>

                        <h3>5.4 With Your Consent</h3>
                        <p>We may share your information with third parties when you have given explicit consent.</p>
                    </section>

                    <!-- POINT 523-525: Data Retention -->
                    <section id="data-retention" class="legal-section">
                        <h2>6. Data Retention</h2>
                        <p>We retain your personal information only for as long as necessary to fulfill the purposes outlined in this policy, unless a longer retention period is required by law.</p>

                        <table class="legal-table">
                            <thead>
                                <tr>
                                    <th>Data Type</th>
                                    <th>Retention Period</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Contact form submissions</td>
                                    <td>3 years from submission</td>
                                </tr>
                                <tr>
                                    <td>Newsletter subscriptions</td>
                                    <td>Until unsubscribe or 2 years of inactivity</td>
                                </tr>
                                <tr>
                                    <td>Client project data</td>
                                    <td>Duration of contract + 5 years</td>
                                </tr>
                                <tr>
                                    <td>Website analytics</td>
                                    <td>26 months (anonymized thereafter)</td>
                                </tr>
                                <tr>
                                    <td>Financial records</td>
                                    <td>7 years (legal requirement)</td>
                                </tr>
                            </tbody>
                        </table>

                        <p>After the retention period, data is securely deleted or anonymized.</p>
                    </section>

                    <!-- POINT 526-531: Your Privacy Rights -->
                    <section id="your-rights" class="legal-section">
                        <h2>7. Your Privacy Rights</h2>
                        <p>Depending on your location, you may have the following rights regarding your personal data:</p>

                        <div class="rights-grid">
                            <div class="right-card">
                                <h4>Right to Access</h4>
                                <p>Request a copy of the personal data we hold about you.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Rectification</h4>
                                <p>Request correction of inaccurate or incomplete data.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Erasure</h4>
                                <p>Request deletion of your personal data ("Right to be Forgotten").</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Restrict Processing</h4>
                                <p>Request limitation of how we use your data.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Data Portability</h4>
                                <p>Receive your data in a machine-readable format.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Object</h4>
                                <p>Object to processing based on legitimate interests or for direct marketing.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Withdraw Consent</h4>
                                <p>Withdraw consent at any time where we rely on consent to process.</p>
                            </div>
                            <div class="right-card">
                                <h4>Right to Lodge a Complaint</h4>
                                <p>File a complaint with your local data protection authority.</p>
                            </div>
                        </div>

                        <h3>How to Exercise Your Rights</h3>
                        <p>To exercise any of these rights, please contact us at:</p>
                        <ul>
                            <li><strong>Email:</strong> privacy@vpinternationals.com</li>
                            <li><strong>Mail:</strong> VP Internationals, Data Protection Officer, Business District, City, State, India</li>
                        </ul>
                        <p>We will respond to your request within 30 days. We may need to verify your identity before processing your request.</p>
                    </section>

                    <!-- POINT 532-536: Cookie Policy -->
                    <section id="cookies" class="legal-section">
                        <h2>8. Cookie Policy</h2>
                        <p>Cookies are small text files stored on your device when you visit our Website. We use cookies and similar technologies to:</p>
                        <ul>
                            <li>Ensure the Website functions properly</li>
                            <li>Remember your preferences</li>
                            <li>Analyze traffic and usage patterns</li>
                            <li>Deliver personalized content and advertisements</li>
                        </ul>

                        <h3>8.1 Types of Cookies We Use</h3>
                        <table class="legal-table">
                            <thead>
                                <tr>
                                    <th>Cookie Type</th>
                                    <th>Purpose</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Essential Cookies</strong></td>
                                    <td>Required for basic Website functionality (e.g., session management, security)</td>
                                    <td>Session / 1 year</td>
                                </tr>
                                <tr>
                                    <td><strong>Performance Cookies</strong></td>
                                    <td>Collect anonymous data about how visitors use the Website</td>
                                    <td>2 years</td>
                                </tr>
                                <tr>
                                    <td><strong>Functional Cookies</strong></td>
                                    <td>Remember your preferences and settings</td>
                                    <td>1 year</td>
                                </tr>
                                <tr>
                                    <td><strong>Marketing Cookies</strong></td>
                                    <td>Track visitors to display relevant ads</td>
                                    <td>2 years</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3>8.2 Third-Party Cookies</h3>
                        <p>We use the following third-party services that may set cookies:</p>
                        <ul>
                            <li><strong>Google Analytics:</strong> Website analytics (<a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Privacy Policy</a>)</li>
                            <li><strong>Google Ads:</strong> Advertising (<a href="https://policies.google.com/technologies/ads" target="_blank" rel="noopener">Ad Settings</a>)</li>
                            <li><strong>Facebook Pixel:</strong> Advertising and analytics (<a href="https://www.facebook.com/privacy/explanation" target="_blank" rel="noopener">Privacy Policy</a>)</li>
                            <li><strong>Tawk.to:</strong> Live chat (<a href="https://www.tawk.to/privacy-policy/" target="_blank" rel="noopener">Privacy Policy</a>)</li>
                        </ul>

                        <h3>8.3 Managing Cookies</h3>
                        <p>You can control cookies through:</p>
                        <ul>
                            <li><strong>Cookie Consent Banner:</strong> Manage preferences when you first visit our Website</li>
                            <li><strong>Browser Settings:</strong> Configure your browser to block or delete cookies</li>
                            <li><strong>Opt-Out Links:</strong> Use third-party opt-out tools for specific services</li>
                        </ul>
                        <p>Note: Disabling essential cookies may affect Website functionality.</p>
                    </section>

                    <!-- POINT 537-538: International Data Transfers -->
                    <section id="international" class="legal-section">
                        <h2>9. International Data Transfers</h2>
                        <p>As a global company, we may transfer your personal data to countries outside your country of residence, including India and the United States.</p>

                        <p>When transferring data internationally, we implement appropriate safeguards:</p>
                        <ul>
                            <li>Standard Contractual Clauses (SCCs) approved by the European Commission</li>
                            <li>Data Processing Agreements with all service providers</li>
                            <li>Privacy Shield certification (where applicable)</li>
                            <li>Adequate country determinations</li>
                        </ul>

                        <p>By using our services, you consent to the transfer of your information to countries that may have different data protection laws than your country.</p>
                    </section>

                    <!-- POINT 539-540: Data Security -->
                    <section id="security" class="legal-section">
                        <h2>10. Data Security</h2>
                        <p>We implement industry-standard security measures to protect your personal information:</p>

                        <h3>Technical Measures</h3>
                        <ul>
                            <li>SSL/TLS encryption for all data transmission</li>
                            <li>Secure data storage with encryption at rest</li>
                            <li>Regular security audits and vulnerability assessments</li>
                            <li>Firewall protection and intrusion detection</li>
                            <li>Access controls and authentication systems</li>
                        </ul>

                        <h3>Organizational Measures</h3>
                        <ul>
                            <li>Employee training on data protection</li>
                            <li>Strict access controls on a need-to-know basis</li>
                            <li>Incident response procedures</li>
                            <li>Regular policy reviews and updates</li>
                        </ul>

                        <div class="legal-highlight legal-highlight--warning">
                            <strong>Note:</strong> While we strive to protect your data, no method of transmission over the Internet is 100% secure. We cannot guarantee absolute security but will notify you promptly of any breach that affects your rights.
                        </div>
                    </section>

                    <!-- POINT 541: Children's Privacy -->
                    <section id="children" class="legal-section">
                        <h2>11. Children's Privacy</h2>
                        <p>Our services are intended for business professionals and are not directed at individuals under the age of 18. We do not knowingly collect personal information from children.</p>
                        <p>If we become aware that we have collected data from a child under 18 without parental consent, we will take immediate steps to delete that information. If you believe we may have inadvertently collected such information, please contact us immediately.</p>
                    </section>

                    <!-- POINT 542: Changes to This Policy -->
                    <section id="changes" class="legal-section">
                        <h2>12. Changes to This Policy</h2>
                        <p>We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or for other operational reasons.</p>
                        <p>When we make material changes:</p>
                        <ul>
                            <li>We will update the "Last Updated" date at the top of this page</li>
                            <li>We may notify you by email (if you have provided one)</li>
                            <li>We may display a notice on our Website</li>
                        </ul>
                        <p>We encourage you to review this policy periodically. Your continued use of our services after any changes indicates your acceptance of the updated policy.</p>
                    </section>

                    <!-- POINT 543-544: Contact Us -->
                    <section id="contact" class="legal-section">
                        <h2>13. Contact Us</h2>
                        <p>If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:</p>

                        <div class="contact-info-box">
                            <h3>VP Internationals - Data Protection</h3>
                            <p><strong>Email:</strong> <a href="mailto:privacy@vpinternationals.com">privacy@vpinternationals.com</a></p>
                            <p><strong>General Inquiries:</strong> <a href="mailto:info@vpinternationals.com">info@vpinternationals.com</a></p>
                            <p><strong>Phone:</strong> +91-XXX-XXX-XXXX</p>
                            <p><strong>Address:</strong><br>
                            VP Internationals<br>
                            Attn: Data Protection Officer<br>
                            Business District<br>
                            City, State 000000<br>
                            India</p>
                        </div>

                        <p>For EU residents, you also have the right to lodge a complaint with your local supervisory authority if you believe your data protection rights have been violated.</p>
                    </section>

                </article>
            </div>
        </div>
    </section>

</main>

<!-- ═══════════════════════════════════════════════════════════════ -->
<!-- LEGAL PAGE SPECIFIC STYLES -->
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

/* Legal Highlight Box */
.legal-highlight {
    background: var(--color-primary-light);
    border-left: 4px solid var(--color-primary);
    padding: var(--space-4) var(--space-5);
    border-radius: 0 var(--radius-md) var(--radius-md) 0;
    margin: var(--space-6) 0;
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

/* Legal Table */
.legal-table {
    width: 100%;
    border-collapse: collapse;
    margin: var(--space-6) 0;
    font-size: var(--font-size-sm);
}

.legal-table th,
.legal-table td {
    padding: var(--space-3) var(--space-4);
    text-align: left;
    border: 1px solid var(--color-gray-200);
}

.legal-table th {
    background: var(--color-gray-100);
    font-weight: var(--font-weight-semibold);
    color: var(--color-dark);
}

.legal-table td {
    color: var(--color-gray-700);
}

.legal-table tr:nth-child(even) td {
    background: var(--color-gray-50);
}

/* Rights Grid */
.rights-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: var(--space-4);
    margin: var(--space-6) 0;
}

.right-card {
    background: var(--color-gray-50);
    padding: var(--space-4);
    border-radius: var(--radius-md);
    border: 1px solid var(--color-gray-200);
}

.right-card h4 {
    color: var(--color-primary);
    margin-top: 0;
    margin-bottom: var(--space-2);
}

.right-card p {
    margin-bottom: 0;
    font-size: var(--font-size-sm);
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
