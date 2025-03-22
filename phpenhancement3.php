<?php
// Step 1: Start the session to get the user ID
session_start();

// Step 2: Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must login first. <a href='phpenhancement.php'>Đăng nhập</a>";
    exit();
}

//  Get the user ID from the session
$userId = $_SESSION['user_id'];

//  Load the database settings
require_once("settings.php");

//  Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

//  If the connection fails, show an error
if (!$conn) {
    echo "Cannot connect to database.";
    exit();
}

//  Create queries to get data for the user
$query = "SELECT job_reference, first_name, last_name, date_of_birth, gender, email, status, evaluation FROM eoi WHERE user_id = $userId";
$eoinum_query = "SELECT eoinum FROM eoi WHERE user_id = $userId";

//  Run the queries
$result = mysqli_query($conn, $query);
$eoinum_result = mysqli_query($conn, $eoinum_query);

//  If the main query fails, show an error
if (!$result) {
    echo "Something is wrong with query: " . mysqli_error($conn);
    exit();
}

//  If no data is found for the main query, show a message
if (mysqli_num_rows($result) == 0) {
    echo "Cannot find User Application Form: $userId";
    exit();
}

// : If the eoinum query fails, show an error
if (!$eoinum_result) {
    echo "Something is wrong with user id: " . mysqli_error($conn);
    exit();
}

//  If no data is found for the eoinum query, show a message
if (mysqli_num_rows($eoinum_result) == 0) {
    echo "Cannot find User Application Form: $userId";
    exit();
}

// Fetch the eoinum value
$row = mysqli_fetch_assoc($eoinum_result);
$eoinum = $row['eoinum'];

//  Fetch the user data
$user_data = mysqli_fetch_assoc($result);

//Define labels for the fields (to make them more user-friendly)
$labels = [
    'job_reference' => 'Job Reference',
    'job_title' => 'Job Title',
    'first_name' => 'First Name',
    'last_name' => 'Last Name',
    'date_of_birth' => 'Date of Birth',
    'gender' => 'Gender',
    'email' => 'Email Address',
    'status' => 'Application Status',
    'evaluation' => 'Evaluation'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Application | WE</title>
    <link href="styles/footer.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff5e6; /* Light orange background for a warm effect */
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff; /* White background for the form */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border: 1px solid #ffcc80; /* Light orange border */
            animation: fadeIn 1.5s ease-in-out; /* Fade-in animation for the form */
        }

        /* Fade-in animation */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #2c3e50;
            font-size: 28px;
            margin: 0;
        }

        .eoinum-display {
            font-size: 18px;
            font-weight: bold;
            color: #e74c3c; /* Keep the original red color as requested */
            margin-top: 10px;
        }

        /* Pulsing animation for the Application Code */
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .form-section {
            border-bottom: 1px solid #ffcc80; /* Light orange border */
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            transition: all 0.3s ease; /* Smooth transition for hover effects */
        }

        .form-group:hover {
            transform: translateY(-3px); /* Slight lift on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05); /* Subtle shadow on hover */
        }

        .form-group:hover span {
            background-color: #fff5e6; /* Light orange background on hover */
            border-color: #ff9800; /* Orange border on hover */
        }

        .form-group label {
            width: 200px;
            font-weight: 600;
            color: #34495e;
            font-size: 16px;
        }

        .form-group span {
            flex: 1;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            color: #2c3e50;
            transition: background-color 0.3s ease, border-color 0.3s ease; /* Smooth transition for hover */
        }

        .form-group span:empty::before {
            content: "N/A";
            color: #7f8c8d;
            font-style: italic;
        }

        .status-pending {
            background-color: #ff9800; /* Orange for pending status */
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            display: inline-block;
            font-size: 14px;
            animation: statusFade 1s ease-in-out; /* Fade animation for status */
        }

        .status-new {
            background-color: #ff5722; /* Slightly darker orange for new status */
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            display: inline-block;
            font-size: 14px;
            animation: statusFade 1s ease-in-out; /* Fade animation for status */
        }

        /* Fade animation for status badges */
        @keyframes statusFade {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>
</head>
<body>
    <?php include 'menu.inc'; ?>

    <div class="form-container">
        <div class="form-header">
            <h2><?php echo strtoupper($_SESSION['username']); ?> Application Form</h2>
            <div class="eoinum-display">Application Code: <?php echo strtoupper($eoinum); ?></div>
        </div>

        <div class="form-section">
            <?php foreach ($user_data as $key => $value): ?>
                <div class="form-group">
                    <label><?php echo $labels[$key]; ?>:</label>
                    <span class="<?php echo $key === 'status' ? 'status-' . strtolower($value) : ''; ?>">
                        <?php echo $value; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include "footer.inc"; ?>

    <?php
    // Step 16: Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>