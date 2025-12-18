{{-- Hero Section Component - Gov.uz Style --}}
@props([
    'title',
    'subtitle' => null,
    'badge' => null,
    'badgeIcon' => 'fa-building-columns',
    'breadcrumbs' => []
])

<section class="gov-hero">
    <div class="gov-container">
        <div class="gov-hero-content">
            {{-- Breadcrumbs --}}
            @if(count($breadcrumbs) > 0)
                <nav class="gov-breadcrumb" aria-label="breadcrumb">
                    @foreach($breadcrumbs as $item)
                        @if(!$loop->last)
                            <a style="color: white; font-wight:bold" href="{{ $item['url'] }}" class="gov-breadcrumb-link">{{ $item['label'] }}</a>
                            <span class="gov-breadcrumb-sep"><i class="fa-solid fa-chevron-right"></i></span>
                        @else
                            <span class="gov-breadcrumb-current">{{ $item['label'] }}</span>
                        @endif
                    @endforeach
                </nav>
            @endif

            {{-- Badge --}}
            @if($badge)
                <div class="gov-hero-badge">
                    <i class="fa-solid {{ $badgeIcon }}"></i>
                    <span>{{ $badge }}</span>
                </div>
            @endif

            {{-- Title --}}
            <h1 class="gov-hero-title">{{ $title }}</h1>

            {{-- Subtitle --}}
            @if($subtitle)
                <p class="gov-hero-subtitle">{!! $subtitle !!}</p>
            @endif

            {{-- Slot for additional content --}}
            {{ $slot }}
        </div>
    </div>
</section>
