<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding categories...\n";

        $categories = [
            [
                'name' => 'Renovation Projects',
                'slug' => 'renovation-projects',
                'parent_id' => null,
            ],
            [
                'name' => 'Infrastructure',
                'slug' => 'infrastructure',
                'parent_id' => null,
            ],
            [
                'name' => 'Urban Development',
                'slug' => 'urban-development',
                'parent_id' => null,
            ],
            [
                'name' => 'Investment Opportunities',
                'slug' => 'investment-opportunities',
                'parent_id' => null,
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
                'parent_id' => $category['parent_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "✅ Successfully seeded " . count($categories) . " categories\n";
    }
}
