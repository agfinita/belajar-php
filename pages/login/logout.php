<?php

session_start();

// Delete session login
session_unset();
session_destroy();

echo "<script> 
            confirm('Logout from account?');
            document.location.href = ('login.php');
    </script>";
exit;

?>




