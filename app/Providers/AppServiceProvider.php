<?php

namespace App\Providers;

use App\Models\Cities;
use App\Models\Countries;
use Illuminate\Support\Facades\View;
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
        $countries = Countries::where('for_sanatorium', 1)->where('status', 1)->get();
        $cities = Cities::where('status', 1)->get();
        View::share(['countries' => $countries, 'cities' => $cities]);
    }
}
