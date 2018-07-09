<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class RepositoryServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app->singleton(
                \App\Repositories\ProductsRepositoryInterface::class, \App\Repositories\Eloquents\ProductsRepositoriy::class
        );
        $this->app->singleton(
                \App\Repositories\SalesRepositoryInterface::class, \App\Repositories\Eloquents\SalesRepository::class
        );
        $this->app->singleton(
                \App\Repositories\CategoriesRepositoryInterface::class, \App\Repositories\Eloquents\CategoriesRepository::class
        );
        $this->app->singleton(
                \App\Repositories\ColorRepositoryInterface::class, \App\Repositories\Eloquents\ColorRepository::class
        );
        $this->app->singleton(
                \App\Repositories\MaterialRepositoryInterface::class, \App\Repositories\Eloquents\MaterialRepository::class
        );
        $this->app->singleton(
                \App\Repositories\SizeRepositoryInterface::class, \App\Repositories\Eloquents\SizeRepository::class
        );
        $this->app->singleton(
                \App\Repositories\CollectionRepositoryInterface::class, \App\Repositories\Eloquents\CollectionRepository::class
        );
        $this->app->singleton(
                \App\Repositories\ImagesRepositoryInterface::class, \App\Repositories\Eloquents\ImagesRepository::class
        );
        $this->app->singleton(
                \App\Repositories\UserRepositoryInterface::class, \App\Repositories\Eloquents\UserRepository::class
        );
        $this->app->singleton(
                \App\Repositories\RatingRepositoryInterface::class, \App\Repositories\Eloquents\RatingRepository::class
        );
        $this->app->singleton(
                \App\Repositories\CommentRepositoryInterface::class, \App\Repositories\Eloquents\CommentRepository::class
        );
        $this->app->singleton(
                \App\Repositories\OrdersRepositoryInterface::class, \App\Repositories\Eloquents\OrdersRepository::class
        );
        $this->app->singleton(
                \App\Repositories\InformationRepositoryInterface::class, \App\Repositories\Eloquents\InformationRepository::class
        );
        $this->app->singleton(
                \App\Repositories\OrderRepositoryInterface::class, \App\Repositories\Eloquents\OrderRepository::class
        );
        $this->app->singleton(
                \App\Repositories\OrderDetailRepositoryInterface::class, \App\Repositories\Eloquents\OrderDetailRepository::class
        );
        $this->app->singleton(
                \App\Repositories\ImagesBannerRepositoryInterface::class, \App\Repositories\Eloquents\ImageBannerRepository::class
        );
        $this->app->singleton(
                \App\Repositories\Dtb_product_colorRepositoryInterface::class, \App\Repositories\Eloquents\Dtb_product_colorRepository::class
        );
        $this->app->singleton(
                \App\Repositories\Dtb_product_sizeRepositoryInterface::class, \App\Repositories\Eloquents\Dtb_product_sizeRepository::class
        );
        $this->app->singleton(
                \App\Repositories\Dtb_product_matterialRepositoryInterface::class, \App\Repositories\Eloquents\Dtb_product_materialRepository::class
        );
        $this->app->singleton(
                \App\Repositories\Dtb_product_collectionRepositoryInterface::class, \App\Repositories\Eloquents\Dtb_product_collectionRepository::class
        );
        $this->app->singleton(
                \App\Repositories\NewRepositoryInterface::class, \App\Repositories\Eloquents\NewRepository::class
        );
        $this->app->singleton(
                \App\Repositories\CustomerRepositoryInterface::class, \App\Repositories\Eloquents\CustomerRepository::class
        );
    }

}
