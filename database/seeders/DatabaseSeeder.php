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
            SystemInitSeeder::class,
            // ImportOldDataSeeder::class,  // Disabled for now - run manually if needed
        ]);
    }
}
