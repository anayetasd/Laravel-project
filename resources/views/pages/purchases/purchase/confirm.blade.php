@extends("layouts.master")

@section("page")

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
  }

  .confirm-container p {
    font-size: 18px;
    margin-bottom: 30px;
  }

  .btn-danger {
    padding: 10px 20px;
    font-weight: bold;
    border-radius: 8px;
    border: none;
  }

  .btn-back {
    margin-top: 20px;
    display: inline-block;
    background-color: #6c757d;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
  }

  .btn-back:hover {
    background-color: #5a6268;
  }
</style>

<div class="confirm-container">
  <h2>Delete Purchase #{{ $purchase->id }}</h2>
  <p>Are you sure you want to delete this purchase?</p>

  <form action="{{ url('purchases/'.$purchase->id) }}" method="post">
    @csrf
    @method("DELETE")
    <input class="btn btn-danger" type="submit" value="Yes, Confirm Delete">
  </form>

  <a class="btn-back" href="{{ url('purchases') }}">← Cancel</a>
</div>

@endsection
