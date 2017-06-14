<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        \Carbon\Carbon::setLocale(config('app.locale'));

        view()->composer('layouts.categories_selector',function($view){
            $view->with('superCategories',\App\Categories::superCategories());
        });
         
        view()->composer('layouts.app',function($view){
            $view->with('superCategories',\App\Categories::superCategories());
        });
        
        view()->composer('qaviews.sidebar',function($view){
            $view->with('superCategories',\App\Categories::superCategories());
        });
        
        view()->composer('tests.sidebar',function($view){
            $view->with('superCategories',\App\Categories::superCategories());
        });
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
