@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Investment Projects Hero Section --}}
<section class="investment-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Инвестиционные проекты</span>
            </div>
            <div class="hero-badge">
                <span class="badge-icon">🏗️</span>
                <span class="badge-text">Официальный портал</span>
            </div>
            <h1 class="page-title">Инвестиционные проекты в строительстве</h1>
            <p class="page-subtitle">АО «Компания Ташкент Инвест» объявляет конкурс на отбор лучших предложений для реализации инвестиционных проектов в сфере строительства</p>

        </div>
    </div>
</section>

{{-- Main Projects Section --}}
<section class="projects-main-section">
    <div class="container">
        {{-- Section Header --}}
        <div class="section-header">
            <div class="header-content">
                <div class="header-info">
                    <h2 class="section-title">Доступные проекты</h2>
                    <p class="section-subtitle">Выберите подходящий инвестиционный проект для участия</p>
                </div>
                <div class="header-controls">
                    <div class="filter-controls">
                        <button class="filter-btn active" data-filter="all">
                            <span class="filter-icon">📋</span>
                            <span class="filter-text">Все проекты</span>
                        </button>
                        <button class="filter-btn" data-filter="active">
                            <span class="filter-icon">✅</span>
                            <span class="filter-text">Актуальные</span>
                        </button>
                        <button class="filter-btn" data-filter="archive">
                            <span class="filter-icon">📦</span>
                            <span class="filter-text">Архив</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects Grid --}}
        <div class="projects-grid">
            {{-- Project Card 1 - Archived --}}
            <article class="project-card archived" data-category="archive" data-aos="fade-up" data-aos-delay="100">
                <div class="card-status-indicator">
                    <div class="status-badge archive">
                        <span class="status-icon">📦</span>
                        <span class="status-text">Архив</span>
                    </div>
                    <div class="project-id">TI-2025-001</div>
                </div>

                <div class="card-header">
                    <div class="location-info">
                        <div class="location-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="location-details">
                            <h3 class="location-title">Юнусабадский район</h3>
                            <p class="location-mahalla">Махалля Янгитарнов</p>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="project-details">
                        <div class="detail-group">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 3h18v18H3V3zm16 16V5H5v14h14z" fill="currentColor"/>
                                    </svg>
                                    <span>Площадь участка</span>
                                </div>
                                <div class="detail-value">0,8528 га</div>
                            </div>
                            <div class="detail-item deadline-item expired">
                                <div class="detail-label">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span>Срок подачи заявок</span>
                                </div>
                                <div class="detail-value">
                                    <span class="deadline-date">09.06.2025г., 18:00</span>
                                    <span class="deadline-status expired">Истёк</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-actions">
                        <a href="{{asset('investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf')}}"
                           class="action-btn primary" style="color: #fff" download>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="btn-text">Объявление</span>
                        </a>
                        <a href="приложение.zip" class="action-btn secondary" download>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7,10L12,15L17,10H7Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="btn-text">Приложения</span>
                        </a>
                    </div>
                </div>
            </article>

            {{-- Project Card 2 - Active --}}
            <article class="project-card active" data-category="active" data-aos="fade-up" data-aos-delay="200">
                <div class="card-status-indicator">
                    <div class="status-badge active">
                        <span class="status-icon">✅</span>
                        <span class="status-text">Актуальный</span>
                    </div>
                    <div class="project-id">TI-2025-002</div>
                </div>

                <div class="card-header">
                    <div class="location-info">
                        <div class="location-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                            </svg>
                        </div>
                        <div class="location-details">
                            <h3 class="location-title">Юнусабадский район</h3>
                            <p class="location-mahalla">Махалля Янгитарнов</p>
                        </div>
                    </div>
                </div>

                <div class="card-content">
                    <div class="project-details">
                        <div class="detail-group">
                            <div class="detail-item">
                                <div class="detail-label">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 3h18v18H3V3zm16 16V5H5v14h14z" fill="currentColor"/>
                                    </svg>
                                    <span>Площадь участка</span>
                                </div>
                                <div class="detail-value">0,8528 га</div>
                            </div>
                            <div class="detail-item deadline-item active">
                                <div class="detail-label">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                        <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                    <span>Срок подачи заявок</span>
                                </div>
                                <div class="detail-value">
                                    <span class="deadline-date">16.06.2025г., 18:00</span>
                                    <span class="deadline-status active">Активный</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="notification-banner">
                        <div class="notification-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="notification-content">
                            <strong class="notification-title">Уведомление о продлении:</strong>
                            <p class="notification-text">В связи с отсутствием поступивших предложений по данному ЛОТу, срок и время подачи предложений продлён до 18:00 часов 16 июня 2025 года.</p>
                        </div>
                    </div>

                    <div class="card-actions">
                        <a href="{{asset('investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf')}}"
                           class="action-btn primary" style="color: #fff" download>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="btn-text">Объявление</span>
                        </a>
                        <a href="приложение.zip" class="action-btn secondary" download>
                            <span class="btn-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7,10L12,15L17,10H7Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <span class="btn-text">Приложения</span>
                        </a>
                    </div>
                </div>
            </article>
        </div>

    </div>
</section>

<style>
/* Investment Projects Styles */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap');

/* Investment Hero Section */
.investment-hero {
    position: relative;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
    color: white;
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
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
    transition: color 0.3s ease;
}

.breadcrumb-link:hover {
    color: #60a5fa;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
}

.breadcrumb-current {
    color: #60a5fa;
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
    animation: fadeInDown 0.8s ease-out;
}

.badge-icon {
    font-size: 1.2rem;
}

.page-title {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 20px;
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #ffffff 0%, #e2e8f0 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    line-height: 1.2;
}

.page-subtitle {
    font-size: 1.3rem;
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
    max-width: 800px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

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
    transition: all 0.3s ease;
    animation: slideInUp 0.8s ease-out;
}

.stat-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
}

.stat-icon {
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}

.stat-content {
    text-align: left;
}

.stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    color: white;
    display: block;
    line-height: 1;
    margin-bottom: 4px;
    font-family: 'Inter', sans-serif;
}

.stat-label {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.8);
    font-weight: 500;
}

/* Main Projects Section */
.projects-main-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
}

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Section Header */
.section-header {
    margin-bottom: 60px;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 40px;
}

.header-info {
    flex: 1;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 12px;
    font-family: 'Inter', sans-serif;
}

.section-subtitle {
    font-size: 1.2rem;
    color: #64748b;
    font-family: 'Roboto', sans-serif;
    margin: 0;
}

.header-controls {
    flex-shrink: 0;
}

.filter-controls {
    display: flex;
    gap: 8px;
    background: white;
    padding: 6px;
    border-radius: 16px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    border: 1px solid #e2e8f0;
}

.filter-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    border: none;
    background: transparent;
    color: #64748b;
    border-radius: 12px;
    font-weight: 500;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
}

.filter-btn.active {
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    color: white;
    box-shadow: 0 4px 16px rgba(30, 41, 59, 0.3);
}

.filter-btn:hover:not(.active) {
    background: #f1f5f9;
    color: #1e293b;
}

.filter-icon {
    font-size: 1rem;
}

/* Projects Grid */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    gap: 40px;
    margin-bottom: 80px;
}

/* Project Card */
.project-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
    position: relative;
    border: 1px solid rgba(0, 0, 0, 0.05);
}

.project-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.project-card.active {
    border-left: 6px solid #10b981;
}

.project-card.archived {
    border-left: 6px solid #f59e0b;
}

.card-status-indicator {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px 16px;
    border-bottom: 1px solid #f1f5f9;
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.active {
    background: rgba(16, 185, 129, 0.1);
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.status-badge.archive {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.2);
}

.status-icon {
    font-size: 1rem;
}

.project-id {
    font-size: 0.9rem;
    color: #64748b;
    background: #f8fafc;
    padding: 6px 12px;
    border-radius: 8px;
    font-family: 'Monaco', 'Courier New', monospace;
    font-weight: 600;
}

.card-header {
    padding: 0 30px 20px;
}

.location-info {
    display: flex;
    align-items: flex-start;
    gap: 16px;
}

.location-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
}

.location-details {
    flex: 1;
}

.location-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 4px;
    font-family: 'Inter', sans-serif;
}

.location-mahalla {
    font-size: 1rem;
    color: #64748b;
    margin: 0;
    font-weight: 500;
}

.card-content {
    padding: 0 30px 30px;
}

.project-details {
    margin-bottom: 24px;
}

.detail-group {
    background: #f8fafc;
    border-radius: 16px;
    padding: 24px;
    border: 1px solid #e2e8f0;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    padding: 16px 0;
    border-bottom: 1px solid #e2e8f0;
}

.detail-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
}

.detail-item.deadline-item {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.03) 0%, rgba(59, 130, 246, 0.08) 100%);
    border-radius: 12px;
    padding: 20px;
    margin: 16px -8px 0;
    border: 1px solid rgba(59, 130, 246, 0.1);
}

.detail-item.deadline-item.expired {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.03) 0%, rgba(239, 68, 68, 0.08) 100%);
    border-color: rgba(239, 68, 68, 0.1);
}

.detail-label {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    color: #475569;
    font-size: 0.95rem;
    flex-shrink: 0;
}

.detail-label svg {
    color: #3b82f6;
    flex-shrink: 0;
}

.detail-value {
    text-align: right;
    font-weight: 600;
    color: #1e293b;
    font-size: 1rem;
}

.deadline-date {
    display: block;
    font-size: 1.1rem;
    margin-bottom: 4px;
}

.deadline-status {
    display: block;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.deadline-status.active {
    color: #10b981;
}

.deadline-status.expired {
    color: #ef4444;
}

.notification-banner {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(59, 130, 246, 0.1) 100%);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-left: 4px solid #3b82f6;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 24px;
}

.notification-icon {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
}

.notification-content {
    flex: 1;
}

.notification-title {
    font-size: 1rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 8px;
    display: block;
}

.notification-text {
    font-size: 0.95rem;
    color: #475569;
    line-height: 1.6;
    margin: 0;
}

.card-actions {
    display: flex;
    gap: 16px;
    flex-wrap: wrap;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 14px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.3s ease;
    flex: 1;
    min-width: 160px;
    position: relative;
    overflow: hidden;
}

.action-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.action-btn:hover::before {
    left: 100%;
}

.action-btn.primary {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    color: white;
    border: 2px solid transparent;
    box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
}

.action-btn.primary:hover {
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(59, 130, 246, 0.4);
    color: white;
}

.action-btn.secondary {
    background: white;
    color: #475569;
    border: 2px solid #e2e8f0;
}

.action-btn.secondary:hover {
    background: #f8fafc;
    border-color: #3b82f6;
    color: #1e293b;
    transform: translateY(-2px);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

.btn-icon {
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-text {
    font-weight: 600;
}

/* Contact Information Panel */
.contact-info-panel {
    position: relative;
    background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
    border-radius: 24px;
    overflow: hidden;
    margin-top: 60px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
}

.panel-background {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}

.panel-pattern {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="contact-grid" width="25" height="25" patternUnits="userSpaceOnUse"><path d="M 25 0 L 0 0 0 25" fill="none" stroke="rgba(255,255,255,0.03)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23contact-grid)"/></svg>');
    opacity: 0.8;
}

.panel-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: radial-gradient(circle at 70% 30%, rgba(59, 130, 246, 0.1) 0%, transparent 60%);
}

.panel-content {
    position: relative;
    z-index: 2;
    padding: 60px;
    color: white;
}

.panel-header {
    text-align: center;
    margin-bottom: 50px;
}

.header-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    color: white;
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
    animation: float 4s ease-in-out infinite;
}

.panel-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 12px;
    font-family: 'Inter', sans-serif;
}

.panel-subtitle {
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
    margin: 0;
}

.contact-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
}

.contact-card {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.3s ease;
    display: flex;
    align-items: flex-start;
    gap: 20px;
}

.contact-card:hover {
    background: rgba(255, 255, 255, 0.12);
    transform: translateY(-4px);
    border-color: rgba(59, 130, 246, 0.3);
}

.contact-card .card-icon {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    flex-shrink: 0;
    box-shadow: 0 4px 16px rgba(59, 130, 246, 0.3);
}

.contact-card .card-content {
    flex: 1;
    padding: 0;
}

.contact-card .card-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 8px;
    color: white;
    font-family: 'Inter', sans-serif;
}

.contact-card .card-text {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.7);
    margin-bottom: 12px;
    line-height: 1.5;
}

.contact-card .card-action {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #60a5fa;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
}

.contact-card .card-action:hover {
    color: #93c5fd;
    transform: translateX(4px);
}

.panel-actions {
    text-align: center;
}

.contact-btn {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #059669 0%, #047857 100%);
    color: white;
    padding: 18px 32px;
    border-radius: 12px;
    text-decoration: none;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.4s ease;
    box-shadow: 0 8px 32px rgba(5, 150, 105, 0.3);
    min-width: 200px;
    gap: 16px;
    position: relative;
    overflow: hidden;
}

.contact-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.6s ease;
}

.contact-btn:hover::before {
    left: 100%;
}

.contact-btn:hover {
    background: linear-gradient(135deg, #047857 0%, #065f46 100%);
    transform: translateY(-2px);
    box-shadow: 0 12px 40px rgba(5, 150, 105, 0.4);
    color: white;
}

.btn-arrow {
    display: flex;
    align-items: center;
    transition: transform 0.3s ease;
}

.contact-btn:hover .btn-arrow {
    transform: translateX(4px);
}

/* Animations */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px) rotate(0deg);
    }
    50% {
        transform: translateY(-10px) rotate(2deg);
    }
}

/* Mobile Responsive */
@media (max-width: 1024px) {
    .projects-grid {
        grid-template-columns: 1fr;
        gap: 30px;
    }

    .header-content {
        flex-direction: column;
        align-items: flex-start;
        gap: 30px;
    }

    .filter-controls {
        width: 100%;
        justify-content: center;
    }

    .page-title {
        font-size: 2.8rem;
    }

    .panel-content {
        padding: 50px 40px;
    }
}

@media (max-width: 768px) {
    .investment-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
    }

    .hero-stats {
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .stat-card {
        width: 100%;
        max-width: 300px;
        justify-content: center;
    }

    .section-title {
        font-size: 2rem;
    }

    .filter-controls {
        flex-direction: column;
        width: 100%;
    }

    .filter-btn {
        justify-content: center;
        padding: 14px 20px;
    }

    .projects-grid {
        grid-template-columns: 1fr;
    }

    .card-content {
        padding: 0 20px 20px;
    }

    .card-header {
        padding: 0 20px 16px;
    }

    .card-status-indicator {
        padding: 16px 20px 12px;
    }

    .detail-group {
        padding: 20px;
    }

    .detail-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .detail-value {
        text-align: left;
    }

    .card-actions {
        flex-direction: column;
    }

    .action-btn {
        min-width: auto;
    }

    .panel-content {
        padding: 40px 30px;
    }

    .contact-cards {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .contact-card {
        flex-direction: column;
        text-align: center;
        gap: 16px;
    }
}

@media (max-width: 480px) {
    .investment-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .breadcrumb {
        flex-wrap: wrap;
        font-size: 0.85rem;
    }

    .hero-badge {
        padding: 10px 20px;
        font-size: 0.9rem;
    }

    .stat-card {
        padding: 20px 24px;
    }

    .stat-number {
        font-size: 1.8rem;
    }

    .location-info {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 12px;
    }

    .location-icon {
        width: 40px;
        height: 40px;
    }

    .location-title {
        font-size: 1.3rem;
    }

    .notification-banner {
        flex-direction: column;
        gap: 12px;
        text-align: center;
    }

    .panel-content {
        padding: 30px 20px;
    }

    .panel-title {
        font-size: 1.6rem;
    }

    .header-icon {
        width: 60px;
        height: 60px;
    }
}

/* Loading Animations */
.investment-hero {
    animation: fadeIn 1s ease-out;
}

.projects-main-section {
    animation: fadeInUp 0.8s ease-out 0.3s both;
}

.project-card:nth-child(1) { animation-delay: 0.1s; }
.project-card:nth-child(2) { animation-delay: 0.2s; }
.project-card:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

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

/* High Quality Rendering */
* {
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

/* Focus States for Accessibility */
.filter-btn:focus,
.action-btn:focus,
.contact-btn:focus,
.card-action:focus {
    outline: 2px solid #fbbf24;
    outline-offset: 2px;
}

/* Print Styles */
@media print {
    .investment-hero,
    .contact-info-panel {
        background: white !important;
        color: black !important;
    }

    .filter-controls {
        display: none;
    }

    .project-card {
        break-inside: avoid;
        margin-bottom: 20px;
    }
}
</style>

<script>
// Investment Projects JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    const projectCards = document.querySelectorAll('.project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Filter cards with animation
            projectCards.forEach((card, index) => {
                const category = card.dataset.category;

                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    card.style.animation = `slideInUp 0.6s ease-out ${index * 0.1}s both`;
                } else {
                    card.style.animation = 'fadeOut 0.3s ease-out';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Download tracking
    const downloadLinks = document.querySelectorAll('a[download]');
    downloadLinks.forEach(link => {
        link.addEventListener('click', function() {
            const filename = this.getAttribute('href').split('/').pop();
            console.log(`Download started: ${filename}`);

            // Add visual feedback
            const originalText = this.innerHTML;
            this.innerHTML = this.innerHTML.replace(/Объявление|Приложения/, 'Скачивание...');

            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
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

    // Add loading states to buttons
    const actionBtns = document.querySelectorAll('.action-btn, .contact-btn');
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!this.hasAttribute('download') && !this.getAttribute('href').startsWith('tel:') && !this.getAttribute('href').startsWith('mailto:')) {
                return;
            }

            // Add loading effect
            this.style.opacity = '0.7';
            this.style.transform = 'scale(0.98)';

            setTimeout(() => {
                this.style.opacity = '';
                this.style.transform = '';
            }, 200);
        });
    });

    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe project cards
    projectCards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

// Add custom fade out animation
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeOut {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
document.head.appendChild(style);
</script>

@endsection
