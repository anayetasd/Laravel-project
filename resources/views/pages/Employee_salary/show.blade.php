@extends("layouts.master")

@section("page")

<style>
    .view-container {
        max-width: 1000px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .view-container h2 {
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
        color: #0d6efd;
    }

    .btn-back {
        margin-bottom: 30px;
        display: inline-block;
        padding: 10px 20px;
        background-color: #0d6efd;
        color: white;
        font-weight: 600;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        background-color: #0b5ed7;
    }

    .table-custom {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    .table-custom tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-custom td {
        padding: 14px 18px;
        border-bottom: 1px solid #dee2e6;
        vertical-align: top;
    }

    .table-custom td:first-child {
        font-weight: 600;
        background-color: #f1f3f5;
        width: 35%;
        color: #333;
    }

    .table-custom td:last-child {
        color: #212529;
    }
</style>

<div class="view-container">
    <a class="btn btn-back" href="{{ url('employeesalarys') }}">← Back to Employee Salary</a>

    <h2>Employee Salary Details</h2>

    <table class="table-custom">
        <tr>
            <td>ID</td>
            <td>{{ $employeesalary->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $employeesalary->name }}</td>
        </tr>
        <tr>
            <td>Payment Date</td>
            <td>{{ $employeesalary->payment_date }}</td>
        </tr>
        <tr>
            <td>Administrator</td>
            <td>{{ $employeesalary->administrator->role ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Payment Method</td>
            <td>{{ $employeesalary->paymet->name ?? 'No Name' }}</td>
        </tr>
        <tr>
            <td>Total Amount</td>
            <td>{{ $employeesalary->total_amount }}</td>
        </tr>
        <tr>
            <td>Paid Amount</td>
            <td>{{ $employeesalary->paid_amount }}</td>
        </tr>
    </table>
</div>

@endsection
