<?php
require_once "settings.php";
// Connect to MySQL
$conn = @mysqli_connect("$host","$user","$pwd","$sql_db");

// Check connection

if ($conn) {
    echo "<p>Connected to the database.</p>";
} else {
    echo "<p>Unable to connect to the database.".mysqli_connect_error() . "</p>" ;
}
// Clean data

if ($conn) {
    $job_reference  = trim($_POST['job_reference']  );
    $first_name     = trim($_POST['first_name']  );
    $last_name      = trim($_POST['last_name'] );
    $date_of_birth  = trim($_POST['date_of_birth'] );
    $gender         = trim($_POST['gender'] );
    $street_address = trim($_POST['street_address'] );
    $suburb         = trim($_POST['suburb'] );
    $state          = trim($_POST['state'] );
    $postcode       = trim($_POST['postcode'] );
    $email          = trim($_POST['email']);
    $phone          = trim($_POST['phone']);
    $other_skills   = trim($_POST['other_skills']  );
    $status = "New"; // Default value

        // Ensure required fields are not empty
        if (!$job_reference || !$first_name || !$last_name || !$date_of_birth || !$gender || !$street_address || !$suburb || !$state || !$postcode || !$email || !$phone) {
            echo "All required fields must be filled.";
        } else {
            // Insert data into the database
            $query = "INSERT INTO eoi (job_reference, first_name, last_name, date_of_birth, gender, street_address, suburb, state, postcode, email, phone, other_skills, status) 
                    VALUES ('$job_reference', '$first_name', '$last_name', '$date_of_birth', '$gender', '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone', '$other_skills', '$status')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p class='wrong'>Something is wrong with the query: " . htmlspecialchars($query) . "</p>";
            } else {
                echo "<p class='ok'>Successfully sent job</p>";
            }
            mysqli_close($conn);
        }


    // Close connection
    
}
?>