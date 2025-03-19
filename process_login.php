<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
function process_login($conn, $username, $password) {
    $username = mysqli_real_escape_string($conn, $username);
    
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($password and $user['password']) {
            $_SESSION['username'] = $username;
            return [true, "Login successful"];
        } else {
            return [false, "Invalid password"];
        }
    } else {
        return [false, "Username not found"];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    list($success, $message) = process_login($conn, $username, $password);
    
    if ($success) {
        header("Location: index.php");
        exit();
    } else {
        $error = $message;
    }
}


?>










