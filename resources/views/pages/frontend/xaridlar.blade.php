@extends('layouts.frontend_app')
@section('title', __('frontend.purchases.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.purchases.title')"
        :subtitle="__('frontend.purchases.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-contract"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.purchases.title')]
        ]"
    />

    <x-frontend.section bg="white">
        @php
            $documents = [
                'план закупок на 2025 год.pdf' => __('frontend.purchases.plan_2025'),
                'план закупок на 2026 год.pdf' => __('frontend.purchases.plan_2026'),
            ];
            $folder = public_path('assets/xarid_uchun');
        @endphp

        <div class="gov-docs-grid">
            @foreach ($documents as $fileName => $displayName)
                @php
                    $filePath = $folder . '/' . $fileName;
                    $exists = file_exists($filePath);
                    $fileSize = $exists ? filesize($filePath) : 0;
                    $formattedSize = $exists ? ($fileSize >= 1048576 ? number_format($fileSize / 1048576, 1) . ' MB' : number_format($fileSize / 1024, 1) . ' KB') : '';
                @endphp
                <div class="gov-doc-card gov-animate-fade" data-delay="{{ $loop->index * 0.1 + 0.1 }}">
                    <div class="gov-doc-icon">
                        <i class="fa-solid fa-file-pdf"></i>
                    </div>
                    <div class="gov-doc-info">
                        <h3 class="gov-doc-title">{{ $displayName }}</h3>
                        @if($exists)
                            <span class="gov-doc-size">{{ $formattedSize }}</span>
                        @endif
                    </div>
                    @if($exists)
                        <a href="{{ asset('assets/xarid_uchun/' . $fileName) }}" target="_blank" class="gov-btn gov-btn-primary">
                            <i class="fa-solid fa-eye"></i>
                            <span>{{ __('frontend.common.view') }}</span>
                        </a>
                    @else
                        <span class="gov-doc-unavailable">{{ __('frontend.common.not_available') }}</span>
                    @endif
                </div>
            @endforeach
        </div>

        <x-frontend.info-box type="info" class="gov-animate-fade" style="margin-top: 2rem;" data-delay="0.3">
            <p>{{ __('frontend.purchases.info_text') }}</p>
        </x-frontend.info-box>
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
