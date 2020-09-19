<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>ABC Company Production Database</title>


<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

<link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php
    session_start();
    
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
        header("location:userportal.php");
    }
    ?>

<div class="mgrheader-wrap">
<?php
    
    /* Displays users name in the header is username and users name is set in global session
     otherwise, sends user to login screen to log in */
    if (isset($_SESSION['username']) && $_SESSION['username'] == true) {
        echo "<h1>" . $_SESSION['username'] . "</h1>";
    }
    else {
        header("index.php");
    }
    ?>
<div class="mgrheader-html">
</div>
</div>
<div class="mgr-wrap">
<div class="mgr-html">
<h3>Please Select an Option: </h3>
<form action="mgrdbadduser.php" method="Post" id="addForm">
<input id="click" type="submit" class="button" value="Add User Access">
</form>
<form action="mgrdbedituser.php" method="Post" id="editForm">
<input id="click" type="submit" class="button" value="Edit User Access">
</form>
<form action="mgrdbdeleteuser.php" method="Post" id="deleteForm">
<input id="click" type="submit" class="button" value="Delete User Access">
</form>
<form action="mgrportal.php" method="Post" id="back">
<input id="click" type="submit" class="button" value="Dashboard">
</div>
</div>
</div>

</body>
</html>
