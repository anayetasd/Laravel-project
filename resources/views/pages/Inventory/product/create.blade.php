<?php



use App\Models\Product\ProductUnit;

$product_units=ProductUnit::all();

?>




@extends("layouts.master")

@section('page')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    .form-container {
        max-width: 1000px;
        margin: 50px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        margin-bottom: 25px;
        text-align: center;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #0d6efd;
    }

    .btn-primary {
        width: 100%;
        padding: 10px;
    }
</style>

<div class="container">
    <div class="form-container">
        <h2>Create New Product</h2>
        <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Product Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="regular_price" class="form-label">Regular Price</label>
                <input type="number" step="0.01" name="regular_price" id="regular_price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="offer_price" class="form-label">Offer Price</label>
                <input type="number" step="0.01" name="offer_price" id="offer_price" class="form-control">
            </div>

            <div class="mb-3">
                <label for="barcode" class="form-label">Barcode</label>
                <input type="text" name="barcode" id="barcode" class="form-control">
            </div>

            <div class="mb-3">
                <label for="product_unit_id" class="form-label">Product Unit</label>
                <select name="product_unit_id" id="product_unit_id" class="form-select" required>
                    <option value="">Select Unit</option>
                    @foreach($product_units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_section_id" class="form-label">Product Section</label>
                <select name="product_section_id" id="product_section_id" class="form-select" required>
                    <option value="">Select Section</option>
                    @foreach($product_sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="product_category_id" class="form-label">Product Category</label>
                <select name="product_category_id" id="product_category_id" class="form-select" required>
                    <option value="">Select Category</option>
                    @foreach($product_categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">💾 Save Product</button>
        </form>
    </div>
</div>

@endsection
