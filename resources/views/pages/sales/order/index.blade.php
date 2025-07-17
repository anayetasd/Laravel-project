@extends("layouts.master")

@section('page')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />

<style>
    body {
        background-color: #f0f2f5;
    }

    .table-container {
        margin-top: 40px;
        padding: 30px 25px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    thead th {
        background: linear-gradient(90deg, #0d6efd, #3b82f6);
        color: white;
        text-align: center;
        border: none;
        font-size: 16px;
        padding: 15px 12px;
        font-weight: 600;
        letter-spacing: 0.06em;
    }

    tbody tr:nth-child(odd) {
        background-color: #f8f9fc;
    }

    tbody tr:nth-child(even) {
        background-color: #ffffff;
    }

    tbody tr:hover {
        background-color: #e2e6ea;
        transition: background-color 0.3s ease;
    }

    .btn-group .btn {
        margin-right: 6px;
        border-radius: 8px;
        padding: 5px 12px;
        font-size: 14px;
        transition: transform 0.2s ease;
    }

    .btn-group .btn:hover {
        transform: scale(1.08);
    }

    .top-btn {
        margin-bottom: 25px;
        font-weight: 600;
        padding: 10px 22px;
        border-radius: 8px;
        font-size: 16px;
    }

    .table td, .table th {
        vertical-align: middle;
        text-align: center;
    }
</style>

<div class="container table-container">

    <a class="btn btn-info top-btn" href="{{ url('orders/create') }}">
        <i class="fas fa-plus-circle"></i> New Order
    </a>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Customer Id</th>
                    <th>Address</th>
                    <th>Remark</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->customer_id }}</td>
                    <td>{{ $order->shipping_address }}</td>
                    <td>{{ $order->remark }}</td>
                    <td>{{ $order->discount }}</td>
                    <td>{{ $order->paid_amount }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ url('orders/' . $order->id . '/edit') }}">Edit</a>
                        <a class="btn btn-success btn-sm" href="{{ url('orders/' . $order->id) }}">View</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('orders/' . $order->id . '/confirm') }}">Delete</a>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-muted">No Orders Found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
