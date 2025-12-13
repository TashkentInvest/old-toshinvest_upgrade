@extends('layouts.frontend_app')
@section('frontent_content')

@php
    // Helper: get all docx files
    function getAllDocxFiles()
    {
        $folderPath = public_path('assets/frontend/nizomlar');
        $files = [];
        if (is_dir($folderPath)) {
            $all = scandir($folderPath);
            foreach ($all as $f) {
                if ($f === '.' || $f === '..') continue;
                $full = $folderPath . '/' . $f;
                if (is_file($full) && strtolower(pathinfo($f, PATHINFO_EXTENSION)) === 'docx') {
                    $files[] = $f;
                }
            }
        }
        sort($files);
        return $files;
    }

    // Format file size in docx (bytes to KB/MB)
    function formatFileSize($size)
    {
        if ($size >= 1048576) {
            return number_format($size / 1048576, 1, ',', ' ') . ' МБ';
        } elseif ($size >= 1024) {
            return number_format($size / 1024, 1, ',', ' ') . ' КБ';
        } else {
            return $size . ' Б';
        }
    }

    $allFiles = getAllDocxFiles();

    // Separate Russian and English
    $ruFiles = [];
    $enFiles = [];

    foreach ($allFiles as $file) {
        $lower = mb_strtolower($file, 'UTF-8');
        if (str_contains($lower, 'eng') || str_contains($lower, '_eng')) {
            $enFiles[] = $file;
        } else {
            $ruFiles[] = $file;
        }
    }
@endphp

<style>
    .documents-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin-bottom: 40px;
    }
    .documents-table th, .documents-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 13px;
    }
    .documents-table th {
        background-color: #34495e;
        color: #fff;
        text-transform: uppercase;
    }
    .documents-table td a {
        padding: 6px 12px;
        background: #2c3e50;
        color: #fff;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .section-header {
        text-align: center;
        margin: 40px 0 20px;
    }
    .section-header button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #34495e;
        color: #fff;
        border: none;
    }
    .filename-small {
        font-size: 11px;
        color: #7f8c8d;
        font-style: italic;
    }
</style>

{{-- Russian Section --}}
<div class="documents-container" style="max-width: 1000px; margin: 0 auto;">
    <div class="section-header">
        <button>На русском</button>
    </div>
    <table class="documents-table">
        <thead>
            <tr>
                <th>№</th>
                <th>Название документа</th>
                <th>Размер</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ruFiles as $i => $file)
                @php
                    $fullPath = public_path('assets/frontend/nizomlar/' . $file);
                    $size = file_exists($fullPath) ? formatFileSize(filesize($fullPath)) : '0 Б';
                    $display = pathinfo($file, PATHINFO_FILENAME);
                @endphp
                <tr style="background-color: {{ $i % 2 === 0 ? '#f8f9fa' : '#ffffff' }};">
                    <td style="text-align: center;">{{ $i + 1 }}</td>
                    <td>
                        <strong>{{ $display }}</strong><br>
                        <span class="filename-small">{{ $file }}</span>
                    </td>
                    <td style="text-align: center;">{{ $size }}</td>
                    <td style="text-align: center;">
                        <a href="{{ asset('assets/frontend/nizomlar/' . $file) }}" target="_blank" style="color: white">Скачать</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">Документы не найдены.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- English Section --}}
<div class="documents-container" style="max-width: 1000px; margin: 0 auto;">
    <div class="section-header">
        <button>In English</button>
    </div>
    <table class="documents-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Document Name</th>
                <th>Size</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enFiles as $i => $file)
                @php
                    $fullPath = public_path('assets/frontend/nizomlar/' . $file);
                    $size = file_exists($fullPath) ? formatFileSize(filesize($fullPath)) : '0 B';
                    $display = pathinfo($file, PATHINFO_FILENAME);
                @endphp
                <tr style="background-color: {{ $i % 2 === 0 ? '#f8f9fa' : '#ffffff' }};">
                    <td style="text-align: center;">{{ $i + 1 }}</td>
                    <td>
                        <strong>{{ $display }}</strong><br>
                        <span class="filename-small">{{ $file }}</span>
                    </td>
                    <td style="text-align: center;">{{ $size }}</td>
                    <td style="text-align: center;">
                        <a href="{{ asset('assets/frontend/nizomlar/' . $file) }}" target="_blank" style="color: white">Download</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #999;">No documents found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
