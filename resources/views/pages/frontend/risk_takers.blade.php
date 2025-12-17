@extends('layouts.frontend_app')
@section('title', __('frontend.risks.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.risks.title')"
        :subtitle="__('frontend.risks.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-shield-halved"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.risks.title')]
        ]"
    />

    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <i class="fa-solid fa-list-check"></i>
                <h2>{{ __('frontend.risks.measures_title') }}</h2>
            </div>
            <div class="gov-card-body">
                <div class="gov-checklist">
                    <div class="gov-checklist-item gov-animate-fade" data-delay="0.2">
                        <div class="gov-checklist-icon"><i class="fa-solid fa-check"></i></div>
                        <div class="gov-checklist-text">{{ __('frontend.risks.measure_1') }}</div>
                    </div>
                    <div class="gov-checklist-item gov-animate-fade" data-delay="0.3">
                        <div class="gov-checklist-icon"><i class="fa-solid fa-check"></i></div>
                        <div class="gov-checklist-text">{{ __('frontend.risks.measure_2') }}</div>
                    </div>
                    <div class="gov-checklist-item gov-animate-fade" data-delay="0.4">
                        <div class="gov-checklist-icon"><i class="fa-solid fa-check"></i></div>
                        <div class="gov-checklist-text">{{ __('frontend.risks.measure_3') }}</div>
                    </div>
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
            gsap.fromTo(el, { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } });
        });
    }
});
</script>
@endsection
