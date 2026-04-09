<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectDocument;
use Illuminate\Database\Seeder;

class ProjectDocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding project documents...\n";

        // Get first 5 projects from database (renovation projects)
        $projects = Project::limit(5)->get();

        if ($projects->isEmpty()) {
            echo "⚠️  No projects found. Skipping project documents seeding.\n";
            return;
        }

        $documentTemplates = [
            [
                'title' => 'Протокол этапа 1 - Предквалификация',
                'file_name' => 'protocol_stage1.pdf',
            ],
            [
                'title' => 'Протокол этапа 2 - Техническая оценка',
                'file_name' => 'protocol_stage2.pdf',
            ],
            [
                'title' => 'Протокол этапа 3 - Финансовая оценка',
                'file_name' => 'protocol_stage3.pdf',
            ],
            [
                'title' => 'Итоговый протокол результатов',
                'file_name' => 'protocol_final.pdf',
            ],
            [
                'title' => 'Договор подряда',
                'file_name' => 'contract.pdf',
            ],
        ];

        $totalDocs = 0;
        foreach ($projects as $project) {
            $projectId = $project->id;
            foreach ($documentTemplates as $template) {
                $filePath = "documents/projects/project_{$projectId}/{$template['file_name']}";

                ProjectDocument::create([
                    'project_id' => $project->id,
                    'title' => $template['title'],
                    'file_path' => $filePath,
                ]);

                $totalDocs++;
            }
        }

        echo "✅ Successfully seeded {$totalDocs} documents for " . $projects->count() . " projects\n";
        echo "📝 Note: Document files are references only. Upload actual PDFs to storage/app/public/documents/projects/\n";
    }
}
