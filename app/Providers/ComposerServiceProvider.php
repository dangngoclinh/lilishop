<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('index.layout.primary', 'App\Http\ViewComposers\PrimaryMenuComposer');
        View::composer('index.widgets.categories', 'App\Http\ViewComposers\BlogMenuComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
