@extends('layouts.frontend_app')
@section('title', __('frontend.essential_facts.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.essential_facts.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-lines"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.essential_facts.title')]
        ]"
    />

    {{-- Documents Table --}}
    <x-frontend.section bg="white">
        @php
            $folderPath = public_path('assets/frontend/muhim_faktlar');
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

            $groupedFiles = [];
            foreach ($files as $file) {
                if (preg_match('/(\d{2})/', $file, $matches)) {
                    $number = $matches[1];
                    if (!isset($groupedFiles[$number])) {
                        $groupedFiles[$number] = [];
                    }
                    $groupedFiles[$number][] = $file;
                }
            }
            ksort($groupedFiles);

            function formatFileSizeEF($size) {
                if ($size >= 1048576) {
                    return number_format($size / 1048576, 1, ',', ' ') . ' ' . __('frontend.essential_facts.mb');
                } elseif ($size >= 1024) {
                    return number_format($size / 1024, 1, ',', ' ') . ' ' . __('frontend.essential_facts.kb');
                }
                return $size . ' ' . __('frontend.essential_facts.b');
            }
        @endphp

        <div class="gov-table-container gov-animate-fade" data-delay="0.1">
            <table class="gov-table">
                <thead>
                    <tr>
                        <th class="center" style="width: 60px;">{{ __('frontend.essential_facts.number') }}</th>
                        <th>{{ __('frontend.essential_facts.document_name') }}</th>
                        <th class="center" style="width: 100px;">{{ __('frontend.essential_facts.size') }}</th>
                        <th class="center" style="width: 120px;">{{ __('frontend.essential_facts.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($groupedFiles) > 0)
                        @foreach ($groupedFiles as $number => $fileGroup)
                            @php
                                $totalSize = 0;
                                foreach ($fileGroup as $f) {
                                    $fp = $folderPath . '/' . $f;
                                    if (file_exists($fp)) {
                                        $totalSize += filesize($fp);
                                    }
                                }
                            @endphp
                            <tr>
                                <td class="center">{{ $loop->iteration }}</td>
                                <td>
                                    <strong>{{ __('frontend.essential_facts.fact_title') }} {{ $number }}</strong>
                                    <div style="font-size: 12px; color: var(--gov-text-muted);">
                                        {{ count($fileGroup) }} {{ count($fileGroup) > 1 ? __('frontend.essential_facts.documents_plural') : __('frontend.essential_facts.documents_singular') }}
                                    </div>
                                </td>
                                <td class="center">{{ formatFileSizeEF($totalSize) }}</td>
                                <td class="center">
                                    <a href="{{ route('frontend.essential_facts.show', $number) }}" class="gov-table-btn gov-table-btn-primary">
                                        <i class="fa-solid fa-folder-open"></i>
                                        {{ __('frontend.essential_facts.open') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="center" style="padding: 40px;">
                                <i class="fa-solid fa-folder-open" style="font-size: 48px; color: var(--gov-text-muted); margin-bottom: 15px; display: block;"></i>
                                <strong>{{ __('frontend.essential_facts.no_documents_title') }}</strong>
                                <p style="color: var(--gov-text-muted); margin-top: 8px;">{{ __('frontend.essential_facts.no_documents_message') }}</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Stats --}}
        @php
            $totalSize = 0;
            $totalFiles = 0;
            foreach ($groupedFiles as $fileGroup) {
                foreach ($fileGroup as $file) {
                    $filePath = $folderPath . '/' . $file;
                    if (file_exists($filePath)) {
                        $totalSize += filesize($filePath);
                        $totalFiles++;
                    }
                }
            }
        @endphp

        <x-frontend.stats-grid :columns="2">
            <x-frontend.stat-card
                :value="count($groupedFiles)"
                :label="__('frontend.essential_facts.categories_count')"
                icon="fa-folder"
                delay="0.2"
            />
            <x-frontend.stat-card
                :value="formatFileSizeEF($totalSize)"
                :label="__('frontend.essential_facts.total_size')"
                icon="fa-database"
                delay="0.3"
            />
        </x-frontend.stats-grid>

        <x-frontend.info-box type="info">
            {{ __('frontend.essential_facts.info_text') }}
        </x-frontend.info-box>
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
                {
                    opacity: 1, y: 0, duration: 0.6,
                    delay: parseFloat(el.dataset.delay) || 0,
                    scrollTrigger: { trigger: el, start: 'top 85%' }
                }
            );
        });
    }
});
</script>
@endsection
