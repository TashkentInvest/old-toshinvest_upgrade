<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ImportOldDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Starting data import from old database...');

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Import in order of dependencies
        $this->importRegions();
        $this->importDistricts();
        $this->importStreets();
        $this->importCategories();
        $this->importRoles();
        $this->importUsers();
        $this->importUserRoles();
        $this->importNews();
        $this->importProjects();
        $this->importPageViews();
        $this->importHistories();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info('Data import completed successfully!');
    }

    private function importRegions()
    {
        $this->command->info('Importing regions...');

        DB::table('regions')->truncate();
        DB::table('regions')->insert([
            ['id' => 1, 'name_uz' => 'Toshkent Shahri', 'name_ru' => 'Тошкент шаҳри', 'static_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->command->info('Regions imported: 1');
    }

    private function importDistricts()
    {
        $this->command->info('Importing districts...');

        DB::table('districts')->truncate();
        DB::table('districts')->insert([
            ['id' => 1, 'region_id' => 1, 'name_uz' => 'Uchtepa', 'name_ru' => 'Учтепинский', 'code' => '01', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'region_id' => 1, 'name_uz' => 'Bektemir', 'name_ru' => 'Бектемирский', 'code' => '02', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'region_id' => 1, 'name_uz' => 'Chilonzor', 'name_ru' => 'Чиланзарский', 'code' => '03', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'region_id' => 1, 'name_uz' => 'Yashnobod', 'name_ru' => 'Яшнабадский', 'code' => '04', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'region_id' => 1, 'name_uz' => 'Yakkasaroy', 'name_ru' => 'Яккасарайский', 'code' => '05', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'region_id' => 1, 'name_uz' => 'Sergeli', 'name_ru' => 'Сергелийский', 'code' => '06', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'region_id' => 1, 'name_uz' => 'Yunusobod', 'name_ru' => 'Юнусабадский', 'code' => '07', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'region_id' => 1, 'name_uz' => 'Olmazor', 'name_ru' => 'Олмазарский', 'code' => '08', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'region_id' => 1, 'name_uz' => 'Mirzo Ulug\'bek', 'name_ru' => 'Мирзо Улугбекский', 'code' => '09', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'region_id' => 1, 'name_uz' => 'Shayxontohur', 'name_ru' => 'Шайхантахурский', 'code' => '10', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'region_id' => 1, 'name_uz' => 'Mirobod', 'name_ru' => 'Мирабадский', 'code' => '11', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'region_id' => 1, 'name_uz' => 'Yangihayot', 'name_ru' => 'Янгихаётский', 'code' => '12', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->command->info('Districts imported: 12');
    }

    private function importStreets()
    {
        $this->command->info('Importing streets from SQL file...');

        $sqlFile = $this->findSqlFile();
        if (!$sqlFile) {
            $this->command->warn('SQL file not found, skipping streets import');
            return;
        }

        $sql = file_get_contents($sqlFile);

        // Extract streets INSERT statements
        if (preg_match_all('/INSERT INTO `streets`.*?VALUES\s*(.+?);/s', $sql, $matches)) {
            DB::table('streets')->truncate();

            foreach ($matches[0] as $insertStatement) {
                try {
                    DB::unprepared($insertStatement);
                } catch (\Exception $e) {
                    $this->command->warn('Error importing streets: ' . $e->getMessage());
                }
            }

            $count = DB::table('streets')->count();
            $this->command->info("Streets imported: {$count}");
        }
    }

    private function importCategories()
    {
        $this->command->info('Importing categories...');

        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            ['id' => 1, 'parent_id' => null, 'name' => 'Renovation Projects', 'slug' => 'renovation-projects', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $this->command->info('Categories imported: 1');
    }

    private function importRoles()
    {
        $this->command->info('Importing roles...');

        // Check if roles table exists and has the right structure
        try {
            DB::table('roles')->truncate();
            DB::table('roles')->insert([
                ['id' => 1, 'name' => 'Super Admin', 'guard_name' => 'web', 'title' => 'Tashkent Invest', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'name' => 'Baholash', 'guard_name' => 'web', 'title' => 'Baholash', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'name' => 'TumanHokimligi', 'guard_name' => 'web', 'title' => 'Tuman Hokimligi', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 4, 'name' => 'InvestXodim', 'guard_name' => 'web', 'title' => 'Tashkent Invest Xodim', 'created_at' => now(), 'updated_at' => now()],
            ]);

            $this->command->info('Roles imported: 4');
        } catch (\Exception $e) {
            $this->command->warn('Could not import roles: ' . $e->getMessage());
        }
    }

    private function importUsers()
    {
        $this->command->info('Importing users...');

        DB::table('users')->truncate();

        $users = [
            ['id' => 1, 'name' => 'Super Admin', 'email' => 'superadmin@example.com', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Baholash', 'email' => 'baholash@gmail.com', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Javohir', 'email' => 'javohir@tashkentinvest.com', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Uchtepa', 'email' => 'uchtepa@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Bektemir', 'email' => 'bektemir@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Chilonzor', 'email' => 'chilonzor@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Yashnobod', 'email' => 'yashnobod@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'name' => 'Yakkasaroy', 'email' => 'yakkasaroy@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'name' => 'Sergeli', 'email' => 'sergeli@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'name' => 'Yunusobod', 'email' => 'yunusobod@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'name' => 'Olmazor', 'email' => 'olmazor@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'name' => 'Mirzo Ulugbek', 'email' => 'mirzo.ulugbek@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'name' => 'Shayxontohur', 'email' => 'shayxontohur@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'name' => 'Mirobod', 'email' => 'mirobod@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'name' => 'Yangihayot', 'email' => 'yangihayot@hokimligi.uz', 'password' => Hash::make('password'), 'theme' => 'default', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('users')->insert($users);
        $this->command->info('Users imported: 15');
    }

    private function importUserRoles()
    {
        $this->command->info('Assigning roles to users...');

        try {
            DB::table('model_has_roles')->truncate();

            // Super Admin gets Super Admin role
            DB::table('model_has_roles')->insert([
                ['role_id' => 1, 'model_type' => 'App\\Models\\User', 'model_id' => 1],
                ['role_id' => 2, 'model_type' => 'App\\Models\\User', 'model_id' => 2],
                ['role_id' => 4, 'model_type' => 'App\\Models\\User', 'model_id' => 3],
            ]);

            // District users get TumanHokimligi role
            for ($i = 4; $i <= 15; $i++) {
                DB::table('model_has_roles')->insert([
                    'role_id' => 3,
                    'model_type' => 'App\\Models\\User',
                    'model_id' => $i,
                ]);
            }

            $this->command->info('User roles assigned');
        } catch (\Exception $e) {
            $this->command->warn('Could not assign roles: ' . $e->getMessage());
        }
    }

    private function importNews()
    {
        $this->command->info('Importing news...');

        DB::table('news')->truncate();

        $news = [
            [
                'id' => 1,
                'title' => '«TASHKENT INVEST» во главе стратегии городского развития',
                'image' => 'https://static.tildacdn.com/tild3065-6139-4836-b865-376162366533/__2024-05-15__23425A.png',
                'content' => 'В свете стратегических планов Президента Узбекистана Шавката Мирзиёева по социально-экономическому развитию столицы, Ташкент принял решение вернуться в рейтинги международного агентства Fitch и войти к 2030 году в топ 50 городов мира для комфортного проживания.',
                'link' => 'https://toshkentinvest.uz/tpost/hy1cya0s11-tashkent-invest-vo-glave-strategii-gorod',
                'published_at' => '2024-12-11 18:00:32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'title' => 'Ташкент в топ-50 городов мира',
                'image' => 'https://static.tildacdn.com/tild3034-3663-4534-b032-356432373931/Tashkent-City_name_s.jpg',
                'content' => 'Мы поговорили со специалистами из «Компания Ташкент Инвест», которые собираются сделать столицу Узбекистана одним из самых удобных для проживания городов мира.',
                'link' => 'https://toshkentinvest.uz/tpost/552dltdp01-tashkent-v-top-50-gorodov-mira',
                'published_at' => '2024-12-09 18:00:32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'title' => 'Депутаты кенгаша Ташкента одобрили выделение 1 трлн сумов на формирование уставного капитала',
                'image' => 'https://static.tildacdn.com/tild3030-3035-4561-b935-346537663037/162914_62206f66143f5.jpg',
                'content' => 'Кенгаш народных депутатов Ташкента на заседании 12 февраля одобрил выделение 1 трлн сумов на формирование уставного капитала государственной компании «Ташкент инвест».',
                'link' => 'https://toshkentinvest.uz/tpost/isj0glos31-deputati-kengasha-tashkenta-odobrili-vid',
                'published_at' => '2024-12-09 18:00:32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'title' => 'Создан Фонд развития Ташкента',
                'image' => 'https://static.tildacdn.com/tild3638-6139-4133-a662-306137326333/congress_hall.jpg',
                'content' => 'Компания также будет управлять Фондом развития инфраструктуры предпринимательства при хокимияте, который переименовывается в Фонд развития Ташкента.',
                'link' => 'https://toshkentinvest.uz/tpost/s22u9ic521-sozdan-fond-razvitiya-tashkenta',
                'published_at' => '2024-12-09 18:00:32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'title' => 'Специальная госкомпания станет «мостом» между хокимиятом Ташкента и бизнесом',
                'image' => 'https://static.tildacdn.com/tild6464-3337-4864-b164-643761313036/upscaled_image.png',
                'content' => 'При учредительстве столичного хокимията создаётся специальная компания в форме акционерного общества «Ташкент инвест», которая должна служить «мостом» между администрацией города и предпринимателями.',
                'link' => 'https://toshkentinvest.uz/tpost/uzpea9heo1-spetsialnaya-goskompaniya-stanet-mostom',
                'published_at' => '2024-12-09 18:00:32',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'title' => '"SUMEC International Technology & Trade Co., Ltd" компанияси Бошқарув раиси Ху Хайцзин билан учрашув ўтказилди.',
                'image' => '["/storage/news/images/1754394762_nN0aeXFwlf.png","/storage/news/images/1754394762_FNnuL5L3tE.png","/storage/news/images/1754394762_YAMStsAdJg.png"]',
                'content' => 'Учрашув давомида савдо-иқтисодий шерикликни ривожлантириш ҳамда махсус инвестицион платформа яратиш орқали инвестиция лойиҳаларини молиялаштириш масалалари муҳокама қилинди.',
                'link' => null,
                'published_at' => '2025-08-05 11:32:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news')->insert($news);
        $this->command->info('News imported: 6');
    }

    private function importProjects()
    {
        $this->command->info('Importing projects from SQL file...');

        $sqlFile = $this->findSqlFile();
        if (!$sqlFile) {
            $this->command->warn('SQL file not found, skipping projects import');
            return;
        }

        $sql = file_get_contents($sqlFile);

        // Extract projects INSERT statements
        if (preg_match('/INSERT INTO `projects`.*?VALUES\s*(.+?);/s', $sql, $matches)) {
            DB::table('projects')->truncate();

            try {
                DB::unprepared($matches[0]);
                $count = DB::table('projects')->count();
                $this->command->info("Projects imported: {$count}");
            } catch (\Exception $e) {
                $this->command->warn('Error importing projects: ' . $e->getMessage());
            }
        }
    }

    private function findSqlFile()
    {
        $possibleFiles = [
            base_path('tashken4_old_toshinvest (1).sql'),
            base_path('tashken4_old_toshinvest.sql'),
        ];

        foreach ($possibleFiles as $file) {
            if (file_exists($file)) {
                $this->command->info("Found SQL file: {$file}");
                return $file;
            }
        }

        return null;
    }

    private function importPageViews()
    {
        $this->command->info('Importing page views from SQL file...');

        $sqlFile = $this->findSqlFile();
        if (!$sqlFile) {
            $this->command->warn('SQL file not found, skipping page_views import');
            return;
        }

        $sql = file_get_contents($sqlFile);
        DB::table('page_views')->truncate();

        // Extract and process page_views INSERT statements using line-by-line parsing
        $lines = explode("\n", $sql);
        $inPageViewsInsert = false;
        $currentStatement = '';
        $importedCount = 0;

        foreach ($lines as $line) {
            // Check if this line starts a page_views INSERT
            if (strpos($line, 'INSERT INTO `page_views`') !== false) {
                $inPageViewsInsert = true;
                $currentStatement = $line;
                continue;
            }

            if ($inPageViewsInsert) {
                $currentStatement .= "\n" . $line;

                // Check if this line ends the INSERT statement (ends with ); and not inside a string)
                // A complete INSERT ends with just ); at the end of a line
                $trimmedLine = rtrim($line);
                if (preg_match('/^\([^)]*\);$/', $trimmedLine) || preg_match('/\'\);$/', $trimmedLine)) {
                    // Execute the complete statement
                    try {
                        DB::unprepared($currentStatement);
                        $importedCount++;
                    } catch (\Exception $e) {
                        $this->command->warn('Error in page_views batch: ' . substr($e->getMessage(), 0, 100));
                    }
                    $inPageViewsInsert = false;
                    $currentStatement = '';
                }
            }
        }

        $count = DB::table('page_views')->count();
        $this->command->info("Page views imported: {$count} (from {$importedCount} INSERT statements)");
    }

    private function importHistories()
    {
        $this->command->info('Importing histories from SQL file...');

        $sqlFile = $this->findSqlFile();
        if (!$sqlFile) {
            $this->command->warn('SQL file not found, skipping histories import');
            return;
        }

        $sql = file_get_contents($sqlFile);

        // Extract histories INSERT statements
        if (preg_match_all('/INSERT INTO `histories`.*?VALUES\s*(.+?);/s', $sql, $matches)) {
            DB::table('histories')->truncate();

            foreach ($matches[0] as $insertStatement) {
                try {
                    DB::unprepared($insertStatement);
                } catch (\Exception $e) {
                    $this->command->warn('Error importing histories: ' . $e->getMessage());
                }
            }

            $count = DB::table('histories')->count();
            $this->command->info("Histories imported: {$count}");
        }
    }
}
