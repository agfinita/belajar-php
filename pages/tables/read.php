<?php

// Start session
session_start();

// Check session
if (!$_SESSION["login"] || (!isset($_SESSION["login"])) ) {
    header("Location: ../login/login.php");
    exit;
}

include 'functions.php';

//  Get username from database and will display it on dashboard
$username   = isset($_SESSION["name"]) ? $_SESSION["name"] : "User";

// Show product
$getProduct = new GetProduct($dbConn);
$product    = $getProduct->showProduct();

// Pagination
$dataPerHal = 10;
$pagination = new Pagination($dbConn, $dataPerHal);

$totalHalaman   = $pagination->hitungTotalHalaman();
$halAktif       = $pagination->getHalamanAktif();
$product        = $pagination->ambilDataProduk();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin | CRUD Product</title>

    <!--favicon-->
    <link rel="icon" type="image/png" href="../../assets/images/icons8-cat-64.png" />

    <!-- css native -->
    <link rel="stylesheet" href="../../assets/css/style.css" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3" />
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted">
                                        <i class="far fa-clock mr-1"></i> 4 Hours Ago
                                    </p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../login/logout.php" class="brand-link">
                <img src="../../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text font-weight-light">Admin Store</span>
                <span class="mx-4 mt-2"> <i class="fa-solid fa-right-from-bracket"></i> </span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../assets/images/profile_2.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $username; ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../dashboard.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../login.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../productVariable.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Variable</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../productArray.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product Array</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Tables
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="product.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="create.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="read.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Table Product</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="jsgrid.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Data Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-header">OTHERS</li>
                        <li class="nav-item">
                            <a href="../calendar.php" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../examples/contacts.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contacts</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    Search
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../search/enhanced.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cari Data Product</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Product Data</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Product Data</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <div class="mb-2">
                                <button type="submit" class="btn btn-success"><a href="create.php" class="text-decoration-none text-white">+ Tambah Data</a></button>
                            </div>
                            <!-- Table update and delete -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit / Delete Product</h3>
                                </div>
                                <!-- Start table to show product data -->
                                <table class="table table-striped table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>

                                    <?php $nomor   = 1; //inisiasi untuk memberi nomor data ?>

                                    <tbody>
                                        <?php foreach($product as $produk) : ?>
                                            <tr>
                                                <th scope="row"> <?php echo $nomor++; ?> </th>
                                                <td scope="row"> <?php echo $title = $produk["product_name"]; ?> </td>
                                                <td scope="row"> <?php echo $category  = $produk["category_name"]; ?> </td>
                                                <td scope="row"> <?php echo 'Rp' . $price = $produk["price"]; ?> </td>
                                                <td scope="row"> <?php echo $desc  = $produk["description"]; ?> </td>
                                                <td scope="row"> <?php echo $disc  = $produk["discount_amount"]; ?> </td>
                                                <td scope="row"> <?php echo $unit  = $produk["unit"]; ?> </td>
                                                <td scope="row"> <?php echo $stock = $produk["stock"]; ?> </td>

                                                <?php 
                                                    $image  = $produk["image"];
                                                    $images = $image? explode(" ", $image) : [$image];
                                                    foreach ($images as $img) :
                                                ?>
                                                    <?php $imagePath    = '../../assets/images/product/' . $img; ?>
                                                    <td scope="row" style="display: block;" >
                                                        <img src="<?php echo $imagePath ?>" width="50" alt="gambar"  />
                                                    </td>
                                                <?php endforeach; ?>


                                                <!-- Button aksi -->
                                                <td scope="row">
                                                    <a href="edit.php?id=<?php echo $produk["id"] ?>" >
                                                        <button type="button" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></button>
                                                    </a>

                                                    <a href="delete.php?id=<?php echo $produk["id"] ?>" onclick="return confirm('Yakin hapus data?')" >
                                                        <button type="button" class="btn btn-danger"><i class="fa-solid fa-eraser"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <!-- End table product -->

                                <!-- Pagination button start -->
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <!-- Previous button -->
                                        <?php if ($halAktif > 1) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $halAktif - 1 ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $halAktif ?>" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                        <?php endif; ?>
                                        <!-- Pages buttons -->
                                        <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>
                                            <?php if ($i == $halAktif) : ?>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                                                </li>
                                            <?php else : ?>
                                                <li class="page-item">
                                                    <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                                                </li>
                                            <?php endif; ?>
                                        <?php } ?>
                                        <!-- Next button -->
                                        <?php if ($halAktif < $totalHalaman) : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $halAktif + 1 ?>">Next</a>
                                            </li>
                                        <?php else : ?>
                                            <li class="page-item">
                                                <a class="page-link" href="?page=<?php echo $halAktif ?>">Next</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </nav>
                                <!-- Pagination button finish -->
                            </div>
                            <!-- End card table update and delete -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class=" main-footer">
            <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
            <strong>Copyright &copy; 2014-2021
                <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="../../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <!-- javascript -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>