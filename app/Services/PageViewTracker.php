<?php

namespace App\Services;

use App\Models\PageView;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PageViewTracker
{
    /**
     * Track page view with IP geolocation (using free ip-api.com service)
     * Free tier: 45 requests per minute
     */
    public static function track($request, $pageName = null)
    {
        try {
            $ipAddress = self::getClientIp($request);

            Log::info('PageViewTracker: Attempting to track', [
                'ip' => $ipAddress,
                'url' => $request->fullUrl(),
                'path' => $request->path(),
            ]);

            // For development/testing, allow localhost tracking
            // Comment out the next 3 lines in production
            // if (self::isPrivateIp($ipAddress)) {
            //     Log::info('PageViewTracker: Skipping private IP');
            //     return;
            // }

            // Get geolocation data
            $geoData = self::getGeoLocation($ipAddress);

            Log::info('PageViewTracker: Geolocation data received', $geoData);

            // Store page view
            $pageView = PageView::create([
                'ip_address' => $ipAddress,
                'page_url' => $request->fullUrl(),
                'page_name' => $pageName ?? $request->path(),
                'country' => $geoData['country'] ?? 'Unknown',
                'country_code' => $geoData['countryCode'] ?? 'XX',
                'city' => $geoData['city'] ?? null,
                'region' => $geoData['regionName'] ?? null,
                'latitude' => isset($geoData['lat']) ? (string)$geoData['lat'] : null,
                'longitude' => isset($geoData['lon']) ? (string)$geoData['lon'] : null,
                'user_agent' => $request->userAgent(),
                'referer' => $request->header('referer'),
                'visited_at' => now(),
            ]);

            Log::info('PageViewTracker: Successfully created', ['id' => $pageView->id]);

        } catch (\Exception $e) {
            Log::error('Page view tracking failed: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    /**
     * Get client IP address
     */
    private static function getClientIp($request)
    {
        // Check for IP from shared internet
        if (!empty($request->server('HTTP_CLIENT_IP'))) {
            return $request->server('HTTP_CLIENT_IP');
        }
        // Check for IP passed from proxy
        elseif (!empty($request->server('HTTP_X_FORWARDED_FOR'))) {
            return $request->server('HTTP_X_FORWARDED_FOR');
        }
        // Default IP
        return $request->ip();
    }

    /**
     * Check if IP is private/local
     */
    private static function isPrivateIp($ip)
    {
        $privateRanges = [
            '127.0.0.0/8',
            '10.0.0.0/8',
            '172.16.0.0/12',
            '192.168.0.0/16',
            'localhost',
        ];

        foreach ($privateRanges as $range) {
            if (strpos($ip, 'localhost') !== false || strpos($ip, '127.0.0.1') !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get geolocation data from free API (ip-api.com)
     * Cache results for 24 hours to avoid hitting rate limits
     */
    private static function getGeoLocation($ip)
    {
        $cacheKey = "geo_location_{$ip}";

        return Cache::remember($cacheKey, 86400, function () use ($ip) {
            try {
                // Free API: http://ip-api.com/json/{ip}
                // Rate limit: 45 requests per minute
                $response = Http::timeout(3)->get("http://ip-api.com/json/{$ip}");

                if ($response->successful() && $response->json('status') === 'success') {
                    return $response->json();
                }

                return [];
            } catch (\Exception $e) {
                Log::warning("Geolocation API failed for IP {$ip}: " . $e->getMessage());
                return [];
            }
        });
    }

    /**
     * Alternative free geolocation service (ipapi.co)
     * Uncomment to use this instead
     */
    // private static function getGeoLocationAlternative($ip)
    // {
    //     $cacheKey = "geo_location_{$ip}";
    //
    //     return Cache::remember($cacheKey, 86400, function () use ($ip) {
    //         try {
    //             // Free API: https://ipapi.co/{ip}/json/
    //             // Rate limit: 1,000 requests per day
    //             $response = Http::timeout(3)->get("https://ipapi.co/{$ip}/json/");
    //
    //             if ($response->successful()) {
    //                 $data = $response->json();
    //                 return [
    //                     'country' => $data['country_name'] ?? null,
    //                     'countryCode' => $data['country_code'] ?? null,
    //                     'city' => $data['city'] ?? null,
    //                     'regionName' => $data['region'] ?? null,
    //                     'lat' => $data['latitude'] ?? null,
    //                     'lon' => $data['longitude'] ?? null,
    //                 ];
    //             }
    //
    //             return [];
    //         } catch (\Exception $e) {
    //             Log::warning("Geolocation API failed for IP {$ip}: " . $e->getMessage());
    //             return [];
    //         }
    //     });
    // }
}
