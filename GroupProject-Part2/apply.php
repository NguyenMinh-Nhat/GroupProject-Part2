<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/styles.css" rel="stylesheet">
    <link href = "styles/responsive.css" rel = "stylesheet" >
    <title>Apply Position</title>
</head>

<body>
    <header class="container">
        <div id="logo_text">
            <h1 id="logo">VNG Games</h1>
            <img src="styles/images/vng.jpg" class="vngimage" alt="VNG Games Logo">
        </div>
        
    </header>

    <nav id="nav_apply">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="job.html">Career</a></li>
            <li><a href="apply.html">Apply</a></li>
        </ul>
    </nav>
<div class = "form-container">
    <img src="styles/images/vngbg.jpg" class="vngbg" alt="VNG Games Background">

    <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="POST" class="apply_form">
        <h2>Registration Form</h2>

        <div>
            <label for="FirstName">First Name:</label>
            <input type="text" placeholder="Nguyen Van A" id="FirstName" name="FirstName" maxlength="20" required>
        </div>

        <div>
            <label for="LastName">Last Name:</label>
            <input type="text" placeholder="Nhập họ của bạn" id="LastName" name="LastName" maxlength="20" required>
        </div>

        <div id="dob-div">
            <label for="DateOfBirth">Date of Birth:</label>
            <input type="date" id="DateOfBirth" name="DateOfBirth" required>
        </div>

        <div>
            <label for="Suburb">Suburb:</label>
            <input type="text" placeholder="Quận/Huyện/Xã" id="Suburb" name="Suburb" maxlength="40" required>
        </div>

        <div>
            <label for="State">State:</label>
            <select id="State" name="State" required>
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
            <label for="Postcode">Postcode:</label>
            <input type="text" id="Postcode" name="Postcode" pattern="\d{4}" maxlength="4" title="Postcode must be exactly 4 digits" placeholder="Mã bưu chính" required>
        </div>

        <div>
            <label for="Email">Email Address:</label>
            <input type="email" id="Email" name="Email" placeholder="Nhập email của bạn" required>
        </div>

        <div>
            <label for="PhoneNumber">Phone Number:</label>
            <input type="text" id="PhoneNumber" name="PhoneNumber" pattern="[\d\s]{8,12}" title="Enter a valid phone number with 8 to 12 digits, spaces allowed." placeholder="Số điện thoại" required>
        </div>

        <div>
            <label for="Gender">Gender:</label>
            <select id="Gender" name="Gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label for="SkillList">Skill List:</label>
            <input type="text" id="SkillList" name="SkillList" required>
        </div>

        <div>
            <label for="OtherSkill">Other Skill:</label>
            <input type="text" id="OtherSkill" name="OtherSkill" required>
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
    <footer id="footer_apply">
        <p>&copy; 2025 My Homepage. All rights reserved.</p>
    </footer>
</body>
</html>
