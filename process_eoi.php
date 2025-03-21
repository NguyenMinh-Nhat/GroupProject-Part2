<?php
session_start(); // Start session to check username
require_once "settings.php";

// Connect to database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Check connection
if (!$conn) {
    die("<p>Unable to connect to the database: " . mysqli_connect_error() . "</p>");
}

// Check if the user is logged in
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo "<p class='wrong'>You must log in first</p>";
    header("refresh:5;url=phpenhancement.php"); // Redirect after 5 seconds
    exit();
}

// Check if the request is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check required fields
    $required_fields = ['job_reference', 'first_name', 'last_name', 'date_of_birth', 'gender', 'street_address', 'suburb', 'state', 'postcode', 'email', 'phone'];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            die("<p class='wrong'>All required fields must be filled.</p>");
        }
    }

    // Get form data and sanitize input
    $job_reference  = mysqli_real_escape_string($conn, trim($_POST['job_reference']));
    $first_name     = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    $last_name      = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    $date_of_birth  = mysqli_real_escape_string($conn, trim($_POST['date_of_birth']));
    $gender         = mysqli_real_escape_string($conn, trim($_POST['gender']));
    $street_address = mysqli_real_escape_string($conn, trim($_POST['street_address']));
    $suburb         = mysqli_real_escape_string($conn, trim($_POST['suburb']));
    $state          = mysqli_real_escape_string($conn, trim($_POST['state']));
    $postcode       = mysqli_real_escape_string($conn, trim($_POST['postcode']));
    $email          = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone          = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $other_skills   = isset($_POST['other_skills']) ? mysqli_real_escape_string($conn, trim($_POST['other_skills'])) : "";
    $status         = "New"; // Default status

    // SQL query to insert data
    $query = "INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone, other_skills, status) 
              VALUES ('$job_reference', '$first_name', '$last_name', '$date_of_birth', '$gender', '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone', '$other_skills', '$status')";

    $result = mysqli_query($conn, $query);

    // Check query result
    if ($result) {
        echo "<p class='ok'>Successfully submitted job application</p>";
    } else {
        echo "<p class='wrong'>Something went wrong with the query: " . mysqli_error($conn) . "</p>";
    }

    // Close database connection
    mysqli_close($conn);
}
?>
