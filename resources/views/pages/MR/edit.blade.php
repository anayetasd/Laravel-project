@extends("layouts.master")

@section("page")

<style>
  .form-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .form-container h2 {
    margin-bottom: 25px;
    text-align: center;
    color: #28a745;
    font-size: 28px;
    font-weight: bold;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
    color: #333;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"],
  select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    background-color: #f9f9f9;
    transition: border 0.2s ease;
  }

  input:focus,
  select:focus {
    border-color: #28a745;
    outline: none;
    background-color: #fff;
    box-shadow: 0 0 6px rgba(40,167,69,0.3);
  }

  .btn-submit {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-submit:hover {
    background-color: #218838;
  }

  .btn-back {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #007bff;
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 500;
  }

  .btn-back:hover {
    background-color: #0069d9;
  }
</style>

<div class="form-container">
  <a class="btn-back" href="{{ url('mrs') }}">← Back to Money Receipt</a>

  <h2>Edit Money Receipt</h2>
  <form action="{{ url('mrs/'.$mr->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="customer_id">Customer</label>
      <select name="customer_id" id="customer_id" required>
        <option value="" disabled>Select a customer</option>
        @foreach($customers as $customer)
          <option value="{{ $customer->id }}" {{ $customer->id == $mr->customer_id ? 'selected' : '' }}>
            {{ $customer->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="receipt_total">Receipt Total</label>
      <input type="number" name="receipt_total" id="receipt_total" value="{{ $mr->receipt_total }}" required>
    </div>

    <div class="form-group">
      <label for="discount">Discount</label>
      <input type="number" step="0.01" name="discount" id="discount" value="{{ $mr->discount }}">
    </div>

    <button type="submit" class="btn-submit">Update Money Receipt</button>
  </form>
</div>

@endsection
