@extends('layouts.master')

@section('page')

<style>
    .form-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.08);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #005792;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    select, input[type="text"], textarea {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        box-sizing: border-box;
        resize: vertical;
    }

    input[type="submit"] {
        background-color: #005792;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #003f66;
    }

    .btn-back {
        display: inline-block;
        margin: 20px auto 0 auto;
        padding: 10px 20px;
        background-color: #198754;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #145c32;
    }
</style>

<a class="btn-back" href="{{ url('orders') }}">Back</a>

<div class="form-container">
    <h2>Edit Order #{{ $order->id }}</h2>

    <form action="{{ url('orders/'.$order->id) }}" method="post">
        @csrf
        @method("PUT")

        <label for="customer_id">Customer ID</label>
        <select name="customer_id" id="customer_id" required>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
            @endforeach
        </select>

        <label for="order_total">Order Total</label>
        <input type="text" name="order_total" id="order_total" value="{{ $order->order_total }}" required>

        <label for="discount">Discount</label>
        <input type="text" name="discount" id="discount" value="{{ $order->discount }}">

        <label for="paid_amount">Paid Amount</label>
        <input type="text" name="paid_amount" id="paid_amount" value="{{ $order->paid_amount }}" required>

        <label for="shipping_address">Address</label>
        <textarea name="shipping_address" id="shipping_address" rows="4" required>{{ $order->shipping_address }}</textarea>

        <input type="submit" value="Update" />
    </form>
</div>

@endsection
