@extends('layouts.frontend_app')
@section('title', __('frontend.nav.open_data') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.nav.open_data')"
        badge="Tashkent Invest"
        badgeIcon="fa-database"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.nav.open_data')]
        ]"
    />

    {{-- Open Data List --}}
    <x-frontend.section bg="white">
        <div class="gov-documents-list">
            @if($openData->count() > 0)
                <div class="row g-4">
                    @foreach($openData as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="gov-document-card h-100">
                            <div class="gov-document-icon">
                                <i class="fas {{ $item->file_type === 'PDF' ? 'fa-file-pdf' : ($item->file_type === 'XLSX' ? 'fa-file-excel' : 'fa-file') }}"></i>
                            </div>
                            <div class="gov-document-content">
                                <span class="gov-document-type">{{ $item->file_type }}</span>
                                <h5 class="gov-document-title">
                                    @switch(app()->getLocale())
                                        @case('uz')
                                            {{ $item->title_uz }}
                                            @break
                                        @case('en')
                                            {{ $item->title_en ?? $item->title_ru }}
                                            @break
                                        @default
                                            {{ $item->title_ru }}
                                    @endswitch
                                </h5>
                                @php
                                    $desc = '';
                                    switch(app()->getLocale()) {
                                        case 'uz':
                                            $desc = $item->description_uz;
                                            break;
                                        case 'en':
                                            $desc = $item->description_en ?? $item->description_ru;
                                            break;
                                        default:
                                            $desc = $item->description_ru;
                                    }
                                @endphp
                                @if($desc)
                                <p class="gov-document-desc">{{ substr($desc, 0, 100) }}{{ strlen($desc) > 100 ? '...' : '' }}</p>
                                @endif
                            </div>
                            <div class="gov-document-meta">
                                @if($item->file_size)
                                <small class="gov-document-size">{{ round($item->file_size / 1024 / 1024, 2) }} MB</small>
                                @endif
                            </div>
                            <div class="gov-document-actions">
                                @if($item->file_path)
                                    <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                        <i class="fas fa-eye me-1"></i> {{ __('frontend.buttons.view') }}
                                    </a>
                                    <a href="{{ asset('storage/' . $item->file_path) }}" download class="btn btn-primary btn-sm">
                                        <i class="fas fa-download me-1"></i> {{ __('frontend.buttons.download') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle me-2"></i>
                    {{ __('frontend.messages.no_data_available') }}
                </div>
            @endif
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

.gov-document-type {
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
    margin: 0.5rem 0;
}

.gov-document-desc {
    font-size: 13px;
    color: #6b7280;
    margin: 0;
}

.gov-document-meta {
    width: 100%;
    padding: 0.5rem 0;
    border-top: 1px solid #f3f4f6;
    margin-bottom: 1rem;
}

.gov-document-size {
    color: #6b7280;
    font-size: 12px;
}

.gov-document-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
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

