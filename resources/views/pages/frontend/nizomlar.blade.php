@extends('layouts.frontend_app')
@section('title', __('frontend.regulations.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.regulations.title')"
        badge="Tashkent Invest"
        badgeIcon="fa-file-contract"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.regulations.title')]
        ]"
    />

    {{-- Documents --}}
    <x-frontend.section bg="white">
        @php
            $folderPath = public_path('assets/frontend/nizomlar');
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
            <div class="gov-table-container gov-animate-fade" data-delay="0.1">
                <table class="gov-table">
                    <thead>
                        <tr>
                            <th class="center" style="width: 60px;">{{ __('frontend.regulations.number') }}</th>
                            <th>{{ __('frontend.regulations.document_name') }}</th>
                            <th class="center" style="width: 150px;">{{ __('frontend.regulations.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $index => $file)
                            <tr>
                                <td class="center">{{ $index + 1 }}</td>
                                <td>{{ pathinfo($file, PATHINFO_FILENAME) }}</td>
                                <td class="center">
                                    <a href="{{ asset('assets/frontend/nizomlar/' . $file) }}" download class="gov-table-btn gov-table-btn-primary">
                                        <i class="fa-solid fa-download"></i>
                                        {{ __('frontend.common.download') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <x-frontend.info-box type="info">
                {{ __('frontend.regulations.no_documents') }}
            </x-frontend.info-box>
        @endif
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
