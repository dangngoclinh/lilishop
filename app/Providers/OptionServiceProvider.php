<?php

namespace App\Providers;

use App\Model\Option;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Config;

class OptionServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (Cache::has('option'))
            config()->set('option', Cache::get('option'));
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
