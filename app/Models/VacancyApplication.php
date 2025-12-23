<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacancyApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'position',
        'message',
        'resume_path',
        'status',
        'admin_notes',
        'reviewed_at',
        'reviewed_by',
        'ip_address',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'new' => 'Yangi',
            'reviewed' => 'Ko\'rib chiqilgan',
            'accepted' => 'Qabul qilingan',
            'rejected' => 'Rad etilgan',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'new' => 'warning',
            'reviewed' => 'info',
            'accepted' => 'success',
            'rejected' => 'danger',
            default => 'secondary',
        };
    }
}
