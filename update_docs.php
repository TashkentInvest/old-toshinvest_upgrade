<?php

require 'vendor/autoload.php';

































echo "✓ Done! " . $qorasaroy->documents()->count() . " documents added.\n";}    ]);        'order' => $d['order'],        'file_type' => 'pdf',        'file_path' => $d['file'],        'name_en' => $d['uz'],        'name_ru' => $d['ru'],        'name_uz' => $d['uz'],        'procurement_notice_id' => $qorasaroy->id,    ProcurementDocument::create([foreach ($docs as $d) {];    ['uz' => 'Shartnoma shakli', 'ru' => 'Форма контракта', 'file' => 'шартнома шакли12.pdf', 'order' => 9],    ['uz' => "Texnik topshiriq (Ruscha)", 'ru' => 'Техническое задание (Русский)', 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf', 'order' => 8],    ['uz' => "Texnik topshiriq (O'zbekcha)", 'ru' => 'Техническое задание (Узбекский)', 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf', 'order' => 7],    ['uz' => "Texnik hujjat (Ruscha)", 'ru' => 'Технический документ (Русский)', 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf', 'order' => 6],    ['uz' => "Texnik hujjat (O'zbekcha)", 'ru' => 'Технический документ (Узбекский)', 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf', 'order' => 5],    ['uz' => "Ariza (Ruscha)", 'ru' => 'Заявка (Русский)', 'file' => 'Ариза _(РУС).pdf', 'order' => 4],    ['uz' => "Ariza (O'zbekcha)", 'ru' => 'Заявка (Узбекский)', 'file' => 'Ариза _(ЎЗБ).pdf', 'order' => 3],    ['uz' => "E'lon (Ruscha)", 'ru' => 'Объявление (Русский)', 'file' => 'Эълон _(РУС).pdf', 'order' => 2],    ['uz' => "E'lon (O'zbekcha)", 'ru' => 'Объявление (Узбекский)', 'file' => 'Эълон _(ЎЗБ).pdf', 'order' => 1],$docs = [$qorasaroy = ProcurementNotice::where('slug', 'qorasaroy-tunnel-project')->first();use App\Models\ProcurementDocument;use App\Models\ProcurementNotice;$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();$app = require 'bootstrap/app.php';
