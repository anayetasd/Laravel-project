@extends("layouts.master")

@section("page")

<style>
    .confirm-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px 40px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
        text-align: center;
    }

    .confirm-container h2 {
        margin-bottom: 20px;
        color: #b30000;
    }

    .confirm-container p {
        font-size: 18px;
        margin-bottom: 30px;
        color: #333;
    }

    .btn-confirm {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn-confirm:hover {
        background-color: #c82333;
    }

    .btn-back {
        display: inline-block;
        margin-top: 15px;
        text-decoration: none;
        background-color: #28a745;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 15px;
    }

    .btn-back:hover {
        background-color: #218838;
    }
</style>

<div class="confirm-container">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete Raw Material ID: <strong>{{ $employee->id }}</strong>?</p>

    <h4>Employee Name: {{ $employee->name }}</h4>

    <h4>Address: {{ $employee->address }}</h4>


    <form action="{{ url('employees/'.$employee->id) }}" method="post">
        @csrf
        @method("DELETE")
        
        <input class="btn-confirm" type="submit" value="Yes, Delete It" />
    </form>

    <a class="btn-back" href="{{ url('employees') }}">← Back</a>
</div>

@endsection
