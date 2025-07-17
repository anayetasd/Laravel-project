@extends("layouts.master")

@section('page')

<style>
  .confirm-container {
    max-width: 500px;
    margin: 50px auto;
    padding: 30px;
    background-color: #fff3f3;
    border: 1px solid #f5c6cb;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    text-align: center;
  }

  .confirm-container h2 {
    color: #dc3545;
    margin-bottom: 20px;
    padding: 0 10px;
  }

  .confirm-container p {
    font-size: 18px;
    margin-bottom: 30px;
    font-weight: 600;
  }

  .btn-danger {
    padding: 10px 25px;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    cursor: pointer;
  }

  .btn-success {
    margin-bottom: 20px;
    display: inline-block;
  }
</style>

<div class="confirm-container">
  <a class="btn btn-success" href="{{ url('products') }}">← Back</a>

  <p>Are you sure you want to delete this product?</p>

  <h2>{{ $product->name }}</h2>

  <form action="{{ url('products/'.$product->id) }}" method="post">
      @csrf
      @method("DELETE")
      <input class="btn btn-danger" type="submit" value="Confirm" />
  </form>
</div>

@endsection
