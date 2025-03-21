<?php

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once('settings.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet">
    <link href = "styles/responsive.css" rel = "stylesheet" >
    <title>Apply Position</title>
    <link href="styles/apply.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/menu.css">
    <link href = "styles/footer.css" rel = "stylesheet" />
</head>

<body>
<?php 
    include 'header.inc'; 
    include 'menu.inc';
?>
<div class = "form-container">

    <form action="process_eoi.php" method="POST" class="apply_form" novalidate>
        <h2>Registration Form</h2>
        <div>
            <label for="job_reference">Job Application: </label>
            <input type="text" placeholder="J0000" id="job_reference" name="job_reference" maxlength="5" required>
        </div>

        <div>
            <label for="first_name">First Name:</label>
            <input type="text" placeholder="Nguyen Van A" id="first_name" name="first_name" maxlength="20" required>
        </div>

        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" placeholder="Nhập họ của bạn" id="last_name" name="last_name" maxlength="20" required>
        </div>

        <div id="dob-div">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div>
            <label for="street_address">Street Address:</label>
            <input type="text" placeholder="Quận/Huyện/Xã" id="street_address" name="street_address" maxlength="40" required>
        </div>
        <div>
            <label for="suburb">Suburb:</label>
            <input type="text" placeholder="Quận/Huyện/Xã" id="suburb" name="suburb" maxlength="40" required>
        </div>

        <div>
            <label for="state">State:</label>
            <select id="state" name="state" required>
                <option value="">Select State</option>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>
        </div>

        <div>
            <label for="postcode">Postcode:</label>
            <input type="text" id="postcode" name="postcode" pattern="\d{4}" maxlength="4" title="Postcode must be exactly 4 digits" placeholder="Mã bưu chính" required>
        </div>

        <div>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
        </div>
        <div>
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" pattern="[\d\s]{8,12}" title="Enter a valid phone number with 8 to 12 digits, spaces allowed." placeholder="Số điện thoại" required>
        </div>

        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <div>
            <label for="SkillList">Skill List:</label>
            <input type="text" id="SkillList" name="SkillList" required>
        </div>

        <div>
            <label for="other_skills">Other Skill:</label>
            <input type="text" id="other_skills" name="other_skills" required>
        </div>

        <div class="Message-div">
            <label for="UserMessage">Your Message:</label>
            <textarea name="UserMessage" id="UserMessage" rows="4"></textarea>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</div>
<?php   
    include 'footer.inc'
?>
</body>
</html>


