


@extends('layouts.master')

@section('page')
@php
  $company = App\Models\Company::first(); // or however you're fetching it
  $customer = $purchase->supplier;
  $details = $purchase->items;
  $subtotal = 0;
@endphp

<div class="card mb-3">
  <div class="card-body">
    <div class="row align-items-center text-center mb-3">
      <div class="col-sm-6 text-sm-start">
        <img src="{{ asset('img/' . $company->logo) }}" width="100" />
      </div>
      <div class="col text-sm-end mt-3 mt-sm-0">
        <h2 class="mb-3">Invoice</h2>
        <h5>{{ $company->name }}</h5>
        <p class="fs--1 mb-0">{{ $company->street_address }}<br />{{ $company->area }}, {{ $company->city }}</p>
      </div>
      <div class="col-12">
        <hr />
      </div>
    </div>

    <div class="row align-items-center">
      <div class="col">
        <h6 class="text-500">Invoice to</h6>
        <h5>{{ $customer->name }}</h5>
        <p class="fs--1">{{ $purchase->shipping_address }}</p>
        <p class="fs--1">
          <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a><br />
          <a href="tel:{{ $customer->mobile }}">{{ $customer->mobile }}</a>
        </p>
      </div>
      <div class="col-sm-auto ms-auto">
        <div class="table-responsive">
          <table class="table table-sm table-borderless fs--1">
            <tbody>
              <tr>
                <th class="text-sm-end">Invoice No:</th>
                <td>{{ $purchase->id }}</td>
              </tr>
              <tr>
                <th class="text-sm-end">Invoice Date:</th>
                <td>{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d-M-Y') }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="table-responsive scrollbar mt-4 fs--1">
      <table class="table table-striped border-bottom">
        <thead class="light">
          <tr class="bg-primary text-white">
            <th>Products</th>
            <th class="text-center">Quantity</th>
            <th class="text-end">Rate</th>
            <th class="text-end">Amount</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($details as $item)
            @php
              $product = $item->product;
              $lineTotal = $item->qty * $item->price;
              $subtotal += $lineTotal;
            @endphp
            <tr>
              <td>{{ $product->name ?? 'N/A' }}</td>
              <td class="text-center">{{ $item->qty }}</td>
              <td class="text-end">৳{{ number_format($item->price, 2) }}</td>
              <td class="text-end">৳{{ number_format($lineTotal, 2) }}</td>
              <td></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    @php
      $tax = round($subtotal * 0.03, 2);
      $netTotal = $subtotal + $tax;
      $due = $netTotal - $purchase->paid_amount;
    @endphp

    <div class="row justify-content-end">
      <div class="col-auto">
        <table class="table table-sm table-borderless fs--1 text-end">
          <tr>
            <th class="text-900">Subtotal:</th>
            <td class="fw-semi-bold">৳{{ number_format($subtotal, 2) }}</td>
          </tr>
          <tr>
            <th class="text-900">Tax 3%:</th>
            <td class="fw-semi-bold">৳{{ number_format($tax, 2) }}</td>
          </tr>
          <tr class="border-top">
            <th class="text-900">Total:</th>
            <td class="fw-semi-bold">৳{{ number_format($netTotal, 2) }}</td>
          </tr>
          <tr>
            <th>Discount:</th>
            <td>৳{{ number_format($purchase->discount, 2) }}</td>
          </tr>
          <tr>
            <th>Paid:</th>
            <td>৳{{ number_format($purchase->paid_amount, 2) }}</td>
          </tr>
          <tr class="border-top border-top-2 fw-bolder text-900">
            <th>Amount Due:</th>
            <td>৳{{ number_format($due, 2) }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <div class="card-footer bg-light">
    <p class="fs--1 mb-0 "><strong>Notes: </strong>We really appreciate your business and if there’s anything
        else we can do, please let us know!</p>
  </div>
</div>
@endsection
