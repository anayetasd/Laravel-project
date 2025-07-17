@extends("layouts.master")

@section("page")

<style>
  .show-container {
    max-width: 950px;
    margin: 40px auto;
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .show-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #0d6efd;
  }

  .btn-back {
    display: inline-block;
    margin-bottom: 20px;
    color: white;
    background: #28a745;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
  }

  .btn-back:hover {
    background: #218838;
  }

  .details-table {
    width: 100%;
    border-collapse: collapse;
    background: white;
  }

  .details-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    font-size: 15px;
    color: #333;
  }

  .details-table td:first-child {
    font-weight: bold;
    background-color: #f8f9fa;
    width: 40%;
  }
</style>

<div class="show-container">
  <a class="btn-back" href="{{ url('finishedGoods') }}">← Back to Finished Goods</a>

  <h2>Finished Good Details</h2>

  <table class="details-table">
    <tr>  
      <td>ID</td><td>{{ $finishedGood->id }}</td>
    </tr>
    <tr>  
      <td>Product Name</td><td>{{ $finishedGood->product_name }}</td>
    </tr>
    <tr>  
      <td>Quantity</td><td>{{ $finishedGood->quantity }}</td>
    </tr>
    <tr>  
      <td>Price</td><td>{{ $finishedGood->price }}</td>
    </tr>
    <tr>  
      <td>Order Date</td><td>{{ $finishedGood->order_date }}</td>
    </tr>
    <tr>  
      <td>Status</td><td>{{ $finishedGood->finished_good_status }}</td>
    </tr>
  </table>
</div>

@endsection
