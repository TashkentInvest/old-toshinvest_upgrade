@extends('layouts.frontend_app')

@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" style="padding-bottom:0px;" data-animationappear="off" data-record-type="131">
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">

                    <!-- Page Title -->
                    <div class="page-header"
                         style="text-align: center; margin: 40px 0; padding: 30px 20px; background: #ffffff; border: 1px solid #ddd;">
                        <h1 style="color: #2c3e50; font-size: 24px; font-weight: 600; margin-bottom: 8px; font-family: 'Times New Roman', serif;">
                            Закупки
                        </h1>
                    </div>

                    @php
                        // Files list with display names
                        $documents = [
                            'план закупок на 2025 год.pdf' => 'план закупок на 2025 год',
                            'план закупок на 2026 год.pdf' => 'план закупок на 2026 год',
                        ];

                        // File folder
                        $folder = public_path('assets/xarid_uchun');

                        // Size formatter
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

                    <!-- Document List -->
                    <div class="documents-container" style="max-width: 800px; margin: 0 auto; padding: 20px;">
                        @foreach ($documents as $fileName => $displayName)
                            @php
                                $filePath = $folder . '/' . $fileName;
                                $fileSize = file_exists($filePath) ? formatFileSize(filesize($filePath)) : 'Файл не найден';
                            @endphp
                            <div style="margin-bottom: 25px; padding: 15px; background: #f9f9f9; border: 1px solid #ccc;">
                                <p style="margin: 0 0 10px; font-weight: bold; font-size: 16px; color: #2c3e50;">
                                    📄 {{ $displayName }}
                                </p>
                                <p style="margin: 0 0 10px; font-size: 13px; color: #7f8c8d;">
                                    Размер файла: {{ $fileSize }}
                                </p>
                                @if (file_exists($filePath))
                                    <a href="{{ asset('assets/xarid_uchun/' . $fileName) }}?v=1.0" download
                                       style="display: inline-block; padding: 8px 16px; background: #34495e; color: #fff; text-decoration: none; font-size: 12px; text-transform: uppercase; border-radius: 4px;">
                                        Скачать
                                    </a>
                                @else
                                    <span style="color: red; font-size: 13px;">Файл недоступен</span>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Info -->
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
@endsection
