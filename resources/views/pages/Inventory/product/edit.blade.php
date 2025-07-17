@extends("layouts.master")

@section("page")

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    .form-container {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        margin-bottom: 25px;
        text-align: center;
    }

    .btn-back {
        margin-bottom: 20px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #198754;
    }

    .form-select:focus {
        box-shadow: none;
        border-color: #198754;
    }
</style>

<div class="container">
    <a class="btn btn-success btn-back" href="{{ url('products') }}">⬅ Back</a>

    <div class="form-container">
        <h2>Edit Product</h2>

        <form action="{{ url('products/' . $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" required />
            </div>

            <div class="mb-3">
                <label class="form-label">Current Photo</label><br>
                <img src="{{ url('/img/' . $product->photo) }}" alt="Product Photo" width="100" class="mb-2 rounded">
                <input type="file" name="photo" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">Regular Price</label>
                <input type="text" name="regular_price" value="{{ $product->regular_price }}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">Offer Price</label>
                <input type="text" name="offer_price" value="{{ $product->offer_price }}" class="form-control" />
            </div>

            <div class="mb-3">
                <label class="form-label">Barcode</label>
                <input type="text" name="barcode" value="{{ $product->barcode }}" class="form-control" />
            </div>

            <div class="mb-4">
                <label class="form-label">Product Section</label>
                <select name="product_section_id" class="form-select">
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}" 
                            {{ $product->product_section_id == $section->id ? 'selected' : '' }}>
                            {{ $section->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">💾 Update Product</button>
        </form>
    </div>
</div>

@endsection
