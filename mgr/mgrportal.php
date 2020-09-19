<?PHP
session_start();

$fName = $_SESSION['fName'];        // Get first name from session
$lName = $_SESSION['lName'];        // Get last name from session
$name = $fName . ' ' . $lName;      // Set full name

require '../con/mgradmin.php'
?>

<!DOCTYPE html>
<html>

<head>

    <?PHP
    require '../layout/header.php';
    ?>

</head>

<body>

    <div class='container'>
        <div class='d-flex justify-content-center h-100'>
            <div class='card'>
                <div class='card-header'>
                    <h3>Welcome, <?php
                        echo $name; ?>!</h3>
                </div>
                <div class='card-body'>
                    <p>Please select an option:</p>
                    <div class='link-group flex-wrap float-center' role='group'>
                      <a value='admin' class='btn mgrselect_btn' href='../mgr/mgradmindashboard.php' role='button' aria-pressed='true'>Admin</a>
                      <a value='edit' class='btn mgrselect_btn' href='../mgr/mgreditform.php' role='button' aria-pressed='true'>Edit Requests</a>
                      <a value='review' class='btn mgrselect_btn' href='../mgr/mgrdatareports.php' role='button' aria-pressed='true'>Productivity</a>
                      <a value='logout' class='btn mgrselect_btn' href='../con/logout.php' role='button' aria-pressed='true'>Log Out</a>
                    </div>
                </div>
                <div class='card-footer'>
                  <small class="text-muted">Last Update: 15 Sept, 2019</small>
                </div>
            </div>
        </div>
    </div>

    <?PHP
    require '../layout/footer.php';
    ?>

</body>

</html>
