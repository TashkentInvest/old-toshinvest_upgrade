@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<style>
    .welcome-card {
        background: linear-gradient(135deg, var(--gov-primary) 0%, var(--gov-primary-darker) 100%);
        border-radius: var(--gov-radius);
        padding: 32px;
        color: white;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }
    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255,255,255,0.1);
        border-radius: 50%;
    }
    .welcome-card h1 {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0 0 8px;
    }
    .welcome-card p {
        margin: 0;
        opacity: 0.9;
    }
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin-bottom: 30px;
    }
    .quick-action {
        background: white;
        border-radius: var(--gov-radius);
        padding: 20px;
        text-align: center;
        text-decoration: none;
        color: var(--gov-text-dark);
        box-shadow: var(--gov-shadow-sm);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }
    .quick-action:hover {
        transform: translateY(-4px);
        box-shadow: var(--gov-shadow-md);
        border-color: var(--gov-primary);
        color: var(--gov-primary);
    }
    .quick-action i {
        font-size: 2rem;
        color: var(--gov-primary);
        margin-bottom: 12px;
        display: block;
    }
    .quick-action span {
        font-weight: 600;
        font-size: 0.95rem;
    }
    .recent-section {
        margin-top: 30px;
    }
    .recent-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        border-bottom: 1px solid var(--gov-border);
    }
    .recent-item:last-child {
        border-bottom: none;
    }
    .recent-item-icon {
        width: 44px;
        height: 44px;
        background: rgba(45, 74, 111, 0.1);
        border-radius: var(--gov-radius);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gov-primary);
    }
    .recent-item-content {
        flex: 1;
    }
    .recent-item-title {
        font-weight: 600;
        color: var(--gov-text-dark);
        margin-bottom: 4px;
    }
    .recent-item-meta {
        font-size: 0.85rem;
        color: var(--gov-text-muted);
    }
    .system-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
    }
    .system-info-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid var(--gov-border);
    }
    .system-info-item:last-child {
        border-bottom: none;
    }
    .system-info-label {
        color: var(--gov-text-muted);
    }
    .system-info-value {
        font-weight: 600;
        color: var(--gov-text-dark);
    }
</style>

<!-- Welcome Card -->
<div class="welcome-card">
    <h1>Xush kelibsiz, {{ auth()->user()->name }}!</h1>
    <p>Tashkent Invest CRM boshqaruv paneli</p>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-newspaper"></i></div>
        <div class="admin-stat-value">{{ \App\Models\News::count() }}</div>
        <div class="admin-stat-label">Yangiliklar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-building"></i></div>
        <div class="admin-stat-value">{{ \App\Models\Project::count() }}</div>
        <div class="admin-stat-label">Loyihalar</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-handshake"></i></div>
        <div class="admin-stat-value">{{ \App\Models\Tender::where('status', 'active')->count() }}</div>
        <div class="admin-stat-label">Faol tenderlar</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-users"></i></div>
        <div class="admin-stat-value">{{ \App\Models\User::count() }}</div>
        <div class="admin-stat-label">Foydalanuvchilar</div>
    </div>
</div>

<!-- Quick Actions -->
<h3 style="margin-bottom: 16px; color: var(--gov-text-dark); font-weight: 700;">
    <i class="fas fa-bolt" style="color: var(--gov-gold);"></i> Tezkor amallar
</h3>
<div class="quick-actions">
    <a href="{{ route('admin.news.create') }}" class="quick-action">
        <i class="fas fa-plus-circle"></i>
        <span>Yangilik qo'shish</span>
    </a>
    <a href="{{ route('admin.tenders.create') }}" class="quick-action">
        <i class="fas fa-file-contract"></i>
        <span>Tender yaratish</span>
    </a>
    <a href="{{ route('projects.create') }}" class="quick-action">
        <i class="fas fa-building"></i>
        <span>Loyiha qo'shish</span>
    </a>
    @can('user.add')
    <a href="{{ route('userAdd') }}" class="quick-action">
        <i class="fas fa-user-plus"></i>
        <span>Foydalanuvchi</span>
    </a>
    @endcan
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
    <!-- Recent News -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-clock"></i> So'nggi yangiliklar</h3>
            <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-sm gov-btn-secondary">Barchasini ko'rish</a>
        </div>
        <div class="admin-card-body" style="padding: 0;">
            @php
                $recentNews = \App\Models\News::orderBy('created_at', 'desc')->take(5)->get();
            @endphp
            @forelse($recentNews as $news)
            <div class="recent-item">
                <div class="recent-item-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="recent-item-content">
                    <div class="recent-item-title">{{ Str::limit($news->title, 50) }}</div>
                    <div class="recent-item-meta">
                        <i class="fas fa-calendar"></i> {{ $news->created_at->format('d.m.Y H:i') }}
                    </div>
                </div>
                <a href="{{ route('admin.news.show', $news) }}" class="gov-btn gov-btn-sm gov-btn-secondary">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
            @empty
            <div style="padding: 40px; text-align: center; color: var(--gov-text-muted);">
                <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 12px;"></i>
                <p>Hali yangiliklar yo'q</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- System Info -->
    <div class="admin-card">
        <div class="admin-card-header">
            <h3 class="admin-card-title"><i class="fas fa-server"></i> Tizim</h3>
        </div>
        <div class="admin-card-body">
            <div class="system-info-item">
                <span class="system-info-label">Laravel versiya</span>
                <span class="system-info-value">{{ app()->version() }}</span>
            </div>
            <div class="system-info-item">
                <span class="system-info-label">PHP versiya</span>
                <span class="system-info-value">{{ phpversion() }}</span>
            </div>
            <div class="system-info-item">
                <span class="system-info-label">Server vaqti</span>
                <span class="system-info-value">{{ now()->format('d.m.Y H:i') }}</span>
            </div>
            <div class="system-info-item">
                <span class="system-info-label">Muhit</span>
                <span class="system-info-value">{{ app()->environment() }}</span>
            </div>

            <div style="margin-top: 20px;">
                <a href="{{ route('optimize.command') }}" class="gov-btn gov-btn-primary" style="width: 100%;">
                    <i class="fas fa-sync-alt"></i> Keshni tozalash
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
