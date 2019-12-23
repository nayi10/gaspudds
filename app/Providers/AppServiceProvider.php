<?php

namespace App\Providers;

use App\Helpers\AppHelper;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $about = AppHelper::getJsonFile('about.json');
        $mail = AppHelper::getJsonFile('mail-config.json');
        view()->share('settings', ['about' => $about, 'mail' => $mail]);
    }
}
