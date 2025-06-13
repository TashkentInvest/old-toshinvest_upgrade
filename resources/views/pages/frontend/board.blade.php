@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Management Board Hero Section --}}
<section class="management-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Правление</span>
            </div>
            <div class="hero-badge">
                <span class="badge-icon">🏢</span>
                <span class="badge-text">Исполнительный орган</span>
            </div>
            <h1 class="page-title">Правление</h1>
            <p class="page-subtitle">Исполнительный орган АО «Компания Ташкент Инвест», осуществляющий оперативное управление деятельностью компании</p>
        </div>
    </div>
</section>

{{-- Management Members Section --}}
<section class="management-members-section">
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
                        <img src="{{asset('assets/users_img/5.Шакиров Бахром Аскаралиевич.jpg')}}"
                             alt="Шакиров Бахром Аскаралиевич"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Шакиров Бахром Аскаралиевич</h3>
                    <div class="member-position">
                        <div class="position-title">Председатель правления</div>
                        <div class="position-subtitle">Генеральный директор</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                    <div class="member-responsibilities">
                        <div class="responsibility-item">
                            <span class="responsibility-icon">📊</span>
                            <span class="responsibility-text">Общее руководство</span>
                        </div>
                        <div class="responsibility-item">
                            <span class="responsibility-icon">💼</span>
                            <span class="responsibility-text">Стратегическое планирование</span>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Deputy Chairman - Strategic Development --}}
            <article class="member-card deputy">
                <div class="member-badge">
                    <span class="badge-text">Заместитель</span>
                    <span class="badge-icon"></span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{asset('assets/users_img/6.Кодиров Рустам Шухратович.jpg')}}"
                             alt="Кодиров Рустам Шухратович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Кодиров Рустам Шухратович</h3>
                    <div class="member-position">
                        <div class="position-title">Заместитель председателя правления</div>
                        <div class="position-subtitle">По стратегическому развитию</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                    <div class="member-responsibilities">
                        <div class="responsibility-item">
                            <span class="responsibility-icon">🎯</span>
                            <span class="responsibility-text">Стратегическое развитие</span>
                        </div>
                        <div class="responsibility-item">
                            <span class="responsibility-icon">📈</span>
                            <span class="responsibility-text">Планирование роста</span>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Deputy Chairman - Project Management --}}
            <article class="member-card deputy">
                <div class="member-badge">
                    <span class="badge-text">Заместитель</span>
                    <span class="badge-icon"></span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="https://static.tildacdn.one/tild3233-3135-4338-b031-633230386264/_-2.jpg"
                             alt="Отахонова Наргизахон Ганиевна"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Отахонова Наргизахон Ганиевна</h3>
                    <div class="member-position">
                        <div class="position-title">Заместитель председателя правления</div>
                        <div class="position-subtitle">По управлению проектами</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                    <div class="member-responsibilities">
                        <div class="responsibility-item">
                            <span class="responsibility-icon">🏗️</span>
                            <span class="responsibility-text">Управление проектами</span>
                        </div>
                        <div class="responsibility-item">
                            <span class="responsibility-icon">📋</span>
                            <span class="responsibility-text">Координация работ</span>
                        </div>
                    </div>
                </div>
            </article>

            {{-- Commented members can be uncommented when needed --}}
            {{--
            <article class="member-card deputy">
                <div class="member-badge">
                    <span class="badge-text">Заместитель</span>
                    <span class="badge-icon">🏗️</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="{{ asset('images/peregudov.png') }}"
                             alt="Перегудов Андрей Николаевич"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Перегудов Андрей Николаевич</h3>
                    <div class="member-position">
                        <div class="position-title">Заместитель председателя правления</div>
                        <div class="position-subtitle">По строительству и реновации</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                    <div class="member-responsibilities">
                        <div class="responsibility-item">
                            <span class="responsibility-icon">🏗️</span>
                            <span class="responsibility-text">Строительство</span>
                        </div>
                        <div class="responsibility-item">
                            <span class="responsibility-icon">🔄</span>
                            <span class="responsibility-text">Реновация</span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="member-card deputy">
                <div class="member-badge">
                    <span class="badge-text">Заместитель</span>
                    <span class="badge-icon">💰</span>
                </div>
                <div class="member-photo">
                    <div class="photo-wrapper">
                        <img src="https://static.tildacdn.one/tild3033-3662-4436-b737-346534373735/___2.jpg"
                             alt="Рябов Никита Владимирович"
                             class="member-image"
                             loading="lazy">
                        <div class="photo-overlay"></div>
                    </div>
                </div>
                <div class="member-info">
                    <h3 class="member-name">Рябов Никита Владимирович</h3>
                    <div class="member-position">
                        <div class="position-title">Заместитель председателя правления</div>
                        <div class="position-subtitle">По инвестициям</div>
                    </div>
                    <div class="member-status">
                        <span class="status-indicator active"></span>
                        <span class="status-text">Действующий</span>
                    </div>
                    <div class="member-responsibilities">
                        <div class="responsibility-item">
                            <span class="responsibility-icon">💰</span>
                            <span class="responsibility-text">Инвестиции</span>
                        </div>
                        <div class="responsibility-item">
                            <span class="responsibility-icon">📊</span>
                            <span class="responsibility-text">Финансовый анализ</span>
                        </div>
                    </div>
                </div>
            </article>
            --}}
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
.management-hero {
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="management-grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23management-grid)"/></svg>');
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
    margin: 0 auto;
    line-height: 1.6;
}

/* Management Members Section */
.management-members-section {
    padding: 80px 0;
    background: var(--light-bg);
}

.members-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
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

.member-card.chairman {
    border-left: 6px solid var(--warning);
    background: linear-gradient(135deg, rgba(251, 191, 36, 0.02) 0%, rgba(251, 191, 36, 0.05) 100%);
}

.member-card.deputy {
    border-left: 6px solid var(--blue);
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.02) 0%, rgba(59, 130, 246, 0.05) 100%);
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
    background: linear-gradient(135deg, var(--warning) 0%, #d97706 100%);
    color: var(--white);
    border-color: var(--warning);
}

.member-card.deputy .member-badge {
    background: linear-gradient(135deg, var(--blue) 0%, #1d4ed8 100%);
    color: var(--white);
    border-color: var(--blue);
}

.member-photo {
    position: relative;
    height: 300px;
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
    object-fit: cover;
    transition: var(--transition);
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
    margin-bottom: 16px;
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

.member-responsibilities {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.responsibility-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 6px 12px;
    background: var(--light-bg);
    border-radius: 8px;
    transition: var(--transition);
}

.responsibility-item:hover {
    background: rgba(59, 130, 246, 0.1);
}

.responsibility-icon {
    font-size: 1rem;
}

.responsibility-text {
    font-size: 0.85rem;
    color: var(--text-light);
    font-weight: 500;
}

/* Management Structure */
.management-structure {
    margin-bottom: 80px;
    padding: 60px 0;
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
}

.structure-header {
    text-align: center;
    margin-bottom: 60px;
}

.structure-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 12px;
}

.structure-subtitle {
    font-size: 1.2rem;
    color: var(--text-light);
}

.structure-diagram {
    max-width: 800px;
    margin: 0 auto;
}

.structure-level {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-bottom: 20px;
}

.structure-level.level-2 {
    flex-wrap: wrap;
}

.structure-card {
    background: var(--white);
    border: 2px solid var(--border);
    border-radius: var(--radius);
    padding: 20px;
    text-align: center;
    min-width: 200px;
    transition: var(--transition);
}

.structure-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.chairman-card {
    border-color: var(--warning);
    background: linear-gradient(135deg, rgba(251, 191, 36, 0.1) 0%, rgba(251, 191, 36, 0.05) 100%);
}

.deputy-card {
    border-color: var(--blue);
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1) 0%, rgba(59, 130, 246, 0.05) 100%);
}

.card-icon {
    font-size: 2rem;
    margin-bottom: 12px;
}

.card-title {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 8px;
}

.card-name {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
}

.structure-connector {
    width: 2px;
    height: 40px;
    background: linear-gradient(to bottom, var(--warning), var(--blue));
    margin: 0 auto 20px;
    position: relative;
}

.structure-connector::before,
.structure-connector::after {
    content: '';
    position: absolute;
    width: 60px;
    height: 2px;
    background: var(--border);
    top: 50%;
}

.structure-connector::before {
    left: -30px;
}

.structure-connector::after {
    right: -30px;
}

/* Management Stats */
.management-stats {
    margin-top: 60px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
}

.stat-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: var(--white);
    padding: 24px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.stat-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--purple) 0%, #7c3aed 100%);
    border-radius: var(--radius);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.stat-content {
    flex: 1;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--text);
    line-height: 1;
    margin-bottom: 4px;
}

.stat-label {
    font-size: 0.9rem;
    color: var(--text-light);
    font-weight: 500;
}

/* Responsive Design */
@media (max-width: 768px) {
    .management-hero {
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

    .structure-level {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .structure-card {
        min-width: 280px;
    }

    .structure-connector {
        transform: rotate(90deg);
        width: 40px;
        height: 2px;
    }

    .structure-connector::before,
    .structure-connector::after {
        display: none;
    }

    .stats-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .stat-card {
        padding: 20px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .structure-title {
        font-size: 2rem;
    }

    .structure-subtitle {
        font-size: 1rem;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .management-hero {
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

    .responsibility-item {
        padding: 4px 8px;
    }

    .responsibility-text {
        font-size: 0.8rem;
    }

    .structure-card {
        min-width: 240px;
        padding: 16px;
    }

    .card-title {
        font-size: 0.9rem;
    }

    .card-name {
        font-size: 0.8rem;
    }

    .stat-card {
        flex-direction: column;
        text-align: center;
        padding: 16px;
    }

    .stat-content {
        margin-top: 8px;
    }

    .management-structure {
        padding: 40px 20px;
    }

    .structure-header {
        margin-bottom: 40px;
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

.member-card {
    animation: fadeInUp 0.6s ease-out;
}

.member-card:nth-child(1) { animation-delay: 0.1s; }
.member-card:nth-child(2) { animation-delay: 0.2s; }
.member-card:nth-child(3) { animation-delay: 0.3s; }
.member-card:nth-child(4) { animation-delay: 0.4s; }
.member-card:nth-child(5) { animation-delay: 0.5s; }

.structure-card.chairman-card {
    animation: slideInFromLeft 0.8s ease-out 0.5s both;
}

.structure-card.deputy-card:nth-child(1) {
    animation: slideInFromLeft 0.8s ease-out 0.7s both;
}

.structure-card.deputy-card:nth-child(2) {
    animation: slideInFromRight 0.8s ease-out 0.7s both;
}

.stat-card {
    animation: fadeInUp 0.6s ease-out 0.9s both;
}

.stat-card:nth-child(1) { animation-delay: 1.0s; }
.stat-card:nth-child(2) { animation-delay: 1.1s; }
.stat-card:nth-child(3) { animation-delay: 1.2s; }

/* Print Styles */
@media print {
    .management-hero {
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

    .management-structure,
    .management-stats {
        display: none;
    }

    .member-responsibilities {
        display: none;
    }

    .structure-diagram {
        page-break-inside: avoid;
    }
}

/* High contrast mode support */
@media (prefers-contrast: high) {
    .member-card {
        border-width: 2px;
    }

    .member-badge {
        border-width: 2px;
    }

    .status-indicator {
        border: 2px solid var(--success);
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }

    .status-indicator {
        animation: none;
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

    // Image loading optimization
    const images = document.querySelectorAll('.member-image');

    // Intersection Observer for lazy loading and animations
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;

                    img.addEventListener('load', function() {
                        this.style.opacity = '1';
                        this.style.transform = 'scale(1)';
                        perf.log(`Image loaded: ${this.alt}`);
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
                            font-size: 3rem;
                        `;
                        placeholder.innerHTML = '👤';
                        this.parentNode.appendChild(placeholder);
                        console.warn(`Failed to load image: ${this.alt}`);
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

        perf.log('Image Observer Setup');
    } else {
        // Fallback for older browsers
        images.forEach(img => {
            img.addEventListener('load', function() {
                this.style.opacity = '1';
            });

            img.addEventListener('error', function() {
                this.style.display = 'none';
                console.warn(`Failed to load image: ${this.alt}`);
            });
        });
    }


    // Structure diagram interactive elements
    const structureCards = document.querySelectorAll('.structure-card');
    structureCards.forEach(card => {
        card.addEventListener('click', function() {
            // Add click feedback
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);

            // Log interaction
            const name = this.querySelector('.card-name')?.textContent;
            console.log(`Structure card clicked: ${name}`);
        });
    });

    // Accessibility enhancements
    memberCards.forEach((card, index) => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'article');
        card.setAttribute('aria-label', `Член правления ${index + 1}`);

        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
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

    // Dynamic status indicators
    const statusIndicators = document.querySelectorAll('.status-indicator');
    statusIndicators.forEach(indicator => {
        // Random pulse timing for more organic feel
        const delay = Math.random() * 2000;
        indicator.style.animationDelay = `${delay}ms`;
    });


    // Print optimization
    window.addEventListener('beforeprint', () => {
        console.log('Preparing page for printing...');
        // Remove animations before printing
        document.body.style.animation = 'none';
    });

    window.addEventListener('afterprint', () => {
        console.log('Print completed');
        // Restore animations after printing
        document.body.style.animation = '';
    });

    // Performance monitoring
    window.addEventListener('load', () => {
        const loadTime = performance.now();
        perf.log('Total Load Time');
        console.log(`🏢 Management Board page loaded successfully in ${loadTime.toFixed(2)}ms`);

        // Report performance metrics
        if ('getEntriesByType' in performance) {
            const paintMetrics = performance.getEntriesByType('paint');
            paintMetrics.forEach(metric => {
                console.log(`${metric.name}: ${metric.startTime.toFixed(2)}ms`);
            });
        }
    });

    // Export functions for debugging
    window.managementBoard = {
        refreshImages: () => {
            images.forEach(img => {
                if (img.complete && img.naturalWidth === 0) {
                    img.src = img.src; // Retry loading
                }
            });
        },
        highlightStructure: () => {
            structureCards.forEach(card => {
                card.style.border = '3px solid #f59e0b';
                setTimeout(() => {
                    card.style.border = '';
                }, 2000);
            });
        },
        logMetrics: () => {
            console.log({
                totalMembers: memberCards.length,
                totalImages: images.length,
                loadTime: performance.now(),
                userAgent: navigator.userAgent
            });
        }
    };

    perf.log('Script Initialization Complete');

})();
</script>

@endsection
