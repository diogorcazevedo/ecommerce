<?php

namespace ecommerce\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'ecommerce\Repositories\CategoryRepository',
            'ecommerce\Repositories\CategoryRepositoryEloquent'
        );

        $this->app->bind(
            'ecommerce\Repositories\ProductRepository',
            'ecommerce\Repositories\ProductRepositoryEloquent'
        );
        $this->app->bind(
            'ecommerce\Repositories\ClientRepository',
            'ecommerce\Repositories\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'ecommerce\Repositories\UserRepository',
            'ecommerce\Repositories\UserRepositoryEloquent'
        );
        $this->app->bind(
            'ecommerce\Repositories\OrderRepository',
            'ecommerce\Repositories\OrderRepositoryEloquent'
        );

        $this->app->bind(
            'ecommerce\Repositories\CupomRepository',
            'ecommerce\Repositories\CupomRepositoryEloquent'
        );
    }
}
