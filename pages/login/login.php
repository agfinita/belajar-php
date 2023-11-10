<?php
// Memulai session
session_start();

if (isset($_SESSION["login"])) {
  header("Location: ../dashboard.php");
}

include '../tables/functions.php';

if (isset($_POST["login"])) {
  // Membuat objek login dengan object koneksi database $dbConn
  $login  = new Login($dbConn);

  // Get input from user
  $username   = isset($_POST["username"]) ? $_POST["username"] : " ";
  $password   = $_POST["password"];

  $result     = $login->loginUser($username, $password);

  if ($result !== true) {
    $error  = " ";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Log in</title>

  <!--favicon-->
  <link rel="icon" type="image/png" href="../../assets/images/icons8-cat-64.png" />

  <!-- bootstrap -->
  <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../assets/plugins/fontawesome-free/css/all.min.css" />
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="../../assets/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>LOGIN</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <div class="d-flex justify-content-center">
          <div class="col-lg-9">
            <img src="../../assets/images/coffe_logo.jpg" class="img-fluid" alt="book_login" />
          </div>
        </div>

        <p class="login-box-msg">Sign in to start your session</p>

        <?php
        if (!empty($error)) {
          echo ' <div class="alert alert-danger" role="alert"> Username atau password salah!  </div> ';
        }
        ?>

        <form action="#" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" id="username" placeholder="Nomor telepon terdaftar" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" name="login" id="login" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="d-flex justify-content-evenly">
              <div class="col-7">
                <p>Don't have an account?</p>
              </div>

              <div class="col-6">
                <a href="register.php">Create new account</a>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
</body>

</html>