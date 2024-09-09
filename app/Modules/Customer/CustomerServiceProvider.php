<?php

namespace App\Modules\Customer;

use Illuminate\Support\ServiceProvider;

use App\Modules\Customer\Services\CustomerRepository;
use App\Modules\Product\Repositories\ProductRepositoryInterface;
use App\Modules\Customer\Repositories\CustomerRepositoryInterface;



class CustomerServiceProvider extends ServiceProvider{
public function register():void{
    $this->mergeConfigFrom(__DIR__.'/config.php','customer');
    $this->app->bind(CustomerRepositoryInterface::class,CustomerRepository::class);
}
public function boot():void{
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadViewsFrom(__DIR__.'/views','customer');
}

}
