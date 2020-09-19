<!DOCTYPE html>
<?php
    require ("mgrdb.php");
    ?>
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
        header("location:usereditform.php");
    }
    
    $username=$_SESSION['username'];
    ?>
<div class="mgrheader-wrap">
<div class="mgrheader-html">
<h1><?=$username?></h1>
</div>
</div>
<div class="mgr-wrap">
<div class="mgr-html">
<h3>Edit User Access Form</h3>
<form action="mgrdeleteuser.php" method="Post" id="delete">
<fieldset class="details">
<select name="userDelete" class="userDelete" required>
<option value="Select User" selected>Select User</option>
<?php
    if($stmt=$conn->query("SELECT * FROM userAcc"))
    {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {
            
            ?><option value="<?php echo $r['userName'] ?>"><?php echo $r['userName']; ?></option>

<?php } } ?>
</select>
</fieldset>
<input id="click" name="submit" type="submit" class="button" value="Delete User">
</form>
<form action="mgradmindashboard.php" method="Post" id="back">
<input id="click" type="submit" class="button" value="Cancel">
</form>
</div>
</div>


</body>
</html>
