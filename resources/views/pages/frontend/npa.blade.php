@extends('layouts.frontend_app')
@section('title', __('frontend.npa.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.npa.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-gavel"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.npa.title')]
        ]"
    />

    {{-- Documents --}}
    <x-frontend.section bg="white">
        @php
            $folder = 'assets/frontend/Normativ-huquqiy hujjatlar';

            // Document metadata with detailed information
            $documents = [
                [
                    'number' => 'ПФ-112',
                    'type' => 'presidential_decree',
                    'type_label' => __('frontend.npa.types.presidential_decree'),
                    'date' => '26.07.2023',
                    'title' => [
                        'uz' => 'Toshkent shahrida davlat va tadbirkorlik sub\'ektlari o\'rtasida o\'zaro manfaatli hamkorlik asosida investitsiya loyihalarini amalga oshirish va shahar infratuzilmasini yaxshilash bo\'yicha huquqiy eksperimentni o\'tkazish chora-tadbirlari to\'g\'risida',
                        'ru' => 'О мерах по проведению правового эксперимента по реализации инвестиционных проектов и улучшению городской инфраструктуры в городе Ташкенте',
                        'en' => 'On measures to conduct a legal experiment on the implementation of investment projects and improvement of urban infrastructure in Tashkent city',
                    ],
                    'file' => 'ПФ-112.pdf',
                    'icon' => 'fa-landmark',
                ],
                [
                    'number' => 'ПҚ-236',
                    'type' => 'presidential_resolution',
                    'type_label' => __('frontend.npa.types.presidential_resolution'),
                    'date' => '26.07.2023',
                    'title' => [
                        'uz' => 'Toshkent shahrida davlat va tadbirkorlik sub\'ektlari o\'rtasida o\'zaro manfaatli hamkorlik asosida investitsiya loyihalarini amalga oshirish va shahar infratuzilmasini yaxshilash bo\'yicha huquqiy eksperimentni o\'tkazish chora-tadbirlari to\'g\'risida',
                        'ru' => 'О мерах по проведению правового эксперимента по реализации инвестиционных проектов и улучшению городской инфраструктуры в городе Ташкенте',
                        'en' => 'On measures to conduct a legal experiment on the implementation of investment projects and improvement of urban infrastructure in Tashkent city',
                    ],
                    'file' => 'ПҚ-236.pdf',
                    'icon' => 'fa-landmark',
                ],
                [
                    'number' => 'ВМҚ-149',
                    'type' => 'cabinet_resolution',
                    'type_label' => __('frontend.npa.types.cabinet_resolution'),
                    'date' => '25.03.2024',
                    'title' => [
                        'uz' => 'O\'zbekiston Respublikasi Vazirlar Mahkamasining qarori',
                        'ru' => 'Постановление Кабинета Министров Республики Узбекистан',
                        'en' => 'Resolution of the Cabinet of Ministers of the Republic of Uzbekistan',
                    ],
                    'file' => 'ВМҚ 149.pdf',
                    'icon' => 'fa-building-columns',
                ],
                [
                    'number' => 'VI-104-94-14-0-K/24',
                    'type' => 'city_council',
                    'type_label' => __('frontend.npa.types.city_council'),
                    'date' => '02.07.2024',
                    'title' => [
                        'uz' => 'Xalq deputatlari Toshkent shahar Kengashining qarori',
                        'ru' => 'Решение Ташкентского городского совета народных депутатов',
                        'en' => 'Decision of the Tashkent City Council of People\'s Deputies',
                    ],
                    'file' => 'Toshkent shahri_VI-104-94-14-0-K_24.pdf',
                    'icon' => 'fa-file-lines',
                ],
            ];

            $locale = app()->getLocale();
        @endphp

        @if(count($documents) > 0)
            <div class="npa-docs-grid">
                @foreach($documents as $index => $doc)
                    @php
                        $filePath = public_path($folder . '/' . $doc['file']);
                        $fileExists = file_exists($filePath);
                        $title = $doc['title'][$locale] ?? $doc['title']['uz'];
                    @endphp
                    <div class="npa-doc-card">
                        <div class="npa-doc-header">
                            <div class="npa-doc-icon">
                                <i class="fa-solid {{ $doc['icon'] }}"></i>
                            </div>
                            <div class="npa-doc-meta">
                                <span class="npa-doc-type">{{ $doc['type_label'] }}</span>
                                <span class="npa-doc-number">{{ $doc['number'] }}</span>
                            </div>
                        </div>
                        <div class="npa-doc-body">
                            <h4 class="npa-doc-title">{{ $title }}</h4>
                            <div class="npa-doc-date">
                                <i class="fa-regular fa-calendar"></i>
                                {{ $doc['date'] }}
                            </div>
                        </div>
                        <div class="npa-doc-footer">
                            @if($fileExists)
                                <a style="color: #fff" href="{{ asset($folder . '/' . $doc['file']) }}" target="_blank" class="npa-btn npa-btn-open">
                                    <i class="fa-solid fa-eye"></i> {{ __('frontend.buttons.view') }}
                                </a>
                                <a href="{{ asset($folder . '/' . $doc['file']) }}" download class="npa-btn npa-btn-download">
                                    <i class="fa-solid fa-download"></i> {{ __('frontend.buttons.download') }}
                                </a>
                            @else
                                <span class="npa-btn npa-btn-disabled">
                                    <i class="fa-solid fa-file-circle-exclamation"></i> {{ __('frontend.common.file_not_available') }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <x-frontend.info-box type="info">
                {{ __('frontend.npa.info_text') }}
            </x-frontend.info-box>
        @endif
    </x-frontend.section>
</div>

<style>
    .npa-docs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .npa-doc-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .npa-doc-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }

    .npa-doc-header {
        padding: 20px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        border-bottom: 1px solid #f3f4f6;
        background: #fafbfc;
    }

    .npa-doc-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #1e40af;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
    }

    .npa-doc-icon i {
        font-size: 22px;
        color: #fff;
    }

    .npa-doc-meta {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .npa-doc-type {
        font-size: 12px;
        font-weight: 600;
        color: #6b7280;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .npa-doc-number {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
        font-family: 'JetBrains Mono', monospace;
    }

    .npa-doc-body {
        padding: 20px 24px;
    }

    .npa-doc-title {
        color: #1f2937;
        font-size: 15px;
        font-weight: 500;
        margin: 0 0 12px 0;
        line-height: 1.6;
    }

    .npa-doc-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #6b7280;
        background: #f3f4f6;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .npa-doc-date i {
        color: #9ca3af;
    }

    .npa-doc-footer {
        padding: 16px 24px 20px;
        display: flex;
        gap: 12px;
        background: #fff;
        border-top: 1px solid #f3f4f6;
    }

    .npa-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .npa-btn-open {
        background: #1e40af;
        color: #fff;
    }

    .npa-btn-open:hover {
        background: #1e3a8a;
        color: #fff;
    }

    .npa-btn-download {
        background: #f1f3f5;
        color: #374151;
        border: 1px solid #e5e7eb;
    }

    .npa-btn-download:hover {
        background: #e5e7eb;
        border-color: #d1d5db;
        color: #1f2937;
    }

    .npa-btn-disabled {
        background: #f9fafb;
        color: #9ca3af;
        border: 1px solid #e5e7eb;
        cursor: not-allowed;
    }

    @media (max-width: 991px) {
        .npa-docs-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .npa-doc-header {
            flex-direction: column;
            text-align: center;
        }

        .npa-doc-meta {
            align-items: center;
        }

        .npa-doc-body {
            text-align: center;
        }

        .npa-doc-date {
            justify-content: center;
        }

        .npa-doc-footer {
            flex-direction: column;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.npa-doc-card').forEach((el, i) => {
            gsap.fromTo(el,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.5, delay: i * 0.1 }
            );
        });
    }
});
</script>
@endsection
