






<!-- login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - VNG Games</title>
    <link rel="stylesheet" href="styles/login.css">
    <link rel="stylesheet" href="styles/menu.css">
    <link rel="stylesheet" href="styles/responsive.css">
    <link href = "styles/footer.css" rel = "stylesheet" />
</head>
<body>
    <!-- Include the existing navigation -->
    <?php include 'menu.inc'; ?>
<div class="login-page">
    <!-- Login Section -->
    <div class="login-wrapper">
        <div class="login-box">
            <h2>Welcome Back to VNG Games</h2>
            <form action="process_login.php" method="POST">
                <div class="input-field">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <span class="input-glow"></span>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="input-glow"></span>
                </div>
                <button type="submit" class="login-button">Sign In</button>
                <p class="signup-prompt">New to VNG Games? <a href="phpenhancement1.php">Create an Account</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>


