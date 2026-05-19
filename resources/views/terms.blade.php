<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Terms & Conditions — The Real World</title>

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

            .terms-container {
                max-width: 900px;
                margin: 0 auto;
                padding: 60px 28px;
            }

            .terms-header {
                margin-bottom: 48px;
                text-align: center;
            }

            .terms-header h1 {
                font-size: 32px;
                font-weight: 700;
                margin-bottom: 12px;
                background: linear-gradient(90deg, var(--gold), #FF8D3A);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .terms-header p {
                color: var(--text-muted);
                font-size: 14px;
            }

            .terms-content {
                background: rgba(8, 20, 38, 0.6);
                border: 1px solid var(--border);
                border-radius: 16px;
                padding: 40px;
                backdrop-filter: blur(20px);
            }

            .terms-section {
                margin-bottom: 32px;
            }

            .terms-section:last-child {
                margin-bottom: 0;
            }

            .terms-section h2 {
                font-size: 18px;
                font-weight: 700;
                margin-bottom: 16px;
                color: var(--gold);
            }

            .terms-section h3 {
                font-size: 14px;
                font-weight: 600;
                margin-top: 16px;
                margin-bottom: 10px;
                color: #e2e8f0;
            }

            .terms-section p {
                font-size: 14px;
                line-height: 1.8;
                color: var(--text-muted);
                margin-bottom: 12px;
            }

            .terms-section ul,
            .terms-section ol {
                margin-left: 24px;
                margin-bottom: 12px;
            }

            .terms-section li {
                font-size: 14px;
                line-height: 1.8;
                color: var(--text-muted);
                margin-bottom: 8px;
            }

            .terms-footer {
                margin-top: 48px;
                padding-top: 24px;
                border-top: 1px solid var(--border);
                text-align: center;
            }

            .terms-footer p {
                font-size: 12px;
                color: var(--text-muted);
            }

            .terms-footer a {
                color: var(--gold);
                text-decoration: none;
                font-weight: 600;
            }

            .terms-footer a:hover {
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
        <div class="terms-container">
            <a href="/" class="back-link">← Back to Home</a>

            <div class="terms-header">
                <h1>Terms & Conditions</h1>
            </div>

            <div class="terms-content">
                <div class="terms-section">
                    <h2>1. Agreement to Terms</h2>
                    <p>By accessing and using this website and platform (The Real World), you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to abide by the above, please do not use this service.</p>
                </div>

                <div class="terms-section">
                    <h2>2. Use License</h2>
                    <p>Permission is granted to temporarily download one copy of the materials (information or software) on The Real World's website and platform for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
                    <ul>
                        <li>Modifying or copying the materials</li>
                        <li>Using the materials for any commercial purpose or for any public display (commercial or non-commercial)</li>
                        <li>Attempting to decompile or reverse engineer any software contained on The Real World's website</li>
                        <li>Removing any copyright or other proprietary notations from the materials</li>
                        <li>Transferring the materials to another person or "mirroring" the materials on any other server</li>
                        <li>Attempting to gain unauthorized access to restricted portions or features of The Real World</li>
                        <li>Harassing, abusing, or otherwise violating the rights of other users</li>
                    </ul>
                </div>

                <div class="terms-section">
                    <h2>3. Disclaimer</h2>
                    <p>The materials on The Real World's website and platform are provided on an 'as is' basis. The Real World makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                </div>

                <div class="terms-section">
                    <h2>4. Limitations</h2>
                    <p>In no event shall The Real World or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on The Real World's website and platform, even if The Real World or a The Real World authorized representative has been notified orally or in writing of the possibility of such damage.</p>
                </div>

                <div class="terms-section">
                    <h2>5. Accuracy of Materials</h2>
                    <p>The materials appearing on The Real World's website and platform could include technical, typographical, or photographic errors. The Real World does not warrant that any of the materials on its website and platform are accurate, complete, or current. The Real World may make changes to the materials contained on its website and platform at any time without notice.</p>
                </div>

                <div class="terms-section">
                    <h2>6. Links</h2>
                    <p>The Real World has not reviewed all of the sites linked to its website and platform and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by The Real World of the site. Use of any such linked website is at the user's own risk.</p>
                </div>

                <div class="terms-section">
                    <h2>7. Modifications</h2>
                    <p>The Real World may revise these terms of service for its website and platform at any time without notice. By using this website and platform, you are agreeing to be bound by the then current version of these terms of service.</p>
                </div>

                <div class="terms-section">
                    <h2>8. Governing Law</h2>
                    <p>These terms and conditions are governed by and construed in accordance with the laws of your jurisdiction, and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
                </div>

                <div class="terms-section">
                    <h2>9. User Accounts</h2>
                    <p>If you create an account on The Real World platform, you are responsible for maintaining the confidentiality of your account information and password and for restricting access to your computer. You agree to accept responsibility for all activities that occur under your account or password. You must notify us immediately of any unauthorized uses of your account.</p>
                </div>

                <div class="terms-section">
                    <h2>10. Wallet & Transactions</h2>
                    <p>Users acknowledge that transactions on The Real World are simulated and educational in nature. All transactions, deposits, withdrawals, and daily returns are not real financial transactions and hold no real monetary value.</p>
                    <ul>
                        <li>All wallet balances are virtual and used for demonstration purposes only</li>
                        <li>Daily returns are automatically calculated and applied based on admin-assigned percentages</li>
                        <li>Users may request withdrawal of funds via their configured withdrawal address, subject to platform policies</li>
                        <li>The Real World reserves the right to modify wallet balances or transaction records if unauthorized activity is detected</li>
                    </ul>
                </div>

                <div class="terms-section">
                    <h2>11. Prohibited Activities</h2>
                    <p>Users agree not to engage in any of the following prohibited activities:</p>
                    <ul>
                        <li>Attempting to circumvent security measures or access restricted features</li>
                        <li>Providing false or misleading information in account registration</li>
                        <li>Engaging in any form of harassment, abuse, or discrimination</li>
                        <li>Uploading or transmitting viruses, malware, or any code of destructive nature</li>
                        <li>Attempting to gain unauthorized access to The Real World systems or other users' accounts</li>
                        <li>Scraping or harvesting data from the platform without authorization</li>
                    </ul>
                </div>

                <div class="terms-section">
                    <h2>12. Limitation of Liability</h2>
                    <p>The Real World shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the website and platform, even if we have been advised of the possibility of such damages.</p>
                </div>

                <div class="terms-section">
                    <h2>13. Indemnification</h2>
                    <p>You agree to indemnify, defend, and hold harmless The Real World, its owners, operators, and employees from any and all claims, demands, liabilities, costs, or expenses (including reasonable attorneys' fees) arising out of or related to your use of the website and platform or your violation of these terms and conditions.</p>
                </div>

                <div class="terms-section">
                    <h2>14. Termination</h2>
                    <p>The Real World may terminate or suspend your account and access to the website and platform at any time, without prior notice or liability, if you breach any of the terms or conditions of this agreement or if we determine, in our sole discretion, that your conduct is harmful to other users or The Real World.</p>
                </div>

                <div class="terms-section">
                    <h2>15. Contact Information</h2>
                    <p>If you have any questions about these Terms and Conditions, please contact us through the support channels available on The Real World platform.</p>
                </div>

                <div class="terms-footer">
                    <p>&copy; 2026 The Real World. All rights reserved. | <a href="/">Home</a> | <a href="/terms">Terms</a></p>
                </div>
            </div>
        </div>
    </body>
</html>
