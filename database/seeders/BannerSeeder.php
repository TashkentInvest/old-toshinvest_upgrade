<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Banner Seeder - REAL DATA ONLY
 *
 * Uses actual content from https://toshkentinvest.uz
 * All text and images are from the official website
 */
class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $banners = [
            // Banner 1: Main Investment Call to Action
            [
                'title_uz' => 'KELAJAKKA SARMOYA KIRITING',
                'title_ru' => 'ИНВЕСТИРУЙТЕ В БУДУЩЕЕ',
                'title_en' => 'INVEST IN THE FUTURE',
                'description_uz' => '"Toshkent Invest Company" aksiyadorlik jamiyati 2023-yil avgust oyida Prezident farmoni №UP-112 asosida poytaxt hokimiyati ta\'sischiligida tashkil etilgan.',
                'description_ru' => 'Акционерное общество «Компания Ташкент Инвест» было создано при учредительстве хокимията столицы в августе 2023 года по указу Президента Республики Узбекистан №УП-112.',
                'description_en' => 'Tashkent Invest Company JSC was established under the auspices of the capital\'s administration in August 2023 by Presidential Decree No. UP-112.',
                'image_path' => 'banners/main-hero-bg.webp', // User should upload assets/users_img/bg.webp to storage/app/public/banners/
                'image_alt_text' => 'Tashkent Invest Company - Investment Opportunities',
                'button_text_uz' => 'Loyihalarni ko\'rish',
                'button_text_ru' => 'Смотреть проекты',
                'button_text_en' => 'View Projects',
                'button_link' => route('frontend.investoram'),
                'open_new_tab' => false,
                'display_order' => 1,
                'is_active' => true,
                'position' => 'home_slider',
                'start_date' => $now,
                'end_date' => null,
                'click_count' => 0,
                'view_count' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Banner 2: Green City Initiative
            [
                'title_uz' => 'Toza havo va dam olish joylari bo\'lgan shaharga aylanish',
                'title_ru' => 'Преобразование в город с чистым воздухом и местами отдыха',
                'title_en' => 'Transformation into a city with clean air and recreational areas',
                'description_uz' => 'Madaniyat va dam olish bog\'lari, xiyobonlar, bulvarlar qiyofasini o\'zgartirish va yashil zonalar sonini keskin oshirish orqali shahar aholisi va mehmonlari uchun dam olish sharoitlarini yaratish.',
                'description_ru' => 'Создание условий для отдыха жителей и гостей города путем изменения облика парков культуры и отдыха, скверов, бульваров и резкого увеличения количества зеленых зон.',
                'description_en' => 'Creating conditions for recreation of residents and guests by transforming parks, squares, boulevards and significantly increasing green areas.',
                'image_path' => 'banners/green-city.jpg', // Upload from: https://static.tildacdn.one/tild3637-6137-4736-a139-393336343331/lison-zhao-Lvt7BnCpU.jpg
                'image_alt_text' => 'Green Tashkent - Parks and Recreation',
                'button_text_uz' => 'Batafsil ma\'lumot',
                'button_text_ru' => 'Подробнее',
                'button_text_en' => 'Learn More',
                'button_link' => route('frontend.about_us'),
                'open_new_tab' => false,
                'display_order' => 2,
                'is_active' => true,
                'position' => 'home_slider',
                'start_date' => $now,
                'end_date' => null,
                'click_count' => 0,
                'view_count' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Banner 3: Smart Urban Development
            [
                'title_uz' => 'Samarali shaharsozlik',
                'title_ru' => 'Эффективное градостроительство',
                'title_en' => 'Effective Urban Development',
                'description_uz' => 'Yagona yondashuv asosida qurilishni muvofiqlashtirish va qurilish hajmiga mutanosib ijtimoiy infratuzilmani kengaytirish orqali "aqlli" shaharsozlik tamoyillarini joriy etish.',
                'description_ru' => 'Внедрение принципов «умного» градостроительства путем координации строительства на основе единого подхода и расширения социальной инфраструктуры соразмерно объему строительства.',
                'description_en' => 'Implementation of smart urban planning principles through coordinated construction based on a unified approach and expansion of social infrastructure proportionate to construction volume.',
                'image_path' => 'banners/urban-development.jpeg', // Upload from: https://static.tildacdn.one/tild3163-6637-4965-b261-653835643334/pexels-photo-1431446.jpeg
                'image_alt_text' => 'Smart Urban Development Tashkent',
                'button_text_uz' => 'Investitsiya loyihalari',
                'button_text_ru' => 'Инвестиционные проекты',
                'button_text_en' => 'Investment Projects',
                'button_link' => route('frontend.investment-projects'),
                'open_new_tab' => false,
                'display_order' => 3,
                'is_active' => true,
                'position' => 'home_slider',
                'start_date' => $now,
                'end_date' => null,
                'click_count' => 0,
                'view_count' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Banner 4: Economic Growth
            [
                'title_uz' => 'Barqaror iqtisodiy o\'sish',
                'title_ru' => 'Стабильный экономический рост',
                'title_en' => 'Stable Economic Growth',
                'description_uz' => 'Tadbirkorlik sub\'ektlari bilan o\'zaro manfaatli loyihalarni amalga oshirish va mavjud resurslarni samarali ishlatish orqali barqaror iqtisodiy o\'sishni ta\'minlash.',
                'description_ru' => 'Обеспечение стабильного экономического роста посредством реализации взаимовыгодных проектов с субъектами предпринимательства и эффективного задействования имеющихся ресурсов.',
                'description_en' => 'Ensuring stable economic growth through implementation of mutually beneficial projects with business entities and effective utilization of available resources.',
                'image_path' => 'banners/economic-growth.jpg', // Upload from: https://static.tildacdn.one/tild3337-6335-4135-b032-646332396131/pexels-fotios-photos.jpg
                'image_alt_text' => 'Economic Growth Tashkent Investment',
                'button_text_uz' => 'Takliflar yuborish',
                'button_text_ru' => 'Отправить предложение',
                'button_text_en' => 'Submit Proposal',
                'button_link' => route('frontend.investor_ideas.create'),
                'open_new_tab' => false,
                'display_order' => 4,
                'is_active' => true,
                'position' => 'home_slider',
                'start_date' => $now,
                'end_date' => null,
                'click_count' => 0,
                'view_count' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Banner 5: Modern Management
            [
                'title_uz' => 'Hokimiyat tizimida asosiy ko\'rsatkichlar va loyiha ofislarini samarali boshqarish',
                'title_ru' => 'Эффективное управление ключевыми показателями и проектными офисами в системе Хокимията',
                'title_en' => 'Effective management of key indicators and project offices in the Hokimiyat system',
                'description_uz' => 'Asosiy samaradorlik ko\'rsatkichlariga asoslangan zamonaviy menejmentni joriy etish, shuningdek, hokimiyat tizimida har bir yo\'nalish bo\'yicha loyiha ofislarini yaratish hisobiga inson resurslarini rivojlantirish.',
                'description_ru' => 'Внедрение современного менеджмента, основанного на ключевых показателях эффективности, а также развитие человеческих ресурсов за счет создания проектных офисов по каждому направлению в системе хокимията.',
                'description_en' => 'Implementation of modern management based on key performance indicators, as well as development of human resources through creation of project offices for each direction in the Hokimiyat system.',
                'image_path' => 'banners/modern-management.jpeg', // Upload from: https://static.tildacdn.one/tild3639-3233-4732-a166-373937363864/pexels-photo-416405.jpeg
                'image_alt_text' => 'Modern Project Management Tashkent',
                'button_text_uz' => 'Korporativ boshqaruv',
                'button_text_ru' => 'Корпоративное управление',
                'button_text_en' => 'Corporate Governance',
                'button_link' => route('frontend.board'),
                'open_new_tab' => false,
                'display_order' => 5,
                'is_active' => true,
                'position' => 'home_slider',
                'start_date' => $now,
                'end_date' => null,
                'click_count' => 0,
                'view_count' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('banners')->insert($banners);

        $this->command->info('✅ Successfully seeded ' . count($banners) . ' REAL banners from toshkentinvest.uz');
        $this->command->warn('⚠️  Remember to upload banner images to storage/app/public/banners/ directory:');
        $this->command->line('   1. main-hero-bg.webp (from assets/users_img/bg.webp)');
        $this->command->line('   2. green-city.jpg');
        $this->command->line('   3. urban-development.jpeg');
        $this->command->line('   4. economic-growth.jpg');
        $this->command->line('   5. modern-management.jpeg');
        $this->command->info('📁 Or run: php artisan storage:link (if not already linked)');
    }
}
