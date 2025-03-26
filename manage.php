<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start output buffering to prevent header issues
ob_start();

// Start session only if it hasn't been started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include settings.php to define database credentials
require_once('settings.php');

// Kiểm tra xem người dùng đã đăng nhập chưa và có phải admin không
if (!isset($_SESSION['username']) || $_SESSION['username'] !== "admin") {
    header("Location: phpenhancement.php");
    exit();
}

// Initialize database connection
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

// Handle delete records
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_form'])) {
    if (isset($_POST['eoinum'])) {
        $eoinum = filter_input(INPUT_POST, 'eoinum', FILTER_VALIDATE_INT);
        if ($eoinum !== false) {
            // Delete the record from the database
            $delete_sql = "DELETE FROM eoi WHERE eoinum = $eoinum";
            if (mysqli_query($conn, $delete_sql)) {
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<p class='success'>Record deleted successfully!</p>";
                    // Optionally, redirect to refresh the page and update the table
                    header("Location: manage.php");
                    exit();
                } else {
                    echo "<p class='error'>No record found with EOI Number $eoinum.</p>";
                }
            } else {
                echo "<p class='error'>Error deleting record: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p class='error'>Invalid EOI Number.</p>";
        }
    } else {
        echo "<p class='error'>EOI Number not provided for deletion.</p>";
    }
}

// Handle evaluation save with detailed debugging
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save_evaluation'])) {
    if (!$conn) {
        echo "<p class='error'>Database connection is not available.</p>";
    } else {
        // Check if eoinum and evaluation are set
        if (isset($_POST['eoinum']) && isset($_POST['evaluation'])) {
            $eoinum = filter_input(INPUT_POST, 'eoinum', FILTER_VALIDATE_INT);
            if ($eoinum === false) {
                echo "<p class='error'>Invalid EOI Number.</p>";
            } else {
                $evaluation = mysqli_real_escape_string($conn, $_POST['evaluation']);
                $update_sql = "UPDATE eoi SET evaluation = '$evaluation' WHERE eoinum = $eoinum";
                if (mysqli_query($conn, $update_sql)) {
                    if (mysqli_affected_rows($conn) > 0) {
                        echo "<p class='success'>Evaluation saved successfully for EOI Number: $eoinum</p>";
                    } else {
                        echo "<p class='error'>No rows updated. Check if EOI Number $eoinum exists.</p>";
                    }
                } else {
                    echo "<p class='error'>Error saving evaluation: " . mysqli_error($conn) . "</p>";
                }
            }
        } else {
            echo "<p class='error'>Error: eoinum or evaluation not set in POST data.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager Dashboard | WE</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        /* Reset default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(180deg, #fff5e6 0%, #ffffff 100%); /* Updated to orange-white gradient */
            min-height: 100vh;
            transition: opacity 0.3s ease;
        }

        /* Hero section */
        .hero {
            background-color: #ff5733;
            color: #fff;
            text-align: center;
            padding: 30px 0;
            margin: 20px 50px;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 36px;
            font-weight: 800;
            text-transform: uppercase;
        }

        /* Container styles */
        .container {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Search form styles */
        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group input[type="submit"] {
            background-color: #ff5733;
            color: #fff;
            border: none;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #e04e2d;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #ff5733;
            color: #fff;
            text-transform: uppercase;
        }

        table td {
            font-size: 14px;
            position: relative;
        }

        table td form {
            display: flex;
            gap: 10px;
        }

        table td select {
            padding: 5px;
            border-radius: 5px;
        }

        table td input[type="submit"],
        table td button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table td input[type="submit"] {
            background-color: #ff5733;
            color: #fff;
        }

        table td button {
            background-color: #333;
            color: #fff;
        }

        /* Tooltip for evaluation */
        table td .evaluation-tooltip {
            position: relative;
        }

        table td .evaluation-tooltip::after {
            content: attr(data-tooltip);
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            background: #ff5733;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            z-index: 10;
        }

        table td .evaluation-tooltip:hover::after {
            opacity: 1;
            visibility: visible;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 600px;
            max-height: 80vh;
            overflow-y: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: scale(0.8);
            opacity: 0;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .modal.show .modal-content {
            transform: scale(1);
            opacity: 1;
        }

        /* Tùy chỉnh giao diện scrollbar */
        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #ff5733;
            border-radius: 10px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #e04e2d;
        }

        .modal-content h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
            color: #aaa;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #000;
        }

        .detail-form-group {
            margin-bottom: 15px;
        }

        .detail-form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 14px;
            color: #333;
        }

        .detail-form-group input,
        .detail-form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .detail-form-group textarea {
            height: 100px;
            resize: vertical;
        }

        .detail-form-group input[readonly] {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .modal-content input[type="submit"],
        .modal-content button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin: 5px;
        }

        .modal-content input[type="submit"] {
            background: #ff5733;
            color: #fff;
        }

        .modal-content input[type="submit"]:hover {
            background: #e04e2d;
            transform: scale(1.05);
        }

        .modal-content button.delete-btn {
            background-color: #ff5733;
            color: #fff;
        }

        .modal-content button.delete-btn:hover {
            background-color: #e04e2d;
            transform: scale(1.05);
        }

        /* Ripple effect on click */
        .modal-content input[type="submit"] .ripple,
        .modal-content button .ripple {
            position: absolute;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            pointer-events: none;
            animation: ripple 0.6s ease-out;
        }

        @keyframes ripple {
            0% {
                width: 0;
                height: 0;
                opacity: 1;
            }
            100% {
                width: 150px;
                height: 150px;
                opacity: 0;
            }
        }

        /* Sparkle effect on click */
        .modal-content input[type="submit"] .sparkle,
        .modal-content button .sparkle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #fff;
            border-radius: 50%;
            pointer-events: none;
            animation: sparkle 0.7s ease-out;
        }

        @keyframes sparkle {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(3);
                opacity: 0;
            }
        }

        /* Shake effect on click */
        .modal-content input[type="submit"].clicked,
        .modal-content button.clicked {
            animation: shake 0.3s ease;
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-3px); }
            50% { transform: translateX(3px); }
            75% { transform: translateX(-3px); }
            100% { transform: translateX(0); }
        }

        /* Success and error messages */
        .success {
            color: green;
            text-align: center;
            margin: 10px 0;
        }

        .error {
            color: red;
            text-align: center;
            margin: 10px 0;
        }

        /* Debug messages */
        .debug {
            color: blue;
            text-align: center;
            margin: 10px 0;
        }

        /* Search results header */
        h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <!-- Include navigation -->
    <?php include 'menu.inc'; ?>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to HR Manager Dashboard</h1>
    </div>

    <!-- Main Content -->
    <div class="container">
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
                    <label> </label>
                    <input type="submit" value="Search Now">
                </div>
            </div>
        </form>

        <!-- Search Results -->
        <?php
        // Display table even if no search is performed (show all records by default)
        if (!$conn) {
            echo "<p class='error'>Database connection is not available.</p>";
        } else {
            $sql = "SELECT * FROM eoi WHERE 1=1";
            $conditions = [];

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['update_status']) && !isset($_POST['save_evaluation']) && !isset($_POST['delete_form'])) {
                if (!empty($_POST["eoinum"])) {
                    $eoinum = filter_input(INPUT_POST, "eoinum", FILTER_VALIDATE_INT);
                    if ($eoinum !== false) {
                        $conditions[] = "eoinum = $eoinum";
                    } else {
                        echo "<p class='error'>Invalid EOI Number.</p>";
                    }
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
            }

            $result = mysqli_query($conn, $sql);

            if (!$result) {
                echo "<p class='error'>Error executing query: " . mysqli_error($conn) . "</p>";
            } else {
                if (mysqli_num_rows($result) > 0) {
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
                            <th>Evaluation</th>
                            <th>Edit Status</th>
                            <th>Details</th>
                          </tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $row_json = htmlspecialchars(json_encode($row, JSON_HEX_APOS | JSON_HEX_QUOT), ENT_QUOTES, 'UTF-8');
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
                        $evaluation = !empty($row["evaluation"]) ? htmlspecialchars($row["evaluation"]) : "No evaluation yet";
                        echo "<td><span class='evaluation-tooltip' data-tooltip='" . $evaluation . "'>" . (strlen($evaluation) > 20 ? substr($evaluation, 0, 20) . "..." : $evaluation) . "</span></td>";
                        echo "<td>";
                        echo "<form method='POST' action='manage.php' style='display:inline;'>";
                        echo "<input type='hidden' name='eoinum' value='" . htmlspecialchars($row["eoinum"]) . "'>";
                        echo "<select name='status'>";
                        echo "<option value='New'" . ($row["status"] == "New" ? " selected" : "") . ">New</option>";
                        echo "<option value='Hired'" . ($row["status"] == "Hired" ? " selected" : "") . ">Hired</option>";
                        echo "<option value='Rejected'" . ($row["status"] == "Rejected" ? " selected" : "") . ">Rejected</option>";
                        echo "</select>";
                        echo "<input type='submit' name='update_status' value='Update'>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<button class='details-btn' data-row='$row_json'>Details</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }
                mysqli_free_result($result);
            }
        }
        // Close the connection at the end of the script
        if ($conn) {
            mysqli_close($conn);
        }
        ?>
    </div>

    <!-- Modal for Applicant Details -->
    <div id="detailsModal" class="modal">
        <div class="modal-content" id="modal-content">
            <span class="close" onclick="closeModal()">×</span>
            <h2>Applicant Details</h2>
            <form id="detailsForm" method="POST" action="manage.php">
                <div class="detail-form-group">
                    <label>EOI Number</label>
                    <input type="text" id="modal_eoinum" name="eoinum" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Job Reference</label>
                    <input type="text" id="modal_job_reference" readonly>
                </div>
                <div class="detail-form-group">
                    <label>First Name</label>
                    <input type="text" id="modal_first_name" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Last Name</label>
                    <input type="text" id="modal_last_name" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Gender</label>
                    <input type="text" id="modal_gender" readonly>
                </div>
                <div class="detail-form-group">
                    <label>State</label>
                    <input type="text" id="modal_state" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Email</label>
                    <input type="text" id="modal_email" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Phone</label>
                    <input type="text" id="modal_phone" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Status</label>
                    <input type="text" id="modal_status" readonly>
                </div>
                <div class="detail-form-group">
                    <label>Evaluation</label>
                    <textarea name="evaluation" id="modal_evaluation" placeholder="Enter evaluation for this applicant"></textarea>
                </div>
                <input type="submit" name="save_evaluation" value="Save Evaluation">
                <!-- Delete button with both client-side and server-side functionality -->
                <button type="submit" name="delete_form" class="delete-btn">Delete</button>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.details-btn').forEach(button => {
            button.addEventListener('click', function() {
                const rowData = this.getAttribute('data-row');
                console.log("Details button clicked, rowData:", rowData);

                try {
                    const data = JSON.parse(rowData);
                    console.log("Parsed data:", data);

                    // Populate modal fields
                    document.getElementById('modal_eoinum').value = data.eoinum || '';
                    document.getElementById('modal_job_reference').value = data.job_reference || '';
                    document.getElementById('modal_first_name').value = data.first_name || '';
                    document.getElementById('modal_last_name').value = data.last_name || '';
                    document.getElementById('modal_gender').value = data.gender || '';
                    document.getElementById('modal_state').value = data.state || '';
                    document.getElementById('modal_email').value = data.email || '';
                    document.getElementById('modal_phone').value = data.phone || '';
                    document.getElementById('modal_status').value = data.status || '';
                    document.getElementById('modal_evaluation').value = data.evaluation || '';

                    // Show the modal with animation
                    const modal = document.getElementById('detailsModal');
                    if (modal) {
                        console.log("Modal found, displaying...");
                        modal.style.display = 'block';
                        setTimeout(() => {
                            modal.classList.add('show');
                        }, 10);
                    } else {
                        console.error("Modal element not found!");
                    }
                } catch (e) {
                    console.error("Error parsing JSON or displaying modal:", e);
                }
            });
        });

        function closeModal() {
            console.log("closeModal called");
            const modal = document.getElementById('detailsModal');
            if (modal) {
                modal.classList.remove('show');
                setTimeout(() => {
                    modal.style.display = 'none';
                }, 300);
            } else {
                console.error("Modal element not found!");
            }
        }

        window.onclick = function(event) {
            const modal = document.getElementById('detailsModal');
            if (event.target == modal) {
                console.log("Clicked outside modal, closing...");
                closeModal();
            }
        }
    </script>
</body>
</html>