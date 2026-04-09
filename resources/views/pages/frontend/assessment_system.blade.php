@extends('layouts.frontend_app')
@section('title', __('frontend.governance_assessment.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.governance_assessment.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-clipboard-check"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.governance_assessment.title')]
        ]"
    />

    {{-- Documents Section --}}
    <x-frontend.section bg="white">
        @php
            $documents = [
                [
                    'file' => '2025-2kv-1-3.pdf',
                    'title_ru' => 'Оценка систем корпоративного управления 2025 (2 квартал)',
                    'title_uz' => 'Korporativ boshqaruv tizimlarini baholash 2025 (2-chorak)',
                    'title_en' => 'Corporate Governance Assessment 2025 (Q2)',
                    'year' => '2025',
                    'quarter' => 'Q2'
                ],
                [
                    'file' => '2025-1kv-1-3.pdf',
                    'title_ru' => 'Оценка систем корпоративного управления 2025 (1 квартал)',
                    'title_uz' => 'Korporativ boshqaruv tizimlarini baholash 2025 (1-chorak)',
                    'title_en' => 'Corporate Governance Assessment 2025 (Q1)',
                    'year' => '2025',
                    'quarter' => 'Q1'
                ],
                [
                    'file' => '2024-1-3.pdf',
                    'title_ru' => 'Оценка систем корпоративного управления 2024',
                    'title_uz' => 'Korporativ boshqaruv tizimlarini baholash 2024',
                    'title_en' => 'Corporate Governance Assessment 2024',
                    'year' => '2024',
                    'quarter' => 'Annual'
                ],
            ];
            $folder = 'assets/frontend/korparativ_boshqaruv_tizimlarini_baholash';
            $locale = app()->getLocale();
        @endphp

        <div class="assessment-docs-grid">
            @foreach($documents as $doc)
                @php
                    $filePath = public_path($folder . '/' . $doc['file']);
                    $exists = file_exists($filePath);
                    $title = $doc['title_' . $locale] ?? $doc['title_ru'];
                @endphp
                <div class="assessment-doc-card">
                    <div class="assessment-doc-header">
                        <div class="assessment-doc-icon">
                            <i class="fa-solid fa-file-lines"></i>
                            <span>PDF</span>
                        </div>
                        <div class="assessment-doc-info">
                            <div class="assessment-doc-badges">
                                <span class="assessment-badge-year">{{ $doc['year'] }}</span>
                                @if($doc['quarter'] !== 'Annual')
                                    <span class="assessment-badge-quarter">{{ $doc['quarter'] }}</span>
                                @endif
                            </div>
                            <h4 class="assessment-doc-title">{{ $title }}</h4>
                        </div>
                    </div>
                    <div class="assessment-doc-footer">
                        @if($exists)
                            <a style="color: #fff" href="{{ asset($folder . '/' . $doc['file']) }}" target="_blank" class="assessment-btn assessment-btn-open">
                                <i class="fa-solid fa-eye"></i> {{ __('frontend.common.open') }}
                            </a>
                            <a href="{{ asset($folder . '/' . $doc['file']) }}" download class="assessment-btn assessment-btn-download">
                                <i class="fa-solid fa-download"></i> {{ __('frontend.common.download') }}
                            </a>
                        @else
                            <div class="assessment-unavailable">
                                <i class="fa-solid fa-exclamation-circle"></i> {{ __('frontend.common.file_not_available') }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <style>
            .assessment-docs-grid {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 24px;
                max-width: 1200px;
                margin: 0 auto;
            }

            .assessment-doc-card {
                background: #fff;
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.1);
                overflow: hidden;
                transition: all 0.3s ease;
            }

            .assessment-doc-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 16px 48px rgba(0,0,0,0.15);
            }

            .assessment-doc-header {
                background: linear-gradient(145deg, #2d4a6f 0%, #1e3654 50%, #152638 100%);
                padding: 28px;
                display: flex;
                align-items: flex-start;
                gap: 18px;
            }

            .assessment-doc-icon {
                width: 64px;
                min-width: 64px;
                height: 80px;
                background: #fff;
                border-radius: 10px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 4px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            }

            .assessment-doc-icon i {
                font-size: 28px;
                color: #dc2626;
            }

            .assessment-doc-icon span {
                font-size: 10px;
                font-weight: 800;
                color: #dc2626;
                letter-spacing: 0.5px;
            }

            .assessment-doc-info {
                flex: 1;
                min-width: 0;
            }

            .assessment-doc-badges {
                display: flex;
                gap: 10px;
                margin-bottom: 12px;
                flex-wrap: wrap;
            }

            .assessment-badge-year {
                background: rgba(255,255,255,0.2);
                color: #fff;
                padding: 6px 14px;
                border-radius: 20px;
                font-size: 13px;
                font-weight: 700;
            }

            .assessment-badge-quarter {
                background: #c9a962;
                color: #1a1a1a;
                padding: 6px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 700;
            }

            .assessment-doc-title {
                color: #fff;
                font-size: 16px;
                font-weight: 600;
                margin: 0;
                line-height: 1.5;
            }

            .assessment-doc-footer {
                padding: 20px 28px 28px;
                display: flex;
                gap: 12px;
                background: #fff;
            }

            .assessment-btn {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 14px 20px;
                border-radius: 10px;
                font-size: 14px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.2s ease;
            }

            .assessment-btn-open {
                background: #2d4a6f;
                color: #fff;
            }

            .assessment-btn-open:hover {
                background: #1e3654;
                color: #fff;
            }

            .assessment-btn-download {
                background: #f1f3f5;
                color: #2d4a6f;
                border: 1px solid #dee2e6;
            }

            .assessment-btn-download:hover {
                background: #e9ecef;
                border-color: #2d4a6f;
                color: #2d4a6f;
            }

            .assessment-unavailable {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 14px;
                background: #fef2f2;
                border-radius: 10px;
                color: #dc3545;
                font-weight: 500;
            }

            @media (max-width: 1024px) {
                .assessment-docs-grid {
                    grid-template-columns: repeat(2, 1fr);
                }
            }

            @media (max-width: 768px) {
                .assessment-docs-grid {
                    grid-template-columns: 1fr;
                }

                .assessment-doc-header {
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                }

                .assessment-doc-badges {
                    justify-content: center;
                }

                .assessment-doc-footer {
                    flex-direction: column;
                }
            }
        </style>
    </x-frontend.section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.5, delay: parseFloat(el.dataset.delay) || 0 });
        });
    }
});
</script>
@endsection
