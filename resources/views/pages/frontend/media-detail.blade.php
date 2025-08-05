@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748789818" class="r t-rec t-rec_pt_30 t-rec_pb_60" style="padding-top: 30px; padding-bottom: 60px"
        data-animationappear="off" data-record-type="396">

        <!-- Breadcrumb Navigation -->
        <div class="detail-container">
            <nav class="breadcrumb-nav">
                <ul class="breadcrumb">
                    <li><a href="{{ url('/') }}">Главная</a></li>
                    <li><a href="{{ route('frontend.media') }}">Медиа</a></li>
                    <li>{{ Str::limit($news->title, 50) }}</li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="detail-container">
            <div class="detail-content">
                <!-- Article Content -->
                <div class="article-main">
                    <article class="article">
                        <!-- Article Header -->
                        <header class="article-header">
                            <h1 class="article-title">{{ $news->title }}</h1>

                            <!-- Article Meta -->
                            <div class="article-meta">
                                <span class="meta-item">
                                    <i class="far fa-calendar-alt"></i>
                                    {{ $news->published_at ? $news->published_at->format('d.m.Y') : 'Не указана' }}
                                </span>
                                <span class="meta-item">
                                    <i class="far fa-clock"></i>
                                    {{ $news->published_at ? $news->published_at->diffForHumans() : 'Не указана' }}
                                </span>
                                <span class="meta-item">
                                    <i class="far fa-eye"></i>
                                    Время чтения: {{ ceil(str_word_count(strip_tags($news->content ?? '')) / 200) }} мин
                                </span>
                            </div>
                        </header>

                        <!-- Featured Image -->
                        @if($news->image)
                            <div class="article-image">
                                <div class="image-container" style="background-image: url('{{ $news->getImagePath() }}');"></div>
                            </div>
                        @endif

                        <!-- Article Content -->
                        <div class="article-content">
                            @if($news->content)
                                <div class="article-text">
                                    {!! nl2br(e($news->content)) !!}
                                </div>
                            @else
                                <p class="no-content">Содержание статьи недоступно.</p>
                            @endif
                        </div>



                        <!-- Share Section -->
                        <div class="share-section">
                            <h5>Поделиться</h5>
                            <div class="share-buttons">
                                <a href="https://t.me/share/url?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" target="_blank" class="share-btn">
                                    <i class="fab fa-telegram-plane"></i>Telegram
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="share-btn">
                                    <i class="fab fa-facebook-f"></i>Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($news->title) }}" target="_blank" class="share-btn">
                                    <i class="fab fa-twitter"></i>Twitter
                                </a>
                                <button onclick="copyToClipboard()" class="share-btn">
                                    <i class="fas fa-copy"></i>Копировать ссылку
                                </button>
                            </div>
                        </div>

                        <!-- Navigation -->
                        <div class="article-navigation">
                            <div class="nav-buttons">
                                <a href="{{ route('frontend.media') }}" class="btn btn-sm">
                                    <i class="fas fa-arrow-left"></i>
                                    Вернуться к новостям
                                </a>
                                <button onclick="window.print()" class="btn btn-sm">
                                    <i class="fas fa-print"></i>
                                    Печать
                                </button>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Related News -->
                    @if(isset($relatedNews) && $relatedNews->count() > 0)
                        <div class="sidebar-widget">
                            <h4 class="widget-title">Похожие новости</h4>
                            <div class="widget-content">
                                @foreach($relatedNews as $related)
                                    <div class="related-item">
                                        @if($related->image)
                                            <div class="related-image" style="background-image: url('{{ $related->getImagePath() }}');"></div>
                                        @endif
                                        <div class="related-content">
                                            <h6 class="related-title">
                                                <a href="{{ route('frontend.media.detail', $related->id) }}">
                                                    {{ Str::limit($related->title, 60) }}
                                                </a>
                                            </h6>
                                            <small class="related-date">
                                                <i class="far fa-calendar-alt"></i>
                                                {{ $related->published_at ? $related->published_at->format('d.m.Y') : 'Не указана' }}
                                            </small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Quick Actions -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Быстрые действия</h4>
                        <div class="widget-content">
                            <div class="action-buttons">
                                <a href="{{ route('frontend.media') }}" class="btn btn-sm">
                                    <i class="fas fa-list"></i>
                                    Все новости
                                </a>
                                <button onclick="window.print()" class="btn btn-sm">
                                    <i class="fas fa-print"></i>
                                    Печать
                                </button>
                                <button onclick="copyToClipboard()" class="btn btn-sm">
                                    <i class="fas fa-share-alt"></i>
                                    Поделиться
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .detail-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .breadcrumb-nav {
            margin-bottom: 30px;
        }

        .breadcrumb {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            list-style: none;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .breadcrumb li {
            color: #6c757d;
        }

        .breadcrumb li:not(:last-child)::after {
            content: "›";
            margin: 0 10px;
            font-weight: bold;
        }

        .breadcrumb a {
            color: #000;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .detail-content {
            display: flex;
            gap: 40px;
        }

        .article-main {
            flex: 1;
            max-width: 800px;
        }

        .article {
            background: white;
        }

        .article-header {
            margin-bottom: 30px;
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            color: #000;
            margin: 0 0 20px 0;
        }

        .article-meta {
            padding-bottom: 15px;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .meta-item i {
            margin-right: 5px;
        }

        .article-image {
            margin-bottom: 40px;
        }

        .image-container {
            height: 400px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .article-content {
            margin-bottom: 40px;
        }

        .article-text {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #333;
        }

        .article-text p {
            margin-bottom: 1.5rem;
        }

        .no-content {
            color: #6c757d;
            font-style: italic;
        }

        .external-link {
            margin: 40px 0;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .external-link h5 {
            margin: 0 0 15px 0;
            color: #000;
        }

        .share-section {
            margin: 40px 0;
            padding-top: 30px;
            border-top: 1px solid #e9ecef;
        }

        .share-section h5 {
            margin: 0 0 15px 0;
            color: #000;
        }

        .share-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .share-btn {
            padding: 8px 16px;
            background: #f8f9fa;
            color: #333;
            text-decoration: none;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .share-btn:hover {
            background: #000;
            color: white;
            border-color: #000;
            text-decoration: none;
        }

        .article-navigation {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e9ecef;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: #1e45be;
            color: white !important;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            background: #333;
            color: white;
            text-decoration: none;
        }

        .btn-sm {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .sidebar {
            flex: 0 0 300px;
        }

        .sidebar-widget {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .widget-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #000;
            border-bottom: 2px solid #000;
            padding-bottom: 8px;
            margin: 0 0 20px 0;
        }

        .related-item {
            display: flex;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
        }

        .related-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .related-image {
            width: 80px;
            height: 60px;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .related-content {
            flex: 1;
        }

        .related-title {
            margin: 0 0 8px 0;
            font-size: 0.95rem;
            line-height: 1.3;
        }

        .related-title a {
            color: #000;
            text-decoration: none;
        }

        .related-title a:hover {
            color: #333;
        }

        .related-date {
            color: #6c757d;
            font-size: 0.8rem;
        }

        .related-date i {
            margin-right: 3px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        @media (max-width: 768px) {
            .detail-content {
                flex-direction: column;
                gap: 30px;
            }

            .sidebar {
                flex: none;
            }

            .article-title {
                font-size: 1.8rem;
            }

            .article-meta {
                flex-direction: column;
                gap: 10px;
            }

            .article-text {
                font-size: 1rem;
            }

            .nav-buttons {
                flex-direction: column;
            }

            .btn {
                text-align: center;
                justify-content: center;
            }

            .share-buttons {
                justify-content: center;
            }
        }

        @media print {
            .sidebar,
            .share-section,
            .article-navigation,
            .breadcrumb-nav {
                display: none !important;
            }

            .article-main {
                max-width: 100% !important;
            }

            .article-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <script>
        function copyToClipboard() {
            const url = window.location.href;
            navigator.clipboard.writeText(url).then(function() {
                showNotification('Ссылка скопирована в буфер обмена!');
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
                showNotification('Не удалось скопировать ссылку');
            });
        }

        function showNotification(message) {
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: #28a745;
                color: white;
                padding: 15px 20px;
                border-radius: 5px;
                z-index: 9999;
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.remove();
            }, 3000);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const images = document.querySelectorAll('.image-container, .related-image');
            images.forEach(img => {
                const bgImage = img.style.backgroundImage;
                if (bgImage) {
                    const url = bgImage.slice(5, -2);
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
