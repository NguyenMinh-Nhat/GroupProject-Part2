<?php
// Start session only if it hasn't been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear session data and destroy the session
$_SESSION = array();
session_destroy();

// Redirect to index.php
header("Location: index.php");
exit();
?>