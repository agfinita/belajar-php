<?php
// Create connection for database
$hostname   = "localhost";
$username   = "nita";
$password   = "root";
$database   = "pos_shop";

// Membuat koneksi
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed " . mysqli_connect_error());
}

// Show data from database in read.php page
function query($sql)
{
    global $connection;

    $result = mysqli_query($connection, $sql);
    // Container to save data
    $rows   = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $rows[] = $data;
    }
    return $rows;
}

// Create function
function create($sql) {
    global $connection;

    // Get input from user
    $productName    = $sql["name"];
    $category       = $sql["category"];
    $price          = $sql["price"];
    $desc           = $sql["desc"];
    $disc           = $sql["disc"];
    $unit           = $sql["unit"];
    $stock          = $sql["stock"];

    // Upload gambar
    $image         = upload();
    if (!$image) {
        return false;
    }

    if ( !empty($productName) && $category && $category !== "0" && !empty($price) && !empty($desc) && !empty($disc) && !empty($unit) && !empty($stock) && !empty($image)  ) {
        // Query insert into
        $query          = " INSERT INTO products (
                                product_name,
                                category_id, 
                                price,
                                description,
                                discount_amount,
                                unit,
                                stock,
                                image
                                    )
                            VALUES  (
                                '$productName',
                                '$category',
                                '$price',
                                '$desc',
                                '$disc',
                                '$unit',
                                '$stock',
                                '$image'
                                    ) ";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }
}

// Upload gambar
function upload() {     
    $error      = $_FILES['image']['error'];
    $ekstensiGbrValid = ['jpg', 'jpeg', 'png'];
    $namaFile = [];

    if (is_array($_FILES['image']['name'])) {
        $jumlahFile = count($_FILES['image']['name']);

        $namaUnik   = [];

        for ($i = 0; $i < $jumlahFile; $i++) {
            $namaFile[] = $_FILES['image']['name'][$i];
            $location = $_FILES['image']['tmp_name'][$i];
            $ekstensi = pathinfo($_FILES['image']['name'][$i], PATHINFO_EXTENSION);

            // Ada gambar yang diupload atau tidak
            if ($error[$i] == 4) {
                echo " <script>
                        alert('Pilih gambar terlebih dahulu');
                    </script>";
                return false;
            } elseif (!in_array($ekstensi, $ekstensiGbrValid)) {
                echo " <script>
                        alert('Yang Anda upload bukan gambar!');
                    </script>";
                return false;
            } else {
                // generate nama  file unik
                $namaUnik[]   = uniqid() . '.' . $ekstensi;

                move_uploaded_file($location, '../../assets/images/product/' . end($namaUnik));
            }
        }
        return implode(" ", $namaUnik);
    }
    return false;
    
}


// Delete function
function delete($id) {
    global $connection;

    // Get data based id
    $query  = "SELECT*FROM products WHERE id = $id";
    $result = mysqli_query($connection, $query);
    $row  = mysqli_fetch_assoc($result);

    // Check if any file image
    if (file_exists('../../assets/images/product/' . $row["image"])) {
        unlink('../../assets/images/product/' . $row["image"]);
    } 

    // Delete data
    $hapus  = "DELETE FROM products WHERE id = $id";
    mysqli_query($connection, $hapus);

    // Return number of rows affected with delete query
    return mysqli_affected_rows($connection);
}

// Edit function
function edit_query ($sql) {
    global $connection;

    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Error in sql query " . mysqli_error($connection) );
    }

    $data   = mysqli_fetch_assoc($result);
    return $data;
}

// Edit data
function edit($sql) {
    global $connection;

    $id             = $sql["id"];
    // Catch input from user
    $productName    = $sql["name"];
    $category       = $sql["category"];
    $price          = $sql["price"];
    $desc           = $sql["desc"];
    $disc           = $sql["disc"];
    $unit           = $sql["unit"];
    $stock          = $sql["stock"];
    $imageOld       = $sql['imageOld'];

    // Mengecek user memilih gambar baru atau tidak
    if ($_FILES['image']['error'][0] === 4) {
        $image  = $imageOld;
    } else {
        $image  =upload();
    }

    $query          = "UPDATE products SET
                                id              = '$id',
                                product_name    = '$productName' ,
                                category_id     = '$category',
                                price           = '$price' ,
                                description     = '$desc' ,
                                discount_amount = '$disc' ,
                                unit            = '$unit',
                                stock           = '$stock' ,
                                image           = '$image'
                        WHERE id = $id ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// Function registrasi
function daftar($sql) {
    global $connection;

    // Get input from user
    $name       = $sql["name"];
    $email      = $sql["email"];
    $phone      = $sql["phone"];
    $username   = $sql["phone"];
    $password   = $sql["password"];

    // Set default value group_id
    $groupId    = isset($sql['group_id']) ? $sql['group_id'] : 3;

    // Encryption password
    $password   = password_hash($password, PASSWORD_DEFAULT);

    if ( !empty($name) && !empty($email) && !empty($phone) && !empty($password) ) {
        $query  =   "   INSERT INTO users (
                            name,
                            email,
                            phone_number,
                            username,
                            password,
                            group_id
                        )
                        VALUES (
                            '$name'     ,
                            '$email'    ,
                            '$phone'    ,
                            '$username' ,
                            '$password' ,
                            '$groupId'
                        )
                    ";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }
}
