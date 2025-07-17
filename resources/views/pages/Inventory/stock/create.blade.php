@extends("layouts.master")

@section('page')

<style>
    .form-container {
        max-width: 1000px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }

    .form-container h3 {
        margin-bottom: 25px;
        font-weight: 600;
        text-align: center;
        color: #333;
    }

    .form-label {
        font-weight: 500;
    }

    .btn-submit {
        width: 100%;
    }
</style>

<div class="form-container">
    <h3>Create New Stock Entry</h3>

    <form action="{{ url('stocks') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Product Name</label>
            <select name="product_id" id="product_id" class="form-select" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="number" name="qty" id="qty" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="transaction_type_id" class="form-label">Transaction Type</label>
            <select name="transaction_type_id" id="transaction_type_id" class="form-select" required>
                @foreach($transaction_types as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="created_at" class="form-label">Created At</label>
            <input type="datetime-local" name="created_at" id="created_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="warehouse_id" class="form-label">Warehouse</label>
            <select name="warehouse_id" id="warehouse_id" class="form-select" required>
                @foreach($warehouses as $w)
                    <option value="{{ $w->id }}">{{ $w->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-submit">💾 Save Stock</button>
    </form>
</div>

@endsection
