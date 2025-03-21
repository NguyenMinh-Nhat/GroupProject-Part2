<?php
// Check for logout request
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();
    
    // Destroy the session
    session_destroy();
    
    // Redirect
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        

        /* Header styles with sticky */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Logo styles with pulse and hover animation */
        header .logo {
            font-size: 24px;
            font-weight: 600;
            color: #ff5733;
        }

        header .logo:hover {
            transform: rotate(360deg);
            text-shadow: 0 0 10px rgba(255, 87, 51, 0.7);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* Welcome message styles with typing animation */
        header .welcome {
            font-size: 16px;
            color: #333;
            flex-grow: 1;
            text-align: center;
            overflow: hidden;
            white-space: nowrap;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        @keyframes blink {
            50% {
                border-color: transparent;
            }
        }

        /* Menu links styles with bounce and click animations */
        header nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        header nav ul li {
            animation: bounce 0.5s ease forwards;
            animation-delay: calc(0.1s * var(--i));
            position: relative; /* For ripple, sparkle, and tooltip */
        }

        header nav ul li a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            text-transform: uppercase;
            position: relative;
            transition: transform 0.3s ease, color 0.3s ease;
            display: inline-block;
        }

        /* Tooltip on hover */
        header nav ul li a::before {
            content: attr(data-tooltip);
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff5733;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        header nav ul li a:hover::before {
            opacity: 1;
            visibility: visible;
        }

        /* Glow effect on hover */
        header nav ul li a:hover {
            color: #ff5733;
            transform: scale(1.1);
            text-shadow: 0 0 10px rgba(255, 87, 51, 0.7), 0 0 20px rgba(255, 87, 51, 0.5);
        }

        /* Underline effect on hover */
        header nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: #ff5733;
            bottom: -5px;
            left: 0;
            transition: width 0.3s ease;
        }

        header nav ul li a:hover::after {
            width: 100%;
        }

        /* Active state */
        header nav ul li a.active {
            color: #ff5733;
            position: relative;
            border-radius:5px;
        }

        @keyframes glowBorder {
            0% {
                box-shadow: 0 0 5px rgba(255, 87, 51, 0.5);
            }
            50% {
                box-shadow: 0 0 15px rgba(255, 87, 51, 0.8);
            }
            100% {
                box-shadow: 0 0 5px rgba(255, 87, 51, 0.5);
            }
        }

        /* Ripple effect on click */
        header nav ul li .ripple {
            position: absolute;
            background: rgba(255, 87, 51, 0.3);
            border-radius: 50%;
            pointer-events: none;
            animation: ripple 0.6s ease-out;
        }

        @keyframes ripple {
            0% {
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                width: 150px;
                height: 150px;
                opacity: 0;
            }
        }

        /* Sparkle effect on click */
        header nav ul li .sparkle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #ff5733;
            border-radius: 50%;
            pointer-events: none;
            animation: sparkle 0.7s ease-out;
        }

        @keyframes sparkle {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        /* Shake effect on click */
        header nav ul li a.clicked {
            animation: shake 0.3s ease;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-3px); }
            50% { transform: translateX(3px); }
            75% { transform: translateX(-3px); }
            100% { transform: translateX(0); }
        }

        @keyframes bounce {
            0% {
                transform: translateY(-20px);
                opacity: 0;
            }
            50% {
                transform: translateY(10px);
                opacity: 0.5;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">VNG</div>
        <div class="welcome">
            <?php
                // Check if username exists in session
                if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                    echo "Welcome, " . htmlspecialchars($_SESSION['username']);
                } else {
                    echo "Welcome, Guest";
                }
            ?>
        </div>
        <nav>
            <ul>
                <li style="--i: 1;"><a href="index.php" data-tooltip="Go to Home">Home</a></li>
                <li style="--i: 2;"><a href="about.php" data-tooltip="Learn About Us">About</a></li>
                <li style="--i: 3;"><a href="job.php" data-tooltip="Explore Careers">Career</a></li>
                <li style="--i: 4;"><a href="apply.php" data-tooltip="Apply for a Job">Apply</a></li>
                <?php 
                if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                    if ($_SESSION['username'] == "admin") {
                        echo '<li style="--i: 5;"><a href="manage.php" data-tooltip="Manage Applications">Manager</a></li>';
                    }
                    echo '<li style="--i: 6;"><a href="logout.php" data-tooltip="Log out of your account">Logout</a></li>';
                } else {
                    echo '<li style="--i: 5;"><a href="phpenhancement.php" data-tooltip="Log in to your account">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <!-- Audio for click sound -->
    <audio id="clickSound" src="https://www.soundjay.com/buttons/button-3.mp3"></audio>

    <!-- JavaScript for animations and UX enhancements -->
    <script>
        // Play click sound and handle animations
        const clickSound = document.getElementById('clickSound');
        document.querySelectorAll('header nav ul li a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Play click sound
                clickSound.currentTime = 0; // Reset sound to start
                clickSound.play();

                // Add shake effect
                this.classList.add('clicked');

                // Add active state
                document.querySelectorAll('header nav ul li a').forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                // Get the position of the click relative to the link
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                // Create ripple effect
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                this.parentElement.appendChild(ripple);

                // Create multiple sparkles (increased to 8)
                for (let i = 0; i < 8; i++) {
                    const sparkle = document.createElement('span');
                    sparkle.classList.add('sparkle');
                    const offsetX = x + (Math.random() * 30 - 15); // Wider spread
                    const offsetY = y + (Math.random() * 30 - 15);
                    sparkle.style.left = `${offsetX}px`;
                    sparkle.style.top = `${offsetY}px`;
                    sparkle.style.animationDelay = `${Math.random() * 0.3}s`; // Random delay for sparkles
                    this.parentElement.appendChild(sparkle);
                }

                // Fade out effect before navigation
                document.body.style.opacity = '0';
                setTimeout(() => {
                    window.location.href = this.href;
                }, 300); // Match with fade-out duration
            });
        });

        // Set active state based on current page
        const currentPath = window.location.pathname.split('/').pop();
        document.querySelectorAll('header nav ul li a').forEach(link => {
            const linkPath = link.getAttribute('href').split('/').pop();
            if (currentPath === linkPath) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>