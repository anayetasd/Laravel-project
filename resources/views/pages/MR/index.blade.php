@extends("layouts.master")

@section("page")

<style>
  .purchase-container {
    max-width: 1150px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  }

  .top-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .top-bar h2 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
  }

  .top-bar a {
    padding: 8px 14px;
    background-color: #17a2b8;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
  }

  .top-bar a:hover {
    background-color: #138496;
  }

  table.purchase-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    background-color: white;
  }

  table.purchase-table th,
  table.purchase-table td {
    border: 1px solid #ddd;
     padding: 12px 15px;
    text-align: center;
    font-size: 14px;
  }

  table.purchase-table th {
    background-color: #007bff;
    color: white;
    font-weight: bold;
  }

  table.purchase-table tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .btn-group {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 6px;
  }

  .btn-group a {
    padding: 5px 10px;
    font-size: 13px;
    border: none;
    border-radius: 4px;
    color: white;
    text-decoration: none;
  }

  .btn-primary {
    background-color: #007bff;
  }

  .btn-success {
    background-color: #28a745;
  }

  .btn-warning {
    background-color: #ffc107;
    color: black;
  }

  .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
    gap: 6px;
    flex-wrap: wrap;
  }

  .pagination > * {
    padding: 6px 10px;
    border: 1px solid #ccc;
    text-decoration: none;
    color: #333;
    border-radius: 4px;
    font-size: 14px;
  }

  .pagination .active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
  }

  @media (max-width: 768px) {
    table.purchase-table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }
  }
</style>

<div class="purchase-container">
  <div class="top-bar">
    <h2>Money Receipts</h2>
    <a href="{{ url('mrs/create') }}">+ Add New Receipt</a>
  </div>

  <table class="purchase-table">
    <tr>
      <th>ID</th>
      <th>Customer</th>
      <th>Receipt Date</th>
      <th>Shipping Address</th>
      <th>Receipt Total</th>
      <th>Paid Amount</th>
      <th>Discount</th>
      <th>Action</th>
    </tr>

    @forelse ($mrs as $mr)
    <tr>
      <td>{{ $mr->id }}</td>
      <td>{{ $mr->customer->name ?? 'No Name' }}</td>
      <td>{{ $mr->receipt_date ?? '2024-06-24' }}</td>
      <td>{{ $mr->shipping_address ?? 'Barishal' }}</td>
      <td>{{ number_format($mr->receipt_total, 2) }}</td>
      <td>{{ number_format($mr->paid_amount, 2) }}</td>
      <td>{{ number_format($mr->discount, 2) }}</td>
      <td>
        <div class="btn-group">
          <a class="btn-primary" href="{{ url('mrs/' . $mr->id . '/edit') }}">Edit</a>
          <a class="btn-success" href="{{ url('mrs/' . $mr->id) }}">View</a>
          <a class="btn-warning" href="{{ url('mrs/' . $mr->id . '/confirm') }}">Delete</a>
        </div>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="8">No receipts found.</td>
    </tr>
    @endforelse
  </table>

  <div class="pagination">
    {{ $mrs->links() }}
  </div>
</div>

@endsection
