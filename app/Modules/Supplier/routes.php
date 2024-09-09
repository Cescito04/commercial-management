<?php
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Modules\Supplier\Controllers\SupplierController;





Route::get('/commande-fournisseur', [SupplierController::class,'commande_fournisseur'])->middleware('web')->name('supplier.orders');
