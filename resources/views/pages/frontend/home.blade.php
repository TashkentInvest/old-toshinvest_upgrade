@extends('layouts.frontend_app')
@section('frontent_content')

<style>
    .gov-surprise-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 20px;
        padding: 11px 18px;
        border-radius: 11px;
        border: 1px solid rgba(255, 255, 255, 0.35);
        background: rgba(15, 23, 42, 0.38);
        color: #ffffff !important;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.2px;
        backdrop-filter: blur(3px);
        animation: govPulse 2.8s ease-in-out infinite;
        transition: transform 0.25s ease, background-color 0.25s ease, border-color 0.25s ease;
    }

    .gov-surprise-btn:hover {
        transform: translateY(-1px);
        background: rgba(30, 64, 175, 0.45);
        border-color: rgba(191, 219, 254, 0.65);
        color: #ffffff;
    }

    @keyframes govPulse {
        0%, 100% {
            box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.0);
        }
        50% {
            box-shadow: 0 0 0 8px rgba(59, 130, 246, 0.18);
        }
    }
</style>

{{-- Hero Section --}}
<section class="home-hero">
    <div class="hero-background">
        <div class="hero-overlay"></div>
        <video class="hero-video" autoplay muted loop playsinline>
            <source src="{{ asset('assets/video.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="hero-content">
        <div class="container">
            <div class="hero-text">
                <h1 class="hero-title">{{ __('frontend.home.hero_title') }}</h1>
                <p class="hero-description">{{ __('frontend.home.hero_description') }}</p>
                @if(($activeTenderCount ?? 0) > 0)
                    @php
                        $tenderLink = !empty($latestActiveTender)
                            ? route('frontend.open_tender_notice.show', $latestActiveTender->slug)
                            : route('frontend.open_tender_notice');
                    @endphp
                    <a href="{{ $tenderLink }}" class="gov-surprise-btn" style="color:white !important">
                        <i class="fa-solid fa-bullhorn"></i>
                        {{ __('frontend.home.tender_alert_cta') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-arrow">
            <svg width="38" height="19" viewBox="0 0 38.417 18.592" fill="currentColor">
                <path d="M19.208,18.592c-0.241,0-0.483-0.087-0.673-0.261L0.327,1.74c-0.408-0.372-0.438-1.004-0.066-1.413c0.372-0.409,1.004-0.439,1.413-0.066L19.208,16.24L36.743,0.261c0.411-0.372,1.042-0.342,1.413,0.066c0.372,0.408,0.343,1.041-0.065,1.413L19.881,18.332C19.691,18.505,19.449,18.592,19.208,18.592z"/>
            </svg>
        </div>
    </div>
</section>

{{-- Features Section --}}
<section class="home-features">
    <div class="container">
        <div class="features-grid">
            {{-- Feature 1 - Large --}}
            <div class="feature-card feature-large">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3637-6137-4736-a139-393336343331/lison-zhao-Lvt7BnCpU.jpg" alt="{{ __('frontend.home.feature_1_title') }}">
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_1_title') }}</h3>
                    <p class="feature-description">{{ __('frontend.home.feature_1_desc') }}</p>
                </div>
            </div>

            {{-- Feature 2 --}}
            <div class="feature-card">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3163-6637-4965-b261-653835643334/pexels-photo-1431446.jpeg" alt="{{ __('frontend.home.feature_2_title') }}">
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_2_title') }}</h3>
                    <p class="feature-description">{{ __('frontend.home.feature_2_desc') }}</p>
                </div>
            </div>

            {{-- Feature 3 --}}
            <div class="feature-card">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3337-6335-4135-b032-646332396131/pexels-fotios-photos.jpg" alt="{{ __('frontend.home.feature_3_title') }}">
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_3_title') }}</h3>
                    <p class="feature-description">{{ __('frontend.home.feature_3_desc') }}</p>
                </div>
            </div>

            {{-- Feature 4 - Large --}}
            <div class="feature-card feature-large">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3639-3233-4732-a166-373937363864/pexels-photo-416405.jpeg" alt="{{ __('frontend.home.feature_4_title') }}">
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_4_title') }}</h3>
                    <p class="feature-description">{{ __('frontend.home.feature_4_desc') }}</p>
                </div>
            </div>

            {{-- Feature 5 --}}
            <div class="feature-card">
                <div class="feature-image">
                    <img src="https://static.tildacdn.one/tild3166-6138-4235-a138-373435626432/pexels-photo-681335.jpeg" alt="{{ __('frontend.home.feature_5_title') }}">
                </div>
                <div class="feature-content">
                    <h3 class="feature-title">{{ __('frontend.home.feature_5_title') }}</h3>
                    <p class="feature-description">{{ __('frontend.home.feature_5_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Latest News Section --}}
@if($news->count() > 0)
<section class="home-news">
    <div class="container">
        <div class="news-section-header">
            <div class="news-header-badge">
                <i class="fa-solid fa-newspaper"></i>
                <span>{{ __('frontend.home.latest_news') }}</span>
            </div>
            <a style="color: #fff" href="{{ route('frontend.media') }}" class="news-view-all">
                {{ __('frontend.common.view_all') }} <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="news-cards-grid">
            @foreach($news->take(3) as $newsItem)
            @php
                $imagePath = $newsItem->getImagePath();
                $hasImage = $imagePath && !str_contains($imagePath, 'placeholder');
            @endphp
            <article class="news-card-item">
                <a href="{{ route('frontend.media.detail', $newsItem->id) }}" class="news-card-link">
                    <div class="news-card-image {{ !$hasImage ? 'no-image' : '' }}">
                        @if($hasImage)
                            <img src="{{ $imagePath }}" alt="{{ $newsItem->title }}" loading="lazy">
                        @else
                            <div class="news-placeholder-icon">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        @endif
                        <div class="news-card-date">
                            <i class="fa-regular fa-calendar"></i>
                            {{ $newsItem->published_at ? $newsItem->published_at->format('d.m.Y') : __('frontend.common.date_not_set') }}
                        </div>
                    </div>
                    <div class="news-card-body">
                        <h3 class="news-card-title">{{ Str::limit($newsItem->title, 100) }}</h3>
                        <span class="news-card-more">
                            {{ __('frontend.common.read_more') }} <i class="fa-solid fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif



{{-- Yandex Map Script --}}
<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=latlong&onload=initHomeMap&apikey=a3c154a0-e8ad-438e-ada8-ac2260414d09"></script>
<script type="text/javascript">
function initHomeMap() {
    ymaps.ready(function () {
        var map = new ymaps.Map("yandex-map", {
            center: [41.310425, 69.248169],
            zoom: 16,
            controls: ['zoomControl', 'fullscreenControl']
        });

        var placemark = new ymaps.Placemark([41.310425, 69.248169], {
            balloonContent: '<strong>Tashkent Invest Company</strong><br>{{ __("frontend.contact.company_address") }}',
            hintContent: 'Tashkent Invest Company'
        }, {
            preset: 'islands#blueCircleDotIcon',
            iconColor: '#2d4a6f'
        });

        map.geoObjects.add(placemark);
        map.options.set('restrictMapArea', false);
    });
}
</script>
@endsection
