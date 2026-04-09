<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Repositories\BaseRepositoryInterface;
use App\Contracts\Repositories\InvestorIdeaRepositoryInterface;
use App\Contracts\Repositories\BannerRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\InvestorIdeaRepository;
use App\Repositories\Eloquent\BannerRepository;

/**
 * Repository Service Provider
 *
 * Binds repository interfaces to concrete implementations
 * Implements Dependency Inversion Principle (DIP)
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Bind repository interfaces to implementations
        $this->app->bind(
            InvestorIdeaRepositoryInterface::class,
            InvestorIdeaRepository::class
        );

        $this->app->bind(
            BannerRepositoryInterface::class,
            BannerRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
