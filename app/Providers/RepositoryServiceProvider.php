<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepositoryEloquent;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\BaseRepositoryEloquent;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\IPManage\IPAddressRepositoryEloquent;
use App\Repositories\IPManage\IPAddressRepositoryInterface;
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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepositoryEloquent::class);
        $this->app->bind(IPAddressRepositoryInterface::class, IPAddressRepositoryEloquent::class);
        $this->app->bind(BaseRepositoryInterface::class, BaseRepositoryEloquent::class);
    }
}
