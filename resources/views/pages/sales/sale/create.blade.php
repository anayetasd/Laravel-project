@extends('layouts.master')

@section('page')

<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .create-container {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .form-title {
        text-align: center !important;
        margin-bottom: 30px;
        font-size: 28px !important;
        font-weight: bold;
        color: #333;
        display: block !important;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #555;
    }

    .form-group input[type="text"] {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        background-color: #fafafa;
    }

    .form-actions {
        text-align: center;
        margin-top: 30px;
    }

    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 12px 28px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
        cursor: pointer;
    }
</style>

<div class="create-container">
    <h2 class="form-title">Create New Sale</h2>

    <form action="{{ url('sales') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" required>
        </div>

        <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <select name="customer_id" id="customer_id">
                @foreach($customers as $customer)
                <option value="{{$customer->id}}">{{$customer->name}}</option>
                @endforeach
            </select>
            
        </div>

        <div class="form-group">
            <label for="total_amount">Total Amount</label>
            <input type="text" name="total_amount" required>
        </div>

        <div class="form-group">
            <label for="discount">Discount</label>
            <input type="text" name="discount">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status">
        </div>

        <div class="form-group">
            <label for="created_at">Created At</label>
            <input type="text" name="created_at">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Save</button>
        </div>
    </form>
</div>

@endsection
