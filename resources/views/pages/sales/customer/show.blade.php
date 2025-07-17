@extends("layouts.master")

@section('page')

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .view-container {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .view-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .view-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .btn-back {
        background-color: #28a745;
        color: white;
        padding: 10px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-back:hover {
        background-color: #218838;
    }

    .table-view {
        width: 100%;
        border-collapse: collapse;
    }

    .table-view td {
        padding: 15px 12px;
        border-bottom: 1px solid #eaeaea;
        vertical-align: top;
    }

    .table-view td:first-child {
        font-weight: 600;
        color: #555;
        width: 30%;
        background-color: #f9f9f9;
    }

    .table-view img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
    }
</style>

<div class="view-container">
    <div class="view-header">
        <h2>Customer Details</h2>
        <a class="btn-back" href="{{ url('customers') }}">← Back</a>
    </div>

    <table class="table-view">
        <tr>
            <td>ID</td>
            <td>{{ $customer->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $customer->name }}</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>{{ $customer->mobile }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $customer->email }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $customer->address }}</td>
        </tr>
        <tr>
            <td>Photo</td>
            <td>
                @if($customer->photo)
                    <img src="{{ url('/img/' . $customer->photo) }}" alt="photo">
                @else
                    <span class="text-muted">No photo available</span>
                @endif
            </td>
        </tr>
    </table>
</div>

@endsection


