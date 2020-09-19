<?php
session_start();        // Start Session

$dept = $_POST['dept'];         // Get dept from form
$count = $_POST['count'];       // Get count from form
$taskName = $_POST['task'];     // Get task from form
$minutes = $_POST['minutes'];       // Get minues from form
$date = $_POST['date'];     // Get date from form
$userName = $_SESSION['username'];      // Set username from session
$password  = $_SESSION['password'];     // Set password from session
$manager = $_SESSION['manager'];    // Set manager from session
$array = array($dept, $taskName, $minutes, 'minutes',
            $count, 'count', $date);        // Set array for comment
$comment = implode(' ', $array);        // Set comment
$user = 'g4cyf87b_' . $userName;        // Set full username

// Connect to server database
$con = new mysqli('108.167.165.172', $user, $password, 'g4cyf87b_productionDB');

/* Check connection */
if ($con->connect_error) {       // Error
    header('refresh: 3; index.php');        // Redirect to index
    die('Connection failed: ' . $con->connect_error);     // Error Message
    exit;
} else {
    /* SQL Statement to Insert Data */
    $sql = "INSERT INTO taskEntry (deptName, userName, minutes, count, taskDate, " .
           "taskName, entryDate, comment, comment2, comment3, manager, editReqDate, " .
           "editReqAppr, editApprDate, approver) " .
           "VALUES ('$dept', '$userName', '$minutes', '$count', '$date', " .
           "'$taskName', CURRENT_TIMESTAMP, '$comment', NULL, NULL, " .
           "'$manager', NULL, NULL, NULL, NULL)";        // SQL statement
    if ($con->query($sql) === TRUE) {     // Execute SQL statement
        echo 'Record inserted successfully.';       // Success Message
    } else {
        echo 'ERROR: Could not execute. ' . $con->connect_error;        // Error Message
    }
}
$con->close();     // Close database connection
?>
