
@extends("layouts.master")

@section('page')

<?php
use App\Libraries\Core\File;
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

<style>
    .table-container {
        max-width: 1100px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
    }

    .table th, .table td {
        vertical-align: middle;
    }

    .table thead {
        background: linear-gradient(to right, #0d6efd, #3b82f6);
    }

   .table tbody tr:nth-child(even) {
    background-color: #f0f0f0; 
    }

    .btn-group .btn {
        margin-right: 5px;
    }

    .table img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }

    .btn-create {
        margin-bottom: 20px;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 8px;
    }

    .no-data {
        text-align: center;
        font-weight: bold;
        color: #888;
        padding: 20px 0;
    }
</style>

<div class="container table-container">
    <a class="btn btn-info btn-create" href="{{ url('customers/create') }}">+ New Customer</a>

    <table class="table table-bordered table-hover align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Photo</th>
                <th style="width: 180px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->mobile }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>
                        @if($customer->photo)
                            <img src='{{ url("/img/$customer->photo")}}' alt="Photo">
                        @else
                            <span class="text-muted">No Photo</span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group">
                           <a class="btn btn-primary" href='{{url("customers/$customer->id/edit")}}'>Edit</a>
                           <a class="btn btn-success" href='{{url("customers/$customer->id")}}'>View</a>
                           <a class="btn btn-warning" href='{{url("customers/$customer->id/confirm")}}'>Delete</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="no-data">No customers found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

@endsection
