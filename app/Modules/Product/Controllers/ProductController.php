<?php

namespace App\Modules\Product\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Modules\Product\Repositories\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(ProductRepositoryInterface $productInterface)
    {
        $products = $productInterface->getAllProducts();
        // Affiche la liste des produits
        return view('product::index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Affiche le formulaire de création d'un nouveau produit
        return view('product::create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request, ProductRepositoryInterface $productInterface)
    {
        // Valide les données d'entrée
        $validator = Validator::make($request->all(), [
            'ref' => 'required|unique:products',
            'code_barre' => 'required|unique:products',
            'name_product' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'nullable|string|max:2048',
            'features' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        // Récupère et enregistre les données validées avec l'utilisateur connecté
        $data = $request->only(['ref', 'code_barre', 'name_product', 'price', 'quantity', 'picture','features']);
        $data['user_id'] = auth()->id(); 
        $productInterface->createProduct($data);

        // Redirige vers la liste des produits
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        // Affiche le formulaire d'édition pour un produit spécifique
        return view('product::edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product, ProductRepositoryInterface $productRepository)
    {
        // Valide les données d'entrée
        $validator = Validator::make($request->all(), [
            'ref' => 'required|unique:products,ref,' . $product->id,
            'code_barre' => 'required|unique:products,code_barre,' . $product->id,
            'name_product' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'picture' => 'nullable|string|max:2048',
            'features' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first())->withInput();
        }

        // Met à jour les données du produit
        $data = $request->only(['ref', 'code_barre', 'name_product', 'price', 'quantity', 'picture','features']);
        $productRepository->updateProduct($product->id, $data);

        // Redirige vers la liste des produits
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id, ProductRepositoryInterface $productRepository)
    {
        // Supprime le produit spécifique
        $productRepository->deleteProduct($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
