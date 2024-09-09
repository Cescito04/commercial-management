@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Orders Management</h2>

    <!-- Product List -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Total Price</th>
                <th>Total Quantity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product->name_product ?? 'N/A' }}</td>
                    <td>{{ $order->total_price }} FCFA</td>
                    <td>{{ $order->total_quantity }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="#" class="btn btn-primary">Valid</a>

                        <!-- Delete Form -->
                        <form style="display:inline-block;">
                            @csrf
                       
                            
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this order?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
