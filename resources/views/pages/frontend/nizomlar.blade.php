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
    /* Container */
    .documents-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    /* Section Header */
    .section-header {
        text-align: center;
        margin: 40px 0 20px;
    }

    .language-button {
        padding: 10px 20px;
        font-size: 16px;
        background-color: #34495e;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    /* Documents Table */
    .documents-table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin-bottom: 40px;
    }

    /* Table Header */
    .table-header-cell {
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 13px;
        background-color: #34495e;
        color: #fff;
        text-transform: uppercase;
    }

    .table-header-cell.number {
        text-align: center;
    }

    .table-header-cell.name {
        text-align: left;
    }

    .table-header-cell.size {
        text-align: center;
    }

    .table-header-cell.action {
        text-align: center;
    }

    /* Table Rows */
    .table-row {
        border-bottom: 1px solid #ddd;
    }

    .table-row.even {
        background-color: #f8f9fa;
    }

    .table-row.odd {
        background-color: #ffffff;
    }

    /* Table Cells */
    .table-cell {
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 13px;
    }

    .table-cell.number {
        text-align: center;
    }

    .table-cell.name {
        text-align: left;
    }

    .table-cell.size {
        text-align: center;
    }

    .table-cell.action {
        text-align: center;
    }

    /* Buttons */
    .btn {
        padding: 6px 12px;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        cursor: pointer;
    }

    .btn-download {
        background: #2c3e50;
        color: #fff;
    }

    .btn-download:hover {
        background: #1a252f;
    }

    /* File Name */
    .filename-small {
        font-size: 11px;
        color: #7f8c8d;
        font-style: italic;
    }

    /* No Documents */
    .no-documents {
        text-align: center;
        color: #999;
        padding: 40px 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .documents-table {
            font-size: 12px;
        }

        .table-header-cell,
        .table-cell {
            padding: 8px 10px;
        }

        .language-button {
            padding: 8px 16px;
            font-size: 14px;
        }

        .btn {
            padding: 4px 8px;
            font-size: 10px;
        }
    }
</style>

{{-- Russian Section --}}
<div class="documents-container">
    <div class="section-header">
        <button class="language-button">{{ __('frontend.regulations.russian_version') }}</button>
    </div>
    <table class="documents-table">
        <thead>
            <tr>
                <th class="table-header-cell number">{{ __('frontend.regulations.number') }}</th>
                <th class="table-header-cell name">{{ __('frontend.regulations.document_name') }}</th>
                <th class="table-header-cell size">{{ __('frontend.regulations.size') }}</th>
                <th class="table-header-cell action">{{ __('frontend.regulations.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ruFiles as $i => $file)
                @php
                    $fullPath = public_path('assets/frontend/nizomlar/' . $file);
                    $size = file_exists($fullPath) ? formatFileSize(filesize($fullPath)) : '0 Б';
                    $display = pathinfo($file, PATHINFO_FILENAME);
                @endphp
                <tr class="table-row @if ($i % 2 === 0) even @else odd @endif">
                    <td class="table-cell number">{{ $i + 1 }}</td>
                    <td class="table-cell name">
                        <strong>{{ $display }}</strong><br>
                        <span class="filename-small">{{ $file }}</span>
                    </td>
                    <td class="table-cell size">{{ $size }}</td>
                    <td class="table-cell action">
                        <a href="{{ asset('assets/frontend/nizomlar/' . $file) }}" target="_blank" class="btn btn-download">{{ __('frontend.common.download') }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-documents">{{ __('frontend.regulations.no_documents') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- English Section --}}
<div class="documents-container">
    <div class="section-header">
        <button class="language-button">{{ __('frontend.regulations.english_version') }}</button>
    </div>
    <table class="documents-table">
        <thead>
            <tr>
                <th class="table-header-cell number">{{ __('frontend.regulations.number') }}</th>
                <th class="table-header-cell name">{{ __('frontend.regulations.document_name') }}</th>
                <th class="table-header-cell size">{{ __('frontend.regulations.size') }}</th>
                <th class="table-header-cell action">{{ __('frontend.regulations.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($enFiles as $i => $file)
                @php
                    $fullPath = public_path('assets/frontend/nizomlar/' . $file);
                    $size = file_exists($fullPath) ? formatFileSize(filesize($fullPath)) : '0 B';
                    $display = pathinfo($file, PATHINFO_FILENAME);
                @endphp
                <tr class="table-row @if ($i % 2 === 0) even @else odd @endif">
                    <td class="table-cell number">{{ $i + 1 }}</td>
                    <td class="table-cell name">
                        <strong>{{ $display }}</strong><br>
                        <span class="filename-small">{{ $file }}</span>
                    </td>
                    <td class="table-cell size">{{ $size }}</td>
                    <td class="table-cell action">
                        <a href="{{ asset('assets/frontend/nizomlar/' . $file) }}" target="_blank" class="btn btn-download">{{ __('frontend.common.download') }}</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-documents">{{ __('frontend.regulations.no_documents') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
