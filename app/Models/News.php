<?php

// Model: app/Models/News.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'link',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get the image path/URL
     */
    public function getImagePath()
    {
        if (!$this->image) {
            return null;
        }

        // If it's a JSON array, return the first image
        if (Str::startsWith($this->image, '[')) {
            $images = json_decode($this->image, true);
            return $images[0] ?? null;
        }

        return $this->image;
    }

    /**
     * Get all images as an array
     */
    public function getImageArray()
    {
        if (!$this->image) {
            return [];
        }

        // If it's a JSON array
        if (Str::startsWith($this->image, '[')) {
            return json_decode($this->image, true) ?: [];
        }

        // Single image
        return [$this->image];
    }

    /**
     * Check if news has multiple images
     */
    public function hasMultipleImages()
    {
        return count($this->getImageArray()) > 1;
    }

    /**
     * Get the primary (first) image
     */
    public function getPrimaryImage()
    {
        $images = $this->getImageArray();
        return $images[0] ?? null;
    }

    /**
     * Check if the image is an uploaded file
     */
    public function isUploadedImage($imageUrl = null)
    {
        $image = $imageUrl ?: $this->getImagePath();
        return $image && Str::startsWith($image, '/storage/');
    }

    /**
     * Scope for published news
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now())->whereNotNull('published_at');
    }

    /**
     * Scope for draft news
     */
    public function scopeDraft($query)
    {
        return $query->where('published_at', '>', now())->orWhereNull('published_at');
    }
}
