<?php

namespace App\Providers;

use App\Repositories\V1\Panel\Shop\BranchRepository;
use App\Repositories\V1\Panel\Shop\Interfaces\BranchRepositoryInterface;
use App\Repositories\V1\Panel\Shop\Interfaces\UserRepositoryInterface;
use App\Repositories\V1\Panel\Shop\UserRepository;
use App\Repositories\V1\Panel\Staff\AccountRepository;
use App\Repositories\V1\Panel\Staff\Interfaces\AccountRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\OrderRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\ProductRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\SubAccountRepositoryInterface;
use App\Repositories\V1\Panel\Staff\Interfaces\TransactionRepositoryInterface;
use App\Repositories\V1\Panel\Staff\OrderRepository;
use App\Repositories\V1\Panel\Staff\ProductRepository;
use App\Repositories\V1\Panel\Staff\SubAccountRepository;
use App\Repositories\V1\Panel\Staff\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );
        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );
        $this->app->bind(
            AccountRepositoryInterface::class,
            AccountRepository::class
        );
        $this->app->bind(
            SubAccountRepositoryInterface::class,
            SubAccountRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            BranchRepositoryInterface::class,
            BranchRepository::class
        );
        $this->app->bind(
            \App\Repositories\V1\Panel\Shop\Interfaces\TransactionRepositoryInterface::class,
            \App\Repositories\V1\Panel\Shop\TransactionRepository::class
        );
        $this->app->bind(
            \App\Repositories\V1\Panel\Shop\Interfaces\ShopRepositoryInterface::class,
            \App\Repositories\V1\Panel\Shop\ShopRepository::class
        );
        $this->app->bind(
            \App\Repositories\V1\Panel\Shop\Interfaces\OrderRepositoryInterface::class,
            \App\Repositories\V1\Panel\Shop\OrderRepository::class
        );
        $this->app->bind(
            \App\Repositories\V1\Panel\Shop\Interfaces\ProductRepositoryInterface::class,
            \App\Repositories\V1\Panel\Shop\ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
