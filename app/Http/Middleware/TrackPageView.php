<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\PageViewTracker;
use Illuminate\Support\Facades\Log;

class TrackPageView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Track the page view in the background
        // You can also use queued jobs for better performance
        try {
            PageViewTracker::track($request);
        } catch (\Exception $e) {
            // Silent fail - don't break the application
            Log::error('Page view tracking middleware error: ' . $e->getMessage());
        }

        return $next($request);
    }
}
