@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748789818" class="r t-rec t-rec_pt_30 t-rec_pb_60" style="padding-top: 30px; padding-bottom: 60px"
        data-animationappear="off" data-record-type="396">

        <!-- Breadcrumb Navigation -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}" class="text-decoration-none">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('frontend.media') }}" class="text-decoration-none">Медиа</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ Str::limit($news->title, 50) }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <!-- Article Content -->
                <div class="col-lg-8 col-md-12">
                    <article class="t-article">
                        <!-- Article Header -->
                        <header class="t-article__header mb-4">
                            <h1 class="t-article__title t-name t-name_lg mb-3">{{ $news->title }}</h1>

                            <!-- Article Meta -->
                            <div class="t-article__meta d-flex align-items-center text-muted mb-4">
                                <span class="t-article__date me-4">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    {{ $news->published_at ? $news->published_at->format('d.m.Y') : 'Не указана' }}
                                </span>
                                <span class="t-article__time me-4">
                                    <i class="far fa-clock me-2"></i>
                                    {{ $news->published_at ? $news->published_at->diffForHumans() : 'Не указана' }}
                                </span>
                                <span class="t-article__reading-time">
                                    <i class="far fa-eye me-2"></i>
                                    Время чтения: {{ ceil(str_word_count(strip_tags($news->content ?? '')) / 200) }} мин
                                </span>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        @if($news->image)
                            <div class="t-article__image mb-5">
                                <div class="t-bgimg"
                                     style="background-image: url('{{ $news->getImagePath() }}');
                                            background-size: cover;
                                            background-position: center;
                                            height: 400px;
                                            border-radius: 10px;
                                            box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                                </div>
                            </div>
                        @endif

                        <!-- Article Content -->
                        <div class="t-article__content t-text t-text_md">
                            @if($news->content)
                                <div class="article-text">
                                    {!! nl2br(e($news->content)) !!}
                                </div>
                            @else
                                <p class="text-muted">Содержание статьи недоступно.</p>
                            @endif
                        </div>

                        <!-- External Link -->
                        @if($news->link)
                            <div class="t-article__external-link mt-5 p-4 bg-light rounded">
                                <h5 class="mb-3">Внешняя ссылка</h5>
                                <a href="{{ $news->link }}" target="_blank" class="t-btn t-btn_md">
                                    <i class="fas fa-external-link-alt me-2"></i>
                                    Читать на источнике
                                </a>
                            </div>
                        @endif

                        <!-- Share Section -->
                        <div class="t-article__share mt-5 pt-4 border-top">
                            <h5 class="mb-3">Поделиться</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                   target="_blank" class="t-sociallinks__item">
                                    <i class="fab fa-telegram-plane me-2"></i>Telegram
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                   target="_blank" class="t-sociallinks__item">
                                    <i class="fab fa-facebook-f me-2"></i>Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}"
                                   target="_blank" class="t-sociallinks__item">
                                    <i class="fab fa-twitter me-2"></i>Twitter
                                </a>
                                <button onclick="copyToClipboard()" class="t-sociallinks__item btn-copy">
                                    <i class="fas fa-copy me-2"></i>Копировать ссылку
                                </button>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="t-article__navigation mt-5 pt-4 border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{ route('frontend.media') }}" class="t-btn t-btn_sm">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        Вернуться к новостям
                                    </a>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <button onclick="window.print()" class="t-btn t-btn_sm">
                                        <i class="fas fa-print me-2"></i>
                                        Печать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12">
                    <aside class="t-sidebar">
                        <!-- Related News -->
                        @if(isset($relatedNews) && $relatedNews->count() > 0)
                            <div class="t-sidebar__widget mb-5">
                                <h4 class="t-sidebar__title t-name t-name_md mb-4">Похожие новости</h4>
                                <div class="t-sidebar__content">
                                    @foreach($relatedNews as $related)
                                        <div class="t-sidebar__item d-flex mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                            @if($related->image)
                                                <div class="t-sidebar__item-image me-3">
                                                    <div class="t-bgimg"
                                                         style="background-image: url('{{ $related->getImagePath() }}');
                                                                background-size: cover;
                                                                background-position: center;
                                                                width: 80px;
                                                                height: 60px;
                                                                border-radius: 5px;">
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="t-sidebar__item-content">
                                                <h6 class="t-sidebar__item-title mb-2">
                                                    <a href="{{ route('frontend.media.detail', $related->id) }}"
                                                       class="text-decoration-none text-dark">
                                                        {{ Str::limit($related->title, 60) }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="far fa-calendar-alt me-1"></i>
                                                    {{ $related->published_at ? $related->published_at->format('d.m.Y') : 'Не указана' }}
                                                </small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Quick Actions -->
                        <div class="t-sidebar__widget">
                            <h4 class="t-sidebar__title t-name t-name_md mb-4">Быстрые действия</h4>
                            <div class="t-sidebar__content">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('frontend.media') }}" class="t-btn t-btn_sm">
                                        <i class="fas fa-list me-2"></i>
                                        Все новости
                                    </a>
                                    <button onclick="window.print()" class="t-btn t-btn_sm">
                                        <i class="fas fa-print me-2"></i>
                                        Печать
                                    </button>
                                    <button onclick="copyToClipboard()" class="t-btn t-btn_sm">
                                        <i class="fas fa-share-alt me-2"></i>
                                        Поделиться
                                    </button>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Tilda-style CSS -->
    <style>
        /* Article Styles */
        .t-article__title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: #000000;
        }

        .t-article__meta {
            font-size: 0.9rem;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 1rem;
        }

        .t-article__content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #333333;
        }

        .article-text p {
            margin-bottom: 1.5rem;
        }

        /* Button Styles */
        .t-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #000000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .t-btn:hover {
            background-color: #333333;
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        .t-btn_sm {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .t-btn_md {
            padding: 12px 24px;
            font-size: 1rem;
        }

        /* Social Links */
        .t-sociallinks__item {
            display: inline-block;
            padding: 8px 16px;
            background-color: #f8f9fa;
            color: #333333;
            text-decoration: none;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .t-sociallinks__item:hover {
            background-color: #000000;
            color: #ffffff;
            text-decoration: none;
            border-color: #000000;
        }

        .btn-copy {
            background: none;
            border: 1px solid #dee2e6;
        }

        /* Sidebar Styles */
        .t-sidebar__title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #000000;
            border-bottom: 2px solid #000000;
            padding-bottom: 0.5rem;
        }

        .t-sidebar__widget {
            background-color: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .t-sidebar__item-title a:hover {
            color: #000000;
        }

        /* Breadcrumb */
        .breadcrumb {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 5px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: "›";
            font-weight: bold;
        }

        .breadcrumb-item a {
            color: #000000;
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .t-article__title {
                font-size: 1.8rem;
            }

            .t-article__content {
                font-size: 1rem;
            }

            .t-article__meta {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Print Styles */
        @media print {
            .t-sidebar,
            .t-article__share,
            .t-article__navigation,
            .breadcrumb {
                display: none !important;
            }

            .col-lg-8 {
                width: 100% !important;
            }

            .t-article__title {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- JavaScript -->
    <script>
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(function() {
                showNotification('Ссылка скопирована в буфер обмена!', 'success');
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                showNotification('Не удалось скопировать ссылку', 'error');
            });
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed`;
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.zIndex = '9999';
            notification.innerHTML = message;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        // Document ready
        document.addEventListener('DOMContentLoaded', function() {
            // Image loading
            const images = document.querySelectorAll('.t-bgimg');
            images.forEach(img => {
                const bgImage = img.style.backgroundImage;
                if (bgImage) {
                    const url = bgImage.slice(5, -2); // Remove url(" and ")
                    const testImg = new Image();
                    testImg.onerror = function() {
                        img.style.backgroundImage = 'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)';
                        img.innerHTML = '<div style="display: flex; align-items: center; justify-content: center; height: 100%; color: #999;"><i class="fas fa-image" style="font-size: 2rem;"></i></div>';
                    };
                    testImg.src = url;
                }
            });
        });
    </script>

    <!-- Add Font Awesome if not already included -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
