@extends('layouts.admin')

@section('title', 'Yangi rol qo\'shish')

@section('content')
<style>
    .permissions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 12px;
        max-height: 400px;
        overflow-y: auto;
        padding: 16px;
        background: var(--gov-bg-light);
        border-radius: var(--gov-radius);
    }
    .permission-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        background: white;
        border-radius: var(--gov-radius);
        border: 1px solid var(--gov-border);
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .permission-item:hover {
        border-color: var(--gov-primary);
        background: rgba(45, 74, 111, 0.02);
    }
    .permission-item input {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }
    .permission-item label {
        margin: 0;
        cursor: pointer;
        font-size: 0.9rem;
    }
    .permission-item.checked {
        background: rgba(45, 74, 111, 0.05);
        border-color: var(--gov-primary);
    }
    .select-all-btn {
        background: var(--gov-bg-gray);
        border: none;
        padding: 8px 16px;
        border-radius: var(--gov-radius);
        cursor: pointer;
        font-size: 0.85rem;
        margin-bottom: 12px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .select-all-btn:hover {
        background: var(--gov-primary);
        color: white;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-plus-circle"></i> Yangi rol qo'shish</h1>
        <p>Yangi rol yaratish va ruxsatlarni belgilash</p>
    </div>
    <a href="{{ route('roleIndex') }}" class="gov-btn gov-btn-secondary">
        <i class="fas fa-arrow-left"></i> Orqaga
    </a>
</div>

<!-- Form Card -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-user-shield"></i> Rol ma'lumotlari</h3>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('roleCreate') }}" method="POST">
            @csrf

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
                <div class="gov-form-group" style="margin-bottom: 0;">
                    <label class="gov-form-label">Rol nomi <span class="required">*</span></label>
                    <input type="text" name="name" class="gov-form-control" value="{{ old('name') }}" placeholder="masalan: Editor" required>
                    @error('name')
                        <div class="gov-form-error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="gov-form-group" style="margin-bottom: 0;">
                    <label class="gov-form-label">Sarlavha</label>
                    <input type="text" name="title" class="gov-form-control" value="{{ old('title') }}" placeholder="masalan: Muharrir">
                    @error('title')
                        <div class="gov-form-error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="gov-form-group">
                <label class="gov-form-label"><i class="fas fa-key"></i> Ruxsatlar</label>
                <div>
                    <button type="button" class="select-all-btn" onclick="toggleAllPermissions()">
                        <i class="fas fa-check-double"></i> Barchasini tanlash
                    </button>
                </div>
                <div class="permissions-grid">
                    @foreach($permissions as $permission)
                    <div class="permission-item" onclick="togglePermission(this)">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}"
                            {{ in_array($permission->name, old('permissions', [])) ? 'checked' : '' }}>
                        <label for="perm_{{ $permission->id }}">{{ $permission->title ?? $permission->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--gov-border);">
                <button type="submit" class="gov-btn gov-btn-primary">
                    <i class="fas fa-save"></i> Saqlash
                </button>
                <a href="{{ route('roleIndex') }}" class="gov-btn gov-btn-secondary">
                    <i class="fas fa-times"></i> Bekor qilish
                </a>
            </div>
        </form>
    </div>
</div>

<script>
function togglePermission(item) {
    const checkbox = item.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;
    item.classList.toggle('checked', checkbox.checked);
}

function toggleAllPermissions() {
    const checkboxes = document.querySelectorAll('.permissions-grid input[type="checkbox"]');
    const allChecked = Array.from(checkboxes).every(cb => cb.checked);

    checkboxes.forEach(cb => {
        cb.checked = !allChecked;
        cb.closest('.permission-item').classList.toggle('checked', !allChecked);
    });
}

// Initialize checked state
document.querySelectorAll('.permission-item input:checked').forEach(cb => {
    cb.closest('.permission-item').classList.add('checked');
});
</script>
@endsection
