<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\OrderRepository;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class RepositoryServiceProviderOrder extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            OrderRepositoryInterface::class, 
            OrderRepository::class
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
