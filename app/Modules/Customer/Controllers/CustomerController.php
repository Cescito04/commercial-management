<?php

namespace App\Modules\Customer\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Modules\Product\Repositories\ProductRepositoryInterface;

class CustomerController extends Controller
{
    protected $productInterface;


    public function __construct(ProductRepositoryInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function index(){
        $products = $this->productInterface->getLatestProducts();
        return view('customer::home', compact('products'));
    }



    public function show($id)
    {

        $product = $this->productInterface->getProductById($id);

        if (!$product) {

            return redirect()->route('customer.index')->with('error', 'Produit non trouvé.');
        }
        $product->load('user');

        return view('customer::show_product', compact('product'));
    }

    public function all(){
        $products = $this->productInterface->getAllProducts();
        return view('customer::all_products', compact('products'));

    }

    public function add_commande(Request $request)
    {
        // Valider les données du formulaire
        $validated = $request->validate([
            'total_quantity' => 'required|integer|min:1',
            'product_id' => 'required|exists:products,id',
        ]);

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié.'], 401);
        }

        // Récupérer le produit
        $product = $this->productInterface->getProductById($validated['product_id']);
        if (!$product) {
            return response()->json(['error' => 'Produit non trouvé.'], 404);
        }

        // Calculer le prix total
        $total_price = $product->price * $validated['total_quantity'];

        // Créer la commande
        $order = Order::create([
            'date' => now(),
            'total_quantity' => $validated['total_quantity'],
            'total_price' => $total_price,
            'status' => 'En attente',
            'user_id' => $user->id,
            'product_id' => $validated['product_id'],
        ]);

        $totalPriceSum = Order::sum('total_price');
        return redirect()->route('customer.orders')->with([
            'success' => 'Commande créée avec succès.',
            'totalPriceSum' => $totalPriceSum,
        ]);    }

    public function commande_client()
    {
        // Check if the user is authenticated
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('customer.index')->with('error', 'Utilisateur non authentifié.');
        }

        // Retrieve orders with associated products for the authenticated user
        $orders = Order::where('user_id', $user->id)->with('product')->latest()->get();

        return view('customer::commande_client', compact('orders'));
    }





}
