<?php

namespace App\Providers;

use App\Interfaces\AuthInterface;
use App\Interfaces\BrandInterface;
use App\Interfaces\CareerInterface;
use App\Interfaces\ContactInterface;
use App\Interfaces\EquipmentTypeInterface;
use App\Interfaces\FaqInterface;
use App\Interfaces\FeedbackInterface;
use App\Interfaces\InventoryInterface;
use App\Interfaces\TeamInterface;
use App\Interfaces\TestimonialsInterface;
use App\Repositories\AuthRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CareerRepository;
use App\Repositories\ContactRepository;
use App\Repositories\EquipmentTypeRepository;
use App\Repositories\FaqRepository;
use App\Repositories\FeedbackRepository;
use App\Repositories\InventoryRepository;
use App\Repositories\TeamRepository;
use App\Repositories\TestimonialsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            AuthInterface::class,
            AuthRepository::class
        );

        $this->app->singleton(
            EquipmentTypeInterface::class,
            EquipmentTypeRepository::class
        );

        $this->app->singleton(
            BrandInterface::class,
            BrandRepository::class
        );

        $this->app->singleton(
            FaqInterface::class,
            FaqRepository::class
        );

        $this->app->singleton(
            InventoryInterface::class,
            InventoryRepository::class
        );

        $this->app->singleton(
            FeedbackInterface::class,
            FeedbackRepository::class
        );

        $this->app->singleton(
            CareerInterface::class,
            CareerRepository::class
        );

        $this->app->singleton(
            TeamInterface::class,
            TeamRepository::class
        );

        $this->app->singleton(
            ContactInterface::class,
            ContactRepository::class
        );

        $this->app->singleton(
            TestimonialsInterface::class,
            TestimonialsRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
