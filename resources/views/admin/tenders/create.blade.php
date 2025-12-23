@extends('layouts.admin')

@section('title', 'Yangi tender yaratish')

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
    .form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin-bottom: 20px;
    }
    .form-row:last-child {
        margin-bottom: 0;
    }
    .lang-tabs {
        display: flex;
        border-bottom: 2px solid var(--gov-border);
        margin-bottom: 20px;
    }
    .lang-tab {
        padding: 12px 24px;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        margin-bottom: -2px;
        color: var(--gov-text-muted);
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .lang-tab:hover {
        color: var(--gov-primary);
    }
    .lang-tab.active {
        border-bottom-color: var(--gov-primary);
        color: var(--gov-primary);
        font-weight: 600;
    }
    .lang-tab img {
        width: 20px;
        height: 14px;
        border-radius: 2px;
    }
    .lang-content {
        display: none;
    }
    .lang-content.active {
        display: block;
    }
    .dynamic-list {
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        padding: 16px;
    }
    .dynamic-item {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
    }
    .dynamic-item:last-child {
        margin-bottom: 0;
    }
    .dynamic-item input {
        flex: 1;
    }
    .dynamic-item .btn-remove {
        background: var(--gov-error);
        color: white;
        border: none;
        border-radius: var(--gov-radius);
        width: 40px;
        height: 40px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .dynamic-item .btn-remove:hover {
        background: #c0392b;
    }
    .btn-add {
        background: var(--gov-success);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: var(--gov-radius);
        cursor: pointer;
        margin-top: 12px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 500;
        transition: all 0.2s ease;
    }
    .btn-add:hover {
        background: #219a52;
    }
    .checkbox-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
        cursor: pointer;
    }
    .checkbox-wrapper input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }
    .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .checkbox-wrapper .urgent-icon {
        color: var(--gov-error);
    }
    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 24px;
        background: var(--gov-bg-light);
        border-top: 1px solid var(--gov-border);
    }
    .file-upload-info {
        color: var(--gov-text-muted);
        font-size: 0.875rem;
        margin-top: 8px;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-plus-circle"></i> Yangi tender yaratish</h1>
        <p>Tender ma'lumotlarini to'ldiring va saqlang</p>
    </div>
    <a href="{{ route('admin.tenders.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<form method="POST" action="{{ route('admin.tenders.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Basic Information -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-file-alt"></i>
            <h3>Asosiy ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="lang-tabs">
                <div class="lang-tab active" onclick="switchLang('ru', this)">
                    <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="RU">
                    Русский
                </div>
                <div class="lang-tab" onclick="switchLang('uz', this)">
                    <img src="{{ asset('assets/images/flags/uzbekistan.jpg') }}" alt="UZ">
                    O'zbekcha
                </div>
                <div class="lang-tab" onclick="switchLang('en', this)">
                    <i class="fas fa-globe"></i>
                    English
                </div>
            </div>

            <div id="lang-ru" class="lang-content active">
                <div class="gov-form-group">
                    <label class="gov-form-label">Nomi <span class="required">*</span></label>
                    <input type="text" name="title" class="gov-form-control" value="{{ old('title') }}" required placeholder="Tender nomini kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Xarid mavzusi <span class="required">*</span></label>
                    <textarea name="subject" class="gov-form-control" rows="3" required placeholder="Xarid mavzusini kiriting">{{ old('subject') }}</textarea>
                </div>
            </div>

            <div id="lang-uz" class="lang-content">
                <div class="gov-form-group">
                    <label class="gov-form-label">Nomi (O'zbekcha)</label>
                    <input type="text" name="title_uz" class="gov-form-control" value="{{ old('title_uz') }}" placeholder="Tender nomini o'zbekchada kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Xarid mavzusi (O'zbekcha)</label>
                    <textarea name="subject_uz" class="gov-form-control" rows="3" placeholder="Xarid mavzusini o'zbekchada kiriting">{{ old('subject_uz') }}</textarea>
                </div>
            </div>

            <div id="lang-en" class="lang-content">
                <div class="gov-form-group">
                    <label class="gov-form-label">Title (English)</label>
                    <input type="text" name="title_en" class="gov-form-control" value="{{ old('title_en') }}" placeholder="Enter tender title in English">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Subject (English)</label>
                    <textarea name="subject_en" class="gov-form-control" rows="3" placeholder="Enter subject in English">{{ old('subject_en') }}</textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Kod</label>
                    <input type="text" name="code" class="gov-form-control" value="{{ old('code') }}" placeholder="70.22.12.000-00001">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Lot raqami</label>
                    <input type="text" name="lot_number" class="gov-form-control" value="{{ old('lot_number') }}" placeholder="25120012464150">
                </div>
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Lot URL (etender)</label>
                <input type="url" name="lot_url" class="gov-form-control" value="{{ old('lot_url') }}" placeholder="https://etender.uzex.uz/lot/...">
            </div>
        </div>
    </div>

    <!-- Location -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Loyiha joylashuvi</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Manzil <span class="required">*</span></label>
                <input type="text" name="location" class="gov-form-control" value="{{ old('location') }}" required placeholder="Toshkent, Olmazor tumani...">
            </div>
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Manzil (O'zbekcha)</label>
                    <input type="text" name="location_uz" class="gov-form-control" value="{{ old('location_uz') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Address (English)</label>
                    <input type="text" name="location_en" class="gov-form-control" value="{{ old('location_en') }}">
                </div>
            </div>
            <div class="gov-form-group">
                <label class="gov-form-label">Joylashuv tavsifi</label>
                <textarea name="location_description" class="gov-form-control" rows="2">{{ old('location_description') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Requirements -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-list-check"></i>
            <h3>Talablar</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Texnik talablar</label>
                <div class="dynamic-list" id="technical-requirements">
                    <div class="dynamic-item">
                        <input type="text" name="technical_requirements[]" class="gov-form-control" placeholder="Talabni kiriting...">
                        <button type="button" class="btn-remove" onclick="removeItem(this)"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addItem('technical-requirements', 'technical_requirements[]')">
                    <i class="fas fa-plus"></i> Qo'shish
                </button>
            </div>

            <div class="gov-form-group" style="margin-top: 24px;">
                <label class="gov-form-label">Malaka talablari</label>
                <div class="dynamic-list" id="qualification-requirements">
                    <div class="dynamic-item">
                        <input type="text" name="qualification_requirements[]" class="gov-form-control" placeholder="Talabni kiriting...">
                        <button type="button" class="btn-remove" onclick="removeItem(this)"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <button type="button" class="btn-add" onclick="addItem('qualification-requirements', 'qualification_requirements[]')">
                    <i class="fas fa-plus"></i> Qo'shish
                </button>
            </div>
        </div>
    </div>

    <!-- Customer Information -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-building"></i>
            <h3>Buyurtmachi ma'lumotlari</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Tashkilot nomi <span class="required">*</span></label>
                <input type="text" name="customer_name" class="gov-form-control" value="{{ old('customer_name', 'АО «Tashkent Invest Company»') }}" required>
            </div>
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">INN</label>
                    <input type="text" name="customer_tin" class="gov-form-control" value="{{ old('customer_tin', '310731897') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Telefon</label>
                    <input type="text" name="customer_phone" class="gov-form-control" value="{{ old('customer_phone', '+998 71 203 03 03') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Email</label>
                    <input type="email" name="customer_email" class="gov-form-control" value="{{ old('customer_email') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Manzil</label>
                    <input type="text" name="customer_address" class="gov-form-control" value="{{ old('customer_address', 'г. Ташкент, Чиланзарский район, ул. И.Каримова, 51') }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Dates and Status -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-calendar-alt"></i>
            <h3>Sanalar va holat</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">E'lon qilingan sana <span class="required">*</span></label>
                    <input type="date" name="announcement_date" class="gov-form-control" value="{{ old('announcement_date', date('Y-m-d')) }}" required>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Arizalar qabul qilish muddati <span class="required">*</span></label>
                    <input type="date" name="submission_deadline" class="gov-form-control" value="{{ old('submission_deadline') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Holat <span class="required">*</span></label>
                    <select name="status" class="gov-form-control" required>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Qoralama</option>
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Faol</option>
                        <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Yopiq</option>
                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Bekor qilingan</option>
                    </select>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">&nbsp;</label>
                    <div class="checkbox-wrapper">
                        <input type="checkbox" name="is_urgent" id="is_urgent" value="1" {{ old('is_urgent') ? 'checked' : '' }}>
                        <label for="is_urgent">
                            <i class="fas fa-exclamation-circle urgent-icon"></i>
                            Shoshilinch tender
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Documents -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-paperclip"></i>
            <h3>Hujjatlar</h3>
        </div>
        <div class="form-card-body">
            <div class="gov-form-group">
                <label class="gov-form-label">Hujjatlarni yuklash (PDF, DOC, DOCX)</label>
                <input type="file" name="documents[]" class="gov-form-control" multiple accept=".pdf,.doc,.docx">
                <div class="file-upload-info">
                    <i class="fas fa-info-circle"></i>
                    Bir nechta fayllarni yuklash mumkin. Har bir fayl maksimal 10 MB.
                </div>
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('admin.tenders.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-times"></i> Bekor qilish
            </a>
            <button type="submit" class="gov-btn gov-btn-primary">
                <i class="fas fa-save"></i> Saqlash
            </button>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    function switchLang(lang, el) {
        // Hide all content
        document.querySelectorAll('.lang-content').forEach(c => c.classList.remove('active'));
        document.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));

        // Show selected
        document.getElementById('lang-' + lang).classList.add('active');
        el.classList.add('active');
    }

    function addItem(containerId, inputName) {
        const container = document.getElementById(containerId);
        const div = document.createElement('div');
        div.className = 'dynamic-item';
        div.innerHTML = `
            <input type="text" name="${inputName}" class="gov-form-control" placeholder="Talabni kiriting...">
            <button type="button" class="btn-remove" onclick="removeItem(this)"><i class="fas fa-times"></i></button>
        `;
        container.appendChild(div);
    }

    function removeItem(btn) {
        const container = btn.parentElement.parentElement;
        if (container.children.length > 1) {
            btn.parentElement.remove();
        }
    }
</script>
@endsection
