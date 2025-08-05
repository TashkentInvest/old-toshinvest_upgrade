<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать новость</title>
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

        .form-container {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            background: white;
        }

        .form-group textarea {
            min-height: 200px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .form-group small {
            color: #666;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .image-preview {
            margin-top: 10px;
            max-width: 200px;
            height: 120px;
            background-size: cover;
            background-position: center;
            border-radius: 4px;
            border: 1px solid #ddd;
            display: none;
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .info-box {
            background: #e7f3ff;
            border: 1px solid #b8d4f0;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .info-box h3 {
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .info-box p {
            margin-bottom: 5px;
            color: #555;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Редактировать новость</h1>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>

        <div class="form-container">
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Current News Info -->
            <div class="info-box">
                <h3>Текущая информация о новости</h3>
                <p><strong>ID:</strong> {{ $news->id }}</p>
                <p><strong>Создана:</strong> {{ $news->created_at->format('d.m.Y H:i') }}</p>
                <p><strong>Последнее обновление:</strong> {{ $news->updated_at->format('d.m.Y H:i') }}</p>
                <p><strong>Статус:</strong>
                    @if($news->published_at && $news->published_at <= now())
                        <span style="color: #27ae60; font-weight: 500;">Опубликована</span>
                    @else
                        <span style="color: #f39c12; font-weight: 500;">Черновик</span>
                    @endif
                </p>
            </div>

            <form method="POST" action="{{ route('admin.news.update', $news) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Заголовок новости *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}" required>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Содержание новости</label>
                    <textarea id="content" name="content" placeholder="Введите текст новости...">{{ old('content', $news->content) }}</textarea>
                    <small>Вы можете оставить это поле пустым, если хотите опубликовать только заголовок и ссылку</small>
                    @error('content')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">URL изображения</label>
                    <input type="url" id="image" name="image" value="{{ old('image', $news->image) }}"
                           placeholder="https://example.com/image.jpg">
                    <small>Введите полный URL изображения (начинающийся с http:// или https://)</small>
                    <div id="imagePreview" class="image-preview"></div>
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="link">Внешняя ссылка на источник</label>
                    <input type="url" id="link" name="link" value="{{ old('link', $news->link) }}"
                           placeholder="https://example.com/article">
                    <small>Ссылка на первоисточник новости (если есть)</small>
                    @error('link')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Дата и время публикации</label>
                    <input type="datetime-local" id="published_at" name="published_at"
                           value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : '') }}">
                    <small>Установите дату и время когда новость должна быть опубликована</small>
                    @error('published_at')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Обновить новость
                    </button>
                    <a href="{{ route('admin.news.show', $news) }}" class="btn btn-secondary">Просмотр</a>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Отмена</a>

                    <!-- Delete Button -->
                    <form method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: inline;"
                          onsubmit="return confirm('Вы уверены, что хотите удалить эту новость? Это действие нельзя отменить!')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить новость</button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Image preview functionality
        document.getElementById('image').addEventListener('input', function() {
            const imageUrl = this.value;
            const preview = document.getElementById('imagePreview');

            if (imageUrl) {
                const img = new Image();
                img.onload = function() {
                    preview.style.backgroundImage = `url('${imageUrl}')`;
                    preview.style.display = 'block';
                };
                img.onerror = function() {
                    preview.style.display = 'none';
                };
                img.src = imageUrl;
            } else {
                preview.style.display = 'none';
            }
        });

        // Load existing image preview on page load
        window.addEventListener('load', function() {
            const imageInput = document.getElementById('image');
            if (imageInput.value) {
                imageInput.dispatchEvent(new Event('input'));
            }
        });

        // Auto-save functionality (optional)
        let autoSaveTimeout;
        const inputs = document.querySelectorAll('input, textarea');

        inputs.forEach(input => {
            input.addEventListener('input', function() {
                // Clear existing timeout
                clearTimeout(autoSaveTimeout);

                // Set new timeout for auto-save indication
                autoSaveTimeout = setTimeout(() => {
                    // You can add auto-save functionality here if needed
                    console.log('Changes detected - consider saving');
                }, 2000);
            });
        });

        // Warn user about unsaved changes
        let formChanged = false;
        const form = document.querySelector('form');

        inputs.forEach(input => {
            input.addEventListener('change', function() {
                formChanged = true;
            });
        });

        window.addEventListener('beforeunload', function(e) {
            if (formChanged) {
                e.preventDefault();
                e.returnValue = 'У вас есть несохраненные изменения. Вы уверены, что хотите покинуть страницу?';
            }
        });

        // Reset form changed flag on submit
        form.addEventListener('submit', function() {
            formChanged = false;
        });
    </script>
</body>
</html>

<?php
// Show Blade Template: resources/views/admin/news/show.blade.php
?>

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

        .news-image {
            width: 100%;
            max-width: 600px;
            height: 300px;
            background-size: cover;
            background-position: center;
            border-radius: 8px;
            margin: 20px 0;
            border: 1px solid #ddd;
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
            </div>

            <!-- News Title -->
            <h1 class="news-title">{{ $news->title }}</h1>

            <!-- News Image -->
            @if($news->image)
                <div class="news-image" style="background-image: url('{{ $news->getImagePath() }}');"></div>
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
                <a href="{{ route('media.detail', $news->id) }}" target="_blank" class="btn btn-primary">Посмотреть на сайте</a>

                <form method="POST" action="{{ route('admin.news.destroy', $news) }}" style="display: inline;"
                      onsubmit="return confirm('Вы уверены, что хотите удалить эту новость? Это действие нельзя отменить!')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
