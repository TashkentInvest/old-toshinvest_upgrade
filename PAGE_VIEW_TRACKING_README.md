# Page View Tracking System

## Overview
This system tracks page views with IP geolocation (country, city) using **FREE** APIs and displays statistics in the footer.

## Features
✅ Track every page view with IP address
✅ Get country/city information using FREE IP geolocation API
✅ Display statistics in footer:
   - Total views
   - Unique visitors
   - Today's views
   - This month's views
   - Top 5 countries

## Setup Instructions

### 1. Run Migration
```bash
php artisan migrate
```

This creates the `page_views` table to store all visit data.

### 2. Clear Cache
```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
```

### 3. How It Works

**Automatic Tracking:**
- Middleware `TrackPageView` is added to `web` middleware group
- Every page visit is automatically tracked
- IP geolocation is fetched using FREE `ip-api.com` API (45 requests/minute limit)
- Results are cached for 24 hours to avoid API limits

**Free Geolocation API:**
- Primary: `http://ip-api.com/json/{ip}` (45 req/min)
- Alternative available in code: `https://ipapi.co/{ip}/json/` (1000 req/day)

### 4. Files Created/Modified

**New Files:**
- `database/migrations/2025_12_11_191500_create_page_views_table.php`
- `app/Models/PageView.php`
- `app/Services/PageViewTracker.php`
- `app/Http/Middleware/TrackPageView.php`
- `app/Http/ViewComposers/PageViewComposer.php`

**Modified Files:**
- `app/Http/Kernel.php` - Added TrackPageView middleware
- `app/Providers/ViewComposerServiceProvider.php` - Registered PageViewComposer
- `resources/views/inc/__frontend_footer.blade.php` - Added statistics display

### 5. Database Structure

**page_views table:**
```
- id
- ip_address (IPv4/IPv6)
- page_url
- page_name
- country
- country_code
- city
- region
- latitude
- longitude
- user_agent
- referer
- visited_at
- created_at
- updated_at
```

### 6. API Rate Limits

**ip-api.com (Primary):**
- FREE tier: 45 requests per minute
- No API key required
- Commercial use allowed
- Cached for 24 hours to reduce calls

**ipapi.co (Alternative):**
- Uncomment in `PageViewTracker.php` to use
- FREE tier: 1,000 requests per day
- No API key required

### 7. Performance Optimization

✅ **Caching:**
- Geolocation data cached for 24 hours per IP
- Statistics cached for 5 minutes

✅ **Silent Failures:**
- Tracking errors don't break the application
- Logged for debugging

✅ **Private IP Detection:**
- Skips localhost/private IPs automatically

### 8. Viewing Statistics

Statistics are automatically displayed in the footer on all pages:
- 4 stat cards showing views count
- Top 5 countries with visit counts
- Beautiful government-style design

### 9. Manual Tracking (Optional)

If you want to track specific pages with custom names:

```php
use App\Services\PageViewTracker;

// In your controller
public function showPage(Request $request)
{
    PageViewTracker::track($request, 'Tender Notice Page');
    return view('your.view');
}
```

### 10. Troubleshooting

**No statistics showing:**
1. Check if migration was run
2. Clear cache
3. Visit some pages to generate data

**Geolocation not working:**
1. Check internet connection
2. Review logs: `storage/logs/laravel.log`
3. Verify API is not blocked by firewall

**Too many API calls:**
- System caches geolocation for 24h per IP
- Statistics cached for 5 min
- Safe for most traffic levels

## Notes

⚠️ **Important:**
- Tracking skips localhost/private IPs
- All errors are logged silently
- No user authentication required
- Works automatically on all frontend pages

🎉 **Ready to use!** Just run migration and start tracking!
