<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProcurementNotice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title_uz',
        'title_ru',
        'title_en',
        'description_uz',
        'description_ru',
        'description_en',
        'announcement_date_uz',
        'announcement_date_ru',
        'announcement_date_en',
        'deadline_uz',
        'deadline_ru',
        'deadline_en',
        'status',
        'folder',
        'announcement_pdf',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Boot method to auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title_uz . '-' . Str::random(6));
            }
        });
    }

    /**
     * Relationship with documents
     */
    public function documents()
    {
        return $this->hasMany(ProcurementDocument::class)->orderBy('order');
    }

    /**
     * Scope for active notices
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for featured notices
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope for ordering by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Get localized title
     */
    public function getTitle($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "title_{$locale}";
        return $this->$field ?? $this->title_uz;
    }

    /**
     * Get localized description
     */
    public function getDescription($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "description_{$locale}";
        return $this->$field ?? $this->description_uz;
    }

    /**
     * Get localized deadline
     */
    public function getDeadline($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "deadline_{$locale}";
        return $this->$field ?? $this->deadline_uz;
    }

    /**
     * Get localized announcement date
     */
    public function getAnnouncementDate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "announcement_date_{$locale}";
        return $this->$field ?? $this->announcement_date_uz;
    }

    /**
     * Get full folder path
     */
    public function getFolderPathAttribute()
    {
        return public_path($this->folder);
    }

    /**
     * Get announcement PDF URL
     */
    public function getAnnouncementPdfUrlAttribute()
    {
        return $this->announcement_pdf ? asset($this->announcement_pdf) : null;
    }

    /**
     * Get documents count
     */
    public function getDocumentsCountAttribute()
    {
        return $this->documents()->count();
    }
}
