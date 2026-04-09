@extends('layouts.frontend_app')
@section('title', __('frontend.offers.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.offers.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-handshake"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.offers.title')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-building"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.offers.valuation_organizations') }}</h3>
            </div>
            <div class="gov-card-body">
                <div class="gov-content-text">
                    <p>{{ __('frontend.offers.announcement_text') }}</p>
                    <p><strong>{{ __('frontend.offers.call_to_action') }}</strong></p>
                </div>
            </div>
        </div>
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
