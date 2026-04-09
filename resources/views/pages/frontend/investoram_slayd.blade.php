@extends('layouts.frontend_app')
@section('title', __('frontend.investor.presentation_title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.investor.presentation_title')"
        :subtitle="__('frontend.investor.presentation_subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-presentation-screen"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => route('frontend.investoram'), 'label' => __('frontend.nav.investors')],
            ['url' => '#', 'label' => __('frontend.investor.presentation_title')]
        ]"
    />

    {{-- PDF Viewer --}}
    <x-frontend.section bg="white">
        <x-frontend.pdf-viewer
            :src="asset('assets/investoram_slayd/TIC (Investment Potential).pdf')"
            :title="__('frontend.investor.presentation_title')"
            height="1200px"
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
