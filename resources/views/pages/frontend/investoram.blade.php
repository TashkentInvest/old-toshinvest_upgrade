@extends('layouts.frontend_app')
@section('title', __('frontend.renovation.title'))
@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
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
    <x-frontend.section bg="white">
        <div class="ren-container">
            {{-- Section Header --}}
            <div class="ren-header">
                <div>
                    <h2>{{ __('frontend.renovation.available_projects') }}</h2>
                    <p>{{ __('frontend.renovation.choose_project') }}</p>
                </div>
                <div class="ren-filters">
                    <div class="ren-search">
                        <i class="fa-solid fa-search"></i>
                        <input type="text" id="searchInput" value="{{ request('q') }}"
                               placeholder="{{ __('frontend.renovation.search_projects') }}">
                    </div>
                    <select id="statusSelect" class="ren-select">
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
                        '1_step' => __('frontend.renovation.stage_1'),
                        '2_step' => __('frontend.renovation.stage_2'),
                        'completed' => __('frontend.renovation.completed'),
                        'archive' => __('frontend.renovation.archive'),
                    ];
                    $groupedProjects = $projects->groupBy('status');
                @endphp

                @forelse($statusTitles as $statusKey => $statusTitle)
                    @if (isset($groupedProjects[$statusKey]) && $groupedProjects[$statusKey]->count() > 0)
                        <div class="ren-group" data-status="{{ $statusKey }}">
                            <div class="ren-group-header">
                                <span class="ren-group-title">{{ $statusTitle }}</span>
                                <span class="ren-group-count">{{ $groupedProjects[$statusKey]->count() }}</span>
                            </div>

                            <div class="ren-grid">
                                @foreach ($groupedProjects[$statusKey] as $project)
                                    <article class="ren-card" data-category="{{ $statusKey }}">
                                        <div class="ren-card-header">
                                            <div class="ren-card-icon">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div>
                                                <h3>{{ $project->district }}{{ __('frontend.renovation.district') }}</h3>
                                                @if ($project->mahalla)
                                                    <p>{{ __('frontend.renovation.mahalla') }} {{ $project->mahalla }}</p>
                                                @endif
                                            </div>
                                            <span class="ren-card-id">REN-{{ $project->id }}</span>
                                        </div>

                                        <div class="ren-card-body">
                                            <div class="ren-details">
                                                @if ($project->land)
                                                    <div class="ren-detail">
                                                        <i class="fa-solid fa-vector-square"></i>
                                                        <span class="ren-detail-label">{{ __('frontend.renovation.land_area') }}</span>
                                                        <span class="ren-detail-value">{{ $project->land }} {{ __('frontend.renovation.hectares') }}</span>
                                                    </div>
                                                @endif

                                                @if ($project->srok_realizatsi)
                                                    <div class="ren-detail">
                                                        <i class="fa-solid fa-hourglass-half"></i>
                                                        <span class="ren-detail-label">{{ __('frontend.renovation.implementation_period') }}</span>
                                                        <span class="ren-detail-value">{{ $project->srok_realizatsi }} {{ __('frontend.renovation.months') }}</span>
                                                    </div>
                                                @endif

                                                <div class="ren-detail">
                                                    <i class="fa-solid fa-calendar"></i>
                                                    <span class="ren-detail-label">{{ __('frontend.renovation.first_stage') }}</span>
                                                    <span class="ren-detail-value">
                                                        {{ $project->start_date ? $project->start_date->format('d.m.Y') : '—' }}
                                                        –
                                                        {{ $project->end_date ? $project->end_date->format('d.m.Y') : '—' }}
                                                    </span>
                                                </div>

                                                <div class="ren-detail">
                                                    <i class="fa-solid fa-calendar-check"></i>
                                                    <span class="ren-detail-label">{{ __('frontend.renovation.second_stage') }}</span>
                                                    <span class="ren-detail-value">
                                                        {{ $project->second_stage_start_date ? $project->second_stage_start_date->format('d.m.Y') : '—' }}
                                                        –
                                                        {{ $project->second_stage_end_date ? $project->second_stage_end_date->format('d.m.Y') : '—' }}
                                                    </span>
                                                </div>
                                            </div>

                                            @if (!empty($project->comment))
                                                <div class="ren-notice">
                                                    <i class="fa-solid fa-info-circle"></i>
                                                    <div>
                                                        <strong>{{ __('frontend.renovation.project_comment') }}</strong>
                                                        <p>{{ Str::limit($project->comment, 120) }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="ren-card-footer">
                                            @if ($project->elon_fayl)
                                                <a style="color: #fff" href="{{ asset('storage/' . $project->elon_fayl) }}" target="_blank" class="ren-btn ren-btn-primary">
                                                    <i class="fa-solid fa-file-alt"></i> {{ __('frontend.renovation.announcement_stage1') }}
                                                </a>
                                            @endif
                                            @if ($project->pratakol_fayl)
                                                <a href="{{ asset('storage/' . $project->pratakol_fayl) }}" target="_blank" class="ren-btn ren-btn-secondary">
                                                    {{ __('frontend.renovation.protocol_stage1') }}
                                                </a>
                                            @endif
                                            @if ($project->status == 'archive' && $project->qoshimcha_fayl)
                                                <a href="{{ asset('storage/' . $project->qoshimcha_fayl) }}" target="_blank" class="ren-btn ren-btn-primary">
                                                    <i class="fa-solid fa-download"></i> {{ __('frontend.renovation.selection_result') }}
                                                </a>
                                            @endif
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="ren-empty">
                        <i class="fa-solid fa-folder-open"></i>
                        <h3>{{ __('frontend.renovation.no_projects') }}</h3>
                        <p>{{ __('frontend.renovation.no_projects_desc') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </x-frontend.section>
</div>

<style>
.ren-container { max-width: 1200px; margin: 0 auto; }

.ren-header {
    display: flex; align-items: flex-start; justify-content: space-between;
    gap: 24px; margin-bottom: 32px; flex-wrap: wrap;
}
.ren-header h2 { font-size: 1.5rem; font-weight: 700; color: #1a1a1a; margin: 0 0 6px; }
.ren-header p { font-size: 0.95rem; color: #64748b; margin: 0; }

.ren-filters { display: flex; gap: 12px; flex-wrap: wrap; }

.ren-search {
    position: relative; display: flex; align-items: center;
}
.ren-search i {
    position: absolute; left: 14px; color: #64748b; font-size: 0.9rem;
}
.ren-search input {
    padding: 10px 14px 10px 40px;
    border: 1px solid #dee2e6; border-radius: 8px;
    font-size: 0.9rem; width: 220px;
    transition: border-color 0.2s;
}
.ren-search input:focus { outline: none; border-color: #2d4a6f; }

.ren-select {
    padding: 10px 14px; border: 1px solid #dee2e6;
    border-radius: 8px; font-size: 0.9rem;
    background: #fff; cursor: pointer;
}
.ren-select:focus { outline: none; border-color: #2d4a6f; }

/* Group */
.ren-group { margin-bottom: 40px; }
.ren-group:last-child { margin-bottom: 0; }

.ren-group-header {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 20px; padding-bottom: 12px;
    border-bottom: 2px solid #e9ecef;
}
.ren-group-title {
    font-size: 1.1rem; font-weight: 600; color: #2d4a6f;
}
.ren-group-count {
    background: #2d4a6f; color: #fff;
    padding: 4px 10px; border-radius: 20px;
    font-size: 0.8rem; font-weight: 600;
}

/* Grid */
.ren-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
    gap: 20px;
}

/* Card */
.ren-card {
    background: #fff; border-radius: 12px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.06);
    border: 1px solid #e9ecef;
    display: flex; flex-direction: column;
    transition: all 0.2s;
}
.ren-card:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    transform: translateY(-2px);
}

.ren-card-header {
    display: flex; align-items: flex-start; gap: 14px;
    padding: 20px; background: linear-gradient(135deg, #2d4a6f 0%, #1e3654 100%);
    border-radius: 12px 12px 0 0; color: #fff;
}
.ren-card-icon {
    width: 40px; height: 40px;
    background: rgba(255,255,255,0.15);
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem; flex-shrink: 0;
}
.ren-card-header h3 { margin: 0; font-size: 1rem; font-weight: 600; }
.ren-card-header p { margin: 4px 0 0; font-size: 0.85rem; opacity: 0.8; }
.ren-card-id {
    margin-left: auto;
    background: rgba(255,255,255,0.2);
    padding: 4px 10px; border-radius: 6px;
    font-size: 0.75rem; font-weight: 600;
}

.ren-card-body { padding: 20px; flex: 1; }

.ren-details { display: flex; flex-direction: column; gap: 12px; }

.ren-detail {
    display: flex; align-items: center; gap: 10px;
    font-size: 0.9rem;
}
.ren-detail > i {
    width: 28px; height: 28px;
    background: #f1f5f9; color: #2d4a6f;
    border-radius: 6px;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.75rem; flex-shrink: 0;
}
.ren-detail-label { color: #64748b; }
.ren-detail-value { margin-left: auto; font-weight: 600; color: #1a1a1a; }

.ren-notice {
    display: flex; gap: 12px;
    margin-top: 16px; padding: 14px;
    background: #eff6ff; border-radius: 8px;
    border-left: 3px solid #2d4a6f;
}
.ren-notice > i { color: #2d4a6f; margin-top: 2px; }
.ren-notice strong { display: block; font-size: 0.8rem; color: #2d4a6f; margin-bottom: 4px; }
.ren-notice p { margin: 0; font-size: 0.85rem; color: #374151; line-height: 1.5; }

.ren-card-footer {
    display: flex; flex-wrap: wrap; gap: 10px;
    padding: 16px 20px; border-top: 1px solid #e9ecef;
}

.ren-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 10px 16px; border-radius: 8px;
    font-size: 0.85rem; font-weight: 600;
    text-decoration: none; transition: all 0.2s;
}
.ren-btn-primary { background: #2d4a6f; color: #fff; }
.ren-btn-primary:hover { background: #1e3654; color: #fff; }
.ren-btn-secondary { background: #f1f5f9; color: #2d4a6f; border: 1px solid #dee2e6; }
.ren-btn-secondary:hover { background: #e9ecef; color: #2d4a6f; }

/* Empty State */
.ren-empty {
    text-align: center; padding: 60px 20px;
    background: #f8fafc; border-radius: 12px;
}
.ren-empty i { font-size: 3rem; color: #cbd5e1; margin-bottom: 16px; }
.ren-empty h3 { margin: 0 0 8px; color: #1a1a1a; }
.ren-empty p { margin: 0; color: #64748b; }

@media (max-width: 768px) {
    .ren-header { flex-direction: column; }
    .ren-filters { width: 100%; }
    .ren-search input { width: 100%; }
    .ren-grid { grid-template-columns: 1fr; }
    .ren-card-footer { flex-direction: column; }
    .ren-btn { width: 100%; justify-content: center; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const statusSelect = document.getElementById('statusSelect');
    const projectCards = document.querySelectorAll('.ren-card');
    const statusGroups = document.querySelectorAll('.ren-group');

    function filterProjects() {
        const searchTerm = searchInput.value.toLowerCase();
        const statusFilter = statusSelect.value;

        projectCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            const category = card.dataset.category;
            const matchesSearch = text.includes(searchTerm);
            const matchesStatus = !statusFilter || category === statusFilter;
            card.style.display = (matchesSearch && matchesStatus) ? 'flex' : 'none';
        });

        statusGroups.forEach(group => {
            const visibleCards = group.querySelectorAll('.ren-card[style="display: flex;"], .ren-card:not([style*="display: none"])');
            let hasVisible = false;
            group.querySelectorAll('.ren-card').forEach(card => {
                if (card.style.display !== 'none') hasVisible = true;
            });
            group.style.display = hasVisible ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('input', filterProjects);
    statusSelect.addEventListener('change', filterProjects);
});
</script>
@endsection
