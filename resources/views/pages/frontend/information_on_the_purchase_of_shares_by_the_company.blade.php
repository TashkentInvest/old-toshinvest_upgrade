@extends('layouts.frontend_app')
@section('title', __('frontend.share_purchase.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.share_purchase.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-hand-holding-dollar"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.share_purchase.title')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-info-circle"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.share_purchase.title') }}</h3>
            </div>
            <div class="gov-card-body">
                <x-frontend.info-box type="info">
                    @if(app()->getLocale() == 'ru')
                        На текущий момент информация о покупке акций обществом отсутствует.
                    @elseif(app()->getLocale() == 'uz')
                        Hozirda jamiyat tomonidan aksiyalarni sotib olish to'g'risida ma'lumot mavjud emas.
                    @else
                        Currently, there is no information about share purchases by the company.
                    @endif
                </x-frontend.info-box>
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
