<?php
    require_once('settings.php');
    require_once('process_login.php');


        // Check for logout request
        if(isset($_GET['logout'])) {
            // Unset all session variables
            $_SESSION = array();
            
            // Destroy the session
            session_destroy();
            
            // Redirect
            header("Location: index.php");
            exit();
        }
?>


<nav>
    <div id="logo_text">
            <img src = "styles/images/vng.jpg" class = "vngimage" alt = "VNG Games Logo"/>
            <?php
                // Check if username exists in session
                if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                    echo "<p>Welcome, " . htmlspecialchars($_SESSION['username']) ."</p>";
                } else {
                    echo "<p>Welcome, Guest</p>";
                }
            ?>
    </div>
    <div class = "menu_container">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="job.php">Career</a></li>
            <li><a href="apply.php">Apply</a></li>
            <?php 

            if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                if ($_SESSION['username'] =="admin") {
                        echo "<li><a href='manage.php'>Manager</a></li>";
            }
            }
            ?>
        </ul>
    </div>
    <div class = "login_container">

            <ul>
                    <?php
                    // Check if username exists in session
                    if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                        echo "<li><a href='?logout=1'>Logout</a></li>";
                    } else {
                        echo "<li><a href='phpenhancement.php'>Login</a></li>";
                    }
                    ?>
            </ul>

    </div>

</nav>