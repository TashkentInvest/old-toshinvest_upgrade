<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsDistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding regions and districts...\n";

        // Insert Tashkent region
        $tashkentId = DB::table('regions')->insertGetId([
            'name_uz' => 'Toshkent shahri',
            'name_ru' => 'город Ташкент',
            'static_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tashkent city districts
        $districts = [
            ['name_uz' => 'Bektemir tumani', 'name_ru' => 'Бектемирский район', 'code' => '01'],
            ['name_uz' => 'Chilonzor tumani', 'name_ru' => 'Чиланзарский район', 'code' => '02'],
            ['name_uz' => 'Mirobod tumani', 'name_ru' => 'Мирабадский район', 'code' => '03'],
            ['name_uz' => 'Mirzo Ulug\'bek tumani', 'name_ru' => 'Мирзо-Улугбекский район', 'code' => '04'],
            ['name_uz' => 'Olmazor tumani', 'name_ru' => 'Алмазарский район', 'code' => '05'],
            ['name_uz' => 'Sergeli tumani', 'name_ru' => 'Сергелийский район', 'code' => '06'],
            ['name_uz' => 'Shayxontohur tumani', 'name_ru' => 'Шайхантахурский район', 'code' => '07'],
            ['name_uz' => 'Uchtepa tumani', 'name_ru' => 'Учтепинский район', 'code' => '08'],
            ['name_uz' => 'Yakkasaroy tumani', 'name_ru' => 'Яккасарайский район', 'code' => '09'],
            ['name_uz' => 'Yashnobod tumani', 'name_ru' => 'Яшнабадский район', 'code' => '10'],
            ['name_uz' => 'Yunusobod tumani', 'name_ru' => 'Юнусабадский район', 'code' => '11'],
            ['name_uz' => 'Yangihayot tumani', 'name_ru' => 'Янгихаятский район', 'code' => '12'],
        ];

        foreach ($districts as $district) {
            DB::table('districts')->insert([
                'region_id' => $tashkentId,
                'name_uz' => $district['name_uz'],
                'name_ru' => $district['name_ru'],
                'code' => $district['code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        echo "✅ Successfully seeded 1 region and " . count($districts) . " districts\n";
    }
}
