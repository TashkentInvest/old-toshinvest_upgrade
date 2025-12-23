@extends('layouts.admin')

@section('title', 'Yangi ruxsat qo\'shish')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-plus-circle"></i> Yangi ruxsat qo'shish</h1>
        <p>Tizimga yangi ruxsat qo'shish</p>
    </div>
    <a href="{{ route('permissionIndex') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<!-- Form Card -->
<div class="admin-card" style="max-width: 600px;">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-key"></i> Ruxsat ma'lumotlari</h3>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('permissionCreate') }}" method="POST">
            @csrf

            <div class="gov-form-group">
                <label class="gov-form-label">Ruxsat nomi <span class="required">*</span></label>
                <input type="text" name="name" class="gov-form-control" value="{{ old('name') }}" placeholder="masalan: user.add" required>
                <div style="margin-top: 6px; font-size: 0.85rem; color: var(--gov-text-muted);">
                    <i class="fas fa-info-circle"></i> Ruxsat nomi kichik harflarda bo'lishi kerak (masalan: user.add, news.edit)
                </div>
                @error('name')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label">Sarlavha</label>
                <input type="text" name="title" class="gov-form-control" value="{{ old('title') }}" placeholder="masalan: Foydalanuvchi qo'shish">
                @error('title')
                    <div class="gov-form-error">{{ $message }}</div>
                @enderror
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--gov-border);">
                <button type="submit" class="gov-btn gov-btn-primary">
                    <i class="fas fa-save"></i> Saqlash
                </button>
                <a href="{{ route('permissionIndex') }}" class="gov-btn gov-btn-secondary">
                    <i class="fas fa-times"></i> Bekor qilish
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
