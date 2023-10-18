<?php
include 'koneksi.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin | CRUD Product</title>

  <!--favicon-->
  <link rel="icon" type="image/png" href="../../assets/images/icons8-cat-64.png" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">

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
      <a href="#" class="brand-link">
        <img src="../../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Admin Store</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../assets/images/profile_2.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">Agfinita Gusti Hikmawani</a>
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
                  <a href="general.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>CRUD Product</p>
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
                    <p>Enhanced</p>
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

      <?php
      // inisiasi variable
      $title    = "";
      $category = "";
      $price    = "";
      $desc     = "";
      $disc     = "";
      $unit     = "";
      $stock    = "";

      if (isset($_GET['op'])) {   // digunakan untuk menangkap isi op
        $op = $_GET['op'];
      } else {
        $op = "";
      }

      // CRUD - Delete data
      if ($op == 'delete') {
        $id = $_GET['id'];
        $query6 = "DELETE FROM products WHERE id = $id";
        $query_delete = mysqli_query($connection, $query6);
        if ($query_delete) {
          $success = "Data berhasil dihapus";
        } else {
          $error = "Data gagal dihapus";
        }
      }

      if ($op == 'edit') {
        $id = $_GET['id'];
        // SQL query untuk menampilkan data yang akan diupdate
        $query4 = "SELECT product_name, category_id, price, description, discount_amount, unit, stock
                   FROM products WHERE id = $id";
        $query_edit = mysqli_query($connection, $query4);
        $data       = mysqli_fetch_array($query_edit);

        if ($data) {
          $title      = $data['product_name'];
          $category   = $data['category_id'];
          $price      = $data['price'];
          $desc       = $data['description'];
          $disc       = $data['discount_amount'];
          $unit       = $data['unit'];
          $stock      = $data['stock'];
        } else {
          $error = "Data tidak ditemukan";
        }
      }

      // CRUD - Create data
      if (isset($_POST['simpan'])) {
        // menangkap input dari user
        $title    = $_POST['inputTitle'];
        $category = $_POST['inputCategory'];
        $price    = $_POST['inputPrice'];
        $desc     = $_POST['inputDesc'];
        $disc     = $_POST['inputDisc'];
        $unit     = $_POST['inputUnit'];
        $stock    = $_POST['inputStock'];

        if (!empty($title) && $category && $category !== "0" && !empty($price) && !empty($desc) && !empty($disc) && !empty($unit) && !empty($stock)) {
          // CRUD - Update data
          if ($op == 'edit') {    //condition for edit data
            // SQL query untuk mengupdate data ke table products
            $query5 = "UPDATE products SET
            product_name    = '$title',
            category_id     = '$category',
            price           = '$price',
            description     = '$desc',
            discount_amount = '$disc',
            unit            = '$unit',
            stock           = '$stock'
            WHERE id = $id";
            // eksekusi data yang akan diupdate
            $query_edit     = mysqli_query($connection, $query5);
            if ($query_edit) {
              $success  = "Berhasil update data";
            } else {
              $error    = "Gagal update data";
            }
          } else {    //condition for edit data
            // SQL query untuk memasukkan data ke table products
            $query1 = "INSERT INTO products (
              product_name,category_id, price, description, discount_amount, unit, stock)
              VALUES 
              ('$title', '$category', '$price', '$desc', '$disc', '$unit', '$stock')";
            // eksekusi data yang diinsert
            $query_create = mysqli_query($connection, $query1);
            if ($query_create) {
              $success = "Berhasil memasukkan data";
            } else {
              $error = "Gagal memasukkan data: " . mysqli_error($connection);
            }
          }
        } else {
          $error = "Silahkan lengkapi semua data!";
        }
      }
      ?>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Add Data Product</h3>
                </div>
                <!-- /.card-header -->

                <!-- notifikasi form handle -->
                <?php if (isset($success)) : ?>
                  <div class="alert alert-success" role="alert"> <!-- notif success -->
                    <?php echo $success ?>
                  </div>
                <?php endif; ?>

                <?php if (isset($error)) : ?>
                  <div class="alert alert-danger" role="alert"> <!-- notif failed-->
                    <?php echo $error ?>
                  </div>
                <?php endif; ?>

                <!-- form start -->
                <form action="" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="inputTitle">Product Name</label>
                      <input type="text" class="form-control" id="inputTitle" name="inputTitle" value="<?php echo $title ?>" placeholder="Enter name of product" />
                    </div>

                    <div class="form-group">
                      <label for="inputCategory">Category Product</label></br>
                      <select class="form-select" aria-label="Default select example" id="inputCategory" name="inputCategory">
                        <option value="0"> Select Category </option>
                        <option value="1" <?php if ($category == "1") echo "selected" ?>>Category 1</option>
                        <option value="2" <?php if ($category == "2") echo "selected" ?>>Category 2</option>
                        <option value="3" <?php if ($category == "3") echo "selected" ?>>Category 3</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="inputPrice">Price</label>
                      <input type="text" class="form-control" id="inputPrice" name="inputPrice" value="<?php echo $price ?>" placeholder="Enter price of product" />
                    </div>

                    <div class="form-group">
                      <label for="inputDesc">Description</label>
                      <input type="text" class="form-control" id="inputDesc" name="inputDesc" value="<?php echo $desc ?>" placeholder="Enter description of product" />
                    </div>

                    <div class="form-group">
                      <label for="inputDisc">Discount</label>
                      <input type="text" class="form-control" id="inputDisc" name="inputDisc" value="<?php echo $disc ?>" placeholder="Enter discount of product" />
                    </div>

                    <div class="form-group">
                      <label for="inputUnit">Unit Product</label>
                      <input type="text" class="form-control" id="inputUnit" name="inputUnit" value="<?php echo $unit ?>" placeholder="Enter unit product" />
                    </div>

                    <div class="form-group">
                      <label for="inputStock">Stock Product</label>
                      <input type="text" class="form-control" id="inputStock" name="inputStock" value="<?php echo $stock ?>" placeholder="Enter stock of product" />
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" name="simpan" value="simpan" class="btn btn-success">
                      Simpan
                    </button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

              <!-- Table update and delete -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit / Delete Data Product</h3>
                </div>
                <!-- Start table to show product data -->
                <table class="table table-striped">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">No</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Price</th>
                      <th scope="col">Description</th>
                      <th scope="col">Discount</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Stock</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>

                  <?php
                  $query3 = "SELECT id, product_name, category_id, price, description, discount_amount, unit, stock FROM products ORDER BY id ASC";
                  $query_update = mysqli_query($connection, $query3);
                  $nomor   = 1; //inisiasi untuk memberi nomor data
                  ?>

                  <tbody>
                    <?php while ($data = mysqli_fetch_array($query_update)) : ?>
                      <tr class="text-center">
                        <th scope="row"> <?php echo $nomor++ ?> </th>
                        <td scope="row"> <?php echo $title = $data['product_name']; ?> </td>
                        <td scope="row"> <?php echo $category  = $data['category_id']; ?> </td>
                        <td scope="row"> <?php echo 'Rp' . $price = $data['price']; ?> </td>
                        <td scope="row"> <?php echo $desc = $data['description']; ?> </td>
                        <td scope="row"> <?php echo $disc  = $data['discount_amount']; ?> </td>
                        <td scope="row"> <?php echo $unit  = $data['unit']; ?> </td>
                        <td scope="row"> <?php echo $stock  = $data['stock']; ?> </td>

                        <?php $id = $data['id'] ?>
                        <td scope="row">
                          <a href="general.php?op=edit&id=<?php echo $id ?>">
                            <button type="button" class="btn btn-warning">Edit</button>
                          </a>

                          <a href="general.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin hapus data?')">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
                <!-- End table product -->
              </div>
              <!-- End table update and delete -->
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