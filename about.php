<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="styles/styles.css" rel="stylesheet">x`
    <link href="styles/about.css" rel="stylesheet">
    <link href ="styles/responsive.css" rel="stylesheet" >
    
</head>

<body>
<?php 
    include 'header.inc'; 
    include 'menu.inc';
?>
<main id = "main_about">
    <section>
        <h2>Group Information</h2>
        <dl>
            <dt>Group Name:</dt>
            <dd>We Are One - Swinburne University</dd>
            <dt>Group ID:</dt>
            <dd>171657</dd>
            <dt>Tutor’s Name:</dt>
            <dd>Mr. Trung Nguyen</dd>
        </dl>
    </section>


    <div class="container-group">
        <h2>Group Profile</h2>
        
        <div class="member">
            <img src="styles/images/nhat.jpg" alt="Member 1">
            <div class="info">
                <h3>Nguyen Minh Nhat</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> Bao Loc</p>
                <p><strong>Programming Skills:</strong> Python, Java, HTML, Css, C# C++</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Coding, Gaming</p>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/phuc.jpg" alt="Member 2">
            <div class="info">
                <h3>Dinh Hoang Phuc</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> JavaScript, HTML</p>
                <p><strong>Work Experience:</strong> 1 year</p>
                <p><strong>Interests:</strong> Music, Traveling</p>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/cuong_cung.jpg" alt="Member 3">
            <div class="info">
                <h3>Cung Duy Cuong</h3>
                <p><strong>StudentID:</strong> 105727906</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> C++, SQL</p>
                <p><strong>Work Experience:</strong> 3 years</p>
                <p><strong>Interests:</strong> Reading, Sports</p>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/pahan.jpg" alt="Member 4">
            <div class="info">
                <h3>Pahan Pathirathna </h3>
                <p><strong>StudentID:</strong> 104657523</p>
                <p><strong>Age:</strong> 25</p>
                <p><strong>Hometown:</strong> Sri Lanka</p>
                <p><strong>Programming Skills:</strong> React, Node.js</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Tech, Movies</p>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/minh_truong.jpg" alt="Member 5">
            <div class="info">
                <h3>Minh Truong</h3>
                <p><strong>StudentID:</strong> 103845039</p>
                <p><strong>Age:</strong> 25</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> Python, AI</p>
                <p><strong>Work Experience:</strong> 4 years</p>
                <p><strong>Interests:</strong> AI, Writing</p>
            </div>
        </div>
    </div>

    <section id = "div-timetable-employee">
        <h2>Timetable</h2> <!-- Please add the required boader styling-->
        <table class = "timetable-employee">
            <tr>
                <th>Day</th>
                <th>Time</th>
                <th>Activity</th>
            </tr>
            <tr>
                <td>Wednesday</td>
                <td>10:00 AM - 12:00 PM</td>
                <td>Group Meeting</td>
            </tr>
            <tr>
                <td>Friday</td>
                <td>2:00 PM - 4:00 PM</td>
                <td>Brainstorming Session</td>
            </tr>
            <tr>
                <td>Sunday</td>
                <td>6:00 PM - 8:00 PM</td>
                <td>Development Session</td>
            </tr>
        </table>
    </section>

    <section>
        <h2>Contact Us</h2>
        <p>For any inquiries, email us at <a href="105680164@student.swin.edu.au">105680164@student.swin.edu.au</a>.</p> <!--Please add the group email here-->
    </section>

    <section>
        <h2>More About Us</h2>
        <h3>Programming Skills</h3>
        <p>Our team is skilled in HTML and CSS.</p>

        <h3>Geographic Context</h3>
        <p>We come from diverse communities in Ho Chi Minh City and globally, each contributing a unique perspective to the project.</p>
        
    </section>
</main>
<?php   
    include 'footer.inc'
?>
</body>
</html>
