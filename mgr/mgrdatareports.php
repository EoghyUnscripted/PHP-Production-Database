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
</script>

<body>
<?php
    session_start();
    
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
        header("location:userportal.php");
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
<h3>Completed Tasks: </h3>
<form id="review">
<fieldset class="details">
<?php
    if($stmt=$conn->query("SELECT * From completedTask ORDER BY entryDate DESC"))
    {
?>
        <table class="data-table">
        <caption class="title"></caption>
        <thead>
        <tr>
        <th>User</th>
        <th>Dept</th>
        <th>Task</th>
        <th>Time</th>
        <th>Count</th>
        <th>Date</th>
        </tr>
        </thead>
        <tbody>

    <?php
        while ($row = mysqli_fetch_array($stmt))
        {
            echo '<tr>
            <td>'.$row['userName'].'</td>
            <td>'.$row['deptName'].'</td>
            <td>'.$row['taskName'].'</td>
            <td>'.$row['time'].'</td>
            <td>'.$row['count'].'</td>
            <td>'.$row['entryDate'].'</td>
            </tr>';
        }}?>
</tbody>
</table>

</fieldset><br>
</form>
<form action="mgrportal.php" method="Post" id="back">
<input id="click" type="submit" class="button" value="Dashboard">
</form>
</div>
</div>


</body>
</html>
