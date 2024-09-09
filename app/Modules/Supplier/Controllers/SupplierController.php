<?php

namespace App\Modules\Supplier\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Modules\Product\Repositories\ProductRepositoryInterface;

class SupplierController extends Controller
{

    public function commande_fournisseur()
    {
        // Vérifier si l'utilisateur est authentifié
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'Utilisateur non authentifié.');
        }

        // Récupérer les commandes associées aux produits créés par l'utilisateur
        $orders = Order::whereHas('product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('product')->latest()->get();

        return view('supplier::orders_supplier', compact('orders'));
    }

  
   
    
}



