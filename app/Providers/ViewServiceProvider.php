<?php

namespace App\Providers;
use App\Models\Status;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['orders.fields'], function ($view) {
            $statusItems = Status::pluck('name','id')->toArray();
            $view->with('statusItems', $statusItems);
        });
        //
    }
}