@extends("layouts.master")

@section('page')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

<style>
    body {
        background-color: #f8f9fa;
    }

    .table-container {
        margin-top: 50px;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .table img {
        border-radius: 8px;
    }

    .table th {
        background-color: #0d6efd;
        color: white;
    }

    .btn-group a {
        margin-right: 5px;
    }

    .btn-info {
        margin-bottom: 20px;
    }
</style>

<div class="container table-container">
    <a class="btn btn-info" href="{{ url('products/create') }}">➕ New Product</a>
    
    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr class="text-center">
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Regular Price</th>
                <th>Offer Price</th>
                <th>Barcode</th>
            
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr class="text-center">
                <td>{{ $product->id }}</td>
                <td>
                    <img src='{{ url("/img/$product->photo") }}' width="80" height="80" alt="{{ $product->name }}">
                </td>
                <td>{{ $product->name }}</td>
                <td class="text-danger fw-bold">{{ $product->regular_price }}</td>
                <td class="text-success fw-bold">{{ $product->offer_price }}</td>
                <td>{{ $product->barcode }}</td>
                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-primary" href='{{ url("products/$product->id/edit") }}'>Edit</a>
                        <a class="btn btn-sm btn-success" href='{{ url("products/$product->id") }}'>View</a>
                        <a class="btn btn-sm btn-danger" href='{{ url("products/$product->id/confirm") }}'>Delete</a>
                    </div>
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No Product Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
    {{ $products->links() }}
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

@endsection
