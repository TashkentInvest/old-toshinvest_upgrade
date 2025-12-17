@extends('layouts.frontend_app')
@section('title', __('frontend.media.title') . ' | ' . __('frontend.seo.site_name'))

@section('frontent_content')
<div class="gov-page">
    {{-- Hero Section --}}
    <x-frontend.hero
        :title="__('frontend.media.title')"
        :subtitle="__('frontend.media.subtitle')"
        badge="Tashkent Invest"
        badgeIcon="fa-newspaper"
        :breadcrumbs="[
            ['url' => route('frontend.index'), 'label' => __('frontend.breadcrumb.home')],
            ['url' => '#', 'label' => __('frontend.media.title')]
        ]"
    />

    {{-- Search and Filter Section --}}
    <x-frontend.section bg="light">
        <div class="gov-card gov-animate-fade" data-delay="0.1">
            <div class="gov-card-header">
                <div class="gov-card-icon"><i class="fa-solid fa-filter"></i></div>
                <h3 class="gov-card-title">{{ __('frontend.media.filter') }}</h3>
            </div>
            <div class="gov-card-body">
                <form method="GET" action="{{ route('frontend.media') }}" class="gov-search-form">
                    <div class="gov-form-row">
                        <div class="gov-form-group">
                            <label for="search">{{ __('frontend.common.search') }}</label>
                            <input type="text" id="search" name="search" value="{{ request('search') }}"
                                   placeholder="{{ __('frontend.media.search_news') }}" class="gov-input">
                        </div>
                        <div class="gov-form-group">
                            <label for="date_from">{{ __('frontend.media.date_from') }}</label>
                            <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}" class="gov-input">
                        </div>
                        <div class="gov-form-group">
                            <label for="date_to">{{ __('frontend.media.date_to') }}</label>
                            <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}" class="gov-input">
                        </div>
                        <div class="gov-form-group gov-form-buttons">
                            <button type="submit" class="gov-btn gov-btn-primary">
                                <i class="fa-solid fa-search"></i> {{ __('frontend.common.search') }}
                            </button>
                            <a href="{{ route('frontend.media') }}" class="gov-btn gov-btn-secondary">
                                <i class="fa-solid fa-rotate-left"></i> {{ __('frontend.common.cancel') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-frontend.section>

    {{-- News Grid --}}
    <x-frontend.section bg="white">
        {{-- Results Info --}}
        @if($news->total() > 0)
            <div class="gov-results-info gov-animate-fade" data-delay="0.2">
                <p>{{ __('frontend.common.showing') }} {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }} {{ __('frontend.common.of') }} {{ $news->total() }} {{ __('frontend.common.results') }}</p>
                @if(request()->hasAny(['search', 'date_from', 'date_to']))
                    <span class="gov-badge gov-badge-info">{{ __('frontend.common.filter') }}</span>
                @endif
            </div>
        @endif

        @if($news->count() > 0)
            <div class="gov-news-grid">
                @foreach($news as $index => $newsItem)
                    <article class="gov-news-card gov-animate-fade" data-delay="{{ 0.1 + ($index * 0.05) }}">
                        <a href="{{ route('frontend.media.detail', $newsItem->id) }}" class="gov-news-link">
                            <div class="gov-news-image" style="background-image: url('{{ $newsItem->getImagePath() }}');">
                                <div class="gov-news-overlay"></div>
                            </div>
                            <div class="gov-news-content">
                                <h3 class="gov-news-title">{{ Str::limit($newsItem->title, 80) }}</h3>
                                <div class="gov-news-meta">
                                    <span class="gov-news-date">
                                        <i class="fa-regular fa-calendar"></i>
                                        {{ $newsItem->published_at ? $newsItem->published_at->format('d.m.Y') : __('frontend.common.date_not_set') }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        @else
            <x-frontend.info-box type="warning">
                <h4>{{ __('frontend.media.no_results') }}</h4>
                <p>
                    @if(request()->hasAny(['search', 'date_from', 'date_to']))
                        {{ __('frontend.media.try_different_search') }}
                    @else
                        {{ __('frontend.media.no_news_available') }}
                    @endif
                </p>
                @if(request()->hasAny(['search', 'date_from', 'date_to']))
                    <a href="{{ route('frontend.media') }}" class="gov-btn gov-btn-primary">
                        <i class="fa-solid fa-rotate-left"></i> {{ __('frontend.media.reset_filters') }}
                    </a>
                @endif
            </x-frontend.info-box>
        @endif

        {{-- Pagination --}}
        @if($news->hasPages())
            <div class="gov-pagination">
                {{ $news->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </x-frontend.section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelector('.gov-page').classList.add('gsap-loaded');

        gsap.utils.toArray('.gov-animate-fade').forEach(el => {
            gsap.fromTo(el,
                { opacity: 0, y: 30 },
                { opacity: 1, y: 0, duration: 0.6, delay: parseFloat(el.dataset.delay) || 0,
                  scrollTrigger: { trigger: el, start: 'top 85%' } }
            );
        });
    }
});
</script>
@endsection
