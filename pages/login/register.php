<?php
include '../tables/functions.php';

if (isset($_POST["register"])) {

  if (daftar($_POST) > 0) {
    echo " <script>
                alert('Berhasil membuat akun baru!');
                document.location.href = 'login.php';
            </script>";
    exit;
  } else {
    $error = " ";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registration</title>

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

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#" class="text-uppercase"><b>Register</b></a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <div class="d-flex justify-content-center">
          <div class="col-lg-8">
            <img src="../../assets/images/coffe_logo.jpg" class="img-fluid" alt="book_login" />
          </div>
        </div>

        <p class="login-box-msg">Register a new membership</p>

        <?php
          if (!empty($error)) {
              echo ' <div class="alert alert-danger" role="alert"> Lengkapi semua data! </div> ';
          }
        ?>

        <form action="#" method="POST" autocomplete="off">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email"  />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukkan nomor telepon"  />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block" name="register" id="register">
                Register
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <a href="login.php" class="text-center">Already have an account</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../assets/dist/js/adminlte.min.js"></script>
</body>

</html>