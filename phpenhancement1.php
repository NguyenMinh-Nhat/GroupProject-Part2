<?php
session_start();
include "settings.php";

// Clear any existing login error message
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    $_SESSION['error'] = "Connection failed: " . mysqli_connect_error();
    error_log("Database connection failed: " . mysqli_connect_error());
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("Form submitted with POST method");

    // Get form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    error_log("Form data - Username: $username, Email: $email");

    // Input validation
    if (empty($username) || empty($password) || empty($email)) {
        $_SESSION['error'] = "All fields are required.";
        error_log("Validation error: All fields are required.");
    } elseif (strlen($username) > 50) {
        $_SESSION['error'] = "Username must be 50 characters or less.";
        error_log("Validation error: Username too long.");
    } elseif (strlen($email) > 100) {
        $_SESSION['error'] = "Email must be 100 characters or less.";
        error_log("Validation error: Email too long.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        error_log("Validation error: Invalid email format.");
    } elseif (strlen($password) < 8) {
        $_SESSION['error'] = "Password must be at least 8 characters long.";
        error_log("Validation error: Password too short.");
    } else {
        // Check if username or email already exists using a prepared statement
        $check_query = "SELECT * FROM users WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($conn, $check_query);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['error'] = "Username or email already exists.";
                error_log("Validation error: Username or email already exists.");
            } else {
                // Hash the password
                $hashed_password = $password;
                error_log("Password hashed successfully");

                // Insert the new user using a prepared statement
                $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
                $insert_stmt = mysqli_prepare($conn, $sql);
                if ($insert_stmt) {
                    mysqli_stmt_bind_param($insert_stmt, "sss", $username, $hashed_password, $email);
                    if (mysqli_stmt_execute($insert_stmt)) {
                        // Get the newly inserted user_id
                        $user_id = mysqli_insert_id($conn);
                        error_log("User inserted successfully, user_id: $user_id");

                        // Set session variables
                        $_SESSION['username'] = $username;
                        $_SESSION['user_id'] = $user_id;

                        // Redirect to index.php
                        error_log("Redirecting to index.php");
                        header("Location: index.php");
                        exit();
                    } else {
                        $_SESSION['error'] = "Registration failed: " . mysqli_stmt_error($insert_stmt);
                        error_log("Insert error: " . mysqli_stmt_error($insert_stmt));
                    }
                    mysqli_stmt_close($insert_stmt);
                } else {
                    $_SESSION['error'] = "Failed to prepare the insert statement: " . mysqli_error($conn);
                    error_log("Prepare insert error: " . mysqli_error($conn));
                }
            }
            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error'] = "Failed to prepare the check statement: " . mysqli_error($conn);
            error_log("Prepare check error: " . mysqli_error($conn));
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
</head>
<body>
    <?php include 'menu.inc'; ?>
    <div class="login-card">
        <h2>Register to VNG Games</h2>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_SESSION['error']) . "</p>";
            unset($_SESSION['error']);
        }
        ?>
        <form method="POST" action="phpenhancement1.php">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required><br>
            <label>Password</label>
            <input type="password" name="password" required><br>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required><br>
            <input type="submit" value="Register"><br>
            <a href="phpenhancement.php">Already have an account? Login</a>
        </form>
    </div>
</body>
</html>

<?php
// Close the database connection
if (isset($conn) && $conn) {
    mysqli_close($conn);
}
?>