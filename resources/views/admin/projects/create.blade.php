@extends('layouts.admin')

@section('title', 'Yangi loyiha yaratish')

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
        font-size: 0.85rem;
        margin-top: 6px;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-plus-circle"></i> Yangi loyiha yaratish</h1>
        <p>Loyiha ma'lumotlarini to'ldiring</p>
    </div>
    <a href="{{ route('projects.index') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Basic Info -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-info-circle"></i>
            <h3>Asosiy ma'lumotlar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Unikal raqam</label>
                    <input type="text" name="unique_number" class="gov-form-control" value="{{ old('unique_number') }}" placeholder="masalan, YUN0001">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Kategoriya</label>
                    <select name="category_id" class="gov-form-control">
                        <option value="">— Kategoriyani tanlang —</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Tuman <span class="required">*</span></label>
                    <input type="text" name="district" class="gov-form-control" value="{{ old('district') }}" placeholder="Tumanni kiriting" required>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Ko'cha</label>
                    <input type="text" name="street" class="gov-form-control" value="{{ old('street') }}" placeholder="Ko'chani kiriting">
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Mahalla</label>
                    <input type="text" name="mahalla" class="gov-form-control" value="{{ old('mahalla') }}" placeholder="Mahalla nomini kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Yer maydoni (ga)</label>
                    <input type="number" step="0.01" name="land" class="gov-form-control" value="{{ old('land') }}" placeholder="masalan, 0.12">
                </div>
            </div>
        </div>
    </div>

    <!-- Company Info -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-building"></i>
            <h3>Kompaniya ma'lumotlari</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Kompaniya nomi</label>
                    <input type="text" name="company_name" class="gov-form-control" value="{{ old('company_name') }}" placeholder="Kompaniya nomini kiriting">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Mas'ul shaxs</label>
                    <input type="text" name="contact_person" class="gov-form-control" value="{{ old('contact_person') }}" placeholder="Mas'ul shaxsni kiriting">
                </div>
            </div>
        </div>
    </div>

    <!-- Stages -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-tasks"></i>
            <h3>Bosqichlar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">1-Bosqich boshlanish sanasi</label>
                    <input type="date" name="start_date" class="gov-form-control" value="{{ old('start_date') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">1-Bosqich tugash sanasi</label>
                    <input type="date" name="end_date" class="gov-form-control" value="{{ old('end_date') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">2-Bosqich boshlanish sanasi</label>
                    <input type="date" name="second_stage_start_date" class="gov-form-control" value="{{ old('second_stage_start_date') }}">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">2-Bosqich tugash sanasi</label>
                    <input type="date" name="second_stage_end_date" class="gov-form-control" value="{{ old('second_stage_end_date') }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Files -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-paperclip"></i>
            <h3>Fayllar</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">E'lon fayli</label>
                    <input type="file" name="elon_fayl" class="gov-form-control">
                    <div class="file-upload-info"><i class="fas fa-info-circle"></i> PDF, DOC formatida</div>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Bayonnoma fayli</label>
                    <input type="file" name="pratakol_fayl" class="gov-form-control">
                    <div class="file-upload-info"><i class="fas fa-info-circle"></i> PDF, DOC formatida</div>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Qo'shimcha fayl</label>
                    <input type="file" name="qoshimcha_fayl" class="gov-form-control">
                    <div class="file-upload-info"><i class="fas fa-info-circle"></i> PDF, DOC formatida</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Location & Status -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-map-marker-alt"></i>
            <h3>Joylashuv va holat</h3>
        </div>
        <div class="form-card-body">
            <div class="form-row">
                <div class="gov-form-group">
                    <label class="gov-form-label">Holat <span class="required">*</span></label>
                    <select name="status" class="gov-form-control" required>
                        <option value="1_step" {{ old('status') == '1_step' ? 'selected' : '' }}>1-Bosqich</option>
                        <option value="2_step" {{ old('status') == '2_step' ? 'selected' : '' }}>2-Bosqich</option>
                        <option value="archive" {{ old('status') == 'archive' ? 'selected' : '' }}>Arxivlangan</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Yakunlangan</option>
                    </select>
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Kenglik (Latitude)</label>
                    <input type="text" name="latitude" class="gov-form-control" value="{{ old('latitude') }}" placeholder="masalan, 41.2995">
                </div>
                <div class="gov-form-group">
                    <label class="gov-form-label">Uzunlik (Longitude)</label>
                    <input type="text" name="longitude" class="gov-form-control" value="{{ old('longitude') }}" placeholder="masalan, 69.2401">
                </div>
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Izoh</label>
                <textarea name="comment" class="gov-form-control" rows="3" placeholder="Izohni kiriting">{{ old('comment') }}</textarea>
            </div>
        </div>
        <div class="form-actions">
            <a href="{{ route('projects.index') }}" class="gov-btn gov-btn-secondary">
                <i class="fas fa-times"></i> Bekor qilish
            </a>
            <button type="submit" class="gov-btn gov-btn-primary">
                <i class="fas fa-save"></i> Saqlash
            </button>
        </div>
    </div>
</form>
@endsection
