<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\IProductService;
use App\Services\ProductService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IProductService::class, ProductService::class);
    }
}
