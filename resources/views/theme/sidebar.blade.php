<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <a class="font-w600 text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide font-size-h5 tracking-wider">
                Pharmacy<span class="font-w400">POS</span>
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
               <!-- Start Setup Module -->
                
               <li class="nav-main-item open">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-folder-alt"></i>
                    <span class="nav-main-link-name">SETUP</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('product')" href="{{ route('products.index') }}">
                            <i class="nav-main-link-icon si si-handbag"></i>
                            <span class="nav-main-link-name">Products</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('category')" href="{{ route('categories.index') }}">
                            <i class="nav-main-link-icon si si-docs"></i>
                            <span class="nav-main-link-name">Categories</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('manufacturer')" href="{{ route('manufacturers.index') }}">
                            <i class="nav-main-link-icon far fa-building"></i>
                            <span class="nav-main-link-name">Manufacturers</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('supplier')" href="{{ route('suppliers.index') }}">
                            <i class="nav-main-link-icon fa fa-people-carry"></i>
                            <span class="nav-main-link-name">Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_api.html">
                            <i class="nav-main-link-icon fa fa-percent"></i>
                            <span class="nav-main-link-name">Discount Policies</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- End Setup Module -->

            <!-- Start Transaction Module -->
                
            <li class="nav-main-item open">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                    <i class="nav-main-link-icon si si-folder-alt"></i>
                    <span class="nav-main-link-name">TRANSACTION</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('purchase_invoice')" href="{{ route('purchase-invoices.index') }}">
                            <i class="nav-main-link-icon far fa-list-alt"></i>
                            <span class="nav-main-link-name">Purchase Invoice</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('category')" href="{{ route('categories.index') }}">
                            <i class="nav-main-link-icon si si-docs"></i>
                            <span class="nav-main-link-name">Categories</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('manufacturer')" href="{{ route('manufacturers.index') }}">
                            <i class="nav-main-link-icon far fa-building"></i>
                            <span class="nav-main-link-name">Manufacturers</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link @yield('supplier')" href="{{ route('suppliers.index') }}">
                            <i class="nav-main-link-icon fa fa-people-carry"></i>
                            <span class="nav-main-link-name">Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="be_blocks_api.html">
                            <i class="nav-main-link-icon fa fa-percent"></i>
                            <span class="nav-main-link-name">Discount Policies</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- End Transaction Module -->
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>