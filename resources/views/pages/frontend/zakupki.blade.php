@extends('layouts.frontend_app')
@section('title', __('frontend.procurement.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.procurement.title')"
        :subtitle="__('frontend.procurement.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-cart-shopping"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.procurement.title')]
        ]"
    />

    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <i class="fa-solid fa-bullhorn"></i>
                <h2>{{ __('frontend.procurement.announcements') }}</h2>
            </div>
            <div class="gov-card-body">
                <div class="gov-notice-list">
                    {{-- Notice 1 --}}
                    <div class="gov-notice-item gov-animate-fade" data-delay="0.2">
                        <div class="gov-notice-date">
                            <span class="gov-notice-day">15</span>
                            <span class="gov-notice-month">{{ __('frontend.months.may') }}</span>
                            <span class="gov-notice-year">2024</span>
                        </div>
                        <div class="gov-notice-content">
                            <h3 class="gov-notice-title">{{ __('frontend.procurement.notice_1_title') }}</h3>
                            <p class="gov-notice-excerpt">{{ __('frontend.procurement.notice_1_desc') }}</p>
                            <a href="https://toshkentinvest.uz/tpost/pc5jmbz1y1-vnimaniyu-nezavisimim-organizatsiyam-oka" target="_blank" class="gov-btn gov-btn-outline">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span>{{ __('frontend.common.read_more') }}</span>
                            </a>
                        </div>
                    </div>

                    {{-- Notice 2 --}}
                    <div class="gov-notice-item gov-animate-fade" data-delay="0.3">
                        <div class="gov-notice-date">
                            <span class="gov-notice-day">15</span>
                            <span class="gov-notice-month">{{ __('frontend.months.may') }}</span>
                            <span class="gov-notice-year">2024</span>
                        </div>
                        <div class="gov-notice-content">
                            <h3 class="gov-notice-title">{{ __('frontend.procurement.notice_2_title') }}</h3>
                            <p class="gov-notice-excerpt">{{ __('frontend.procurement.notice_2_desc') }}</p>
                            <a href="https://toshkentinvest.uz/tpost/mh7xpg1m11-vnimaniyu-nezavisimim-organizatsiyam-oka" target="_blank" class="gov-btn gov-btn-outline">
                                <i class="fa-solid fa-arrow-right"></i>
                                <span>{{ __('frontend.common.read_more') }}</span>
                            </a>
                        </div>
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
