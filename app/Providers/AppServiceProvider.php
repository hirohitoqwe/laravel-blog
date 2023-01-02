<?php

namespace App\Providers;

use App\Services\AdminService;
use App\Services\CalculateService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminService::class, function ($app) {
            return new AdminService(new CalculateService());
        });

        $this->app->bind(CalculateService::class, function ($app) {
            return new CalculateService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
