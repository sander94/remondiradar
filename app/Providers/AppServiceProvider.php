<?php

namespace App\Providers;

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

        $regionsArray =       
            ['0' => 'Vali piirkond',
            '1' => 'Pärnu', 
            '2' => 'Tallinn', 
            '3' => 'Tartu'
            ];

        view()->share('regionsArray', $regionsArray);
    }
}
