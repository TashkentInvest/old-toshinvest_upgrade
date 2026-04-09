@extends('layouts.frontend_app')
@section('title', __('frontend.committees.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.committees.title')"
        :subtitle="__('frontend.committees.subtitle')"
        :badge="__('frontend.committees.structural_divisions')"
        badgeIcon="fa-sitemap"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.committees.title')]
        ]"
    />

    {{-- Committees --}}
    <x-frontend.section bg="white">
        {{-- Audit Committee --}}
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-clipboard-check"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.committees.audit_committee') }}</h3>
            </div>
            <div class="gov-card-body">
                <div class="gov-table-container">
                    <table class="gov-table">
                        <thead>
                            <tr>
                                <th>{{ __('frontend.committees.full_name') }}</th>
                                <th class="center" style="width: 200px;">{{ __('frontend.committees.role_in_committee') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('frontend.supervisory.member2_name') }}</td>
                                <td class="center"><span style="background: var(--gov-primary); color: white; padding: 4px 12px; font-size: 12px; font-weight: 600;">{{ __('frontend.committees.committee_chairman') }}</span></td>
                            </tr>
                            <tr>
                                <td>{{ __('frontend.supervisory.member1_name') }}</td>
                                <td class="center">{{ __('frontend.committees.committee_member') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Strategy Committee --}}
        <div class="gov-card gov-animate-fade" data-delay="0.2">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-chart-line"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.committees.strategy_committee') }}</h3>
            </div>
            <div class="gov-card-body">
                <div class="gov-table-container">
                    <table class="gov-table">
                        <thead>
                            <tr>
                                <th>{{ __('frontend.committees.full_name') }}</th>
                                <th class="center" style="width: 200px;">{{ __('frontend.committees.role_in_committee') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ __('frontend.supervisory.member1_name') }}</td>
                                <td class="center"><span style="background: var(--gov-primary); color: white; padding: 4px 12px; font-size: 12px; font-weight: 600;">{{ __('frontend.committees.committee_chairman') }}</span></td>
                            </tr>
                            <tr>
                                <td>{{ __('frontend.supervisory.member2_name') }}</td>
                                <td class="center">{{ __('frontend.committees.committee_member') }}</td>
                            </tr>
                        </tbody>
                    </table>
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
