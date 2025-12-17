@extends('layouts.frontend_app')
@section('title', __('frontend.tenders.title') . ' | ' . __('frontend.seo.site_name'))
@section('description', __('frontend.tenders.subtitle'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.tenders.title')"
        :subtitle="__('frontend.tenders.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-gavel"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.tenders.title')]
        ]"
    />

    {{-- Statistics --}}
    <x-frontend.section bg="light">
        <div class="gov-stats-row gov-animate-fade">
            <div class="gov-stat-card">
                <div class="gov-stat-icon"><i class="fa-solid fa-clipboard-list"></i></div>
                <div class="gov-stat-number">{{ $stats['total'] }}</div>
                <div class="gov-stat-label">{{ __('frontend.tenders.stats_total') }}</div>
            </div>
            <div class="gov-stat-card">
                <div class="gov-stat-icon" style="color: #27ae60;"><i class="fa-solid fa-door-open"></i></div>
                <div class="gov-stat-number" style="color: #27ae60;">{{ $stats['open'] }}</div>
                <div class="gov-stat-label">{{ __('frontend.tenders.stats_open') }}</div>
            </div>
            <div class="gov-stat-card">
                <div class="gov-stat-icon" style="color: #dc3545;"><i class="fa-solid fa-bell"></i></div>
                <div class="gov-stat-number" style="color: #dc3545;">{{ $stats['urgent'] }}</div>
                <div class="gov-stat-label">{{ __('frontend.tenders.stats_urgent') }}</div>
            </div>
        </div>
    </x-frontend.section>

    {{-- Search & Filter --}}
    <x-frontend.section bg="white">
        <div class="gov-search-form gov-animate-fade" data-delay="0.1">
            <form method="GET" action="{{ route('frontend.tenders.index') }}">
                <div class="gov-form-row">
                    <div class="gov-form-group" style="flex: 2;">
                        <label for="search">{{ __('frontend.tenders.search') }}</label>
                        <input type="text" id="search" name="search" class="gov-form-control"
                               value="{{ request('search') }}" placeholder="{{ __('frontend.tenders.search_placeholder') }}">
                    </div>
                    <div class="gov-form-group">
                        <label for="deadline_status">{{ __('frontend.tenders.filter_status') }}</label>
                        <select id="deadline_status" name="deadline_status" class="gov-form-control">
                            <option value="">{{ __('frontend.common.all') }}</option>
                            <option value="open" {{ request('deadline_status') == 'open' ? 'selected' : '' }}>{{ __('frontend.tenders.filter_open') }}</option>
                            <option value="closed" {{ request('deadline_status') == 'closed' ? 'selected' : '' }}>{{ __('frontend.tenders.filter_closed') }}</option>
                        </select>
                    </div>
                    <div class="gov-form-group">
                        <label for="date_from">{{ __('frontend.media.date_from') }}</label>
                        <input type="date" id="date_from" name="date_from" class="gov-form-control" value="{{ request('date_from') }}">
                    </div>
                    <div class="gov-form-group gov-form-actions">
                        <button type="submit" class="gov-btn gov-btn-primary">
                            <i class="fa-solid fa-search"></i> {{ __('frontend.common.search') }}
                        </button>
                        @if(request()->hasAny(['search', 'deadline_status', 'date_from', 'date_to']))
                            <a href="{{ route('frontend.tenders.index') }}" class="gov-btn gov-btn-secondary">
                                {{ __('frontend.media.reset_filters') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </x-frontend.section>

    {{-- Tenders List --}}
    <x-frontend.section bg="white">
        @if($tenders->count() > 0)
            <div class="gov-results-info gov-animate-fade" data-delay="0.2">
                <p>{{ __('frontend.common.showing') }} {{ $tenders->firstItem() ?? 0 }} - {{ $tenders->lastItem() ?? 0 }} {{ __('frontend.common.of') }} {{ $tenders->total() }} {{ __('frontend.common.results') }}</p>
            </div>

            <div class="tender-grid">
                @foreach($tenders as $index => $tender)
                    <article class="tender-card gov-animate-fade" data-delay="{{ 0.1 + ($index * 0.05) }}">
                        <div class="tender-header">
                            <div class="tender-badges">
                                @if($tender->is_urgent)
                                    <span class="tender-badge tender-badge-urgent">
                                        <i class="fa-solid fa-bell"></i> {{ __('frontend.tenders.urgent') }}
                                    </span>
                                @endif
                                @if($tender->isOpen())
                                    <span class="tender-badge tender-badge-open">{{ __('frontend.tenders.status_active') }}</span>
                                @else
                                    <span class="tender-badge tender-badge-closed">{{ __('frontend.tenders.deadline_expired') }}</span>
                                @endif
                            </div>
                            @if($tender->code)
                                <span class="tender-code">{{ $tender->code }}</span>
                            @endif
                        </div>

                        <h3 class="tender-title">
                            <a href="{{ route('frontend.tenders.show', $tender->id) }}">
                                {{ Str::limit($tender->getLocalizedTitle(), 80) }}
                            </a>
                        </h3>

                        <p class="tender-subject">{{ Str::limit($tender->getLocalizedSubject(), 120) }}</p>

                        <div class="tender-info">
                            <div class="tender-info-item">
                                <i class="fa-solid fa-map-marker-alt"></i>
                                <span>{{ Str::limit($tender->getLocalizedLocation(), 40) }}</span>
                            </div>
                            <div class="tender-info-item">
                                <i class="fa-regular fa-calendar"></i>
                                <span>{{ __('frontend.tenders.announced') }}: {{ $tender->announcement_date->format('d.m.Y') }}</span>
                            </div>
                        </div>

                        <div class="tender-footer">
                            <div class="tender-deadline {{ $tender->isExpired() ? 'expired' : ($tender->getDaysRemaining() <= 3 ? 'urgent' : 'open') }}">
                                <i class="fa-solid fa-clock"></i>
                                @if($tender->isExpired())
                                    <span>{{ __('frontend.tenders.deadline_expired') }}</span>
                                @else
                                    <span>{{ $tender->getDaysRemaining() }} {{ __('frontend.tenders.days_left') }}</span>
                                @endif
                            </div>
                            <a href="{{ route('frontend.tenders.show', $tender->id) }}" class="tender-link">
                                {{ __('frontend.common.details') }} <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            @if($tenders->hasPages())
                <div class="gov-pagination">
                    {{ $tenders->links('pagination::bootstrap-4') }}
                </div>
            @endif
        @else
            <x-frontend.info-box type="info">
                <h4>{{ __('frontend.tenders.no_tenders') }}</h4>
                <p>{{ __('frontend.tenders.no_tenders_message') }}</p>
                @if(request()->hasAny(['search', 'deadline_status', 'date_from']))
                    <a href="{{ route('frontend.tenders.index') }}" class="gov-btn gov-btn-primary" style="margin-top: 15px;">
                        {{ __('frontend.media.reset_filters') }}
                    </a>
                @endif
            </x-frontend.info-box>
        @endif
    </x-frontend.section>
</div>

<style>
.tender-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 24px;
    margin-top: 24px;
}

.tender-card {
    background: white;
    border: 2px solid var(--gov-border);
    padding: 24px;
    transition: var(--gov-transition);
    display: flex;
    flex-direction: column;
}

.tender-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--gov-shadow-lg);
    border-color: var(--gov-primary);
}

.tender-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 15px;
    gap: 10px;
}

.tender-badges {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.tender-badge {
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 600;
}

.tender-badge-urgent {
    background: #dc3545;
    color: white;
    animation: pulse 2s infinite;
}

.tender-badge-open {
    background: #d4edda;
    color: #155724;
}

.tender-badge-closed {
    background: #d6d8db;
    color: #383d41;
}

.tender-code {
    font-size: 0.75rem;
    color: var(--gov-text-muted);
    font-family: monospace;
}

.tender-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 12px;
    line-height: 1.4;
}

.tender-title a {
    color: var(--gov-text-dark);
    text-decoration: none;
}

.tender-title a:hover {
    color: var(--gov-primary);
}

.tender-subject {
    color: var(--gov-text-muted);
    font-size: 0.9rem;
    margin-bottom: 15px;
    flex: 1;
}

.tender-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 20px;
    padding-bottom: 15px;
    border-bottom: 1px solid var(--gov-border);
}

.tender-info-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.85rem;
    color: var(--gov-text-muted);
}

.tender-info-item i {
    color: var(--gov-primary);
    width: 16px;
}

.tender-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.tender-deadline {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.85rem;
    font-weight: 600;
}

.tender-deadline.open {
    color: #27ae60;
}

.tender-deadline.urgent {
    color: #dc3545;
}

.tender-deadline.expired {
    color: #6c757d;
}

.tender-link {
    color: var(--gov-primary);
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.tender-link:hover {
    text-decoration: underline;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.8; }
}

@media (max-width: 768px) {
    .tender-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');

        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            const delay = parseFloat(el.dataset.delay) || 0;
            gsap.fromTo(el,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.5, delay: delay,
                  scrollTrigger: { trigger: el, start: 'top 90%' } }
            );
        });
    }
});
</script>
@endsection
