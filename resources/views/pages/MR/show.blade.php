@extends("layouts.master")

@section("page")

<style>
  .invoice-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .invoice-header {
    text-align: center;
    color: #007bff;
    margin-bottom: 30px;
    font-size: 28px;
    font-weight: bold;
  }

  .info-section {
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    flex-wrap: wrap;
  }

  .mr-info, .customer-info {
    width: 48%;
  }

  .mr-info td, .customer-info td {
    padding: 6px 10px;
    font-size: 15px;
  }

  .product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .product-table th, .product-table td {
    border: 1px solid #dee2e6;
    padding: 10px;
    text-align: center;
  }

  .product-table th {
    background-color: #0d6efd;
    color: white;
    font-size: 14px;
  }

  .summary {
    text-align: right;
    font-size: 15px;
    margin-top: 20px;
  }

  .summary p {
    margin: 4px 0;
  }

  .btn-back, .btn-print {
    display: inline-block;
    margin-bottom: 20px;
    background-color: #28a745;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
  }

  .btn-print {
    background-color: #007bff;
    float: right;
  }

  .btn-print:hover {
    background-color: #0056b3;
  }

  .btn-back:hover {
    background-color: #218838;
  }

  @media print {
    .btn-back, .btn-print {
      display: none !important;
    }
  }
</style>

<div class="invoice-container" id="printMR">
  <a class="btn-back" href="{{ url('mrs') }}">← Back to Purchases</a>
  <a class="btn-print" href="#" onclick="printInvoice()">🖨 Print Invoice</a>

  <div class="invoice-header">Money Receipt</div>

  {{-- Info Section --}}
  <div class="info-section">
    {{-- Customer Info --}}
    @if($mr->customer)
    <table class="customer-info">
      <tr><td><strong>Customer Name:</strong></td><td>{{ $mr->customer->name }}</td></tr>
      <tr><td><strong>Mobile:</strong></td><td>{{ $mr->customer->mobile }}</td></tr>
      <tr><td><strong>Email:</strong></td><td>{{ $mr->customer->email }}</td></tr>
    </table>
    @endif

    {{-- Money Receipt Info --}}
    <table class="mr-info">
      <tr><td><strong>Receipt ID:</strong></td><td>{{ $mr->id }}</td></tr>
      <tr><td><strong>Date:</strong></td><td>{{ \Carbon\Carbon::parse($mr->mr_date)->format('d M, Y') }}</td></tr>
      <tr><td><strong>Shipping Address:</strong></td><td>{{ $mr->shipping_address }}</td></tr>
    </table>
  </div>

  {{-- Product Table --}}
  <table class="product-table">
    <thead>
      <tr>
        <th>#</th>
        <th>Customer</th>
        <th>Qty</th>
        <th>Rate</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @php
          $i = 1;
          $subtotal = 0;
      @endphp

      @foreach($mr->mrDetails as $mrDetail)
          @php
              $subtotal += $mrDetail->qty * $mrDetail->price;
          @endphp
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ optional($mrDetail->customer)->name ?? 'N/A' }}</td>
          <td>{{ $mrDetail->qty }}</td>
          <td>৳{{ number_format($mrDetail->price, 2) }}</td>
          <td>৳{{ number_format($mrDetail->qty * $mrDetail->price, 2) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Summary --}}
  <div class="summary">
      <p><strong>Subtotal:</strong> ৳{{ number_format($subtotal, 2) }}</p>
      <p><strong>Discount:</strong> ৳{{ number_format($mr->discount, 2) }}</p>
      <p><strong>Paid:</strong> ৳{{ number_format($mr->paid_amount, 2) }}</p>
      <p><strong>Due:</strong> ৳{{ number_format(($subtotal - $mr->discount) - $mr->paid_amount, 2) }}</p>
  </div>
</div>

{{-- Print Script --}}
<script>
  function printInvoice() {
    const content = document.getElementById('printMR').innerHTML;
    const original = document.body.innerHTML;

    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = original;
    location.reload();
  }
</script>

@endsection
