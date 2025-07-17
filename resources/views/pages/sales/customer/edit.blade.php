

@extends("layouts.master")

@section('page')

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .page-header {
        text-align: center;
        padding: 40px 20px 20px;
    }

    .page-header h1 {
        font-size: 32px;
        font-weight: 700;
        color:#333;
    }

    .form-wrapper {
        max-width: 1050px;
        margin: 0 auto;
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea,
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        background-color: #fafafa;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 90px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .btn-submit {
        background-color: #28a745;
        color: white;
        padding: 12px 24px;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background-color: #218838;
    }

    .btn-back {
        background-color: #6c757d;
        color: white;
        padding: 10px 18px;
        font-size: 14px;
        border-radius: 6px;
        text-decoration: none;
    }

    .btn-back:hover {
        background-color: #5a6268;
    }
</style>

<div class="page-header">
    <h1>Edit Customer</h1>
</div>

<div class="form-wrapper">
    <form action="{{ url('customers/'.$customer->id) }}" method="post" enctype="multipart/form-data">
        @csrf 
        @method("PUT")

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" required />
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" value="{{ $customer->mobile }}" required />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $customer->email }}" required />
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" required>{{ $customer->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" />
        </div>

        <div class="form-actions">
            <a class="btn-back" href="{{ url('customers') }}">← Back</a>
            <button type="submit" class="btn-submit">Save</button>
        </div>
    </form>
</div>

@endsection
