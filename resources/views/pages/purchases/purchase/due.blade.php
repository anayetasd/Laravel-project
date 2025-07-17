@extends("layouts.master")

@section("page")

<style>
    .due-report {
        width: 1100px;
        margin: 30px auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .due-report h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .due-report table {
        width: 100%;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .due-report th, .due-report td {
        padding: 30px 25px;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    .due-report th {
        background-color:rgb(22, 157, 167);
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    .due-report tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .due-report tr:hover {
        background-color: #e9ecef;
    }

    .due-report td:last-child {
        font-weight: bold;
        color: #e74c3c;
    }
</style>

<div class="due-report">
    <h2>Purchases Due Report</h2>
    <table>
        <thead>
            <tr>
                <th>Purchases</th>
                <th>Total Purchases</th>
                <th>Total Paid</th>
                <th>Due</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row['name'] }}</td>
                <td>{{ number_format($row['total_purchase'], 2) }}</td>
                <td>{{ number_format($row['total_paid'], 2) }}</td>
                <td>{{ number_format($row['total_due'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
