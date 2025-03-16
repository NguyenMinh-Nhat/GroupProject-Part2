<?php
session_start();
include "settings.php";
$conn = @mysqli_connect("$host", "$user", "$pwd", "$sql_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = ($_POST['password'] . PASSWORD_DEFAULT); // Corrected password hashing
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Check if username or email exists
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) > 0) {
        $error = "Username or email already exists";
    } else {
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        
        if (mysqli_query($conn, $sql)) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            $error = "Registration failed: " . mysqli_error($conn);
        }
    }
}
?>