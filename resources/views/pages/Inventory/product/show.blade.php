@extends("layouts.master")

@section('page')

<style>
    .product-details-container {
        max-width: 950px;
        margin: 50px auto;
        padding: 30px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }

    .product-details-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #343a40;
    }

    .product-details-table {
        width: 100%;
        border-collapse: collapse;
    }

    .product-details-table td {
        padding: 12px 16px;
        border-bottom: 1px solid #dee2e6;
        font-size: 16px;
    }

    .product-details-table td:first-child {
        font-weight: bold;
        color: #495057;
        width: 30%;
    }

    .product-details-table img {
        max-width: 200px;
        height: auto;
        border-radius: 8px;
        border: 1px solid #ced4da;
    }

    .btn-success {
        margin-bottom: 20px;
        display: inline-block;
    }
</style>

<div class="product-details-container">
    <a class="btn btn-success" href="{{ url('products') }}">← Back</a>

    <h2>Product Details</h2>

    <table class="product-details-table">
        <tr>
            <td>Id</td>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <td>Photo</td>
            <td><img src="{{ url('/img/' . $product->photo) }}" alt="{{ $product->name }}"></td>
        </tr>
    </table>
</div>

@endsection
