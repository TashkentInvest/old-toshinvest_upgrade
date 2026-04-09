@extends('layouts.admin')

@section('title', 'Yangilik yaratish')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">Yangilik yaratish</h1>
            <p class="admin-page-subtitle">Yangi yangilik qo'shish formasi</p>
        </div>
        <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary">
            <i class="fas fa-arrow-left"></i> Ro'yxatga qaytish
        </a>
    </div>
</div>

<!-- Form Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-plus-circle"></i> Yangilik ma'lumotlari</h3>
    </div>
    <div class="admin-card-body">
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data" id="newsForm">
            @csrf

            <!-- Title -->
            <div class="gov-form-group">
                <label class="gov-label required">Sarlavha</label>
                <input type="text" name="title" class="gov-input" value="{{ old('title') }}" placeholder="Yangilik sarlavhasini kiriting..." required>
                @error('title')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Content -->
            <div class="gov-form-group">
                <label class="gov-label">Matn</label>
                <textarea name="content" class="gov-textarea" rows="8" placeholder="Yangilik matnini kiriting...">{{ old('content') }}</textarea>
                <div class="gov-hint">Agar faqat sarlavha va havola nashr qilmoqchi bo'lsangiz, bu maydonni bo'sh qoldirishingiz mumkin</div>
                @error('content')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Images Section -->
            <div class="gov-form-group">
                <label class="gov-label">Rasmlar</label>
                <div class="gov-card" style="background: var(--gov-bg-light); border: 2px dashed var(--gov-border-dark); padding: 24px;">
                    <!-- File Upload -->
                    <div style="margin-bottom: 20px;">
                        <h4 style="font-size: 15px; font-weight: 600; color: var(--gov-text-dark); margin-bottom: 12px;">
                            <i class="fas fa-upload" style="color: var(--gov-primary);"></i> Rasm yuklash
                        </h4>
                        <div id="fileUploadArea" style="border: 2px dashed var(--gov-border); border-radius: var(--gov-radius); padding: 30px; text-align: center; background: white; cursor: pointer; transition: var(--gov-transition);">
                            <i class="fas fa-cloud-upload-alt" style="font-size: 36px; color: var(--gov-primary); margin-bottom: 12px;"></i>
                            <p style="margin: 0 0 12px; color: var(--gov-text-body);">Rasmlarni shu yerga tashlang yoki</p>
                            <button type="button" class="gov-btn gov-btn-primary gov-btn-sm" onclick="document.getElementById('imageFiles').click()">
                                <i class="fas fa-folder-open"></i> Fayllarni tanlang
                            </button>
                            <input type="file" id="imageFiles" name="image_files[]" multiple accept="image/*" style="display: none;">
                            <p style="margin: 12px 0 0; font-size: 12px; color: var(--gov-text-muted);">JPEG, PNG, JPG, GIF, WebP - Maksimum 5MB</p>
                        </div>
                        <div id="uploadPreviewContainer" style="display: flex; flex-wrap: wrap; gap: 12px; margin-top: 16px;"></div>
                    </div>

                    <div style="text-align: center; padding: 12px 0; color: var(--gov-text-muted); font-size: 13px;">
                        <span style="background: var(--gov-bg-light); padding: 0 16px;">YOKI</span>
                    </div>

                    <!-- URL Input -->
                    <div>
                        <h4 style="font-size: 15px; font-weight: 600; color: var(--gov-text-dark); margin-bottom: 12px;">
                            <i class="fas fa-link" style="color: var(--gov-primary);"></i> Rasm URL manzili
                        </h4>
                        <input type="url" name="image" class="gov-input" value="{{ old('image') }}" placeholder="https://example.com/image.jpg">
                        <div id="urlImagePreview" style="margin-top: 12px;"></div>
                    </div>
                </div>
                @error('image')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
                @error('image_files')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- External Link -->
            <div class="gov-form-group">
                <label class="gov-label">Tashqi havola</label>
                <input type="url" name="link" class="gov-input" value="{{ old('link') }}" placeholder="https://example.com/article">
                <div class="gov-hint">Yangilik manbasi havolasi (agar mavjud bo'lsa)</div>
                @error('link')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Published At -->
            <div class="gov-form-group">
                <label class="gov-label">Nashr sanasi va vaqti</label>
                <input type="datetime-local" name="published_at" class="gov-input" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}" style="max-width: 300px;">
                <div class="gov-hint">Bo'sh qoldirilsa, avtomatik ravishda joriy vaqt belgilanadi</div>
                @error('published_at')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Form Actions -->
            <div class="gov-form-actions" style="display: flex; gap: 12px; margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--gov-border);">
                <button type="submit" class="gov-btn gov-btn-primary">
                    <i class="fas fa-save"></i> Saqlash
                </button>
                <a href="{{ route('admin.news.index') }}" class="gov-btn gov-btn-secondary">
                    <i class="fas fa-times"></i> Bekor qilish
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('imageFiles');
    const uploadArea = document.getElementById('fileUploadArea');
    const previewContainer = document.getElementById('uploadPreviewContainer');
    const urlInput = document.querySelector('input[name="image"]');
    const urlPreview = document.getElementById('urlImagePreview');

    let selectedFiles = [];

    // Drag and drop
    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--gov-primary)';
        uploadArea.style.background = 'rgba(45, 74, 111, 0.05)';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = 'var(--gov-border)';
        uploadArea.style.background = 'white';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = 'var(--gov-border)';
        uploadArea.style.background = 'white';
        const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
        handleFiles(files);
    });

    fileInput.addEventListener('change', (e) => {
        handleFiles(Array.from(e.target.files));
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
                const div = document.createElement('div');
                div.style.cssText = 'position: relative; border-radius: var(--gov-radius); overflow: hidden; box-shadow: var(--gov-shadow-sm);';
                div.innerHTML = `
                    <img src="${e.target.result}" style="width: 120px; height: 80px; object-fit: cover; display: block;">
                    <button type="button" onclick="removeFile(${index})" style="position: absolute; top: 4px; right: 4px; width: 24px; height: 24px; background: var(--gov-error); color: white; border: none; border-radius: 50%; cursor: pointer; font-size: 12px;">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    window.removeFile = function(index) {
        selectedFiles.splice(index, 1);
        updatePreview();
        updateFileInput();
    };

    // URL preview
    urlInput.addEventListener('input', function() {
        const url = this.value;
        if (url) {
            const img = new Image();
            img.onload = function() {
                urlPreview.innerHTML = `<img src="${url}" style="width: 120px; height: 80px; object-fit: cover; border-radius: var(--gov-radius); box-shadow: var(--gov-shadow-sm);">`;
            };
            img.onerror = function() {
                urlPreview.innerHTML = '<span style="color: var(--gov-error); font-size: 13px;"><i class="fas fa-exclamation-triangle"></i> Rasm yuklanmadi</span>';
            };
            img.src = url;
        } else {
            urlPreview.innerHTML = '';
        }
    });

    if (urlInput.value) urlInput.dispatchEvent(new Event('input'));
});
</script>
@endsection
