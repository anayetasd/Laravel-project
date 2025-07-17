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
      width: 1200px;
  }

  .table thead th {
      background: linear-gradient(to right, #0d6efd, #3b82f6);
      color: #ffffff;
      text-align: center;
      font-weight: 600;
      font-size: 17px;
      padding: 15px;
  }

  .table td {
      text-align: center;
      vertical-align: middle;
      font-size: 16px;
      padding: 14px;
      height: 60px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
      background-color: #f9f9f9;
  }

  .btn-group a {
      margin: 0 4px;
      min-width: 70px;
  }

  .btn-new-supplier {
      margin-bottom: 20px;
      font-weight: bold;
      letter-spacing: 0.5px;
      font-size: 16px;
      padding: 10px 20px;
  }

  img.supplier-photo {
      width: 100px;
      height: 100px;
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
  <a class="btn btn-info btn-new-supplier" href="{{ url('employeesalarys/create') }}">
      ➕ New Employee_salary
  </a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Payment date</th>
                <th>Administrator</th>
                <th>Payment Method </th>
                <th>Total Amount </th>
                <th>Paid Amount </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employeesalarys as $employeesalary)
                <tr>
                    <td>{{ $employeesalary->id }}</td>
                    <td>{{ $employeesalary->name }}</td>
                    <td>{{ $employeesalary->payment_date }}</td>
                    <td>{{ $employeesalary->administrator->role ?? 'N/A' }}</td>
                    <td>{{ $employeesalary->payment->name ?? 'N/A' }}</td>
                    <td>{{ $employeesalary->total_amount }}</td>
                    <td>{{ $employeesalary->paid_amount }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary" href='{{ url("employeesalarys/$employeesalary->id/edit") }}'>Edit</a>
                            <a class="btn btn-sm btn-success" href='{{ url("employeesalarys/$employeesalary->id") }}'>View</a>
                            <a class="btn btn-sm btn-danger" href='{{ url("employeesalarys/$employeesalary->id/confirm") }}'> Delete</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="no-data"> No Employee Salary found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>

@endsection
