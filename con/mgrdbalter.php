<?php
    session_start();
    
    /* Set PHP variables from user selection on dbForm.php */
    $prodID=$_POST['entry'];
    $submit=$_POST['submit'];
    $deptName=$_POST['deptName'];
    $count=$_POST['count'];
    $taskName=$_POST['taskName'];
    $time=$_POST['time'];
    $date=$_POST['date'];
    
    $userName=$_SESSION['username'];
    $password=$_SESSION['password'];
    
    $array = array($deptName,$taskName,$count,$time,$date);
    $comment = implode(' > ',$array);
    
    settype ($prodID, "integer");
    
    $con = new mysqli("localhost", "$userName", "$password", "Production");
    
    /* Check Connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit(header("refresh: 2; mgrportal.php"));
    }
    
    if($submit == "Accept") {
        /* SQL Statement to Update Data */
        $sql = "UPDATE completedTask SET `deptName` = '". $deptName ."', `taskName` = '". $taskName ."', `time` = '". $time ."', `count` = '". $count ."', `entryDate` = '". $date ."', `Comment` = '". $comment ."'  WHERE `prodID` = '". $prodID ."'";
        
        if(mysqli_query($con, $sql)){
            echo "Updated successfully.";
            header("refresh: 2; mgreditform.php");
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
    
    if($submit == "Reject") {
        /* SQL Statement to Delete Row from mEditList */
        $sql = "DELETE FROM mEditList WHERE `prodID` = '". $prodID ."'";
        
        
        if(mysqli_query($con, $sql)){
            echo "Deleted successfully.";
            header("refresh: 2; mgreditform.php");
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
    ?>
