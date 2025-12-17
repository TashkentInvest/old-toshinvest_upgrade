{{-- PDF Viewer Component --}}
@props([
    'src',
    'title' => null,
    'height' => '800px',
    'downloadable' => true
])

<div class="gov-pdf-viewer gov-animate-fade">
    @if($title)
        <div class="gov-pdf-header">
            <h3 class="gov-pdf-title">
                <i class="fa-solid fa-file-pdf"></i>
                {{ $title }}
            </h3>
            @if($downloadable)
                <a href="{{ $src }}" download class="gov-btn gov-btn-secondary">
                    <i class="fa-solid fa-download"></i>
                    {{ __('frontend.common.download') }}
                </a>
            @endif
        </div>
    @endif
    <div class="gov-pdf-container" style="height: {{ $height }}">
        <iframe src="{{ $src }}" width="100%" height="100%" frameborder="0" loading="lazy"></iframe>
    </div>
</div>
