@extends("layouts.master")

@section("page")

<style>
    .detail-container {
        max-width: 1150px;
        margin: 40px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', sans-serif;
    }

    .detail-container h2 {
        text-align: center;
        margin-bottom: 35px;
        color: #005792;
        font-size: 28px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    table.detail-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    table.detail-table tr {
        border-bottom: 1px solid #e0e0e0;
    }

    table.detail-table td {
        padding: 14px 16px;
    }

    table.detail-table td:first-child {
        font-weight: 600;
        color: #333;
        width: 35%;
        background-color: #f0f4f8;
        border-right: 1px solid #e0e0e0;
    }

    table.detail-table td:last-child {
        background-color: #fafafa;
        color: #555;
    }

    .btn-back {
        display: inline-block;
        margin: 20px 0 0 40px;
        text-decoration: none;
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 15px;
        transition: background-color 0.3s ease;
    }

    .btn-back:hover {
        background-color: #218838;
    }

    @media (max-width: 768px) {
        .detail-container {
            padding: 25px 20px;
        }

        table.detail-table td {
            display: block;
            width: 100%;
        }

        table.detail-table tr {
            display: block;
            margin-bottom: 15px;
        }

        table.detail-table td:first-child {
            background-color: transparent;
            border-right: none;
            font-weight: bold;
            padding-bottom: 6px;
        }

        table.detail-table td:last-child {
            background-color: #f9f9f9;
        }
    }
</style>

<a class="btn-back" href="{{ url('employees') }}">← Back</a>

<div class="detail-container">
    <h2>Employee Details</h2>
    <table class="detail-table">
        <tr>
            <td>ID</td>
            <td>{{ $employee->id }}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $employee->name }}</td>
        </tr>
        <tr>
            <td>Shift</td>
            <td>{{ $employee->shift->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Category</td>
            <td>{{ $employee->categorie->name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td>Joining Date</td>
            <td>{{ $employee->joining_date }}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{ $employee->address }}</td>
        </tr>
    </table>
</div>

@endsection
