@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Vacancies Hero Section --}}
<section class="vacancies-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">{{ __('frontend.breadcrumb.home') }}</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">{{ __('frontend.nav.vacancies') }}</span>
            </div>

            <h1 class="page-title">{{ __('frontend.nav.vacancies') }}</h1>
            <p class="page-subtitle">Присоединяйтесь к команде профессионалов {{ __('frontend.company.name') }} и развивайте свою карьеру в сфере инвестиций и строительства</p>


        </div>
    </div>
</section>

{{-- Main Vacancies Section --}}
<section class="vacancies-main-section">
    <div class="container">
        {{-- Quick Access Card --}}
        <div class="quick-access-card">
            <div class="access-card-content">
                <div class="access-card-info">
                    <div class="access-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                            <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="access-text">
                        <h3 class="access-title">Открытые вакансии на hh.uz</h3>
                        <p class="access-description">Просмотрите актуальные вакансии нашей компании на официальной странице HeadHunter</p>
                        <div class="access-features">
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span class="feature-text">Подробные описания должностей</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span class="feature-text">Онлайн подача резюме</span>
                            </div>
                            <div class="feature-item">
                                <span class="feature-icon">✓</span>
                                <span class="feature-text">Быстрая обратная связь</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="access-card-action">
                    <a href="https://tashkent.hh.uz/search/vacancy?from=employerPage&employer_id=10755963&hhtmFrom=employer"
                       target="_blank"
                       class="access-btn" style="color: white">
                        <span class="btn-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" stroke="currentColor" stroke-width="2"/>
                                <polyline points="15,3 21,3 21,9" stroke="currentColor" stroke-width="2"/>
                                <line x1="10" y1="14" x2="21" y2="3" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </span>
                        <span class="btn-text">Просмотреть вакансии</span>
                        <span class="btn-arrow">→</span>
                    </a>
                    <div class="access-note">
                        <small>Перейти на hh.uz</small>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Optimized Inline Styles --}}
<style>
:root {
    --primary: #0f172a;
    --primary-light: #1e293b;
    --primary-dark: #020617;
    --blue: #3b82f6;
    --blue-light: #60a5fa;
    --success: #10b981;
    --warning: #f59e0b;
    --purple: #8b5cf6;
    --light-bg: #f8fafc;
    --border: #e2e8f0;
    --text: #1e293b;
    --text-light: #64748b;
    --white: #ffffff;
    --shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 25px -3px rgba(0,0,0,0.1);
    --radius: 12px;
    --transition: 0.3s ease;
}

/* Hero Section */
.vacancies-hero {
    position: relative;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 50%, #334155 100%);
    color: var(--white);
    padding: 120px 0 80px;
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.hero-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="vacancies-grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23vacancies-grid)"/></svg>');
    opacity: 0.6;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 30% 70%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
}

.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    max-width: 900px;
    margin: 0 auto;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.breadcrumb {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
    font-size: 0.95rem;
}

.breadcrumb-link {
    color: rgba(255, 255, 255, 0.7);
    text-decoration: none;
    transition: var(--transition);
    padding: 4px 8px;
    border-radius: 6px;
}



.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
}

.breadcrumb-current {
    color: var(--blue-light);
    font-weight: 600;
}

.hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 25px;
    padding: 12px 24px;
    margin-bottom: 32px;
    font-weight: 600;
    font-size: 0.95rem;
}

.badge-icon {
    font-size: 1.2rem;
}

.page-title {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    font-weight: 800;
    margin-bottom: 20px;
    background: linear-gradient(135deg, var(--white) 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    line-height: 1.2;
}

.page-subtitle {
    font-size: clamp(1.1rem, 2.5vw, 1.3rem);
    color: rgba(255, 255, 255, 0.8);
    max-width: 800px;
    margin: 0 auto 60px;
    line-height: 1.6;
}

/* Hero Stats */
.hero-stats {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    margin-top: 60px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 24px 32px;
    transition: var(--transition);
}


.stat-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}

.stat-content {
    text-align: left;
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--white);
    display: block;
    line-height: 1;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* Main Section */
.vacancies-main-section {
    padding: 80px 0;
    background: var(--light-bg);
}

/* Quick Access Card */
.quick-access-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    margin-bottom: 80px;
    overflow: hidden;
    transition: var(--transition);
}


.access-card-content {
    display: flex;
    align-items: center;
    gap: 40px;
    padding: 40px;
}

.access-card-info {
    flex: 1;
    display: flex;
    gap: 20px;
}

.access-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.access-text {
    flex: 1;
}

.access-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.access-description {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 20px;
    line-height: 1.6;
}

.access-features {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 8px;
}



.feature-text {
    font-size: 0.95rem;
    color: var(--text);
}

.access-card-action {
    text-align: center;
    flex-shrink: 0;
}

.access-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    color: var(--white);
    padding: 16px 32px;
    border-radius: var(--radius);
    text-decoration: none;
    font-weight: 600;
    font-size: 1.1rem;
    transition: var(--transition);
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}


.btn-arrow {
    font-size: 1.2rem;
    transition: var(--transition);
}


.access-note {
    margin-top: 12px;
    color: var(--text-light);
    font-size: 0.9rem;
}

/* Why Join Section */
.why-join-section {
    margin-bottom: 80px;
}

.section-header {
    text-align: center;
    margin-bottom: 60px;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.section-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
}

.benefits-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}

.benefit-card {
    background: var(--white);
    padding: 30px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
    text-align: center;
}


.benefit-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--purple) 0%, #7c3aed 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    margin: 0 auto 20px;
}

.benefit-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.benefit-description {
    font-size: 1rem;
    color: var(--text-light);
    line-height: 1.6;
}

/* Job Categories */
.job-categories-section {
    margin-bottom: 80px;
}

.categories-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}

.category-card {
    background: var(--white);
    padding: 30px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
    text-align: center;
    position: relative;
    overflow: hidden;
}

.category-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--purple) 100%);
}



.category-icon {
    font-size: 3rem;
    margin-bottom: 20px;
    display: block;
}

.category-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.category-description {
    font-size: 0.95rem;
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 16px;
}

.category-positions {
    display: inline-block;
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    color: var(--white);
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
}

/* HR Contact Section */
.hr-contact-section {
    margin-top: 60px;
}

.contact-card {
    background: linear-gradient(135deg, var(--white) 0%, var(--light-bg) 100%);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    overflow: hidden;
    border: 1px solid var(--border);
}

.contact-info {
    display: flex;
    align-items: center;
    gap: 30px;
    padding: 40px;
}



.contact-text {
    flex: 1;
}

.contact-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.contact-description {
    font-size: 1.1rem;
    color: var(--text-light);
    margin-bottom: 24px;
    line-height: 1.6;
}

.contact-details {
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 12px;
}

.contact-label {
    font-weight: 600;
    color: var(--text);
    min-width: 120px;
}

.contact-value {
    color: var(--blue);
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .vacancies-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
        margin-bottom: 40px;
    }

    .hero-stats {
        gap: 20px;
        margin-top: 40px;
    }

    .stat-card {
        padding: 16px 20px;
        gap: 12px;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .stat-label {
        font-size: 0.85rem;
    }

    .access-card-content {
        flex-direction: column;
        gap: 30px;
        padding: 30px;
        text-align: center;
    }

    .access-card-info {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .access-icon {
        width: 60px;
        height: 60px;
    }

    .access-title {
        font-size: 1.5rem;
    }

    .access-description {
        font-size: 1rem;
    }

    .benefits-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .benefit-card {
        padding: 24px;
    }

    .benefit-icon {
        width: 60px;
        height: 60px;
    }

    .categories-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .category-card {
        padding: 24px;
    }

    .contact-info {
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 30px;
    }

    .contact-icon {
        width: 60px;
        height: 60px;
    }

    .contact-details {
        align-items: center;
    }

    .contact-item {
        flex-direction: column;
        gap: 4px;
        text-align: center;
    }

    .contact-label {
        min-width: auto;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .vacancies-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .hero-badge {
        font-size: 0.85rem;
        padding: 8px 16px;
    }

    .hero-stats {
        flex-direction: column;
        gap: 16px;
        margin-top: 30px;
    }

    .stat-card {
        padding: 12px 16px;
    }

    .access-card-content {
        padding: 20px;
    }

    .access-title {
        font-size: 1.3rem;
    }

    .access-btn {
        padding: 12px 24px;
        font-size: 1rem;
    }

    .section-title {
        font-size: 2rem;
    }

    .section-subtitle {
        font-size: 1rem;
    }

    .benefit-card,
    .category-card {
        padding: 20px;
    }

    .benefit-title,
    .category-title {
        font-size: 1.2rem;
    }

    .contact-info {
        padding: 20px;
    }

    .contact-title {
        font-size: 1.5rem;
    }

    .contact-description {
        font-size: 1rem;
    }
}

/* Animations */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromLeft {
    from {
        opacity: 0;
        transform: translateX(-30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInFromRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.quick-access-card {
    animation: slideInFromLeft 0.8s ease-out;
}

.benefit-card {
    animation: fadeInUp 0.6s ease-out;
}

.benefit-card:nth-child(1) { animation-delay: 0.1s; }
.benefit-card:nth-child(2) { animation-delay: 0.2s; }
.benefit-card:nth-child(3) { animation-delay: 0.3s; }
.benefit-card:nth-child(4) { animation-delay: 0.4s; }
.benefit-card:nth-child(5) { animation-delay: 0.5s; }
.benefit-card:nth-child(6) { animation-delay: 0.6s; }

.category-card {
    animation: fadeInUp 0.6s ease-out;
}

.category-card:nth-child(1) { animation-delay: 0.7s; }
.category-card:nth-child(2) { animation-delay: 0.8s; }
.category-card:nth-child(3) { animation-delay: 0.9s; }
.category-card:nth-child(4) { animation-delay: 1.0s; }
.category-card:nth-child(5) { animation-delay: 1.1s; }

.contact-card {
    animation: slideInFromRight 0.8s ease-out 1.2s both;
}

/* Print Styles */
@media print {
    .vacancies-hero {
        background: var(--white) !important;
        color: var(--text) !important;
        padding: 40px 0 20px;
    }

    .hero-stats {
        display: none;
    }

    .access-btn {
        display: none;
    }

    .benefit-card,
    .category-card {
        break-inside: avoid;
        margin-bottom: 20px;
        box-shadow: none;
        border: 1px solid var(--border);
    }

    .contact-card {
        page-break-inside: avoid;
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .benefit-card,
    .category-card,
    .contact-card {
        border: 2px solid var(--text);
    }

    .access-btn {
        border: 2px solid var(--white);
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
}
</style>

{{-- Optimized JavaScript --}}
<script>
(function() {
    'use strict';

    // Performance monitoring
    const perf = {
        start: performance.now(),
        log: function(label) {
            console.log(`[${label}] ${(performance.now() - this.start).toFixed(2)}ms`);
        }
    };

    // Enhanced hover effects for cards
    const cards = document.querySelectorAll('.benefit-card, .category-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });

    // Access button click tracking
    const accessBtn = document.querySelector('.access-btn');
    if (accessBtn) {
        accessBtn.addEventListener('click', function() {
            console.log('HeadHunter link clicked');

            // Add click feedback
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    }

    // Intersection Observer for animations
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe animated elements
        const animatedElements = document.querySelectorAll('.benefit-card, .category-card, .contact-card');
        animatedElements.forEach((element, index) => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
            observer.observe(element);
        });

        perf.log('Animation Observer Setup');
    }

    // Accessibility enhancements
    cards.forEach((card, index) => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'article');

        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                // Add focus feedback
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = '';
                }, 150);
            }
        });

        card.addEventListener('focus', function() {
            this.style.outline = '3px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });

        card.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Feature items hover effects
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px)';
            this.style.background = 'rgba(16, 185, 129, 0.1)';
            this.style.borderRadius = '6px';
            this.style.padding = '4px 8px';
        });

        item.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.background = '';
            this.style.borderRadius = '';
            this.style.padding = '';
        });
    });

    // Contact items copy functionality
    const contactValues = document.querySelectorAll('.contact-value');
    contactValues.forEach(value => {
        value.addEventListener('click', function() {
            if (navigator.clipboard) {
                navigator.clipboard.writeText(this.textContent).then(() => {
                    // Visual feedback
                    const original = this.style.color;
                    this.style.color = '#10b981';
                    this.style.fontWeight = '700';

                    setTimeout(() => {
                        this.style.color = original;
                        this.style.fontWeight = '';
                    }, 1000);

                    console.log('Contact info copied:', this.textContent);
                });
            }
        });

        value.style.cursor = 'pointer';
        value.title = 'Нажмите для копирования';
    });

    // Performance monitoring
    window.addEventListener('load', () => {
        const loadTime = performance.now();
        perf.log('Total Load Time');
        console.log(`💼 Vacancies page loaded successfully in ${loadTime.toFixed(2)}ms`);

        // Report performance metrics
        if ('getEntriesByType' in performance) {
            const paintMetrics = performance.getEntriesByType('paint');
            paintMetrics.forEach(metric => {
                console.log(`${metric.name}: ${metric.startTime.toFixed(2)}ms`);
            });
        }
    });

    // Export functions for debugging
    window.vacanciesPage = {
        highlightBenefits: () => {
            const benefits = document.querySelectorAll('.benefit-card');
            benefits.forEach(card => {
                card.style.border = '3px solid #10b981';
                setTimeout(() => {
                    card.style.border = '';
                }, 2000);
            });
        },
        highlightCategories: () => {
            const categories = document.querySelectorAll('.category-card');
            categories.forEach(card => {
                card.style.border = '3px solid #3b82f6';
                setTimeout(() => {
                    card.style.border = '';
                }, 2000);
            });
        },
        logMetrics: () => {
            console.log({
                totalBenefits: document.querySelectorAll('.benefit-card').length,
                totalCategories: document.querySelectorAll('.category-card').length,
                loadTime: performance.now(),
                userAgent: navigator.userAgent
            });
        }
    };

    perf.log('Script Initialization Complete');

})();
</script>

@endsection
