@extends("layouts.master")

@section("page")

<?php
  use App\Libraries\Core\File;
?>

<style>
  .purchase-container {
    padding: 20px;
    background: #f9f9f9;
  }

  .purchase-table {
    width: 1100px;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .purchase-table th,
  .purchase-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 14px;
  }

  .purchase-table th {
    background-color: #007bff;
    color: white;
  }

  .purchase-table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .btn-group .btn {
    margin-right: 5px;
  }

  .top-bar {
    margin-bottom: 20px;
    display: flex;
    justify-content: flex-end;
  }

  .btn-info {
    background-color: #17a2b8;
    color: white;
  }

  .btn-info:hover {
    background-color: #138496;
  }

</style>

<div class="container purchase-container">
  <div class="top-bar">
    <a class="btn btn-info" href="{{ url('purchases/create') }}">+ Add New Purchase</a>
  </div>

  <table class="table purchase-table">
    <tr>
      <th>ID</th>
      <th>Supplier</th>
      <th>Purchase Date</th>
      <th>Shipping Address</th>
      <th>Purchase Total</th>
      <th>Paid Amount</th>
      <th>Discount</th>
      <th>Action</th>
    </tr>
    
    @forelse ($purchases as $purchase)
    <tr>
      <td>{{ $purchase->id }}</td>
      <td>{{ $purchase->supplier->name ?? 'no name' }}</td>
      <td>{{ $purchase->purchase_date }}</td>
      <td>{{ $purchase->shipping_address }}</td>
      <td>{{ $purchase->purchase_total }}</td>
      <td>{{ $purchase->paid_amount }}</td>
      <td>{{ $purchase->discount }}</td>
      <td>
        <div class="btn-group">
          <a class="btn btn-primary" href='{{ url("purchases/$purchase->id/edit") }}'>Edit</a>
          <a class="btn btn-success" href='{{ url("purchases/$purchase->id") }}'>View</a>
          <a class="btn btn-warning" href='{{ url("purchases/$purchase->id/confirm") }}'>Delete</a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="7">No purchases found.</td>
    </tr>
    @endforelse
  </table>

   <div class="d-flex justify-content-center">
        {{ $purchases->links() }}
    </div>
</div>

@endsection
