@extends("layouts.master")

@section("page")

<?php
  use App\Libraries\Core\File;
?>

<style>
  .container {
      margin-top: 40px;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }

  .table thead th {
      background: linear-gradient(to right, #0d6efd, #3b82f6);
      color: #ffffff;
      text-align: center;
      font-weight: 600;
      font-size: 16px;
  }

  .table td {
      text-align: center;
      vertical-align: middle;
      font-size: 15px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9f9f9;
  }

  .btn-group a {
      margin: 0 4px;
  }

  .btn-new-supplier {
      margin-bottom: 20px;
      font-weight: bold;
      letter-spacing: 0.5px;
  }

  img.supplier-photo {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid #ccc;
  }

  .no-data {
      text-align: center;
      font-size: 18px;
      font-weight: 500;
      padding: 20px;
      background-color: #fff3cd;
      color: #856404;
  }
</style>

<div class="container">
  <a class="btn btn-info btn-new-supplier" href="{{ url('suppliers/create') }}">
      ➕ New Supplier
  </a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->mobile }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>
                        <img src='{{ url("/img/$supplier->photo")}}' class="supplier-photo" />
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary" href='{{ url("suppliers/$supplier->id/edit") }}'>✏️ Edit</a>
                            <a class="btn btn-sm btn-success" href='{{ url("suppliers/$supplier->id") }}'>🔍 View</a>
                            <a class="btn btn-sm btn-danger" href='{{ url("suppliers/$supplier->id/confirm") }}'>🗑️ Delete</a>
                            <a class="btn btn-sm btn-info" href='{{ url("suppliers/$supplier->id/history") }}'>history</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">🚫 No supplier found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>

@endsection
