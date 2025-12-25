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
                <h1 class="gov-hero-title">{{ __('frontend.procurement.title') }}</h1>
                <p class="gov-hero-subtitle">{{ __('frontend.procurement.subtitle') }}</p>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="gov-content">
        <div class="gov-container">
            @php
                $procurements = [
                    [
                        'id' => 1,
                        'title_uz' => "Eng yaxshi takliflarni tanlab olish orqali xaridni amalga oshirish to'g'risida",
                        'title_ru' => 'О закупках путём отбора лучших предложений',
                        'deadline' => '6 yanvar 2026, 18:00',
                        'deadline_ru' => '6 января 2026, 18:00',
                        'status' => 'active',
                        'docs_count' => 9,
                        'slug' => 'eng-yaxshi-takliflar-1',
                    ],
                ];
                $locale = app()->getLocale();
            @endphp

            <div class="gov-projects-grid" style="margin-top: 30px;">
                @foreach($procurements as $item)
                    <a href="{{ route('frontend.open_tender_notice.show', $item['slug']) }}" class="gov-project-card" style="text-decoration: none;">
                        <div class="gov-project-header">
                            <span class="gov-project-status {{ $item['status'] == 'active' ? 'success' : 'archive' }}">
                                <i class="fa-solid {{ $item['status'] == 'active' ? 'fa-circle' : 'fa-check' }}"></i>
                                {{ $item['status'] == 'active' ? __('frontend.procurement.status_active') : __('frontend.procurement.status_completed') }}
                            </span>
                            <span class="gov-project-id">
                                <i class="fa-solid fa-file-pdf" style="color: #dc2626;"></i> {{ $item['docs_count'] }}
                            </span>
                        </div>
                        <div class="gov-project-location">
                            <div class="gov-project-icon">
                                <i class="fa-solid fa-file-contract"></i>
                            </div>
                            <div>
                                <h3 class="gov-project-title" style="font-size: 1.1rem;">
                                    {{ $locale == 'ru' ? $item['title_ru'] : $item['title_uz'] }}
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
                                        {{ $locale == 'ru' ? $item['deadline_ru'] : $item['deadline'] }}
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
