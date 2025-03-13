<?php
require_once "settings.php";
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if ($conn) {
    $query = "SELECT * FROM `eoi`";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<table border='1'>";
        echo "<tr><th>User_id</th><th>Job Reference</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Street_address</th><th>Suburb</th><th>State</th><th>Postcode</th><th>Email</th><th>Phone</th><th>Other skills</th><th>Status</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['eoinum'] . "</td>";
            echo "<td>" . $row['job_reference'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['street_address'] . "</td>";
            echo "<td>" . $row['suburb'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['postcode'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['other_skills'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        } 
        echo "</table>";
    }
    else {
        echo "<p>There's no cars to displayed: " . mysqli_error($dbconn) . "</p>";
    }
    mysqli_close($conn);
} else {
    echo "". mysqli_error($dbconn) ."";
}
?>