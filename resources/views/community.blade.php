<x-dashboard-layout title="Community">
    <style>
        .community-page { max-width: 980px; margin: 0 auto; display: grid; gap: 1.75rem; }
        .hero-card { background: rgba(15,23,42,0.92); border: 1px solid rgba(148,163,184,0.12); border-radius: 1.25rem; padding: 2rem; }
        .hero-card h1 { font-size: clamp(2rem, 3vw, 3rem); margin-bottom: 0.75rem; }
        .hero-card p { color: rgba(226,232,240,0.82); line-height:1.8; margin-bottom: 1.5rem; }
        .hero-cta { display: inline-flex; align-items: center; gap: 0.75rem; background: linear-gradient(135deg, #ecc879, #ff8d3a); color: #050d19; padding: 1rem 1.4rem; border-radius: 999px; font-weight: 700; text-decoration: none; }
        .hero-cta:hover { opacity: 0.95; }
        .info-grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.25rem; }
        @media (max-width: 760px) { .info-grid { grid-template-columns: 1fr; } }
        .info-card { background: rgba(15,23,42,0.85); border: 1px solid rgba(148,163,184,0.12); border-radius: 1rem; padding: 1.5rem; }
        .info-card h3 { margin-bottom: 0.75rem; font-size: 1.05rem; }
        .info-card p { color: rgba(226,232,240,0.78); line-height: 1.7; }
        .benefits-list { list-style: none; counter-reset: benefit; padding-left: 0; margin-top: 1rem; }
        .benefits-list li { position: relative; padding-left: 3rem; margin-bottom: 1rem; color: rgba(226,232,240,0.88); line-height: 1.75; }
        .benefits-list li::before { counter-increment: benefit; content: counter(benefit); position: absolute; left: 0; top: 0; width: 2.2rem; height: 2.2rem; border-radius: 50%; background: rgba(236,200,121,0.15); color: #ecc879; display: grid; place-items: center; font-weight: 700; }
        .note-box { background: rgba(236,200,121,0.08); border: 1px solid rgba(236,200,121,0.15); border-radius: 1rem; padding: 1.25rem; color: #f8f1d2; }
    </style>

    <div class="community-page">
        <div class="hero-card">
            <h1>Join the community on Telegram</h1>
            <p>Connect with fellow traders, get early product updates, and receive exclusive strategy tips straight from The Real World team. The Telegram channel is where the community discusses market moves, platform features, and wallet leverage ideas.</p>
            <a href="https://t.me/the_real_world" target="_blank" rel="noopener noreferrer" class="hero-cta">Join Our Telegram</a>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <h3>Why join?</h3>
                <p>Our Telegram community is the fastest way to stay in the loop. You’ll see product announcements first, learn about platform updates, and discover new opportunities to use your wallet more effectively.</p>
            </div>
            <div class="info-card">
                <h3>What you gain</h3>
                <ul class="benefits-list">
                    <li>Real-time channel alerts for updates and new features.</li>
                    <li>Community discussions around returns, deposits, and strategy.</li>
                    <li>Access to expert insights from platform moderators.</li>
                    <li>Quick support direction for wallet and account questions.</li>
                </ul>
            </div>
        </div>

        <div class="info-card">
            <h3>How it works</h3>
            <p>Tap the button above to open Telegram. Once inside, you can subscribe to notifications and follow pinned messages for the latest guidance. The channel is a great way to learn from other users and share your own experiences with the platform.</p>
        </div>

        <div class="note-box">
            <strong>Note:</strong> This group is meant for friendly discussion and support. Please keep conversations respectful and avoid sharing sensitive account details in public chat.
        </div>
    </div>
</x-dashboard-layout>
