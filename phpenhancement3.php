<?php
// Step 1: Start the session to get the user ID
session_start();

// Step 2: Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "You must login first. <a href='phpenhancement.php'>Đăng nhập</a>";
    exit();
}

// Get the user ID from the session
$userId = $_SESSION['user_id'];

// Load the database settings
require_once("settings.php");

// Connect to the database
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// If the connection fails, show an error
if (!$conn) {
    echo "Cannot connect to database.";
    exit();
}

// Fetch all applications for the logged-in user
$query = "SELECT eoinum, job_reference, first_name, last_name, date_of_birth, gender, email, status, evaluation FROM eoi WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

// If no applications are found, show a message
if ($result->num_rows == 0) {
    echo "No applications found for user ID: $userId";
    exit();
}

// Define labels for the fields (to make them more user-friendly)
$labels = [
    'eoinum' => 'Application Code',
    'job_reference' => 'Job Reference',
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
    <title>Application Forms | WE</title>
    <link href="styles/footer.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff5e6;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border: 1px solid #ffcc80;
            animation: fadeIn 1.5s ease-in-out;
        }

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
            color: #e74c3c;
            margin-top: 10px;
        }

        .form-section {
            border-bottom: 1px solid #ffcc80;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
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
        }

        .status-hired {
            background-color: #2ecc71;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 14px;
        }

        .status-rejected {
            background-color: #e74c3c;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 14px;
        }

        .status-new {
            background-color: #ff9800;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-size: 14px;
        }

    </style>
</head>
<body>
    <?php include 'menu.inc'; ?>

    <?php while ($application = $result->fetch_assoc()): ?>
        <div class="form-container">
            <div class="form-header">
                <h2><?php echo strtoupper($_SESSION['username']); ?> Application Form</h2>
                <div class="eoinum-display">Application Code: <?php echo strtoupper($application['eoinum']); ?></div>
            </div>

            <div class="form-section">
                <?php foreach ($application as $key => $value): ?>
                    <?php if (isset($labels[$key])): ?>
                        <div class="form-group">
                            <label><?php echo $labels[$key]; ?>:</label>
                            <span class="<?php echo $key === 'status' ? 'status-' . strtolower($value) : ''; ?>">
                                <?php echo htmlspecialchars($value); ?>
                            </span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endwhile; ?>

    <?php include "footer.inc"; ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
