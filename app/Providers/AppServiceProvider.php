<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Brand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (\Schema::hasTable('categories'))
        {
           $categories = Category::all();
           View::share('categories', $categories);
        }
        if (\Schema::hasTable('categories'))
        {
           $brands = Brand::all();
           View::share('brands', $brands);
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
