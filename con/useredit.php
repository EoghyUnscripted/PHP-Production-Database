<?php
session_start();        // Start Session

$prodID = $_POST['entry'];       // Get original entry from form
$approver = $_POST['approver'];       // Get approver name from form
$dept = $_POST['dept'];         // Get dept from form
$count = $_POST['count'];       // Get count from form
$taskName = $_POST['task'];     // Get task from form
$minutes = $_POST['minutes'];       // Get minues from form
$array = array($userName, $dept, $taskName, $minutes, 'minutes',
               $count, 'count');        // Set array for comment
$comment2 = implode(' ', $array);        // Set comment2
$comment3 = $_POST['reason'];       // Get reason from form

$userName = $_SESSION['username'];      // Set username from session
$password  = $_SESSION['password'];     // Set password from session
$manager = $_SESSION['manager'];        // Set manager name
$user = 'g4cyf87b_' . $userName;        // Set full username

// Connect to server database
$con = new mysqli('108.167.165.172', $user, $password, 'g4cyf87b_productionDB');

// Get original task Details
$query = "SELECT comment FROM taskEntry WHERE prodID ='" . $prodID . "'";
$result = $con->query($query);

while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
      $comment = $r['comment'];
}

// Check connections
if ($con->connect_error) {       // Error
    header('refresh: 3; index.php');        // Redirect to index
    die('Connection failed: ' . $con->connect_error);     // Error Message
    exit;
} else {
    $sql = "INSERT INTO entryList (userName, prodID, origTask, deptName, taskName, " .
           "minutes, count, entryDate, approver, reason, newEntry, manager) " .
           "VALUES ('$userName', '$prodID', '$comment', '$dept', '$taskName', " .
           "'$minutes', '$count', CURRENT_TIMESTAMP, '$approver', '$comment3', " .
           "'$comment2', '$manager')";  // SQL statement
    if ($con->query($sql) === TRUE) {     // Execute SQL statement
        echo 'Record inserted successfully.';       // Success Message
    } else {
        echo 'ERROR: Could not execute. ' . $con->error;    // Error Message
    }
  }

$con->close();     // Close database connection
?>
