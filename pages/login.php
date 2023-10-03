<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agfinita:belajar-php</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="../assets/images/icons8-cat-64.png">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <!-- fontawesome -->
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
</head>

<body>
    <section class="position-relative m-5">
        <div class="container border shadow-lg">
            <div class="row d-flex justify-content-center align-items-center p-4">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../assets/images/books.jpg" class="img-fluid" alt="book_login">
                </div>
                <!-- form -->
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <form action="product.php" method="get" name="form-login">
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                            <button type="button" class="btn btn-primary rounded-circle mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-primary rounded-circle mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-primary rounded-circle mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </div>

                        <div class="d-flex justify-content-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0"> - Or -</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="formEmail" class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label class="form-label" for="formEmail">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="formPassword" class="form-control form-control-lg" placeholder="Enter password" />
                            <label class="form-label" for="formPassword">Password</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="checkRemember" checked />
                                <label class="form-check-label" for="checkRemember">
                                    Remember me
                                </label>
                            </div>
                            <a href="#!" class="text-body text-decoration-none">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-danger text-decoration-none">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- javascript -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</body>

</html>