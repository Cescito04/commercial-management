<?php


namespace App\Modules\Supplier\Services;

use App\Models\Order;
use App\Modules\Supplier\Repositories\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function find($id)
    {
        return Order::findOrFail($id);
    }

    public function delete($id)
    {
        $order = $this->find($id);
        return $order->delete();
    }
}
