<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            Real<span>State:admin</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">



            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Inventory</li>

            {{--  Suppliers  --}}
            <li class="nav-item">
                <a href="{{ route('supplier.all') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">All Suppliers</span>
                </a>
            </li>


            {{-- Manage Customers --}}


            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Customers" role="button" aria-expanded="false"
                    aria-controls="Customers">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Manage Customers</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Customers">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('customer.all') }}" class="nav-link">All Customers</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('credit.customer') }}" class="nav-link">Credit Customers</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('paid.customer') }}" class="nav-link">Paid Customers</a>
                        </li>



                        <li class="nav-item">
                            <a href="{{ route('customer.wise.report') }}" class="nav-link">Customer Wise Report</a>
                        </li>


                    </ul>
                </div>
            </li>













            {{-- Unit --}}
            <li class="nav-item">
                <a href="{{ route('unit.all') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">All Unit</span>
                </a>
            </li>

            {{-- Category --}}
            <li class="nav-item">
                <a href="{{ route('category.all') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">All Category</span>
                </a>
            </li>

            {{-- Product --}}
            <li class="nav-item">
                <a href="{{ route('product.all') }}" class="nav-link">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">All Product</span>
                </a>
            </li>



            {{-- Purchase --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Purchase" role="button" aria-expanded="false"
                    aria-controls="Purchase">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Purchase</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Purchase">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('purchase.all') }}" class="nav-link">All Purchase</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchase.pending') }}" class="nav-link">Approval Purchase</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('daily.purchase.report') }}" class="nav-link">Daily Purchase Report</a>
                        </li>

                    </ul>
                </div>
            </li>


            {{-- Invoice --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Invoice" role="button" aria-expanded="false"
                    aria-controls="Invoice">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Invoice</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Invoice">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('invoice.all') }}" class="nav-link">All Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('invoice.add') }}" class="nav-link">Add Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('invoice.pending.list') }}" class="nav-link">Approval Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('print.invoice.list') }}" class="nav-link">Print Invoice List</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('daily.invoice.report') }}" class="nav-link">Daily Invoice Report</a>
                        </li>

                    </ul>
                </div>
            </li>


            {{-- Manage Stock --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#Stock" role="button" aria-expanded="false"
                    aria-controls="Stock">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Stock</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="Stock">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('stock.report') }}" class="nav-link">Stock Report</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('stock.supplier.wise') }}" class="nav-link">Supplier / Product Wise
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


























        </ul>
    </div>
</nav>
