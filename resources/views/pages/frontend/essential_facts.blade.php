@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" style="padding-bottom:0px;" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header">
                        <h1 class="page-title">
                            {{ __('frontend.essential_facts.title') }}
                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container">
                        <table class="documents-table">
                            <thead>
                                <tr class="table-header">
                                    <th class="table-header-cell number">
                                        {{ __('frontend.essential_facts.number') }}
                                    </th>
                                    <th class="table-header-cell document-name">
                                        {{ __('frontend.essential_facts.document_name') }}
                                    </th>
                                    <th class="table-header-cell size">
                                        {{ __('frontend.essential_facts.size') }}
                                    </th>
                                    <th class="table-header-cell actions">
                                        {{ __('frontend.essential_facts.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Papka yo'li
                                    $folderPath = public_path('assets/frontend/muhim_faktlar');
                                    $files = [];

                                    // Fayllarni olish
                                    if (is_dir($folderPath)) {
                                        $allFiles = scandir($folderPath);
                                        foreach ($allFiles as $file) {
                                            if ($file !== '.' && $file !== '..' && is_file($folderPath . '/' . $file)) {
                                                $files[] = $file;
                                            }
                                        }
                                    }

                                    // Fayllarni alifbo tartibida saralash
                                    sort($files);

                                    // Fayllarni raqamlar bo'yicha guruhlash
                                    $groupedFiles = [];
                                    foreach ($files as $file) {
                                        // Extract number from filename (06, 08, 11, 12, 20, 21, 36)
                                        if (preg_match('/(\d{2})/', $file, $matches)) {
                                            $number = $matches[1];
                                            if (!isset($groupedFiles[$number])) {
                                                $groupedFiles[$number] = [];
                                            }
                                            $groupedFiles[$number][] = $file;
                                        }
                                    }

                                    // Raqamlarni tartibga solish
                                    ksort($groupedFiles);

                                    // Fayl hajmini formatlash funksiyasi
                                    function formatFileSize($size)
                                    {
                                        if ($size >= 1048576) {
                                            return number_format($size / 1048576, 1, ',', ' ') . ' ' . __('frontend.essential_facts.mb');
                                        } elseif ($size >= 1024) {
                                            return number_format($size / 1024, 1, ',', ' ') . ' ' . __('frontend.essential_facts.kb');
                                        } else {
                                            return $size . ' ' . __('frontend.essential_facts.b');
                                        }
                                    }
                                @endphp

                                @if (count($groupedFiles) > 0)
                                    @foreach ($groupedFiles as $number => $fileGroup)
                                        @php
                                            $firstFile = $fileGroup[0];
                                            $filePath = $folderPath . '/' . $firstFile;
                                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                            $fileCount = count($fileGroup);
                                            $displayName = __('frontend.essential_facts.fact_title') . ' ' . $number;
                                        @endphp

                                        <tr class="table-row @if ($loop->index % 2 == 0) even @else odd @endif">
                                            <td class="table-cell number">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="table-cell document-name">
                                                <div class="document-title">{{ $displayName }}</div>
                                                <div class="document-count">
                                                    {{ $fileCount }} {{ $fileCount > 1 ? __('frontend.essential_facts.documents_plural') : __('frontend.essential_facts.documents_singular') }}</div>
                                            </td>
                                            <td class="table-cell size">
                                                @php
                                                    $totalSize = 0;
                                                    foreach ($fileGroup as $f) {
                                                        $fp = $folderPath . '/' . $f;
                                                        if (file_exists($fp)) {
                                                            $totalSize += filesize($fp);
                                                        }
                                                    }
                                                @endphp
                                                {{ formatFileSize($totalSize) }}
                                            </td>
                                            <td class="table-cell actions">
                                                <div class="action-buttons">
                                                    <a href="{{ route('frontend.essential_facts.show', $number) }}" class="btn btn-primary">
                                                        {{ __('frontend.essential_facts.open') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="no-documents">
                                        <td colspan="4" class="no-documents-cell">
                                           <div class="no-documents-title">{{ __('frontend.essential_facts.no_documents_title') }}</div>
                                            <div class="no-documents-message">{{ __('frontend.essential_facts.no_documents_message') }}</div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Statistika -->
                    <div class="stats-section">
                        <div class="stats-container">
                            <div class="stats-item">
                                <div class="stats-value">
                                    {{ count($groupedFiles) }}</div>
                                <div class="stats-label">
                                    {{ __('frontend.essential_facts.categories_count') }}</div>
                            </div>

                            @php
                                $totalSize = 0;
                                $totalFiles = 0;
                                foreach ($groupedFiles as $fileGroup) {
                                    foreach ($fileGroup as $file) {
                                        $filePath = $folderPath . '/' . $file;
                                        if (file_exists($filePath)) {
                                            $totalSize += filesize($filePath);
                                            $totalFiles++;
                                        }
                                    }
                                }
                            @endphp

                            <div class="stats-divider"></div>

                            <div class="stats-item">
                                <div class="stats-value">
                                    {{ formatFileSize($totalSize) }}</div>
                                <div class="stats-label">
                                    {{ __('frontend.essential_facts.total_size') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ma'lumot -->
                    <div class="info-section">
                        <p class="info-text">
                               {{ __('frontend.essential_facts.info_text') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .page-header {
            text-align: center;
            margin: 40px 0;
            padding: 30px 20px;
            background: #ffffff;
            border: 1px solid #ddd;
        }

        .page-title {
            color: #2c3e50;
            font-size: 24px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 8px;
            font-family: 'Times New Roman', serif;
        }

        .documents-container {
            margin: 0 auto;
            max-width: 1000px;
            background: #ffffff;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #34495e;
            font-family: Arial, sans-serif;
        }

        .table-header {
            background-color: #34495e;
        }

        .table-header-cell {
            padding: 15px 20px;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            border-right: 1px solid #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-header-cell.number {
            text-align: left;
        }

        .table-header-cell.document-name {
            text-align: left;
        }

        .table-header-cell.size {
            text-align: center;
            width: 100px;
        }

        .table-header-cell.actions {
            text-align: center;
            width: 120px;
        }

        .table-row {
            border-bottom: 1px solid #bdc3c7;
        }

        .table-row.even {
            background-color: #f8f9fa;
        }

        .table-row.odd {
            background-color: #ffffff;
        }

        .table-cell {
            padding: 12px 20px;
            font-size: 13px;
            color: #2c3e50;
            border-right: 1px solid #bdc3c7;
        }

        .table-cell.number {
            text-align: center;
            font-weight: 600;
        }

        .table-cell.document-name {
            line-height: 1.4;
        }

        .table-cell.size {
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
        }

        .table-cell.actions {
            text-align: center;
        }

        .document-title {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .document-count {
            font-size: 11px;
            color: #7f8c8d;
            font-style: italic;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 4px;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 6px 12px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: background-color 0.2s;
            border: 1px solid;
        }

        .btn-primary {
            background-color: #34495e;
            color: #ffffff;
            border-color: #2c3e50;
        }

        .btn-primary:hover {
            background-color: #2c3e50;
        }

        .no-documents {
            /* Inherits styles from table-row */
        }

        .no-documents-cell {
            padding: 40px 20px;
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            background-color: #f8f9fa;
        }

        .no-documents-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .no-documents-message {
            font-size: 12px;
        }

        .stats-section {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border: 1px solid #ddd;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
            flex-wrap: wrap;
            gap: 20px;
        }

        .stats-item {
            text-align: center;
            padding: 15px;
        }

        .stats-value {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stats-label {
            font-size: 12px;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stats-divider {
            width: 1px;
            height: 40px;
            background-color: #bdc3c7;
        }

        .info-section {
            margin-top: 30px;
            padding: 20px;
            background: #ffffff;
            border: 1px solid #ddd;
            text-align: center;
        }

        .info-text {
            color: #7f8c8d;
            font-size: 12px;
            margin: 0;
            line-height: 1.5;
        }

        @media print {
            .documents-table {
                border: 1px solid #000;
            }

            .documents-table th,
            .documents-table td {
                border: 1px solid #000;
                padding: 8px;
            }

            .documents-table a {
                color: #000;
                text-decoration: underline;
            }
        }

        @media (max-width: 768px) {
            .documents-table {
                font-size: 11px;
            }

            .documents-table th,
            .documents-table td {
                padding: 8px 12px;
            }

            .btn {
                padding: 4px 8px !important;
                font-size: 10px !important;
            }

            .page-title {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }

            .stats-container div {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .table-header-cell:first-child,
            .table-cell:first-child {
                display: none;
            }

            .table-header-cell.size,
            .table-cell.size {
                display: none;
            }
        }
    </style>
@endsection
