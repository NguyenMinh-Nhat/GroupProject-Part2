<?php
require_once "settings.php";
session_start();
// Connect to MySQL
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("<p class='wrong'>Unable to connect to the database: " . mysqli_connect_error() . "</p>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    // Sanitize inputs once
    $job_title              = trim($_POST['job_title']);
    $job_code               = trim($_POST['job_code']);
    $description            = trim($_POST['description']);
    $responsibilities       = trim($_POST['responsibilities']);
    $essential_requirements = trim($_POST['essential_requirements']);
    $preferred_skills       = trim($_POST['preferred_skills']);
    $average_salary         = trim($_POST['average_salary']);
    $reports_to             = trim($_POST['reports_to']);

    // Build query string
    $query = "INSERT INTO `jobs`(`job_title`, `job_code`, `description`, `responsibilities`, `essential_requirements`, `preferred_skills`, `average_salary`, `reports_to`) VALUES ('$job_title','$job_code','$description','$responsibilities','$essential_requirements','$preferred_skills','$average_salary','$reports_to')";

    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p class='wrong'>Something is wrong with the query: " . $query . "</p>";
    } else {
        echo "<p class='ok'>Successfully sent job</p>";
    }
    mysqli_close($conn);
}
?>