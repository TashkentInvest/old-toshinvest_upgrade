{{-- Card Component --}}
@props([
    'title' => null,
    'number' => null,
    'icon' => null,
    'animate' => true,
    'delay' => '0'
])

<div class="gov-card {{ $animate ? 'gov-animate-fade' : '' }}" @if($animate) data-delay="{{ $delay }}" @endif>
    @if($title || $number)
        <div class="gov-card-header">
            @if($number)
                <div class="gov-card-number">{{ $number }}</div>
            @elseif($icon)
                <div class="gov-card-icon"><i class="fa-solid {{ $icon }}"></i></div>
            @endif
            @if($title)
                <h3 class="gov-card-title">{{ $title }}</h3>
            @endif
        </div>
    @endif
    <div class="gov-card-body">
        {{ $slot }}
    </div>
</div>
