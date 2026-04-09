<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap
     *
     * @return Response
     */
    public function index(): Response
    {
        $sitemapXml = $this->generateSitemap();

        return response($sitemapXml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap XML content
     *
     * @return string
     */
    private function generateSitemap(): string
    {
        $baseUrl = url('/');
        $now = now()->toAtomString();

        // Static pages with priority and changefreq
        $staticPages = [
            ['url' => '/', 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => '/about_us', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['url' => '/investoram', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/investment-project', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => '/offers', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/contact', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => '/media', 'priority' => '0.8', 'changefreq' => 'daily'],
            ['url' => '/board', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/supervisory-board', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/struktura', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/kodeks', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/ustav', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/share-struktura', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/spisok', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/charter_capital', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/dividends', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/business_plan', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/assessment_system', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/development_strategies', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/key_performance_indicators', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => '/supervisory_board_committees', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/essential_facts', 'priority' => '0.6', 'changefreq' => 'weekly'],
            ['url' => '/internal_documents_of_the_company', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/npa', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['url' => '/reports', 'priority' => '0.6', 'changefreq' => 'quarterly'],
            ['url' => '/balance', 'priority' => '0.6', 'changefreq' => 'quarterly'],
            ['url' => '/income', 'priority' => '0.6', 'changefreq' => 'quarterly'],
            ['url' => '/vacancies', 'priority' => '0.6', 'changefreq' => 'weekly'],
            ['url' => '/open_tender_notice', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => '/zakupki', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['url' => '/jac-projects', 'priority' => '0.7', 'changefreq' => 'weekly'],
        ];

        // Get dynamic news
        $newsItems = News::orderBy('published_at', 'desc')->get();

        // Get dynamic projects
        $projects = Project::orderBy('updated_at', 'desc')->get();

        // Build XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:xhtml="http://www.w3.org/1999/xhtml">' . PHP_EOL;

        // Add static pages
        foreach ($staticPages as $page) {
            $xml .= $this->generateUrlEntry(
                $baseUrl . $page['url'],
                $now,
                $page['changefreq'],
                $page['priority']
            );
        }

        // Add news articles
        foreach ($newsItems as $news) {
            $xml .= $this->generateUrlEntry(
                route('frontend.media.detail', $news->id),
                $news->updated_at->toAtomString(),
                'monthly',
                '0.7'
            );
        }

        // Add projects
        foreach ($projects as $project) {
            $xml .= $this->generateUrlEntry(
                route('frontend.investoram', $project->id),
                $project->updated_at->toAtomString(),
                'weekly',
                '0.8'
            );
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Generate single URL entry for sitemap
     *
     * @param string $loc
     * @param string $lastmod
     * @param string $changefreq
     * @param string $priority
     * @return string
     */
    private function generateUrlEntry(string $loc, string $lastmod, string $changefreq, string $priority): string
    {
        $xml = '  <url>' . PHP_EOL;
        $xml .= '    <loc>' . htmlspecialchars($loc) . '</loc>' . PHP_EOL;
        $xml .= '    <lastmod>' . $lastmod . '</lastmod>' . PHP_EOL;
        $xml .= '    <changefreq>' . $changefreq . '</changefreq>' . PHP_EOL;
        $xml .= '    <priority>' . $priority . '</priority>' . PHP_EOL;

        // Add alternate language URLs
        foreach (['uz', 'ru', 'en'] as $lang) {
            $xml .= '    <xhtml:link rel="alternate" hreflang="' . $lang . '" href="' . $loc . '?lang=' . $lang . '" />' . PHP_EOL;
        }

        $xml .= '  </url>' . PHP_EOL;

        return $xml;
    }
}
