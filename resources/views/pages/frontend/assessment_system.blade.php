@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header">
                        <h1 class="page-title">
                            {{ __('frontend.governance_assessment.title') }}
                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container">
                        <table class="documents-table">
                            <thead>
                                <tr>
                                    <th class="table-header-cell number">
                                        {{ __('frontend.governance_assessment.number') }}
                                    </th>
                                    <th class="table-header-cell name">
                                        {{ __('frontend.governance_assessment.document_name') }}
                                    </th>
                                    <th class="table-header-cell size">
                                        {{ __('frontend.governance_assessment.size') }}
                                    </th>
                                    <th class="table-header-cell actions">
                                        {{ __('frontend.governance_assessment.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Papka yo'li
                                    $folderPath = public_path('assets/frontend/korparativ_boshqaruv_tizimlarini_baholash');
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

                                    $fileNames = [
                                        '2024-1-3.pdf' => 'Оценка систем корпоративного управления 2024',
                                        '2025-1kv-1-3.pdf' => 'Оценка систем корпоративного управления 2025 (1 квартал)',
                                        '2025-2kv-1-3.pdf' => 'Оценка систем корпоративного управления 2025 (2 квартал)',
                                    ];

                                    // Fayl hajmini formatlash funksiyasi
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
                                @endphp

                                @if (count($files) > 0)
                                    @foreach ($files as $index => $file)
                                        @php
                                            $filePath = $folderPath . '/' . $file;
                                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                            $displayName = isset($fileNames[$file])
                                                ? $fileNames[$file]
                                                : pathinfo($file, PATHINFO_FILENAME);
                                        @endphp

                                        <tr class="table-row @if ($index % 2 == 0) even @else odd @endif">
                                            <td class="table-cell number">
                                                {{ $index + 1 }}
                                            </td>
                                            <td class="table-cell name">
                                                <div class="document-name">{{ $displayName }}</div>
                                                <div class="file-name">
                                                    {{ $file }}</div>
                                            </td>
                                            <td class="table-cell size">
                                                {{ formatFileSize($fileSize) }}
                                            </td>
                                            <td class="table-cell actions">
                                                <div class="action-buttons">
                                                    <a href="{{ asset('assets/frontend/korparativ_boshqaruv_tizimlarini_baholash/' . $file) }}"
                                                        target="_blank"
                                                        class="btn btn-open">
                                                        {{ __('frontend.common.open') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="no-documents">
                                           <div class="no-documents-title">{{ __('frontend.governance_assessment.no_documents_title') }}</div>
                                            <div class="no-documents-message">{{ __('frontend.governance_assessment.no_documents_message') }}</div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Statistika -->
                    <div class="stats-section">
                        <div class="stats-container">
                            <div class="stat-item">
                                <div class="stat-value">
                                    {{ count($files) }}</div>
                                <div class="stat-label">
                                    {{ __('frontend.governance_assessment.total_documents') }}</div>
                            </div>

                            @php
                                $totalSize = 0;
                                foreach ($files as $file) {
                                    $filePath = $folderPath . '/' . $file;
                                    if (file_exists($filePath)) {
                                        $totalSize += filesize($filePath);
                                    }
                                }
                            @endphp

                            <div class="stat-divider"></div>

                            <div class="stat-item">
                                <div class="stat-value">
                                    {{ formatFileSize($totalSize) }}</div>
                                <div class="stat-label">
                                    {{ __('frontend.documents.total_size') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ma'lumot -->
                    <div class="info-section">
                        <p class="info-text">
                            {{ __('frontend.governance_assessment.info_text') }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        /* Page Header */
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
            font-family: 'Times New Roman', serif;
        }

        /* Documents Container */
        .documents-container {
            margin: 0 auto;
            max-width: 1000px;
            background: #ffffff;
        }

        /* Documents Table */
        .documents-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #34495e;
            font-family: Arial, sans-serif;
        }

        .documents-table a {
            text-decoration: none;
        }

        .documents-table a:hover {
            text-decoration: none;
        }

        /* Table Header */
        .table-header-cell {
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            color: #ffffff;
            border-right: 1px solid #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            background-color: #34495e;
        }

        .table-header-cell.number {
            text-align: left;
        }

        .table-header-cell.name {
            text-align: left;
        }

        .table-header-cell.size {
            text-align: center;
            width: 100px;
        }

        .table-header-cell.actions {
            text-align: center;
            width: 120px;
            border-right: none;
        }

        /* Table Rows */
        .table-row {
            border-bottom: 1px solid #bdc3c7;
        }

        .table-row.even {
            background-color: #f8f9fa;
        }

        .table-row.odd {
            background-color: #ffffff;
        }

        /* Table Cells */
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

        .table-cell.name {
            line-height: 1.4;
        }

        .table-cell.size {
            text-align: center;
            font-size: 12px;
            color: #7f8c8d;
        }

        .table-cell.actions {
            text-align: center;
            border-right: none;
        }

        /* Document Names */
        .document-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .file-name {
            font-size: 11px;
            color: #7f8c8d;
            font-style: italic;
        }

        /* Action Buttons */
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
            border: 1px solid #2c3e50;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: background-color 0.2s;
        }

        .btn-open {
            background-color: #34495e;
            color: #ffffff;
        }

        .btn-open:hover {
            background-color: #2c3e50;
        }

        /* No Documents */
        .no-documents {
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

        /* Stats Section */
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

        .stat-item {
            text-align: center;
            padding: 15px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #7f8c8d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-divider {
            width: 1px;
            height: 40px;
            background-color: #bdc3c7;
        }

        /* Info Section */
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

            .documents-table a {
                padding: 4px 8px !important;
                font-size: 10px !important;
            }

            .page-title {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }

            .stats-container {
                flex-direction: column;
            }

            .signature-section {
                text-align: center;
            }

            .signature-section>div {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .documents-table th:first-child,
            .documents-table td:first-child {
                display: none;
            }

            .documents-table th:nth-child(3),
            .documents-table td:nth-child(3) {
                display: none;
            }
        }
    </style>
@endsection
