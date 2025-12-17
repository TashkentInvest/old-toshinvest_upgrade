{{-- Hero Section Component --}}
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
            @if(count($breadcrumbs) > 0)
                <nav class="gov-breadcrumb" aria-label="breadcrumb">
                    @foreach($breadcrumbs as $item)
                        @if(!$loop->last)
                            <a style="color: #fff" href="{{ $item['url'] }}" class="gov-breadcrumb-link">{{ $item['label'] }}</a>
                            <span class="gov-breadcrumb-sep">→</span>
                        @else
                            <span class="gov-breadcrumb-current">{{ $item['label'] }}</span>
                        @endif
                    @endforeach
                </nav>
            @endif

            @if($badge)
                <div class="gov-badge">
                    <i class="fa-solid {{ $badgeIcon }}"></i>
                    <span>{{ $badge }}</span>
                </div>
            @endif

            <h1 class="gov-title">{{ $title }}</h1>

            @if($subtitle)
                <p class="gov-subtitle">{!! $subtitle !!}</p>
            @endif

            {{ $slot }}
        </div>
    </div>
</section>
