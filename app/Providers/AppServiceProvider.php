<?php

namespace App\Providers;

use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Carbon::setUTF8(true);
        Carbon::setLocale(config('app.locale'));

        setlocale(LC_TIME, 'nl_NL.utf8');

        Schema::defaultStringLength(191);

        if (Schema::hasTable('category')) {
            view()->share('categoryMenu', Category::get());
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        Carbon::setLocale(app()->getLocale());
    }
}
