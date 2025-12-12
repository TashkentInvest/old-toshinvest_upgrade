<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Banner Model
 *
 * Represents homepage banners/sliders
 * Implements SRP - handles only data representation
 */
class Banner extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title_uz',
        'title_ru',
        'title_en',
        'description_uz',
        'description_ru',
        'description_en',
        'image_path',
        'image_alt_text',
        'button_text_uz',
        'button_text_ru',
        'button_text_en',
        'button_link',
        'open_new_tab',
        'display_order',
        'is_active',
        'position',
        'start_date',
        'end_date',
        'click_count',
        'view_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'open_new_tab' => 'boolean',
        'is_active' => 'boolean',
        'display_order' => 'integer',
        'click_count' => 'integer',
        'view_count' => 'integer',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get title in current locale
     *
     * @return string
     */
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_ru;
    }

    /**
     * Get description in current locale
     *
     * @return string|null
     */
    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_ru;
    }

    /**
     * Get button text in current locale
     *
     * @return string|null
     */
    public function getButtonTextAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"button_text_{$locale}"} ?? $this->button_text_ru;
    }

    /**
     * Scope: Active banners
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Scheduled banners (within date range)
     */
    public function scopeScheduled($query)
    {
        $now = now();
        return $query->where(function ($q) use ($now) {
            $q->where(function ($subQ) use ($now) {
                $subQ->whereNull('start_date')
                     ->orWhere('start_date', '<=', $now);
            })
            ->where(function ($subQ) use ($now) {
                $subQ->whereNull('end_date')
                     ->orWhere('end_date', '>=', $now);
            });
        });
    }

    /**
     * Scope: Home slider banners
     */
    public function scopeHomeSlider($query)
    {
        return $query->where('position', 'home_slider');
    }

    /**
     * Scope: Ordered by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    /**
     * Increment view count
     *
     * @return void
     */
    public function incrementViews(): void
    {
        $this->increment('view_count');
    }

    /**
     * Increment click count
     *
     * @return void
     */
    public function incrementClicks(): void
    {
        $this->increment('click_count');
    }
}
