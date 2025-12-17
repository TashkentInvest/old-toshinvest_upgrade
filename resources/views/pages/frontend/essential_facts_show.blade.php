@extends('layouts.frontend_app')
@section('title', __('frontend.essential_facts.view_title') . ' ' . $number . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    <x-frontend.hero
        :title="__('frontend.essential_facts.view_title') . ' ' . $number"
        :subtitle="__('frontend.essential_facts.view_subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-lines"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => route('frontend.essential_facts'), 'label' => __('frontend.essential_facts.title')],
            ['url' => '#', 'label' => __('frontend.essential_facts.view_title') . ' ' . $number]
        ]"
    />

    <x-frontend.section bg="white">
        @php
            $folderPath = public_path('assets/frontend/muhim_faktlar');
            $totalSize = 0;
            foreach ($files as $file) {
                $fp = $folderPath . '/' . $file;
                if (file_exists($fp)) $totalSize += filesize($fp);
            }
        @endphp

        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <i class="fa-solid fa-arrow-left" style="cursor:pointer" onclick="window.location.href='{{ route('frontend.essential_facts') }}'"></i>
                <h2>{{ __('frontend.essential_facts.documents') }}</h2>
            </div>
            <div class="gov-card-body">
                <div class="gov-table-container">
                    <table class="gov-table">
                        <thead>
                            <tr>
                                <th style="width: 60px;">№</th>
                                <th>{{ __('frontend.common.document_name') }}</th>
                                <th style="width: 100px;">{{ __('frontend.common.size') }}</th>
                                <th style="width: 160px;">{{ __('frontend.common.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $index => $file)
                                @php
                                    $filePath = $folderPath . '/' . $file;
                                    $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                    $formattedSize = $fileSize >= 1048576 ? number_format($fileSize / 1048576, 1) . ' MB' : number_format($fileSize / 1024, 1) . ' KB';
                                    $displayName = __('frontend.essential_facts.view_title') . ' ' . $number . (count($files) > 1 ? ' (' . ($index + 1) . ')' : '');
                                @endphp
                                <tr class="gov-animate-fade" data-delay="{{ ($index * 0.05) + 0.2 }}">
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        <strong>{{ $displayName }}</strong>
                                        <br><small class="text-muted">{{ $file }}</small>
                                    </td>
                                    <td class="text-center text-muted">{{ $formattedSize }}</td>
                                    <td class="text-center">
                                        <div style="display:flex;gap:6px;justify-content:center;">
                                            <a href="{{ asset('assets/frontend/muhim_faktlar/' . $file) }}" target="_blank" class="gov-btn gov-btn-sm gov-btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ asset('assets/frontend/muhim_faktlar/' . $file) }}" download class="gov-btn gov-btn-sm gov-btn-success">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('frontend.common.no_documents') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-frontend.stats-grid cols="2" class="gov-animate-fade" data-delay="0.3">
            <x-frontend.stat-card
                :value="count($files)"
                :label="__('frontend.common.total_documents')"
                icon="fa-file-pdf"
            />
            <x-frontend.stat-card
                :value="$totalSize >= 1048576 ? number_format($totalSize / 1048576, 1) . ' MB' : number_format($totalSize / 1024, 1) . ' KB'"
                :label="__('frontend.common.total_size')"
                icon="fa-hard-drive"
            />
        </x-frontend.stats-grid>

        <div class="gov-back-link gov-animate-fade" data-delay="0.4">
            <a href="{{ route('frontend.essential_facts') }}" class="gov-btn gov-btn-outline">
                <i class="fa-solid fa-arrow-left"></i>
                <span>{{ __('frontend.common.back_to_list') }}</span>
            </a>
        </div>
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
