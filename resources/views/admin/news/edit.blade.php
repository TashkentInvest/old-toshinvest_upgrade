@extends('layouts.admin')

@section('title', isset($news) ? 'Yangilikni tahrirlash' : 'Yangilik yaratish')

@section('content')
<style>
    .form-card {
        background: white;
        border-radius: var(--gov-radius);
        box-shadow: var(--gov-shadow);
        overflow: hidden;
        margin-bottom: 24px;
    }
    .form-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid var(--gov-border);
        background: var(--gov-bg-light);
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .form-card-header i {
        color: var(--gov-primary);
        font-size: 1.25rem;
    }
    .form-card-header h3 {
        margin: 0;
        font-size: 1.1rem;
        color: var(--gov-primary-darker);
    }
    .form-card-body {
        padding: 24px;
    }
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        background: var(--gov-bg-light);
        border-top: 1px solid var(--gov-border);
    }
    .image-options {
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        padding: 20px;
    }
    .image-option {
        margin-bottom: 24px;
    }
    .image-option:last-child {
        margin-bottom: 0;
    }
    .image-option h4 {
        margin-bottom: 12px;
        color: var(--gov-primary-darker);
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .file-upload-area {
        border: 2px dashed var(--gov-border);
        border-radius: var(--gov-radius);
        padding: 30px;
        text-align: center;
        background: white;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .file-upload-area:hover {
        border-color: var(--gov-primary);
        background: rgba(30, 64, 175, 0.02);
    }
    .file-upload-area.dragover {
        border-color: var(--gov-primary);
        background: rgba(30, 64, 175, 0.05);
    }
    .file-upload-area p {
        color: var(--gov-text-muted);
        margin-bottom: 16px;
    }
    .file-upload-area .upload-icon {
        font-size: 2.5rem;
        color: var(--gov-primary);
        margin-bottom: 16px;
    }
    .upload-button {
        background: var(--gov-primary);
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: var(--gov-radius);
        cursor: pointer;
        font-size: 0.9rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s ease;
    }
    .upload-button:hover {
        background: var(--gov-primary-dark);
    }
    .file-input {
        display: none;
    }
    .image-preview-container {
        margin-top: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .image-preview {
        position: relative;
        border-radius: var(--gov-radius);
        overflow: hidden;
        box-shadow: var(--gov-shadow);
    }
    .image-preview img {
        width: 150px;
        height: 100px;
        object-fit: cover;
        display: block;
    }
    .image-preview .remove-btn {
        position: absolute;
        top: 6px;
        right: 6px;
        background: var(--gov-error);
        color: white;
        border: none;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        cursor: pointer;
        font-size: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }
    .image-preview .remove-btn:hover {
        background: #c0392b;
        transform: scale(1.1);
    }
    .divider {
        margin: 24px 0;
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
        background: var(--gov-border);
    }
    .divider span {
        background: var(--gov-bg-light);
        padding: 0 20px;
        color: var(--gov-text-muted);
        font-size: 0.9rem;
        position: relative;
    }
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: white;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-border);
    }
    .checkbox-wrapper input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
    }
    .existing-images-title {
        margin: 16px 0 12px 0;
        font-weight: 600;
        color: var(--gov-text);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .file-hint {
        color: var(--gov-text-muted);
        font-size: 0.85rem;
        margin-top: 10px;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-{{ isset($news) ? 'edit' : 'plus-circle' }}"></i> {{ isset($news) ? 'Yangilikni tahrirlash' : 'Yangilik yaratish' }}</h1>
        <p>{{ isset($news) ? 'Yangilik ma\'lumotlarini o\'zgartiring' : 'Yangi yangilik qo\'shing' }}</p>
    </div>
    <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<form method="POST" action="{{ isset($news) ? route('admin.news.update', $news) : route('admin.news.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($news))
        @method('PUT')
    @endif

    <!-- Basic Information -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-file-alt"></i>
            <h3>Asosiy ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Sarlavha <span class="required">*</span></label>
                <input type="text" id="title" name="title" class="gov-form-control" value="{{ old('title', $news->title ?? '') }}" required placeholder="Yangilik sarlavhasini kiriting">
                @error('title')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Matn</label>
                <textarea id="content" name="content" class="gov-form-control" rows="8" placeholder="Yangilik matnini kiriting...">{{ old('content', $news->content ?? '') }}</textarea>
                <div class="file-hint">
                    <i class="fas fa-info-circle"></i>
                    Faqat sarlavha va havola bilan yangilik chiqarish uchun bu maydonni bo'sh qoldirishingiz mumkin
                </div>
                @error('content')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Images -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-images"></i>
            <h3>Rasmlar</h3>
        </div>
        <div class="form-card-body">
            <div class="image-options">
                <!-- File Upload -->
                <div class="image-option">
                    <h4><i class="fas fa-upload"></i> Rasmlarni yuklash</h4>
                    <div class="file-upload-area" id="fileUploadArea">
                        <div class="upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <p>Rasmlarni bu yerga tashlang yoki</p>
                        <button type="button" class="upload-button" onclick="document.getElementById('imageFiles').click()">
                            <i class="fas fa-folder-open"></i> Fayllarni tanlang
                        </button>
                        <input type="file" id="imageFiles" name="image_files[]" class="file-input" multiple accept="image/*">
                        <div class="file-hint" style="margin-top: 16px;">
                            <i class="fas fa-info-circle"></i>
                            Qo'llab-quvvatlanadigan formatlar: JPEG, PNG, JPG, GIF, WebP. Maksimal hajm: 5MB
                        </div>
                    </div>

                    <!-- Preview for new uploads -->
                    <div id="uploadPreviewContainer" class="image-preview-container"></div>

                    @if(isset($news) && $news->image)
                        <div class="checkbox-wrapper" style="margin-top: 16px;">
                            <input type="checkbox" name="keep_existing_images" id="keep_existing_images" value="1" checked>
                            <label for="keep_existing_images">
                                <i class="fas fa-check-circle" style="color: var(--gov-success);"></i>
                                Mavjud rasmlarni saqlash
                            </label>
                        </div>

                        <div class="existing-images-title">
                            <i class="fas fa-images"></i> Joriy rasmlar:
                        </div>
                        <div class="image-preview-container">
                            @foreach($news->getImageArray() as $index => $imageUrl)
                                <div class="image-preview" data-image="{{ $imageUrl }}">
                                    <img src="{{ $imageUrl }}" alt="Rasm {{ $index + 1 }}">
                                    <button type="button" class="remove-btn" onclick="removeExistingImage('{{ $imageUrl }}', this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="divider">
                    <span>YOKI</span>
                </div>

                <!-- URL Option -->
                <div class="image-option">
                    <h4><i class="fas fa-link"></i> Rasm URL manzili</h4>
                    <input type="url" id="image" name="image" class="gov-form-control"
                           value="{{ old('image', isset($news) && !$news->isUploadedImage() ? $news->image : '') }}"
                           placeholder="https://example.com/image.jpg">
                    <div class="file-hint">
                        <i class="fas fa-info-circle"></i>
                        http:// yoki https:// bilan boshlanadigan to'liq URL manzilini kiriting
                    </div>
                    <div id="urlImagePreview" class="image-preview-container"></div>
                </div>
            </div>

            @error('image')
                <div class="gov-form-error" style="margin-top: 12px;">{{ $message }}</div>
            @enderror
            @error('image_files')
                <div class="gov-form-error" style="margin-top: 12px;">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Additional Info -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-link"></i>
            <h3>Qo'shimcha ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Tashqi havola (manba)</label>
                <input type="url" id="link" name="link" class="gov-form-control"
                       value="{{ old('link', $news->link ?? '') }}"
                       placeholder="https://example.com/article">
                <div class="file-hint">
                    <i class="fas fa-info-circle"></i>
                    Yangilik asl manbasi havolasi (agar mavjud bo'lsa)
                </div>
                @error('link')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Nashr sanasi va vaqti</label>
                <input type="datetime-local" id="published_at" name="published_at" class="gov-form-control"
                       value="{{ old('published_at', isset($news) && $news->published_at ? $news->published_at->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}">
                <div class="file-hint">
                    <i class="fas fa-info-circle"></i>
                    Joriy vaqtni avtomatik o'rnatish uchun bo'sh qoldiring
                </div>
                @error('published_at')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-times"></i> Bekor qilish
            </a>
            <button type="submit" class="gov-btn gov-btn-primary">
                <i class="fas fa-save"></i> {{ isset($news) ? 'Yangilash' : 'Saqlash' }}
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    // File handling
    const fileInput = document.getElementById('imageFiles');
    const uploadArea = document.getElementById('fileUploadArea');
    const previewContainer = document.getElementById('uploadPreviewContainer');
    const urlInput = document.getElementById('image');
    const urlPreview = document.getElementById('urlImagePreview');

    let selectedFiles = [];

    // Drag and drop
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
                    <img src="${e.target.result}" alt="Ko'rib chiqish ${index + 1}">
                    <button type="button" class="remove-btn" onclick="removeFile(${index})"><i class="fas fa-times"></i></button>
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
                        <img src="${imageUrl}" alt="URL Ko'rib chiqish">
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
        if (confirm('Bu rasmni o\'chirmoqchimisiz?')) {
            const imagePreview = button.closest('.image-preview');
            imagePreview.remove();

            @if(isset($news))
            fetch('{{ route("news.removeImage", $news) }}', {
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
                    alert('Rasmni o\'chirishda xatolik');
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Rasmni o\'chirishda xatolik');
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
            alert('Iltimos, sarlavhani kiriting');
            document.getElementById('title').focus();
            return false;
        }
    });
</script>
@endsection
