@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Editing the Product</h2>

    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="ref">Reference:</label>
            <input type="text" class="form-control" id="ref" name="ref" value="{{ $product->ref }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="code_barre">Barcode:</label>
            <input type="text" class="form-control" id="code_barre" name="code_barre" value="{{ $product->code_barre }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="name_product">Product Name:</label>
            <input type="text" class="form-control" id="name_product" name="name_product" value="{{ $product->name_product }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="features">Features:</label>
            <textarea class="form-control" id="features" name="features" rows="4">{{ $product->features }}</textarea>
        </div>
        
        <div class="form-group mb-3">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="picture">Picture:</label>
            <input type="text" class="form-control" id="picture" name="picture">
            @if($product->picture)
                <img src="{{ $product->picture }}" alt="Product Image" class="img-thumbnail mt-2" style="max-height: 150px;">
            @endif
        </div>
        {{-- <div class="form-group mb-3">
            <label for="user_id">User ID:</label>
            <input type="number" class="form-control" id="user_id" name="user_id" value="{{ $product->user_id }}" required>
        </div> --}}
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
