<?PHP
session_start();        // Start Session

$username = $_SESSION['username'];      // Get Session Username
$password = $_SESSION['password'];      // Get Session Password
$user = 'g4cyf87b_' . $username;        // Set Server Username
$fName = $_SESSION['fName'];        // Get first name from session
$lName = $_SESSION['lName'];        // Get last name from session
$name = $fName . ' ' . $lName;      // Set full name

// New connection to database
$con = new mysqli('108.167.165.172', $user, $password, 'g4cyf87b_productionDB');

// Check database connection
if ($con->connect_error) {       // Error
    die('Connection failed: ' . $con->connect_error);     // Error message
    exit(header('refresh: 3; index.php'));      // Redirect to index
}
?>
