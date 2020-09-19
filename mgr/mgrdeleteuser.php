<?php
    session_start();
    
    /* Set PHP variables from user selection on mgrdbadduser.php */
    $user=$_POST['userDelete'];
    
    $userName=$_SESSION['username'];
    $password=$_SESSION['password'];

    
    $con = new mysqli("localhost", "$userName", "$password", "Production");
    
    /* Check Connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(header("refresh: 2; mgrportal.php"));
    }
    
    $sql = "DELETE FROM userAcc WHERE `userName` = '". $user ."'";
    
    if(mysqli_query($con, $sql)){
        echo "Deleted successfully.";
        header("refresh: 2; mgrdbdeleteuser.php");
    }
    else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
    
    ?>
