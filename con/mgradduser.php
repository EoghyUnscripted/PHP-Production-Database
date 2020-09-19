<?php
    session_start();
    
    /* Set PHP variables from user selection on mgrdbadduser.php form */
    $deptName=$_POST['deptName'];
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $user=$_POST['userName'];
    $admin=$_POST['admin'];
    
    /* Converts variable to integer */
    settype ($admin, "integer");
    
    /* Set PHP variables from global session */
    $userName=$_SESSION['username'];
    $password=$_SESSION['password'];
    
    /* Initiates connection to database using global session */
    $con = new mysqli('192.168.0.174', $userName, $password, "production");
    
    /* Check database connection
     routes back to form on error */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(header("refresh: 2; mgrdbadduser.php"));
    }
    /* SQL statement to be performed on submit of form */
        $sql = "INSERT INTO userAcc (deptName, fName, lName, admin, userName) VALUES ('$deptName','$fName', '$lName', '$admin', '$user')";
    
    /* Successful database connection --
     displays success message on SQL statment and routes back to form
     or error message on failure for IT ticket */
        if(mysqli_query($con, $sql)){
            echo "Added successfully.";
            header("refresh: 2; mgrdbadduser.php");
        }
        else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($con);
        }
    
?>
