<?php

namespace App\Providers;

use App\Service\ProductService;
use App\Service\ServiceInterface;
use App\Service\UserService;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceInterface::class, ProductService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
