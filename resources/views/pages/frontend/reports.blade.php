@extends('layouts.frontend_app')
@section('title', __('frontend.footer.reports') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.footer.reports')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-invoice"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.footer.reports')]
        ]"
    />

    {{-- Reports Grid --}}
    <x-frontend.section bg="white">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
            {{-- Balance Sheet --}}
            <div class="gov-card gov-animate-fade" data-delay="0.1">
                <div class="gov-card-header">
                    <div class="gov-card-icon"><i class="fa-solid fa-balance-scale"></i></div>
                    <h3 class="gov-card-title">
                        @if(app()->getLocale() == 'ru')
                            Бухгалтерский баланс
                        @elseif(app()->getLocale() == 'uz')
                            Buxgalteriya balansi
                        @else
                            Balance Sheet
                        @endif
                    </h3>
                </div>
                <div class="gov-card-body">
                    <p style="color: var(--gov-text-muted); margin-bottom: 20px;">
                        @if(app()->getLocale() == 'ru')
                            1 квартал 2024 года
                        @elseif(app()->getLocale() == 'uz')
                            2024 yil 1-chorak
                        @else
                            Q1 2024
                        @endif
                    </p>
                    <a href="{{ route('frontend.balance') }}" class="gov-btn gov-btn-primary" style="width: 100%;">
                        <i class="fa-solid fa-eye"></i>
                        {{ __('frontend.common.open') }}
                    </a>
                </div>
            </div>

            {{-- Income Statement --}}
            <div class="gov-card gov-animate-fade" data-delay="0.2">
                <div class="gov-card-header">
                    <div class="gov-card-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <h3 class="gov-card-title">
                        @if(app()->getLocale() == 'ru')
                            Отчет о финансовых результатах
                        @elseif(app()->getLocale() == 'uz')
                            Moliyaviy natijalar hisoboti
                        @else
                            Income Statement
                        @endif
                    </h3>
                </div>
                <div class="gov-card-body">
                    <p style="color: var(--gov-text-muted); margin-bottom: 20px;">
                        @if(app()->getLocale() == 'ru')
                            1 квартал 2024 года
                        @elseif(app()->getLocale() == 'uz')
                            2024 yil 1-chorak
                        @else
                            Q1 2024
                        @endif
                    </p>
                    <a href="{{ route('frontend.income') }}" class="gov-btn gov-btn-primary" style="width: 100%;">
                        <i class="fa-solid fa-eye"></i>
                        {{ __('frontend.common.open') }}
                    </a>
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
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } }
            );
        });
    }
});
</script>
@endsection
