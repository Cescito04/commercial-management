@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="ref">Reference:</label>
            <input type="text" class="form-control" id="ref" name="ref" required>
        </div>
        <div class="form-group mb-3">
            <label for="code_barre">Barcode:</label>
            <input type="text" class="form-control" id="code_barre" name="code_barre" required>
        </div>
        <div class="form-group mb-3">
            <label for="name_product">Product Name:</label>
            <input type="text" class="form-control" id="name_product" name="name_product" required>
        </div>
        <div class="form-group mb-3">
            <label for="features">Features:</label>
            <textarea class="form-control" id="features" name="features" rows="4"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>
        <div class="form-group mb-3">
            <label for="picture">Picture:</label>
            <input type="text" class="form-control" id="picture" name="picture">
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
