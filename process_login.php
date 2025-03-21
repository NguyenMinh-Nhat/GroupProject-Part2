<?php
// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include database settings
include "settings.php";

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function process_login($conn, $username, $password) {
    // Validate inputs
    if (empty($username) || empty($password)) {
        return [false, "Username and password are required.", null];
    }

    // Prepare the query to prevent SQL injection
    $sql = "SELECT user_id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        error_log("Database error in process_login: " . mysqli_error($conn));
        return [false, "An error occurred. Please try again later.", null];
    }

    // Bind the username parameter
    mysqli_stmt_bind_param($stmt, "s", $username);
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Query execution failed in process_login: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return [false, "An error occurred. Please try again later.", null];
    }

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Verify the password (temporary plain text comparison)
        if ($password === $user['password']) { // Changed from password_verify()
            // Return user data for session handling outside the function
            return [true, "Login successful", [
                'user_id' => $user['user_id'],
                'username' => $user['username']
            ]];
        } else {
            return [false, "Invalid password", null];
        }
    } else {
        return [false, "Username not found", null];
    }

    // Clean up
    mysqli_stmt_close($stmt);
}

// Only process login if the request is a POST, has the required fields, and is a login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && 
    isset($_POST['username']) && 
    isset($_POST['password']) && 
    isset($_POST['form_type']) && 
    $_POST['form_type'] === 'login') {
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Process the login
    list($success, $message, $user_data) = process_login($conn, $username, $password);

    if ($success) {
        // Set session variables
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['user_id'] = $user_data['user_id'];
        header("Location: index.php");
        exit();
    } else {
        // Store the error in the session to display on the login page
        $_SESSION['error'] = $message;
        header("Location: phpenhancement.php");
        exit();
    }
}

// Do NOT close the connection here, let the including script handle it
// mysqli_close($conn);
?>