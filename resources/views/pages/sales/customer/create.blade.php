@extends("layouts.master")

@section('page')

<style>
    body {
        background-color: #f4f6f8;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .create-container {
        max-width: 1000px;
        margin: 50px auto;
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
    }

    .create-container h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea,
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px 14px;
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
        text-align: center;
        margin-top: 30px;
    }

    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 12px 28px;
        font-size: 16px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        transition: 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
        cursor: pointer;
    }
</style>

<div class="create-container">
    <h2>Create New Customer</h2>

    <form action="{{ url('customers') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id">Customer ID</label>
            <input type="text" name="id" required>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="form-group">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" required></textarea>
        </div>

        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Save</button>
        </div>
    </form>
</div>

@endsection
