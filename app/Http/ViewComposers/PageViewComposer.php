<?php

namespace App\Http\ViewComposers;

use App\Models\PageView;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Cache statistics for 5 minutes to reduce database queries
        $stats = Cache::remember('page_view_stats', 300, function () {
            try {
                return [
                    'total_views' => PageView::getTotalViews(),
                    'unique_visitors' => PageView::getUniqueVisitors(),
                    'today_views' => PageView::getTodayViews(),
                    'month_views' => PageView::getMonthViews(),
                    'top_countries' => PageView::getViewsByCountry()->take(5),
                ];
            } catch (\Exception $e) {
                Log::error('PageViewComposer failed: ' . $e->getMessage());
                return [
                    'total_views' => 0,
                    'unique_visitors' => 0,
                    'today_views' => 0,
                    'month_views' => 0,
                    'top_countries' => collect([]),
                ];
            }
        });

        $view->with('pageViewStats', $stats);
    }
}
