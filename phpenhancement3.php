<?php
// Database connection details
session_start();
require_once("settings.php");
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all applications from the eoi table
$sql_eoi = "SELECT eoi_num, job_reference, first_name, last_name, user_id FROM eoi";
$result_eoi = mysqli_query($conn, $sql_eoi);

// Fetch all users from the users table for the dropdown
$sql_users = "SELECT user_id, username FROM users";
$result_users = $conn->query($sql_users);
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    echo "You are logged in as user_id: " . $_SESSION['user_id'] . " and username: " . $_SESSION['username'];
    echo"$result_eoi";
}
?>

