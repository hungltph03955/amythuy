<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


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
        view()->composer('templates.homepage', function ($view) {
            $cates = DB::table('categories')->where('parent_id', '=', 0)->get();
            $view->with('cates', $cates);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public
    function register()
    {
//        $this->app->singleton(
//            \App\Repositories\ShopsRepositoryInterface::class,
//            \App\Repositories\Eloquents\ShopsRepository::class
//        );
    }
}
