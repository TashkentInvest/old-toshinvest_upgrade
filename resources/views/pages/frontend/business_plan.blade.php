@extends('layouts.frontend_app')
@section('title', __('frontend.nav.business_plan') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.business_plan')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-lines"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.business_plan')]
        ]"
    />

    {{-- Business Plans List --}}
    <x-frontend.section bg="white">
        <div class="gov-documents-list">
            @php
                $businessPlans = [
                    [
                        'title' => __('frontend.nav.business_plan') . ' 2025',
                        'file' => asset('assets/folders/Бизнес-план 2025.pdf'),
                        'year' => '2025',
                        'icon' => 'fa-file-pdf'
                    ],
                    [
                        'title' => __('frontend.nav.business_plan') . ' 2024',
                        'file' => asset('assets/folders/Бизнес-план 2024.pdf'),
                        'year' => '2024',
                        'icon' => 'fa-file-pdf'
                    ],
                ];
            @endphp

            <div class="row g-4">
                @foreach($businessPlans as $plan)
                <div class="col-md-6 col-lg-4">
                    <div class="gov-document-card h-100">
                        <div class="gov-document-icon">
                            <i class="fas {{ $plan['icon'] }}"></i>
                        </div>
                        <div class="gov-document-content">
                            <span class="gov-document-year">{{ $plan['year'] }}</span>
                            <h5 class="gov-document-title">{{ $plan['title'] }}</h5>
                        </div>
                        <div class="gov-document-actions">
                            <a href="{{ $plan['file'] }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-eye me-1"></i> {{ __('frontend.buttons.view') }}
                            </a>
                            <a href="{{ $plan['file'] }}" download class="btn btn-primary btn-sm">
                                <i class="fas fa-download me-1"></i> {{ __('frontend.buttons.download') }}
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-frontend.section>
</div>

<style>
.gov-documents-list {
    padding: 2rem 0;
}

.gov-document-card {
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.gov-document-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
    border-color: var(--gov-primary, #1a56db);
}

.gov-document-icon {
    width: 64px;
    height: 64px;
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1rem;
}

.gov-document-icon i {
    font-size: 28px;
    color: #fff;
}

.gov-document-content {
    flex: 1;
    margin-bottom: 1rem;
}

.gov-document-year {
    display: inline-block;
    background: #f0f9ff;
    color: #0369a1;
    font-size: 12px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 20px;
    margin-bottom: 0.5rem;
}

.gov-document-title {
    font-size: 1rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0;
}

.gov-document-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    justify-content: center;
}

.gov-document-actions .btn {
    font-size: 13px;
    padding: 6px 14px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.gov-document-card').forEach((el, i) => {
            gsap.fromTo(el,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.5, delay: i * 0.1 }
            );
        });
    }
});
</script>
@endsection
