<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class InvestmentProject extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'project_code',
        'district_uz', 'district_ru', 'district_en',
        'mahalla_uz', 'mahalla_ru', 'mahalla_en',
        'land_area',
        'announcement_date',
        'submission_deadline',
        'status',
        'announcement_pdf',
        'attachments_zip',
        'has_extension',
        'extended_deadline',
        'extension_note_uz', 'extension_note_ru', 'extension_note_en',
        'order',
        'is_featured',
    ];

    protected $casts = [
        'announcement_date' => 'date',
        'submission_deadline' => 'datetime',
        'extended_deadline' => 'datetime',
        'has_extension' => 'boolean',
        'is_featured' => 'boolean',
    ];

    /**
     * Get localized district name
     */
    public function getDistrict($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "district_{$locale}";
        return $this->$field ?? $this->district_uz;
    }

    /**
     * Get localized mahalla name
     */
    public function getMahalla($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "mahalla_{$locale}";
        return $this->$field ?? $this->mahalla_uz;
    }

    /**
     * Get localized extension note
     */
    public function getExtensionNote($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $field = "extension_note_{$locale}";
        return $this->$field ?? $this->extension_note_uz;
    }

    /**
     * Get formatted deadline
     */
    public function getFormattedDeadline()
    {
        return $this->submission_deadline->format('d.m.Y, H:i');
    }

    /**
     * Get formatted extended deadline
     */
    public function getFormattedExtendedDeadline()
    {
        return $this->extended_deadline ? $this->extended_deadline->format('d.m.Y, H:i') : null;
    }

    /**
     * Check if project is expired
     */
    public function isExpired()
    {
        $deadline = $this->has_extension && $this->extended_deadline
            ? $this->extended_deadline
            : $this->submission_deadline;

        return $deadline < now();
    }

    /**
     * Check if project is active
     */
    public function isActive()
    {
        return $this->status === 'active' && !$this->isExpired();
    }

    /**
     * Scope for active projects
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope for archived projects
     */
    public function scopeArchive($query)
    {
        return $query->where('status', 'archive');
    }

    /**
     * Scope for ordered projects
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('created_at', 'desc');
    }

    /**
     * Scope for featured projects
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
