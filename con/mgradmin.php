<?PHP
session_start();    // Start Session

// If admin, send to manager portal
if (isset($_SESSION['username']) && $_SESSION['admin'] == 0) {
    exit(header('location:/user/userportal.php'));        // Redirct to Manager Portal
}
?>
