@extends("layouts.master")

@section("page")

<style>
  .finished-container {
    padding: 10px;
    background: #f0f2f5;
  }

  .finished-box {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    padding: 30px;
  }

  .top-bar {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
  }

  .top-bar .btn {
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 8px;
  }

  .finished-table {
    width: 100%;
    border-collapse: collapse;
  }

  .finished-table th {
    background-color: #0d6efd;
    color: #fff;
    text-align: center;
    padding: 14px;
    font-size: 15px;
    border-bottom: 2px solid #dee2e6;
  }

  .finished-table td {
    text-align: center;
    padding: 12px 10px;
    font-size: 14px;
    border-bottom: 1px solid #dee2e6;
  }

  .finished-table tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  .finished-table tr:hover {
    background-color: #e9f0f7;
    transition: 0.3s;
  }

  .btn-group .btn {
    margin-right: 6px;
    font-size: 13px;
    padding: 8px 12px;
    border-radius: 6px;
    transition: 0.2s ease;
  }

  .btn-group .btn:hover {
    transform: scale(1.05);
  }

  .empty-message {
    text-align: center;
    color: #6c757d;
    font-style: italic;
    padding: 20px;
  }
</style>

<div class="container finished-container">
  <div class="finished-box">
    <div class="top-bar">
      <a class="btn btn-info" href="{{url('finishedGoods/create')}}">+ New Finished Goods</a>
    </div>

    <table class="table finished-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Order Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($finishedGoods as $finishedGood)
        <tr>
          <td>{{ $finishedGood->id }}</td>
          <td>{{ $finishedGood->product_name }}</td>
          <td>{{ $finishedGood->quantity }}</td>
          <td>{{ $finishedGood->price }}</td>
          <td>{{ $finishedGood->order_date }}</td>
          <td>{{ $finishedGood->finished_good_status }}</td>
          <td>
            <div class="btn-group">
              <a class="btn btn-primary" href='{{url("finishedGoods/$finishedGood->id/edit")}}'>Edit</a>
              <a class="btn btn-success" href='{{url("finishedGoods/$finishedGood->id")}}'>View</a>
              <a class="btn btn-danger" href='{{url("finishedGoods/$finishedGood->id/confirm")}}'>Delete</a>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="empty-message">No Finished Goods Found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@endsection
