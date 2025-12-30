<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InvestmentProject;
use Carbon\Carbon;

class InvestmentProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Project 1: Archived - Yunusobod 1
        InvestmentProject::create([
            'project_code' => 'TI-2025-001',
            'district_uz' => 'Yunusobod tumani',
            'district_ru' => 'Юнусободский район',
            'district_en' => 'Yunusabad district',
            'mahalla_uz' => 'Янгитарнов маҳалласи',
            'mahalla_ru' => 'Махалля Янгитарнов',
            'mahalla_en' => 'Yangitarnov mahalla',
            'land_area' => 0.8528,
            'announcement_date' => Carbon::parse('2025-06-02'),
            'submission_deadline' => Carbon::parse('2025-06-09 18:00:00'),
            'status' => 'archive',
            'announcement_pdf' => 'investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf',
            'attachments_zip' => null,
            'has_extension' => false,
            'order' => 1,
            'is_featured' => false,
        ]);

        // Project 2: Archived - Yunusobod 2 (with extension)
        InvestmentProject::create([
            'project_code' => 'TI-2025-002',
            'district_uz' => 'Yunusobod tumani',
            'district_ru' => 'Юнусободский район',
            'district_en' => 'Yunusabad district',
            'mahalla_uz' => 'Янгитарнов маҳалласи',
            'mahalla_ru' => 'Махалля Янгитарнов',
            'mahalla_en' => 'Yangitarnov mahalla',
            'land_area' => 0.8528,
            'announcement_date' => Carbon::parse('2025-06-02'),
            'submission_deadline' => Carbon::parse('2025-06-16 18:00:00'),
            'status' => 'archive',
            'announcement_pdf' => 'investment-projects/Эълон_Yunusobod KSZ  02.06.2025.pdf',
            'attachments_zip' => null,
            'has_extension' => true,
            'extended_deadline' => Carbon::parse('2025-06-16 18:00:00'),
            'extension_note_uz' => 'Tanlov topshiriq qabul qilish muddati 18:00, 16 iyun 2025 yilgacha uzaytirildi.',
            'extension_note_ru' => 'Срок приема конкурсных заявок продлен до 18:00, 16 июня 2025 года.',
            'extension_note_en' => 'The deadline for accepting bids has been extended to 18:00, June 16, 2025.',
            'order' => 2,
            'is_featured' => false,
        ]);

        // Project 3: Active - Yunusobod 3 (with extension)
        InvestmentProject::create([
            'project_code' => 'TI-2025-003',
            'district_uz' => 'Yunusobod tumani',
            'district_ru' => 'Юнусободский район',
            'district_en' => 'Yunusabad district',
            'mahalla_uz' => 'Янгитарнов маҳалласи',
            'mahalla_ru' => 'Махалля Янгитарнов',
            'mahalla_en' => 'Yangitarnov mahalla',
            'land_area' => 0.8528,
            'announcement_date' => Carbon::parse('2025-06-24'),
            'submission_deadline' => Carbon::parse('2026-07-10 18:00:00'),  // Future date to make it active
            'status' => 'active',
            'announcement_pdf' => 'investment-projects/Эълон_Yunusobod KSZ  24.06.2025.pdf',
            'attachments_zip' => 'assets/folders/Приложения.zip',
            'has_extension' => true,
            'extended_deadline' => Carbon::parse('2026-07-10 18:00:00'),
            'extension_note_uz' => 'Tanlov topshiriq qabul qilish muddati 18:00, 10 iyul 2026 yilgacha uzaytirildi.',
            'extension_note_ru' => 'Срок приема конкурсных заявок продлен до 18:00, 10 июля 2026 года.',
            'extension_note_en' => 'The deadline for accepting bids has been extended to 18:00, July 10, 2026.',
            'order' => 3,
            'is_featured' => true,
        ]);

        echo "✅ Successfully seeded 3 investment projects (1 active, 2 archived)\n";
    }
}
