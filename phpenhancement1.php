<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VNG Games</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/menu.css">
</head>
<body>
    <!-- Include the navigation -->
    <?php include 'menu.inc'; ?>

    <!-- Login Section -->
    <div class="login-container">
        <div class="login-form">
            <h2>Login to VNG Games</h2>
            <form action="process_login.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
                <p class="signup-link">Don't have an account? <a href="signup.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>
</html>