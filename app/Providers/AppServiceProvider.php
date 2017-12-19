<?php

namespace App\Providers;

use App\Model\News;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('currentUser', Auth::user());
        Schema::defaultStringLength(191);
        Relation::morphMap([
                               'news' => 'App\Model\News',
                               'products' => 'App\Model\Products'
                           ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
