@extends('layouts.admin')

@section('title', 'Ruxsatlar boshqaruvi')

@section('content')
<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-key"></i> Ruxsatlar boshqaruvi</h1>
        <p>Tizim ruxsatlari ro'yxati va boshqaruvi</p>
    </div>
    @can('permission.add')
    <a href="{{ route('permissionAdd') }}" class="gov-btn gov-btn-primary">
        <i class="fas fa-plus"></i> Yangi ruxsat
    </a>
    @endcan
</div>

<!-- Stats -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-key"></i></div>
        <div class="admin-stat-value">{{ $permissions->count() }}</div>
        <div class="admin-stat-label">Jami ruxsatlar</div>
    </div>
    <div class="admin-stat-card success">
        <div class="admin-stat-icon"><i class="fas fa-user-shield"></i></div>
        <div class="admin-stat-value">{{ \Spatie\Permission\Models\Role::count() }}</div>
        <div class="admin-stat-label">Rollar</div>
    </div>
</div>

<!-- Permissions Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <h3 class="admin-card-title"><i class="fas fa-list"></i> Ruxsatlar ro'yxati</h3>
    </div>
    <div class="admin-card-body" style="padding: 0;">
        <div class="gov-table-container">
            <table class="gov-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Nomi</th>
                        <th>Sarlavha</th>
                        <th>Tegishli rollar</th>
                        <th style="width: 160px;">Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>
                            <code style="background: var(--gov-bg-light); padding: 4px 8px; border-radius: 4px; font-size: 0.85rem;">
                                {{ $permission->name }}
                            </code>
                        </td>
                        <td>{{ $permission->title ?? '-' }}</td>
                        <td>
                            @foreach($permission->roles as $role)
                            <span style="display: inline-block; padding: 3px 10px; background: rgba(45, 74, 111, 0.1); color: var(--gov-primary); border-radius: 12px; font-size: 0.8rem; margin: 2px;">
                                {{ $role->name }}
                            </span>
                            @endforeach
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                @can('permission.edit')
                                <a href="{{ route('permissionEdit', $permission->id) }}" class="gov-btn gov-btn-warning" style="padding: 6px 12px; font-size: 0.8rem;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('permission.delete')
                                <form action="{{ route('permissionDestroy', $permission->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Bu ruxsatni o\'chirmoqchimisiz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="gov-btn gov-btn-danger" style="padding: 6px 12px; font-size: 0.8rem;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--gov-text-muted);">
                            <i class="fas fa-key" style="font-size: 2rem; margin-bottom: 12px; display: block;"></i>
                            Ruxsatlar topilmadi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
