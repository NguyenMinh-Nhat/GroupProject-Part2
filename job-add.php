
<?php
require_once "settings.php";
// Connect to MySQL
$conn = @mysqli_connect($host,$user,$pwd,$sql_db);

// Check connection

if ($conn) {
    echo "<p>Connected to the database.</p>";
} else {
    echo "<p>Unable to connect to the database.".mysqli_connect_error() . "</p>" ;
}
// Clean data

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    $job_title = htmlspecialchars($_POST['job_title']);
    $job_code = htmlspecialchars($_POST['job_code']);
    $description = htmlspecialchars($_POST['description']);
    $responsibilities = htmlspecialchars($_POST['responsibilities']);
    $essential_requirements = htmlspecialchars($_POST['essential_requirements']);
    $preferred_skills = htmlspecialchars($_POST['preferred_skills']);
    $additional_info = htmlspecialchars($_POST['additional_info']);
    $average_salary = htmlspecialchars($_POST['average_salary']);
    $reports_to = htmlspecialchars($_POST['reports_to']); 
    $description = htmlspecialchars($_POST['description']);
    $responsibilities = htmlspecialchars($_POST['responsibilities']);
    $essential_requirements = htmlspecialchars($_POST['essential_requirements']);
    $preferred_skills = htmlspecialchars($_POST['preferred_skills']);
    $additional_info = htmlspecialchars($_POST['additional_info']);
    $average_salary = htmlspecialchars($_POST['average_salary']);
    $reports_to = htmlspecialchars($_POST['reports_to']);

        // Ensure required fields are not empty
        if ($conn) {
            // Insert data into the database
            $query = "INSERT INTO jobs (job_title, job_code, description, responsibilities, essential_requirements, preferred_skills, additional_info, average_salary, reports_to) 
                    VALUES ('$job_title', '$job_code', '$description', '$responsibilities', '$essential_requirements', '$preferred_skills', '$additional_info', '$average_salary', '$reports_to')";
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