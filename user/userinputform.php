<?PHP
session_start();

$fName = $_SESSION['fName'];        // Get first name from session
$lName = $_SESSION['lName'];        // Get last name from session
$name = $fName . ' ' . $lName;      // Set full name

require '../con/admin.php';
require '../con/session.php';
?>

<!DOCTYPE html>
<head>

    <?PHP
    require '../layout/header.php'
    ?>

    <script>
        $(document).ready(function() {

    $('#submit').click(function(e) {
        e.preventDefault();

           $.ajax({
                  type: 'POST',
                  url: '../con/usertask.php',
                  data: $('form').serialize(),
                  cache: false,
                  success: function(data) {
                        alert(data);
                        console.log(data);
                  },
                  error: function(data) {
                      alert(data);
                      console.log(data);
                  }
            });
            return false;
            });
        });
    </script>

</head>

<body>

    <div class='container'>
        <div class='d-flex justify-content-center'>
            <div class='card'>
                <div class='card-header'>
                    <h6><?php
                        echo $name; ?></h6>
                </div>
                <div class='card-body'>
                    <p>Enter Task Details:</p>
                    <form id='insert'>
                        <!-- Department Name -->
                        <div class='input-group form-group'>
                            <div class='input-group-prepend' id='menu'>
                                <span class='input-group-text'>Department</span>
                            </div>
                            <select name='dept' class='form-control input' required>
                                <option value='' disabled selected></option>
                                <?php
                                if ($stmt = $con->query('SELECT deptName FROM depts')) {
                                    while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                                        ?><option value='<?php echo $r['deptName'] ?>'>
                                        <?php echo $r['deptName'] ?></option>

                                <?php

                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Task Name -->
                        <div class='input-group form-group'>
                            <div class='input-group-prepend' id='menu'>
                                <span class='input-group-text'>Task Name</span>
                            </div>
                            <select name='task' class='form-control input' required>
                                <option value='' disabled selected></option>
                                <?php
                                if ($stmt = $con->query('SELECT taskName FROM taskList')) {
                                    while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                                        ?><option value='<?php echo $r['taskName'] ?>'>
                                        <?php echo $r['taskName'] ?></option>

                                <?php }
                                } ?>
                            </select>
                        </div>
                        <!-- Minutes -->
                        <div class='input-group form-group float-left'>
                            <div class='input-group-prepend' id='menu'>
                                <span class='input-group-text'>Minutes</span>
                            </div>
                            <select name='minutes' class='form-control' required>
                                <option value='' disabled selected></option>
                                <?php
                                for ($i = 1; $i <= 500; $i++) {
                                    ?><option value='<?php echo $i; ?>'>
                                    <?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Count -->
                        <div class='input-group form-group'>
                            <div class='input-group-prepend' id='menu'>
                                <span class='input-group-text'>Task Count</span>
                            </div>
                            <select name='count' class='form-control' required>
                                <option value='' disabled selected></option>
                                <?php
                                for ($i = 1; $i <= 500; $i++) {
                                    ?><option value='<?php echo $i; ?>'>
                                    <?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- Date -->
                        <div class='input-group form-group'>
                            <div class='input-group-prepend' id='menu'>
                                <span class='input-group-text'>Date Completed</span>
                            </div>
                            <input type='date' pattern='(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))' value='yyyy-mm-dd' name='date' class='form-control input' required />
                        </div>
                    </form>
                </div>
                <div class='card-footer'>
                  <div class='btn-group float-right' role='group'>
                      <!-- Submit Form -->
                      <input type='submit' value='Submit' class='btn select_btn' id='submit'>
                      <!-- Cancel -->
                      <a value='Cancel' class='btn select_btn' href='../index.php' role='button' aria-pressed='true'>Cancel</a>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <?PHP
    require '../layout/footer.php';
    ?>

</body>

</html>
