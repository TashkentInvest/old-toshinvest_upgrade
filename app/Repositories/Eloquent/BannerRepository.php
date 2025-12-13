<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\BannerRepositoryInterface;
use App\Models\Banner;
use Illuminate\Database\Eloquent\Collection;

/**
 * Banner Repository
 *
 * Handles data access for banners
 * Implements SRP - only responsible for data access logic
 */
class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    /**
     * BannerRepository constructor
     *
     * @param Banner $model
     */
    public function __construct(Banner $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function getActive(): Collection
    {
        return $this->model
            ->active()
            ->scheduled()
            ->ordered()
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function getHomeSlider(): Collection
    {
        return $this->model
            ->active()
            ->scheduled()
            ->homeSlider()
            ->ordered()
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function getByPosition(string $position): Collection
    {
        return $this->model
            ->active()
            ->scheduled()
            ->where('position', $position)
            ->ordered()
            ->get();
    }

    /**
     * @inheritDoc
     */
    public function incrementViews(int $id): void
    {
        $banner = $this->find($id);

        if ($banner) {
            $banner->incrementViews();
        }
    }

    /**
     * @inheritDoc
     */
    public function incrementClicks(int $id): void
    {
        $banner = $this->find($id);

        if ($banner) {
            $banner->incrementClicks();
        }
    }

    /**
     * @inheritDoc
     */
    public function reorder(array $orderData): bool
    {
        try {
            foreach ($orderData as $id => $order) {
                $this->update($id, ['display_order' => $order]);
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
