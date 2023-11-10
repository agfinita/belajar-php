<?php
// Create connection for database
$hostname   = "localhost";
$username   = "nita";
$password   = "root";
$database   = "pos_shop";

$dbConn     = new Database($hostname, $username, $password, $database);

class Database {
    private $koneksi;

    public function __construct($hostname, $username, $password, $database) {
        $this->koneksi  = mysqli_connect($hostname, $username, $password, $database);

        if (!$this->koneksi) {
            die("Koneksi gagal " . mysqli_connect_error());
        }
    }

    public function getKoneksi() {
        return $this->koneksi;
    }

    public function tutupKoneksi() {
        mysqli_close($this->koneksi);
    }
}

// Function registrasi
class User {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi  = $db->getKoneksi();
    }

    public function registrasi($name, $email, $phone, $username, $password, $groupId = 3)  {

        // Encryption password
        $password   = password_hash($password, PASSWORD_DEFAULT);

        if (!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($groupId)) {
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
            if (mysqli_query($this->koneksi, $query)) {
                return mysqli_affected_rows($this->koneksi);
            } else {
                return "Kesalahan dalam query: " . mysqli_error($this->koneksi);
            }
        } else {
            return "Data tidak valid, periksa kembali input Anda";
        }
    }
}

// Function login
class Login {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi = $db->getKoneksi();
    }

    public function loginUser($username, $password) {
        // Get input from user
        if (!empty($username)) {
            $query  = "SELECT * FROM users WHERE username = '$username' ";
            $result = mysqli_query($this->koneksi, $query);

            if (mysqli_num_rows($result) === 1) {
                $row    = mysqli_fetch_assoc($result);

                if (password_verify($password, $row["password"])) {
                    // Set session
                    $_SESSION["login"]  = true;
                    $_SESSION["name"]   = $row["name"];

                    header("Location: ../dashboard.php");
                    exit;
                }
            }
        }
        return "Login gagal, periksa kembali username atau password Anda";
    }
}

// Show data from database in read.php page
class GetProduct {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi  = $db->getKoneksi();
    }

    public function showProduct() {
        $query  = " SELECT
                        p.id,
                        p.product_name,
                        pc.category_name,
                        p.price,
                        p.description,
                        p.discount_amount,
                        p.unit,
                        p.stock,
                        p.image
                    FROM products p
                    INNER JOIN product_categories pc ON p.category_id = pc.id
                    ORDER BY p.id ASC ";
        $result = mysqli_query($this->koneksi, $query);

        $product    = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $product[]  = $row;
        }

        return $product;
    }
}

// Function pagination
class Pagination {
    private $koneksi;
    private $dataPerHal;

    public function __construct($db, $dataPerHal) {
        $this->koneksi      = $db->getKoneksi();
        $this->dataPerHal   = $dataPerHal;
    }

    public function hitungTotalData() {
        $query  = " SELECT COUNT(*) AS total_data FROM products ";
        $result = mysqli_query($this->koneksi, $query);
        $row    = mysqli_fetch_assoc($result);
        return $row['total_data'];
    }

    public function hitungTotalHalaman() {
        $totalData  = $this->hitungTotalData();
        return ceil($totalData / $this->dataPerHal);
    }

    public function getHalamanAktif() {
        return (isset($_GET["page"]) ? $_GET["page"] : 1);
    }

    public function hitungDataAwal() {
        $halAktif   = $this->getHalamanAktif();
        return ($this->dataPerHal * $halAktif) - $this->dataPerHal;
    }

    public function ambilDataProduk() {
        $dataTampil = $this->hitungDataAwal();
        $query      = " SELECT
                            p.id,
                            p.product_name,
                            pc.category_name,
                            p.price,
                            p.description,
                            p.discount_amount,
                            p.unit,
                            p.stock,
                            p.image
                        FROM products p
                        INNER JOIN product_categories pc ON p.category_id   = pc.id
                        ORDER BY p.id ASC
                        LIMIT $dataTampil, $this->dataPerHal    ";

                        $result = mysqli_query($this->koneksi, $query);
                        $product    = [];
                        while ($row = mysqli_fetch_assoc($result)) {
                            $product[]  = $row;
                        }
                        return $product;
    }
}

// Show data product in jsgrid.php
class TampilProduk {
    private $koneksi;

    public function __construct($db) {
        $this->koneksi  = $db->getKoneksi();
    }

    public function display() {
        $query  = " SELECT * FROM view_product2 ";
        $result = mysqli_query($this->koneksi, $query);
        $products    = [];

        while($data = mysqli_fetch_array($result)) {
            $product    = [
                'title'         => $data['product_name'],
                'category'      => 'Category ' . $data['category_name'],
                'price'         => 'Rp ' . $data['price'],
                'description'   => $data['description'],
                'discount'      => 'Discount: ' . $data['discount_amount'],
                'unit'          => $data['unit'],
                'stock'         => 'Stock:  ' . $data['stock'],
                'images'        =>  explode(" ", $data['image']),
            ];

            $products[]  = $product;
        }
        return $products;
    }
}

// Create product
class AddProduct {
    private $koneksi;

    public function __construct($dbConn) {
        $this->koneksi  = $dbConn;
    }

    public function tambahProduk($sql) {
        // Get input from user
        $productName    = $sql["name"];
        $category       = $sql["category"];
        $price          = $sql["price"];
        $desc           = $sql["desc"];
        $disc           = $sql["disc"];
        $unit           = $sql["unit"];
        $stock          = $sql["stock"];
        // Upload gambar
        $image          = $this->upload();

        if (!$image) {
            return false;
        }

        if (!empty($productName) && $category && $category !== "0" && !empty($price) && !empty($desc) && !empty($disc) && !empty($unit) && !empty($stock) && !empty($image)) {
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
            mysqli_query($this->koneksi->getKoneksi(), $query);
            return mysqli_affected_rows($this->koneksi->getKoneksi());
        }
    }

    // Function upload image
    public function upload() {
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
                    $namaUnik[$i]   = uniqid() . '.' . $ekstensi;

                    move_uploaded_file($location, '../../assets/images/product/' . $namaUnik[$i]);
                }
            }
            return implode(" ", $namaUnik);
        }
        return false;
    }
}

// Edit product
class EditProduct {
    private $koneksi;

    public function __construct($dbConn) {
        $this->koneksi  = $dbConn;
    }

    public function update($sql) {
        // Get id
        $id = $sql["id"];

        // Catch input from user
        $productName    = $sql["name"];
        $category       = $sql["category"];
        $price          = $sql["price"];
        $desc           = $sql["desc"];
        $disc           = $sql["disc"];
        $unit           = $sql["unit"];
        $stock          = $sql["stock"];
        $imageOld       = $sql["imageOld"];

        // Instansiasi class AddProduct
        $addProductObj   = new AddProduct($this->koneksi);

        // Mengecek user memilih gambar baru atau tidak
        if ($_FILES['image']['error'][0] === 4) {
            $image  = $imageOld;
        } else {
            $image  = $addProductObj->upload();
        }

        $query  = " UPDATE
                        products SET
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
                        
        mysqli_query($this->koneksi->getKoneksi(), $query);
        return mysqli_affected_rows($this->koneksi->getKoneksi());

    }

    // Edit product
    public function edit_query($sql) {
        $result = mysqli_query($this->koneksi->getKoneksi(), $sql);
        if (!$result) {
            die("Error in sql query " . mysqli_error($this->koneksi->getKoneksi()));
        }

        $data   = mysqli_fetch_assoc($result);
        return $data;
    }
}

// Delete product
class DeleteProduct {
    private $koneksi;

    public function __construct($dbConn) {
        $this->koneksi  = $dbConn;
    }

    public function hapus($id) {
        // Get data based id
        $query  = " SELECT * FROM products WHERE id = $id   ";
        $result = mysqli_query($this->koneksi->getKoneksi(), $query);
        $row    = mysqli_fetch_assoc($result);

        // Check if any file image
        if (file_exists('../../assets/images/product/' . $row["image"])) {
            unlink('../../assets/images/product/' . $row["image"]);
        }

        // Delete
        $hapus  = " DELETE FROM products WHERE id = $id ";
        $resultDelete   = mysqli_query($this->koneksi->getKoneksi(), $hapus);

        // Check if delete query successfull
        if ($resultDelete) {
            return true;
        } else {
            return false;
        }

        // Return number of rows affected with delete query
        //return mysqli_affected_rows($this->koneksi);
    }
}