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
        Schema::defaultStringLength(191);

        view()->share('categoryMenu', Category::get());

//        date_default_timezone_set('Europe/Amsterdam');
//        Carbon::setLocale('nl');
//        setlocale(LC_TIME, config('app.locale'));

//        App::setLocale(LC_TIME, 'NL_nl');

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
