<?php
// create an array to list product
$products = [
    [
        'image' => '../assets/images/productImage/americanohot173.jpg',
        'name' => 'Hot Americano',
        'price' => '21.000',
        'desc' => 'Espresso shot dalam segelas cup dengan menjaga ketebalan rasa kopinya'
    ],

    [
        'image' => '../assets/images/productImage/americanoiced173.jpg',
        'name' => 'Ice Americano',
        'price' => '21.000',
        'desc' => 'Espresso shot dalam segelas cup dengan menjaga ketebalan rasa kopinya'
    ],

    [
        'image' => '../assets/images/productImage/berrymanuka-2502.jpg',
        'name' => 'Berry Manuka Americano',
        'price' => '29.000',
        'desc' => 'Perpaduan rasa stroberry dan manuka dengan classic blend fore yang menyegarkan'
    ],

    [
        'image' => '../assets/images/productImage/cappuccinoiced173.jpg',
        'name' => 'Iced Cappuccino',
        'price' => '29.000',
        'desc' => 'Paduan espresso dengan susu sapi pilihan dan foam tebal di atasnya'
    ],

    [
        'image' => '../assets/images/productImage/caramelpralinecoffee173.jpg',
        'name' => 'Caramel Praline Coffe Ice Blended',
        'price' => '33.000',
        'desc' => 'Ice blended latte dengan saus praline dan karamel'
    ],

    [
        'image' => '../assets/images/productImage/classiclatteiced173.jpg',
        'name' => 'Ice Classic Latte',
        'price' => '24.000',
        'desc' => 'Perpaduan rasa espresso premium dengan saus krim spesial fore'
    ],

    [
        'image' => '../assets/images/productImage/matchablended173.jpg',
        'name' => 'Matcha Ice Blended',
        'price' => '24.000',
        'desc' => 'Perpaduan creamy matcha khas fore coffe, susu segar dengan es'
    ],

    [
        'image' => '../assets/images/productImage/Nutty_Oat_Latte.jpeg',
        'name' => 'Nutty Oat Latte',
        'price' => '39.000',
        'desc' => 'Espresso dari biji kopi khas nusantara dipadukan susu oat gluten-free dan sensasi nutty dari huzelnut'
    ],

    [
        'image' => '../assets/images/productImage/salted-caramel173.jpg',
        'name' => 'Iced Salted Caramel Mocha',
        'price' => '33.000',
        'desc' => 'Perpaduan coklat, latte dari house blend fore dan gurihnya caramel'
    ],

    [
        'image' => '../assets/images/productImage/salted-caramel173.jpg',
        'name' => 'Hot Salted Caramel Mocha',
        'price' => '33.000',
        'desc' => 'Perpaduan coklat, latte dari house blend fore dan gurihnya caramel'
    ],

    [
        'image' => '../assets/images/productImage/saltedcarameliced173.jpg',
        'name' => 'Ice Salted Caramel Mocha',
        'price' => '33.000',
        'desc' => 'Perpaduan coklat, latte dari house blend fore dan gurihnya caramel'
    ],
];
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
</head>

<body class="overflow-x-hidden">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow ">
        <section class="container-fluid">
            <a class="navbar-brand"><b>FORE COFFE</b></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <section class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#product-list"> Product </a>
                    </li>
                </ul>
            </section>
        </section>
    </nav>

    <!-- listing product -->
    <section class="container-fluid">
        <section class=" mx-3 mt-5" id="product-list">
            <section class="row row-cols-1 row-cols-md-2 g-2">
                <?php foreach ($products as $product) : ?>
                    <section class="col">
                        <section class="card mb-3 p-2 " style="max-width: 550px;">
                            <section class="row g-0">
                                <!-- image product -->
                                <picture class="col-md-4 mt-3">
                                    <img src="<?php echo $product['image']; ?>" alt="product_image" class="img-fluid rounder-start" alt="">
                                </picture>

                                <section class="col-md-8">
                                    <section class="card-body">
                                        <h5 class="card-title"> <?php echo $product['name']; ?> </h5>
                                        <p class="card-text"> <?php echo 'Rp' . $product['price']; ?> </p>
                                        <p class="card-text"> <?php echo $product['desc']; ?> </p>
                                        <button type="button" class="btn btn-primary"> <?php echo 'Buy Now'; ?> </button>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                <?php endforeach; ?>
            </section>
        </section>
    </section>


    <!-- javascript -->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>