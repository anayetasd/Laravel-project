@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 35px;
        background-color: #f9f9f9;
        border-radius: 15px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #0d6efd;
        font-weight: 700;
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #212529;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="file"],
    .form-group input[type="date"],
    .form-group input[type="number"],
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ced4da;
        border-radius: 10px;
        font-size: 15px;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.1rem rgba(13, 110, 253, 0.25);
        outline: none;
    }

    .btn-submit {
        width: 100%;
        padding: 14px;
        font-size: 17px;
        background-color: #0d6efd;
        color: white;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0b5ed7;
    }
</style>

<div class="form-container">
    <h2>➕ Add New Employee</h2>
    <form action="{{ url('employees') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name"> Name</label>
            <input type="text" name="name" id="name" />
        </div>

        <div class="form-group">
            <label for="employeeshift_id"> Shift</label>
            <select name="employeeshift_id" id="employeeshift_id" required>
                <option value="" disabled selected>Select shift</option>
                @foreach($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="employee_categorie_id"> Category</label>
            <select name="employee_categorie_id" id="employee_categorie_id" required>
                <option value="" disabled selected>Select category</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="joining_date"> Joining Date</label>
            <input type="date" name="joining_date" id="joining_date"  />
        </div>

        <div class="form-group">
            <label for="photo"> Photo</label>
            <input type="file" name="photo" id="photo" />
        </div>

        <div class="form-group">
            <label for="phone"> Phone</label>
            <input type="number" name="phone" id="phone"  />
        </div>

        <div class="form-group">
            <label for="email">Address</label>
           <textarea name="address" id="address"></textarea>
        </div>

        <button type="submit" class="btn-submit">Save Employee</button>
    </form>
</div>

@endsection
