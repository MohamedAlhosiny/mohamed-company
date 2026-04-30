<?php

namespace App\Providers;

use App\Interfaces\BossRepositoryInterface;
use App\Repositories\BossRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            BossRepositoryInterface::class,
            BossRepository::class
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
