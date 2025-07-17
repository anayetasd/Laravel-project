@extends("layouts.master")

@section("page")

<style>
  .invoice-container {
    max-width: 1100px;
    margin: 40px auto;
    padding: 30px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    font-family: 'Segoe UI', sans-serif;
  }

  .invoice-container h2 {
    text-align: center;
    color: #007bff;
    margin-bottom: 25px;
  }

  .invoice-info {
    float: right;
    text-align: left; 
    margin-bottom: 25px;
  }

  .invoice-info td, .supplier-info td {
    padding: 8px 10px;
    font-size: 15px;
  }

  .product-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
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
    margin-top: 15px;
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

<div class="invoice-container" id="printInvoice">
  <a class="btn-back" href="{{ url('purchases') }}">← Back to Purchases</a>
  <a class="btn-print" href="#" onclick="printInvoice()">🖨 Print Invoice</a>

  <h2>Purchase Invoice</h2>

  {{-- Invoice Info --}}
  <table class="invoice-info">
    <tr><td><strong>Invoice ID:</strong></td><td>{{ $purchase->id }}</td></tr>
    <tr><td><strong>Purchase Date:</strong></td><td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') }}</td></tr>
    <tr><td><strong>Shipping Address:</strong></td><td>{{ $purchase->shipping_address }}</td></tr>
  </table>

  {{-- Supplier Info --}}
  @if($purchase->supplier)
  <table class="supplier-info">
    <tr><td><strong>Supplier Name:</strong></td><td>{{ $purchase->supplier->name }}</td></tr>
    <tr><td><strong>Mobile:</strong></td><td>{{ $purchase->supplier->mobile }}</td></tr>
    <tr><td><strong>Email:</strong></td><td>{{ $purchase->supplier->email }}</td></tr>
  </table>
  @endif

  {{-- Product Table --}}
  <table class="product-table">
    <thead>


      <tr>
        <th>#</th>
        <th>Product</th>
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
              
      @foreach($purchase->details as $detail)
              @php
                $subtotal += $detail->qty * $detail->price;
              @endphp
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ optional($detail->product)->name ?? 'No Product' }}</td>
            <td>{{ $detail->qty }}</td>
            <td>৳{{ number_format($detail->price, 2) }}</td>
            <td>৳{{ number_format($detail->qty * $detail->price, 2) }}</td>
          </tr>
      @endforeach

    </tbody>
  </table>

  <div class="summary">
      <p><strong>Subtotal:</strong> ৳{{ number_format($subtotal, 2) }}</p>
      <p><strong>Discount:</strong> ৳{{ number_format($purchase->discount, 2) }}</p>
      <p><strong>Paid:</strong> ৳{{ number_format($purchase->paid_amount, 2) }}</p>
      <p><strong>Due:</strong> ৳{{ number_format(($subtotal - $purchase->discount) - $purchase->paid_amount, 2) }}</p>
  </div>


  <div style="text-align: right; margin-top: 20px;">
    <a class="btn btn-success" href="{{ url('mrs/create') }}">🧾 Money Receipt</a>
  </div>

</div>

{{-- Print Script --}}
<script>
  function printInvoice() {
    const content = document.getElementById('printInvoice').innerHTML;
    const original = document.body.innerHTML;

    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = original;
    location.reload();
  }
</script>

@endsection
