@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Product Management</h2>
    <!-- Button to Add New Product -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
    </div>

    <!-- Product List -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Reference</th>
                <th>Barcode</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
              
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->ref }}</td>
                <td>{{ $product->code_barre }}</td>
                <td>{{ $product->name_product }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                {{-- <td>{{ $product->user->name ?? 'N/A' }}</td> --}}
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
