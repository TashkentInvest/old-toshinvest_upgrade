@extends('layouts.admin')

@section('title', __('global.add') . ' - ' . __('cruds.user.title'))

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">@lang('global.add') @lang('cruds.user.title_singular')</h1>
            <p class="admin-page-subtitle">Yangi foydalanuvchi qo'shish</p>
        </div>
        <a href="{{ route('userIndex') }}" class="gov-btn gov-btn-secondary">
            <i class="fas fa-arrow-left"></i> @lang('cruds.user.title')
        </a>
    </div>
</div>

<!-- Form Card -->
<div class="admin-card" style="max-width: 800px;">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-user-plus"></i> Foydalanuvchi ma'lumotlari</h3>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('userCreate') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="gov-form-group">
                <label class="gov-label required">@lang('cruds.user.fields.name')</label>
                <input type="text" name="name" class="gov-input" value="{{ old('name') }}" placeholder="@lang('cruds.user.fields.name')" required>
                @error('name')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="gov-form-group">
                <label class="gov-label required">@lang('cruds.user.fields.email')</label>
                <input type="email" name="email" class="gov-input" value="{{ old('email') }}" placeholder="@lang('cruds.user.fields.email')" required>
                @error('email')
                <span class="gov-error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Roles -->
            <div class="gov-form-group">
                <label class="gov-label">@lang('cruds.role.fields.roles')</label>
                <div style="display: flex; flex-wrap: wrap; gap: 12px; padding: 16px; background: var(--gov-bg-light); border-radius: var(--gov-radius); border: 1px solid var(--gov-border);">
                    @foreach($roles as $role)
                    <label style="display: flex; align-items: center; gap: 8px; padding: 8px 14px; background: white; border-radius: var(--gov-radius-sm); border: 1px solid var(--gov-border); cursor: pointer; transition: var(--gov-transition);">
                        <input type="checkbox" name="roles[]" value="{{ $role->name }}" style="width: 18px; height: 18px; accent-color: var(--gov-primary);">
                        <span style="font-weight: 500; color: var(--gov-text-dark);">{{ $role->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <!-- Password -->
            <div class="gov-form-row">
                <div class="gov-form-group">
                    <label class="gov-label required">@lang('cruds.user.fields.password')</label>
                    <div style="position: relative;">
                        <input type="password" name="password" id="password" class="gov-input" placeholder="@lang('cruds.user.fields.password')" required style="padding-right: 50px;">
                        <button type="button" onclick="togglePasswordVisibility('password')" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--gov-text-muted); cursor: pointer;">
                            <i class="fas fa-eye" id="password-icon"></i>
                        </button>
                    </div>
                    @error('password')
                    <span class="gov-error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="gov-form-group">
                    <label class="gov-label required">@lang('global.login_password_confirmation')</label>
                    <div style="position: relative;">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="gov-input" placeholder="@lang('global.login_password_confirmation')" required style="padding-right: 50px;">
                        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--gov-text-muted); cursor: pointer;">
                            <i class="fas fa-eye" id="password_confirmation-icon"></i>
                        </button>
                    </div>
                    @error('password_confirmation')
                    <span class="gov-error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Form Actions -->
            <div class="gov-form-actions" style="display: flex; gap: 12px; margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--gov-border);">
                <button type="submit" class="gov-btn gov-btn-primary">
                    <i class="fas fa-save"></i> @lang('global.save')
                </button>
                <a href="{{ route('userIndex') }}" class="gov-btn gov-btn-secondary">
                    <i class="fas fa-times"></i> @lang('global.cancel')
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function togglePasswordVisibility(inputId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(inputId + '-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>
@endsection
