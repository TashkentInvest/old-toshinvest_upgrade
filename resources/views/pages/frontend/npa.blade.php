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
            $folder = 'assets/frontend/Normativ-huquqiy hujjatlar';
            $folderPath = public_path($folder);
            $files = [];
            if (is_dir($folderPath)) {
                $allFiles = scandir($folderPath);
                foreach ($allFiles as $file) {
                    if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        if (in_array($ext, ['pdf', 'doc', 'docx', 'xls', 'xlsx'])) {
                            $files[] = $file;
                        }
                    }
                }
            }
            sort($files);
        @endphp

        @if(count($files) > 0)
            <div class="npa-docs-grid">
                @foreach($files as $index => $file)
                    @php
                        $fileName = pathinfo($file, PATHINFO_FILENAME);
                        $ext = strtoupper(pathinfo($file, PATHINFO_EXTENSION));
                    @endphp
                    <div class="npa-doc-card">
                        <div class="npa-doc-header">
                            <div class="npa-doc-icon">
                                <i class="fa-solid fa-file-lines"></i>
                                <span>{{ $ext }}</span>
                            </div>
                            <div class="npa-doc-info">
                                <h4 class="npa-doc-title">{{ $fileName }}</h4>
                            </div>
                        </div>
                        <div class="npa-doc-footer">
                            <a style="color:#fff" href="{{ asset($folder . '/' . $file) }}" target="_blank" class="npa-btn npa-btn-open">
                                <i class="fa-solid fa-eye"></i> {{ __('frontend.common.open') }}
                            </a>
                            <a href="{{ asset($folder . '/' . $file) }}" download class="npa-btn npa-btn-download">
                                <i class="fa-solid fa-download"></i> {{ __('frontend.common.download') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <x-frontend.info-box type="info">
                {{ __('frontend.npa.info_text') }}
            </x-frontend.info-box>
        @endif
    </x-frontend.section>
</div>

<style>
    .npa-docs-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .npa-doc-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .npa-doc-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 16px 48px rgba(0,0,0,0.15);
    }

    .npa-doc-header {
        background: linear-gradient(145deg, #2d4a6f 0%, #1e3654 50%, #152638 100%);
        padding: 24px;
        display: flex;
        align-items: flex-start;
        gap: 18px;
    }

    .npa-doc-icon {
        width: 56px;
        min-width: 56px;
        height: 70px;
        background: #fff;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 4px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.2);
    }

    .npa-doc-icon i {
        font-size: 24px;
        color: #dc2626;
    }

    .npa-doc-icon span {
        font-size: 9px;
        font-weight: 800;
        color: #dc2626;
        letter-spacing: 0.5px;
    }

    .npa-doc-info {
        flex: 1;
        min-width: 0;
        display: flex;
        align-items: center;
    }

    .npa-doc-title {
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        line-height: 1.5;
        word-break: break-word;
    }

    .npa-doc-footer {
        padding: 18px 24px 24px;
        display: flex;
        gap: 12px;
        background: #fff;
    }

    .npa-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .npa-btn-open {
        background: #2d4a6f;
        color: #fff;
    }

    .npa-btn-open:hover {
        background: #1e3654;
        color: #fff;
    }

    .npa-btn-download {
        background: #f1f3f5;
        color: #2d4a6f;
        border: 1px solid #dee2e6;
    }

    .npa-btn-download:hover {
        background: #e9ecef;
        border-color: #2d4a6f;
        color: #2d4a6f;
    }

    @media (max-width: 768px) {
        .npa-docs-grid {
            grid-template-columns: 1fr;
        }

        .npa-doc-header {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .npa-doc-footer {
            flex-direction: column;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined') {
        document.querySelector('.gov-page').classList.add('gsap-loaded');
        gsap.utils.toArray('.npa-doc-card').forEach((el, i) => {
            gsap.fromTo(el,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.5, delay: i * 0.1 }
            );
        });
    }
});
</script>
@endsection
