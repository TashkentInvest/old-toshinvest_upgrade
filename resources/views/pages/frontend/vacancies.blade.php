@extends('layouts.frontend_app')
@section('title', __('frontend.nav.vacancies') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.vacancies')"
        :subtitle="str_replace(':company', __('frontend.company.name'), __('frontend.nav.join_us'))"
        :badge="__('frontend.nav.career')"
        badgeIcon="fa-briefcase"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.vacancies')]
        ]"
    />

    {{-- Content --}}
    <x-frontend.section bg="white">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-briefcase"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.nav.open_vacancies_hh') }}</h3>
            </div>
            <div class="gov-card-body">
                <p style="margin-bottom: 25px; color: var(--gov-text-muted); line-height: 1.7;">
                    {{ __('frontend.nav.view_vacancies_description') }}
                </p>

                <div style="display: flex; gap: 15px; flex-wrap: wrap; margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; gap: 8px; color: var(--gov-success);">
                        <i class="fa-solid fa-check-circle"></i>
                        <span>{{ __('frontend.nav.detailed_descriptions') }}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: var(--gov-success);">
                        <i class="fa-solid fa-check-circle"></i>
                        <span>{{ __('frontend.nav.online_resume_submission') }}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px; color: var(--gov-success);">
                        <i class="fa-solid fa-check-circle"></i>
                        <span>{{ __('frontend.nav.fast_feedback') }}</span>
                    </div>
                </div>

                <a href="https://hh.uz/employer/10152694" target="_blank" class="gov-btn gov-btn-primary" style="display: inline-flex;">
                    <i class="fa-solid fa-external-link-alt"></i>
                    <span>{{ __('frontend.nav.go_to_hh') }}</span>
                </a>
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
