<?php
date_default_timezone_set("asia/kathmandu");
session_start();
if (isset($_SESSION['adminemail'])) {
    // echo "<hr><hr><hr><hr><hr><h1>".$_SESSION['adminemail']."</h1><hr><hr><hr><hr><hr>";
} else if ($_SESSION['adminemail'] == '') {
    echo "<hr><h1>AAAAANNNN".$_SESSION['adminemail']."</h1><hr><hr>";
?>
<!-- <script>    window.location.href = '../../adminlogin.php';</script> -->
<?php
}else{
    echo "<hr><h1>No thing yr</h1><hr><hr>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ultima -Dashboard</title>
    <!-- <link rel="icon" href="img\logo\faviconblack.png"> -->
    <link rel="icon" href="img\logo\faviconblack.png">

    <!-- datatable -->
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.css" />
    <!-- datatable -->
    <!-- datatable -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- select 2 -->
    <!-- select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- select 2 -->
    <!-- select 2 -->
    
    <!-- css file  -->
    <!-- <link rel="stylesheet" type="text/css" href="css/select2.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

    <!-- jquery script -->
    <!-- jquery script -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- jquery script -->
    <!-- jquery script -->

    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- bootstrap cdn -->
    <!-- bootstrap cdn -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        #offerModule {
            display: none;
        }
    </style>

</head>
<?php include 'library/database.php'; ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background:black; font-size:13px;>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!--add product and category -->
            <li class="nav-item">
                <a class="nav-link" href="newCategory.php">
                    <i class="bi bi-collection-fill"></i>
                    <span>Product Category</span></a>
            </li>
                        <li class="nav-item">
                <a class="nav-link" href="newLaunch.php">
                    <i class="bi bi-plus-circle-dotted"></i>
                    <span>New Launch</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="colorpeaker.php">
                    <i class="bi bi-plus-circle-dotted"></i>
                    <span>Add Color</span></a>
            </li>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="orderReceived.php">
                    <i class="bi bi-cart-plus"></i>
                    <span>Order</span></a>
            </li>

            <!-- Nav Item - checkout -->
            <!-- Nav Item - checkout -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
                    aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Checkout</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Checkout</h6>
                        <a class="collapse-item" href="checkout.php">Checkout</a>
                        <a class="collapse-item" href="delivered.php">Delivered List</a>
                    </div>
                </div>
            </li>
            
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Page Control</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Page Control</h6>
                        <a class="collapse-item" href="reviewForm.php">Reviews</a>
                        <a class="collapse-item" href="changecarousel.php">Carousel</a>
                        <a class="collapse-item" href="FAQsForm.php">FAQs</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="users.php">
                    <i class="bi bi-person-circle"></i>
                    <span>Users</span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="allproduct.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>All Products</span></a>
            </li>
            <?php if(give_level()=='superAdmin'){ ?>
            <li class="nav-item">
                <a class="nav-link" href="subAdmin.php">
                    <i class="bi bi-person-circle"></i>
                    <span>Sub Admin</span></a>
            </li>
            <?php }?>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
<div id="myNotifyElem" style="display: none;"></div>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "top_navbar.php"; ?>
                <!-- End of Topbar -->