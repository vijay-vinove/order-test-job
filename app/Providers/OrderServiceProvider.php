<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\OrderService;
use App\Services\Interfaces\OrderServiceInterface;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderServiceInterface::class, 
            OrderService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
