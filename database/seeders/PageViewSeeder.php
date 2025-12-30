<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageView;
use Carbon\Carbon;

class PageViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Seeding page views...\n";

        $pages = [
            ['url' => '/', 'page_name' => 'Home'],
            ['url' => '/investoram', 'page_name' => 'Investoram'],
            ['url' => '/media', 'page_name' => 'Media'],
            ['url' => '/open_tender_notice', 'page_name' => 'Procurement Notices'],
            ['url' => '/investment-project', 'page_name' => 'Investment Projects'],
            ['url' => '/contact', 'page_name' => 'Contact'],
            ['url' => '/struktura', 'page_name' => 'Structure'],
            ['url' => '/board', 'page_name' => 'Board'],
            ['url' => '/reports', 'page_name' => 'Reports'],
            ['url' => '/vacancies', 'page_name' => 'Vacancies'],
        ];

        // Generate random views over the last 30 days
        $startDate = Carbon::now()->subDays(30);
        $viewsCreated = 0;

        foreach ($pages as $page) {
            // Random number of views for each page (between 100 and 500)
            $viewCount = rand(100, 500);

            for ($i = 0; $i < $viewCount; $i++) {
                // Random date within last 30 days
                $randomDate = Carbon::now()->subDays(rand(0, 30));
                
                // Random hour of the day
                $randomHour = rand(8, 22);
                $randomMinute = rand(0, 59);
                $randomDate->setTime($randomHour, $randomMinute);

                // Random IP addresses
                $ips = [
                    '84.54.73.' . rand(1, 255),
                    '185.217.131.' . rand(1, 255),
                    '195.158.0.' . rand(1, 255),
                    '213.230.96.' . rand(1, 255),
                    '62.217.179.' . rand(1, 255),
                ];

                PageView::create([
                    'page_url' => $page['url'],
                    'page_name' => $page['page_name'],
                    'ip_address' => $ips[array_rand($ips)],
                    'user_agent' => $this->getRandomUserAgent(),
                    'visited_at' => $randomDate,
                    'created_at' => $randomDate,
                    'updated_at' => $randomDate,
                ]);

                $viewsCreated++;
            }
        }

        echo "✅ Successfully seeded {$viewsCreated} page views across " . count($pages) . " pages\n";
        echo "   Most viewed pages will show in analytics dashboard\n";
    }

    /**
     * Get random user agent
     */
    private function getRandomUserAgent()
    {
        $userAgents = [
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Edge/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0',
            'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Mozilla/5.0 (iPhone; CPU iPhone OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (iPad; CPU OS 17_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/17.1 Mobile/15E148 Safari/604.1',
            'Mozilla/5.0 (Linux; Android 13) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.43 Mobile Safari/537.36',
        ];

        return $userAgents[array_rand($userAgents)];
    }
}
