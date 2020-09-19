<?PHP

session_start();        //Open Session
session_unset();        //Unset Session
session_destroy();      //Destroy Session
header('location:../index.php');        //Return to index

?>
