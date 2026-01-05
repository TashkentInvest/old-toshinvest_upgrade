<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectStage;
use Illuminate\Database\Seeder;

class ProjectStagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding project stages...\n";

        // Get first 5 projects from database (renovation projects)
        $projects = Project::limit(5)->get();

        if ($projects->isEmpty()) {
            echo "⚠️  No projects found. Skipping project stages seeding.\n";
            return;
        }

        $stageTemplates = [
            [
                'name' => 'Этап 1: Предквалификация',
                'description' => 'Проверка процедуры банкротства, налоговой задолженности и строительного опыта',
                'days_duration' => 7,
            ],
            [
                'name' => 'Этап 2: Техническая оценка',
                'description' => 'Оценка технических предложений и проверка соответствия требованиям',
                'days_duration' => 14,
            ],
            [
                'name' => 'Этап 3: Финансовая оценка',
                'description' => 'Анализ финансовых предложений и стоимости работ',
                'days_duration' => 10,
            ],
            [
                'name' => 'Этап 4: Подписание протокола',
                'description' => 'Финализация и подписание протокола результатов',
                'days_duration' => 5,
            ],
        ];

        $totalStages = 0;
        foreach ($projects as $project) {
            $startDate = now()->subDays(60); // Start 60 days ago
            
            foreach ($stageTemplates as $index => $template) {
                $endDate = (clone $startDate)->addDays($template['days_duration']);
                
                ProjectStage::create([
                    'project_id' => $project->id,
                    'name' => $template['name'],
                    'start_date' => $startDate->format('Y-m-d'),
                    'end_date' => $endDate->format('Y-m-d'),
                    'description' => $template['description'],
                    'protocol_signed' => $index == 3, // Last stage is signed
                ]);
                
                $startDate = (clone $endDate)->addDay(); // Next stage starts after previous ends
                $totalStages++;
            }
        }

        echo "✅ Successfully seeded {$totalStages} project stages for " . $projects->count() . " projects\n";
    }
}
