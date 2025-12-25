@extends('layouts.frontend_app')

@section('title', (app()->getLocale() == 'ru' ? $procurement['title_ru'] : $procurement['title_uz']) . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <!-- Hero -->
    <div class="gov-hero">
        <div class="gov-container">
            <div class="gov-breadcrumb">
                <a href="{{ route('frontend.open_tender_notice') }}" class="gov-breadcrumb-link">
                    <i class="fa-solid fa-arrow-left"></i> {{ __('frontend.common.back') }}
                </a>
            </div>
            <div class="gov-hero-content">
                <h1 class="gov-hero-title" style="font-size: 28px;">
                    {{ app()->getLocale() == 'ru' ? $procurement['title_ru'] : $procurement['title_uz'] }}
                </h1>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="gov-content">
        <div class="gov-container" style="max-width: 1000px;">

            <!-- Announcement PDF Preview -->
            <div class="gov-card" style="margin-bottom: 30px;">
                <div class="gov-card-header">
                    <div class="gov-card-icon">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <h2 class="gov-card-title">{{ app()->getLocale() == 'ru' ? 'Объявление' : "E'lon" }}</h2>
                </div>
                <div class="gov-card-body" style="padding: 0;">
                    <iframe
                        src="{{ asset('assets/eng_yaxshi_takliflarni_tanlab_olish/Эълон _(ЎЗБ).pdf') }}"
                        style="width: 100%; height: 600px; border: none; border-radius: 0 0 12px 12px;"
                        title="{{ app()->getLocale() == 'ru' ? 'Объявление' : "E'lon" }}"
                    ></iframe>
                </div>
            </div>

            <!-- Deadline Card -->
            <div class="gov-card" style="margin-bottom: 30px; border-left: 4px solid #f59e0b;">
                <div class="gov-card-body" style="display: flex; align-items: center; gap: 20px;">
                    <div style="width: 56px; height: 56px; background: linear-gradient(135deg, #f59e0b, #d97706); border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-clock" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div>
                        <div style="font-size: 13px; color: #92400e; font-weight: 500; margin-bottom: 4px;">{{ __('frontend.procurement.deadline_label') }}</div>
                        <div style="font-size: 20px; font-weight: 700; color: #1f2937;">{{ app()->getLocale() == 'ru' ? $procurement['deadline_ru'] : $procurement['deadline'] }}</div>
                    </div>
                </div>
            </div>

            <!-- Documents Card -->
            <div class="gov-card">
                <div class="gov-card-header">
                    <div class="gov-card-icon">
                        <i class="fa-solid fa-folder-open"></i>
                    </div>
                    <h2 class="gov-card-title">{{ __('frontend.procurement.documents') }}</h2>
                </div>
                <div class="gov-card-body">
                    <div class="gov-docs-grid" style="grid-template-columns: repeat(3, 1fr);">
                        @foreach($procurement['documents'] as $doc)
                            <a href="{{ asset($procurement['folder'] . '/' . $doc['file']) }}" target="_blank" class="gov-doc-card" style="flex-direction: column; text-align: center; padding: 20px 16px; border-left: none; border: 1px solid var(--gov-border);">
                                <div class="gov-doc-icon pdf" style="width: 48px; height: 48px; background: #fee2e2; margin-bottom: 12px;">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </div>
                                <div class="gov-doc-info">
                                    <div class="gov-doc-title" style="font-size: 13px; margin-bottom: 0;color: #1f2937 !important;">{{ $doc['name'] }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="gov-back-link">
                <a href="{{ route('frontend.open_tender_notice') }}" class="gov-btn gov-btn-secondary">
                    <i class="fa-solid fa-arrow-left"></i>
                    {{ __('frontend.common.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
