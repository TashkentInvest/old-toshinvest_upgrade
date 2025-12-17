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

    {{-- PDF Viewer --}}
    <x-frontend.section bg="white">
        <x-frontend.pdf-viewer
            src="https://drive.google.com/file/d/1EYvD3ukqo22A8bgoMmPv-BDiVLEzzxqa/preview"
            :title="app()->getLocale() == 'ru' ? 'Бухгалтерский баланс — 1 квартал 2024' : (app()->getLocale() == 'uz' ? 'Buxgalteriya balansi — 2024 yil 1-chorak' : 'Balance Sheet — Q1 2024')"
            height="900px"
            :downloadable="false"
        />
    </x-frontend.section>
</div>

<script>
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
