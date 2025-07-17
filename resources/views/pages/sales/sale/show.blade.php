@extends("layouts.master")

@section('page')

<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .view-container {
        max-width: 950px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .btn-back {
        display: inline-block;
        margin-bottom: 25px;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    .btn-back:hover {
        background-color: #218838;
        color: white;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        color: #333;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr td:first-child {
        font-weight: 600;
        width: 35%;
        color: #555;
    }
</style>

<div class="view-container">
    <a href="{{ url('sales') }}" class="btn-back">Back</a>

    <table>
        <tr>
            <td>Id</td>
            <td>{{ $sale->id }}</td>
        </tr>
        <tr>
            <td>Total Amount</td>
            <td>{{ $sale->total_amount }}</td>
        </tr>
        <tr>
            <td>Discount</td>
            <td>{{ $sale->discount }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{ $sale->status }}</td>
        </tr>
    </table>
</div>

@endsection
