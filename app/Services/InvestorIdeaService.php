<?php

namespace App\Services;

use App\Contracts\Repositories\InvestorIdeaRepositoryInterface;
use App\DTOs\InvestorIdeaDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Investor Idea Service
 *
 * Handles business logic for investor ideas
 * Implements SRP - only responsible for investor idea business rules
 */
class InvestorIdeaService
{
    /**
     * @var InvestorIdeaRepositoryInterface
     */
    protected InvestorIdeaRepositoryInterface $repository;

    /**
     * InvestorIdeaService constructor
     *
     * @param InvestorIdeaRepositoryInterface $repository
     */
    public function __construct(InvestorIdeaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create new investor idea
     *
     * @param InvestorIdeaDTO $dto
     * @return int ID of created idea
     */
    public function create(InvestorIdeaDTO $dto): int
    {
        $data = $dto->toArray();

        // Handle file uploads
        $data['business_plan_file'] = $this->handleFileUpload($dto->business_plan_file, 'investor_ideas/business_plans');
        $data['presentation_file'] = $this->handleFileUpload($dto->presentation_file, 'investor_ideas/presentations');
        $data['other_documents'] = $this->handleFileUpload($dto->other_documents, 'investor_ideas/documents');

        // Add metadata
        $data['ip_address'] = request()->ip();
        $data['user_agent'] = request()->userAgent();
        $data['status'] = 'pending';

        $idea = $this->repository->create($data);

        return $idea->id;
    }

    /**
     * Get ideas by status
     *
     * @param string $status
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getByStatus(string $status, int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->getByStatus($status, $perPage);
    }

    /**
     * Get recent ideas for homepage
     *
     * @param int $limit
     * @return Collection
     */
    public function getRecentForHomepage(int $limit = 5): Collection
    {
        return $this->repository->getRecent(30, $limit);
    }

    /**
     * Update idea status
     *
     * @param int $id
     * @param string $status
     * @param int|null $reviewedBy
     * @param string|null $notes
     * @return bool
     */
    public function updateStatus(int $id, string $status, ?int $reviewedBy = null, ?string $notes = null): bool
    {
        return $this->repository->updateStatus($id, $status, $reviewedBy, $notes);
    }

    /**
     * Search ideas
     *
     * @param string $query
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function search(string $query, int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->search($query, $perPage);
    }

    /**
     * Delete idea and its files
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $idea = $this->repository->find($id);

        if (!$idea) {
            return false;
        }

        // Delete associated files
        $this->deleteFile($idea->business_plan_file);
        $this->deleteFile($idea->presentation_file);
        $this->deleteFile($idea->other_documents);

        return $this->repository->delete($id);
    }

    /**
     * Handle file upload
     *
     * @param mixed $file
     * @param string $path
     * @return string|null
     */
    protected function handleFileUpload($file, string $path): ?string
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        return $file->store($path, 'public');
    }

    /**
     * Delete file from storage
     *
     * @param string|null $filePath
     * @return void
     */
    protected function deleteFile(?string $filePath): void
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}
