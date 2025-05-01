<?php

namespace App\Providers;

use App\Models\Address;
use App\repositories\AddressRepository;
use App\repositories\CategorieRepository;
use App\repositories\interfaces\AddressRepositoryInterface;
use App\repositories\interfaces\CategorieRepositoryInterface;
use App\repositories\interfaces\OrderRepositoryInterface;
use App\repositories\interfaces\productRepositoryInterface;
use App\repositories\interfaces\RoleRepositoryInterface;
use App\repositories\interfaces\UserRepositoryInterface;
use App\repositories\OrderRepository;
use App\repositories\ProductRepository;
use App\repositories\RoleRepository;
use App\repositories\UserRepository;
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
        $this->app->bind(OrderRepositoryInterface::class ,OrderRepository::class);
        $this->app->bind(productRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(AddressRepositoryInterface::class,AddressRepository::class);
        $this->app->bind(CategorieRepositoryInterface::class,CategorieRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ini_set('memory_limit', '440M');    }
}
