@extends("layouts.master")

@section('page')

<style>
    .confirm-container {
        max-width: 500px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        text-align: center;
    }

    .confirm-container h3 {
        margin-bottom: 25px;
        font-weight: 700;
        color: #dc3545; /* Bootstrap danger color */
    }

    .confirm-details {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        text-align: left;
        font-size: 1.1rem;
        color: #333;
        box-shadow: inset 0 0 10px #e9ecef;
    }

    .confirm-details strong {
        display: inline-block;
        width: 110px;
    }

    .btn-danger {
        width: 100%;
        font-weight: 600;
        padding: 10px 0;
        font-size: 1.1rem;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #b02a37;
    }

    .btn-back {
        display: inline-block;
        margin-bottom: 20px;
    }
</style>

<div class="confirm-container">

    <a class="btn btn-success btn-back" href="{{ url('stocks') }}">← Back</a>

    <h3>Are you sure you want to delete this stock?</h3>

    <div class="confirm-details">
        <p><strong>ID:</strong> {{ $stock->id }}</p>
        <p><strong>Product:</strong> {{ $stock->product->name ?? 'N/A' }}</p>
        <p><strong>Qty:</strong> {{ $stock->qty }}</p>
        <p><strong>Warehouse:</strong> {{ $stock->warehouse->name ?? 'N/A' }}</p>
    </div>

    <form action="{{ url('stocks/'.$stock->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" class="btn btn-danger" value="Yes, Delete" />
    </form>
</div>

@endsection
