<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
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

    /**
     * Check whether notice should be treated as archived.
     */
    public function isArchived(): bool
    {
        if ($this->status !== 'active') {
            return true;
        }

        $deadline = $this->resolveDeadlineDateTime();

        return $deadline ? $deadline->isPast() : false;
    }

    /**
     * Resolve deadline from localized fields.
     */
    public function resolveDeadlineDateTime(): ?Carbon
    {
        $candidates = [
            $this->deadline_en,
            $this->deadline_ru,
            $this->deadline_uz,
        ];

        foreach ($candidates as $candidate) {
            $parsed = $this->parseDeadlineString($candidate);

            if ($parsed) {
                return $parsed;
            }
        }

        return null;
    }

    /**
     * Parse deadline string into Carbon instance.
     */
    private function parseDeadlineString(?string $value): ?Carbon
    {
        if (!$value) {
            return null;
        }

        $normalized = trim($value);
        $normalized = preg_replace('/\s+/', ' ', $normalized);

        if (!$normalized) {
            return null;
        }

        try {
            return Carbon::parse($normalized);
        } catch (\Throwable $e) {
            // Fallbacks below
        }

        if (preg_match('/(\d{1,2})[\.\/-](\d{1,2})[\.\/-](\d{4})(?:[^\d]+(\d{1,2}):(\d{2}))?/u', $normalized, $m)) {
            $hour = $m[4] ?? '23';
            $minute = $m[5] ?? '59';

            return Carbon::createFromFormat('d.m.Y H:i', sprintf('%02d.%02d.%04d %02d:%02d', $m[1], $m[2], $m[3], $hour, $minute));
        }

        $uzMonths = [
            'yanvar' => 'January',
            'fevral' => 'February',
            'mart' => 'March',
            'aprel' => 'April',
            'may' => 'May',
            'iyun' => 'June',
            'iyul' => 'July',
            'avgust' => 'August',
            'sentyabr' => 'September',
            'oktyabr' => 'October',
            'noyabr' => 'November',
            'dekabr' => 'December',
            'yil' => '',
        ];

        $ruMonths = [
            'января' => 'January',
            'февраля' => 'February',
            'марта' => 'March',
            'апреля' => 'April',
            'мая' => 'May',
            'июня' => 'June',
            'июля' => 'July',
            'августа' => 'August',
            'сентября' => 'September',
            'октября' => 'October',
            'ноября' => 'November',
            'декабря' => 'December',
            'года' => '',
        ];

        $translated = str_ireplace(array_keys($uzMonths), array_values($uzMonths), $normalized);
        $translated = str_ireplace(array_keys($ruMonths), array_values($ruMonths), $translated);
        $translated = preg_replace('/\s+/', ' ', trim($translated));

        if (!$translated) {
            return null;
        }

        try {
            return Carbon::parse($translated);
        } catch (\Throwable $e) {
            return null;
        }
    }
}
