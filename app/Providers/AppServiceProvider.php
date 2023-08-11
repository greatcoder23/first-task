<?php

namespace App\Providers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\CategoryRepositoryImpl;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserRepositoryImpl;
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
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, UserRepositoryImpl::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImpl::class);
    }
}
