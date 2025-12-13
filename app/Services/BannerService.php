<?php

namespace App\Services;

use App\Contracts\Repositories\BannerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Banner Service
 *
 * Handles business logic for banners/sliders
 * Implements SRP - only responsible for banner business rules
 */
class BannerService
{
    /**
     * @var BannerRepositoryInterface
     */
    protected BannerRepositoryInterface $repository;

    /**
     * Cache duration in seconds (1 hour)
     */
    protected int $cacheDuration = 3600;

    /**
     * BannerService constructor
     *
     * @param BannerRepositoryInterface $repository
     */
    public function __construct(BannerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get home slider banners with caching
     *
     * @return Collection
     */
    public function getHomeSlider(): Collection
    {
        return Cache::remember(
            'banners.home_slider',
            $this->cacheDuration,
            fn() => $this->repository->getHomeSlider()
        );
    }

    /**
     * Get banners by position with caching
     *
     * @param string $position
     * @return Collection
     */
    public function getByPosition(string $position): Collection
    {
        return Cache::remember(
            "banners.position.{$position}",
            $this->cacheDuration,
            fn() => $this->repository->getByPosition($position)
        );
    }

    /**
     * Track banner view
     *
     * @param int $id
     * @return void
     */
    public function trackView(int $id): void
    {
        $this->repository->incrementViews($id);
    }

    /**
     * Track banner click
     *
     * @param int $id
     * @return void
     */
    public function trackClick(int $id): void
    {
        $this->repository->incrementClicks($id);
    }

    /**
     * Clear banner cache
     *
     * @return void
     */
    public function clearCache(): void
    {
        Cache::forget('banners.home_slider');
        Cache::forget('banners.position.side_banner');
        Cache::forget('banners.position.news_banner');
    }

    /**
     * Reorder banners and clear cache
     *
     * @param array $orderData
     * @return bool
     */
    public function reorder(array $orderData): bool
    {
        $result = $this->repository->reorder($orderData);

        if ($result) {
            $this->clearCache();
        }

        return $result;
    }
}
