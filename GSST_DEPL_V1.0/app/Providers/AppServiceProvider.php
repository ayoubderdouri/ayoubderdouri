<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use View;
use App\Models\TextSensibilisation;


class AppServiceProvider extends ServiceProvider
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
        $text = TextSensibilisation::all();
        View::share('text',$text );
    }
}
