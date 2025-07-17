@extends("layouts.master")
@section("page")

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f4f6f9;
    }

    .stock-container {
        margin-top: 40px;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.08);
    }

    .btn-add {
        margin-bottom: 20px;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 15px;
    }

    table thead th {
        background: linear-gradient(90deg,rgb(22, 163, 76), #a29bfe);
        color: white;
        text-align: center;
        padding: 14px;
        font-weight: 600;
        letter-spacing: 0.05em;
        border: none;
    }

    table tbody td {
        text-align: center;
        vertical-align: middle;
        padding: 12px 10px;
        font-size: 14px;
    }

    table tbody tr:nth-child(odd) {
        background-color: #fdfdfe;
    }

    table tbody tr:nth-child(even) {
        background-color: #f7f9fc;
    }

    table tbody tr:hover {
        background-color: #e2f0ff;
        transition: all 0.3s ease;
    }

    .btn-group .btn {
        margin-right: 6px;
        border-radius: 6px;
        font-size: 13px;
        padding: 6px 12px;
        transition: transform 0.2s ease;
    }

    .btn-group .btn:hover {
        transform: scale(1.06);
    }

    .pagination {
        margin-top: 30px;
    }

    .pagination .page-link {
        color: #6c5ce7;
        font-weight: 500;
    }

    .pagination .active .page-link {
        background-color: #6c5ce7;
        border-color: #6c5ce7;
    }
</style>

<div class="container stock-container">
    <a class="btn btn-info btn-add" href="{{ url('stocks/create') }}">
        <i class="fas fa-plus-circle"></i> New Stock
    </a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Transaction Type</th>
                    <th>Created At</th>
                    <th>Warehouse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($stocks as $stock)
                <tr>
                    <td>{{ $stock->id }}</td>
                    <td>{{ $stock->product->name ?? 'no name' }}</td>
                    <td>{{ $stock->qty }}</td>
                    <td>{{ $stock->transaction_type->name ?? 'no name' }}</td>
                    <td>{{ $stock->created_at }}</td>
                    <td>{{ $stock->warehouse->name ?? 'no name' }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-primary btn-sm" href='{{ url("stocks/$stock->id/edit") }}'>Edit</a>
                            <a class="btn btn-success btn-sm" href='{{ url("stocks/$stock->id") }}'>View</a>
                            <a class="btn btn-warning btn-sm" href='{{ url("stocks/$stock->id/confirm") }}'>Delete</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">No Stock Found</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $stocks->links() }}
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
