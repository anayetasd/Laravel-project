@extends("layouts.master")


@section('page')


    @php
    $totalPurchases = 50;
    $totalSales = 40;
    $totalStocks = 1200;
    $totalSuppliers = 10;

    $latestPurchases = [
        (object)['purchase_date' => '2025-06-23', 'supplier' => (object)['name' => 'Milon Rice Traders'], 'purchase_total' => 50000],
        (object)['purchase_date' => '2025-06-22', 'supplier' => (object)['name' => 'Jamal Traders'], 'purchase_total' => 43000],
    ];

    $latestSales = [
        (object)['sale_date' => '2025-06-25', 'customer' => (object)['name' => 'Mamun Enterprise'], 'sale_total' => 48000],
        (object)['sale_date' => '2025-06-24', 'customer' => (object)['name' => 'Babu Rice'], 'sale_total' => 35000],
    ];

    $topProducts = [
        (object)['name' => 'Atop Rice', 'quantity' => 1200],
        (object)['name' => 'Miniket Rice', 'quantity' => 850],
        (object)['name' => 'Nazirshail', 'quantity' => 640],
    ];

    $lowStocks = [
        (object)['name' => 'Chinigura Rice', 'quantity' => 20],
        (object)['name' => 'BR28', 'quantity' => 15],
    ];

    $dueCustomers = [
        (object)['name' => 'Mr. Alam', 'due' => 12000],
        (object)['name' => 'Rashid Traders', 'due' => 18000],
    ];
    @endphp

    <style>
    .dashboard-container {
        padding: 40px;
        background-color: #f8fafc;
    }

    .dashboard-card {
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.07);
        transition: transform 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-value {
        font-size: 2.3rem;
        font-weight: bold;
        color: #0d6efd;
    }

    .section-heading {
        margin-top: 60px;
        font-size: 1.4rem;
        font-weight: bold;
        border-bottom: 2px solid #ddd;
        padding-bottom: 5px;
        margin-bottom: 20px;
    }
    </style>

    <div class="container-fluid dashboard-container">
    <h2 class="text-center mb-5">🏭 Rice Mills Management Dashboard</h2>

    {{-- Summary --}}
    <div class="row g-4">
        @foreach ([
        ['title' => 'Total Purchases', 'value' => $totalPurchases],
        ['title' => 'Total Sales', 'value' => $totalSales],
        ['title' => 'Total Stocks', 'value' => $totalStocks],
        ['title' => 'Suppliers', 'value' => $totalSuppliers],
        ] as $item)
        <div class="col-md-3">
            <div class="dashboard-card text-center">
            <div class="card-title">{{ $item['title'] }}</div>
            <div class="card-value">{{ $item['value'] }}</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Latest Purchases and Sales --}}
    <div class="row g-4 mt-5">
        <div class="col-md-6">
        <div class="dashboard-card">
            <h5 class="section-heading">🛒 Latest Purchases</h5>
            <table class="table table-sm table-striped">
            <thead><tr><th>Date</th><th>Supplier</th><th>Amount</th></tr></thead>
            <tbody>
                @forelse($latestPurchases as $purchase)
                <tr><td>{{ $purchase->purchase_date }}</td><td>{{ $purchase->supplier->name }}</td><td>{{ number_format($purchase->purchase_total, 2) }}</td></tr>
                @empty
                <tr><td colspan="3" class="text-center">No purchases</td></tr>
                @endforelse
            </tbody>
            </table>
        </div>
        </div>
        <div class="col-md-6">
        <div class="dashboard-card">
            <h5 class="section-heading">📦 Latest Sales</h5>
            <table class="table table-sm table-striped">
            <thead><tr><th>Date</th><th>Customer</th><th>Amount</th></tr></thead>
            <tbody>
                @forelse($latestSales as $sale)
                <tr><td>{{ $sale->sale_date }}</td><td>{{ $sale->customer->name }}</td><td>{{ number_format($sale->sale_total, 2) }}</td></tr>
                @empty
                <tr><td colspan="3" class="text-center">No sales</td></tr>
                @endforelse
            </tbody>
            </table>
        </div>
        </div>
    </div>

    {{-- Top Products --}}
    <div class="row mt-5">
        <div class="col-md-6">
        <div class="dashboard-card">
            <h5 class="section-heading">🌾 Top Selling Products</h5>
            <ul class="list-group">
            @foreach($topProducts as $product)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $product->name }}
                <span class="badge bg-success rounded-pill">{{ $product->quantity }}</span>
                </li>
            @endforeach
            </ul>
        </div>
        </div>

        {{-- Low Stock Alert --}}
        <div class="col-md-6">
        <div class="dashboard-card">
            <h5 class="section-heading">⚠️ Low Stock Alerts</h5>
            <ul class="list-group">
            @foreach($lowStocks as $item)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $item->name }}
                <span class="badge bg-danger rounded-pill">{{ $item->quantity }}</span>
                </li>
            @endforeach
            </ul>
        </div>
        </div>
    </div>

    {{-- Due Customers --}}
    <div class="row mt-5">
        <div class="col-md-12">
        <div class="dashboard-card">
            <h5 class="section-heading">💰 Customers With Due</h5>
            <table class="table table-striped">
            <thead><tr><th>Customer Name</th><th>Due Amount (৳)</th></tr></thead>
            <tbody>
                @foreach($dueCustomers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ number_format($customer->due, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>

    {{-- Footer --}}
    <div class="text-center text-muted mt-5 mb-3">
        <small>Rice Mills ERP Dashboard &copy; {{ date('Y') }}</small>
    </div>
    </div>

            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
       

        @endsection