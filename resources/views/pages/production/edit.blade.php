@extends("layouts.master")

@section("page")

<style>
    .form-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-container h2 {
        margin-bottom: 25px;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #555;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 16px;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
        outline: none;
    }

    .form-submit {
        text-align: center;
    }

    .form-submit input[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 10px 30px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-submit input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .btn-success {
        margin: 20px;
    }
</style>

<a class="btn btn-success" href="{{ url('productions') }}">← Back</a>

<div class="form-container">
    <h2>Edit Production</h2>

    <form action="{{ url('productions/'.$production->id) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="production_date">Production Date</label>
            <input type="text" name="production_date" id="production_date" value="{{ $production->production_date }}" />
        </div>

        <div class="form-group">
            <label for="product_id">Product Name</label>
            <select name="product_id" id="product_id">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $production->product_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="raw_material_id">Raw Material Used</label>
            <select name="raw_material_id" id="raw_material_id">
                @foreach($rawmaterials as $rawmaterial)
                    <option value="{{ $rawmaterial->id }}" {{ $production->raw_material_id == $rawmaterial->id ? 'selected' : '' }}>
                        {{ $rawmaterial->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="raw_material_qty">Raw Material Qty</label>
            <select name="raw_material_qty" id="raw_material_qty">
                @foreach($rawmaterials as $rawmaterial)
                    <option value="{{ $rawmaterial->id }}" {{ $production->raw_material_id == $rawmaterial->id ? 'selected' : '' }}>
                        {{ $rawmaterial->unit }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="unit">Wastage Unit</label>
            <input type="text" name="unit" id="unit" value="{{ $production->unit }}" />
        </div>

        <div class="form-group">
            <label for="quantity_produced">Total Produced</label>
            <input type="text" name="quantity_produced" id="quantity_produced" value="{{ $production->quantity_produced }}" />
        </div>

        <div class="form-submit">
            <input type="submit" value="Update" />
        </div>
    </form>
</div>

@endsection
