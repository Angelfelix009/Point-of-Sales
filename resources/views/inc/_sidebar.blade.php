<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">

        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" >


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span style="color:#ffffff">User's Management</span>
                    <span class="pull-right-container">

                    </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->role_id >=4)

                        <li><a href="{{route('user.create')}}" style="color:#ffffff"><i class="fa fa-plus"></i>Register User</a></li>
                        <li><a href="{{route('user.index')}}" style="color:#ffffff"><i class="fa fa-users"></i>View User's Acoount</a></li>
                    @endif
                    <li><a href="{{route('change-password')}}" style="color:#ffffff"><i class="fa fa-edit"></i>Change Password</a></li>

                </ul>
            </li>
            @if(Auth::user()->role_id >=2)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span style="color:#ffffff">Inventory Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('goods.create')}}" style="color:#ffffff"><i class="fa fa-plus"></i>Add Goods</a></li>
                        <li><a href="{{route('track.create')}}" style="color:#ffffff"><i class="fa fa-plus"></i>Add Expiry Date</a></li>
                        <li><a href="{{route('stock.create')}}" style="color:#ffffff"><i class="fa fa-plus"></i>Add Stock</a></li>
                        <li><a href="{{route('stock.index')}}" style="color:#ffffff"><i class="fa fa-eye"></i>View Stock</a></li>
                        <li><a href="/stock-report" style="color:#ffffff"><i class="fa fa-download"></i>Stock Report</a></li>
                        <li><a href="{{route('goods.index')}}" style="color:#ffffff"><i class="fa fa-eye"></i>View Goods</a></li>
                        <li><a href="/view-goods" style="color:#ffffff"><i class="fa fa-eye"></i>Editing of Goods</a></li>
                        <li><a href="/upload-goods" style="color:#ffffff"><i class="fa fa-eye"></i>Upload Goods Excel File</a></li>
                        <li><a href="/search-goods" style="color:#ffffff"><i class="fa fa-eye"></i>Search Goods</a></li>


                        <!-- <li><a href="/track/create" style="color:#ffffff"><i class="fa fa-eye"></i>Add Expiry Date</a></li> -->
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-calculator"></i>
                        <span style="color:#ffffff">Account Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/add-expenditure" style="color:#ffffff"><i class="fa fa-plus"></i>Add Expenditure</a></li>
                        @if(Auth::user()->role_id >=3)
                            <li><a href="/view-account" style="color:#ffffff"><i class="fa fa-plus"></i>View Account</a></li>
                            <li><a href="/customer-debt" style="color:#ffffff"><i class="fa fa-plus"></i>View Customer Debt Account</a></li>
                            <li><a href="/staff-debt" style="color:#ffffff"><i class="fa fa-plus"></i>View Staff Debt Account</a></li>
                            <li><a href="/balance-sheet" style="color:#ffffff"><i class="fa fa-eye"></i>Statement of Account</a></li>
                            <li><a href="/monthly-account" style="color:#ffffff"><i class="fa fa-eye"></i>Monthly Statement</a></li>
                            <li><a href="/daily-account" style="color:#ffffff"><i class="fa fa-eye"></i>Daily Statement</a></li>
                            <li><a href="/yearly-account" style="color:#ffffff"><i class="fa fa-eye"></i>Yearly Statement</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calculator"></i>
                    <span style="color:#ffffff">Sales Management</span>
                    <span class="pull-right-container">

                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/reg-sales?ref= @php  echo ('RS-'.rand(0005,10000).date('D-M-Y, g:i a')); @endphp" style="color:#ffffff"><i class="fa fa-plus"></i>Add Sales</a></li>
                    <!--<li><a href="group-sales" style="color:#ffffff"><i class="fa fa-plus"></i>Group Sales</a></li> -->
                    <li><a href="/search-receipt" style="color:#ffffff"><i class="fa fa-search"></i>Search</a></li>
                    <!--  <li><a href="receipt" style="color:#ffffff"><i class="fa fa-search"></i>Search</a></li> -->

                </ul>
            </li>
            @if(Auth::user()->role_id >=3)
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span style="color:#ffffff">Customer Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('customer.create')}}" style="color:#ffffff"><i class="fa fa-plus"></i>Register Customer</a></li>
                        <li><a href="{{route('customer.index')}}" style="color:#ffffff"><i class="fa fa-eye"></i>View Customer Record</a></li>
                        <li><a href="/search-customer" style="color:#ffffff"><i class="fa fa-eye"></i>Search Customer</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span style="color:#ffffff">Supplier Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/supplier/create" style="color:#ffffff"><i class="fa fa-plus"></i>Register Supplier</a></li>
                        <li><a href="/supplier" style="color:#ffffff"><i class="fa fa-eye"></i>View Supplier Record</a></li>
                        <li><a href="/search-supplier" style="color:#ffffff"><i class="fa fa-eye"></i>Search Supplier</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span style="color:#ffffff">Staff Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/staff/create" style="color:#ffffff"><i class="fa fa-plus"></i>Register Staff</a></li>
                        <li><a href="/staff" style="color:#ffffff"><i class="fa fa-eye"></i>View Staff Record</a></li>
                        <li><a href="/search-supplier" style="color:#ffffff"><i class="fa fa-eye"></i>Staff Supplier</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span style="color:#ffffff">Debt Management</span>
                        <span class="pull-right-container">

                    </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/staff-debt" style="color:#ffffff"><i class="fa fa-plus"></i>Staff Debt</a></li>
                        <li><a href="/customer-debt" style="color:#ffffff"><i class="fa fa-eye"></i>Customer Debt</a></li>
                        <li><a href="/all-debt" style="color:#ffffff"><i class="fa fa-eye"></i>All Debt</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>