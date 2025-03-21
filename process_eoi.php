<?php
// Start session
session_start();

// Include database settings
require_once "settings.php";

// Check if the user is logged in
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    $_SESSION['error'] = "You must log in first.";
    header("Location: phpenhancement.php");
    exit();
}

// Check if user_id is set in the session
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    $_SESSION['error'] = "User ID not found in session. Please log in again.";
    header("Location: phpenhancement.php");
    exit();
}

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    error_log("Database connection failed: " . mysqli_connect_error());
    $_SESSION['error'] = "Unable to connect to the database. Please try again later.";
    header("Location: apply.php");
    exit();
}

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check required fields
    $required_fields = ['job_reference', 'first_name', 'last_name', 'date_of_birth', 'gender', 'street_address', 'suburb', 'state', 'postcode', 'email', 'phone'];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $_SESSION['error'] = "All required fields must be filled.";
            header("Location: apply.php");
            exit();
        }
    }

    // Get user_id from session
    $user_id = $_SESSION['user_id'];

    // Get form data
    $job_reference  = trim($_POST['job_reference']);
    $first_name     = trim($_POST['first_name']);
    $last_name      = trim($_POST['last_name']);
    $date_of_birth  = trim($_POST['date_of_birth']);
    $gender         = trim($_POST['gender']);
    $street_address = trim($_POST['street_address']);
    $suburb         = trim($_POST['suburb']);
    $state          = trim($_POST['state']);
    $postcode       = trim($_POST['postcode']);
    $email          = trim($_POST['email']);
    $phone          = trim($_POST['phone']);
    $skill_list     = isset($_POST['SkillList']) ? trim($_POST['SkillList']) : "";
    $other_skills   = isset($_POST['other_skills']) ? trim($_POST['other_skills']) : "";
    $user_message   = isset($_POST['UserMessage']) ? trim($_POST['UserMessage']) : "";
    $status         = "New"; // Default status

    // Additional validation
    if (strlen($job_reference) > 5) {
        $_SESSION['error'] = "Job reference must be 5 characters or less.";
        header("Location: apply.php");
        exit();
    }
    if (strlen($first_name) > 20 || strlen($last_name) > 20) {
        $_SESSION['error'] = "First name and last name must be 20 characters or less.";
        header("Location: apply.php");
        exit();
    }
    if (!preg_match("/^\d{4}$/", $postcode)) {
        $_SESSION['error'] = "Postcode must be exactly 4 digits.";
        header("Location: apply.php");
        exit();
    }
    if (!preg_match("/^[\d\s]{8,12}$/", $phone)) {
        $_SESSION['error'] = "Phone number must be 8 to 12 digits (spaces allowed).";
        header("Location: apply.php");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
        header("Location: apply.php");
        exit();
    }

    // Validate date of birth (e.g., ensure the user is at least 15 years old and not older than 80)
    $dob = new DateTime($date_of_birth);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    if ($age < 15 || $age > 80) {
        $_SESSION['error'] = "Age must be between 15 and 80 years.";
        header("Location: apply.php");
        exit();
    }

    // Prepare the INSERT query using a prepared statement
    $query = "INSERT INTO eoi (user_id, job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone, skill1, other_skills, evaluation, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $query);
    if (!$stmt) {
        error_log("Prepare failed in process_eoi: " . mysqli_error($conn));
        $_SESSION['error'] = "An error occurred while preparing the query. Please try again later.";
        header("Location: apply.php");
        exit();
    }

    // Bind parameters (i for integer, s for string)
    mysqli_stmt_bind_param($stmt, "isssssssssssssss", 
        $user_id, 
        $job_reference, 
        $first_name, 
        $last_name, 
        $date_of_birth, 
        $gender, 
        $street_address, 
        $suburb, 
        $state, 
        $postcode, 
        $email, 
        $phone, 
        $skill_list, 
        $other_skills, 
        $user_message, 
        $status
    );

    // Execute the query
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Successfully submitted job application.";
        header("Location: index.php");
    } else {
        error_log("Query execution failed in process_eoi: " . mysqli_stmt_error($stmt));
        $_SESSION['error'] = "Something went wrong with the submission. Please try again.";
        header("Location: apply.php");
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['error'] = "Invalid request method. Please use the form to submit.";
    header("Location: apply.php");
}

// Close database connection
mysqli_close($conn);
?>