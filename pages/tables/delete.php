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

    // Catch id
    $id = $_GET["id"];

    // If delete success
    if ( delete ($id) > 0 ) {
        echo  "
            <script> 
                alert('Data berhasil dihapus');
                document.location.href  = 'read.php';
            </script>
            ";
    } else {
        echo  "
            <script> 
                alert('Data gagal dihapus');
            </script>
            ";
    }

    ?>