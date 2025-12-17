{{-- Stat Card Component --}}
@props([
    'value',
    'label',
    'unit' => null,
    'icon' => null,
    'featured' => false,
    'animate' => true,
    'delay' => '0'
])

<div class="gov-stat-card {{ $featured ? 'featured' : '' }} {{ $animate ? 'gov-animate-fade' : '' }}" @if($animate) data-delay="{{ $delay }}" @endif>
    @if($icon)
        <div class="gov-stat-icon"><i class="fa-solid {{ $icon }}"></i></div>
    @endif
    <div class="gov-stat-value">{{ $value }}</div>
    <div class="gov-stat-divider"></div>
    <div class="gov-stat-label">{{ $label }}</div>
    @if($unit)
        <div class="gov-stat-unit">{{ $unit }}</div>
    @endif
</div>
