<?php
// Start output buffering to catch any unexpected output
ob_start();

// Start session at the very top
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'settings.php';

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch all jobs
$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Careers | WE</title>
    <link rel="stylesheet" href="styles/responsive.css">
    <link href="styles/footer.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Inline CSS (latest purple-pink neon theme, adjusted for pink dot and Featured badge, plus modal styling) -->
    <style>
    /* styles/job.css */
.jobs-container {
    padding: 30px 50px 70px 50px;
    max-width: 100%;
    height: max-content;
    margin: 0 auto;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg,rgb(250, 205, 146) 0%, #3b82f6 100%); /* Gradient blue background */
    position: relative;
    overflow: hidden;
}

.jobs-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    opacity: 0.5;
    z-index: 0;
}

.jobs-container .jobs-header h1 {
    font-size: 48px;
    color: #ffffff;
    margin-bottom: 40px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-weight: 700;
    position: relative;
    z-index: 1;
    text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
}

.jobs-container .jobs-header h1::after {
    content: '';
    width: 100px;
    height: 5px;
    background: linear-gradient(90deg, #ff6200, #ff8c00); /* Gradient orange underline */
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 2px;
    box-shadow: 0 0 10px rgba(255, 98, 0, 0.5);
}

.jobs-container .area-list-jobs {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    justify-content: center;
    position: relative;
    z-index: 1;
}

.jobs-container .area-list-jobs .job-card {
    background: #ffffff; /* White background */
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    width: 320px;
    padding: 30px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    list-style: none;
    position: relative;
    border: 3px solid transparent;
    background-clip: padding-box;
    cursor: pointer;
}

.jobs-container .area-list-jobs .job-card::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(45deg,rgb(251, 239, 232),rgb(241, 197, 142),rgb(254, 227, 210)); /* Gradient orange border */
    z-index: -1;
    border-radius: 18px;
    transition: opacity 0.3s ease;
    opacity: 0.7;
    animation: glowBorder 2s infinite alternate;
}

.jobs-container .area-list-jobs .job-card:hover::before {
    opacity: 1;
}

.jobs-container .area-list-jobs .job-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
}

.jobs-container .area-list-jobs .job-card::after {
    content: 'Hot';
    position: absolute;
    top: 20px;
    right: -40px;
    background: linear-gradient(90deg,rgb(250, 162, 111),rgb(255, 171, 62)); /* Gradient orange badge */
    color: white;
    padding: 6px 45px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    transform: rotate(45deg);
    box-shadow: 0 3px 10px rgba(255, 98, 0, 0.3);
    animation: pulseBadge 1.5s infinite;
}

.job-card li {
    margin-bottom: 15px;
    font-size: 16px;
    color: #333;
    line-height: 1.6;
    transition: color 0.3s ease;
}

.job-card li:first-child {
    font-size: 22px;
    font-weight: 700;
    background: linear-gradient(90deg,rgb(255, 122, 40),rgb(253, 192, 148));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 0 0 5px rgba(255, 98, 0, 0.2);
}

.job-card li:nth-child(2) {
    font-size: 14px;
    color: #666;
    background: #f5f5f5;
    padding: 6px 12px;
    border-radius: 6px;
    display: inline-block;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.05);
}

.job-card li:nth-child(3) {
    font-size: 16px;
    color: #666;
    display: flex;
    align-items: center;
}

.job-card li:nth-child(3)::before {
    content: '•';
    margin-right: 12px;
    font-size: 20px;
    color: #ff69b4; /* Pink dot */
    transition: transform 0.3s ease;
}

.job-card:hover li {
    color: #1a1a1a;
}

.job-card:hover li:nth-child(3)::before {
    transform: scale(1.2);
}

.job-card button {
    display: inline-block;
    background: linear-gradient(90deg, #ff6200, #ff8c00); /* Gradient orange button */
    color: white;
    padding: 12px 30px;
    text-decoration: none;
    border-radius: 50px;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    transition: background 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    margin-top: 20px;
    text-align: center;
    border: none;
    cursor: pointer;
    width: 100%;
    box-shadow: 0 4px 15px rgba(255, 98, 0, 0.4);
}

.job-card button:hover {
    background: linear-gradient(90deg, #e55b00, #ff8c00);
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(255, 98, 0, 0.6);
}

.job-card button:active {
    transform: translateY(1px);
    box-shadow: 0 2px 10px rgba(255, 98, 0, 0.3);
    background: linear-gradient(90deg, #d94800, #e55b00);
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
    overflow: auto;
}

.modal-content {
    background: #ffffff; /* White background */
    margin: 5% auto;
    padding: 30px;
    border-radius: 15px;
    width: 80%;
    max-width: 600px;
    position: relative;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    border: 3px solid transparent;
    background-clip: padding-box;
    animation: fadeIn 0.3s ease;
}

.modal-content::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    background: linear-gradient(45deg, #ff6200, #ff8c00, #ff6200);
    z-index: -1;
    border-radius: 18px;
    opacity: 0.7;
    animation: glowBorder 2s infinite alternate;
    text-align: center;
    align-items: center;
}

.modal-content h2 {
    font-size: 26px;
    font-weight: 700;
    background: linear-gradient(90deg, #ff6200, #ff8c00);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-shadow: 0 0 5px rgba(255, 98, 0, 0.2);
}

.modal-content p {
    font-size: 16px;
    color: #333;
    margin-bottom: 15px;
    line-height: 1.6;
}

.modal-content p strong {
    color: #1a1a1a;
    display: inline-block;
    width: 150px;
}

.close {
    position: absolute;
    top: 15px;
    right: 25px;
    color: #ff6200;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease, transform 0.3s ease;
}

.close:hover,
.close:focus {
    color: #e55b00;
    transform: rotate(90deg);
}

/* Animations */


@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

.modal-content a {
            display: inline-block;
            background:linear-gradient(90deg, #ff6200, #ff8c00); /* Gradient orange button */
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
            padding: 10px 30px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            transition: background 0.3s ease, transform 0.3s ease;
            place-self: center;
            margin-top: 20px;
        }

        /* Hover effect */
        .modal-content a:hover {
            background: #e04c2d; /* Darker orange */
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php include 'menu.inc'; ?>
    <div class="jobs-container">
        <div class="jobs-header">
            <h1>Careers at VNG</h1>
        </div>
        <div class="area-list-jobs">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $job_id = htmlspecialchars($row['id']);
                    echo "<ul class='job-card'>";
                    echo "<li>" . htmlspecialchars($row['job_title']) . "</li>";
                    echo "<li>" . htmlspecialchars($row['job_code']) . "</li>";
                    echo "<li> Location: " . htmlspecialchars($row['job_location']) . "</li>";
                    echo "<button onclick=\"openModal('modal-{$job_id}')\">Show More</button>";
                    echo "</ul>";

                    // Modal for this job
                    echo "<div id='modal-{$job_id}' class='modal'>";
                    echo "<div class='modal-content'>";
                    echo "<span class='close' onclick=\"closeModal('modal-{$job_id}')\">&times;</span>";
                    echo "<h2>" . htmlspecialchars($row['job_title']) . "</h2>";
                    echo "<p><strong>Job Code:</strong> " . htmlspecialchars($row['job_code']) . "</p>";
                    echo "<p><strong>Location:</strong> " . htmlspecialchars($row['job_location']) . "</p>";
                    echo "<p><strong>Description:</strong> " . htmlspecialchars($row['description']) . "</p>";
                    echo "<p><strong>Responsibilities:</strong> " . htmlspecialchars($row['responsibilities']) . "</p>";
                    echo "<p><strong>Essential Requirements:</strong> " . htmlspecialchars($row['essential_requirements']) . "</p>";
                    echo "<p><strong>Preferred Skills:</strong> " . htmlspecialchars($row['preferred_skills']) . "</p>";
                    echo "<p><strong>Average Salary:</strong> $" . htmlspecialchars($row['average_salary']) . "K</p>";
                    echo "<a href='apply.php?job_id={$job_id}'>Apply Now</a>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No jobs found.</p>";
            } 
            
            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </div>

    <?php   
        include 'footer.inc';
    ?>

    <!-- JavaScript to handle modal open/close -->
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>
<?php
ob_end_flush(); // Flush the output buffer
?>