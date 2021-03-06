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
        view()->composer(['layouts.endUser.homepage', 'endUser.order.index', 'endUser.cart.index'], function ($view) {
            $cates = DB::table('categories')->where('status', '=', 0)->where('deleted_at', '=', null)->get();
            $carts = \Cart::content();
            $cartCount = \Cart::count();
            $total = \Cart::total(0);
            $view->with(compact('cates', 'carts', 'cartCount', 'total'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->singleton(
//            \App\Repositories\ShopsRepositoryInterface::class,
//            \App\Repositories\Eloquents\ShopsRepository::class
//        );
    }

}
