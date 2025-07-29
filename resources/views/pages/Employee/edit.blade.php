@extends('layouts.master')

@section('page')

<style>
    .form-container {
       width: 1150px;
        margin: 40px auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #005792;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input[type="text"],
    input[type="date"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .btn-submit {
        background-color: #005792;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-submit:hover {
        background-color: #003f66;
    }

    .btn-back {
        display: inline-block;
        margin: 20px auto 10px 0;
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

    .photo-preview {
        margin-top: 10px;
    }

    .photo-preview img {
        height: 80px;
        border-radius: 6px;
        border: 1px solid #ccc;
    }
</style>

<a href="{{ url('employees') }}" class="btn-back">← Back</a>

<div class="form-container">
    <h2>Edit Employee</h2>

    <form action="{{ url('employees/'.$employee->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" required>
        </div>

        <div class="form-group">
            <label for="employeeshift_id">Shift</label>
            <select name="employeeshift_id" id="employeeshift_id" required>
                <option value="">-- Select Shift --</option>
                @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}" {{ $employee->employeeshift_id == $shift->id ? 'selected' : '' }}>
                        {{ $shift->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="employee_categorie_id">Category</label>
            <select name="employee_categorie_id" id="employee_categorie_id" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $employee->employee_categorie_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="form-group">
            <label for="joining_date">Joining Date</label>
            <input type="date" name="joining_date" id="joining_date" value="{{ old('joining_date', $employee->joining_date) }}" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $employee->phone_number) }}" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo <small>(Leave blank to keep current)</small></label>
            <input type="file" name="photo" id="photo" accept="image/*">

            @if ($employee->photo)
                <div class="photo-preview">
                    <img src="{{ asset('img/' . $employee->photo) }}" alt="Current Photo">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" required>{{ old('address', $employee->address) }}</textarea>
        </div>

        <button type="submit" class="btn-submit">💾 Save Employee</button>
    </form>
</div>

@endsection
