@extends("layouts.master")

@section("page")

<style>
    .confirm-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .confirm-container h2 {
        margin-bottom: 20px;
        color: #dc3545;
    }

    .confirm-container p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn-group {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .btn-danger {
        padding: 10px 25px;
        font-size: 16px;
    }

    .btn-back {
        padding: 10px 25px;
        font-size: 16px;
    }
</style>

<div class="confirm-container">
    <p class="text-muted">Are you sure you want to delete this supplier?</p>

    <h2>{{ $supplier->name }}</h2>

    <form action="{{ url('suppliers/' . $supplier->id) }}" method="post">
        @csrf
        @method("DELETE")
        <div class="btn-group">
            <input class="btn btn-danger" type="submit" value="Yes, Delete">
            <a class="btn btn-success btn-back" href="{{ url('suppliers') }}">Cancel</a>
        </div>
    </form>
</div>

@endsection
