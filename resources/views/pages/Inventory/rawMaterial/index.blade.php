@extends("layouts.master")

@section("page")

<style>
    .container {
        max-width: 1100px;
        margin: 30px auto;
        font-family: 'Segoe UI', sans-serif;
    }

    .table-container {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.08);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        border-radius: 10px;
        overflow: hidden;
    }

    thead tr {
        background-color: #005792;
        color: #ffffff;
        font-size: 16px;
    }

    th, td {
        padding: 14px 18px;
        text-align: left;
    }

    tbody tr:nth-child(even) {
        background-color: #f4fafe;
    }

    tbody tr:hover {
        background-color: #e3f2fd;
        transition: 0.3s ease;
    }

    .btn {
        padding: 6px 12px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px;
        margin-right: 5px;
        display: inline-block;
        transition: 0.2s ease;
    }

    .btn-primary { background-color: #0061a8; color: white; }
    .btn-success { background-color: #28a745; color: white; }
    .btn-info    { background-color: #17a2b8; color: white; }
    .btn-warning { background-color: #ffc107; color: black; }
    .btn-danger  { background-color: #dc3545; color: white; }

    .btn:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-section h2 {
        margin: 0;
        font-size: 26px;
        color: #333;
    }
</style>

<div class="container">
    <div class="table-container">
        <div class="header-section">
            <h2>Raw Materials List</h2>
            <a class="btn btn-primary" href="{{ url('rawMaterials/create') }}">+ New Product</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Id</th> 
                    <th>Name</th> 
                    <th>Unit</th> 
                    <th>Price Per Unit</th> 
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rawMaterials as $rawMaterial)
                    <tr>
                        <td>{{ $rawMaterial->id }}</td>
                        <td>{{ $rawMaterial->name }}</td>
                        <td>{{ $rawMaterial->unit }}</td>
                        <td>{{ $rawMaterial->price_per_unit }}</td>
                        <td>
                            <a class="btn btn-success" href='{{ url("rawMaterials/$rawMaterial->id") }}'>View</a>
                            <a class="btn btn-info" href='{{ url("rawMaterials/$rawMaterial->id/edit") }}'>Edit</a>
                            <a class="btn btn-warning" href='{{ url("rawMaterials/$rawMaterial->id/confirm") }}'>Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #888;">No Raw Materials Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
