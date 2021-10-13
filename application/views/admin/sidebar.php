<!DOCTYPE html>
<html lang="en">
<head>
<base href="<?php echo base_url(); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Multikart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Multikart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/dashboard/favicon.png" type="image/x-icon">
    <title>Aroma Tazeen Admin Dashboard</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/fontawesome.css">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/prism.css">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/chartist.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">

    <!-- jsgrid css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/jsgrid.css">

    <!-- Datepicker css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">
</head>

<body>

<!-- page-wrapper Start-->
<div class="page-wrapper">

    <!-- Page Header Start-->
    <div class="page-main-header">
        <div class="main-header-right row">
            <div class="main-header-left d-lg-none w-auto">
                <div class="logo-wrapper"><a href="<?php echo base_url(); ?>"><img class="blur-up lazyloaded" src="assets/images/dashboard/multikart-logo.png" alt=""></a></div>
            </div>
            <div class="mobile-sidebar w-auto">
                <div class="media-body text-end switch-sm">
                    <label class="switch"><a href="#"><i id="sidebar-toggle" data-feather="align-left"></i></a></label>
                </div>
            </div>
            <div class="nav-right col">
                <ul class="nav-menus">
                    
                    <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize-2"></i></a></li>
                    
                   
                  
                    <li class="onhover-dropdown">
                        <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="assets/images/dashboard/man.png" alt="header-user">
                            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                            <li><a href="Admin/myprofile"><i data-feather="user"></i>Edit Profile</a></li>
                            <li><a href="#"><i data-feather="mail"></i>Inbox</a></li>
                            
                            
                            <li><a href="Admin/logout"><i data-feather="log-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
        </div>
    </div>
    <!-- Page Header Ends -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">

<div class="page-sidebar">
            <div class="main-header-left d-none d-lg-block">
                <div class="logo-wrapper"><a href="<?php echo base_url(); ?>"><img class="blur-up lazyloaded" src="assets/images/dashboard/logo.png" alt=""></a></div>
            </div>
            <div class="sidebar custom-scrollbar">
                <div class="sidebar-user text-center">
                    <div><img class="img-60 rounded-circle lazyloaded blur-up" src="assets/images/dashboard/man.png" alt="#">
                    </div>
                    <h6 class="mt-3 f-14">JOHN</h6>
                    <p>general manager.</p>
                </div>
                <ul class="sidebar-menu">
                    <li><a class="sidebar-header" href="Admin/dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Home Page</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/add_headermsg"><i class="fa fa-circle"></i>Header Message</a></li>
                            <li><a href="Admin/add_aboutchairman"><i class="fa fa-circle"></i>About Chairman</a></li>
                            <li><a href="Admin/allslideshow"><i class="fa fa-circle"></i>Slide Show</a></li>
                            <li><a href="Admin/latest_fashion"><i class="fa fa-circle"></i>Latest Fashion</a></li>
                            <!--<li><a href="Admin/discountitem"><i class="fa fa-circle"></i>Discount</a></li>-->
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href="#"><i data-feather="align-left"></i><span>Menus</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/homemenu"><i class="fa fa-circle"></i>Home Menu</a></li>
                            <!--<li><a href="create-menu.html"><i class="fa fa-circle"></i>Create Menu</a></li>-->
                        </ul>
                    </li> 
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                      
                                <ul class="sidebar-submenu">
                                    <li><a href="Admin/category"><i class="fa fa-circle"></i>Size & Color</a></li>
                                    <li><a href="Admin/brands"><i class="fa fa-circle"></i>Brands</a></li>
                                    <li><a href="Admin/add_product_form"><i class="fa fa-circle"></i>Add Product</a></li>
                                    <li><a href="Admin/product_list"><i class="fa fa-circle"></i>Product List</a></li>
                                    <li><a href="Admin/product_photos"><i class="fa fa-circle"></i>Product Photos</a></li> 
                                </ul>
                            
                    </li>
                    <li><a class="sidebar-header" href="Admin/add_shipping"><i data-feather="bar-chart"></i><span>Shipping</span></a></li>
                    </li>
                    <!--<li><a class="sidebar-header" href="#"><i data-feather="bar-chart"></i><span>Shipping</span><i class="fa fa-angle-right pull-right"></i></a>-->
                    <!--    <ul class="sidebar-submenu">-->
                    <!--        <li><a href="Admin/add_shipping"><i class="fa fa-dollar"></i><span>Shipping Fee</a></li>-->
                    <!--    </ul>-->
                    <!--</li> -->
                    
                    
                    <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Remark</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/add_remark_form"><i class="fa fa-circle"></i>Add Remark</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="dollar-sign"></i><span>Sales</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/orderlist"><i class="fa fa-circle"></i>Orders</a></li>
                            <li><a href="Admin/transactionlist"><i class="fa fa-circle"></i>Transactions</a></li>
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="tag"></i><span>Coupons</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/coupons_list"><i class="fa fa-circle"></i>List Coupons</a></li>
                            <li><a href="Admin/add_coupons_form"><i class="fa fa-circle"></i>Create Coupons </a></li>
                        </ul>
                    </li>
                    <!-- <li><a class="sidebar-header" href="#"><i data-feather="clipboard"></i><span>Pages</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="pages-list.html"><i class="fa fa-circle"></i>List Page</a></li>
                            <li><a href="page-create.html"><i class="fa fa-circle"></i>Create Page</a></li>
                        </ul>
                    </li> -->
                    
                    <li><a class="sidebar-header" href="reports.html"><i data-feather="bar-chart"></i><span>Reports</span></a></li>
                    </li>
                    <li><a class="sidebar-header" href="Admin/invoice"><i data-feather="archive"></i><span>Invoice</span></a>
                    </li>
                    <li><a class="sidebar-header" href="Admin/payment_method"><i data-feather="archive"></i><span>Payment-Menthod</span></a>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="user-plus"></i><span>Users</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/user_list"><i class="fa fa-circle"></i>User List</a></li>
                            <!-- <li><a href="create-user.html"><i class="fa fa-circle"></i>Create User</a></li> -->
                        </ul>
                    </li>
                    <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                        <ul class="sidebar-submenu">
                            <li><a href="Admin/myprofile"><i class="fa fa-circle"></i>Profile</a></li>
                            <li><a href="Admin/guideline"><i class="fa fa-circle"></i>Guideline</a></li>
                        </ul>
                    
                    <!-- <li><a class="sidebar-header" href="login.html"><i data-feather="log-in"></i><span>Login</span></a>
                    </li> -->
                </ul>
            </div>
        </div>