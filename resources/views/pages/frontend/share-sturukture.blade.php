@extends('layouts.frontend_app')
@section('title', __('frontend.share.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.share.title')"
        :subtitle="__('frontend.share.subtitle')"
        :badge="__('frontend.share.governing_body')"
        badgeIcon="fa-landmark"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.share.title')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-chart-pie"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.share.structure_title') }}</h3>
            </div>
            <div class="gov-card-body">
                <x-frontend.stats-grid :columns="4">
                    <x-frontend.stat-card
                        :value="__('frontend.share.issue_value')"
                        :label="__('frontend.share.issue_volume')"
                        :unit="__('frontend.share.million_sum')"
                        icon="fa-chart-line"
                        delay="0.2"
                    />
                    <x-frontend.stat-card
                        :value="__('frontend.share.shares_value')"
                        :label="__('frontend.share.shares_count')"
                        :unit="__('frontend.share.pieces')"
                        icon="fa-file-contract"
                        delay="0.3"
                    />
                    <x-frontend.stat-card
                        value="100%"
                        :label="__('frontend.share.hokimiyat_share')"
                        :unit="__('frontend.share.in_charter_capital')"
                        icon="fa-percent"
                        :featured="true"
                        delay="0.4"
                    />
                    <x-frontend.stat-card
                        value="1"
                        :label="__('frontend.share.shareholder')"
                        :unit="__('frontend.share.sole')"
                        icon="fa-building-columns"
                        delay="0.5"
                    />
                </x-frontend.stats-grid>
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
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } }
            );
        });
    }
});
</script>
@endsection
