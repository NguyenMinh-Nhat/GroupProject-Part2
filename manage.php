
<?php // authorize user
// Start session
session_start();

// Include database settings (assuming this connects to the database)
require_once('settings.php');

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
  // If not logged in, redirect to login page
  header("Location: phpenhancement.php");
  exit();

} 


// Check if the username is admin
if ($_SESSION["username"] !== "admin") {
  // If not admin, deny access and redirect to index.php
  echo "You are not authorized to access this page.";
  header("Location: index.php");
  exit();

}   

// If we reach here, the user is admin, so render the page

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager Dashboard - VNG Corporation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/manage.css">
    <link rel="stylesheet" href="styles/menu.css">
</head>
<body>
    <!-- Subtle Wave Background -->
    <div class="wave-bg"></div>
    
    <?php include 'menu.inc'; ?>

    <div class="hero">
        <h1>Welcome to HR Manager Dashboard</h1>





    








    </div>

    <div class="container">
        <h2>Search EOI Records</h2>

        <!-- Search Form -->
        <form id="search-form" action="manage.php" method="POST">
            <div class="search-form">
                <div class="form-group">
                    <label for="eoinum">EOI Number:</label>
                    <input type="text" name="eoinum" id="eoinum" placeholder="Enter EOI Number">
                </div>
                <div class="form-group">
                    <label for="job_reference">Job Reference:</label>
                    <input type="text" name="job_reference" id="job_reference" placeholder="Enter Job Reference">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" id="first_name" placeholder="Enter First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender">
                        <option value="">Any</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <select name="state" id="state">
                        <option value="">Any</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="">Any</option>
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label> </label>
                    <input type="submit" value="Search Now">
                </div>
            </div>
        </form>

<?php
    require_once 'settings.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Start building the SQL query
    $sql = "SELECT * FROM eoi WHERE 1=1"; // Base query, "1=1" simplifies adding conditions
    $conditions = [];

    // Add conditions for each field if provided
    if (!empty($_POST["eoinum"])) {
      $eoinum = mysqli_real_escape_string($conn, $_POST["eoinum"]);
      $conditions[] = "eoinum = '$eoinum'"; // Exact match for numeric ID
    }

    if (!empty($_POST["job_reference"])) {
      $job_reference = mysqli_real_escape_string($conn, $_POST["job_reference"]);
      $conditions[] = "job_reference LIKE '%$job_reference%'"; // Partial match
    }

    if (!empty($_POST["first_name"])) {
      $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
      $conditions[] = "first_name LIKE '%$first_name%'"; // Partial match
    }

    if (!empty($_POST["last_name"])) {
      $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
      $conditions[] = "last_name LIKE '%$last_name%'"; // Partial match
    }

    if (!empty($_POST["gender"])) {
      $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
      $conditions[] = "gender = '$gender'"; // Exact match for enum
    }

    if (!empty($_POST["state"])) {
      $state = mysqli_real_escape_string($conn, $_POST["state"]);
      $conditions[] = "state = '$state'"; // Exact match for enum
    }

    if (!empty($_POST["status"])) {
      $status = mysqli_real_escape_string($conn, $_POST["status"]);
      $conditions[] = "status = '$status'"; // Exact match for enum
    }

    if (!empty($_POST["email"])) {
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $conditions[] = "email LIKE '%$email%'"; // Partial match
    }

    if (!empty($_POST["phone"])) {
      $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
      $conditions[] = "phone LIKE '%$phone%'"; // Partial match
    }

    // Add conditions to the query if any exist
    if (!empty($conditions)) {
      $sql .= " AND " . implode(" AND ", $conditions);
    }

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
      echo "<h3>Search Results:</h3>";
      echo "<table>";
      echo "<tr>
              <th>EOI Number</th>
              <th>Job Reference</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Gender</th>
              <th>State</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status</th>
            </tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["eoinum"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["job_reference"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["gender"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["state"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["phone"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "<p>No results found.</p>";
    }

    // Clean up
    mysqli_free_result($result);
    mysqli_close($conn);
}
  ?>













        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <!-- Sample Table (Placeholder for Data) -->
