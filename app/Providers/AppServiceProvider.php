<?php

namespace App\Providers;

use App\Composer\RegionsComposer;
use App\Composer\ServicesComposer;
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
        View::composer(['layouts.main', 'pricerequest'], RegionsComposer::class);
        View::composer(['admin.workrooms.create', 'admin.workrooms.edit', 'layouts.main'], ServicesComposer::class);
    }
}
