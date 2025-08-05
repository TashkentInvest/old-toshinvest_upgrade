<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр новости</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .content {
            padding: 30px;
        }

        .news-meta {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .news-meta h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .meta-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .meta-item:last-child {
            border-bottom: none;
        }

        .meta-label {
            font-weight: 500;
            color: #666;
        }

        .meta-value {
            color: #333;
        }

        .news-title {
            font-size: 2rem;
            color: #2c3e50;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .news-images {
            margin: 20px 0;
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .news-image {
            width: 100%;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .news-image:hover {
            transform: scale(1.02);
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        .image-overlay {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .news-image::before {
            content: '🔍 Увеличить';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            color: white;
            padding: 20px 15px 10px;
            text-align: center;
            font-size: 14px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-image:hover::before {
            opacity: 1;
        }

        .single-image {
            max-width: 600px;
            margin: 0 auto;
        }

        .news-content {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #333;
            margin: 20px 0;
        }

        .news-content p {
            margin-bottom: 15px;
        }

        .external-link {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .external-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: 500;
        }

        .external-link a:hover {
            text-decoration: underline;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-warning {
            background: #f39c12;
            color: white;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .actions {
            padding-top: 20px;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-published {
            background: #d4edda;
            color: #155724;
        }

        .status-draft {
            background: #fff3cd;
            color: #856404;
        }

        /* Modal for image viewing */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 90%;
            max-width: 800px;
            max-height: 90%;
            object-fit: contain;
        }

        .modal-content {
            animation: zoom 0.3s;
        }

        @keyframes zoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
        }

        .image-counter {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            background: rgba(0,0,0,0.7);
            padding: 10px 20px;
            border-radius: 20px;
        }

        .nav-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            background: rgba(0,0,0,0.5);
            padding: 10px 15px;
            border-radius: 5px;
            user-select: none;
            transition: 0.3s;
        }

        .nav-arrow:hover {
            background: rgba(0,0,0,0.8);
        }

        .prev {
            left: 20px;
        }

        .next {
            right: 20px;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .news-title {
                font-size: 1.5rem;
            }

            .actions {
                text-align: center;
            }

            .btn {
                display: block;
                margin: 5px 0;
                text-align: center;
            }

            .image-gallery {
                grid-template-columns: 1fr;
            }

            .modal-content {
                width: 95%;
            }

            .nav-arrow {
                font-size: 24px;
                padding: 8px 12px;
            }

            .prev {
                left: 10px;
            }

            .next {
                right: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Просмотр новости</h1>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>

        <div class="content">
            <!-- News Meta Information -->
            <div class="news-meta">
                <h3>Информация о новости</h3>
                <div class="meta-item">
                    <span class="meta-label">ID:</span>
                    <span class="meta-value">{{ $news->id }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Статус:</span>
                    <span class="meta-value">
                        @if($news->published_at && $news->published_at <= now())
                            <span class="status-badge status-published">Опубликована</span>
                        @else
                            <span class="status-badge status-draft">Черновик</span>
                        @endif
                    </span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Дата публикации:</span>
                    <span class="meta-value">
                        {{ $news->published_at ? $news->published_at->format('d.m.Y H:i') : 'Не указана' }}
                    </span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Создана:</span>
                    <span class="meta-value">{{ $news->created_at->format('d.m.Y H:i') }}</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Обновлена:</span>
                    <span class="meta-value">{{ $news->updated_at->format('d.m.Y H:i') }}</span>
                </div>
                @if($news->hasMultipleImages())
                <div class="meta-item">
                    <span class="meta-label">Количество изображений:</span>
                    <span class="meta-value">{{ count($news->getImageArray()) }}</span>
                </div>
                @endif
            </div>

            <!-- News Title -->
            <h1 class="news-title">{{ $news->title }}</h1>

            <!-- News Images -->
            @if($news->image)
                <div class="news-images">
                    @php
                        $images = $news->getImageArray();
                        $imageCount = count($images);
                    @endphp

                    <h3 style="margin-bottom: 15px; color: #2c3e50;">
                        Изображения ({{ $imageCount }})
                    </h3>

                    @if($imageCount === 1)
                        <div class="single-image">
                            <div class="news-image"
                                 style="background-image: url('{{ $images[0] }}');"
                                 onclick="openModal(0)"
                                 title="Нажмите для увеличения">
                            </div>
                        </div>
                    @else
                        <div class="image-gallery">
                            @foreach($images as $index => $imageUrl)
                                <div class="news-image"
                                     style="background-image: url('{{ $imageUrl }}');"
                                     onclick="openModal({{ $index }})"
                                     title="Изображение {{ $index + 1 }} - Нажмите для увеличения">
                                    <div class="image-overlay">
                                        <span class="image-number">{{ $index + 1 }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <!-- News Content -->
            @if($news->content)
                <div class="news-content">
                    {!! nl2br(e($news->content)) !!}
                </div>
            @else
                <p style="color: #999; font-style: italic;">Содержание новости не указано.</p>
            @endif

            <!-- External Link -->
            @if($news->link)
                <div class="external-link">
                    <strong>Внешняя ссылка:</strong><br>
                    <a href="{{ $news->link }}" target="_blank">{{ $news->link }}</a>
                </div>
            @endif

            <!-- Actions -->
            <div class="actions">
                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-warning">Редактировать</a>
                <a href="{{ route('frontend.media.detail', $news->id) }}" target="_blank" class="btn btn-primary">Посмотреть на сайте</a>

                <form method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: inline;"
                      onsubmit="return confirm('Вы уверены, что хотите удалить эту новость? Это действие нельзя отменить!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Modal -->
    @if($news->image)
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        @if(count($news->getImageArray()) > 1)
            <span class="nav-arrow prev" onclick="changeImage(-1)">&#10094;</span>
            <span class="nav-arrow next" onclick="changeImage(1)">&#10095;</span>
        @endif
        <img class="modal-content" id="modalImage">
        @if(count($news->getImageArray()) > 1)
            <div class="image-counter">
                <span id="imageCounter">1 / {{ count($news->getImageArray()) }}</span>
            </div>
        @endif
    </div>
    @endif

    <script>
        @if($news->image)
        const images = {!! json_encode($news->getImageArray()) !!};
        let currentImageIndex = 0;

        function openModal(index) {
            currentImageIndex = index;
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const counter = document.getElementById('imageCounter');

            modal.style.display = 'block';
            modalImg.src = images[currentImageIndex];

            if (counter) {
                counter.textContent = `${currentImageIndex + 1} / ${images.length}`;
            }
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        function changeImage(direction) {
            currentImageIndex += direction;

            if (currentImageIndex >= images.length) {
                currentImageIndex = 0;
            } else if (currentImageIndex < 0) {
                currentImageIndex = images.length - 1;
            }

            const modalImg = document.getElementById('modalImage');
            const counter = document.getElementById('imageCounter');

            modalImg.src = images[currentImageIndex];
            if (counter) {
                counter.textContent = `${currentImageIndex + 1} / ${images.length}`;
            }
        }

        // Close modal when clicking outside the image
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('imageModal');
            if (modal.style.display === 'block') {
                switch(e.key) {
                    case 'Escape':
                        closeModal();
                        break;
                    case 'ArrowLeft':
                        if (images.length > 1) changeImage(-1);
                        break;
                    case 'ArrowRight':
                        if (images.length > 1) changeImage(1);
                        break;
                }
            }
        });
        @endif
    </script>
</body>
</html>
