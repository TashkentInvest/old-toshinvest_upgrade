@extends('layouts.admin')

@section('title', 'Yangi ochiq ma\'lumot yaratish')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">Yangi ochiq ma'lumot yaratish</h1>
            <p class="admin-page-subtitle">Yangi fayl va ma'lumot qo'shish</p>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="admin-card" style="background: rgba(220, 53, 69, 0.1); border: 1px solid #dc3545; padding: 16px; margin-bottom: 20px; border-radius: 8px;">
    <div style="display: flex; gap: 12px; color: #dc3545;">
        <div style="flex-shrink: 0;">
            <i class="fas fa-exclamation-circle" style="font-size: 20px;"></i>
        </div>
        <div>
            <strong>Xatolar:</strong>
            <ul style="margin: 8px 0 0 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                <li style="margin: 4px 0;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<!-- Form Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-file-plus"></i> Fayl ma'lumotlari</h3>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.open-data.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Uz Title -->
            <div class="gov-form-group">
                <label class="gov-label">Sarlavha (O'zbek) <span style="color: var(--gov-error);">*</span></label>
                <input type="text" class="gov-input @error('title_uz') gov-input-error @enderror"
                       name="title_uz" value="{{ old('title_uz') }}" placeholder="O'zbek tilida sarlavha" required>
                @error('title_uz')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- Ru Title -->
            <div class="gov-form-group">
                <label class="gov-label">Sarlavha (Rus) <span style="color: var(--gov-error);">*</span></label>
                <input type="text" class="gov-input @error('title_ru') gov-input-error @enderror"
                       name="title_ru" value="{{ old('title_ru') }}" placeholder="Rus tilida sarlavha" required>
                @error('title_ru')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- En Title -->
            <div class="gov-form-group">
                <label class="gov-label">Sarlavha (Ingliz)</label>
                <input type="text" class="gov-input @error('title_en') gov-input-error @enderror"
                       name="title_en" value="{{ old('title_en') }}" placeholder="Ingliz tilida sarlavha">
                @error('title_en')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- Uz Description -->
            <div class="gov-form-group">
                <label class="gov-label">Ta'rif (O'zbek)</label>
                <textarea class="gov-textarea @error('description_uz') gov-input-error @enderror"
                          name="description_uz" rows="4" placeholder="O'zbek tilida ta'rif">{{ old('description_uz') }}</textarea>
                @error('description_uz')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- Ru Description -->
            <div class="gov-form-group">
                <label class="gov-label">Ta'rif (Rus)</label>
                <textarea class="gov-textarea @error('description_ru') gov-input-error @enderror"
                          name="description_ru" rows="4" placeholder="Rus tilida ta'rif">{{ old('description_ru') }}</textarea>
                @error('description_ru')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- En Description -->
            <div class="gov-form-group">
                <label class="gov-label">Ta'rif (Ingliz)</label>
                <textarea class="gov-textarea @error('description_en') gov-input-error @enderror"
                          name="description_en" rows="4" placeholder="Ingliz tilida ta'rif">{{ old('description_en') }}</textarea>
                @error('description_en')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- File Upload -->
            <div class="gov-form-group">
                <label class="gov-label">Fayl <span style="color: var(--gov-error);">*</span></label>
                <div class="gov-file-input-wrapper">
                    <input type="file" class="gov-file-input @error('file') gov-input-error @enderror"
                           id="file" name="file" required
                           accept=".pdf,.xlsx,.xls,.doc,.docx,.ppt,.pptx,.jpg,.jpeg,.png,.gif,.zip">
                    <label for="file" class="gov-file-label">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <span id="file-name">Faylni tanlang yoki bu yerga tashlang</span>
                    </label>
                </div>
                <small class="gov-helper-text">
                    <i class="fas fa-info-circle"></i> Qo'llaniladigan formatlar: PDF, XLSX, XLS, DOC, DOCX, PPT, PPTX, JPG, PNG, GIF, ZIP (Maksimal 50MB)
                </small>
                @error('file')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- Sort Order -->
            <div class="gov-form-group">
                <label class="gov-label">Saralash tartibi</label>
                <input type="number" class="gov-input @error('sort_order') gov-input-error @enderror"
                       name="sort_order" value="{{ old('sort_order', 0) }}" min="0" placeholder="0">
                @error('sort_order')<span class="gov-error-text">{{ $message }}</span>@enderror
            </div>

            <!-- Active Status -->
            <div class="gov-form-group" style="margin-bottom: 24px;">
                <label class="gov-checkbox">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                    <span>Faollashtirish</span>
                </label>
            </div>

            <!-- Form Actions -->
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <button type="submit" class="gov-btn gov-btn-primary">
                    <i class="fas fa-save"></i> Saqlash
                </button>
                <a href="{{ route('admin.open-data.index') }}" class="gov-btn gov-btn-secondary">
                    <i class="fas fa-times"></i> Bekor qilish
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('file').addEventListener('change', function(e) {
    const fileName = e.target.files[0]?.name || 'Faylni tanlang yoki bu yerga tashlang';
    document.getElementById('file-name').textContent = fileName;
});

// Drag and drop
const fileLabel = document.querySelector('.gov-file-label');
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    fileLabel.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    fileLabel.addEventListener(eventName, () => {
        fileLabel.style.background = 'rgba(25, 103, 210, 0.1)';
    }, false);
});

['dragleave', 'drop'].forEach(eventName => {
    fileLabel.addEventListener(eventName, () => {
        fileLabel.style.background = '';
    }, false);
});

fileLabel.addEventListener('drop', handleDrop, false);

function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
    document.getElementById('file').files = files;

    const event = new Event('change', { bubbles: true });
    document.getElementById('file').dispatchEvent(event);
}
</script>
@endsection

