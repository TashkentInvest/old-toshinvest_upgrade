<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($news) ? 'Редактировать' : 'Создать' }} новость</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ isset($news) ? 'Редактировать новость' : 'Создать новость' }}</h1>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Назад к списку</a>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}">
                @csrf
                @if(isset($news))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="title">Заголовок новости *</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required>
                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Содержание новости</label>
                    <textarea id="content" name="content" placeholder="Введите текст новости...">{{ old('content', $news->content ?? '') }}</textarea>
                    <small>Вы можете оставить это поле пустым, если хотите опубликовать только заголовок и ссылку</small>
                    @error('content')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">URL изображения</label>
                    <input type="url" id="image" name="image" value="{{ old('image', $news->image ?? '') }}"
                           placeholder="https://example.com/image.jpg">
                    <small>Введите полный URL изображения (начинающийся с http:// или https://)</small>
                    <div id="imagePreview" class="image-preview"></div>
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="link">Внешняя ссылка на источник</label>
                    <input type="url" id="link" name="link" value="{{ old('link', $news->link ?? '') }}"
                           placeholder="https://example.com/article">
                    <small>Ссылка на первоисточник новости (если есть)</small>
                    @error('link')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="published_at">Дата и время публикации</label>
                    <input type="datetime-local" id="published_at" name="published_at"
                           value="{{ old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                    <small>Оставьте пустым для автоматической установки текущего времени</small>
                    @error('published_at')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        {{ isset($news) ? 'Обновить новость' : 'Создать новость' }}
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Отмена</a>
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

        // Load existing image preview
        window.addEventListener('load', function() {
            const imageInput = document.getElementById('image');
            if (imageInput.value) {
                imageInput.dispatchEvent(new Event('input'));
            }
        });
    </script>
</body>
</html>
