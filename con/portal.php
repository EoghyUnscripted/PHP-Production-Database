<?PHP
session_start();    // Start Session

// Check admin status
if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
    exit(header('location:/mgr/mgrportal.php'));        // Redirect to Manager Portal
} elseif (isset($_SESSION['username']) && $_SESSION['admin'] != 1) {
    exit(header('location:../user/userportal.php'));        // Redirect to User Portal
}
?>
