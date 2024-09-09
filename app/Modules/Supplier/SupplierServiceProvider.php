<?php

namespace App\Modules\Supplier;


use Illuminate\Support\ServiceProvider;
use App\Modules\Supplier\Services\SupplierRepository;
use App\Modules\Supplier\Repositories\SupplierRepositoryInterface;




class SupplierServiceProvider extends ServiceProvider{
    
public function register():void{
    $this->mergeConfigFrom(__DIR__.'/config.php','supplier');
    $this->app->bind(SupplierRepositoryInterface::class,SupplierRepository::class);
}
public function boot():void{
    $this->loadRoutesFrom(__DIR__.'/routes.php');
    $this->loadViewsFrom(__DIR__.'/views','supplier');
}

}
