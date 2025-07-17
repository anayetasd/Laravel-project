@extends("layouts.master")

@section("page")

<style>
    .supplier-history {
        width: 1100px;
        margin: 30px auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .supplier-history h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #2c3e50;
    }

    .supplier-history table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .supplier-history th, .supplier-history td {
        padding: 30px 25px;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    .supplier-history th {
        background-color:rgb(22, 157, 167);
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    .supplier-history tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .supplier-history tr:hover {
        background-color: #e6f7ff;
    }

    .supplier-history td:last-child {
        font-weight: bold;
        color: #e74c3c;
    }
</style>

<div class="supplier-history">
     <a class="btn btn-success btn-back" href="{{ url('suppliers') }}">← Back to Suppliers</a>
    <h2>Supplier Report: {{ $supplier->name }}</h2>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Due</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplier->purchases as $purchase)
                @php
                    $total = $purchase->purchase_total ?? 0;
                    $paid = $purchase->paid_amount ?? 0;
                    $due = $total - $paid;
                @endphp
                <tr>
                    <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td>
                    <td>{{ number_format($total, 2) }}</td>
                    <td>{{ number_format($paid, 2) }}</td>
                    <td>{{ number_format($due, 2) }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
