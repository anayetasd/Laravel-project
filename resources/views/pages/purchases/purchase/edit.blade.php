@extends("layouts.master")

@section("page")

<style>
  .form-container {
    max-width: 1000px;
    margin: 30px auto;
    padding: 25px;
    background-color: #f8f9fa;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  }

  .form-container h2 {
    margin-bottom: 25px;
    text-align: center;
    color: #28a745;
  }

  .form-group {
    margin-bottom: 18px;
  }

  label {
    font-weight: bold;
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
    border: 1px solid #ced4da;
    border-radius: 8px;
    font-size: 16px;
    background-color: #fff;
    transition: border 0.2s ease;
  }

  input:focus,
  select:focus {
    border-color: #28a745;
    outline: none;
    box-shadow: 0 0 5px rgba(40,167,69,0.3);
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
    background-color:rgb(20, 151, 59);
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
  }

  .btn-back:hover {
    background-color:rgb(22, 181, 33);
  }
</style>

<div class="form-container">
  <a class="btn-back" href="{{ url('purchases') }}">← Back to Purchases</a>

  <h2>Edit Purchase</h2>
  <form action="{{ url('purchases/'.$purchase->id) }}" method="post">
   @csrf
    @method('PUT')


    <div class="form-group">
      <label for="supplier_id">Supplier</label>
      <select name="supplier_id" id="supplier_id" required>
        <option value="" disabled selected>Select a supplier</option>
        @foreach($suppliers as $supplier)
          <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="purchase_date">Purchase Date</label>
      <input type="date" name="purchase_date" id="purchase_date" value="{{ $purchase->purchase_date }}" required>
    </div>

    <div class="form-group">
      <label for="shipping_address">Shipping Address</label>
      <input type="text" name="shipping_address" id="shipping_address" value="{{ $purchase->shipping_address }}" required>
    </div>

    <div class="form-group">
      <label for="purchase_total">Purchase Total</label>
      <input type="number" step="0.01" name="purchase_total" id="purchase_total" value="{{ $purchase->purchase_total }}" required>
    </div>

    <div class="form-group">
      <label for="paid_amount">Paid Amount</label>
      <input type="number" step="0.01" name="paid_amount" id="paid_amount" value="{{ $purchase->paid_amount }}" required>
    </div>

    <div class="form-group">
      <label for="discount">Discount</label>
      <input type="number" step="0.01" name="discount" id="discount" value="{{ $purchase->discount }}">
    </div>

    <button type="submit" class="btn-submit">Update Purchase</button>
  </form>
</div>

@endsection
