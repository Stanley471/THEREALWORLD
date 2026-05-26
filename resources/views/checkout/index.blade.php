<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join The Real World App | Sign Up Today</title>
        <meta name="description" content="Join 155,000+ members learning to build real income online. 12+ wealth creation methods taught by millionaire professors. Start for $99/month">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
                background: #02040E;
                color: white;
                line-height: 1.5;
            }
            
            main {
                width: 100%;
                min-height: 100vh;
                position: relative;
                padding: 2rem 1rem;
            }
            
            .container {
                max-width: 1200px;
                margin: 0 auto;
            }
            
            .header {
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .logo {
                max-width: 80px;
                height: auto;
                margin: 0 auto 1rem;
            }
            
            @media (max-width: 768px) {
                .logo {
                    max-width: 40px;
                }
            }
            
            .header h1 {
                font-size: 3.75rem;
                font-weight: bold;
                margin-bottom: 1rem;
                text-transform: uppercase;
            }
            
            @media (max-width: 768px) {
                .header h1 {
                    font-size: 2rem;
                    display: none;
                }
            }
            
            .header p {
                font-size: 3.75rem;
                font-weight: bold;
                text-transform: capitalize;
                line-height: 1.2;
            }
            
            @media (max-width: 768px) {
                .header p {
                    font-size: 2rem;
                }
            }
            
            .toggle-section {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1rem;
                padding: 1rem;
                margin: 2rem 0;
                background: rgba(30, 32, 42, 0.25);
                border-top: 1px solid #1E202A;
                border-bottom: 1px solid #1E202A;
            }
            
            @media (min-width: 1024px) {
                .toggle-section {
                    background: transparent;
                    border: none;
                }
            }
            
            .toggle-section p {
                font-size: 1.375rem;
                font-weight: bold;
                margin: 0;
            }
            
            .toggle-switch {
                width: 80px;
                height: auto;
                border: 1px solid rgba(255, 255, 255, 0.15);
                padding: 4px;
                border-radius: 50px;
                display: flex;
                justify-content: flex-start;
                background: linear-gradient(180deg, #1E2E3C 0%, #0E1923 100%);
                cursor: pointer;
                transition: all 0.25s ease;
            }
            .toggle-switch.yearly {
                justify-content: flex-end;
            }
            
            .toggle-switch-circle {
                width: 32px;
                height: 32px;
                border-radius: 50%;
                background: linear-gradient(109.78deg, #FFFFFF -13.37%, #FFCF23 38.96%, #FF8D3A 138.03%);
                border: 1px solid rgba(88, 99, 109, 0.41);
                transition: transform 0.25s ease;
            }
            .plan-button {
                width: 100%; border-radius: 0.85rem; padding: 1rem 1.25rem; font-weight: 700;
                border: none; cursor: pointer; transition: transform 0.2s ease;
                text-decoration: none;
            }
            
            .plans-grid {
                display: grid;
                grid-template-columns: 1fr;
                gap: 1.5rem;
                margin: 2rem 0;
            }
            
            @media (min-width: 1024px) {
                .plans-grid {
                    grid-template-columns: repeat(2, 1fr);
                    gap: 3rem;
                }
            }
            
            .plan-card {
                border: 1px solid;
                border-radius: 1rem;
                padding: 1.5rem;
                position: relative;
                display: flex;
                flex-direction: column;
                min-height: 500px;
            }
            
            .plan-card.conquer {
                border-color: #ffa023;
            }
            
            .plan-card.vanguard {
                border-color: #970008;
                opacity: 0.6;
            }
            
            .plan-card.vanguard .sold-out-banner {
                position: absolute;
                top: 0;
                right: 0;
                background: linear-gradient(to right, #dc2626, #ef4444);
                color: white;
                padding: 0.5rem 0.75rem;
                border-radius: 0 0 0 1rem;
                font-weight: bold;
                font-size: 0.875rem;
            }
            
            .plan-header {
                margin-bottom: 1.5rem;
            }
            
            .plan-name {
                font-size: 1.375rem;
                font-weight: bold;
                text-transform: uppercase;
                margin-bottom: 0.5rem;
                background: linear-gradient(109.78deg, #FFFFFF -13.37%, #FFCF23 38.96%, #FF8D3A 138.03%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            
            .plan-card.vanguard .plan-name {
                color: #B7B6B7;
                background: none;
                -webkit-text-fill-color: unset;
            }
            
            .plan-price {
                font-size: 3.75rem;
                font-weight: bold;
                margin-bottom: 0.5rem;
            }
            
            @media (max-width: 768px) {
                .plan-price {
                    font-size: 2.75rem;
                }
            }
            
            .plan-price-currency {
                font-size: 1.75rem;
            }
            
            .plan-price-period {
                font-size: 1.375rem;
                color: rgba(255, 255, 255, 0.7);
                text-transform: uppercase;
            }
            
            @media (max-width: 768px) {
                .plan-price-period {
                    font-size: 1rem;
                    display: inline;
                    margin-left: 0.5rem;
                }
            }
            
            .features {
                flex: 1;
                margin-bottom: 1.5rem;
            }
            
            .feature-item {
                display: flex;
                align-items: flex-start;
                gap: 0.5rem;
                margin-bottom: 1rem;
                font-size: 0.875rem;
            }
            
            @media (min-width: 768px) {
                .feature-item {
                    font-size: 1rem;
                }
            }
            
            .feature-icon {
                width: 16px;
                height: 16px;
                flex-shrink: 0;
                margin-top: 2px;
                color: #29E517;
            }
            
            .plan-card.vanguard .feature-icon {
                color: #6b7280;
            }
            
            .plan-button {
                padding: 0.75rem 1rem;
                border: 1px solid;
                border-radius: 0.5rem;
                font-size: 1rem;
                font-weight: bold;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.75rem;
                width: 100%;
            }
            
            .plan-button.conquer {
                background: #FF8D3A;
                border-color: #FF8D3A;
                color: white;
            }
            
            .plan-button.conquer:hover {
                background: #ff7d1f;
                transform: scale(1.05);
            }
            
            .plan-button.vanguard {
                background: #24374940;
                border-color: #243749;
                color: rgba(255, 255, 255, 0.5);
                cursor: not-allowed;
                pointer-events: none;
            }
            
            .button-icon {
                width: 24px;
                height: 24px;
            }
            
            .student-badge {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 1rem;
                padding: 2rem 0;
                text-align: center;
            }
            
            @media (min-width: 1024px) {
                .student-badge {
                    flex-direction: row;
                }
            }
            
            .student-badge img {
                height: 35px;
                width: auto;
            }
            
            .student-badge p {
                margin: 0;
                font-weight: bold;
                font-size: 0.875rem;
            }
            
            @media (min-width: 1024px) {
                .student-badge p {
                    font-size: 1.25rem;
                }
            }
            
            .student-count {
                color: #FFCF23;
            }
            
            .footer-text {
                text-align: center;
                color: rgba(255, 255, 255, 0.6);
                font-size: 0.875rem;
                margin-top: 1rem;
            }
            
            .yearly-badge {
                font-size: 0.875rem;
                color: #29E517;
            }
            
            @media (min-width: 1024px) {
                .yearly-badge {
                    display: inline;
                }
            }
            
            @media (max-width: 1023px) {
                .yearly-badge {
                    display: inline;
                }
            }
        </style>
    </head>
<body>
    <main>
        <div class="container">
            <!-- Header -->
            <div class="header">
                <img src="{{ asset('images/logo.webp') }}" alt="The Real World Logo" class="logo" />
                <h1>The Real World</h1>
                <p>choose your path to success</p>
            </div>

            <!-- Monthly/Yearly Toggle -->
            <div class="toggle-section">
                <p>Monthly</p>
                <div class="toggle-switch">
                    <div class="toggle-switch-circle"></div>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255, 255, 255, 0.7); font-size: 1.375rem;">
                    <p style="margin: 0;">Yearly</p>
                    <span class="yearly-badge">(17% off)</span>
                </div>
            </div>

            <!-- Plans Grid -->
            <div class="plans-grid">
                <!-- Conquer Plan -->
                <div class="plan-card conquer" data-plan="conquer" data-monthly="99" data-yearly="988">
                    <div class="plan-header">
                        <div class="plan-name">Conquer</div>
                        <div>
                            <div class="plan-price">
                                <span class="plan-price-currency">$</span><span class="plan-price-value">99</span><span class="plan-price-period">/month</span>
                            </div>
                        </div>
                    </div>

                    <div class="features">
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Access to all 12 business models</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>VIP account ranking</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>7 connected devices</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Step-by-step learning & priority support</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Daily course updates & live broadcasts</span>
                        </div>
                    </div>

                    <div style="display:flex;flex-direction:column;gap:0.75rem;">
                        <a href="{{ route('wallet.deposit', ['payment_method' => 'card', 'plan' => 'conquer', 'billing' => 'monthly']) }}" class="plan-button conquer payment-link" data-method="card" data-plan="conquer">
                            <svg class="button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect width="20" height="14" x="2" y="5" rx="2"></rect>
                                <line x1="2" x2="22" y1="10" y2="10"></line>
                            </svg>
                            Join with Card
                        </a>
                        <a href="{{ route('wallet.deposit', ['payment_method' => 'crypto', 'plan' => 'conquer', 'billing' => 'monthly']) }}" class="plan-button crypto payment-link" data-method="crypto" data-plan="conquer" style="justify-content:center;">
                            <svg class="button-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 3l1.5 5H20l-4.5 3.25L16 17l-4 2.75L8 17l1.5-5L5 8h6.5L12 3z" />
                            </svg>
                            Join with Crypto
                        </a>
                    </div>
                </div>

                <!-- Vanguard Plan -->
                <div class="plan-card vanguard" data-plan="vanguard" data-monthly="499" data-yearly="4970">
                    <div class="sold-out-banner">SOLD OUT</div>
                    <div class="plan-header">
                        <div class="plan-name">Vanguard</div>
                        <div>
                            <div class="plan-price">
                                <span class="plan-price-currency">$</span><span class="plan-price-value">499</span><span class="plan-price-period">/month</span>
                            </div>
                        </div>
                    </div>

                    <div class="features">
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Everything in Conquer</span>
                        </div>
                        <div class="feature-item">
                            <svg class="feature-icon" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Experimental Feature Access</span>
                        </div>
                    </div>

                    <button class="plan-button vanguard" disabled>
                        Sold Out
                    </button>
                </div>
            </div>

            <!-- Student Badge -->
            <div class="student-badge">
                <img src="{{ asset('images/student_profiles.png') }}" alt="Student Profiles" />
                <p>Join <span class="student-count">155,000+</span> members already leveling up inside</p>
            </div>

            <div class="footer-text">*All Prices Are Presented In USD.</div>
        </div>
    </main>
    <script>
        (function () {
            const toggle = document.querySelector('.toggle-switch');
            const periodText = document.querySelector('.plan-price-period');
            const planCards = document.querySelectorAll('.plan-card');
            const paymentLinks = document.querySelectorAll('.payment-link');
            let billing = 'monthly';

            const planData = {
                conquer: { monthly: { price: '99', period: '/month' }, yearly: { price: '988', period: '/year' } },
                vanguard: { monthly: { price: '499', period: '/month' }, yearly: { price: '4970', period: '/year' } },
            };

            function updateBilling(newBilling) {
                billing = newBilling;
                toggle.classList.toggle('yearly', billing === 'yearly');

                planCards.forEach(card => {
                    const plan = card.dataset.plan;
                    const data = planData[plan]?.[billing];
                    if (!data) return;
                    card.querySelector('.plan-price-value').textContent = data.price;
                    card.querySelector('.plan-price-period').textContent = data.period;
                });

                paymentLinks.forEach(link => {
                    const url = new URL(link.href, window.location.origin);
                    url.searchParams.set('billing', billing);
                    link.href = url.toString();
                });
            }

            toggle.addEventListener('click', function () {
                updateBilling(billing === 'monthly' ? 'yearly' : 'monthly');
            });

            updateBilling('monthly');
        })();
    </script>
</body>
</html>
