<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * InvestorIdea Model
 *
 * Represents investor project proposals/ideas
 * Implements SRP - handles only data representation
 */
class InvestorIdea extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'company_name',
        'contact_person',
        'position',
        'email',
        'phone',
        'website',
        'project_title_uz',
        'project_title_ru',
        'project_title_en',
        'project_description_uz',
        'project_description_ru',
        'project_description_en',
        'estimated_investment',
        'currency',
        'estimated_timeline_months',
        'industry_sector',
        'district_id',
        'preferred_location',
        'business_plan_file',
        'presentation_file',
        'other_documents',
        'status',
        'admin_notes',
        'reviewed_at',
        'reviewed_by',
        'ip_address',
        'user_agent',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'estimated_investment' => 'decimal:2',
        'estimated_timeline_months' => 'integer',
        'reviewed_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the district that the idea belongs to
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the user who reviewed this idea
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    /**
     * Get project title in current locale
     *
     * @return string
     */
    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"project_title_{$locale}"} ?? $this->project_title_ru;
    }

    /**
     * Get project description in current locale
     *
     * @return string
     */
    public function getDescriptionAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"project_description_{$locale}"} ?? $this->project_description_ru;
    }

    /**
     * Scope: Pending ideas
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope: Under review
     */
    public function scopeUnderReview($query)
    {
        return $query->where('status', 'under_review');
    }

    /**
     * Scope: Approved ideas
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope: Recent ideas (last 30 days)
     */
    public function scopeRecent($query)
    {
        return $query->where('created_at', '>=', now()->subDays(30));
    }
}
