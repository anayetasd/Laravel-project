<div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                          
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-sales.html">Summery</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Purchases Management</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('purchases/create') }}">Create Purchases</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('purchases/due')}}">due Purchases</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('purchases')}}">Manage Purchases</a>
                                        </li>
                                        
                                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-15" aria-controls="submenu-3"><i class="fa fa-credit-card"></i>Supplier Management</a>
                                <div id="submenu-15" class="collapse submenu" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('suppliers/create') }}">Create Supplier</a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('suppliers')}}">Manage Supplier</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Production Management</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('productions/create')}}">Create Raw Entry Products</a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('productions')}}">Manage Production</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('productions/productionReport')}}">Output Report</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('products/create')}}">Create Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('products')}}">Manage Product</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-9"><i class="fas fa-calendar-alt"></i>Stock Management</a>
                                <div id="submenu-11" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('stocks')}}">Add New Stock</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('stocks')}}">Manage Stock</a>
                                        </li>
                                        

                                    </ul>
                                </div>
                            </li>

                          

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Inventory Management </a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('rawMaterials/create') }}">Create Raw Material</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('rawMaterials')}}">Manage Raw Material</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('finishedGoods/create')}}">Create Finished Goods</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('finishedGoods')}}">Manage Finished Goods</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-th"></i>Order Management</a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{url('orders/create')}}">Create order <span class="badge badge-secondary">New</span></a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('orders')}}">Manage Orders</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-12" aria-controls="submenu-12"><i class="far fa-calendar"></i>Customer Management</a>
                                <div id="submenu-12" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('customers/create') }}">Create Customer</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('customers')}}">Manage Customer</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Sales Management</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                         <li class="nav-item">
                                            <a class="nav-link" href="{{ url('sales/create') }}">Add Sales</a>
                                        </li>
                                                                            
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('sales')}}">Manage Sales</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
 

                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Accounts Management</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('mrs/create')}}">Create MR</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('mrs')}}">Manage MR</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            

                        
                            
                             <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-16" aria-controls="submenu-11"><i class="fas fas fa-briefcase"></i>HR & Payroll</a>
                                <div id="submenu-16" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('employees/create')}}">Add New Employee</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('employees')}}">Employee List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('employeesalarys/create')}}">Add Payment Salary</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('employeesalarys')}}">List Payment Salary </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            

                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-certificate"></i>Logout</a>
                                
                            </li> -->


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                            @csrf
                        </form>

                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-certificate" ></i>
                            Logout
                        </a>



                        </ul>
                    </div>
                </nav>
            </div>
        </div>