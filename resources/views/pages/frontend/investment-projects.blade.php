@extends('layouts.frontend_app')
@section('title', __('frontend.footer.investment_projects'))
@section('frontent_content')

{{-- Hero Section using Component --}}
<x-frontend.hero
    :title="__('frontend.footer.investment_projects')"
    :subtitle="__('frontend.company.name') . ' ' . __('frontend.investment.announces_competition')"
    :badge="__('frontend.nav.investors')"
    badgeIcon="fa-building-columns"
    :breadcrumbs="[
        ['label' => __('frontend.breadcrumb.home'), 'url' => route('frontend.index')],
        ['label' => __('frontend.footer.investment_projects'), 'url' => '#']
    ]"
/>

{{-- Main Projects Section --}}
<section class="gov-projects-section">
    <div class="gov-container">
        {{-- Section Header --}}
        <div class="gov-section-header">
            <div>
                <h2 class="gov-section-title">{{ __('frontend.renovation.available_projects') }}</h2>
                <p class="gov-section-subtitle">{{ __('frontend.investment.select_project') }}</p>
            </div>
            <div class="gov-filter-controls">
                <button class="gov-filter-btn active" data-filter="all">
                    <i class="fa-solid fa-list"></i>
                    {{ __('frontend.common.all_projects') }}
                </button>
                <button class="gov-filter-btn" data-filter="active">
                    <i class="fa-solid fa-check-circle"></i>
                    {{ __('frontend.common.active') }}
                </button>
                <button class="gov-filter-btn" data-filter="archive">
                    <i class="fa-solid fa-box-archive"></i>
                    {{ __('frontend.common.archive') }}
                </button>
            </div>
        </div>

        {{-- Projects Grid --}}
        <div class="gov-projects-grid" id="projectsGrid">
            @forelse($projects as $project)
            <article class="gov-project-card {{ $project->status }}" data-category="{{ $project->status }}">
                <div class="gov-project-header">
                    <div class="gov-project-status {{ $project->status == 'active' ? 'success' : 'archive' }}">
                        <i class="fa-solid fa-{{ $project->status == 'active' ? 'check-circle' : 'box-archive' }}"></i>
                        {{ $project->status == 'active' ? __('frontend.common.active') : __('frontend.common.archive') }}
                    </div>
                    <div class="gov-project-id">{{ $project->project_code }}</div>
                </div>

                <div class="gov-project-location">
                    <div class="gov-project-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="gov-project-title">{{ $project->getDistrict($locale) }}</h3>
                        @if($project->getMahalla($locale))
                        <p class="gov-project-subtitle">{{ __('frontend.renovation.mahalla') }} {{ $project->getMahalla($locale) }}</p>
                        @endif
                    </div>
                </div>

                <div class="gov-project-body">
                    <div class="gov-project-details">
                        <div class="gov-detail-row">
                            <div class="gov-detail-label">
                                <i class="fa-solid fa-vector-square"></i>
                                {{ __('frontend.renovation.land_area') }}
                            </div>
                            <div class="gov-detail-value">{{ number_format($project->land_area, 4) }} {{ __('frontend.renovation.hectares') }}</div>
                        </div>
                        <div class="gov-detail-row">
                            <div class="gov-detail-label">
                                <i class="fa-solid fa-clock"></i>
                                {{ __('frontend.investment.deadline') }}
                            </div>
                            <div class="gov-detail-value">
                                {{ $project->has_extension && $project->extended_deadline ? $project->getFormattedExtendedDeadline() : $project->getFormattedDeadline() }}
                                @if($project->isExpired())
                                <span class="gov-deadline-expired">{{ __('frontend.investment.expired') }}</span>
                                @else
                                <span class="gov-deadline-active">{{ __('frontend.common.active') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if($project->has_extension && $project->getExtensionNote($locale))
                    <div class="gov-project-notice">
                        <div class="gov-project-notice-icon">
                            <i class="fa-solid fa-bell"></i>
                        </div>
                        <div>
                            <div class="gov-project-notice-title">{{ __('frontend.investment.extension_notice') }}</div>
                            <p class="gov-project-notice-text">{{ $project->getExtensionNote($locale) }}</p>
                        </div>
                    </div>
                    @endif

                    <div class="gov-project-actions">
                        @if($project->announcement_pdf)
                        <a href="{{ asset($project->announcement_pdf) }}"
                           class="gov-project-btn primary" download>
                            <i class="fa-solid fa-file-pdf"></i>
                            {{ __('frontend.tenders.announcement') }}
                        </a>
                        @endif
                        @if($project->attachments_zip)
                        <a href="{{ asset($project->attachments_zip) }}" class="gov-project-btn secondary" download>
                            <i class="fa-solid fa-download"></i>
                            {{ __('frontend.investment.attachments') }}
                        </a>
                        @endif
                    </div>
                </div>
            </article>
            @empty
            <div class="gov-empty-state">
                <i class="fa-solid fa-inbox" style="font-size: 3rem; color: var(--gov-text-muted); margin-bottom: 16px;"></i>
                <p>{{ __('frontend.common.no_projects') }}</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.gov-filter-btn');
    const projectCards = document.querySelectorAll('.gov-project-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.dataset.filter;

            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Filter cards
            projectCards.forEach(card => {
                const category = card.dataset.category;
                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    gsap.fromTo(card, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.4 });
                } else {
                    gsap.to(card, { opacity: 0, y: -10, duration: 0.2, onComplete: () => card.style.display = 'none' });
                }
            });
        });
    });

    // GSAP animations
    if (typeof gsap !== 'undefined') {
        gsap.from('.gov-project-card', {
            opacity: 0,
            y: 30,
            duration: 0.5,
            stagger: 0.1,
            scrollTrigger: {
                trigger: '.gov-projects-grid',
                start: 'top 80%'
            }
        });
    }
});
</script>
@endpush
