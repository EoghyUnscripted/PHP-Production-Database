<?php
    session_start();
    
    /* Set PHP variables from global session */
    $userName=$_POST['user_name'];
    $password=$_POST['password'];
    $_SESSION['username']= "$userName";
    $_SESSION['password']= "$password";
    
    $con = new mysqli("localhost", $userName, $password, "production");
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        
    }
?>
