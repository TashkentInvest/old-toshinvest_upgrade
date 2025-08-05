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
                                @if($news->hasMultipleImages())
                                    <span class="meta-item">
                                        <i class="far fa-images"></i>
                                        {{ count($news->getImageArray()) }} изображений
                                    </span>
                                @endif
                            </div>
                        </header>

                        <!-- Images Gallery -->
                        @if($news->image)
                            @php
                                $images = $news->getImageArray();
                                $imageCount = count($images);
                            @endphp

                            <div class="article-images">
                                @if($imageCount === 1)
                                    <!-- Single Image -->
                                    <div class="single-image">
                                        <div class="image-container"
                                             style="background-image: url('{{ $images[0] }}');"
                                             onclick="openImageModal(0)"
                                             title="Нажмите для увеличения">
                                            <div class="image-overlay">
                                                <i class="fas fa-search-plus"></i>
                                                <span>Увеличить</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <!-- Multiple Images Gallery -->
                                    <div class="images-gallery">
                                        <div class="gallery-header">
                                            <h3>Галерея изображений ({{ $imageCount }})</h3>
                                        </div>

                                        <!-- Main Featured Image -->
                                        <div class="featured-image">
                                            <div class="image-container main-image"
                                                 style="background-image: url('{{ $images[0] }}');"
                                                 onclick="openImageModal(0)">
                                                <div class="image-overlay">
                                                    <i class="fas fa-search-plus"></i>
                                                    <span>1 из {{ $imageCount }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Thumbnail Gallery -->
                                        @if($imageCount > 1)
                                            <div class="thumbnail-gallery">
                                                @foreach($images as $index => $imageUrl)
                                                    <div class="thumbnail {{ $index === 0 ? 'active' : '' }}"
                                                         onclick="setMainImage({{ $index }}), openImageModal({{ $index }})"
                                                         data-index="{{ $index }}">
                                                        <div class="thumbnail-image"
                                                             style="background-image: url('{{ $imageUrl }}');">
                                                            <div class="thumbnail-number">{{ $index + 1 }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif

                        <!-- Article Content -->
                        <div class="article-content">
                            @if($news->content)
                                {{-- <div class="article-text">
                                    {!! nl2br(e($news->content)) !!}
                                </div> --}}
                       <div class="article-text" style="text-indent: 2em;">
                            {!! nl2br(e($news->content)) !!}
                        </div>


                            @else
                                <p class="no-content">Содержание статьи недоступно.</p>
                            @endif
                        </div>

                        <!-- External Link -->
                        @if($news->link)
                            <div class="external-link">
                                <h5>Источник</h5>
                                <a href="{{ $news->link }}" target="_blank" rel="noopener noreferrer">
                                    <i class="fas fa-external-link-alt"></i>
                                    Перейти к первоисточнику
                                </a>
                            </div>
                        @endif

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
                                            <div class="related-image" style="background-image: url('{{ $related->getPrimaryImage() }}');"></div>
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
                                            @if($related->hasMultipleImages())
                                                <small class="related-images">
                                                    <i class="far fa-images"></i>
                                                    {{ count($related->getImageArray()) }} фото
                                                </small>
                                            @endif
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
                                @if($news->hasMultipleImages())
                                    <button onclick="downloadAllImages()" class="btn btn-sm">
                                        <i class="fas fa-download"></i>
                                        Скачать все фото
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    @if($news->image)
        <div id="imageModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeImageModal()">&times;</span>

                @if(count($news->getImageArray()) > 1)
                    <div class="modal-nav prev" onclick="changeModalImage(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div class="modal-nav next" onclick="changeModalImage(1)">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                @endif

                <img id="modalImage" class="modal-image" src="" alt="">

                <div class="modal-info">
                    <div class="modal-counter">
                        <span id="imageCounter">1</span> из {{ count($news->getImageArray()) }}
                    </div>
                    <div class="modal-actions">
                        <button onclick="downloadCurrentImage()" class="modal-btn">
                            <i class="fas fa-download"></i>
                        </button>
                        <button onclick="shareCurrentImage()" class="modal-btn">
                            <i class="fas fa-share"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

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

        /* Enhanced Image Gallery Styles */
        .article-images {
            margin-bottom: 40px;
        }

        .single-image .image-container {
            height: 400px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            cursor: pointer;
            overflow: hidden;
        }

        .images-gallery {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        .gallery-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .gallery-header h3 {
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .featured-image {
            margin-bottom: 20px;
        }

        .main-image {
            height: 450px;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            gap: 10px;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .image-overlay i {
            font-size: 2rem;
        }

        .image-overlay span {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .thumbnail-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 15px;
            max-height: 300px;
            overflow-y: auto;
        }

        .thumbnail {
            cursor: pointer;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 3px solid transparent;
        }

        .thumbnail.active {
            border-color: #1e45be;
            transform: scale(1.05);
        }

        .thumbnail:hover {
            transform: scale(1.08);
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
        }

        .thumbnail-image {
            height: 100px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .thumbnail-number {
            position: absolute;
            top: 5px;
            left: 5px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
            font-weight: bold;
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

        .external-link a {
            color: #1e45be;
            text-decoration: none;
            font-weight: 500;
        }

        .external-link a:hover {
            text-decoration: underline;
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

        .related-date,
        .related-images {
            color: #6c757d;
            font-size: 0.8rem;
            display: block;
            margin-bottom: 3px;
        }

        .related-date i,
        .related-images i {
            margin-right: 3px;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }

        .modal-content {
            position: relative;
            margin: auto;
            padding: 0;
            width: 90%;
            max-width: 1200px;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-image {
            max-width: 90%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 5px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            z-index: 10001;
        }

        .close:hover {
            color: #bbb;
        }

        .modal-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 20px 15px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
            z-index: 10001;
        }

        .modal-nav:hover {
            background: rgba(0,0,0,0.8);
        }

        .modal-nav.prev {
            left: 20px;
        }

        .modal-nav.next {
            right: 20px;
        }

        .modal-info {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 20px;
            background: rgba(0,0,0,0.7);
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
        }

        .modal-counter {
            font-size: 1rem;
            font-weight: 500;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
        }

        .modal-btn {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .modal-btn:hover {
            background: rgba(255,255,255,0.1);
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

            .main-image {
                height: 300px;
            }

            .thumbnail-gallery {
                grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
            }

            .thumbnail-image {
                height: 80px;
            }

            .modal-nav {
                padding: 15px 10px;
                font-size: 16px;
            }

            .modal-nav.prev {
                left: 10px;
            }

            .modal-nav.next {
                right: 10px;
            }

            .modal-info {
                flex-direction: column;
                gap: 10px;
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

            .thumbnail-gallery {
                display: none;
            }
        }
    </style>

    <script>
        // Image gallery functionality
        @if($news->image)
            const images = {!! json_encode($news->getImageArray()) !!};
            let currentImageIndex = 0;

            function setMainImage(index) {
                const mainImage = document.querySelector('.main-image');
                const thumbnails = document.querySelectorAll('.thumbnail');

                if (mainImage) {
                    mainImage.style.backgroundImage = `url('${images[index]}')`;
                    mainImage.querySelector('.image-overlay span').textContent = `${index + 1} из ${images.length}`;
                }

                thumbnails.forEach((thumb, i) => {
                    thumb.classList.toggle('active', i === index);
                });

                currentImageIndex = index;
            }

            function openImageModal(index) {
                const modal = document.getElementById('imageModal');
                const modalImage = document.getElementById('modalImage');
                const counter = document.getElementById('imageCounter');

                currentImageIndex = index;
                modal.style.display = 'block';
                modalImage.src = images[currentImageIndex];
                counter.textContent = currentImageIndex + 1;

                document.body.style.overflow = 'hidden';
            }

            function closeImageModal() {
                document.getElementById('imageModal').style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            function changeModalImage(direction) {
                currentImageIndex += direction;

                if (currentImageIndex >= images.length) {
                    currentImageIndex = 0;
                } else if (currentImageIndex < 0) {
                    currentImageIndex = images.length - 1;
                }

                const modalImage = document.getElementById('modalImage');
                const counter = document.getElementById('imageCounter');

                modalImage.src = images[currentImageIndex];
                counter.textContent = currentImageIndex + 1;

                // Update main gallery if visible
                setMainImage(currentImageIndex);
            }

            function downloadCurrentImage() {
                const link = document.createElement('a');
                link.href = images[currentImageIndex];
                link.download = `image-${currentImageIndex + 1}.jpg`;
                link.click();
            }

            function shareCurrentImage() {
                if (navigator.share) {
                    navigator.share({
                        title: '{{ $news->title }}',
                        text: `Изображение ${currentImageIndex + 1} из новости`,
                        url: images[currentImageIndex]
                    });
                } else {
                    copyToClipboard(images[currentImageIndex]);
                }
            }

            function downloadAllImages() {
                images.forEach((imageUrl, index) => {
                    const link = document.createElement('a');
                    link.href = imageUrl;
                    link.download = `image-${index + 1}.jpg`;
                    setTimeout(() => link.click(), index * 500);
                });
            }

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                const modal = document.getElementById('imageModal');
                if (modal.style.display === 'block') {
                    switch(e.key) {
                        case 'Escape':
                            closeImageModal();
                            break;
                        case 'ArrowLeft':
                            changeModalImage(-1);
                            break;
                        case 'ArrowRight':
                            changeModalImage(1);
                            break;
                    }
                }
            });

            // Close modal when clicking outside
            document.getElementById('imageModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeImageModal();
                }
            });
        @endif

        function copyToClipboard(text = null) {
            const textToCopy = text || window.location.href;
            navigator.clipboard.writeText(textToCopy).then(function() {
                showNotification(text ? 'Ссылка на изображение скопирована!' : 'Ссылка скопирована в буфер обмена!');
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
                z-index: 99999;
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                animation: slideIn 0.3s ease;
            `;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.3s ease';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        // Add CSS animations
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;
        document.head.appendChild(style);

        document.addEventListener('DOMContentLoaded', function() {
            // Handle broken images
            const images = document.querySelectorAll('.image-container, .related-image, .thumbnail-image');
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

            // Initialize lazy loading for images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            const src = img.dataset.src;
                            if (src) {
                                img.style.backgroundImage = `url('${src}')`;
                                img.removeAttribute('data-src');
                                observer.unobserve(img);
                            }
                        }
                    });
                });

                document.querySelectorAll('[data-src]').forEach(function(img) {
                    imageObserver.observe(img);
                });
            }
        });

        // Swipe gestures for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.addEventListener('touchstart', function(e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', function(e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const modal = document.getElementById('imageModal');
            if (modal && modal.style.display === 'block') {
                const swipeThreshold = 50;
                const diff = touchStartX - touchEndX;

                if (Math.abs(diff) > swipeThreshold) {
                    if (diff > 0) {
                        // Swipe left - next image
                        changeModalImage(1);
                    } else {
                        // Swipe right - previous image
                        changeModalImage(-1);
                    }
                }
            }
        }

        // Preload images for better performance
        @if($news->image)
            images.forEach(function(imageUrl) {
                const img = new Image();
                img.src = imageUrl;
            });
        @endif
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
