<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts \{
    IProductService, ICartService, IUserService
};
use App\Services \{
    ProductService, CartService, UserService
};
use App\User;
use App\Observers\UserObserver;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IProductService::class, ProductService::class);

        $this->app->singleton(ICartService::class, CartService::class);

        $this->app->singleton(IUserService::class, UserService::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [IProductService::class, ICartService::class, IUserService::class];
    }
}
