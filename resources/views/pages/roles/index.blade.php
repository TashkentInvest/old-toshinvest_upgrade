@extends('layouts.admin')

@section('title', 'Rollar boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-user-shield"></i> Rollar boshqaruvi</h1>
        <p>Tizim rollari va ularning ruxsatlari</p>
    </div>
    @can('roles.add')
    <a href="{{ route('roleAdd') }}" class="gov-btn gov-btn-primary">
        <i class="fas fa-plus"></i> Yangi rol
    </a>
    @endcan
</div>

<!-- Stats -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-user-shield"></i></div>
        <div class="admin-stat-value">{{ $roles->count() }}</div>
        <div class="admin-stat-label">Jami rollar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-key"></i></div>
        <div class="admin-stat-value">{{ \Spatie\Permission\Models\Permission::count() }}</div>
        <div class="admin-stat-label">Ruxsatlar</div>
    </div>
    <div class="admin-stat-card warning">
        <div class="admin-stat-icon"><i class="fas fa-users"></i></div>
        <div class="admin-stat-value">{{ \App\Models\User::count() }}</div>
        <div class="admin-stat-label">Foydalanuvchilar</div>
    </div>
</div>

<!-- Roles Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> Rollar ro'yxati</h3>
    </div>
    <div class="admin-card-body" style="padding: 0;">
        <div class="gov-table-container">
            <table class="gov-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Rol nomi</th>
                        <th>Sarlavha</th>
                        <th>Ruxsatlar</th>
                        <th style="width: 160px;">Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 36px; height: 36px; background: var(--gov-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white;">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                <strong>{{ $role->name }}</strong>
                            </div>
                        </td>
                        <td>{{ $role->title ?? '-' }}</td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; gap: 4px; max-width: 400px;">
                                @foreach($role->permissions->take(4) as $permission)
                                <span style="display: inline-block; padding: 3px 8px; background: var(--gov-bg-gray); color: var(--gov-text-body); border-radius: 10px; font-size: 0.75rem;">
                                    {{ $permission->name }}
                                </span>
                                @endforeach
                                @if($role->permissions->count() > 4)
                                <span style="display: inline-block; padding: 3px 8px; background: var(--gov-gold); color: var(--gov-text-dark); border-radius: 10px; font-size: 0.75rem; font-weight: 600;">
                                    +{{ $role->permissions->count() - 4 }}
                                </span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                @can('roles.edit')
                                <a href="{{ route('roleEdit', $role->id) }}" class="gov-btn gov-btn-warning" style="padding: 6px 12px; font-size: 0.8rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('roles.delete')
                                @if($role->name !== 'Super Admin')
                                <form action="{{ route('roleDestroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bu rolni o\'chirmoqchimisiz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="gov-btn gov-btn-danger" style="padding: 6px 12px; font-size: 0.8rem;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--gov-text-muted);">
                            <i class="fas fa-user-shield" style="font-size: 2rem; margin-bottom: 12px; display: block;"></i>
                            Rollar topilmadi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
