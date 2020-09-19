<?PHP
session_start();    // Start Session

$userName = $_POST['user_name'];    // Get Username from login form
$password = $_POST['password'];     // Get Password from login form
$_SESSION['username'] = $userName;      // Set Session Username
$_SESSION['password'] = $password;      // Set Session Password
$user = 'g4cyf87b_' . $userName;        // Concatenate server Username prefix

// Connect to server database
$con = new mysqli('108.167.165.172', $user, $password, 'g4cyf87b_productionDB');

// Check database connection
if ($con->connect_error) {       // If error
    header('refresh: 3; index.php');        // Redirect to index
    session_unset();        // Unset Session
    session_destroy();      // Destroy Session
    die('Connection failed: ' . $con->connect_error);      // Error Message
    exit;       // Exit

} elseif ($stmt = $con->query('SELECT * FROM userAcc WHERE userAcc.userName ="' . $userName . '"')) {

    // If success, get user row from table
    while ($r = $stmt->fetch_array(MYSQLI_BOTH)) {      // Get database results
        $admin = $r['admin'];       // Get admin
        $fName = $r['fName'];       // Get first name
        $lName = $r['lName'];       // Get last name
        $manager = $r['mgrName'];   // Get manager name
        $currentUser = $r['userName'];      // Get username
        $_SESSION['admin'] = $admin;        // Set admin
        $_SESSION['fName'] = $fName;        // Set first name
        $_SESSION['lName'] = $lName;        // Set last name
        $_SESSION['manager'] = $manager;    // Set manager name
        $_SESSION['currentUser'] = $currentUser;        // Set username
    }
    if ($admin == 1) {      // If manager
        exit(header('location:../mgr/mgrportal.php'));
    } elseif ($admin !== 1) {       // If user
        exit(header('location:../user/userportal.php'));
    } else {        // If unset
        exit(header('location:index.php'));
    }
}
?>
