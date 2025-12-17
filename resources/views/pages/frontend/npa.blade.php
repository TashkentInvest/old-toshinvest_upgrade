@extends('layouts.frontend_app')
@section('title', __('frontend.npa.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.npa.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-gavel"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.npa.title')]
        ]"
    />

    {{-- Documents --}}
    <x-frontend.section bg="white">
        @php
            $folderPath = public_path('assets/frontend/npa');
            $files = [];
            if (is_dir($folderPath)) {
                $allFiles = scandir($folderPath);
                foreach ($allFiles as $file) {
                    if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                        $files[] = $file;
                    }
                }
            }
            sort($files);
        @endphp

        @if(count($files) > 0)
            @foreach($files as $index => $file)
                <div class="gov-doc-item gov-animate-fade" data-delay="{{ 0.1 + ($index * 0.1) }}">
                    <div class="gov-doc-icon pdf"><i class="fa-solid fa-file-pdf"></i></div>
                    <div class="gov-doc-info">
                        <div class="gov-doc-title">{{ pathinfo($file, PATHINFO_FILENAME) }}</div>
                        <div class="gov-doc-meta">PDF</div>
                    </div>
                    <div class="gov-doc-actions">
                        <a href="{{ asset('assets/frontend/npa/' . $file) }}" download class="gov-table-btn gov-table-btn-primary">
                            <i class="fa-solid fa-download"></i>
                            {{ __('frontend.npa.download') }}
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <x-frontend.info-box type="info">
                {{ __('frontend.npa.info_text') }}
            </x-frontend.info-box>
        @endif
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
