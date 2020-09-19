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
<form action="mgredituser.php" method="Post" id="edit">
<fieldset class="details">
<select name="userEdit" class="userEdit" required>
<option value="Select User" selected>Select User</option>
<?php
    if($stmt=$conn->query("SELECT * FROM userAcc"))
    {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {
            
            ?><option value="<?php echo $r['userName'] ?>"><?php echo $r['userName']; ?></option>

<?php } } ?>
</select>
<label>Department</label><br>
<select name="deptName" class="deptName" required>
<option value="Select Department" selected>Select Department</option>
<?php
    if($stmt=$conn->query("SELECT deptName FROM depts"))
    {
        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
        {
            
            ?><option value="<?php echo $r['deptName'] ?>"><?php echo $r['deptName']; ?></option>

<?php } } ?>
</select>
<label>First Name</label><br>
<input class="input" type="text" name="fName" placeholder="John" required>
<label>Last Name</label><br>
<input class="input" type="text" name="lName" placeholder="Smith" required>
<label>Username</label><br>
<input class="input" type="text" name="user" placeholder="JSmith" required>
<div>
<input class="radio" type="radio" name="admin" value="1" /> Manager Access
<input class="radio" type="radio" name="admin" value="0" /> Basic Access
</div>
</fieldset>
<input id="click" name="submit" type="submit" class="button" value="Update User">
</form>
<form action="mgradmindashboard.php" method="Post" id="back">
<input id="click" type="submit" class="button" value="Cancel">
</form>
</div>
</div>


</body>
</html>
