<?php
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('settings.php');

// Initialize database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION["username"])) {
    header("Location: phpenhancement.php");
    exit();
}

if ($_SESSION["username"] !== "admin") {
    echo "You are not authorized to access this page.";
    header("Location: index.php");
    exit();
}

// Handle status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $eoinum = mysqli_real_escape_string($conn, $_POST['eoinum']);
    $new_status = mysqli_real_escape_string($conn, $_POST['status']);
    $update_sql = "UPDATE eoi SET status = '$new_status' WHERE eoinum = '$eoinum'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<p class='success'>Status updated successfully!</p>";
    } else {
        echo "<p class='error'>Error updating status: " . mysqli_error($conn) . "</p>";
    }
}
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update_status'])) {
            $sql = "SELECT * FROM eoi WHERE 1=1";
            $conditions = [];

            if (!empty($_POST["eoinum"])) {
                $eoinum = mysqli_real_escape_string($conn, $_POST["eoinum"]);
                $conditions[] = "eoinum = '$eoinum'";
            }
            if (!empty($_POST["job_reference"])) {
                $job_reference = mysqli_real_escape_string($conn, $_POST["job_reference"]);
                $conditions[] = "job_reference LIKE '%$job_reference%'";
            }
            if (!empty($_POST["first_name"])) {
                $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
                $conditions[] = "first_name LIKE '%$first_name%'";
            }
            if (!empty($_POST["last_name"])) {
                $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
                $conditions[] = "last_name LIKE '%$last_name%'";
            }
            if (!empty($_POST["gender"])) {
                $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
                $conditions[] = "gender = '$gender'";
            }
            if (!empty($_POST["state"])) {
                $state = mysqli_real_escape_string($conn, $_POST["state"]);
                $conditions[] = "state = '$state'";
            }
            if (!empty($_POST["email"])) {
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $conditions[] = "email LIKE '%$email%'";
            }
            if (!empty($_POST["phone"])) {
                $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
                $conditions[] = "phone LIKE '%$phone%'";
            }

            if (!empty($conditions)) {
                $sql .= " AND " . implode(" AND ", $conditions);
            }

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
                        <th>Edit Status</th>
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
                    echo "<td>";
                    echo "<form method='POST' action='manage.php'>";
                    echo "<input type='hidden' name='eoinum' value='" . htmlspecialchars($row["eoinum"]) . "'>";
                    echo "<select name='status'>";
                    echo "<option value='New'" . ($row["status"] == "New" ? " selected" : "") . ">New</option>";
                    echo "<option value='Hired'" . ($row["status"] == "Hired" ? " selected" : "") . ">Hired</option>";
                    echo "<option value='Rejected'" . ($row["status"] == "Rejected" ? " selected" : "") . ">Rejected</option>";
                    echo "</select>";
                    echo "<input type='submit' name='update_status' value='Update'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }

            mysqli_free_result($result);
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>