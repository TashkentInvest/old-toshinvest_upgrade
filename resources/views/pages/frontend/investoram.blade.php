@extends('layouts.frontend_app')
@section('frontent_content')

{{-- Renovation Projects Hero Section --}}
<section class="renovation-hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="hero-overlay"></div>
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="{{ route('frontend.index') }}" class="breadcrumb-link">Главная</a>
                <span class="breadcrumb-separator">→</span>
                <span class="breadcrumb-current">Проекты реновации</span>
            </div>

            <h1 class="page-title">Проекты реновации</h1>
            <p class="page-subtitle">АО «Компания Ташкент Инвест» объявляет конкурс для отбора наилучшего предложения по реализации проектов реновации</p>
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
                    <p class="section-subtitle">Выберите проект для участия в конкурсе</p>
                </div>
                <div class="header-controls">
                    <div class="filter-controls">
                        {{-- Search Input --}}
                        <div class="search-container">
                            <input type="text" name="q" id="searchInput" value="{{ request('q') }}"
                                   placeholder="Поиск проектов..." class="search-input">
                            <div class="search-icon">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                                    <path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2"/>
                                </svg>
                            </div>
                            <button type="button" class="search-clear" style="display: none;">×</button>
                        </div>

                        {{-- Status Filter --}}
                        <select name="status" id="statusSelect" class="status-filter">
                            <option value="">Все этапы</option>
                            <option value="1_step" {{ request('status') == '1_step' ? 'selected' : '' }}>1-й этап</option>
                            <option value="2_step" {{ request('status') == '2_step' ? 'selected' : '' }}>2-й этап</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Завершенные</option>
                            <option value="archive" {{ request('status') == 'archive' ? 'selected' : '' }}>Архив</option>
                        </select>

                        {{-- View Toggle --}}
                        <button type="button" id="toggleViewBtn" class="view-toggle-btn" title="Переключить вид">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                                <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects Container --}}
        <div class="projects-container card-view" id="projectsContainer">
            @php
                $statusTitles = [
                    '1_step' => 'Конкурсы на 1-м этапе',
                    '2_step' => 'Конкурсы на 2-м этапе',
                    'completed' => 'Завершенные конкурсы',
                    'archive' => 'Архивированные конкурсы',
                ];
                $statusColors = [
                    '1_step' => 'primary',
                    '2_step' => 'warning',
                    'completed' => 'success',
                    'archive' => 'archive',
                ];
                $statusIcons = [
                    '1_step' => '🚀',
                    '2_step' => '⚡',
                    'completed' => '✅',
                    'archive' => '📦',
                ];
                $groupedProjects = $projects->groupBy('status');
            @endphp

            @forelse($statusTitles as $statusKey => $statusTitle)
                @if (isset($groupedProjects[$statusKey]) && $groupedProjects[$statusKey]->count() > 0)
                    <div class="status-group-container" data-status="{{ $statusKey }}">
                        <div class="status-group-header">
                            <div class="status-badge-large {{ $statusColors[$statusKey] ?? 'primary' }}">
                                <span class="status-icon">{{ $statusIcons[$statusKey] ?? '📋' }}</span>
                                <span class="status-text">{{ $statusTitle }}</span>
                                <span class="status-count">{{ $groupedProjects[$statusKey]->count() }}</span>
                            </div>
                        </div>

                        <div class="projects-grid">
                            @foreach ($groupedProjects[$statusKey] as $project)
                                <article class="project-card {{ $statusColors[$statusKey] ?? 'primary' }}"
                                         data-category="{{ $statusKey }}">

                                    <div class="card-status-indicator">
                                        <div class="status-badge {{ $statusColors[$statusKey] ?? 'primary' }}">
                                            <span class="status-icon">{{ $statusIcons[$statusKey] ?? '📋' }}</span>
                                            <span class="status-text">{{ $statusTitles[$statusKey] ?? $statusKey }}</span>
                                        </div>
                                        <div class="project-id">REN-{{ $project->id }}</div>
                                    </div>

                                    <div class="card-header">
                                        <div class="location-info">
                                            <div class="location-icon">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                                                </svg>
                                            </div>
                                            <div class="location-details">
                                                <h3 class="location-title">{{ $project->district }}ский район</h3>
                                                @if ($project->mahalla)
                                                    <p class="location-mahalla">Махалля {{ $project->mahalla }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-content">
                                        <div class="project-details">
                                            <div class="detail-group">
                                                @if ($project->land)
                                                    <div class="detail-item">
                                                        <div class="detail-label">
                                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                                <path d="M3 3h18v18H3V3zm16 16V5H5v14h14z" fill="currentColor"/>
                                                            </svg>
                                                            <span>Площадь участка</span>
                                                        </div>
                                                        <div class="detail-value">{{ $project->land }} га</div>
                                                    </div>
                                                @endif

                                                @if ($project->srok_realizatsi)
                                                    <div class="detail-item">
                                                        <div class="detail-label">
                                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                                                <polyline points="12,6 12,12 16,14" stroke="currentColor" stroke-width="2"/>
                                                            </svg>
                                                            <span>Срок реализации</span>
                                                        </div>
                                                        <div class="detail-value">{{ $project->srok_realizatsi }} мес.</div>
                                                    </div>
                                                @endif

                                                <div class="detail-item timeline-item">
                                                    <div class="detail-label">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" stroke="currentColor" stroke-width="2"/>
                                                        </svg>
                                                        <span>Первый этап</span>
                                                    </div>
                                                    <div class="detail-value">
                                                        <span class="timeline-dates">
                                                            {{ $project->start_date ? $project->start_date->format('d.m.Y') : 'Не указано' }}
                                                            —
                                                            {{ $project->end_date ? $project->end_date->format('d.m.Y') : 'Не указано' }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="detail-item timeline-item">
                                                    <div class="detail-label">
                                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" stroke="currentColor" stroke-width="2"/>
                                                        </svg>
                                                        <span>Второй этап</span>
                                                    </div>
                                                    <div class="detail-value">
                                                        <span class="timeline-dates">
                                                            {{ $project->second_stage_start_date ? $project->second_stage_start_date->format('d.m.Y') : 'Не указано' }}
                                                            —
                                                            {{ $project->second_stage_end_date ? $project->second_stage_end_date->format('d.m.Y') : 'Не указано' }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (!empty($project->comment))
                                            <div class="notification-banner">
                                                <div class="notification-icon">
                                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2"/>
                                                        <path d="M12 6v6l4 2" stroke="currentColor" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                                <div class="notification-content">
                                                    <strong class="notification-title">Комментарий к проекту:</strong>
                                                    <p class="notification-text">{{ Str::limit($project->comment, 120) }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="card-actions">
                                            @if ($project->elon_fayl)
                                                <a href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank"
                                                   class="action-btn primary">
                                                    <span class="btn-icon">📄</span>
                                                    <span class="btn-text">Объявление 1 этапа</span>
                                                </a>
                                            @endif

                                            @if ($project->pratakol_fayl)
                                                <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank"
                                                   class="action-btn secondary">

                                                    <span class="btn-text">Протокол 1 этапа</span>
                                                </a>
                                            @endif

                                            @if ($project->status == 'archive' && $project->qoshimcha_fayl)
                                                <a href="{{ asset('storage/' . $project->qoshimcha_fayl) }}" target="_blank"
                                                   class="action-btn success">
                                                    <span class="btn-icon">✅</span>
                                                    <span class="btn-text">Результат отбора</span>
                                                </a>
                                            @endif

                                            @if (!empty($project->comment))
                                                <button type="button" class="action-btn info" data-modal="projectModal{{ $project->id }}">
                                                    <span class="btn-icon">ℹ️</span>
                                                    <span class="btn-text">Подробности</span>
                                                </button>
                                            @endif

                                            @if (Route::has('bidding.show'))
                                                <a href="{{ route('bidding.show', $project->id) }}" class="action-btn details">
                                                    <span class="btn-icon">→</span>
                                                    <span class="btn-text">Далее</span>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </article>

                                {{-- Modal for comments --}}
                                @if (!empty($project->comment))
                                    <div class="modal" id="projectModal{{ $project->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        Комментарий к проекту - {{ $project->district }}ский район
                                                    </h5>
                                                    <button type="button" class="btn-close" data-close>&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="project-comment">{{ $project->comment }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-close>Закрыть</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <div class="no-projects">
                    <div class="no-projects-icon">📋</div>
                    <h3>Нет доступных проектов</h3>
                    <p>В настоящее время проекты реновации отсутствуют</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Optimized Inline Styles --}}
<style>
:root {
    --primary: #193d88;
    --primary-light: #1454c4;
    --primary-dark: #0f2557;
    --success: #10b981;
    --warning: #f59e0b;
    --archive: #6b7280;
    --light-bg: #f8fafc;
    --border: #e2e8f0;
    --text: #1e293b;
    --text-light: #64748b;
    --white: #ffffff;
    --shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
    --radius: 12px;
    --transition: 0.2s ease;
}

/* Critical Above-the-fold Styles */
.renovation-hero {
    position: relative;
    background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
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
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="renovation-grid" width="20" height="20" patternUnits="userSpaceOnUse"><path d="M 20 0 L 0 0 0 20" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23renovation-grid)"/></svg>');
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

.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}

.page-title {
    font-size: clamp(2rem, 4vw, 3rem);
    font-weight: 800;
    margin: 20px 0;
    line-height: 1.2;
}

.page-subtitle {
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
}

/* Projects Section */
.projects-main-section {
    padding: 60px 0;
    background: var(--light-bg);
}

.section-header {
    margin-bottom: 40px;
}

.header-content {
    display: flex;
    justify-content: space-between;
    align-items: end;
    gap: 30px;
    flex-wrap: wrap;
}

.section-title {
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    font-weight: 700;
    color: var(--text);
    margin-bottom: 8px;
}

.section-subtitle {
    color: var(--text-light);
    font-size: 1.1rem;
}

/* Filter Controls */
.filter-controls {
    display: flex;
    gap: 12px;
    background: var(--white);
    padding: 8px;
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    flex-wrap: wrap;
}

.search-container {
    position: relative;
    min-width: 200px;
}

.search-input,
.status-filter {
    padding: 10px 12px;
    border: 1px solid var(--border);
    border-radius: 8px;
    background: var(--light-bg);
    font-size: 0.9rem;
    transition: var(--transition);
    outline: none;
}

.search-input {
    padding-left: 36px;
    width: 100%;
}

.search-input:focus,
.status-filter:focus {
    border-color: var(--primary);
    background: var(--white);
}

.search-icon {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
    pointer-events: none;
}

.search-clear {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--text-light);
    cursor: pointer;
    font-size: 18px;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    transition: var(--transition);
}

.search-clear:hover {
    background: rgba(0,0,0,0.1);
}

.view-toggle-btn {
    padding: 10px;
    background: var(--light-bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
}

.view-toggle-btn:hover {
    background: var(--primary);
    color: var(--white);
}

/* Status Groups */
.status-group-container {
    margin-bottom: 40px;
}

.status-badge-large {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    border-radius: var(--radius);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
}

.status-badge-large.primary {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    color: var(--white);
}

.status-badge-large.warning {
    background: linear-gradient(135deg, var(--warning), #d97706);
    color: var(--white);
}

.status-badge-large.success {
    background: linear-gradient(135deg, var(--success), #059669);
    color: var(--white);
}

.status-badge-large.archive {
    background: linear-gradient(135deg, var(--archive), #4b5563);
    color: var(--white);
}

.status-count {
    background: rgba(255,255,255,0.2);
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8rem;
}

/* Projects Grid */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 30px;
}

/* Project Cards */
.project-card {
    background: var(--white);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    transition: var(--transition);
    overflow: hidden;
    border-left: 4px solid transparent;
}

.project-card.primary { border-left-color: var(--primary); }
.project-card.warning { border-left-color: var(--warning); }
.project-card.success { border-left-color: var(--success); }
.project-card.archive { border-left-color: var(--archive); opacity: 0.9; }

.project-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px -5px rgba(0,0,0,0.15);
}

.card-status-indicator {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 16px 20px;
    background: rgba(248,250,252,0.5);
    border-bottom: 1px solid #f1f5f9;
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 16px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-badge.primary {
    background: rgba(25,61,136,0.1);
    color: var(--primary);
}

.status-badge.warning {
    background: rgba(245,158,11,0.1);
    color: var(--warning);
}

.status-badge.success {
    background: rgba(16,185,129,0.1);
    color: var(--success);
}

.status-badge.archive {
    background: rgba(107,114,128,0.1);
    color: var(--archive);
}

.project-id {
    font-size: 0.85rem;
    color: var(--text-light);
    background: var(--light-bg);
    padding: 4px 8px;
    border-radius: 6px;
    font-family: monospace;
}

.card-header {
    padding: 0 20px 16px;
}

.location-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.location-icon {
    width: 40px;
    height: 40px;
    background: var(--primary);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.location-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text);
    margin: 0 0 4px;
}

.location-mahalla {
    color: var(--text-light);
    margin: 0;
    font-size: 0.9rem;
}

.card-content {
    padding: 0 20px 20px;
}

.detail-group {
    background: var(--light-bg);
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 16px;
}

.detail-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid var(--border);
}

.detail-item:last-child {
    border-bottom: none;
}

.detail-item.timeline-item {
    background: rgba(25,61,136,0.05);
    border-radius: 6px;
    padding: 12px;
    margin: 8px -4px 0;
    border: 1px solid rgba(25,61,136,0.1);
}

.detail-label {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    color: var(--text-light);
    font-size: 0.9rem;
}

.detail-value {
    font-weight: 600;
    color: var(--text);
    text-align: right;
}

.timeline-dates {
    font-size: 0.85rem;
    color: var(--text-light);
}

.notification-banner {
    display: flex;
    gap: 12px;
    background: rgba(25,61,136,0.05);
    border: 1px solid rgba(25,61,136,0.2);
    border-left: 3px solid var(--primary);
    border-radius: 8px;
    padding: 12px;
    margin-bottom: 16px;
}

.notification-icon {
    width: 32px;
    height: 32px;
    background: var(--primary);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    flex-shrink: 0;
}

.notification-title {
    font-weight: 700;
    margin-bottom: 4px;
    font-size: 0.9rem;
}

.notification-text {
    font-size: 0.85rem;
    color: var(--text-light);
    margin: 0;
    line-height: 1.4;
}

/* Action Buttons */
.card-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.action-btn {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 12px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    transition: var(--transition);
    flex: 1;
    min-width: 120px;
    justify-content: center;
    border: none;
    cursor: pointer;
}

/* Fixed: White text for specific buttons */
.action-btn.primary {
    background: var(--primary);
    color: #fff !important;
}

.action-btn.primary:hover {
    background: var(--primary-dark);
    color: #fff !important;
    transform: translateY(-1px);
}

.action-btn.secondary {
    background: var(--white);
    color: var(--text-light);
    border: 1px solid var(--border);
}

.action-btn.secondary:hover {
    background: var(--light-bg);
    color: var(--text);
}

.action-btn.success {
    background: var(--success);
    color: #fff !important;
}

.action-btn.success:hover {
    background: #059669;
    color: #fff !important;
    transform: translateY(-1px);
}

.action-btn.info {
    background: #0ea5e9;
    color: var(--white);
}

.action-btn.info:hover {
    background: #0284c7;
    transform: translateY(-1px);
}

.action-btn.details {
    background: #8b5cf6;
    color: var(--white);
}

.action-btn.details:hover {
    background: #7c3aed;
    transform: translateY(-1px);
}

/* Modal Styles */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    padding: 20px;
}

.modal.show {
    display: flex;
}

.modal-dialog {
    background: var(--white);
    border-radius: var(--radius);
    max-width: 500px;
    width: 100%;
    max-height: 80vh;
    overflow-y: auto;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

.modal-header {
    background: var(--primary);
    color: var(--white);
    padding: 16px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: var(--radius) var(--radius) 0 0;
}

.modal-title {
    font-weight: 700;
    font-size: 1.1rem;
    margin: 0;
}

.btn-close {
    background: none;
    border: none;
    color: var(--white);
    font-size: 20px;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: var(--transition);
}

.btn-close:hover {
    background: rgba(255,255,255,0.2);
}

.modal-body {
    padding: 20px;
}

.project-comment {
    font-size: 1rem;
    line-height: 1.6;
    color: var(--text);
    margin: 0;
}

.modal-footer {
    padding: 16px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    justify-content: flex-end;
}

.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: var(--transition);
}

.btn-secondary {
    background: var(--text-light);
    color: var(--white);
}

.btn-secondary:hover {
    background: #475569;
}

/* No Projects State */
.no-projects {
    text-align: center;
    padding: 60px 20px;
    color: var(--text-light);
}

.no-projects-icon {
    font-size: 3rem;
    margin-bottom: 16px;
    opacity: 0.5;
}

.no-projects h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--text);
    margin-bottom: 8px;
}

.no-projects p {
    font-size: 1rem;
    margin: 0;
}

/* List View */
.projects-container.list-view .projects-grid {
    display: block;
}

.projects-container.list-view .project-card {
    display: flex;
    margin-bottom: 20px;
    min-height: 150px;
}

.projects-container.list-view .card-status-indicator {
    writing-mode: vertical-lr;
    width: 100px;
    border-bottom: none;
    border-right: 1px solid #f1f5f9;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.projects-container.list-view .card-header {
    flex: 1;
    padding: 16px 16px 0;
}

.projects-container.list-view .card-content {
    flex: 2;
    padding: 0 16px 16px;
}

/* Loading State */
.loading {
    position: relative;
    pointer-events: none;
}

.loading::after {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
}

/* Breadcrumb */
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
    padding: 4px 8px;
    border-radius: var(--radius-sm);
}

.breadcrumb-link:hover {
    color: #60a5fa;
    background: rgba(255, 255, 255, 0.1);
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.5);
    font-weight: 300;
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
    font-size: clamp(2.5rem, 5vw, 3.5rem);
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
    font-size: clamp(1.1rem, 2.5vw, 1.3rem);
    color: rgba(255, 255, 255, 0.8);
    font-family: 'Roboto', sans-serif;
    max-width: 800px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

/* Hero Stats Section */
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
/* Responsive Design */
@media (max-width: 768px) {
    .renovation-hero {
        padding: 100px 0 60px;
    }

    .page-title {
        font-size: 2.2rem;
    }

    .page-subtitle {
        font-size: 1.1rem;
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

    .header-content {
        flex-direction: column;
        align-items: stretch;
    }

    .filter-controls {
        flex-direction: column;
        gap: 8px;
    }

    .search-container {
        min-width: auto;
    }

    .projects-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .card-actions {
        flex-direction: column;
    }

    .action-btn {
        min-width: auto;
    }

    .projects-container.list-view .project-card {
        flex-direction: column;
    }

    .projects-container.list-view .card-status-indicator {
        writing-mode: horizontal-tb;
        width: 100%;
        border-right: none;
        border-bottom: 1px solid #f1f5f9;
        flex-direction: row;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 15px;
    }

    .renovation-hero {
        padding: 80px 0 50px;
    }

    .page-title {
        font-size: 1.8rem;
    }

    .hero-badge {
        font-size: 0.8rem;
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

    .location-info {
        flex-direction: column;
        text-align: center;
        gap: 8px;
    }

    .detail-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
    }

    .detail-value {
        text-align: left;
    }

    .notification-banner {
        flex-direction: column;
        text-align: center;
    }
}

/* Print Styles */
@media print {
    .renovation-hero {
        background: var(--white) !important;
        color: var(--text) !important;
    }

    .filter-controls,
    .action-btn {
        display: none;
    }

    .project-card {
        break-inside: avoid;
        margin-bottom: 20px;
    }
}
</style>

{{-- Optimized JavaScript --}}
<script>
(function() {
    'use strict';

    // Debug flag - set to false in production
    const DEBUG = true;

    // Performance timing
    const perf = {
        start: performance.now(),
        log: function(label) {
            if (DEBUG) {
                console.log(`[${label}] ${(performance.now() - this.start).toFixed(2)}ms`);
            }
        }
    };

    // DOM Elements Cache
    const $ = {
        searchInput: null,
        statusSelect: null,
        toggleBtn: null,
        container: null,
        searchClear: null,
        init: function() {
            this.searchInput = document.getElementById('searchInput');
            this.statusSelect = document.getElementById('statusSelect');
            this.toggleBtn = document.getElementById('toggleViewBtn');
            this.container = document.getElementById('projectsContainer');
            this.searchClear = document.querySelector('.search-clear');
            perf.log('DOM Cache');
        }
    };

    // State
    const state = {
        loading: false,
        currentView: 'card',
        searchTimeout: null
    };

    // Utilities
    const utils = {
        debounce: function(func, wait) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        },

        sanitize: function(str) {
            return str.replace(/[<>'"]/g, '').trim().substring(0, 100);
        },

        show: function(el) {
            if (el) el.style.display = 'block';
        },

        hide: function(el) {
            if (el) el.style.display = 'none';
        },

        addClass: function(el, cls) {
            if (el) el.classList.add(cls);
        },

        removeClass: function(el, cls) {
            if (el) el.classList.remove(cls);
        },

        hasClass: function(el, cls) {
            return el ? el.classList.contains(cls) : false;
        }
    };

    // Loading Manager
    const loading = {
        show: function() {
            if (state.loading) return;
            state.loading = true;
            utils.addClass($.container, 'loading');
            if (DEBUG) console.log('Loading started');
        },

        hide: function() {
            state.loading = false;
            utils.removeClass($.container, 'loading');
            if (DEBUG) console.log('Loading finished');
        }
    };

    // Projects Loader
    const projects = {
        load: function() {
            if (state.loading) return;

            const startTime = performance.now();
            loading.show();

            const params = new URLSearchParams({
                q: utils.sanitize($.searchInput?.value || ''),
                status: $.statusSelect?.value || '',
                ajax: '1'
            });

            fetch(window.location.pathname + '?' + params, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            })
            .then(response => {
                if (!response.ok) throw new Error(`HTTP ${response.status}`);
                return response.text();
            })
            .then(html => {
                if ($.container) {
                    $.container.innerHTML = html;
                    this.reinitialize();
                    if (DEBUG) {
                        console.log(`Projects loaded in ${(performance.now() - startTime).toFixed(2)}ms`);
                    }
                }
            })
            .catch(error => {
                console.error('Load error:', error);
                if ($.container) {
                    $.container.innerHTML = `
                        <div class="no-projects">
                            <div class="no-projects-icon">⚠️</div>
                            <h3>Ошибка загрузки</h3>
                            <p>Попробуйте обновить страницу</p>
                        </div>
                    `;
                }
            })
            .finally(() => {
                loading.hide();
            });
        },

        reinitialize: function() {
            modals.init();
            cards.animate();
            if (DEBUG) console.log('Reinitialized');
        }
    };

    // Search Manager
    const search = {
        init: function() {
            if (!$.searchInput) return;

            const debouncedLoad = utils.debounce(() => projects.load(), 250);

            $.searchInput.addEventListener('input', (e) => {
                const value = e.target.value;
                e.target.value = utils.sanitize(value);

                // Toggle clear button
                if ($.searchClear) {
                    $.searchClear.style.display = value ? 'block' : 'none';
                }

                debouncedLoad();
            });

            // Clear button
            if ($.searchClear) {
                $.searchClear.addEventListener('click', () => {
                    $.searchInput.value = '';
                    utils.hide($.searchClear);
                    $.searchInput.focus();
                    projects.load();
                });

                // Show/hide based on initial value
                $.searchClear.style.display = $.searchInput.value ? 'block' : 'none';
            }

            perf.log('Search Init');
        }
    };

    // View Toggle
    const viewToggle = {
        init: function() {
            if (!$.toggleBtn || !$.container) return;

            $.toggleBtn.addEventListener('click', () => {
                const isListView = utils.hasClass($.container, 'list-view');

                if (isListView) {
                    utils.removeClass($.container, 'list-view');
                    utils.addClass($.container, 'card-view');
                    state.currentView = 'card';
                    this.updateIcon('card');
                } else {
                    utils.removeClass($.container, 'card-view');
                    utils.addClass($.container, 'list-view');
                    state.currentView = 'list';
                    this.updateIcon('list');
                }

                this.savePreference();
                cards.animate();
            });

            this.loadPreference();
            perf.log('View Toggle Init');
        },

        updateIcon: function(view) {
            const svg = $.toggleBtn.querySelector('svg');
            if (!svg) return;

            if (view === 'card') {
                svg.innerHTML = `
                    <rect x="3" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                    <rect x="14" y="3" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                    <rect x="3" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                    <rect x="14" y="14" width="7" height="7" stroke="currentColor" stroke-width="2"/>
                `;
                $.toggleBtn.title = 'Переключить на список';
            } else {
                svg.innerHTML = `<path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01" stroke="currentColor" stroke-width="2"/>`;
                $.toggleBtn.title = 'Переключить на карточки';
            }
        },

        savePreference: function() {
            try {
                localStorage.setItem('renovation_view', state.currentView);
            } catch (e) {
                // Ignore localStorage errors
            }
        },

        loadPreference: function() {
            try {
                const saved = localStorage.getItem('renovation_view');
                if (saved && saved !== state.currentView) {
                    $.toggleBtn.click();
                }
            } catch (e) {
                // Ignore localStorage errors
            }
        }
    };

    // Modal Manager
    const modals = {
        init: function() {
            // Modal triggers
            document.querySelectorAll('[data-modal]').forEach(trigger => {
                trigger.addEventListener('click', (e) => {
                    e.preventDefault();
                    const modalId = trigger.getAttribute('data-modal');
                    this.show(modalId);
                });
            });

            // Close buttons
            document.querySelectorAll('[data-close]').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const modal = btn.closest('.modal');
                    if (modal) this.hide(modal);
                });
            });

            // Backdrop click
            document.querySelectorAll('.modal').forEach(modal => {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) this.hide(modal);
                });
            });

            // Escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    const openModal = document.querySelector('.modal.show');
                    if (openModal) this.hide(openModal);
                }
            });

            perf.log('Modals Init');
        },

        show: function(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                utils.addClass(modal, 'show');
                document.body.style.overflow = 'hidden';
            }
        },

        hide: function(modal) {
            utils.removeClass(modal, 'show');
            document.body.style.overflow = '';
        }
    };

    // Card Animations
    const cards = {
        animate: function() {
            if (!window.IntersectionObserver) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -20px 0px'
            });

            document.querySelectorAll('.project-card').forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = `opacity 0.4s ease ${index * 0.05}s, transform 0.4s ease ${index * 0.05}s`;
                observer.observe(card);
            });

            perf.log('Cards Animated');
        }
    };

    // Download Tracking
    const downloads = {
        init: function() {
            document.querySelectorAll('.action-btn[href]').forEach(link => {
                link.addEventListener('click', function() {
                    const btnText = this.querySelector('.btn-text');
                    if (btnText) {
                        const original = btnText.textContent;
                        btnText.textContent = 'Скачивание...';
                        this.style.opacity = '0.7';

                        setTimeout(() => {
                            btnText.textContent = original;
                            this.style.opacity = '';
                        }, 1500);
                    }

                    if (DEBUG) {
                        console.log('Download:', this.href.split('/').pop());
                    }
                });
            });

            perf.log('Downloads Init');
        }
    };

    // Status Filter
    const statusFilter = {
        init: function() {
            if (!$.statusSelect) return;

            $.statusSelect.addEventListener('change', () => {
                projects.load();
            });

            perf.log('Status Filter Init');
        }
    };

    // Main Initialization
    function init() {
        try {
            $.init();
            search.init();
            viewToggle.init();
            modals.init();
            cards.animate();
            downloads.init();
            statusFilter.init();

            perf.log('Total Init');

            if (DEBUG) {
                console.log('🚀 Renovation Projects initialized successfully');

                // Expose debug functions
                window.debugRenovation = {
                    loadProjects: () => projects.load(),
                    showModal: (id) => modals.show(id),
                    state: state,
                    utils: utils,
                    performance: perf
                };
            }

        } catch (error) {
            console.error('❌ Initialization error:', error);
        }
    }

    // Start when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
</script>

@endsection
