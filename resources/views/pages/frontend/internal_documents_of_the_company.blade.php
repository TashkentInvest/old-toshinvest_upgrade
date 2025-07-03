@extends('layouts.frontend_app')
@section('frontent_content')
    <div id="rec748127900" class="r t-rec t-rec_pb_210" style="padding-bottom:0px;" data-animationappear="off"
        data-record-type="131">
        <!-- T123 -->
        <div class="t123">
            <div class="t-container_100">
                <div class="t-width t-width_100">
                    
                    <!-- Sahifa sarlavhasi -->
                    <div class="page-header" style="text-align: center; margin: 40px 0; padding: 30px 20px; background: #ffffff; border: 1px solid #ddd;">
                        <h1 style="color: #2c3e50; font-size: 24px; font-weight: 600; margin-bottom: 8px; font-family: 'Times New Roman', serif;">
                            JAMIYAT ICHKI HUJJATLARI
                        </h1>
                        <p style="color: #7f8c8d; font-size: 14px; margin: 0; font-family: Arial, sans-serif;">
                            "Toshkent investitsiya kompaniyasi" aksiyadorlik jamiyati
                        </p>
                    </div>

                    <!-- Hujjatlar jadvali -->
                    <div class="documents-container" style="margin: 0 auto; max-width: 1000px; background: #ffffff;">
                        <table class="documents-table" style="width: 100%; border-collapse: collapse; border: 2px solid #34495e; font-family: Arial, sans-serif;">
                            <thead>
                                <tr style="background-color: #34495e;">
                                    <th style="padding: 15px 20px; text-align: left; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px;">
                                        № 
                                    </th>
                                    <th style="padding: 15px 20px; text-align: left; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px;">
                                        Hujjat nomi
                                    </th>
                                    <th style="padding: 15px 20px; text-align: center; font-weight: 600; font-size: 14px; color: #ffffff; border-right: 1px solid #2c3e50; text-transform: uppercase; letter-spacing: 0.5px; width: 100px;">
                                        Hajmi
                                    </th>
                                    <th style="padding: 15px 20px; text-align: center; font-weight: 600; font-size: 14px; color: #ffffff; text-transform: uppercase; letter-spacing: 0.5px; width: 120px;">
                                        Amallar
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Papka yo'li
                                    $folderPath = public_path('assets/jamiyat_ichki_xujjatlari');
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
                                    
                                    // Fayl nomlarini o'zbekcha nomlarga o'tkazish
                                    $fileNames = [
                                        'анкета_карточка_юр.лица_АО_КТИ_и_Хокимията_г.Ташкента.pdf' => 'Anketа-kartochka yuridik shaxsning',
                                        'внтр_аудит.pdf' => 'Ichki auditor to\'g\'risidagi nizom',
                                        'дивидендной_политике.pdf' => 'Dividend siyosati to\'g\'risidagi nizom',
                                        'комитет_по_стратегии_и_инвестициям.pdf' => 'Strategiya va investitsiyalar bo\'yicha qo\'mita',
                                        'о_внутреннем_контроле.pdf' => 'Ichki nazorat to\'g\'risidagi nizom',
                                        'о_командировках_сотрудников.pdf' => 'Xodimlar komandirovkalari to\'g\'risida',
                                        'о_комитете_по_аудиту_НС.pdf' => 'Audit bo\'yicha qo\'mita',
                                        'о_корпаративном_консультанте.pdf' => 'Korporativ maslahatchi to\'g\'risida',
                                    ];
                                    
                                    // Fayl hajmini formatlash funksiyasi
                                    function formatFileSize($size) {
                                        if ($size >= 1048576) {
                                            return number_format($size / 1048576, 1) . ' MB';
                                        } elseif ($size >= 1024) {
                                            return number_format($size / 1024, 1) . ' KB';
                                        } else {
                                            return $size . ' B';
                                        }
                                    }
                                @endphp

                                @if(count($files) > 0)
                                    @foreach($files as $index => $file)
                                        @php
                                            $filePath = $folderPath . '/' . $file;
                                            $fileSize = file_exists($filePath) ? filesize($filePath) : 0;
                                            $displayName = isset($fileNames[$file]) ? $fileNames[$file] : pathinfo($file, PATHINFO_FILENAME);
                                        @endphp
                                        
                                        <tr style="border-bottom: 1px solid #bdc3c7; @if($index % 2 == 0) background-color: #f8f9fa; @else background-color: #ffffff; @endif">
                                            <td style="padding: 12px 20px; font-size: 13px; color: #2c3e50; border-right: 1px solid #bdc3c7; text-align: center; font-weight: 600;">
                                                {{ $index + 1 }}
                                            </td>
                                            <td style="padding: 12px 20px; font-size: 13px; color: #2c3e50; border-right: 1px solid #bdc3c7; line-height: 1.4;">
                                                <div style="font-weight: 600; margin-bottom: 3px;">{{ $displayName }}</div>
                                                <div style="font-size: 11px; color: #7f8c8d; font-style: italic;">{{ $file }}</div>
                                            </td>
                                            <td style="padding: 12px 20px; text-align: center; font-size: 12px; color: #7f8c8d; border-right: 1px solid #bdc3c7;">
                                                {{ formatFileSize($fileSize) }}
                                            </td>
                                            <td style="padding: 12px 20px; text-align: center;">
                                                <div style="display: flex; flex-direction: column; gap: 4px; align-items: center;">
                                                    <a href="{{ asset('assets/jamiyat_ichki_xujjatlari/' . $file) }}" 
                                                       target="_blank" 
                                                       style="display: inline-block; padding: 6px 12px; background-color: #34495e; color: #ffffff; text-decoration: none; border: 1px solid #2c3e50; font-size: 11px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.3px; transition: background-color 0.2s;"
                                                       onmouseover="this.style.backgroundColor='#2c3e50'"
                                                       onmouseout="this.style.backgroundColor='#34495e'">
                                                        YUKLAB OLISH
                                                    </a>
                                                    
                                                    @if(strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'pdf')
                                                        <a href="{{ asset('assets/jamiyat_ichki_xujjatlari/' . $file) }}" 
                                                           target="_blank" 
                                                           style="display: inline-block; padding: 6px 12px; background-color: #ffffff; color: #34495e; text-decoration: none; border: 1px solid #34495e; font-size: 11px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.3px; transition: all 0.2s;"
                                                           onmouseover="this.style.backgroundColor='#ecf0f1'; this.style.color='#2c3e50'"
                                                           onmouseout="this.style.backgroundColor='#ffffff'; this.style.color='#34495e'">
                                                            KO'RISH
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="padding: 40px 20px; text-align: center; color: #7f8c8d; font-size: 14px; background-color: #f8f9fa;">
                                            <div style="font-weight: 600; margin-bottom: 5px;">HUJJATLAR TOPILMADI</div>
                                            <div style="font-size: 12px;">Ushbu bo'limda hech qanday hujjat mavjud emas</div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Statistika -->
                    <div class="stats-section" style="margin-top: 30px; padding: 20px; background: #f8f9fa; border: 1px solid #ddd;">
                        <div style="display: flex; justify-content: space-around; align-items: center; max-width: 600px; margin: 0 auto; flex-wrap: wrap; gap: 20px;">
                            <div style="text-align: center; padding: 15px;">
                                <div style="font-size: 24px; font-weight: 700; color: #2c3e50; margin-bottom: 5px;">{{ count($files) }}</div>
                                <div style="font-size: 12px; color: #7f8c8d; text-transform: uppercase; letter-spacing: 0.5px;">JAMI HUJJATLAR</div>
                            </div>
                            
                            @php
                                $totalSize = 0;
                                foreach($files as $file) {
                                    $filePath = $folderPath . '/' . $file;
                                    if (file_exists($filePath)) {
                                        $totalSize += filesize($filePath);
                                    }
                                }
                            @endphp
                            
                            <div style="width: 1px; height: 40px; background-color: #bdc3c7;"></div>
                            
                            <div style="text-align: center; padding: 15px;">
                                <div style="font-size: 24px; font-weight: 700; color: #2c3e50; margin-bottom: 5px;">{{ formatFileSize($totalSize) }}</div>
                                <div style="font-size: 12px; color: #7f8c8d; text-transform: uppercase; letter-spacing: 0.5px;">JAMI HAJMI</div>
                            </div>
                        </div>
                    </div>

                    <!-- Ma'lumot -->
                    <div class="info-section" style="margin-top: 30px; padding: 20px; background: #ffffff; border: 1px solid #ddd; text-align: center;">
                        <p style="color: #7f8c8d; font-size: 12px; margin: 0; line-height: 1.5;">
                            Ushbu bo'limda jamiyatning ichki tartib-qoidalari, nizomlar va boshqa rasmiy hujjatlar joylashtirilgan.<br>
                            Hujjatlar PDF formatida taqdim etilgan va yuklab olish imkoniyati mavjud.
                        </p>
                    </div>

                    <!-- Imzo qismi -->
                    <div class="signature-section" style="margin-top: 40px; padding: 20px; background: #ffffff; border: 1px solid #ddd;">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                            <div style="text-align: left;">
                                <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;">Sayt yangilangan:</div>
                                <div style="font-size: 13px; color: #2c3e50; font-weight: 600;">{{ date('d.m.Y H:i') }}</div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 12px; color: #7f8c8d; margin-bottom: 5px;">Jami hujjatlar:</div>
                                <div style="font-size: 13px; color: #2c3e50; font-weight: 600;">{{ count($files) }} ta fayl</div>
                            </div>
                        </div>
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
            
            .signature-section > div {
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