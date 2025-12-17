{{-- Info Box Component --}}
@props([
    'type' => 'info',
    'icon' => null,
    'title' => null
])

@php
    $icons = [
        'info' => 'fa-circle-info',
        'warning' => 'fa-triangle-exclamation',
        'success' => 'fa-circle-check',
        'error' => 'fa-circle-xmark'
    ];
    $boxIcon = $icon ?? ($icons[$type] ?? 'fa-circle-info');
@endphp

<div class="gov-info-box gov-info-{{ $type }}">
    <i class="fa-solid {{ $boxIcon }}"></i>
    <div class="gov-info-content">
        @if($title)
            <strong>{{ $title }}</strong>
        @endif
        {{ $slot }}
    </div>
</div>
