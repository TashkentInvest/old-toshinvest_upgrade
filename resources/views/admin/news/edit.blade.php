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

        .btn-danger {
            background: #e74c3c;
            color: white;
            padding: 6px 12px;
            font-size: 12px;
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

        .image-options {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 20px;
            background: #f9f9f9;
        }

        .image-option {
            margin-bottom: 20px;
        }

        .image-option:last-child {
            margin-bottom: 0;
        }

        .image-option h4 {
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .file-upload-area {
            border: 2px dashed #ddd;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            background: white;
            transition: all 0.3s ease;
        }

        .file-upload-area:hover {
            border-color: #3498db;
            background: #f8f9ff;
        }

        .file-upload-area.dragover {
            border-color: #3498db;
            background: #e7f3ff;
        }

        .file-input {
            display: none;
        }

        .upload-button {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .upload-button:hover {
            background: #2980b9;
        }

        .image-preview-container {
            margin-top: 15px;
        }

        .image-preview {
            display: inline-block;
            position: relative;
            margin: 5px;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .image-preview img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            display: block;
        }

        .image-preview .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: rgba(231, 76, 60, 0.8);
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            cursor: pointer;
            font-size: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-preview .remove-btn:hover {
            background: rgba(192, 57, 43, 0.9);
        }

        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .divider {
            margin: 20px 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: #f9f9f9;
            padding: 0 15px;
            color: #666;
            font-size: 14px;
        }

        .checkbox-group {
            margin: 15px 0;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            cursor: pointer;
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

            .image-preview img {
                width: 120px;
                height: 80px;
            }
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
            <form method="POST" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" enctype="multipart/form-data">
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
                    <label>Изображения новости</label>

                    <div class="image-options">
                        <!-- File Upload Option -->
                        <div class="image-option">
                            <h4>Загрузить изображения</h4>
                            <div class="file-upload-area" id="fileUploadArea">
                                <p>Перетащите изображения сюда или</p>
                                <button type="button" class="upload-button" onclick="document.getElementById('imageFiles').click()">
                                    Выберите файлы
                                </button>
                                <input type="file" id="imageFiles" name="image_files[]" class="file-input" multiple accept="image/*">
                                <small style="display: block; margin-top: 10px; color: #666;">
                                    Поддерживаемые форматы: JPEG, PNG, JPG, GIF, WebP. Максимум 5MB на файл.
                                </small>
                            </div>

                            <!-- Preview container for uploaded files -->
                            <div id="uploadPreviewContainer" class="image-preview-container"></div>

                            @if(isset($news) && $news->image)
                                <div class="checkbox-group">
                                    <label>
                                        <input type="checkbox" name="keep_existing_images" value="1" checked>
                                        Сохранить существующие изображения
                                    </label>
                                </div>

                                <!-- Show existing images -->
                                <div class="image-preview-container">
                                    <h5 style="margin-bottom: 10px;">Текущие изображения:</h5>
                                    @foreach($news->getImageArray() as $index => $imageUrl)
                                        <div class="image-preview" data-image="{{ $imageUrl }}">
                                            <img src="{{ $imageUrl }}" alt="Image {{ $index + 1 }}">
                                            <button type="button" class="remove-btn" onclick="removeExistingImage('{{ $imageUrl }}', this)">×</button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="divider">
                            <span>ИЛИ</span>
                        </div>

                        <!-- URL Option -->
                        <div class="image-option">
                            <h4>URL изображения</h4>
                            <input type="url" id="image" name="image" value="{{ old('image', isset($news) && !$news->isUploadedImage() ? $news->image : '') }}"
                                   placeholder="https://example.com/image.jpg">
                            <small>Введите полный URL изображения (начинающийся с http:// или https://)</small>
                            <div id="urlImagePreview" class="image-preview-container"></div>
                        </div>
                    </div>

                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    @error('image_files')
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
        // File handling
        const fileInput = document.getElementById('imageFiles');
        const uploadArea = document.getElementById('fileUploadArea');
        const previewContainer = document.getElementById('uploadPreviewContainer');
        const urlInput = document.getElementById('image');
        const urlPreview = document.getElementById('urlImagePreview');

        let selectedFiles = [];

        // Drag and drop functionality
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
            handleFiles(files);
        });

        // File input change
        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });

        function handleFiles(files) {
            selectedFiles = [...selectedFiles, ...files];
            updatePreview();
            updateFileInput();
        }

        function updateFileInput() {
            const dt = new DataTransfer();
            selectedFiles.forEach(file => dt.items.add(file));
            fileInput.files = dt.files;
        }

        function updatePreview() {
            previewContainer.innerHTML = '';

            selectedFiles.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'image-preview';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Preview ${index + 1}">
                        <button type="button" class="remove-btn" onclick="removeFile(${index})">×</button>
                    `;
                    previewContainer.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            });
        }

        function removeFile(index) {
            selectedFiles.splice(index, 1);
            updatePreview();
            updateFileInput();
        }

        // URL image preview
        urlInput.addEventListener('input', function() {
            const imageUrl = this.value;

            if (imageUrl) {
                const img = new Image();
                img.onload = function() {
                    urlPreview.innerHTML = `
                        <div class="image-preview">
                            <img src="${imageUrl}" alt="URL Preview">
                        </div>
                    `;
                };
                img.onerror = function() {
                    urlPreview.innerHTML = '';
                };
                img.src = imageUrl;
            } else {
                urlPreview.innerHTML = '';
            }
        });

        // Remove existing image
        function removeExistingImage(imageUrl, button) {
            if (confirm('Удалить это изображение?')) {
                const imagePreview = button.closest('.image-preview');
                imagePreview.remove();

                // If this is an edit form, make AJAX call to remove image
                @if(isset($news))
                fetch('{{ route("admin.news.removeImage", $news) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        image_url: imageUrl
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert('Ошибка при удалении изображения');
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ошибка при удалении изображения');
                    location.reload();
                });
                @endif
            }
        }

        // Load existing URL image preview
        window.addEventListener('load', function() {
            if (urlInput.value) {
                urlInput.dispatchEvent(new Event('input'));
            }
        });

        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();

            if (!title) {
                e.preventDefault();
                alert('Пожалуйста, введите заголовок новости');
                document.getElementById('title').focus();
                return false;
            }
        });
    </script>
</body>
</html>
