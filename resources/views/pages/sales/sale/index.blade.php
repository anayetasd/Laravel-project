@extends("layouts.master")

@section('page')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f0f2f5;
    }

    .table-container {
        margin-top: 50px;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    thead th {
        background: linear-gradient(to right, #0d6efd, #3b82f6);
        color: white;
        text-align: center;
        border: none;
        font-size: 16px;
        padding: 15px;
    }

    tbody tr:nth-child(odd) {
        background-color: #f8f9fc;
    }

    tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    tbody tr:hover {
        background-color: #e2e6ea;
        transition: 0.3s;
    }

    .btn-group .btn {
        margin-right: 6px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-group .btn:hover {
        transform: scale(1.05);
    }

    .top-btn {
        margin-bottom: 25px;
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 8px;
    }

    .badge {
        padding: 6px 10px;
        font-size: 13px;
        border-radius: 12px;
    }

    .table td, .table th {
        vertical-align: middle;
    }
</style>

<div class="container table-container">
    <a class="btn btn-info top-btn" href="{{ url('sales/create') }}">
        <i class="fas fa-plus-circle"></i> New Sales
    </a>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Discount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                         <td>{{ $sale->customer->name ?? 'No Customer' }}</td>
                        <td>{{ number_format($sale->total_amount, 2) }}</td>
                        <td>{{ number_format($sale->discount, 2) }}</td>
                        <td>
                            <span class="badge {{ $sale->status === 'confirmed' ? 'bg-secondary text-white' : 'bg-white text-dark' }}">
                                {{ ucfirst($sale->status) }}
                            </span>
                        </td>

                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-sm btn-primary" href='{{ url("sales/$sale->id/edit") }}'>Edit</a>
                                <a class="btn btn-sm btn-success" href='{{ url("sales/$sale->id") }}'>View</a>
                                <a class="btn btn-sm btn-danger" href='{{ url("sales/$sale->id/confirm") }}'>Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-muted">No Sales Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
