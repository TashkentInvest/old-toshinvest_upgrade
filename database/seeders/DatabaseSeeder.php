<?php

namespace Database\Seeders;

use App\Models\RuxsatnomaTuri;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            // System initialization (users, roles, permissions)
            SystemInitSeeder::class,
            
            // Content seeders
            NewsSeeder::class,
            ProjectsTableSeeder::class,
            ProcurementNoticeSeeder::class,
            InvestmentProjectSeeder::class,
            TenderSeeder::class,
            BannerSeeder::class,
            
            // ImportOldDataSeeder::class,  // Disabled for now - run manually if needed
        ]);
    }
}
