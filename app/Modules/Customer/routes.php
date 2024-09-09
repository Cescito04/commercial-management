<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Modules\Customer\Controllers\CustomerController;





Route::get('/home-client', [CustomerController::class,'index'])->middleware('web')->name('customer.index');
Route::get('/client/product/{id}', [CustomerController::class, 'show'])->middleware('web')->name('customer.show');
Route::get('/all-products', [CustomerController::class,'all'])->middleware('web')->name('customer.all');

Route::get('/commande-client', [CustomerController::class,'commande_client'])->middleware('web')->name('customer.orders');



Route::post('/orders', [CustomerController::class, 'add_commande'])->middleware('web')->name('orders.store');