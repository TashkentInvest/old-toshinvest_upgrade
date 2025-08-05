<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'content', 'link', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the image path with fallback
     */
    public function getImagePath()
    {
        // Check if the image is a URL
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image; // Return the URL
        }

        // Check if local image exists
        if ($this->image && file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }

        // Return default placeholder image
        return asset('images/news-placeholder.jpg'); // Make sure to add a placeholder image
    }

    /**
     * Get formatted published date
     */
    public function getFormattedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d.m.Y') : '';
    }

    /**
     * Get human readable date
     */
    public function getHumanDateAttribute()
    {
        return $this->published_at ? $this->published_at->diffForHumans() : '';
    }

    /**
     * Get excerpt from content
     */
    public function getExcerptAttribute($length = 150)
    {
        return $this->content ? \Str::limit(strip_tags($this->content), $length) : '';
    }

    /**
     * Scope for published news
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    /**
     * Scope for recent news
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('published_at', '>=', now()->subDays($days));
    }

    /**
     * Scope for search
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('content', 'like', '%' . $search . '%');
        });
    }

    /**
     * Get reading time in minutes
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        return ceil($wordCount / 200); // Average reading speed: 200 words per minute
    }
}
