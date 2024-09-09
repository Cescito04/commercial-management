<?php

namespace App\Modules\Product\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getProductById(int $id): ?Model
    {
        return Product::find($id);
    }

    public function getAllProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all(); // Retourne une collection d'objets Product
    }

    public function createProduct(array $data): ?Model
    {
        return Product::create($data); // Crée et retourne un objet Product
    }

    public function updateProduct(int $id, array $data): ?Model
    {
        $product = Product::find($id);
        if ($product) {
            $product->update($data); // Met à jour le produit et retourne l'objet
            return $product;
        }
        return null; // Retourne null si le produit n'est pas trouvé
    }

    public function deleteProduct(int $id): void
    {
        Product::where('id', $id)->delete(); // Supprime le produit sans retour
    }

    public function getLatestProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::orderBy('created_at', 'desc')->take(6)->get(); // Récupère les 6 derniers produits
    }
}
