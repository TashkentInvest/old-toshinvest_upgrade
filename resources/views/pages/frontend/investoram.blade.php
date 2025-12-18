@extends('layouts.frontend_app')
@section('title', __('frontend.renovation.title'))
@section('frontent_content')

{{-- Hero Section using Component --}}
<x-frontend.hero
    :title="__('frontend.renovation.title')"
    :subtitle="__('frontend.renovation.subtitle')"
    :badge="__('frontend.nav.investors')"
    badgeIcon="fa-building-columns"
    :breadcrumbs="[
        ['label' => __('frontend.breadcrumb.home'), 'url' => route('frontend.index')],
        ['label' => __('frontend.renovation.title'), 'url' => '#']
    ]"
/>

{{-- Main Projects Section --}}
<section class="gov-projects-section">
    <div class="gov-container">
        {{-- Section Header --}}
        <div class="gov-section-header">
            <div>
                <h2 class="gov-section-title">{{ __('frontend.renovation.available_projects') }}</h2>
                <p class="gov-section-subtitle">{{ __('frontend.renovation.choose_project') }}</p>
            </div>
            <div class="gov-filter-controls">
                {{-- Search Input --}}
                <div style="position: relative;">
                    <i class="fa-solid fa-search" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
                    <input type="text" id="searchInput" value="{{ request('q') }}"
                           placeholder="{{ __('frontend.renovation.search_projects') }}" class="gov-search-input">
                </div>

                {{-- Status Filter --}}
                <select id="statusSelect" class="gov-select">
                    <option value="">{{ __('frontend.renovation.all_stages') }}</option>
                    <option value="1_step" {{ request('status') == '1_step' ? 'selected' : '' }}>{{ __('frontend.renovation.stage_1') }}</option>
                    <option value="2_step" {{ request('status') == '2_step' ? 'selected' : '' }}>{{ __('frontend.renovation.stage_2') }}</option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>{{ __('frontend.renovation.completed') }}</option>
                    <option value="archive" {{ request('status') == 'archive' ? 'selected' : '' }}>{{ __('frontend.renovation.archive') }}</option>
                </select>
            </div>
        </div>

        {{-- Projects Container --}}
        <div id="projectsContainer">
            @php
                $statusTitles = [
                    '1_step' => __('frontend.renovation.stage_1') . ' - ' . __('frontend.status.in_progress'),
                    '2_step' => __('frontend.renovation.stage_2') . ' - ' . __('frontend.status.in_progress'),
                    'completed' => __('frontend.renovation.completed'),
                    'archive' => __('frontend.renovation.archive'),
                ];
                $statusColors = [
                    '1_step' => 'primary',
                    '2_step' => 'warning',
                    'completed' => 'success',
                    'archive' => 'archive',
                ];
                $statusIcons = [
                    '1_step' => 'fa-rocket',
                    '2_step' => 'fa-bolt',
                    'completed' => 'fa-circle-check',
                    'archive' => 'fa-box-archive',
                ];
                $groupedProjects = $projects->groupBy('status');
            @endphp

            @forelse($statusTitles as $statusKey => $statusTitle)
                @if (isset($groupedProjects[$statusKey]) && $groupedProjects[$statusKey]->count() > 0)
                    <div class="gov-status-group" data-status="{{ $statusKey }}">
                        <div class="gov-status-badge-lg {{ $statusColors[$statusKey] ?? 'primary' }}">
                            <i class="fa-solid {{ $statusIcons[$statusKey] ?? 'fa-clipboard' }}"></i>
                            <span>{{ $statusTitle }}</span>
                            <span class="gov-status-count">{{ $groupedProjects[$statusKey]->count() }}</span>
                        </div>

                        <div class="gov-projects-grid">
                            @foreach ($groupedProjects[$statusKey] as $project)
                                <article class="gov-project-card {{ $statusColors[$statusKey] ?? 'primary' }}" data-category="{{ $statusKey }}">
                                    <div class="gov-project-header">
                                        <div class="gov-project-status {{ $statusColors[$statusKey] ?? 'primary' }}">
                                            <i class="fa-solid {{ $statusIcons[$statusKey] ?? 'fa-clipboard' }}"></i>
                                            {{ $statusTitles[$statusKey] ?? $statusKey }}
                                        </div>
                                        <div class="gov-project-id">REN-{{ $project->id }}</div>
                                    </div>

                                    <div class="gov-project-location">
                                        <div class="gov-project-icon">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div>
                                            <h3 class="gov-project-title">{{ $project->district }}{{ __('frontend.renovation.district') }}</h3>
                                            @if ($project->mahalla)
                                                <p class="gov-project-subtitle">{{ __('frontend.renovation.mahalla') }} {{ $project->mahalla }}</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="gov-project-body">
                                        <div class="gov-project-details">
                                            @if ($project->land)
                                                <div class="gov-detail-row">
                                                    <div class="gov-detail-label">
                                                        <i class="fa-solid fa-vector-square"></i>
                                                        {{ __('frontend.renovation.land_area') }}
                                                    </div>
                                                    <div class="gov-detail-value">{{ $project->land }} {{ __('frontend.renovation.hectares') }}</div>
                                                </div>
                                            @endif

                                            @if ($project->srok_realizatsi)
                                                <div class="gov-detail-row">
                                                    <div class="gov-detail-label">
                                                        <i class="fa-solid fa-hourglass-half"></i>
                                                        {{ __('frontend.renovation.implementation_period') }}
                                                    </div>
                                                    <div class="gov-detail-value">{{ $project->srok_realizatsi }} {{ __('frontend.renovation.months') }}</div>
                                                </div>
                                            @endif

                                            <div class="gov-detail-row">
                                                <div class="gov-detail-label">
                                                    <i class="fa-solid fa-calendar"></i>
                                                    {{ __('frontend.renovation.first_stage') }}
                                                </div>
                                                <div class="gov-detail-value">
                                                    {{ $project->start_date ? $project->start_date->format('d.m.Y') : __('frontend.renovation.not_specified') }}
                                                    —
                                                    {{ $project->end_date ? $project->end_date->format('d.m.Y') : __('frontend.renovation.not_specified') }}
                                                </div>
                                            </div>

                                            <div class="gov-detail-row">
                                                <div class="gov-detail-label">
                                                    <i class="fa-solid fa-calendar-check"></i>
                                                    {{ __('frontend.renovation.second_stage') }}
                                                </div>
                                                <div class="gov-detail-value">
                                                    {{ $project->second_stage_start_date ? $project->second_stage_start_date->format('d.m.Y') : __('frontend.renovation.not_specified') }}
                                                    —
                                                    {{ $project->second_stage_end_date ? $project->second_stage_end_date->format('d.m.Y') : __('frontend.renovation.not_specified') }}
                                                </div>
                                            </div>
                                        </div>

                                        @if (!empty($project->comment))
                                            <div class="gov-project-notice">
                                                <div class="gov-project-notice-icon">
                                                    <i class="fa-solid fa-info-circle"></i>
                                                </div>
                                                <div>
                                                    <div class="gov-project-notice-title">{{ __('frontend.renovation.project_comment') }}</div>
                                                    <p class="gov-project-notice-text">{{ Str::limit($project->comment, 120) }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="gov-project-actions">
                                            @if ($project->elon_fayl)
                                                <a href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank"
                                                   class="gov-project-btn primary">
                                                    <i class="fa-solid fa-file-alt"></i>
                                                    {{ __('frontend.renovation.announcement_stage1') }}
                                                </a>
                                            @endif

                                            @if ($project->pratakol_fayl)
                                                <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank"
                                                   class="gov-project-btn secondary">
                                                    {{ __('frontend.renovation.protocol_stage1') }}
                                                </a>
                                            @endif

                                            @if ($project->status == 'archive' && $project->qoshimcha_fayl)
                                                <a href="{{ asset('storage/' . $project->qoshimcha_fayl) }}" target="_blank"
                                                   class="gov-project-btn success">
                                                    <i class="fa-solid fa-download"></i>
                                                    {{ __('frontend.renovation.selection_result') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                @endif
            @empty
                <div class="gov-no-projects">
                    <i class="fa-solid fa-folder-open"></i>
                    <h3>{{ __('frontend.renovation.no_projects') }}</h3>
                    <p>{{ __('frontend.renovation.no_projects_desc') }}</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusSelect = document.getElementById('statusSelect');
    const projectCards = document.querySelectorAll('.gov-project-card');
    const statusGroups = document.querySelectorAll('.gov-status-group');

    // Search functionality
    function filterProjects() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = statusSelect.value;

        projectCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            const category = card.dataset.category;
            const matchesSearch = text.includes(searchTerm);
            const matchesStatus = !statusFilter || category === statusFilter;

            if (matchesSearch && matchesStatus) {
                card.style.display = 'block';
                gsap.fromTo(card, { opacity: 0, y: 10 }, { opacity: 1, y: 0, duration: 0.3 });
            } else {
                card.style.display = 'none';
            }
        });

        // Update group visibility
        statusGroups.forEach(group => {
            const visibleCards = group.querySelectorAll('.gov-project-card[style*="display: block"], .gov-project-card:not([style*="display"])');
            group.style.display = visibleCards.length > 0 ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('input', filterProjects);
    statusSelect.addEventListener('change', filterProjects);

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

        gsap.from('.gov-status-badge-lg', {
            opacity: 0,
            x: -20,
            duration: 0.4,
            stagger: 0.15
        });
    }
});
</script>
@endpush
