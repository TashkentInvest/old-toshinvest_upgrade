<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'page_url',
        'page_name',
        'country',
        'country_code',
        'city',
        'region',
        'latitude',
        'longitude',
        'user_agent',
        'referer',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];

    /**
     * Get total page views count
     */
    public static function getTotalViews()
    {
        return self::count();
    }

    /**
     * Get unique visitors count
     */
    public static function getUniqueVisitors()
    {
        return self::distinct('ip_address')->count('ip_address');
    }

    /**
     * Get views by country
     */
    public static function getViewsByCountry()
    {
        return self::select('country', 'country_code')
            ->selectRaw('COUNT(*) as count')
            ->whereNotNull('country')
            ->groupBy('country', 'country_code')
            ->orderByDesc('count')
            ->get();
    }

    /**
     * Get today's views
     */
    public static function getTodayViews()
    {
        return self::whereDate('visited_at', today())->count();
    }

    /**
     * Get this month's views
     */
    public static function getMonthViews()
    {
        return self::whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year)
            ->count();
    }
}
