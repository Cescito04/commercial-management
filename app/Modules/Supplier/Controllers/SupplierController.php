<?php

// app/Modules/Supplier/Controllers/SupplierController.php

namespace App\Modules\Supplier\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Modules\Supplier\Repositories\SupplierRepositoryInterface;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function commande_fournisseur()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'Utilisateur non authentifié.');
        }

        $orders = Order::whereHas('product', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('product')->latest()->get();

        return view('supplier::orders_supplier', compact('orders'));
    }

    public function destroy($id)
    {
        // Check if the user is authenticated
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('dashboard')->with('error', 'Utilisateur non authentifié.');
        }

        // Check if the order belongs to the user
        $order = $this->supplierRepository->find($id);
        if ($order->product->user_id !== $user->id) {
            return redirect()->route('orders.index')->with('error', 'Unauthorized action.');
        }

        // Delete the order
        $this->supplierRepository->delete($id);

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
