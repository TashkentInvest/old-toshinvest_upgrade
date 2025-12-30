<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProcurementNotice;
use App\Models\ProcurementDocument;
use Illuminate\Support\Facades\File;

class ProcurementNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Procurement 1: New BRT Project
        $newBrt = ProcurementNotice::create([
            'slug' => 'new-brt-project',
            'title_uz' => "Toshkent shahri ko'chalarida avtobuslar uchun alohida ajratilgan yo'laklarni tashkil etish maqsadida avtomobil yo'llari va yo'l bo'yi infratuzilmasini loyihalash, rekonstruksiya qilish va ta'mirlash bo'yicha bosh pudratchi va loyihachi xizmatlari (EPC+F shartlarida)",
            'title_ru' => 'Услуги генерального подрядчика и проектировщика по проектированию, реконструкции и ремонту автомобильных дорог и придорожной инфраструктуры на улицах города Ташкента (на условиях EPC+F), с целью организации отдельных выделенных полос для автобусов',
            'title_en' => 'General contractor and designer services for the design, reconstruction and repair of roads and roadside infrastructure on the streets of Tashkent (on EPC+F terms), with the aim of organizing separate dedicated lanes for buses',

            'announcement_date_uz' => '25 dekabr 2025 yil',
            'announcement_date_ru' => '25 декабря 2025 года',
            'announcement_date_en' => 'December 25, 2025',

            'deadline_uz' => '5 yanvar 2026 yil, 18:00',
            'deadline_ru' => '5 января 2026 года, 18:00',
            'deadline_en' => 'January 5, 2026, 18:00',

            'status' => 'active',
            'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt',
            'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt/Эълон _new_brt (РУС).pdf',
            'order' => 1,
            'is_featured' => true,
        ]);

        // Add documents for New BRT project
        $newBrtDocs = [
            ['name_uz' => "E'lon (Ruscha)", 'name_ru' => 'Объявление (Русский)', 'name_en' => 'Announcement (Russian)', 'file' => 'Эълон _new_brt (РУС).pdf', 'order' => 1],
            ['name_uz' => "Ariza (Ruscha)", 'name_ru' => 'Заявка (Русский)', 'name_en' => 'Application (Russian)', 'file' => 'Ариза _new_brt(РУС).pdf', 'order' => 2],
            ['name_uz' => "Texnik hujjat (Ruscha)", 'name_ru' => 'Технический документ (Русский)', 'name_en' => 'Technical Document (Russian)', 'file' => 'Тех_Хужжат_new_brt_(РУС).pdf', 'order' => 3],
            ['name_uz' => "Texnik topshiriq", 'name_ru' => 'Техническое задание', 'name_en' => 'Technical Assignment', 'file' => 'ТЕХНИЧЕСКОЕ_ЗАДАНИЕ_new_brt.pdf', 'order' => 4],
            ['name_uz' => 'FIDIC kontrakt shablon', 'name_ru' => 'FIDIC шаблон контракта', 'name_en' => 'FIDIC Contract Template', 'file' => 'FIDIC контракт шаблон 22.10.2025 (3).pdf', 'order' => 5],
        ];

        foreach ($newBrtDocs as $docData) {
            $filePath = public_path($newBrt->folder . '/' . $docData['file']);
            $fileSize = File::exists($filePath) ? File::size($filePath) : null;

            ProcurementDocument::create([
                'procurement_notice_id' => $newBrt->id,
                'name_uz' => $docData['name_uz'],
                'name_ru' => $docData['name_ru'],
                'name_en' => $docData['name_en'],
                'file_path' => $docData['file'],
                'file_type' => 'pdf',
                'file_size' => $fileSize,
                'order' => $docData['order'],
            ]);
        }

        // Procurement 2: Qorasaroy Tunnel Project
        $qorasaroy = ProcurementNotice::create([
            'slug' => 'qorasaroy-tunnel-project',
            'title_uz' => "Islom sivilizatsiyasi markazi tunnel loyihasi bo'yicha ekspert hisobini tayyorlash xizmatlari",
            'title_ru' => 'Услуги по подготовке экспертной сметы по проекту туннеля Центра Исламской Цивилизации',
            'title_en' => 'Services for the preparation of expert estimates for the tunnel project of the Center of Islamic Civilization',

            'deadline_uz' => '6 yanvar 2026 yil, 18:00',
            'deadline_ru' => '6 января 2026 года, 18:00',
            'deadline_en' => 'January 6, 2026, 18:00',

            'status' => 'active',
            'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Qorasaroy',
            'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Qorasaroy/Эълон _(ЎЗБ).pdf',
            'order' => 2,
            'is_featured' => false,
        ]);

        // Add documents for Qorasaroy project
        $qorasaroyDocs = [
            ['name_uz' => "E'lon (O'zbekcha)", 'name_ru' => 'Объявление (Узбекский)', 'name_en' => 'Announcement (Uzbek)', 'file' => 'Эълон _(ЎЗБ).pdf', 'order' => 1],
            ['name_uz' => "E'lon (Ruscha)", 'name_ru' => 'Объявление (Русский)', 'name_en' => 'Announcement (Russian)', 'file' => 'Эълон _(РУС).pdf', 'order' => 2],
            ['name_uz' => "Ariza shakli (O'zbekcha)", 'name_ru' => 'Форма заявки (Узбекский)', 'name_en' => 'Application Form (Uzbek)', 'file' => 'Ариза шакли _(ЎЗБ).pdf', 'order' => 3],
            ['name_uz' => "Ariza shakli (Ruscha)", 'name_ru' => 'Форма заявки (Русский)', 'name_en' => 'Application Form (Russian)', 'file' => 'Ариза шакли _(РУС).pdf', 'order' => 4],
            ['name_uz' => "Texnik topshiriq (O'zbekcha)", 'name_ru' => 'Техническое задание (Узбекский)', 'name_en' => 'Technical Assignment (Uzbek)', 'file' => 'Техник топшириқ _(ЎЗБ).pdf', 'order' => 5],
            ['name_uz' => "Texnik topshiriq (Ruscha)", 'name_ru' => 'Техническое задание (Русский)', 'name_en' => 'Technical Assignment (Russian)', 'file' => 'Техническое задание _(РУС).pdf', 'order' => 6],
            ['name_uz' => "1-Ilova (O'zbekcha)", 'name_ru' => 'Приложение 1 (Узбекский)', 'name_en' => 'Appendix 1 (Uzbek)', 'file' => '1_илова _(ЎЗБ).pdf', 'order' => 7],
            ['name_uz' => "1-Ilova (Ruscha)", 'name_ru' => 'Приложение 1 (Русский)', 'name_en' => 'Appendix 1 (Russian)', 'file' => '1_Приложение _(РУС).pdf', 'order' => 8],
        ];

        foreach ($qorasaroyDocs as $docData) {
            $filePath = public_path($qorasaroy->folder . '/' . $docData['file']);
            $fileSize = File::exists($filePath) ? File::size($filePath) : null;

            ProcurementDocument::create([
                'procurement_notice_id' => $qorasaroy->id,
                'name_uz' => $docData['name_uz'],
                'name_ru' => $docData['name_ru'],
                'name_en' => $docData['name_en'],
                'file_path' => $docData['file'],
                'file_type' => 'pdf',
                'file_size' => $fileSize,
                'order' => $docData['order'],
            ]);
        }

        $this->command->info('Procurement notices seeded successfully!');
        $this->command->info('- New BRT Project: ' . $newBrt->documents->count() . ' documents');
        $this->command->info('- Qorasaroy Tunnel Project: ' . $qorasaroy->documents->count() . ' documents');
    }
}
