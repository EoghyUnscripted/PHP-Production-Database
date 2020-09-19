<?php
    session_start();
    
    /* Set PHP variables from user selection on mgrdbedituser.php */
    $deptName=$_POST['deptName'];
    $fName=$_POST['fName'];
    $lName=$_POST['lName'];
    $user=$_POST['userEdit'];
    $login=$_POST['user'];
    $admin=$_POST['admin'];
    
    $userName=$_SESSION['username'];
    $password=$_SESSION['password'];
    
    settype ($admin, "integer");
    
    $con = new mysqli("localhost", "$userName", "$password", "Production");
    
    /* Check Connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(header("refresh: 2; mgrportal.php"));
    }
    
        $sql = "UPDATE userAcc SET `deptName` = '". $deptName ."', `fName` = '". $fName ."', `lName` = '". $lName ."', `admin` = '". $admin ."', `userName` = '". $login ."'  WHERE `userName` = '". $user ."'";
        
        if(mysqli_query($con, $sql)){
            echo "Edited successfully.";
            header("refresh: 2; mgrdbedituser.php");
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    
?>
