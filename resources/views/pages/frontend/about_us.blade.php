@extends('layouts.frontend_app')
@section('title', __('frontend.about.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.about.title')"
        :subtitle="__('frontend.about.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-building-columns"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.about.title')]
        ]"
    />

    {{-- Main Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-body">
                <div class="gov-content-text">
                    {!! __('frontend.about.description') !!}
                </div>
            </div>
        </div>
    </x-frontend.section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');

        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el,
                { opacity: 0, y: 30 },
                {
                    opacity: 1,
                    y: 0,
                    duration: 0.6,
                    delay: parseFloat(el.dataset.delay) || 0,
                    scrollTrigger: { trigger: el, start: 'top 85%' }
                }
            );
        });
    }
});
</script>
@endsection
