@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" style="padding-bottom:0px;" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header"
                        style="text-align: center; margin: 40px 0; padding: 30px 20px; background: #ffffff; border: 1px solid #ddd;">
                        <h1
                            style="color: #2c3e50; font-size: 24px; font-weight: 600; margin-bottom: 8px; font-family: 'Times New Roman', serif;">
Устав                        </h1>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container" style="margin: 0 auto; max-width: 1000px; background: #ffffff;">
                        <table class="documents-table"
                            style="width: 100%; border-collapse: collapse; border: 2px solid #34495e; font-family: Arial, sans-serif;">
                            <thead>
                                <tr style="background-color: #34495e;">
                                    <th
                                        style="padding: 15px 20px; text-align: left; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px;">
                                        №
                                    </th>
                                    <th
                                        style="padding: 15px 20px; text-align: left; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Название документа
                                    </th>
                                    <th
                                        style="padding: 15px 20px; text-align: center; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px; width: 100px;">
                                        Размер
                                    </th>
                                    <th
                                        style="padding: 15px 20px; text-align: center; font-weight: 600; font-size: 14px; color: #ffffff; text-transform: uppercase; letter-spacing: 0.5px; width: 120px;">
                                        Действия
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Papka yo'li
                                    $folderPath = public_path('assets/ustav');
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
                                        // Numbered documents
                                        'Устав_TIC_2024.pdf' => 'Устав 2024',
                                        'Устав_TIC_2025.pdf' => 'Устав 2025',

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

                                        <tr
                                            style="border-bottom: 1px solid #bdc3c7; @if ($index % 2 == 0) background-color: #f8f9fa; @else background-color: #ffffff; @endif">
                                            <td
                                                style="padding: 12px 20px; font-size: 13px; color: #2c3e50; border-right: 1px solid #bdc3c7; text-align: center; font-weight: 600;">
                                                {{ $index + 1 }}
                                            </td>
                                            <td
                                                style="padding: 12px 20px; font-size: 13px; color: #2c3e50; border-right: 1px solid #bdc3c7; line-height: 1.4;">
                                                <div style="font-weight: 600; margin-bottom: 3px;">{{ $displayName }}</div>
                                                <div style="font-size: 11px; color: #7f8c8d; font-style: italic;">
                                                    {{ $file }}</div>
                                            </td>
                                            <td
                                                style="padding: 12px 20px; text-align: center; font-size: 12px; color: #7f8c8d; border-right: 1px solid #bdc3c7;">
                                                {{ formatFileSize($fileSize) }}
                                            </td>
                                            <td style="padding: 12px 20px; text-align: center;">
                                                <div
                                                    style="display: flex; flex-direction: column; gap: 4px; align-items: center;">
                                                    {{-- FIXED: Changed the path to match the actual file location --}}
                                                    <a href="{{ asset('assets/ustav/' . $file) }}"
                                                        target="_blank"
                                                        style="display: inline-block; padding: 6px 12px; background-color: #34495e; color: #ffffff; text-decoration: none; border: 1px solid #2c3e50; font-size: 11px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.3px; transition: background-color 0.2s;"
                                                        onmouseover="this.style.backgroundColor='#2c3e50'"
                                                        onmouseout="this.style.backgroundColor='#34495e'">
                                                        ОТКРЫТЬ
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4"
                                            style="padding: 40px 20px; text-align: center; color: #7f8c8d; font-size: 14px; background-color: #f8f9fa;">
                                           <div style="font-weight: 600; margin-bottom: 5px;">ДОКУМЕНТЫ НЕ НАЙДЕНЫ</div>
                                            <div style="font-size: 12px;">В этом разделе пока нет ни одного документа.</div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Statistika -->
                    <div class="stats-section"
                        style="margin-top: 30px; padding: 20px; background: #f8f9fa; border: 1px solid #ddd;">
                        <div
                            style="display: flex; justify-content: space-around; align-items: center; max-width: 600px; margin: 0 auto; flex-wrap: wrap; gap: 20px;">
                            <div style="text-align: center; padding: 15px;">
                                <div style="font-size: 24px; font-weight: 700; color: #2c3e50; margin-bottom: 5px;">
                                    {{ count($files) }}</div>
                                <div
                                    style="font-size: 12px; color: #7f8c8d; text-transform: uppercase; letter-spacing: 0.5px;">
                                    ВСЕГО ДОКУМЕНТОВ</div>
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

                            <div style="width: 1px; height: 40px; background-color: #bdc3c7;"></div>

                            <div style="text-align: center; padding: 15px;">
                                <div style="font-size: 24px; font-weight: 700; color: #2c3e50; margin-bottom: 5px;">
                                    {{ formatFileSize($totalSize) }}</div>
                                <div
                                    style="font-size: 12px; color: #7f8c8d; text-transform: uppercase; letter-spacing: 0.5px;">
                                    ОБЩИЙ РАЗМЕР</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ma'lumot -->
                    <div class="info-section"
                        style="margin-top: 30px; padding: 20px; background: #ffffff; border: 1px solid #ddd; text-align: center;">
                        <p style="color: #7f8c8d; font-size: 12px; margin: 0; line-height: 1.5;">
                               В этом разделе размещены внутренние регламенты, положения и другие официальные документы общества.<br>
                                Документы представлены в формате PDF и доступны для скачивания.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- CSS -->
    <style>
        .documents-table {
            font-family: Arial, sans-serif;
        }

        .documents-table a {
            text-decoration: none;
        }

        .documents-table a:hover {
            text-decoration: none;
        }

        .page-header h1 {
            margin: 0;
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

            .page-header h1 {
                font-size: 20px;
            }

            .documents-container {
                margin: 0 10px;
            }

            .stats-section div {
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
