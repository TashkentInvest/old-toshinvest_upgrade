@extends('layouts.admin')

@section('title', __('cruds.user.title'))

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h1 class="admin-page-title">@lang('cruds.user.title')</h1>
            <p class="admin-page-subtitle">Foydalanuvchilar ro'yxati va boshqaruvi</p>
        </div>
        @can('user.add')
        <a href="{{ route('userAdd') }}" class="gov-btn gov-btn-primary">
            <i class="fas fa-plus"></i> @lang('global.add')
        </a>
        @endcan
    </div>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-users"></i></div>
        <div class="admin-stat-value">{{ $users->count() }}</div>
        <div class="admin-stat-label">Jami foydalanuvchilar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-user-shield"></i></div>
        <div class="admin-stat-value">{{ $users->filter(fn($u) => $u->roles->contains('name', 'Super Admin'))->count() }}</div>
        <div class="admin-stat-label">Administratorlar</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-key"></i></div>
        <div class="admin-stat-value">{{ \Spatie\Permission\Models\Role::count() }}</div>
        <div class="admin-stat-label">Rollar</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-lock"></i></div>
        <div class="admin-stat-value">{{ \Spatie\Permission\Models\Permission::count() }}</div>
        <div class="admin-stat-label">Ruxsatlar</div>
    </div>
</div>

<!-- Users Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> @lang('cruds.user.title_singular') ro'yxati</h3>
    </div>
    <div class="gov-table-container" style="border: none; box-shadow: none;">
        <table class="gov-table">
            <thead>
                <tr>
                    <th style="width: 60px;">@lang('cruds.user.fields.id')</th>
                    <th>@lang('cruds.user.fields.name')</th>
                    <th>@lang('cruds.user.fields.email')</th>
                    <th>@lang('cruds.user.fields.roles')</th>
                    <th>@lang('cruds.permission.fields.permissions')</th>
                    <th style="width: 160px;">@lang('global.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="number">{{ $user->id }}</td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 40px; height: 40px; background: var(--gov-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                            <div style="font-weight: 600; color: var(--gov-text-dark);">{{ $user->name }}</div>
                        </div>
                    </td>
                    <td>
                        <a href="mailto:{{ $user->email }}" style="color: var(--gov-primary); text-decoration: none;">{{ $user->email }}</a>
                    </td>
                    <td>
                        @foreach ($user->roles()->pluck('name') as $role)
                        <span style="display: inline-block; padding: 4px 10px; background: rgba(45, 74, 111, 0.1); color: var(--gov-primary); border-radius: 12px; font-size: 12px; font-weight: 600; margin: 2px;">
                            {{ $role }}
                        </span>
                        @endforeach
                    </td>
                    <td>
                        <div style="display: flex; flex-wrap: wrap; gap: 4px; max-width: 300px;">
                            @foreach ($user->getAllPermissions()->pluck('name')->take(3) as $permission)
                            <span style="display: inline-block; padding: 3px 8px; background: var(--gov-bg-gray); color: var(--gov-text-body); border-radius: 10px; font-size: 11px;">
                                {{ $permission }}
                            </span>
                            @endforeach
                            @if($user->getAllPermissions()->count() > 3)
                            <span style="display: inline-block; padding: 3px 8px; background: var(--gov-gold); color: var(--gov-text-dark); border-radius: 10px; font-size: 11px; font-weight: 600;">
                                +{{ $user->getAllPermissions()->count() - 3 }}
                            </span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            @can('user.edit')
                            <a href="{{ route('userEdit', $user->id) }}" class="gov-table-btn gov-table-btn-secondary" title="@lang('global.edit')" style="border-color: var(--gov-warning); color: var(--gov-warning);">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan
                            @can('user.delete')
                            <form action="{{ route('userDestroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Haqiqatan ham bu foydalanuvchini o\'chirmoqchimisiz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gov-table-btn gov-table-btn-secondary" title="@lang('global.delete')" style="border-color: var(--gov-error); color: var(--gov-error);">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
