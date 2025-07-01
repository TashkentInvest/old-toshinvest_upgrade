@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Supervisory Board Hero Section --}}
<section class="board-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Наблюдательный совет</span>
            </div>

            <h1 class="page-title">Наблюдательный совет</h1>
            <p class="page-subtitle">Руководящий орган АО «Компания Ташкент Инвест», обеспечивающий стратегическое управление и контроль деятельности компании</p>
        </div>
    </div>
</section>

{{-- Board Members Section --}}
<section class="board-members-section">
    <div class="container">
        <div class="members-grid">
            {{-- Chairman --}}
            <article class="member-card chairman">
                <div class="member-badge">
                    <span class="badge-text">Председатель</span>
                    <span class="badge-icon"></span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{asset('assets/users_img/1.Умурзаков Шавкат Буранович.jpg')}}"
                             alt="Умурзаков Шавкат Буранович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Умурзаков Шавкат Буранович</h3>
                    <div class="member-position">
                        <div class="position-title">Председатель наблюдательного совета</div>
                        <div class="position-subtitle">Хоким города Ташкента</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                </div>
            </article>

            {{-- Members --}}
            <article class="member-card">
                <div class="member-badge">
                    <span class="badge-text">Член совета</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{ asset('images/Б.Х. Хайдаров фото1.jpg') }}"
                             alt="Хайдаров Бахтиёр Халимович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Хайдаров Бахтиёр Халимович</h3>
                    <div class="member-position">
                        <div class="position-title">Член наблюдательного совета</div>
                        <div class="position-subtitle">Первый заместитель Хокима города Ташкента</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                </div>
            </article>

            <article class="member-card">
                <div class="member-badge">
                    <span class="badge-text">Член совета</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{asset('assets/users_img/3.Рахманов Шароф Диерович.jpg')}}"
                             alt="Рахманов Шароф Диерович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Рахманов Шароф Диерович</h3>
                    <div class="member-position">
                        <div class="position-title">Член наблюдательного совета</div>
                        <div class="position-subtitle">Заместитель Хокима города Ташкента</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                </div>
            </article>

            <article class="member-card">
                <div class="member-badge">
                    <span class="badge-text">Член совета</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{asset('assets/users_img/4.Тогаев Наби Исмоилович.jpg')}}"
                             alt="Тогаев Наби Исмоилович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Тогаев Наби Исмоилович</h3>
                    <div class="member-position">
                        <div class="position-title">Член наблюдательного совета</div>
                        <div class="position-subtitle">Начальник отдела ООО «Узбекско-Оманская Инвестиционная Компания»</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                </div>
            </article>

            <article class="member-card">
                <div class="member-badge">
                    <span class="badge-text">Член совета</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="https://static.tildacdn.one/tild6430-6239-4361-b062-313631343137/_-2.jpg"
                             alt="Прияткин Алексей Николаевич"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Прияткин Алексей Николаевич</h3>
                    <div class="member-position">
                        <div class="position-title">Член наблюдательного совета</div>
                        <div class="position-subtitle">Партнер Компании «Orbita Capital Partners» (Российская Федерация)</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                </div>
            </article>
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
.board-hero {
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="board-grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23board-grid)"/></svg>');
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

.breadcrumb-link:hover {
    color: var(--blue-light);
    background: rgba(255, 255, 255, 0.1);
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
    margin: 0 auto;
    line-height: 1.6;
}

/* Board Members Section */
.board-members-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.members-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 40px;
    margin-bottom: 80px;
}

/* Member Card */
.member-card {
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow);
    transition: var(--transition);
    position: relative;
    border: 1px solid var(--border);
}

.member-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-lg);
}

.member-card.chairman {
    border-left: 6px solid #fbbf24;
    background: linear-gradient(135deg, rgba(251, 191, 36, 0.02) 0%, rgba(251, 191, 36, 0.05) 100%);
}

.member-badge {
    position: absolute;
    top: 16px;
    right: 16px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 6px 12px;
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text);
    z-index: 2;
}

.member-card.chairman .member-badge {
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
    color: var(--white);
    border-color: #fbbf24;
}

.member-photo {
    position: relative;
    height: 280px;
    overflow: hidden;
}

.photo-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
}

.member-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: var(--transition);
}

.member-card:hover .member-image {
    transform: scale(1.05);
}

.photo-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background: linear-gradient(transparent, rgba(0, 0, 0, 0.6));
    opacity: 0;
    transition: var(--transition);
}

.member-card:hover .photo-overlay {
    opacity: 1;
}

.member-info {
    padding: 24px;
}

.member-name {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
    line-height: 1.3;
}

.member-position {
    margin-bottom: 16px;
}

.position-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--blue);
    margin-bottom: 4px;
}

.position-subtitle {
    font-size: 0.9rem;
    color: var(--text-light);
    line-height: 1.4;
}

.member-status {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    background: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.2);
    border-radius: 20px;
    width: fit-content;
}

.status-indicator {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--success);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.status-text {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--success);
}

/* Board Info */
.board-info {
    margin-top: 60px;
}

.info-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
}

.info-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--white);
    padding: 24px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.info-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.info-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.info-content {
    flex: 1;
}

.info-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text);
    line-height: 1;
    margin-bottom: 4px;
}

.info-label {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .board-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
    }

    .members-grid {
        grid-template-columns: 1fr;
        gap: 30px;
        margin-bottom: 60px;
    }

    .member-photo {
        height: 240px;
    }

    .member-info {
        padding: 20px;
    }

    .member-name {
        font-size: 1.2rem;
    }

    .info-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .info-card {
        padding: 20px;
    }

    .info-icon {
        width: 48px;
        height: 48px;
    }

    .info-number {
        font-size: 1.8rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .board-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .hero-badge {
        font-size: 0.85rem;
        padding: 8px 16px;
    }

    .member-photo {
        height: 200px;
    }

    .member-info {
        padding: 16px;
    }

    .member-name {
        font-size: 1.1rem;
    }

    .position-title {
        font-size: 0.9rem;
    }

    .position-subtitle {
        font-size: 0.8rem;
    }

    .info-card {
        flex-direction: column;
        text-align: center;
        padding: 16px;
    }

    .info-content {
        margin-top: 8px;
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

.member-card {
    animation: fadeInUp 0.6s ease-out;
}

.member-card:nth-child(1) { animation-delay: 0.1s; }
.member-card:nth-child(2) { animation-delay: 0.2s; }
.member-card:nth-child(3) { animation-delay: 0.3s; }
.member-card:nth-child(4) { animation-delay: 0.4s; }
.member-card:nth-child(5) { animation-delay: 0.5s; }

.info-card {
    animation: fadeInUp 0.6s ease-out 0.6s both;
}

.info-card:nth-child(1) { animation-delay: 0.7s; }
.info-card:nth-child(2) { animation-delay: 0.8s; }
.info-card:nth-child(3) { animation-delay: 0.9s; }

/* Print Styles */
@media print {
    .board-hero {
        background: var(--white) !important;
        color: var(--text) !important;
        padding: 40px 0 20px;
    }

    .member-card {
        break-inside: avoid;
        margin-bottom: 20px;
        box-shadow: none;
        border: 1px solid var(--border);
    }

    .member-photo {
        height: 200px;
    }

    .info-cards {
        display: none;
    }
}
</style>

{{-- Optimized JavaScript --}}
<script>
(function() {
    'use strict';

    // Image loading optimization
    const images = document.querySelectorAll('.member-image');

    // Lazy loading fallback for older browsers
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.addEventListener('load', function() {
                        this.style.opacity = '1';
                        this.style.transform = 'scale(1)';
                    });

                    img.addEventListener('error', function() {
                        this.style.display = 'none';
                        const placeholder = document.createElement('div');
                        placeholder.className = 'image-placeholder';
                        placeholder.style.cssText = `
                            width: 100%;
                            height: 100%;
                            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #64748b;
                            font-size: 2rem;
                        `;
                        placeholder.innerHTML = '👤';
                        this.parentNode.appendChild(placeholder);
                    });

                    imageObserver.unobserve(img);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '50px'
        });

        images.forEach(img => {
            img.style.opacity = '0';
            img.style.transform = 'scale(1.1)';
            img.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            imageObserver.observe(img);
        });
    } else {
        // Fallback for older browsers
        images.forEach((img, index) => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });

            img.addEventListener('error', function() {
                this.style.display = 'none';
            });
        });
    }

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

    // Performance monitoring
    if (window.performance) {
        window.addEventListener('load', () => {
            const loadTime = performance.now();
            console.log(`Board page loaded in ${loadTime.toFixed(2)}ms`);
        });
    }

    // Accessibility enhancements
    const memberCards = document.querySelectorAll('.member-card');
    memberCards.forEach(card => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'article');

        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.classList.toggle('focused');
            }
        });

        card.addEventListener('focus', function() {
            this.style.outline = '2px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });

        card.addEventListener('blur', function() {
            this.style.outline = '';
            this.style.outlineOffset = '';
        });
    });

    console.log('🏛️ Supervisory Board page initialized successfully');

})();
</script>

@endsection
