<?php
session_start();
include "settings.php";
$conn = @mysqli_connect("$host", "$user", "$pwd", "$sql_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Corrected password hashing
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - VNG Games</title>
    <link rel="stylesheet" href="styles/register.css">
    <link rel="stylesheet" href="styles/menu.css">
</head>
<body>
    <?php include 'menu.inc'; ?>
    <div class="login-card">
        <h2>Register to VNG Games</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <label>Username</label>
            <input type="text" name="username" required><br>
            <label>Password</label>
            <input type="password" name="password" required><br>
            <label>Email</label>
            <input type="email" name="email" required><br>
            <input type="submit" value="Register"><br>
            <a href="phpenhancement.php">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>