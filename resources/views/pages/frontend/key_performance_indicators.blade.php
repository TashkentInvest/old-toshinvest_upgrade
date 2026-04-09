@extends('layouts.frontend_app')
@section('title', __('frontend.kpi.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.kpi.title')"
        :subtitle="__('frontend.kpi.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-chart-line"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.kpi.title')]
        ]"
    />

    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-body">
                <x-frontend.info-box type="info">
                    <h3 style="margin-bottom: 1rem;">{{ __('frontend.kpi.notice_title') }}</h3>
                    <p>{{ __('frontend.kpi.notice_text') }}</p>
                </x-frontend.info-box>
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
