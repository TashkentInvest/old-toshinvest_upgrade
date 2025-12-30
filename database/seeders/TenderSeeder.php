<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tender;
use App\Models\User;
use Carbon\Carbon;

class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get Super Admin user
        $admin = User::where('email', 'superadmin@example.com')->first();
        $userId = $admin ? $admin->id : 1;

        // Sample Tender 1: Infrastructure Development
        Tender::create([
            'title' => 'Ташкент шаҳри кўчаларида автобуслар учун алоҳида ажратилган йўлакларни ташкил этиш',
            'title_uz' => 'Ташкент шаҳри кўчаларида автобуслар учун алоҳида ажратилган йўлакларни ташкил этиш',
            'title_en' => 'Organization of dedicated bus lanes on Tashkent city streets',
            'code' => 'TND-2025-001',
            'lot_number' => 'LOT-001',
            'lot_url' => 'https://davxarid.uz/lot/12345',
            'subject' => 'Йўл инфратузилмасини қуриш ва реконструкция қилиш',
            'subject_uz' => 'Йўл инфратузилмасини қуриш ва реконструкция қилиш',
            'subject_en' => 'Road infrastructure construction and reconstruction',
            'location' => 'Тошкент шаҳри, барча туманлар',
            'location_uz' => 'Тошкент шаҳри, барча туманлар',
            'location_en' => 'Tashkent city, all districts',
            'location_description' => 'Асосий магистрал йўллар ва шаҳар ичи кўчалар',
            'location_description_uz' => 'Асосий магистрал йўллар ва шаҳар ичи кўчалар',
            'location_description_en' => 'Main highways and city streets',
            'technical_requirements' => [
                'Халқаро стандартларга мос лойиҳалаш',
                'Замонавий қурилиш материаллари',
                'Экологик талаблар',
            ],
            'qualification_requirements' => [
                'Йўл қурилишида камида 5 йиллик тажриба',
                'Хорижий шериклар билан ҳамкорлик тажрибаси',
                'ISO 9001 сертификати',
            ],
            'customer_name' => 'Тошкент шаҳар ҳокимлиги',
            'customer_tin' => '123456789',
            'customer_address' => 'Тошкент шаҳри, Шайхонтоҳур тумани, Нукус кўчаси, 3',
            'customer_phone' => '+998 71 239 11 11',
            'customer_email' => 'info@tashkent.uz',
            'announcement_date' => Carbon::parse('2025-12-25'),
            'submission_deadline' => Carbon::parse('2026-02-15'),
            'documents' => [
                [
                    'name' => 'Техник спецификация',
                    'path' => '/documents/tender-001-tech-spec.pdf',
                    'size' => '2.5 MB'
                ],
                [
                    'name' => 'Лойиҳа ҳужжатлари',
                    'path' => '/documents/tender-001-project-docs.pdf',
                    'size' => '5.1 MB'
                ],
            ],
            'status' => Tender::STATUS_ACTIVE,
            'is_urgent' => true,
            'created_by' => $userId,
            'updated_by' => $userId,
        ]);

        // Sample Tender 2: Building Construction
        Tender::create([
            'title' => 'Тошкент шаҳрида замонавий маъмурий бино қурилиши',
            'title_uz' => 'Тошкент шаҳрида замонавий маъмурий бино қурилиши',
            'title_en' => 'Construction of modern administrative building in Tashkent',
            'code' => 'TND-2025-002',
            'lot_number' => 'LOT-002',
            'lot_url' => 'https://davxarid.uz/lot/12346',
            'subject' => 'Бино қурилиши ва ички безатиш ишлари',
            'subject_uz' => 'Бино қурилиши ва ички безатиш ишлари',
            'subject_en' => 'Building construction and interior finishing works',
            'location' => 'Тошкент шаҳри, Мирзо Улуғбек тумани',
            'location_uz' => 'Тошкент шаҳри, Мирзо Улуғбек тумани',
            'location_en' => 'Tashkent city, Mirzo Ulugbek district',
            'location_description' => 'Шаҳар марказий қисми, Амир Темур кўчаси',
            'location_description_uz' => 'Шаҳар марказий қисми, Амир Темур кўчаси',
            'location_description_en' => 'City center, Amir Temur street',
            'technical_requirements' => [
                'Энергия тежамкор технологиялар',
                'Замонавий архитектура дизайни',
                'Қулай инфратузилма',
            ],
            'qualification_requirements' => [
                'Бино қурилишида тажриба',
                'Лицензия ва сертификатлар',
                'Молиявий барқарорлик',
            ],
            'customer_name' => 'Ўзбекистон Республикаси Инвестициялар ва ташқи савдо вазирлиги',
            'customer_tin' => '987654321',
            'customer_address' => 'Тошкент шаҳри, Амир Темур кўчаси, 109А',
            'customer_phone' => '+998 71 238 50 00',
            'customer_email' => 'info@mift.uz',
            'announcement_date' => Carbon::parse('2025-12-20'),
            'submission_deadline' => Carbon::parse('2026-03-01'),
            'documents' => [
                [
                    'name' => 'Лойиҳа тавсифи',
                    'path' => '/documents/tender-002-description.pdf',
                    'size' => '1.8 MB'
                ],
            ],
            'status' => Tender::STATUS_ACTIVE,
            'is_urgent' => false,
            'created_by' => $userId,
            'updated_by' => $userId,
        ]);

        // Sample Tender 3: IT Infrastructure
        Tender::create([
            'title' => 'Электрон ҳукумат тизимини жорий этиш',
            'title_uz' => 'Электрон ҳукумат тизимини жорий этиш',
            'title_en' => 'Implementation of e-government system',
            'code' => 'TND-2025-003',
            'lot_number' => 'LOT-003',
            'lot_url' => 'https://davxarid.uz/lot/12347',
            'subject' => 'IT инфратузилма ва дастурий таъминот',
            'subject_uz' => 'IT инфратузилма ва дастурий таъминот',
            'subject_en' => 'IT infrastructure and software',
            'location' => 'Тошкент шаҳри',
            'location_uz' => 'Тошкент шаҳри',
            'location_en' => 'Tashkent city',
            'location_description' => null,
            'location_description_uz' => null,
            'location_description_en' => null,
            'technical_requirements' => [
                'Замонавий булутли технологиялар',
                'Маълумотлар хавфсизлиги',
                'Юқори даражадаги интеграция',
            ],
            'qualification_requirements' => [
                'IT соҳасида тажриба',
                'Давлат лойиҳаларида иштирок',
                'Техник қўллаб-қувватлаш хизмати',
            ],
            'customer_name' => 'Рақамли технологиялар вазирлиги',
            'customer_tin' => '456789123',
            'customer_address' => 'Тошкент шаҳри, Мустақиллик майдони',
            'customer_phone' => '+998 71 202 00 00',
            'customer_email' => 'info@mininnovation.uz',
            'announcement_date' => Carbon::parse('2025-12-28'),
            'submission_deadline' => Carbon::parse('2026-01-30'),
            'documents' => [
                [
                    'name' => 'Техник топшириқ',
                    'path' => '/documents/tender-003-tz.pdf',
                    'size' => '950 KB'
                ],
                [
                    'name' => 'Функционал талаблар',
                    'path' => '/documents/tender-003-requirements.pdf',
                    'size' => '1.2 MB'
                ],
            ],
            'status' => Tender::STATUS_ACTIVE,
            'is_urgent' => true,
            'created_by' => $userId,
            'updated_by' => $userId,
        ]);

        // Sample Tender 4: Completed Tender
        Tender::create([
            'title' => 'Паркларни обод қилиш (Якунланган)',
            'title_uz' => 'Паркларни обод қилиш (Якунланган)',
            'title_en' => 'Park improvement (Completed)',
            'code' => 'TND-2024-099',
            'lot_number' => 'LOT-099',
            'lot_url' => null,
            'subject' => 'Яшил зоналарни обод қилиш',
            'subject_uz' => 'Яшил зоналарни обод қилиш',
            'subject_en' => 'Green zones improvement',
            'location' => 'Тошкент шаҳри',
            'location_uz' => 'Тошкент шаҳри',
            'location_en' => 'Tashkent city',
            'location_description' => null,
            'location_description_uz' => null,
            'location_description_en' => null,
            'technical_requirements' => [],
            'qualification_requirements' => [],
            'customer_name' => 'Тошкент шаҳар ҳокимлиги',
            'customer_tin' => '123456789',
            'customer_address' => 'Тошкент шаҳри',
            'customer_phone' => '+998 71 239 11 11',
            'customer_email' => 'info@tashkent.uz',
            'announcement_date' => Carbon::parse('2024-10-01'),
            'submission_deadline' => Carbon::parse('2024-11-15'),
            'documents' => [],
            'status' => Tender::STATUS_CLOSED,
            'is_urgent' => false,
            'created_by' => $userId,
            'updated_by' => $userId,
        ]);

        echo "✅ Successfully seeded 4 tenders (3 active, 1 closed)\n";
    }
}
