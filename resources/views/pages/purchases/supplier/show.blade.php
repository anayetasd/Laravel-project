@extends("layouts.master")

@section("page")

<style>
    .view-container {
        max-width: 950px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .view-container h2 {
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #0d6efd;
    }

    .table-custom {
        width: 100%;
        border-collapse: collapse;
    }

    .table-custom td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .table-custom td:first-child {
        font-weight: 600;
        background-color: #f8f9fa;
        width: 30%;
    }

    .supplier-photo {
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-back {
        margin-bottom: 20px;
        display: inline-block;
    }
</style>

<div class="view-container">
    <a class="btn btn-success btn-back" href="{{ url('suppliers') }}">← Back to Suppliers</a>

    <h2>Supplier Details</h2>

    <table class="table-custom">
        <tr>
            <td>Id</td>
            <td>{{ $supplier->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $supplier->name }}</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>{{ $supplier->mobile }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $supplier->email }}</td>
        </tr>
        <tr>
            <td>Photo</td>
            <td>
                <img src='{{ url("img/$supplier->photo")}}' width="120" class="supplier-photo" alt="Supplier Photo">
            </td>
        </tr>
    </table>
</div>

@endsection
