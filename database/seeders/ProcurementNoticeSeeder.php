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
        $newBrt = ProcurementNotice::updateOrCreate([
            'slug' => 'new-brt-project',
        ], [
            'title_uz' => "Toshkent shahri ko'chalarida avtobuslar uchun alohida ajratilgan yo'laklarni tashkil etish maqsadida avtomobil yo'llari va yo'l bo'yi infratuzilmasini loyihalash, rekonstruksiya qilish va ta'mirlash bo'yicha bosh pudratchi va loyihachi xizmatlari (EPC+F shartlarida)",
            'title_ru' => 'Услуги генерального подрядчика и проектировщика по проектированию, реконструкции и ремонту автомобильных дорог и придорожной инфраструктуры на улицах города Ташкента (на условиях EPC+F), с целью организации отдельных выделенных полос для автобусов',
            'title_en' => 'General contractor and designer services for the design, reconstruction and repair of roads and roadside infrastructure on the streets of Tashkent (on EPC+F terms), with the aim of organizing separate dedicated lanes for buses',

            'announcement_date_uz' => '24 yanvar 2026 yil',
            'announcement_date_ru' => '24 января 2026 года',
            'announcement_date_en' => 'January 24, 2026',

            'deadline_uz' => '9 fevral 2026 yil, 18:00',
            'deadline_ru' => '9 февраля 2026 года, 18:00',
            'deadline_en' => 'February 9, 2026, 18:00',

            'status' => 'active',
            'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt',
            'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/new_brt/Эълон _new_brt (РУС).pdf',
            'order' => 1,
            'is_featured' => true,
        ]);

        $newBrt->documents()->delete();

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
        $qorasaroy = ProcurementNotice::updateOrCreate([
            'slug' => 'qorasaroy-tunnel-project',
        ], [
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

        $qorasaroy->documents()->delete();

        // Add documents for Qorasaroy project
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

        // Procurement 3: Technical Supervision Consulting Services
        $technicalSupervision = ProcurementNotice::updateOrCreate([
            'slug' => 'technical-supervision-consulting-services',
        ], [
            'title_uz' => 'ОЧИҚ ТЕНДЕР ЭЪЛОНИ: "Тошкент Инвест компанияси" АЖ техник назорат консалтинг хизматлари',
            'title_ru' => 'ОТКРЫТОЕ ТЕНДЕРНОЕ ОБЪЯВЛЕНИЕ: АО "Toshkent Invest kompaniyasi" на услуги технического надзора',
            'title_en' => 'OPEN TENDER NOTICE: Technical supervision consulting services for JSC "Toshkent Invest kompaniyasi"',

            'description_uz' => 'Лот рақами: Tender No 26120012476710. Харид предмети: объектлардаги қурилиш-монтаж ишларига техник назоратни амалга ошириш хизмати. Хизмат коди: 70.22.12.000-00001.',
            'description_ru' => 'Номер лота: Tender No 26120012476710. Предмет закупки: услуги по техническому надзору за строительно-монтажными работами на объектах. Код услуги: 70.22.12.000-00001.',
            'description_en' => 'Lot number: Tender No 26120012476710. Procurement subject: technical supervision services for construction and installation works at facilities. Service code: 70.22.12.000-00001.',

            'announcement_date_uz' => '26.03.2026 йил',
            'announcement_date_ru' => '26.03.2026',
            'announcement_date_en' => 'March 26, 2026',

            'deadline_uz' => '13.04.2026 йил',
            'deadline_ru' => '13.04.2026',
            'deadline_en' => 'April 13, 2026, 23:59',

            'status' => 'active',
            'folder' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Tender_26120012476710',
            'announcement_pdf' => 'assets/eng_yaxshi_takliflarni_tanlab_olish/Tender_26120012476710/ОЧИҚ ТЕНДЕР ЭЪЛОНИ.pdf',
            'order' => 3,
            'is_featured' => false,
        ]);

        $technicalSupervision->documents()->delete();

        ProcurementDocument::create([
            'procurement_notice_id' => $technicalSupervision->id,
            'name_uz' => 'Лот ҳаволаси (etender.uzex.uz)',
            'name_ru' => 'Ссылка на лот (etender.uzex.uz)',
            'name_en' => 'Lot link (etender.uzex.uz)',
            'file_path' => 'https://etender.uzex.uz/lot/476710',
            'file_type' => 'link',
            'file_size' => null,
            'order' => 1,
        ]);

        $this->command->info('Procurement notices seeded successfully!');
        $this->command->info('- New BRT Project: ' . $newBrt->documents->count() . ' documents');
        $this->command->info('- Qorasaroy Tunnel Project: ' . $qorasaroy->documents->count() . ' documents');
        $this->command->info('- Technical Supervision Services: ' . $technicalSupervision->documents->count() . ' documents');
    }
}
