@extends('layouts.frontend_app')
@section('title', __('frontend.docs.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.docs.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-scale-balanced"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.docs.title')]
        ]"
    />

    {{-- Documents --}}
    <x-frontend.section bg="white">
        {{-- Code of Ethics --}}
        <div class="gov-doc-item gov-animate-fade" data-delay="0.1">
            <div class="gov-doc-icon pdf"><i class="fa-solid fa-file-pdf"></i></div>
            <div class="gov-doc-info">
                <div class="gov-doc-title">{{ __('frontend.docs.code_of_ethics') }}</div>
                <div class="gov-doc-meta">PDF</div>
            </div>
            <div class="gov-doc-actions">
                <a href="{{ asset('assets/folders/korporativ_axloq_kodeksi.pdf') }}" target="_blank" class="gov-table-btn gov-table-btn-secondary">
                    <i class="fa-solid fa-eye"></i>
                    {{ __('frontend.docs.view') }}
                </a>
                <a href="{{ asset('assets/folders/korporativ_axloq_kodeksi.pdf') }}" download class="gov-table-btn gov-table-btn-primary">
                    <i class="fa-solid fa-download"></i>
                    {{ __('frontend.common.download') }}
                </a>
            </div>
        </div>

        {{-- Corporate Governance Code --}}
        <div class="gov-doc-item gov-animate-fade" data-delay="0.2">
            <div class="gov-doc-icon pdf"><i class="fa-solid fa-file-pdf"></i></div>
            <div class="gov-doc-info">
                <div class="gov-doc-title">{{ __('frontend.docs.corporate_governance_code') }}</div>
                <div class="gov-doc-meta">PDF</div>
            </div>
            <div class="gov-doc-actions">
                <a href="{{ asset('assets/folders/korporativ_boshqaruv_kodeksi.pdf') }}" target="_blank" class="gov-table-btn gov-table-btn-secondary">
                    <i class="fa-solid fa-eye"></i>
                    {{ __('frontend.docs.view') }}
                </a>
                <a href="{{ asset('assets/folders/korporativ_boshqaruv_kodeksi.pdf') }}" download class="gov-table-btn gov-table-btn-primary">
                    <i class="fa-solid fa-download"></i>
                    {{ __('frontend.common.download') }}
                </a>
            </div>
        </div>

        {{-- Corporate Governance Rules --}}
        <div class="gov-doc-item gov-animate-fade" data-delay="0.3">
            <div class="gov-doc-icon pdf"><i class="fa-solid fa-file-pdf"></i></div>
            <div class="gov-doc-info">
                <div class="gov-doc-title">{{ __('frontend.docs.corporate_governance_rules') }}</div>
                <div class="gov-doc-meta">PDF</div>
            </div>
            <div class="gov-doc-actions">
                <a href="{{ asset('assets/folders/korporativ_boshqaruv_qoidalari.pdf') }}" target="_blank" class="gov-table-btn gov-table-btn-secondary">
                    <i class="fa-solid fa-eye"></i>
                    {{ __('frontend.docs.view') }}
                </a>
                <a href="{{ asset('assets/folders/korporativ_boshqaruv_qoidalari.pdf') }}" download class="gov-table-btn gov-table-btn-primary">
                    <i class="fa-solid fa-download"></i>
                    {{ __('frontend.common.download') }}
                </a>
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
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.5, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 90%' } }
            );
        });
    }
});
</script>
@endsection
