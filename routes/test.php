<?php

use Illuminate\Support\Facades\Route;
use App\Services\PageViewTracker;
use App\Models\PageView;

Route::get('/test-tracking', function (Illuminate\Http\Request $request) {
    echo "<h1>Page View Tracking Test</h1>";

    echo "<h2>1. Testing Manual Track</h2>";
    try {
        PageViewTracker::track($request, 'Test Page');
        echo "<p style='color: green;'>✓ Tracking attempt completed</p>";
    } catch (\Exception $e) {
        echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
        echo "<pre>" . $e->getTraceAsString() . "</pre>";
    }

    echo "<h2>2. Database Status</h2>";
    $count = PageView::count();
    echo "<p>Total page views in database: <strong>{$count}</strong></p>";

    if ($count > 0) {
        echo "<h3>Latest 5 entries:</h3>";
        $latest = PageView::latest('created_at')->take(5)->get();
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>IP</th><th>Country</th><th>Page</th><th>Created At</th></tr>";
        foreach ($latest as $view) {
            echo "<tr>";
            echo "<td>{$view->id}</td>";
            echo "<td>{$view->ip_address}</td>";
            echo "<td>{$view->country} ({$view->country_code})</td>";
            echo "<td>{$view->page_name}</td>";
            echo "<td>{$view->created_at}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    echo "<h2>3. Statistics</h2>";
    echo "<ul>";
    echo "<li>Total views: " . PageView::getTotalViews() . "</li>";
    echo "<li>Unique visitors: " . PageView::getUniqueVisitors() . "</li>";
    echo "<li>Today's views: " . PageView::getTodayViews() . "</li>";
    echo "<li>This month's views: " . PageView::getMonthViews() . "</li>";
    echo "</ul>";

    echo "<h3>Top Countries:</h3>";
    $countries = PageView::getViewsByCountry()->take(5);
    if ($countries->count() > 0) {
        echo "<ul>";
        foreach ($countries as $country) {
            echo "<li>{$country->country} ({$country->country_code}): {$country->count} views</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No country data yet</p>";
    }

    echo "<h2>4. Check Logs</h2>";
    $logFile = storage_path('logs/laravel.log');
    if (file_exists($logFile)) {
        $logs = file_get_contents($logFile);
        $trackingLogs = array_filter(explode("\n", $logs), function($line) {
            return strpos($line, 'PageViewTracker') !== false;
        });

        if (!empty($trackingLogs)) {
            echo "<h3>Recent Tracking Logs:</h3>";
            echo "<pre style='background: #f5f5f5; padding: 10px; overflow: auto; max-height: 300px;'>";
            echo implode("\n", array_slice($trackingLogs, -10));
            echo "</pre>";
        } else {
            echo "<p>No tracking logs found</p>";
        }
    }

    echo "<hr>";
    echo "<p><a href='/'>Go to Home Page</a> | <a href='/test-tracking'>Refresh Test</a></p>";
});
