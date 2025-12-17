@extends('layouts.frontend_app')
@section('title', __('frontend.nav.development_strategies') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.development_strategies')"
        badge="Tashkent Invest"
        badgeIcon="fa-compass"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.development_strategies')]
        ]"
    />

    {{-- PDF Viewer --}}
    <x-frontend.section bg="white">
        <x-frontend.pdf-viewer
            :src="asset('assets/folders/strategiya.pdf')"
            :title="__('frontend.nav.development_strategies')"
            height="900px"
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
