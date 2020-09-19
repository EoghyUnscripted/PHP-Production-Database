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

              var entry = $('#entry').val();
              var dept = $('#dept').val();
              var task = $('#task').val();
              var minutes = $('#minutes').val();
              var count = $('#count').val();
              var approver = $('#approver').val();
              var reasonList = $('#reason').val();
              var reason = reasonList.join(", ");

                 $.ajax({
                        type: 'POST',
                        url: '../con/useredit.php',
                        data: {
                          entry: entry,
                          dept: dept,
                          task: task,
                          minutes: minutes,
                          count: count,
                          approver: approver,
                          reason: reason
                        },
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
            <p>Please select an entry to edit: </p>
            <form id='edit'>
              <!-- Completed Task -->
              <div class='input-group form-group'>
                <div class='input-group-prepend' id='menu'>
                  <span class='input-group-text'>Task Entry</span>
                </div>
                <select name='entry' id='entry' class='form-control input' required>
                    <option value='' disabled selected></option>
                    <?php
                    if ($stmt = $con->query("SELECT * From taskEntry WHERE userName='" . $username . "'")) {
                        while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                            ?><option value='<?php echo $r['prodID'] ?>'>
                            <?php echo $r['comment'] ?></option>

                    <?php }
                    } ?>
                </select>
              </div>
              <p>Please fill in details for new entry: </p>
              <div class='row'>
                <div class='col-lg-6 col-sm-12'>
                  <!-- Department Name -->
                  <div class='input-group form-group'>
                    <div class='input-group-prepend' id='menu'>
                      <span class='input-group-text'>Department</span>
                    </div>
                    <select name='dept' id='dept' class='form-control input' required>
                    <option value='' disabled selected></option>
                    <?php
                        if ($stmt = $con->query('SELECT deptName FROM depts')) {
                            while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                                ?><option value='<?php echo $r['deptName'] ?>'>
                                <?php echo $r['deptName'] ?></option>

                    <?php }
                    }?>
                    </select>
                  </div>
                  <!-- Task Name -->
                  <div class='input-group form-group'>
                    <div class='input-group-prepend' id='menu'>
                      <span class='input-group-text'>Task Name</span>
                    </div>
                    <select name='task' id='task' class='form-control input' required>
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
                    <select name='minutes' id='minutes' class='form-control' required>
                    <option value='' disabled selected></option>
                    <?php
                        for ($i = 1; $i <= 500; $i++) {
                            ?><option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <!-- Count -->
                  <div class='input-group form-group'>
                    <div class='input-group-prepend' id='menu'>
                      <span class='input-group-text'>Task Count</span>
                    </div>
                    <select name='count' id='count' class='form-control' required>
                    <option value='' disabled selected></option>
                    <?php
                        for ($i = 1; $i <= 500; $i++) {
                            ?><option value='<?php echo $i; ?>'><?php echo $i; ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <div class='col-lg-6 col-sm-12'>
                  <!-- Approver Name -->
                  <div class='input-group form-group'>
                    <div class='input-group-prepend' id='menu'>
                      <span class='input-group-text'>Approver</span>
                    </div>
                    <select name='approver' id='approver' class='form-control input' required>
                    <option value='' disabled selected></option>
                    <?php
                        if ($stmt = $con->query('SELECT uID, userName FROM userAcc WHERE admin = 1')) {
                            while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                                ?><option value='<?php echo $r['userName'] ?>'>
                    <?php echo $r['userName'] ?></option>

                    <?php }
                        }?>
                    </select>
                  </div>
                  <!-- Reason -->
                  <p>Select all that apply:</p>
                  <div class='input-group form-group'>
                      <div class='input-group-prepend' id='menu'>
                          <span class='input-group-text'>Reason</span>
                      </div>
                      <select multiple name='reason' id='reason' class='mdb-select form-control input' required>
                      <?php
                          if ($stmt = $con->query('SELECT reason FROM reasonList')) {
                              while ($r = $stmt->fetch_array(MYSQLI_ASSOC)) {

                                  ?><option value='<?php echo $r['reason'] ?>'>
                                  <?php echo $r['reason'] ?></option>

                      <?php }
                      }?>
                      </select>
                    </form>
                  </div>
                </div>
              </div>

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
        require '../layout/footer.php'
        ?>

</body>

</html>
