@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 30px 40px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #198754;
        font-weight: bold;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 10px;
        color: #212529;
    }

    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out;
        background-color: #fefefe;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #198754;
        outline: none;
        background-color: #fff;
    }

     .btn-submit {
        display: block;
        width: 200px;
        margin: 0 auto;
        padding: 12px;
        font-size: 16px;
        background-color: #198754;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease;
        text-align: center;
    }

    .btn-submit:hover {
        background-color: #157347;
    }

    .btn-back {
        display: inline-block;
        margin: 0 auto 30px;
        background-color: #198754;
        color: white;
        font-weight: 600;
        padding: 8px 20px;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .btn-back:hover {
        background-color: #157347;
        color: #fff;
    }
</style>

<a class="btn btn-success btn-back" href="{{ url('employeesalarys') }}">← Back to Employee Salary</a>

<div class="form-container">
    <h2>Edit Employee Salary</h2>
    <form action="{{ url('employeesalarys/' . $employeesalary->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Employee Name</label>
            <input type="text" name="name" id="name" value="{{ $employeesalary->name }}" required />
        </div>

        <div class="form-group">
            <label for="payment_date">Payment Date</label>
            <input type="date" name="payment_date" id="payment_date" value="{{ $employeesalary->payment_date }}" required />
        </div>

        <div class="form-group">
            <label for="employee_administrator_id">Administrator</label>
            <select name="employee_administrator_id" id="employee_administrator_id" required>
                @foreach ($administrators as $administrator)
                    <option value="{{ $administrator->id }}" {{ $administrator->id == $employeesalary->employee_administrator_id ? 'selected' : '' }}>
                        {{ $administrator->role }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="payment_method_id">Payment Method</label>
            <select name="payment_method_id" id="payment_method_id" required>
                @foreach ($payments as $payment)
                    <option value="{{ $payment->id }}" {{ $payment->id == $employeesalary->payment_method_id ? 'selected' : '' }}>
                        {{ $payment->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="text" name="total_amount" id="total_amount" value="{{ $employeesalary->total_amount }}" />
        </div>

        <div class="form-group">
            <label for="paid_amount">Paid Amount</label>
            <input type="text" name="paid_amount" id="paid_amount" value="{{ $employeesalary->paid_amount }}" />
        </div>

        <button type="submit" class="btn-submit">✅ Update Salary</button>
    </form>
</div>

@endsection
