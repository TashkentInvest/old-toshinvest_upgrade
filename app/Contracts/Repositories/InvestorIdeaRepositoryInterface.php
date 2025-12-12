<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Investor Idea Repository Interface
 *
 * Defines specific contract for investor ideas data access
 */
interface InvestorIdeaRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get ideas by status
     *
     * @param string $status
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getByStatus(string $status, int $perPage = 15): LengthAwarePaginator;

    /**
     * Get recent ideas
     *
     * @param int $days
     * @param int $limit
     * @return Collection
     */
    public function getRecent(int $days = 30, int $limit = 10): Collection;

    /**
     * Get ideas by district
     *
     * @param int $districtId
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getByDistrict(int $districtId, int $perPage = 15): LengthAwarePaginator;

    /**
     * Update status
     *
     * @param int $id
     * @param string $status
     * @param int|null $reviewedBy
     * @param string|null $notes
     * @return bool
     */
    public function updateStatus(int $id, string $status, ?int $reviewedBy = null, ?string $notes = null): bool;

    /**
     * Search ideas
     *
     * @param string $query
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $query, int $perPage = 15): LengthAwarePaginator;
}
