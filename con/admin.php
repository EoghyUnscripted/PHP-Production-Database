<?PHP
session_start();    // Start Session

// If admin, send to manager portal
if (isset($_SESSION['username']) && $_SESSION['admin'] == 1) {
    exit(header('location:/mgr/mgrportal.php'));        // Redirct to Manager Portal
}
?>
