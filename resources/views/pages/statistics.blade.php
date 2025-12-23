@extends('layouts.admin')

@section('title', 'Statistika')

@section('content')
<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .stat-box {
        background: white;
        border-radius: var(--gov-radius);
        padding: 24px;
        box-shadow: var(--gov-shadow-sm);
        border-left: 4px solid var(--gov-primary);
        transition: var(--gov-transition);
    }
    .stat-box:hover {
        transform: translateY(-4px);
        box-shadow: var(--gov-shadow-md);
    }
    .stat-box.success { border-left-color: var(--gov-success); }
    .stat-box.warning { border-left-color: #f39c12; }
    .stat-box.info { border-left-color: #17a2b8; }
    .stat-box.danger { border-left-color: var(--gov-error); }
    .stat-box-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--gov-radius);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 16px;
        background: rgba(45, 74, 111, 0.1);
        color: var(--gov-primary);
    }
    .stat-box.success .stat-box-icon { background: rgba(40, 167, 69, 0.1); color: var(--gov-success); }
    .stat-box.warning .stat-box-icon { background: rgba(255, 193, 7, 0.15); color: #f39c12; }
    .stat-box.info .stat-box-icon { background: rgba(23, 162, 184, 0.1); color: #17a2b8; }
    .stat-box.danger .stat-box-icon { background: rgba(220, 53, 69, 0.1); color: var(--gov-error); }
    .stat-box-value {
        font-size: 2.2rem;
        font-weight: 800;
        color: var(--gov-text-dark);
        line-height: 1;
        margin-bottom: 6px;
    }
    .stat-box-label {
        color: var(--gov-text-body);
        font-size: 0.9rem;
        font-weight: 500;
    }
    .data-table {
        width: 100%;
    }
    .data-table tr {
        border-bottom: 1px solid var(--gov-border);
    }
    .data-table tr:last-child {
        border-bottom: none;
    }
    .data-table td {
        padding: 14px 0;
    }
    .data-table td:last-child {
        text-align: right;
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--gov-primary);
    }
    .status-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }
    .status-item {
        padding: 20px;
        border-radius: var(--gov-radius);
        text-align: center;
    }
    .status-item-icon {
        font-size: 1.75rem;
        margin-bottom: 8px;
    }
    .status-item-value {
        font-size: 1.75rem;
        font-weight: 800;
        margin-bottom: 4px;
    }
    .status-item-label {
        font-size: 0.85rem;
        font-weight: 500;
    }
    @media (max-width: 768px) {
        .status-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-chart-line"></i> Statistika</h1>
        <p>Tizim statistikasi va ko'rsatkichlari</p>
    </div>
</div>

<!-- Main Stats -->
<div class="stats-grid">
    <div class="stat-box">
        <div class="stat-box-icon"><i class="fas fa-newspaper"></i></div>
        <div class="stat-box-value">{{ \App\Models\News::count() }}</div>
        <div class="stat-box-label">Yangiliklar</div>
    </div>
    <div class="stat-box success">
        <div class="stat-box-icon"><i class="fas fa-building"></i></div>
        <div class="stat-box-value">{{ \App\Models\Project::count() }}</div>
        <div class="stat-box-label">Loyihalar</div>
    </div>
    <div class="stat-box warning">
        <div class="stat-box-icon"><i class="fas fa-gavel"></i></div>
        <div class="stat-box-value">{{ \App\Models\Tender::count() }}</div>
        <div class="stat-box-label">Tenderlar</div>
    </div>
    <div class="stat-box info">
        <div class="stat-box-icon"><i class="fas fa-users"></i></div>
        <div class="stat-box-value">{{ \App\Models\User::count() }}</div>
        <div class="stat-box-label">Foydalanuvchilar</div>
    </div>
</div>

<!-- Page Views Stats -->
@php
    $totalViews = \App\Models\PageView::count();
    $uniqueVisitors = \App\Models\PageView::distinct('ip_address')->count('ip_address');
    $todayViews = \App\Models\PageView::whereDate('visited_at', today())->count();
    $monthViews = \App\Models\PageView::whereMonth('visited_at', now()->month)->whereYear('visited_at', now()->year)->count();
@endphp

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
    <!-- Page Views -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-eye"></i> Sayt ko'rishlari</h3>
        </div>
        <div class="admin-card-body">
            <table class="data-table">
                <tr>
                    <td><i class="fas fa-chart-bar" style="color: var(--gov-primary); margin-right: 10px;"></i> Jami ko'rishlar</td>
                    <td>{{ number_format($totalViews) }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-user" style="color: var(--gov-success); margin-right: 10px;"></i> Unikal tashrif buyuruvchilar</td>
                    <td>{{ number_format($uniqueVisitors) }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-calendar-day" style="color: #17a2b8; margin-right: 10px;"></i> Bugungi ko'rishlar</td>
                    <td>{{ number_format($todayViews) }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-calendar-alt" style="color: #f39c12; margin-right: 10px;"></i> Ushbu oydagi ko'rishlar</td>
                    <td>{{ number_format($monthViews) }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Investor Ideas -->
    @php
        $totalIdeas = \App\Models\InvestorIdea::count();
        $pendingIdeas = \App\Models\InvestorIdea::where('status', 'pending')->count();
        $approvedIdeas = \App\Models\InvestorIdea::where('status', 'approved')->count();
        $recentIdeas = \App\Models\InvestorIdea::where('created_at', '>=', now()->subDays(30))->count();
    @endphp
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-lightbulb"></i> Investor takliflari</h3>
        </div>
        <div class="admin-card-body">
            <table class="data-table">
                <tr>
                    <td><i class="fas fa-inbox" style="color: var(--gov-primary); margin-right: 10px;"></i> Jami takliflar</td>
                    <td>{{ $totalIdeas }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-clock" style="color: #f39c12; margin-right: 10px;"></i> Kutilayotgan</td>
                    <td>{{ $pendingIdeas }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-check-circle" style="color: var(--gov-success); margin-right: 10px;"></i> Tasdiqlangan</td>
                    <td>{{ $approvedIdeas }}</td>
                </tr>
                <tr>
                    <td><i class="fas fa-calendar-plus" style="color: #17a2b8; margin-right: 10px;"></i> So'nggi 30 kunda</td>
                    <td>{{ $recentIdeas }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- Project Status -->
<div class="admin-card" style="margin-bottom: 24px;">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-project-diagram"></i> Loyiha holatlari</h3>
    </div>
    <div class="admin-card-body">
        <div class="status-grid">
            <div class="status-item" style="background: rgba(45, 74, 111, 0.1);">
                <div class="status-item-icon" style="color: var(--gov-primary);"><i class="fas fa-play-circle"></i></div>
                <div class="status-item-value" style="color: var(--gov-primary);">{{ \App\Models\Project::where('status', '1_step')->count() }}</div>
                <div class="status-item-label">1-Bosqich</div>
            </div>
            <div class="status-item" style="background: rgba(255, 193, 7, 0.15);">
                <div class="status-item-icon" style="color: #f39c12;"><i class="fas fa-forward"></i></div>
                <div class="status-item-value" style="color: #f39c12;">{{ \App\Models\Project::where('status', '2_step')->count() }}</div>
                <div class="status-item-label">2-Bosqich</div>
            </div>
            <div class="status-item" style="background: rgba(40, 167, 69, 0.1);">
                <div class="status-item-icon" style="color: var(--gov-success);"><i class="fas fa-check-circle"></i></div>
                <div class="status-item-value" style="color: var(--gov-success);">{{ \App\Models\Project::where('status', 'completed')->count() }}</div>
                <div class="status-item-label">Yakunlangan</div>
            </div>
            <div class="status-item" style="background: rgba(108, 117, 125, 0.1);">
                <div class="status-item-icon" style="color: #6c757d;"><i class="fas fa-archive"></i></div>
                <div class="status-item-value" style="color: #6c757d;">{{ \App\Models\Project::where('status', 'archive')->count() }}</div>
                <div class="status-item-label">Arxiv</div>
            </div>
        </div>
    </div>
</div>

<!-- Tender Status -->
<div class="admin-card" style="margin-bottom: 24px;">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-gavel"></i> Tender holatlari</h3>
    </div>
    <div class="admin-card-body">
        <div class="status-grid">
            <div class="status-item" style="background: rgba(255, 193, 7, 0.15);">
                <div class="status-item-icon" style="color: #f39c12;"><i class="fas fa-edit"></i></div>
                <div class="status-item-value" style="color: #f39c12;">{{ \App\Models\Tender::where('status', 'draft')->count() }}</div>
                <div class="status-item-label">Qoralama</div>
            </div>
            <div class="status-item" style="background: rgba(40, 167, 69, 0.1);">
                <div class="status-item-icon" style="color: var(--gov-success);"><i class="fas fa-check-circle"></i></div>
                <div class="status-item-value" style="color: var(--gov-success);">{{ \App\Models\Tender::where('status', 'active')->count() }}</div>
                <div class="status-item-label">Faol</div>
            </div>
            <div class="status-item" style="background: rgba(108, 117, 125, 0.1);">
                <div class="status-item-icon" style="color: #6c757d;"><i class="fas fa-lock"></i></div>
                <div class="status-item-value" style="color: #6c757d;">{{ \App\Models\Tender::where('status', 'closed')->count() }}</div>
                <div class="status-item-label">Yopiq</div>
            </div>
            <div class="status-item" style="background: rgba(220, 53, 69, 0.1);">
                <div class="status-item-icon" style="color: var(--gov-error);"><i class="fas fa-ban"></i></div>
                <div class="status-item-value" style="color: var(--gov-error);">{{ \App\Models\Tender::where('status', 'cancelled')->count() }}</div>
                <div class="status-item-label">Bekor qilingan</div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Links -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-link"></i> Tezkor havolalar</h3>
    </div>
    <div class="admin-card-body">
        <div style="display: flex; flex-wrap: wrap; gap: 12px;">
            <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-primary">
                <i class="fas fa-newspaper"></i> Yangiliklar
            </a>
            <a href="{{ route('projects.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-building"></i> Loyihalar
            </a>
            <a href="{{ route('admin.tenders.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-gavel"></i> Tenderlar
            </a>
            <a href="{{ route('userIndex') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-users"></i> Foydalanuvchilar
            </a>
            <a href="{{ route('frontend.index') }}" target="_blank" class="gov-btn gov-btn-success">
                <i class="fas fa-globe"></i> Saytni ko'rish
            </a>
        </div>
    </div>
</div>
@endsection
