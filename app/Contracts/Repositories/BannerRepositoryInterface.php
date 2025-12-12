<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

/**
 * Banner Repository Interface
 *
 * Defines specific contract for banners data access
 */
interface BannerRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Get active banners
     *
     * @return Collection
     */
    public function getActive(): Collection;

    /**
     * Get home slider banners
     *
     * @return Collection
     */
    public function getHomeSlider(): Collection;

    /**
     * Get banners by position
     *
     * @param string $position
     * @return Collection
     */
    public function getByPosition(string $position): Collection;

    /**
     * Increment view count
     *
     * @param int $id
     * @return void
     */
    public function incrementViews(int $id): void;

    /**
     * Increment click count
     *
     * @param int $id
     * @return void
     */
    public function incrementClicks(int $id): void;

    /**
     * Reorder banners
     *
     * @param array $orderData [id => order]
     * @return bool
     */
    public function reorder(array $orderData): bool;
}
