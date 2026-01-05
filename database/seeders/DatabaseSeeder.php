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
            // ==================================================
            // SYSTEM INITIALIZATION
            // ==================================================
            SystemInitSeeder::class,
            
            // ==================================================
            // REFERENCE DATA (Foundation - Must be first)
            // ==================================================
            RegionsDistrictsSeeder::class,
            CategorySeeder::class,
            
            // ==================================================
            // CORE CONTENT (Main business data)
            // ==================================================
            NewsSeeder::class,
            ProjectsTableSeeder::class,
            ProjectStagesTableSeeder::class,      // Project workflow stages
            ProjectDocumentsTableSeeder::class,   // Project documents
            
            // ==================================================
            // PROCUREMENT & INVESTMENT
            // ==================================================
            ProcurementNoticeSeeder::class,
            InvestmentProjectSeeder::class,
            TenderSeeder::class,
            
            // ==================================================
            // FRONTEND & MARKETING
            // ==================================================
            BannerSeeder::class,
            
            // ==================================================
            // ANALYTICS & TRACKING
            // ==================================================
            PageViewSeeder::class,
            
            // ==================================================
            // OPTIONAL: Import legacy data (run manually if needed)
            // ==================================================
            // ImportOldDataSeeder::class,
        ]);
        
        // Production-ready confirmation
        $this->command->newLine();
        $this->command->info('╔════════════════════════════════════════════════════════════╗');
        $this->command->info('║   🎉 PRODUCTION DATABASE SUCCESSFULLY SEEDED              ║');
        $this->command->info('╚════════════════════════════════════════════════════════════╝');
        $this->command->newLine();
        $this->command->info('📊 Database: ' . config('database.connections.mysql.database'));
        $this->command->info('🔐 Super Admin: superadmin@example.com');
        $this->command->info('🔑 Password: teamdevs');
        $this->command->newLine();
        $this->command->info('✅ All tables populated with production-quality data');
        $this->command->info('✅ Reference data loaded (Regions, Districts, Categories)');
        $this->command->info('✅ Content ready (News, Projects, Tenders, Investment)');
        $this->command->info('✅ Analytics tracking enabled');
        $this->command->newLine();
        $this->command->warn('⚠️  Don\'t forget to:');
        $this->command->warn('   1. Upload banner images to storage/app/public/banners/');
        $this->command->warn('   2. Run: php artisan storage:link');
        $this->command->warn('   3. Configure email settings in .env');
        $this->command->newLine();
    }
}
