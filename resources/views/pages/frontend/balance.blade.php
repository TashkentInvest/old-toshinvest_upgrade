@extends('layouts.frontend_app')
@section('title', __('frontend.nav.financial_reports') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.financial_reports')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-invoice-dollar"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.financial_reports')]
        ]"
    />

    {{-- File Version Selector + PDF Viewer --}}
    <x-frontend.section bg="white">
        @php
            $locale = app()->getLocale();
            $versions = [
                [
                    'key'   => 'v2025q4',
                    'label' => $locale === 'ru' ? '4 квартал 2025 года' : ($locale === 'uz' ? '2025 yil 4-chorak' : 'Q4 2025'),
                    'title' => $locale === 'ru'
                        ? 'Бухгалтерский баланс АО «Компания Ташкент Инвест» по состоянию на 31 декабря 2025 года.'
                        : ($locale === 'uz'
                            ? '«Toshkent Invest Kompaniyasi» AJining 2025 yil 31 dekabr holatiga buxgalteriya balansi.'
                            : 'Balance Sheet of JSC «Tashkent Invest Company» as of December 31, 2025.'),
                    'src'   => asset('assets/reports/Бухгалтерский баланс/Бухгалтерский_баланс_форма_№1_2025_4кв.pdf'),
                    'latest' => true,
                ],
                [
                    'key'   => 'v2024q1',
                    'label' => $locale === 'ru' ? '1 квартал 2024 года' : ($locale === 'uz' ? '2024 yil 1-chorak' : 'Q1 2024'),
                    'title' => $locale === 'ru'
                        ? 'Бухгалтерский баланс АО «Компания Ташкент Инвест» — 1 квартал 2024 года.'
                        : ($locale === 'uz'
                            ? '«Toshkent Invest Kompaniyasi» AJining 2024 yil 1-chorak buxgalteriya balansi.'
                            : 'Balance Sheet of JSC «Tashkent Invest Company» — Q1 2024.'),
                    'src'   => 'https://drive.google.com/file/d/1EYvD3ukqo22A8bgoMmPv-BDiVLEzzxqa/preview',
                    'latest' => false,
                ],
            ];
        @endphp

        {{-- Version File List --}}
        <div class="pdf-version-wrapper">
            <div class="pdf-version-sidebar">
                <div class="pdf-version-folder-label">
                    <i class="fa-solid fa-folder-open"></i>
                    @if($locale === 'ru') Версии документа
                    @elseif($locale === 'uz') Hujjat versiyalari
                    @else Document Versions @endif
                </div>
                @foreach($versions as $v)
                <div class="pdf-version-item {{ $v['latest'] ? 'active' : '' }}"
                     data-src="{{ $v['src'] }}"
                     data-title="{{ $v['title'] }}"
                     onclick="switchPdfVersion(this)">
                    <span class="pdf-version-icon"><i class="fa-solid fa-file-pdf"></i></span>
                    <span class="pdf-version-meta">
                        <span class="pdf-version-period">{{ $v['label'] }}</span>
                        @if($v['latest'])
                        <span class="pdf-version-badge">
                            @if($locale === 'ru') Актуальный
                            @elseif($locale === 'uz') Joriy
                            @else Latest @endif
                        </span>
                        @endif
                    </span>
                </div>
                @endforeach
            </div>

            {{-- PDF Viewer Panel --}}
            <div class="pdf-version-viewer">
                <div class="gov-pdf-header">
                    <h3 class="gov-pdf-title" id="pdf-title">
                        <i class="fa-solid fa-file-pdf"></i>
                        {{ $versions[0]['title'] }}
                    </h3>
                </div>
                <div class="gov-pdf-container" style="height: 900px">
                    <iframe id="pdf-iframe"
                        src="{{ $versions[0]['src'] }}"
                        width="100%" height="100%" frameborder="0" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </x-frontend.section>

    <style>
    .pdf-version-wrapper {
        display: flex;
        gap: 24px;
        align-items: flex-start;
    }
    .pdf-version-sidebar {
        width: 240px;
        flex-shrink: 0;
        background: var(--gov-bg-light, #f8f9fa);
        border: 1px solid var(--gov-border, #e2e8f0);
        border-radius: 12px;
        overflow: hidden;
    }
    .pdf-version-folder-label {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 14px 16px;
        font-size: 0.8rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--gov-text-muted, #64748b);
        border-bottom: 1px solid var(--gov-border, #e2e8f0);
        background: var(--gov-bg-subtle, #f1f5f9);
    }
    .pdf-version-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        cursor: pointer;
        border-bottom: 1px solid var(--gov-border, #e2e8f0);
        transition: background 0.2s;
    }
    .pdf-version-item:last-child { border-bottom: none; }
    .pdf-version-item:hover { background: rgba(var(--gov-primary-rgb, 37,99,235), 0.06); }
    .pdf-version-item.active {
        background: rgba(var(--gov-primary-rgb, 37,99,235), 0.1);
        border-left: 3px solid var(--gov-primary, #2563eb);
    }
    .pdf-version-icon { color: #ef4444; font-size: 1.3rem; flex-shrink: 0; }
    .pdf-version-item.active .pdf-version-icon { color: var(--gov-primary, #2563eb); }
    .pdf-version-meta { display: flex; flex-direction: column; gap: 4px; }
    .pdf-version-period { font-size: 0.9rem; font-weight: 600; color: var(--gov-text, #1e293b); }
    .pdf-version-badge {
        display: inline-block;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 20px;
        background: var(--gov-primary, #2563eb);
        color: #fff;
        width: fit-content;
    }
    .pdf-version-viewer { flex: 1; min-width: 0; }
    @media (max-width: 768px) {
        .pdf-version-wrapper { flex-direction: column; }
        .pdf-version-sidebar { width: 100%; }
    }
    </style>
</div>

<script>
function switchPdfVersion(el) {
    document.querySelectorAll('.pdf-version-item').forEach(i => i.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('pdf-iframe').src = el.dataset.src;
    document.getElementById('pdf-title').innerHTML = '<i class="fa-solid fa-file-pdf"></i> ' + el.dataset.title;
}
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.5 });
        });
    }
});
</script>
@endsection
