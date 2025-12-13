@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748789817" class="r t-rec t-rec_pt_30 t-rec_pb_60" style="padding-top: 30px; padding-bottom: 60px"
        data-animationappear="off" data-record-type="897">

       <!-- Search and Filter Section -->
<div class="search-container">
    <div class="search-wrapper">
        <form method="GET" action="{{ route('frontend.media') }}" class="search-form">
            <div class="search-fields">
                <!-- Search Bar -->
                <div class="field">
                    <label for="search">{{ __('frontend.common.search') }}</label>
                    <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="{{ __('frontend.media.search_news') }}">
                </div>

                <!-- Date From -->
                <div class="field">
                    <label for="date_from">{{ __('frontend.media.date_from') }}</label>
                    <input type="date" id="date_from" name="date_from" value="{{ request('date_from') }}">
                </div>

                <!-- Date To -->
                <div class="field">
                    <label for="date_to">{{ __('frontend.media.date_to') }}</label>
                    <input type="date" id="date_to" name="date_to" value="{{ request('date_to') }}">
                </div>

                <!-- Search Button -->
                <div class="field buttons">
                    <button type="submit" class="btn-search">{{ __('frontend.common.search') }}</button>
                    <a href="{{ route('frontend.media') }}" class="btn-reset">{{ __('frontend.common.cancel') }}</a>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.search-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
    margin-bottom: 30px;
}

.search-wrapper {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 8px;
}

.search-form {
    margin: 0;
}

.search-fields {
    display: flex;
    gap: 20px;
    align-items: end;
    flex-wrap: wrap;
}

.field {
    flex: 1;
    min-width: 200px;
}

.field.buttons {
    flex: 0 0 auto;
    min-width: 150px;
}

.field label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #333;
}

.field input {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background: white;
}

.field input:focus {
    outline: none;
    border-color: #007bff;
}

.buttons {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.btn-search, .btn-reset {
    padding: 10px 20px;
    border-radius: 4px;
    text-decoration: none;
    text-align: center;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    display: block;
}

.btn-search {
    background: #007bff;
    color: white;
}

.btn-search:hover {
    background: #0056b3;
}

.btn-reset {
    background: white;
    color: #6c757d;
    border: 1px solid #ddd;
}

.btn-reset:hover {
    background: #f8f9fa;
    text-decoration: none;
}

@media (max-width: 768px) {
    .search-fields {
        flex-direction: column;
    }

    .field {
        min-width: 100%;
    }

    .buttons {
        flex-direction: row;
    }
}
</style>
        <!-- Results Info -->
        @if($news->total() > 0)
            <div class="container mb-3">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 text-muted">
                                {{ __('frontend.common.showing') }} {{ $news->firstItem() ?? 0 }} - {{ $news->lastItem() ?? 0 }} {{ __('frontend.common.of') }} {{ $news->total() }} {{ __('frontend.common.results') }}
                            </p>
                            @if(request()->hasAny(['search', 'date_from', 'date_to']))
                                <span class="badge bg-info">{{ __('frontend.common.filter') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- t897 -->
        <div class="t897">
            <div class="js-feed t-feed t-feed_col" data-feed-grid-type="col" data-feed-recid="748789817"
                data-feed-uid="158972239651">
                <div class="t-feed__container t897__container">
                    <div class="js-feed-parts-select-container t-col t-col_12"></div>
                </div>

                @if($news->count() > 0)
                    <ul role="list"
                        class="js-feed-container t-feed__container t897__container t-feed__container_mobile-grid t-feed__container_inrow3"
                        data-feed-show-slice="1" data-slider-totalslides="{{ $news->count() }}">

                        @foreach($news as $newsItem)
                            <li class="js-feed-post t-feed__post t-item t-width t-feed__grid-col t-col t-col_4 t-align_left"
                                data-post-uid="news_{{ $newsItem->id }}" style="cursor: pointer;">
                                <div class="t-feed__col-grid__post-wrapper">
                                    <div class="t-feed__post-imgwrapper t-feed__post-imgwrapper_beforetitle"
                                        style="aspect-ratio: 1.3;">
                                        <div class="t-feed__post-label-wrapper"></div>
                                        <div class="t-feed__post-bgimg t-bgimg loaded"
                                             bgimgfield="fe_img__news_{{ $newsItem->id }}"
                                             data-original="{{ $newsItem->getImagePath() }}"
                                             style="background-image: url('{{ $newsItem->getImagePath() }}'); background-size: cover; background-position: center;">
                                        </div>
                                    </div>
                                    <div class="t-feed__col-grid__wrapper" style="height: 93px;">
                                        <div class="t-feed__textwrapper">
                                            <div class="js-feed-post-title t-feed__post-title t-name t-name_md"
                                                field="fe_title__news_{{ $newsItem->id }}" data-redactor-toolbar="no">
                                                <a href="{{ route('frontend.media.detail', $newsItem->id) }}"
                                                   class="t-feed__link js-feed-post-link" role="button"
                                                   aria-haspopup="dialog">{{ Str::limit($newsItem->title, 80) }}</a>
                                            </div>
                                        </div>
                                        <div class="t-feed__post-parts-date-row t-feed__post-parts-date-row_afterdescr">
                                            <span class="js-feed-post-date t-feed__post-date t-uptitle t-uptitle_xs">
                                                {{ $newsItem->published_at ? $newsItem->published_at->format('d.m.Y') : 'Не указана' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <!-- No Results -->
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center py-5">
                                    <h4 class="text-muted">Новости не найдены</h4>
                                    <p class="text-muted mb-4">
                                        @if(request()->hasAny(['search', 'date_from', 'date_to']))
                                            Попробуйте изменить параметры поиска или сбросить фильтры.
                                        @else
                                            В данный момент новости отсутствуют.
                                        @endif
                                    </p>
                                    @if(request()->hasAny(['search', 'date_from', 'date_to']))
                                        <a href="{{ route('frontend.media') }}" class="btn btn-primary">
                                            Сбросить фильтры
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Pagination -->
        @if($news->hasPages())
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $news->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Original Tilda Styles -->
        <style type="text/css">
            /* Feed part switch buttons styles */
            #rec748789817 .t-feed__parts-switch-btn {
                border: 1px solid #000000;
                border-radius: 40px;
            }

            #rec748789817 .t-feed__parts-switch-btn span,
            #rec748789817 .t-feed__parts-switch-btn a {
                color: #000000;
                padding: 6px 18px 6px;
                border-radius: 40px;
            }

            #rec748789817 .t-feed__parts-switch-btn.t-active {
                background-color: #000000;
            }

            #rec748789817 .t-feed__parts-switch-btn.t-active span,
            #rec748789817 .t-feed__parts-switch-btn.t-active a {
                color: #ffffff !important;
            }
        </style>

        <style type="text/css">
            #rec748789817 .t-feed__post-popup__cover-wrapper .t-slds__bullet_active .t-slds__bullet_body,
            #rec748789817 .t-feed__post-popup__cover-wrapper .t-slds__bullet:hover .t-slds__bullet_body {
                background-color: #222 !important;
            }
        </style>

        <style>
            #rec748789817 .t-feed__post-title {
                font-size: 16px;
            }

            #rec748789817 .t-feed__parts-switch-btn {
                color: #000000;
                font-weight: 400;
            }

            /* Additional styles for search and pagination */
            .search-filter-wrapper {
                margin-bottom: 2rem;
            }

            .t-feed__link:hover {
                color: #0056b3;
                text-decoration: none;
            }

            .t-feed__post:hover {
                transform: translateY(-2px);
                transition: transform 0.2s ease;
            }

            .t-feed__post-bgimg {
                transition: transform 0.3s ease;
            }

            .t-feed__post:hover .t-feed__post-bgimg {
                transform: scale(1.05);
            }

            /* Pagination styles */
            .pagination .page-link {
                border-radius: 5px;
                margin: 0 2px;
                border: 1px solid #000000;
                color: #000000;
            }

            .pagination .page-item.active .page-link {
                background-color: #000000;
                border-color: #000000;
                color: #ffffff;
            }

            .pagination .page-link:hover {
                background-color: #f8f9fa;
                border-color: #000000;
                color: #000000;
            }

            /* Search form styles */
            .form-control:focus {
                border-color: #000000;
                box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
            }

            .btn-primary {
                background-color: #000000;
                border-color: #000000;
            }

            .btn-primary:hover {
                background-color: #333333;
                border-color: #333333;
            }

            .btn-outline-secondary {
                border-color: #000000;
                color: #000000;
            }

            .btn-outline-secondary:hover {
                background-color: #000000;
                color: #ffffff;
            }
        </style>

        <!-- Original Tilda JavaScript (simplified for Laravel) -->
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                // Add click handlers for news items
                const newsItems = document.querySelectorAll('.js-feed-post');
                newsItems.forEach(function(item) {
                    item.addEventListener('click', function(e) {
                        // If the click is not on the link itself, trigger the link
                        if (!e.target.closest('.js-feed-post-link')) {
                            const link = item.querySelector('.js-feed-post-link');
                            if (link) {
                                window.location.href = link.href;
                            }
                        }
                    });
                });

                // Add loading effect for images
                const images = document.querySelectorAll('.t-feed__post-bgimg');
                images.forEach(function(img) {
                    const imageUrl = img.getAttribute('data-original');
                    if (imageUrl) {
                        const tempImg = new Image();
                        tempImg.onload = function() {
                            img.style.backgroundImage = `url('${imageUrl}')`;
                            img.classList.add('loaded');
                        };
                        tempImg.onerror = function() {
                            // Set a placeholder background for failed images
                            img.style.backgroundImage = 'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)';
                            img.innerHTML = '<div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #999;"><i class="fas fa-image" style="font-size: 2rem;"></i></div>';
                            img.classList.add('loaded');
                        };
                        tempImg.src = imageUrl;
                    }
                });

                // Smooth scroll for pagination
                const paginationLinks = document.querySelectorAll('.pagination a');
                paginationLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        setTimeout(function() {
                            document.getElementById('rec748789817').scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 100);
                    });
                });
            });
        </script>
    </div>
@endsection
