

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
        <form method="POST" action="phpenhancement2.php">
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