<?php
$hostname   = "localhost";
$username   = "nita";
$password   = "root";
$database   = "pos_shop";

// membuat koneksi
$connection = mysqli_connect($hostname, $username, $password, $database);

// pengecekan koneksi
if (!$connection) {
    die("Connection failed " . mysqli_connect_error());
}
