@extends('layouts.frontend_app')

@section('title', __('frontend.procurement.title') . ' | ' . __('frontend.seo.site_name'))
@section('description', __('frontend.procurement.description'))

@section('frontent_content')
<div class="gov-page">
    <!-- Hero -->
    <div class="gov-hero">
        <div class="gov-container">
            <div class="gov-hero-content">
                <div class="gov-hero-badge">
                    <span>{{ __('frontend.procurement.badge') }}</span>
                </div>
                <h1 class="gov-hero-title">{{ __('frontend.procurement.main_title') }}</h1>
                <p class="gov-hero-subtitle">{{ __('frontend.procurement.main_subtitle') }}</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="gov-content">
        <div class="gov-container">
            @php
                $locale = app()->getLocale();
                $sortedNotices = $notices->sortBy(function ($notice) {
                    return $notice->isArchived() ? 1 : 0;
                })->values();
                $activeCount = $sortedNotices->filter(function ($notice) {
                    return !$notice->isArchived();
                })->count();
                $archivedCount = $sortedNotices->count() - $activeCount;
            @endphp

            <div style="margin-top: 30px; display: flex; gap: 12px; flex-wrap: wrap;">
                <span class="gov-project-status success" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-circle"></i>
                    {{ __('frontend.procurement.status_active') }}: {{ $activeCount }}
                </span>
                <span class="gov-project-status archive" style="display: inline-flex; align-items: center; gap: 8px;">
                    <i class="fa-solid fa-check"></i>
                    {{ __('frontend.procurement.status_completed') }}: {{ $archivedCount }}
                </span>
            </div>

            <div class="gov-projects-grid" style="margin-top: 30px;">
                @foreach($sortedNotices as $notice)
                    @php
                        $isArchived = $notice->isArchived();
                    @endphp
                    <a href="{{ route('frontend.open_tender_notice.show', $notice->slug) }}" class="gov-project-card" style="text-decoration: none;">
                        <div class="gov-project-header">
                            <span class="gov-project-status {{ $isArchived ? 'archive' : 'success' }}">
                                <i class="fa-solid {{ $isArchived ? 'fa-check' : 'fa-circle' }}"></i>
                                {{ $isArchived ? __('frontend.procurement.status_completed') : __('frontend.procurement.status_active') }}
                            </span>
                            <span class="gov-project-id">
                                <i class="fa-solid fa-file-pdf" style="color: #dc2626;"></i> {{ $notice->documents->count() }}
                            </span>
                        </div>
                        <div class="gov-project-location">
                            <div class="gov-project-icon">
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                            <div>
                                <h3 class="gov-project-title" style="font-size: 1.1rem;">
                                    {{ $notice->getTitle($locale) }}
                                </h3>
                            </div>
                        </div>
                        <div class="gov-project-body">
                            <div class="gov-project-details">
                                <div class="gov-detail-row">
                                    <span class="gov-detail-label">
                                        <i class="fa-regular fa-clock"></i>
                                        {{ __('frontend.procurement.deadline') }}
                                    </span>
                                    <span class="gov-detail-value" style="color: #d97706;">
                                        {{ $notice->getDeadline($locale) }}
                                    </span>
                                </div>
                            </div>
                            <div class="gov-project-actions">
                                <span class="gov-project-btn primary">
                                    {{ __('frontend.procurement.view_details') }}
                                    <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
