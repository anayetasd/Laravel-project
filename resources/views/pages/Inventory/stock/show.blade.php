@extends("layouts.master")

@section('page')

<style>
    .show-container {
        max-width: 900px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .show-container h3 {
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
        color: #333;
    }

    .table th, .table td {
        vertical-align: middle;
        padding: 12px 15px;
    }

    .btn-back {
        margin-bottom: 20px;
    }
</style>

<div class="show-container">
    <a class="btn btn-success btn-back" href="{{ url('stocks') }}">← Back</a>

    <h3>Stock Details</h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $stock->id }}</td>
        </tr>
        <tr>
            <th>Product Name</th>
            <td>{{ $stock->product->name ?? 'no name' }}</td>
        </tr>
        <tr>
            <th>Quantity</th>
            <td>{{ $stock->qty }}</td>
        </tr>
        <tr>
            <th>Transaction Type</th>
            <td>{{ $stock->transaction_type->name ?? 'no name' }}</td>
        </tr>
        <tr>
            <th>Warehouse</th>
            <td>{{ $stock->warehouse->name ?? 'no name' }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ \Carbon\Carbon::parse($stock->created_at)->format('d M, Y h:i A') }}</td>
        </tr>
    </table>
</div>

@endsection
