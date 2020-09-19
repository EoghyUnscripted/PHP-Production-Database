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

</head>

<body>

  <div class='container'>
    <div class='d-flex justify-content-center h-100'>
      <div class='card'>
        <div class='card-header'>
          <h6><?php
              echo $name; ?></h6>
        </div>
        <div class='card-body'>
          <p>Completed Tasks:</p>
          <div class='scroll'>
            <table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Date</th>
                  <th>Dept</th>
                  <th>Task</th>
                  <th>Time</th>
                  <th>Count</th>
                </tr>
              </thead>
                <?php

                    if ($stmt = $con->query("SELECT * From taskEntry WHERE userName='". $username ."' ORDER BY entryDate DESC"))
                    {
                        while($r = $stmt->fetch_array(MYSQLI_ASSOC)) {
                            echo '<tr>';
                            echo '<td>' . $r['prodID'] . '</td><td>' . $r['taskDate'] . '</td><td>' .
                            $r['deptName'] . '</td><td>' .
                            $r['taskName'] . '</td><td>' .
                            $r['minutes'] . '</td><td>' .
                            $r['count'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    ?>
            </table>
          </div>
        </div>
        <div class='card-footer'>
          <!-- Back -->
          <div class='btn-group float-right' role='group'>
            <a value='back' class='btn select_btn' href='../index.php'
                role='button' aria-pressed='true'>Back</a>
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
