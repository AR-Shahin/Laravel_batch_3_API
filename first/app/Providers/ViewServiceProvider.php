<?php

namespace App\Providers;

use App\Composers\Demo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('nums', [1, 2, 3, 4, 5]);

        View::composer(['abc', 'admin.*'], function ($view) {
            $view->with('custom_title', "This is View Composer Title");
        });

        View::composer(['abc', 'admin.*'], Demo::class);
    }
}
