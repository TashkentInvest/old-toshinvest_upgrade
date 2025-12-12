<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\InvestorIdeaRepositoryInterface;
use App\Models\InvestorIdea;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Investor Idea Repository
 *
 * Handles data access for investor ideas
 * Implements SRP - only responsible for data access logic
 */
class InvestorIdeaRepository extends BaseRepository implements InvestorIdeaRepositoryInterface
{
    /**
     * InvestorIdeaRepository constructor
     *
     * @param InvestorIdea $model
     */
    public function __construct(InvestorIdea $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function getByStatus(string $status, int $perPage = 15): LengthAwarePaginator
    {
        return $this->model
            ->where('status', $status)
            ->with(['district', 'reviewer'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function getRecent(int $days = 30, int $limit = 10): Collection
    {
        return $this->model
            ->where('created_at', '>=', now()->subDays($days))
            ->with(['district'])
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function getByDistrict(int $districtId, int $perPage = 15): LengthAwarePaginator
    {
        return $this->model
            ->where('district_id', $districtId)
            ->with(['district', 'reviewer'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function updateStatus(int $id, string $status, ?int $reviewedBy = null, ?string $notes = null): bool
    {
        $data = [
            'status' => $status,
            'reviewed_at' => now(),
        ];

        if ($reviewedBy !== null) {
            $data['reviewed_by'] = $reviewedBy;
        }

        if ($notes !== null) {
            $data['admin_notes'] = $notes;
        }

        return $this->update($id, $data);
    }

    /**
     * @inheritDoc
     */
    public function search(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return $this->model
            ->where(function ($q) use ($query) {
                $q->where('company_name', 'LIKE', "%{$query}%")
                  ->orWhere('contact_person', 'LIKE', "%{$query}%")
                  ->orWhere('project_title_uz', 'LIKE', "%{$query}%")
                  ->orWhere('project_title_ru', 'LIKE', "%{$query}%")
                  ->orWhere('project_title_en', 'LIKE', "%{$query}%")
                  ->orWhere('industry_sector', 'LIKE', "%{$query}%");
            })
            ->with(['district', 'reviewer'])
            ->latest()
            ->paginate($perPage);
    }
}
