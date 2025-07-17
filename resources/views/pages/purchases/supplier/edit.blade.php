@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #198754;
        font-weight: 600;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 500;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ced4da;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.3s;
    }

    .form-group input:focus {
        border-color: #198754;
        outline: none;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        background-color: #198754;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #157347;
    }

    .btn-back {
        margin: 20px auto 0;
        display: block;
        width: fit-content;
    }
</style>

<a class="btn btn-success btn-back" href="{{ url('suppliers') }}">← Back to Suppliers</a>

<div class="form-container">
    <h2>Edit Supplier</h2>
    <form action="{{ url('suppliers/' . $supplier->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $supplier->name }}" required />
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" id="mobile" value="{{ $supplier->mobile }}" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ $supplier->email }}" />
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" />
        </div>

        <button type="submit" class="btn-submit">✅ Update Supplier</button>
    </form>
</div>

@endsection
