<style>
    body {
        font-family: 'Open Sans', sans-serif;
        background-color: #f7f7f7;
        position: relative;
        margin: 0px;
        font-size: 12px;
        padding: 0px;
    }



    /* Sidebar navigation */

    /* Sidebar navigation */

    .content-box, .content-box-large {
        margin-bottom:30px;
        background:#fff;
        border-radius:10px;
        padding:10px;
        border-left:1px solid #eee;
        border-top:1px solid #eee;
        border-right:2px solid #eee;
        border-bottom:2px solid #eee;
    }

    .content-box-large {
        padding: 20px;
    }

    .box-with-header {
        border-top: none;
        border-top-left-radius:0px;
        border-top-right-radius:0px;
    }

    .content-box-header {
        min-height: 40px;
        font-size: 16px;
        background:#f5f5f5;
        border-top-left-radius:5px;
        border-top-right-radius:5px;
        padding:10px;
        border-left:1px solid #eee;
        border-top:1px solid #eee;
        border-right:2px solid #eee;
    }

    .content-box-header:after {
        clear:both;
    }

    .sidebar ul.nav, .sidebar ul.nav ul{
        list-style: none;
        padding: 0px;
        margin: 0px;
    }

    .sidebar ul.nav ul {
        margin:0px;
        padding:0px;
        display:none;
    }

    .sidebar .nav li.open ul{
        display:block;
    }

    .sidebar .nav > li {
        margin: 0;
        border-bottom:1px dashed #eee;
    }

    .sidebar .nav > li:last-child{
        border-bottom:0px;
    }

    .sidebar .nav > li li {
        margin: 0;
    }

    .sidebar .nav > li li a{
        padding-left:25px;
    }

    .sidebar .nav > li > a {
        font-size: 14px;
        line-height: 20px;
        padding: 15px 15px;
        color: #999;
        display: block;
        font-weight:bold;
        background:none;
        text-decoration: none;
        border-top:0px;
        font-weight:bold;
    }

    .sidebar .nav > li > a > i{
        margin-right:5px;
    }

    .sidebar .nav > li > ul > li > a {
        font-size: 13px;
        line-height: 20px;
        padding: 8px 10px 8px 40px;
        color: #999;
        background:#fff;
        display: block;
        text-decoration: none;
        border-top:0px;
        font-weight:bold;
    }

    .sidebar .nav > li > ul > li.active > a{
        background:#fff;
        border-top:0px;
        color:#555;
    }

    .sidebar .nav > li > ul > li > a:hover{
        background:#fff;
        color:#555;
        border-bottom:0px;
    }

    .sidebar .nav li a:hover, .sidebar .nav li.current > a {
        background: #fff;
        color: #555;
        border-bottom:0px;
    }

    .sidebar .nav li.open > a {
        background:#fff;
        color: #555;
        border-bottom:1px dashed #eee;
    }

    .sidebar .nav a .caret {
        float: right;
        width: 0;
        height: 0;
        display: inline-block;
        vertical-align: top;
        border-top: 4px solid #aaa;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
        content: "";
        margin-top: 8px;
        margin-left: 2px;
    }

    .sidebar .nav a:hover .caret {
        border-top-color: #aaa;
    }

    .sidebar .nav li.open > a > .caret {
        border-top: none;
        border-bottom: 4px solid #aaa !important;
        border-right: 4px solid transparent;
        border-left: 4px solid transparent;
    }

    .sidebar .nav li.open > a:hover > .caret {
        border-bottom-color: #aaa;
    }






    /* Responsive CSS */

    /* Mobile phones */
    @media (max-width: 480px){

    }

    /* Tablets */
    @media (max-width: 767px){
        .container{
            width:100%;
        }
        .header{
            height:auto;
            padding:15px 0px;
        }
        .header .logo{
            text-align:center;
            padding-bottom:10px;
        }
        .header .navbar .nav > li > a:hover{
            background:#0fa6bc;
            border-radius:5px;
        }
        .navbar-toggle {
            margin-right:0px !important;
        }
    }

    /* Desktop */

    @media (max-width: 991px){
        .header{
            height:auto;
            padding:15px 0px;
        }
        .header .logo{
            text-align:center;
            padding-bottom:10px;
        }
        .header .form{
            margin:10px auto;
        }
        .sidebar, content-box{
            margin-bottom:30px;
            width:100%;
            float:none;
            position:relative;
        }
        .mainy{
            margin-left: 0px;
        }
        .sidebar-dropdown{
            display:block;
            text-align:center;
            margin:0 auto;
            margin-bottom:10px;
            border-bottom:1px dashed #eee;
            padding-bottom:10px;
        }
        .sidebar-dropdown a, .sidebar-dropdown a:hover{
            color:#fff;
            background:#16cbe6;
            display:block;
            padding:6px 12px;
            border-bottom:0px;
            box-shadow:0px 0px 1px #0fa6bc;
            border-radius:10px;
        }
    }
</style>
<div class="sidebar content-box" style="display: block;">
    <ul class="nav">
        <!-- Main menu -->
        <li class="current"><a href="{{url('admin/user')}}"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
        <li class="submenu">
            <a href="#">
                <i class="glyphicon glyphicon-list"></i> Products
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{url('admin/product/create')}}">Add Product</a></li>
                <li><a href="{{url('admin/product/view')}}">View Products</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="glyphicon glyphicon-list"></i> Brands
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{url('admin/brand/create')}}">Add Brand</a></li>
                <li><a href="{{url('admin/brand/view')}}">View Brands</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#">
                <i class="glyphicon glyphicon-list"></i> Categories
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{url('admin/category/create')}}">Add Category</a></li>
                <li><a href="{{url('admin/category/view')}}">View Categories</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="#">
                <i class="glyphicon glyphicon-list"></i> Users
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="login.html">Add User</a></li>
                <li><a href="{{url('admin/user/view')}}">View Users</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="#">
                <i class="glyphicon glyphicon-list"></i> Roles
                <span class="caret pull-right"></span>
            </a>
            <!-- Sub menu -->
            <ul>
                <li><a href="{{url('admin/role/create')}}">Add Role</a></li>
                <li><a href="{{url('admin/role/view')}}">View Roles</a></li>
            </ul>
        </li>
        <li><a href="{{url('admin/order/information')}}"><i class="glyphicon glyphicon-pencil"></i>View All Orders</a></li>
        <li><a href="{{url('admin/billing/information')}}"><i class="glyphicon glyphicon-pencil"></i> View Billing Address</a></li>
        <li><a href="{{url('admin/payment/information')}}"><i class="glyphicon glyphicon-pencil"></i> Payments</a></li>
        <li><a href="{{url('admin/report/information')}}"><i class="glyphicon glyphicon-pencil"></i> Reports</a></li>

    </ul>
</div>