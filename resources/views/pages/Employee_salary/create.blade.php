@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 40px;
        background-color: #ffffff;
        border-radius: 14px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 35px;
        color: #0d6efd;
        font-weight: 700;
        font-size: 28px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-weight: 600;
        margin-bottom: 8px;
        color: #333;
    }

    .form-group input,
    .form-group select {
        padding: 12px 14px;
        border: 1px solid #ced4da;
        border-radius: 10px;
        font-size: 15px;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        outline: none;
    }

    .btn-submit {
        display: block;
        width: 200px; /* ছোট চওড়া */
        margin: 0 auto; /* মাঝখানে রাখতে */
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
</style>

<div class="form-container">
    <h2>New Employee Salary</h2>
    <form action="{{ url('employeesalarys') }}" method="post">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" />
            </div>

            <div class="form-group">
                <label for="payment_date">Payment Date</label>
                <input type="date" name="payment_date" id="payment_date" />
            </div>

            <div class="form-group">
                <label for="employee_administrator_id">Administrator</label>
                <select name="employee_administrator_id" id="employee_administrator_id">
                    @foreach($administrators as $administrator)
                        <option value="{{ $administrator->id }}">{{ $administrator->role }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="payment_method_id">Payment Method</label>
                <select name="payment_method_id" id="payment_method_id">
                    @foreach($payments as $payment)
                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="text" name="total_amount" id="total_amount" />
            </div>

            <div class="form-group">
                <label for="paid_amount">Paid Amount</label>
                <input type="text" name="paid_amount" id="paid_amount" />
            </div>

            <button type="submit" class="btn-submit">💾 Save Salary</button>
        </div>
    </form>
</div>

@endsection
