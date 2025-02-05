@extends('layouts.admin')

@section('content')
    <div class="card shadow p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary"><i class="fas fa-folder-open"></i> Лойиҳалар Рўйхати</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Янги Лойиҳа Қўшиш
            </a>
        </div>

        <div class="table-responsive" style="overflow-x: auto;">
            <table class="table table-bordered table-hover text-center" style="font-size: 0.875rem;">
                <thead class="bg-primary">
                    <tr>
                        <th style="width: 10%;">Уникал рақам</th>
                        <th style="width: 12%;">Туман</th>
                        <th style="width: 12%;">Маҳалла</th>
                        <th style="width: 10%;">Ер (га)</th>
                        <th style="width: 15%;">Реализация муддати</th>
                        <th style="width: 10%;">Ҳолат</th>
                        <th style="width: 15%;">Файллар</th>
                        <th style="width: 15%;">Таҳрирлаш</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td><strong>{{ $project->unique_number }}</strong></td>
                            <td>{{ $project->district }}</td>
                            <td>{{ $project->mahalla }}</td>
                            <td>{{ $project->land }}</td>
                            <td>{{ $project->srok_realizatsi ?? '—' }}</td>
                            <td>
                                @if($project->status == 'completed')
                                    <span class="badge bg-success">Якунланган</span>
                                @elseif($project->status == '1_step')
                                    <span class="badge bg-primary">1-Қадам</span>
                                @elseif($project->status == '2_step')
                                    <span class="badge bg-warning text-dark">2-Қадам</span>
                                @else
                                    <span class="badge bg-secondary">Архивланган</span>
                                @endif
                            </td>
                            <td>
                                @if($project->elon_fayl && file_exists(public_path('storage/' . $project->elon_fayl)))
                                    <a class="btn btn-sm btn-info text-light" target="_blank" href="{{ asset('storage/' . $project->elon_fayl) }}">
                                        <i class="fas fa-file-alt"></i> Эълон
                                    </a>
                                @endif
                            
                                @if($project->pratakol_fayl && file_exists(public_path('storage/' . $project->pratakol_fayl)))
                                    <a class="btn btn-sm btn-info text-light" target="_blank" href="{{ asset('storage/' . $project->pratakol_fayl) }}">
                                        <i class="fas fa-file-contract"></i> Протокол
                                    </a>
                                @endif
                            
                                @if($project->qoshimcha_fayl && file_exists(public_path('storage/' . $project->qoshimcha_fayl)))
                                    <a class="btn btn-sm btn-info text-light" target="_blank" href="{{ asset('storage/' . $project->qoshimcha_fayl) }}">
                                        <i class="fas fa-file-archive"></i> Қўшимча
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning text-dark">
                                    <i class="fas fa-edit"></i> Таҳрирлаш
                                </a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Сиз ростан ҳам бу лойиҳани ўчирмоқчимисиз?')">
                                        <i class="fas fa-trash-alt"></i> Ўчириш
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
