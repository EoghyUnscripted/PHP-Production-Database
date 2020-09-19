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
         <h3>Please Select Row to Edit: </h3>
        <form action="mgrdbalter.php" method="Post" id="edit">
            <fieldset class="details">
             <label>Completed Tasks</label><br>
              <select name="entry" class="entry" required>
                <option value="" disabled selected>Select Entry</option>
                <?php
                    if($stmt=$conn->query("SELECT * From mEditList"))
                    {
                        while($r=$stmt->fetch_array(MYSQLI_ASSOC))
                        {
            
                            ?><option value="<?php echo $r['prodID'] ?>"><?php
                                
                                echo " ". $r['userName'] ." -- ". $r['com1'] ." -- ". $r['com2'] ."";
                                ?></option>

                <?php } } ?>
              </select>


            </fieldset><br>
            <h3>Select All Items For New Row:</h3>
            <fieldset class="details">
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
                <label>Task</label><br>
                    <select name="taskName" class="taskName" required>
                    <option value="Select Task" selected>Select Task</option>
                    <?php
                        if($stmt=$conn->query("SELECT taskName FROM taskList ORDER BY taskName ASC"))
                        {
                            while($r=$stmt->fetch_array(MYSQLI_ASSOC))
                            {
           
                                ?><option value="<?php echo $r['taskName'] ?>"><?php echo $r['taskName']; ?></option>

                    <?php } } ?>
                    </select>
                <label>Count</label><br>
                    <select name="count" required>
                    <option value="Select Count" selected>Select Count</option>
                    <?php
                        for ($i=1; $i<=500; $i++)
                        {
                            ?><option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php } ?>
                    </select>
                <label>Time</label><br>
                    <select name="time" class="time" required>
                    <option value="Select Time in Minutes" selected>Select Time in Minutes</option>
                    <?php
                        for ($i=1; $i<=500; $i++)
                        {
                            ?><option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php } ?>
                    </select>
                <label>Date Completed</label><br>
                    <input name="date" class="date" type="date" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" value="2017-01-01" required></input>
                            </fieldset>
            <input id="click" name="submit" type="submit" class="button" value="Accept">
            <input id="click" name="submit" type="submit" class="button" value="Reject">
        </form>
        <form action="mgrportal.php" method="Post" id="back">
            <input id="click" type="submit" class="button" value="Dashboard">
        </form>
	</div>
  </div>


</body>
</html>
