{{-- Section Component --}}
@props([
    'title' => null,
    'subtitle' => null,
    'bg' => 'white',
    'padding' => 'normal'
])

@php
    $bgClass = match($bg) {
        'gray' => 'gov-section-gray',
        'light' => 'gov-section-light',
        default => 'gov-section-white'
    };
    $paddingClass = match($padding) {
        'large' => 'gov-section-lg',
        'small' => 'gov-section-sm',
        default => ''
    };
@endphp

<section class="gov-section {{ $bgClass }} {{ $paddingClass }}">
    <div class="gov-container">
        @if($title)
            <div class="gov-section-header gov-animate-fade">
                <h2 class="gov-section-title">{{ $title }}</h2>
                @if($subtitle)
                    <p class="gov-section-subtitle">{{ $subtitle }}</p>
                @endif
            </div>
        @endif
        {{ $slot }}
    </div>
</section>
