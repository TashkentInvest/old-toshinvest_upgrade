@extends('layouts.frontend_app')

@section('title', 'Реновация лойиҳалари - Shaffof Qurilish')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', sans-serif;
    background-color: #f5f6fa;
    color: #333;
    line-height: 1.5;
}

#root {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.body-main {
    flex: 1;
    display: flex;
    flex-direction: column;
}

/* Header styles */
.bg-frozen2 {
    background: linear-gradient(135deg, #e3f2fd 0%, #f8f9fa 100%);
    border-bottom: 1px solid #e1e8ed;
}

.bg-darkblue {
    background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 100%);
    box-shadow: 0 2px 4px rgba(30, 58, 138, 0.1);
}

.text-darkblue {
    color: #1e3a8a;
    font-weight: 500;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    width: 100%;
}

/* Statistics cards container */
.stats-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 24px 20px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
}

.stat-card {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #3b82f6, #1d4ed8);
}

.stat-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.stat-info h3 {
    font-size: 13px;
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 8px;
    line-height: 1.4;
}

.stat-number {
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
    line-height: 1;
}

.stat-visual {
    position: relative;
    width: 70px;
    height: 70px;
}

.progress-circle {
    width: 100%;
    height: 100%;
    transform: rotate(-90deg);
}

.progress-bg {
    fill: none;
    stroke: #f3f4f6;
    stroke-width: 8;
}

.progress-bar {
    fill: none;
    stroke-width: 8;
    stroke-linecap: round;
    transition: stroke-dashoffset 0.5s ease;
}

.progress-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 16px;
    font-weight: 600;
    color: #3b82f6;
}

.stat-detail {
    margin-top: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.stat-badge {
    background: #eff6ff;
    color: #2563eb;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 600;
}

.stat-label {
    font-size: 12px;
    color: #6b7280;
}

/* Search section */
.search-section {
    position: sticky;
    top: 0;
    z-index: 10;
    margin-bottom: 40px;
}

.search-card {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    border: 1px solid #e5e7eb;
    position: relative;
}

.search-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-control, .form-select {
    padding: 12px 16px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 400;
    background: #fff;
    transition: all 0.2s ease;
    outline: none;
}

.form-control:focus, .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control::placeholder {
    color: #9ca3af;
}

.search-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.search-buttons {
    display: flex;
    gap: 12px;
}

.btn {
    padding: 10px 20px;
    border: 2px dashed #374151;
    background: transparent;
    color: #374151;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn:hover {
    background: #374151;
    color: #fff;
}

.btn-reset {
    border-color: #ef4444;
    color: #ef4444;
}

.btn-reset:hover {
    background: #ef4444;
    color: #fff;
}

.pagination-info {
    display: flex;
    align-items: center;
    gap: 20px;
}

/* Enhanced Pagination Styles */
.pagination {
    display: flex;
    gap: 4px;
    align-items: center;
    padding: 0;
    margin: 0;
    list-style: none;
}

.pagination .page-item {
    list-style: none;
}

.pagination .page-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 8px 12px;
    min-width: 40px;
    height: 40px;
    border: 1px solid #e5e7eb;
    background: #fff;
    color: #6b7280;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.pagination .page-link:hover {
    background: #f3f4f6;
    color: #1f2937;
    border-color: #d1d5db;
}

.pagination .page-item.active .page-link {
    background: #3b82f6;
    color: #fff;
    border-color: #3b82f6;
}

.pagination .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
}

.pagination .page-link i {
    font-size: 12px;
}

.total-count {
    font-size: 16px;
    font-weight: 600;
    color: #1f2937;
}

.results-per-page {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #6b7280;
}

.results-per-page select {
    padding: 4px 8px;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    background: #fff;
    color: #1f2937;
    font-size: 14px;
}

/* Project cards */
.projects-container {
    max-width: 1600px;
    margin: 0 auto;
    padding: 0 20px;
}

.project-card {
    background: #fff;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    border: 1px solid #e5e7eb;
    transition: all 0.3s ease;
}

.project-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transform: translateY(-1px);
}

.project-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 16px;
    margin-bottom: 20px;
    border-bottom: 1px solid #f3f4f6;
}

.project-meta {
    display: flex;
    align-items: center;
    gap: 16px;
}

.project-number {
    display: flex;
    align-items: center;
    gap: 4px;
    padding: 6px 12px;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    font-size: 12px;
    color: #6b7280;
}

.project-id {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 14px;
}

.project-id span:first-child {
    color: #6b7280;
}

.project-id span:last-child {
    color: #3b82f6;
    font-weight: 600;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-1_step {
    background: #dbeafe;
    color: #1e40af;
}

.status-2_step {
    background: #fef3c7;
    color: #92400e;
}

.status-completed {
    background: #d1fae5;
    color: #065f46;
}

.status-archive {
    background: #f3f4f6;
    color: #374151;
}

.status-jarayonda {
    background: #fed7aa;
    color: #ea580c;
}

.date-info {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
}

.date-label {
    color: #6b7280;
}

.date-value {
    background: #10b981;
    color: #fff;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: 500;
}

.date-value.in-progress {
    background: #f59e0b;
}

.project-content {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 32px;
}

.project-section h4 {
    font-size: 12px;
    color: #6b7280;
    font-weight: 500;
    margin-bottom: 4px;
    padding-right: 8px;
}

.project-section .value {
    font-size: 14px;
    color: #1f2937;
    margin-bottom: 12px;
}

.project-section .value.primary {
    color: #3b82f6;
    font-weight: 500;
}

.project-section .value.truncate {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.project-section a {
    color: #3b82f6;
    text-decoration: none;
    font-weight: 500;
}

.project-section a:hover {
    text-decoration: underline;
}

.no-data {
    color: #9ca3af;
    font-style: italic;
}

/* File Link Styles */
.file-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    color: #3b82f6;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    transition: all 0.2s ease;
    max-width: 100%;
}

.file-link:hover {
    background: #e2e8f0;
    border-color: #cbd5e1;
    text-decoration: none;
}

.file-icon {
    font-size: 16px;
    color: #64748b;
    flex-shrink: 0;
}

.file-name {
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.file-size {
    font-size: 11px;
    color: #64748b;
    font-weight: 400;
}

/* File type specific colors */
.file-link.pdf {
    border-color: #ef4444;
    background: #fef2f2;
}
.file-link.pdf .file-icon {
    color: #ef4444;
}

.file-link.doc {
    border-color: #2563eb;
    background: #eff6ff;
}
.file-link.doc .file-icon {
    color: #2563eb;
}

.file-link.excel {
    border-color: #059669;
    background: #ecfdf5;
}
.file-link.excel .file-icon {
    color: #059669;
}

.file-link.image {
    border-color: #7c3aed;
    background: #f3e8ff;
}
.file-link.image .file-icon {
    color: #7c3aed;
}

/* Clickable stat cards */
.clickable-stat {
    cursor: pointer;
    position: relative;
    transition: all 0.3s ease;
}

.clickable-stat:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.clickable-stat:active {
    transform: translateY(-2px);
}

.stat-active-indicator {
    position: absolute;
    top: 8px;
    right: 8px;
    background: #059669;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.clickable-stat[data-status="1_step"]:hover::before {
    background: linear-gradient(90deg, #3b82f6, #1e40af);
}

.clickable-stat[data-status="2_step"]:hover::before {
    background: linear-gradient(90deg, #f59e0b, #d97706);
}

.clickable-stat[data-status="completed"]:hover::before {
    background: linear-gradient(90deg, #10b981, #059669);
}

.clickable-stat[data-status="archive"]:hover::before {
    background: linear-gradient(90deg, #6b7280, #4b5563);
}

/* Header navigation */
header {
    background: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-bottom: 1px solid #e5e7eb;
}

.header-content {
    display: flex;
    align-items: center;
    padding: 12px 0;
}

.logo-section {
    display: flex;
    align-items: center;
    margin-right: 48px;
}

.logo-section img {
    height: 32px;
    margin-right: 16px;
}

.nav-menu {
    display: flex;
    gap: 24px;
}

.nav-link {
    color: #1e3a8a;
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    padding: 8px 0;
    position: relative;
    transition: color 0.2s ease;
}

.nav-link.active {
    color: #1e40af;
    box-shadow: 0 3px 0 #1e40af;
}

.nav-link:hover {
    color: #1e40af;
}

/* Empty state */
.empty-state {
    text-align: center;
    padding: 80px 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

.empty-state i {
    font-size: 64px;
    color: #d1d5db;
    margin-bottom: 24px;
}

.empty-state h3 {
    font-size: 24px;
    color: #374151;
    margin-bottom: 12px;
}

.empty-state p {
    color: #6b7280;
    margin-bottom: 24px;
}

.empty-state .btn {
    background: #3b82f6;
    color: #fff;
    border: none;
    padding: 12px 24px;
}

.empty-state .btn:hover {
    background: #2563eb;
}

/* Responsive design */
@media (max-width: 1200px) {
    .stats-container,
    .projects-container {
        max-width: 100%;
        padding: 20px;
    }
}

@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }

    .search-grid {
        grid-template-columns: 1fr;
    }

    .project-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .search-actions {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }

    .pagination-info {
        flex-direction: column;
        gap: 12px;
    }

    .project-meta {
        flex-wrap: wrap;
        gap: 8px;
    }

    .project-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }

    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }
}

@media (max-width: 480px) {
    .container {
        padding: 0 16px;
    }

    .search-card,
    .project-card {
        padding: 16px;
    }
}

/* Utility classes */
.d-flex { display: flex; }
.align-items-center { align-items: center; }
.justify-content-between { justify-content: space-between; }
.justify-content-center { justify-content: center; }
.flex-column { flex-direction: column; }
.flex-grow-1 { flex-grow: 1; }
.text-center { text-align: center; }
.position-relative { position: relative; }
.position-absolute { position: absolute; }
.w-100 { width: 100%; }
.h-100 { height: 100%; }
</style>

@section('frontent_content')
<div id="root">
    <div class="body-main">
        <div class="flex-grow-1">
            <!-- Statistics Cards -->
            <div class="stats-container">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Jami лойиҳалар</h3>
                                <div class="stat-number">{{ $allTotal }}</div>
                            </div>
                            <div class="stat-visual">
                                <svg class="progress-circle" viewBox="0 0 100 100">
                                    <circle class="progress-bg" cx="50" cy="50" r="42"></circle>
                                    <circle class="progress-bar" cx="50" cy="50" r="42"
                                            style="stroke: #3b82f6; stroke-dasharray: 264; stroke-dashoffset: 0;"></circle>
                                </svg>
                                <div class="progress-text">100%</div>
                            </div>
                        </div>
                    </div>

                    <div class="stat-card clickable-stat" data-status="1_step" onclick="filterByStatus('1_step')">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>1-босқич лойиҳалари</h3>
                                <div class="stat-number">{{ $displayStatusCounts['1_step'] }}</div>
                            </div>
                            <div class="stat-visual">
                                <svg class="progress-circle" viewBox="0 0 100 100">
                                    <circle class="progress-bg" cx="50" cy="50" r="42"></circle>
                                    <circle class="progress-bar" cx="50" cy="50" r="42"
                                            style="stroke: #3b82f6; stroke-dasharray: 264; stroke-dashoffset: {{ $displayTotal > 0 ? 264 - (264 * $displayStatusCounts['1_step'] / $displayTotal) : 264 }};"></circle>
                                </svg>
                                <div class="progress-text">{{ $displayTotal > 0 ? round(($displayStatusCounts['1_step'] / $displayTotal) * 100, 1) : 0 }}%</div>
                            </div>
                        </div>
                        <div class="stat-detail">
                            <span class="stat-badge">{{ $displayStatusCounts['1_step'] }}</span>
                            <span class="stat-label">Фаол лойиҳалар</span>
                        </div>
                        @if($currentStatus == '1_step')
                            <div class="stat-active-indicator">Фаол</div>
                        @endif
                    </div>

                    <div class="stat-card clickable-stat" data-status="2_step" onclick="filterByStatus('2_step')">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>2-босқич лойиҳалари</h3>
                                <div class="stat-number">{{ $displayStatusCounts['2_step'] }}</div>
                            </div>
                            <div class="stat-visual">
                                <svg class="progress-circle" viewBox="0 0 100 100">
                                    <circle class="progress-bg" cx="50" cy="50" r="42"></circle>
                                    <circle class="progress-bar" cx="50" cy="50" r="42"
                                            style="stroke: #f59e0b; stroke-dasharray: 264; stroke-dashoffset: {{ $displayTotal > 0 ? 264 - (264 * $displayStatusCounts['2_step'] / $displayTotal) : 264 }};"></circle>
                                </svg>
                                <div class="progress-text" style="color: #f59e0b;">{{ $displayTotal > 0 ? round(($displayStatusCounts['2_step'] / $displayTotal) * 100, 1) : 0 }}%</div>
                            </div>
                        </div>
                        <div class="stat-detail">
                            <span class="stat-badge" style="background: #fef3c7; color: #92400e;">{{ $displayStatusCounts['2_step'] }}</span>
                            <span class="stat-label">Иккинчи босқич</span>
                        </div>
                        @if($currentStatus == '2_step')
                            <div class="stat-active-indicator">Фаол</div>
                        @endif
                    </div>

                    <div class="stat-card clickable-stat" data-status="completed" onclick="filterByStatus('completed')">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Тугалланган лойиҳалар</h3>
                                <div class="stat-number">{{ $displayStatusCounts['completed'] }}</div>
                            </div>
                            <div class="stat-visual">
                                <svg class="progress-circle" viewBox="0 0 100 100">
                                    <circle class="progress-bg" cx="50" cy="50" r="42"></circle>
                                    <circle class="progress-bar" cx="50" cy="50" r="42"
                                            style="stroke: #10b981; stroke-dasharray: 264; stroke-dashoffset: {{ $displayTotal > 0 ? 264 - (264 * $displayStatusCounts['completed'] / $displayTotal) : 264 }};"></circle>
                                </svg>
                                <div class="progress-text" style="color: #10b981;">{{ $displayTotal > 0 ? round(($displayStatusCounts['completed'] / $displayTotal) * 100, 1) : 0 }}%</div>
                            </div>
                        </div>
                        @if($currentStatus == 'completed')
                            <div class="stat-active-indicator">Фаол</div>
                        @endif
                    </div>

                    <div class="stat-card clickable-stat" data-status="archive" onclick="filterByStatus('archive')">
                        <div class="stat-content">
                            <div class="stat-info">
                                <h3>Архив лойиҳалари</h3>
                                <div class="stat-number">{{ $displayStatusCounts['archive'] }}</div>
                            </div>
                            <div class="stat-visual">
                                <svg class="progress-circle" viewBox="0 0 100 100">
                                    <circle class="progress-bg" cx="50" cy="50" r="42"></circle>
                                    <circle class="progress-bar" cx="50" cy="50" r="42"
                                            style="stroke: #6b7280; stroke-dasharray: 264; stroke-dashoffset: {{ $displayTotal > 0 ? 264 - (264 * $displayStatusCounts['archive'] / $displayTotal) : 264 }};"></circle>
                                </svg>
                                <div class="progress-text" style="color: #6b7280;">{{ $displayTotal > 0 ? round(($displayStatusCounts['archive'] / $displayTotal) * 100, 1) : 0 }}%</div>
                            </div>
                        </div>
                        @if($currentStatus == 'archive')
                            <div class="stat-active-indicator">Фаол</div>
                        @endif
                    </div>
                </div>

                <!-- Search and Filter Section -->
                <div class="search-section">
                    <div class="search-card">
                        <form method="GET" action="{{ route('frontend.investoram') }}" id="searchForm">
                            <!-- Preserve current status if one is selected -->
                            @if(!empty($currentStatus) && $currentStatus !== 'all')
                                <input type="hidden" name="status" value="{{ $currentStatus }}">
                            @endif

                            <div class="search-grid">
                                <div class="form-group">
                                    <input name="object_number" type="number" class="form-control" placeholder="ID рақами" value="{{ request('object_number') }}">
                                </div>
                                <div class="form-group">
                                    <input name="name" placeholder="Объект номи" class="form-control" value="{{ request('name') }}">
                                </div>
                                <div class="form-group">
                                    <select name="status" class="form-control" onchange="this.form.submit();">
                                        <option value="" {{ $currentStatus == 'all' || empty($currentStatus) ? 'selected' : '' }}>Барча ҳолатлар</option>
                                        <option value="1_step" {{ $currentStatus == '1_step' ? 'selected' : '' }}>1-босқич</option>
                                        <option value="2_step" {{ $currentStatus == '2_step' ? 'selected' : '' }}>2-босқич</option>
                                        <option value="completed" {{ $currentStatus == 'completed' ? 'selected' : '' }}>Тугалланган</option>
                                        <option value="archive" {{ $currentStatus == 'archive' ? 'selected' : '' }}>Архив</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="district" placeholder="Вилоят/туман" class="form-control" value="{{ request('district') }}">
                                </div>
                            </div>
                            <div class="search-actions">
                                <div class="search-buttons">
                                    <button type="submit" class="btn">
                                        Қидируv <i class="fas fa-search"></i>
                                    </button>
                                    <a href="{{ route('frontend.investoram') }}" class="btn btn-reset">
                                        Тозалаш
                                    </a>
                                </div>
                                <div class="pagination-info">
                                    <div class="results-per-page">
                                        <span>Кўрсатиш:</span>
                                        <select name="per_page" onchange="changePerPage(this.value);">
                                            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10</option>
                                            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>25</option>
                                            <option value="50" {{ request('per_page', 10) == 50 ? 'selected' : '' }}>50</option>
                                            <option value="100" {{ request('per_page', 10) == 100 ? 'selected' : '' }}>100</option>
                                        </select>
                                        <span>та натижа</span>
                                    </div>
                                    <div class="total-count">
                                        @if($totalItems > 0)
                                            {{ $startItem }}-{{ $endItem }} дан {{ $totalItems }} та
                                        @else
                                            0 та натижа
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Projects List -->
                <div class="projects-container">
                    @forelse($paginatedProjects as $index => $project)
                    <div class="project-card">
                        <div class="project-header">
                            <div class="project-meta">
                                <div class="project-number">
                                    <span>№</span>
                                    <span>{{ $startItem + $index }}</span>
                                </div>
                                <div class="project-id">
                                    <span>ID:</span>
                                    <span>{{ $project->id ?? '000000000000000' }}</span>
                                </div>
                                @php
                                    $statusClasses = [
                                        '1_step' => 'status-1_step',
                                        '2_step' => 'status-2_step',
                                        'completed' => 'status-completed',
                                        'archive' => 'status-archive'
                                    ];
                                    $statusLabels = [
                                        '1_step' => 'Yildan yilga o\'tuvchi',
                                        '2_step' => 'Jarayonda',
                                        'completed' => 'Tugallangan',
                                        'archive' => 'Arxiv'
                                    ];
                                @endphp
                                <div class="status-badge {{ $statusClasses[$project->status] ?? 'status-1_step' }}">
                                    {{ $statusLabels[$project->status] ?? 'Yildan yilga o\'tuvchi' }}
                                </div>
                            </div>
                            <div class="date-info">
                                <span class="date-label">Foydalanishga topshirish sanasi:</span>
                                @if($project->status == 'completed' && $project->created_at)
                                    <span class="date-value">{{ $project->created_at->format('Y-m-d') }}</span>
                                @else
                                    <span class="date-value in-progress">Jarayonda</span>
                                @endif
                            </div>
                        </div>

                        <div class="project-content">
                            <div class="project-section">
                                <h4>Obyekt nomi</h4>
                                <div class="value primary truncate">{{ $project->district ?? 'Noma\'lum' }} tumani renovatsiya loyihasi</div>

                                <h4>Dastur nomi</h4>
                                <div class="value">Investitsiya dasturi 2025</div>

                                <h4>Soha</h4>
                                <div class="value truncate">Turar joy qurilishi</div>

                                <h4>Qurilish turi</h4>
                                <div class="value">Renovatsiya qilish</div>

                                <h4>A.R.T</h4>
                                <div class="value">
                                    @if($project->elon_fayl)
                                        <a href="{{ asset($project->elon_fayl) }}" target="_blank" class="file-link pdf">
                                            <i class="fas fa-file-pdf file-icon"></i>
                                            <span class="file-name">REN-{{ $project->id }}-{{ date('Y') }}</span>
                                        </a>
                                    @else
                                        <span>Talab etilmaydi</span>
                                    @endif
                                </div>
                            </div>

                            <div class="project-section">
                                <h4>Loyiha tender bo'yicha e'lon</h4>
                                <div class="value">
                                    @if($project->elon_fayl)
                                        <a href="{{ asset($project->elon_fayl) }}" target="_blank" class="file-link pdf">
                                            <i class="fas fa-file-pdf file-icon"></i>
                                            <span class="file-name">Tender e'loni</span>
                                        </a>
                                    @else
                                        <span class="no-data">Ma'lumot mavjud emas</span>
                                    @endif
                                </div>

                                <h4>Loyiha tashkiloti</h4>
                                <div class="value">{{ $project->district ?? 'Noma\'lum' }} LOYIHA INSTITUTI</div>

                                <h4>A.Sh.K. xulosasi</h4>
                                <div class="value">
                                    @if($project->qoshimcha_fayl)
                                        <a href="{{ asset($project->qoshimcha_fayl) }}" target="_blank" class="file-link doc">
                                            <i class="fas fa-file-word file-icon"></i>
                                            <span class="file-name">A.Sh.K. xulosasi</span>
                                        </a>
                                    @else
                                        <span class="no-data">Talab etilmaydi</span>
                                    @endif
                                </div>

                                <h4>Ekspertiza xulosasi</h4>
                                <div class="value">
                                    @if($project->qoshimcha_fayl)
                                        <a href="{{ asset($project->qoshimcha_fayl) }}" target="_blank" class="file-link doc">
                                            <i class="fas fa-file-word file-icon"></i>
                                            <span class="file-name">Ekspertiza №{{ rand(10000, 99999) }}</span>
                                        </a>
                                    @else
                                        <span class="no-data">Talab etilmaydi</span>
                                    @endif
                                </div>
                            </div>

                            <div class="project-section">
                                <h4>Tender bo'yicha e'lon</h4>
                                <div class="value">
                                    @if($project->elon_fayl)
                                        <a href="{{ asset($project->elon_fayl) }}" target="_blank" class="file-link pdf">
                                            <i class="fas fa-file-pdf file-icon"></i>
                                            <span class="file-name">E'lon №{{ rand(20000000, 99999999) }}</span>
                                        </a>
                                        <small style="display: block; color: #6b7280; margin-top: 4px;">
                                            Sana: {{ $project->start_date ? $project->start_date->format('Y-m-d H:i:s') : '2024-01-01 10:00:00' }}
                                        </small>
                                    @else
                                        <span class="no-data">Ma'lumot mavjud emas</span>
                                    @endif
                                </div>

                                <h4>Tender protokoli</h4>
                                <div class="value">
                                    @if($project->pratakol_fayl)
                                        <a href="{{ asset($project->pratakol_fayl) }}" target="_blank" class="file-link excel">
                                            <i class="fas fa-file-excel file-icon"></i>
                                            <span class="file-name">{{ strtoupper($project->district ?? 'NOMA\'LUM') }} QURILISH MCHJ protokoli</span>
                                        </a>
                                    @else
                                        <span class="no-data">Ma'lumot mavjud emas</span>
                                    @endif
                                </div>

                                <h4>Qurilish ro'yxatdan o'tkanligi</h4>
                                <div class="value">
                                    @if($project->created_at)
                                        <div style="font-weight: 600; color: #059669;">
                                            Ro'yxat №{{ rand(10000000, 99999999) }}
                                        </div>
                                        <small style="color: #6b7280;">
                                            Sana: {{ $project->created_at->format('Y-m-d') }}
                                        </small>
                                    @else
                                        <span class="no-data">Ma'lumot mavjud emas</span>
                                    @endif
                                </div>

                                <h4>Q.S.N.I. tomonidan berilgan ko'rsatmalar soni</h4>
                                <div class="value">
                                    <div style="display: flex; align-items: center; gap: 8px;">
                                        <span style="background: #f3f4f6; padding: 4px 8px; border-radius: 4px; font-weight: 600;">
                                            {{ rand(0, 20) }}
                                        </span>
                                        <span style="font-size: 12px; color: #6b7280;">ta ko'rsatma</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <i class="fas fa-building"></i>
                        <h3>Ҳеч қандай лойиҳа топилмади</h3>
                        <p>Қидируv параметрларини ўзгартириб кўринг ёки бошқа статус танланг</p>
                        <a href="{{ route('frontend.investoram') }}" class="btn">
                            Барча лойиҳаларни кўриш
                        </a>
                    </div>
                    @endforelse

                    {{-- Laravel-style Pagination --}}
                    @if($totalPages > 1)
                        <div class="search-card" style="margin-top: 32px;">
                            <div class="pagination-info" style="justify-content: center;">
                                <nav aria-label="Pagination Navigation">
                                    <ul class="pagination">
                                        {{-- Previous Page Link --}}
                                        @if ($currentPage <= 1)
                                            <li class="page-item disabled">
                                                <span class="page-link" aria-hidden="true">
                                                    <i class="fas fa-chevron-left"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $getPaginationUrl($currentPage - 1) }}" rel="prev" aria-label="Олдинги">
                                                    <i class="fas fa-chevron-left"></i>
                                                </a>
                                            </li>
                                        @endif

                                        {{-- Pagination Elements --}}
                                        @php
                                            $start = max(1, $currentPage - 2);
                                            $end = min($totalPages, $currentPage + 2);

                                            // Adjust range if we're near the beginning or end
                                            if ($end - $start < 4) {
                                                if ($start == 1) {
                                                    $end = min($totalPages, $start + 4);
                                                } else {
                                                    $start = max(1, $end - 4);
                                                }
                                            }
                                        @endphp

                                        {{-- First page if not in range --}}
                                        @if($start > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $getPaginationUrl(1) }}">1</a>
                                            </li>
                                            @if($start > 2)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                        @endif

                                        {{-- Page numbers --}}
                                        @for ($page = $start; $page <= $end; $page++)
                                            @if ($page == $currentPage)
                                                <li class="page-item active" aria-current="page">
                                                    <span class="page-link">{{ $page }}</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $getPaginationUrl($page) }}">{{ $page }}</a>
                                                </li>
                                            @endif
                                        @endfor

                                        {{-- Last page if not in range --}}
                                        @if($end < $totalPages)
                                            @if($end < $totalPages - 1)
                                                <li class="page-item disabled">
                                                    <span class="page-link">...</span>
                                                </li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $getPaginationUrl($totalPages) }}">{{ $totalPages }}</a>
                                            </li>
                                        @endif

                                        {{-- Next Page Link --}}
                                        @if ($currentPage >= $totalPages)
                                            <li class="page-item disabled">
                                                <span class="page-link" aria-hidden="true">
                                                    <i class="fas fa-chevron-right"></i>
                                                </span>
                                            </li>
                                        @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $getPaginationUrl($currentPage + 1) }}" rel="next" aria-label="Кейинги">
                                                    <i class="fas fa-chevron-right"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>

                            <div style="text-align: center; margin-top: 16px; color: #6b7280; font-size: 14px;">
                                @if($totalItems > 0)
                                    {{ $startItem }}-{{ $endItem }} дан {{ $totalItems }} та "{{ $statusLabelsUz[$currentStatus] ?? $currentStatus }}" лойиҳаси кўрсатилмоқда
                                @else
                                    "{{ $statusLabelsUz[$currentStatus] ?? $currentStatus }}" ҳолатида лойиҳалар топилмади
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Clickable stat cards for filtering
    window.filterByStatus = function(status) {
        const currentUrl = new URL(window.location);

        // Update status parameter
        if (status) {
            currentUrl.searchParams.set('status', status);
        } else {
            currentUrl.searchParams.delete('status');
        }

        // Reset to first page when changing filter
        currentUrl.searchParams.delete('page');

        // Navigate to new URL
        window.location.href = currentUrl.toString();
    };

    // Per-page selector function that preserves current filters
    window.changePerPage = function(perPage) {
        const url = new URL(window.location);
        url.searchParams.set('per_page', perPage);
        url.searchParams.delete('page'); // Reset to first page but keep other filters
        window.location = url.toString();
    };

    // Progress circle animation
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        const finalOffset = bar.style.strokeDashoffset;
        bar.style.strokeDashoffset = '264';
        setTimeout(() => {
            bar.style.strokeDashoffset = finalOffset;
        }, 300);
    });

    // Add hover effects to clickable stat cards
    const statCards = document.querySelectorAll('.clickable-stat');
    statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(-2px)';
        });
    });

    console.log('Узбек тилида реновация лойиҳалари юкланди');
});
</script>

@endsection
@endsection
