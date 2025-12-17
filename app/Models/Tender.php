<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tender extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'title_uz',
        'title_en',
        'code',
        'lot_number',
        'lot_url',
        'subject',
        'subject_uz',
        'subject_en',
        'location',
        'location_uz',
        'location_en',
        'location_description',
        'location_description_uz',
        'location_description_en',
        'technical_requirements',
        'qualification_requirements',
        'customer_name',
        'customer_tin',
        'customer_address',
        'customer_phone',
        'customer_email',
        'announcement_date',
        'submission_deadline',
        'documents',
        'status',
        'is_urgent',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'technical_requirements' => 'array',
        'qualification_requirements' => 'array',
        'documents' => 'array',
        'announcement_date' => 'date',
        'submission_deadline' => 'date',
        'is_urgent' => 'boolean',
    ];

    /**
     * Status constants
     */
    const STATUS_DRAFT = 'draft';
    const STATUS_ACTIVE = 'active';
    const STATUS_CLOSED = 'closed';
    const STATUS_CANCELLED = 'cancelled';

    /**
     * Get localized title based on current locale
     */
    public function getLocalizedTitle(): string
    {
        $locale = app()->getLocale();

        if ($locale === 'uz' && $this->title_uz) {
            return $this->title_uz;
        }
        if ($locale === 'en' && $this->title_en) {
            return $this->title_en;
        }

        return $this->title;
    }

    /**
     * Get localized subject based on current locale
     */
    public function getLocalizedSubject(): string
    {
        $locale = app()->getLocale();

        if ($locale === 'uz' && $this->subject_uz) {
            return $this->subject_uz;
        }
        if ($locale === 'en' && $this->subject_en) {
            return $this->subject_en;
        }

        return $this->subject;
    }

    /**
     * Get localized location based on current locale
     */
    public function getLocalizedLocation(): string
    {
        $locale = app()->getLocale();

        if ($locale === 'uz' && $this->location_uz) {
            return $this->location_uz;
        }
        if ($locale === 'en' && $this->location_en) {
            return $this->location_en;
        }

        return $this->location;
    }

    /**
     * Get localized location description
     */
    public function getLocalizedLocationDescription(): ?string
    {
        $locale = app()->getLocale();

        if ($locale === 'uz' && $this->location_description_uz) {
            return $this->location_description_uz;
        }
        if ($locale === 'en' && $this->location_description_en) {
            return $this->location_description_en;
        }

        return $this->location_description;
    }

    /**
     * Check if tender is still open for submissions
     */
    public function isOpen(): bool
    {
        return $this->status === self::STATUS_ACTIVE
            && $this->submission_deadline >= now()->startOfDay();
    }

    /**
     * Check if tender is expired
     */
    public function isExpired(): bool
    {
        return $this->submission_deadline < now()->startOfDay();
    }

    /**
     * Get days remaining until deadline
     */
    public function getDaysRemaining(): int
    {
        if ($this->isExpired()) {
            return 0;
        }

        return now()->startOfDay()->diffInDays($this->submission_deadline);
    }

    /**
     * Get status badge class
     */
    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            self::STATUS_ACTIVE => 'gov-badge-success',
            self::STATUS_CLOSED => 'gov-badge-secondary',
            self::STATUS_CANCELLED => 'gov-badge-danger',
            default => 'gov-badge-warning',
        };
    }

    /**
     * Get status label
     */
    public function getStatusLabel(): string
    {
        return match($this->status) {
            self::STATUS_ACTIVE => __('frontend.tenders.status_active'),
            self::STATUS_CLOSED => __('frontend.tenders.status_closed'),
            self::STATUS_CANCELLED => __('frontend.tenders.status_cancelled'),
            default => __('frontend.tenders.status_draft'),
        };
    }

    /**
     * Scope for active tenders
     */
    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    /**
     * Scope for open tenders (active and not expired)
     */
    public function scopeOpen($query)
    {
        return $query->active()
            ->where('submission_deadline', '>=', now()->startOfDay());
    }

    /**
     * Scope for filtering by search
     */
    public function scopeSearch($query, $search)
    {
        if (empty($search)) {
            return $query;
        }

        return $query->where(function($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('title_uz', 'like', "%{$search}%")
              ->orWhere('title_en', 'like', "%{$search}%")
              ->orWhere('subject', 'like', "%{$search}%")
              ->orWhere('code', 'like', "%{$search}%")
              ->orWhere('lot_number', 'like', "%{$search}%");
        });
    }

    /**
     * Get creator
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get updater
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
