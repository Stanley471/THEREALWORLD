<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Privacy Policy — The Real World</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --bg-base: #050d19;
                --bg-surface: #081426;
                --text-primary: #f1f5f9;
                --text-muted: #64748b;
                --gold: #ecc879;
                --border: rgba(148, 163, 184, 0.10);
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Figtree', sans-serif;
                background: var(--bg-base);
                color: var(--text-primary);
                line-height: 1.6;
            }

            .policy-container {
                max-width: 900px;
                margin: 0 auto;
                padding: 60px 28px;
            }

            .policy-header {
                margin-bottom: 48px;
                text-align: center;
            }

            .policy-header h1 {
                font-size: 32px;
                font-weight: 700;
                margin-bottom: 12px;
                background: linear-gradient(90deg, var(--gold), #FF8D3A);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .policy-header p {
                color: var(--text-muted);
                font-size: 14px;
            }

            .policy-content {
                background: rgba(8, 20, 38, 0.6);
                border: 1px solid var(--border);
                border-radius: 16px;
                padding: 40px;
                backdrop-filter: blur(20px);
            }

            .policy-section {
                margin-bottom: 32px;
            }

            .policy-section:last-child {
                margin-bottom: 0;
            }

            .policy-section h2 {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 16px;
                color: var(--gold);
            }

            .policy-section h3 {
                font-size: 14px;
                font-weight: 600;
                margin-top: 16px;
                margin-bottom: 10px;
                color: #e2e8f0;
            }

            .policy-section p {
                font-size: 14px;
                line-height: 1.8;
                color: var(--text-muted);
                margin-bottom: 12px;
            }

            .policy-section ul,
            .policy-section ol {
                margin-left: 24px;
                margin-bottom: 12px;
            }

            .policy-section li {
                font-size: 14px;
                line-height: 1.8;
                color: var(--text-muted);
                margin-bottom: 8px;
            }

            .policy-footer {
                margin-top: 48px;
                padding-top: 24px;
                border-top: 1px solid var(--border);
                text-align: center;
            }

            .policy-footer p {
                font-size: 12px;
                color: var(--text-muted);
            }

            .policy-footer a {
                color: var(--gold);
                text-decoration: none;
                font-weight: 600;
            }

            .policy-footer a:hover {
                text-decoration: underline;
            }

            .back-link {
                display: inline-block;
                margin-bottom: 24px;
                font-size: 13px;
                color: var(--gold);
                text-decoration: none;
                font-weight: 600;
            }

            .back-link:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="policy-container">
            <a href="/" class="back-link">← Back to Home</a>

            <div class="policy-header">
                <h1>Privacy Policy</h1>
            </div>

            <div class="policy-content">
                <div class="policy-section">
                    <h2>1. Introduction</h2>
                    <p>The Real World ("we", "our", "us", or "Company") operates the website and platform (collectively, "The Real World" or "Service"). This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>
                </div>

                <div class="policy-section">
                    <h2>2. Information Collection and Use</h2>
                    <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>
                    
                    <h3>2.1 Types of Data Collected</h3>
                    <ul>
                        <li><strong>Personal Data:</strong> While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). This may include but is not limited to:
                            <ul style="margin-top: 8px;">
                                <li>Email address</li>
                                <li>First name and last name</li>
                                <li>Phone number</li>
                                <li>Withdrawal address</li>
                                <li>Cookies and Usage Data</li>
                            </ul>
                        </li>
                        <li><strong>Usage Data:</strong> We may also collect information on how the Service is accessed and used ("Usage Data"). This may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages you visit, the time and date of your visit, the time spent on those pages, and other diagnostic data.</li>
                        <li><strong>Tracking & Cookies Data:</strong> We use cookies and similar tracking technologies to track activity on our Service and hold certain information.</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>3. Use of Data</h2>
                    <p>The Real World uses the collected data for various purposes:</p>
                    <ul>
                        <li>To provide and maintain our Service</li>
                        <li>To notify you about changes to our Service</li>
                        <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                        <li>To provide customer care and support</li>
                        <li>To gather analysis or valuable information so that we can improve our Service</li>
                        <li>To monitor the usage of our Service</li>
                        <li>To detect, prevent and address technical issues and security incidents</li>
                        <li>To provide you with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless you have opted not to receive such information</li>
                    </ul>
                </div>

                <div class="policy-section">
                    <h2>4. Security of Data</h2>
                    <p>The security of your data is important to us, but remember that no method of transmission over the Internet or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>
                </div>

                <div class="policy-section">
                    <h2>5. Changes to This Privacy Policy</h2>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date at the top of this Privacy Policy.</p>
                    <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
                </div>

                <div class="policy-section">
                    <h2>6. Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us through the support channels available on The Real World platform.</p>
                </div>

                <div class="policy-section">
                    <h2>7. Data Subject Rights</h2>
                    <p>You have certain rights regarding your personal data, including:</p>
                    <ul>
                        <li>The right to access the personal data we hold about you</li>
                        <li>The right to correct inaccurate personal data</li>
                        <li>The right to request deletion of your data (subject to certain exceptions)</li>
                        <li>The right to restrict processing of your data</li>
                        <li>The right to data portability</li>
                        <li>The right to opt-out of marketing communications</li>
                    </ul>
                    <p>To exercise any of these rights, please contact us using the details provided in Section 6.</p>
                </div>

                <div class="policy-section">
                    <h2>8. Children's Privacy</h2>
                    <p>Our Service does not address anyone under the age of 13 ("Children"). We do not knowingly collect personally identifiable information from anyone under the age of 13. If you are a parent or guardian and you are aware that your Child has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove such information and terminate the child's account.</p>
                </div>

                <div class="policy-section">
                    <h2>9. Wallet and Transaction Data</h2>
                    <p>The Real World collects and maintains records of all transactions conducted through user wallets, including deposits, withdrawals, and daily return calculations. This data is used to:</p>
                    <ul>
                        <li>Maintain accurate account balances</li>
                        <li>Provide transaction history and reporting</li>
                        <li>Detect and prevent fraudulent activity</li>
                        <li>Comply with platform policies and regulations</li>
                    </ul>
                    <p>All transaction data is stored securely and is not shared with third parties without your explicit consent.</p>
                </div>

                <div class="policy-section">
                    <h2>10. Third-Party Links</h2>
                    <p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
                    <p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>
                </div>

                <div class="policy-section">
                    <h2>11. Changes to Our Service</h2>
                    <p>We may update or change our Service (and any associated data policies) at any time. Your continued use of the Service after any such modifications constitutes your acceptance of the updated Privacy Policy.</p>
                </div>

                <div class="policy-footer">
                    <p>&copy; 2026 The Real World. All rights reserved. | <a href="/">Home</a> | <a href="/privacy">Privacy</a> | <a href="/terms">Terms</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
