@extends('layouts.frontend_app')
@section('title', __('frontend.nav.dividends') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.dividends')"
        badge="Tashkent Invest"
        badgeIcon="fa-chart-pie"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.dividends')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-coins"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.nav.dividends') }} 2023-2024</h3>
            </div>
            <div class="gov-card-body">
                <x-frontend.info-box type="info">
                    @if(app()->getLocale() == 'ru')
                        В отчетном периоде 2023–2024 годов дивиденды не выплачивались в связи с вовлеченностью компании в финансирование и поддержку инвестиционных проектов, направленных на развитие объектов муниципальной собственности.
                    @elseif(app()->getLocale() == 'uz')
                        2023-2024 hisobot davrida dividendlar to'lanmadi, chunki kompaniya shahar mulki ob'ektlarini rivojlantirishga qaratilgan investitsiya loyihalarini moliyalashtirish va qo'llab-quvvatlash bilan band edi.
                    @else
                        In the reporting period 2023-2024, dividends were not paid due to the company's involvement in financing and supporting investment projects aimed at developing municipal property facilities.
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
