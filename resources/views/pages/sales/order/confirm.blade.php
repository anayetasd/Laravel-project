@extends("layouts.master")

@section('page')

<style>
  .confirm-container {
    max-width: 500px;
    margin: 60px auto;
    padding: 30px 40px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
    text-align: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .confirm-container h2 {
    margin: 30px 0;
    color: #005792;
  }

  .btn-back {
    margin-bottom: 20px;
  }

  .btn-danger {
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
  }

  .btn-danger:hover {
    background-color: #a71d2a;
  }
</style>

<div class="confirm-container">
  <a href="{{ url('products') }}" class="btn btn-success btn-back">Back</a>

  <p class="fs-5">Are you sure?</p>
  <h2 class="p-3">{{ $order->customer_id }}</h2>

  <form action="{{ url('orders/'.$order->id) }}" method="post">
    @csrf
    @method("DELETE")
    <input class="btn btn-danger" type="submit" value="Confirm" />
  </form>
</div>

@endsection
