<?php

$hostname   = "localhost";
$username   = "nita";
$password   = "root";
$database   = "online_shop";

// membuat koneksi
$connect    = mysqli_connect($hostname, $username, $password, $database);

// perkondisian untuk pengecekan koneksi
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection success";
mysqli_close($connect);
