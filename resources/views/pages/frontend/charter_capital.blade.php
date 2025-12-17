@extends('layouts.frontend_app')
@section('title', __('frontend.charter_capital.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.charter_capital.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-landmark"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.charter_capital.title')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-building-columns"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.charter_capital.title') }}</h3>
            </div>
            <div class="gov-card-body">
                <div class="gov-content-text">
                    <p>{{ __('frontend.charter_capital.content') }}</p>
                </div>
            </div>
        </div>

        {{-- Stats --}}
        <x-frontend.stats-grid :columns="3">
            <x-frontend.stat-card
                value="100"
                :label="__('frontend.share.issue_volume')"
                :unit="__('frontend.share.million_sum')"
                icon="fa-chart-line"
                delay="0.2"
            />
            <x-frontend.stat-card
                value="100"
                :label="__('frontend.share.shares_count')"
                :unit="__('frontend.share.pieces')"
                icon="fa-file-contract"
                :featured="true"
                delay="0.3"
            />
            <x-frontend.stat-card
                value="100%"
                :label="__('frontend.share.hokimiyat_share')"
                :unit="__('frontend.share.in_charter_capital')"
                icon="fa-percent"
                delay="0.4"
            />
        </x-frontend.stats-grid>
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
                    opacity: 1, y: 0, duration: 0.6,
                    delay: parseFloat(el.dataset.delay) || 0,
                    scrollTrigger: { trigger: el, start: 'top 85%' }
                }
            );
        });
    }
});
</script>
@endsection
