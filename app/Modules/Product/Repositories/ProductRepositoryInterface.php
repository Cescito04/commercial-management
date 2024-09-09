<?php

namespace App\Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function getProductById(int $id): ?Model;

    public function getAllProducts(): \Illuminate\Database\Eloquent\Collection;

    /**
     * @param array<string, mixed> $data
     * @return Product|null
     */
    public function createProduct(array $data): ?Model;

    public function updateProduct(int $id, array $data): ?Model;

    public function deleteProduct(int $id): void;

    public function getLatestProducts(): \Illuminate\Database\Eloquent\Collection;
}
