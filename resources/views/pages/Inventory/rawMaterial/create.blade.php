@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #ffffff;
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

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 8px;
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
    }

    input[type="submit"] {
        background-color: #005792;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #003f66;
    }
</style>

<div class="form-container">
    <h2>Add New Raw Material</h2>
    
    <form action="{{ url('rawMaterials') }}" method="post">
        @csrf
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required />
        
        <label for="unit">Unit</label>
        <input type="text" name="unit" id="unit" required />
        
        <label for="price_per_unit">Price per Unit</label>
        <input type="text" name="price_per_unit" id="price_per_unit" required />
        
        <input type="submit" value="Save" />
    </form>
</div>

@endsection
