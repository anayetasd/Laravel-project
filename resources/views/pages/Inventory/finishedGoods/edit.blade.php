@extends("layouts.master")

@section("page")

<style>
  .form-wrapper {
    max-width: 1000px;
    margin: 40px auto;
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .form-wrapper h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #0d6efd;
  }

  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
    color: #333;
  }

  input[type="text"],
  input[type="number"],
  input[type="date"],
  select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 15px;
  }

  input[type="submit"] {
    background-color: #0d6efd;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
    width: 100%;
    margin-top: 15px;
  }

  input[type="submit"]:hover {
    background-color: #084fc2;
  }

  .btn-back {
    display: inline-block;
    margin-bottom: 20px;
    color: white;
    background: #6c757d;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
  }

  .btn-back:hover {
    background: #5a6268;
  }
</style>

<div class="form-wrapper">
  <a class="btn-back" href="{{ url('finishedGoods') }}">← Back to Finished Goods</a>

  <h2>Edit Finished Good</h2>

  <form action="{{ url('finishedGoods/'.$finishedGood->id) }}" method="POST">
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="product_name">Product Name</label>
      <input type="text" name="product_name" id="product_name" value="{{ $finishedGood->product_name }}" required />
    </div>

    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="text" name="quantity" id="quantity" value="{{ $finishedGood->quantity }}" required />
    </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" name="price" id="price" value="{{ $finishedGood->price }}" required />
    </div>

    <div class="form-group">
      <label for="order_date">Order Date</label>
      <input type="text" name="order_date" id="order_date" value="{{ $finishedGood->order_date }}" required />
    </div>

    <div class="form-group">
      <label for="finished_good_status">Status</label>
      <input type="text" name="finished_good_status" id="finished_good_status" value="{{ $finishedGood->finished_good_status }}" required />
    </div>

    <input type="submit" value="Update Finished Good" />
  </form>
</div>

@endsection
