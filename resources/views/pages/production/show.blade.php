@extends("layouts.master")

@section("page")

<style>
    .btn-success {
        margin: 20px;
    }

    .table-container {
        max-width: 900px;
        margin: 30px auto;
        background: #fff;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .table-view {
        width: 100%;
        border-collapse: collapse;
    }

    .table-view td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        font-size: 16px;
        color: #333;
    }

    .table-view tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-view tr:hover {
        background-color: #f1f1f1;
    }

    .table-view td:first-child {
        font-weight: bold;
        width: 40%;
        background-color: #f0f0f0;
    }
</style>

<a class="btn btn-success" href="{{ url('productions') }}">← Back</a>

<div class="table-container">
    <table class="table-view">
        <tr>
            <td>Production Date:</td>
            <td>{{ $production->production_date }}</td>
        </tr>
        <tr>
            <td>Product Name:</td>
            <td>{{ $production->product->name ?? 'no name' }}</td>
        </tr>
        <tr>
            <td>Raw Material Used:</td>
            <td>{{ $production->rawMAterial->name ?? 'no name' }}</td>
        </tr>
        <tr>
            <td>Total Produced:</td>
            <td>{{ $production->quantity_produced }}</td>
        </tr>
        <tr>
            <td> Unit:</td>
            <td>{{ $production->unit }}</td>
        </tr>
    </table>
</div>

@endsection
