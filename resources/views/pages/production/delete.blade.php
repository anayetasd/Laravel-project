@extends("layouts.master")

@section('page')

<style>
    .confirm-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: center;
    }

    .confirm-container h2 {
        margin: 10px 0;
        color: #333;
    }

    .confirm-container p {
        font-size: 18px;
        color: #555;
        margin-bottom: 25px;
    }

    .btn-danger {
        background-color: #dc3545;
        border: none;
        padding: 10px 25px;
        color: #fff;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-success {
        margin: 20px;
    }
</style>

<a class="btn btn-success" href="{{url('productions')}}">← Back</a>

<div class="confirm-container">
    <p>Are you sure you want to delete this production?</p>

    <h2>Production Date: {{ $production->production_date }}</h2>
    <h2>Product Name: {{ $production->product->name ?? 'no name' }}</h2>

    <h2>Total Produced: {{ $production->quantity_produced }}</h2>

    <form action="{{ url('productions/'.$production->id) }}" method="post">
        @csrf 
        @method("DELETE")
        <input class="btn btn-danger" type="submit" value="Confirm Delete">
    </form>
</div>

@endsection
