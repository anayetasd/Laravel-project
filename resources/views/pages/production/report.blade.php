@extends('layouts.master')
@section("page")

<style>
    .report-container {
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .report-title {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 25px;
        color: #34495e;
        border-bottom: 2px solid #2980b9;
        padding-bottom: 10px;
    }

    .table th {
        background-color: #2980b9;
        color: #fff;
        text-align: center;
        vertical-align: middle;
    }

    .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }
</style>

<div class="container report-container">
    <div class="report-title">📊 Production Output Report</div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Paddy Used</th>
                    <th>Rice</th>
                    <th>Broken Rice</th>
                    <th>Husk</th>
                    <th>Bran</th>
                    <th>Total Output</th>
                    <th>Yield (%)</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($productions as $item)
                    @php
                        $totalOutput = $item->total_rice + $item->total_broken + $item->total_husk + $item->total_bran;
                        $yield = $item->total_paddy > 0 ? ($totalOutput / $item->total_paddy) * 100 : 0;
                    @endphp
                    <tr>
                        <td>{{ $item->production_date }}</td>
                        <td>{{ $item->total_paddy }} kg</td>
                        <td>{{ $item->total_rice }} kg</td>
                        <td>{{ $item->total_broken }} kg</td>
                        <td>{{ $item->total_husk }} kg</td>
                        <td>{{ $item->total_bran }} kg</td>
                        <td>{{ $totalOutput }} kg</td>
                        <td><span class="badge bg-success">{{ number_format($yield, 2) }}%</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-danger">No production data found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
