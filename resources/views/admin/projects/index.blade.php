@extends('layouts.admin')

@section('title', 'Loyihalar boshqaruvi')

@section('content')
<style>
    .project-status {
        padding: 4px 12px;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .status-completed {
        background: rgba(39, 174, 96, 0.15);
        color: var(--gov-success);
    }
    .status-1step {
        background: rgba(30, 64, 175, 0.15);
        color: var(--gov-primary);
    }
    .status-2step {
        background: rgba(241, 196, 15, 0.15);
        color: #f39c12;
    }
    .status-archive {
        background: rgba(108, 117, 125, 0.15);
        color: #6c757d;
    }
    .file-btn {
        padding: 4px 10px;
        font-size: 0.75rem;
        border-radius: var(--gov-radius);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: var(--gov-primary);
        color: white;
        margin: 2px;
        transition: all 0.2s ease;
    }
    .file-btn:hover {
        background: var(--gov-primary-dark);
        color: white;
    }
    .action-btns {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        justify-content: center;
    }
</style>

<!-- Page Header -->
<div class="admin-page-header">
    <div class="page-header-content">
        <h1><i class="fas fa-building"></i> Loyihalar boshqaruvi</h1>
        <p>Barcha investitsiya loyihalari ro'yxati</p>
    </div>
    <a href="{{ route('projects.create') }}" class="gov-btn gov-btn-primary">
        <i class="fas fa-plus-circle"></i> Yangi loyiha
    </a>
</div>

<!-- Stats Row -->
<div class="admin-stats-row">
    <div class="admin-stat-card">
        <div class="admin-stat-icon"><i class="fas fa-folder-open"></i></div>
        <div class="admin-stat-value">{{ $projects->count() }}</div>
        <div class="admin-stat-label">Jami loyihalar</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon" style="color: var(--gov-primary);"><i class="fas fa-play-circle"></i></div>
        <div class="admin-stat-value">{{ $projects->where('status', '1_step')->count() }}</div>
        <div class="admin-stat-label">1-bosqich</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon" style="color: #f39c12;"><i class="fas fa-forward"></i></div>
        <div class="admin-stat-value">{{ $projects->where('status', '2_step')->count() }}</div>
        <div class="admin-stat-label">2-bosqich</div>
    </div>
    <div class="admin-stat-card">
        <div class="admin-stat-icon" style="color: var(--gov-success);"><i class="fas fa-check-circle"></i></div>
        <div class="admin-stat-value">{{ $projects->where('status', 'completed')->count() }}</div>
        <div class="admin-stat-label">Yakunlangan</div>
    </div>
</div>

<!-- Projects Table -->
<div class="admin-card">
    <div class="admin-card-header">
        <div class="admin-card-title">
            <i class="fas fa-list"></i>
            Loyihalar ro'yxati
        </div>
    </div>
    <div class="admin-card-body" style="padding: 0;">
        <div class="gov-table-container">
            <table class="gov-table" id="projectsTable">
                <thead>
                    <tr>
                        <th>Tuman</th>
                        <th>Mahalla</th>
                        <th>Yer (ga)</th>
                        <th>Muddat</th>
                        <th>Holat</th>
                        <th>Fayllar</th>
                        <th style="width: 160px;">Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td><strong>{{ $project->district }}</strong></td>
                            <td>{{ $project->mahalla ?? '-' }}</td>
                            <td>{{ $project->land ?? '-' }}</td>
                            <td>{{ $project->srok_realizatsi ?? '-' }}</td>
                            <td>
                                @if ($project->status == 'completed')
                                    <span class="project-status status-completed">
                                        <i class="fas fa-check"></i> Yakunlangan
                                    </span>
                                @elseif($project->status == '1_step')
                                    <span class="project-status status-1step">
                                        <i class="fas fa-play"></i> 1-Bosqich
                                    </span>
                                @elseif($project->status == '2_step')
                                    <span class="project-status status-2step">
                                        <i class="fas fa-forward"></i> 2-Bosqich
                                    </span>
                                @else
                                    <span class="project-status status-archive">
                                        <i class="fas fa-archive"></i> Arxiv
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if ($project->elon_fayl && file_exists(public_path('storage/' . $project->elon_fayl)))
                                    <a class="file-btn" target="_blank" href="{{ asset('storage/' . $project->elon_fayl) }}">
                                        <i class="fas fa-file-alt"></i> E'lon
                                    </a>
                                @endif

                                @if ($project->pratakol_fayl && file_exists(public_path('storage/' . $project->pratakol_fayl)))
                                    <a class="file-btn" target="_blank" href="{{ asset('storage/' . $project->pratakol_fayl) }}">
                                        <i class="fas fa-file-contract"></i> Bayonnoma
                                    </a>
                                @endif

                                @if ($project->qoshimcha_fayl && file_exists(public_path('storage/' . $project->qoshimcha_fayl)))
                                    <a class="file-btn" target="_blank" href="{{ asset('storage/' . $project->qoshimcha_fayl) }}">
                                        <i class="fas fa-file-archive"></i> Qo'shimcha
                                    </a>
                                @endif

                                @if (!$project->elon_fayl && !$project->pratakol_fayl && !$project->qoshimcha_fayl)
                                    <span style="color: var(--gov-text-muted);">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('projects.edit', $project->id) }}" class="gov-btn gov-btn-warning" style="padding: 6px 12px; font-size: 0.8rem;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="gov-btn gov-btn-danger" style="padding: 6px 12px; font-size: 0.8rem;"
                                            onclick="return confirm('Bu loyihani o\'chirmoqchimisiz?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: var(--gov-text-muted);">
                                <i class="fas fa-folder-open" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                                Loyihalar topilmadi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Simple table search (optional enhancement)
    document.addEventListener('DOMContentLoaded', function() {
        // Add search functionality if needed
    });
</script>
@endsection
