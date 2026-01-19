<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProcurementDocumentsPaths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update Qorasaroy document file paths to match actual files
        \DB::table('procurement_documents')
            ->where('procurement_notice_id', function($query) {
                $query->select('id')->from('procurement_notices')->where('slug', 'qorasaroy-tunnel-project');
            })
            ->delete();

        // Re-insert with correct file names
        $qorasaroyId = \DB::table('procurement_notices')->where('slug', 'qorasaroy-tunnel-project')->value('id');

        $qorasaroyDocs = [
            ['name_uz' => "E'lon (O'zbekcha)", 'name_ru' => 'Объявление (Узбекский)', 'name_en' => 'Announcement (Uzbek)', 'file' => 'Эълон _(ЎЗБ).pdf', 'order' => 1],
            ['name_uz' => "E'lon (Ruscha)", 'name_ru' => 'Объявление (Русский)', 'name_en' => 'Announcement (Russian)', 'file' => 'Эълон _(РУС).pdf', 'order' => 2],
            ['name_uz' => "Ariza (O'zbekcha)", 'name_ru' => 'Заявка (Узбекский)', 'name_en' => 'Application (Uzbek)', 'file' => 'Ариза _(ЎЗБ).pdf', 'order' => 3],
            ['name_uz' => "Ariza (Ruscha)", 'name_ru' => 'Заявка (Русский)', 'name_en' => 'Application (Russian)', 'file' => 'Ариза _(РУС).pdf', 'order' => 4],
            ['name_uz' => "Texnik hujjat (O'zbekcha)", 'name_ru' => 'Технический документ (Узбекский)', 'name_en' => 'Technical Document (Uzbek)', 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf', 'order' => 5],
            ['name_uz' => "Texnik hujjat (Ruscha)", 'name_ru' => 'Технический документ (Русский)', 'name_en' => 'Technical Document (Russian)', 'file' => 'Тех_Хужжат_экс_шота_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf', 'order' => 6],
            ['name_uz' => "Texnik topshiriq (O'zbekcha)", 'name_ru' => 'Техническое задание (Узбекский)', 'name_en' => 'Technical Assignment (Uzbek)', 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_ЎЗБ.pdf', 'order' => 7],
            ['name_uz' => "Texnik topshiriq (Ruscha)", 'name_ru' => 'Техническое задание (Русский)', 'name_en' => 'Technical Assignment (Russian)', 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_Ислом_Цивилизацияси_маркази_Туннел_РУС.pdf', 'order' => 8],
            ['name_uz' => 'Shartnoma shakli', 'name_ru' => 'Форма контракта', 'name_en' => 'Contract Form', 'file' => 'шартнома шакли12.pdf', 'order' => 9],
        ];

        foreach ($qorasaroyDocs as $docData) {
            $filePath = public_path('assets/eng_yaxshi_takliflarni_tanlab_olish/Qorasaroy/' . $docData['file']);
            $fileSize = \File::exists($filePath) ? \File::size($filePath) : null;

            \DB::table('procurement_documents')->insert([
                'procurement_notice_id' => $qorasaroyId,
                'name_uz' => $docData['name_uz'],
                'name_ru' => $docData['name_ru'],
                'name_en' => $docData['name_en'],
                'file_path' => $docData['file'],
                'file_type' => 'pdf',
                'file_size' => $fileSize,
                'order' => $docData['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Delete the updated documents for Qorasaroy
        \DB::table('procurement_documents')
            ->where('procurement_notice_id', function($query) {
                $query->select('id')->from('procurement_notices')->where('slug', 'qorasaroy-tunnel-project');
            })
            ->delete();
    }
}
