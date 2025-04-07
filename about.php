<?php
    include 'menu.inc'; // navigation menu
    require_once("settings.php"); // connection variables
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About US | WE</title>
    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/about_copy.css">
</head>
<body>
<main id="main_about">
    <!-- Group Infor. Section -->
    <section class="about-section group-info">
        <div class="group-info-title">
            <h2>Group Information</h2>
        </div>
        <div class="group-info-content">
            <div class="info-text">
                <dl>
                    <dt>Group Name:</dt>
                    <dd>We Are One - Swinburne University</dd>
                    <dt>Group ID:</dt>
                    <dd>171657</dd>
                    <dt>Tutor’s Name:</dt>
                    <dd>Mr. Trung Nguyen</dd>
                </dl>
            </div>
            <div class="info-image">
                <img src="styles/images/symbol_about.avif" alt="Symbols" class="group-image">
            </div>
        </div>
    </section>

    <!-- Date and Time PHP Section -->
    <section class="about-section date-stats">
    <?php
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        echo "Our members as of <strong>" . date("l, d F Y - h:i A") . "</strong>";
    ?>
    </section>

    <!-- Group Profiles Section from Database -->
    <div class="container-group">
        <h2>Group Profile</h2>

        <?php
        // Connect to the DB
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p class='error'>Database connection failed.</p>";
        } else {
            $query = "SELECT * FROM members";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="member">';
                    echo '<img src="' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['name']) . '">';
                    echo '<div class="info">';
                    echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                    echo '<p><strong>StudentID:</strong> ' . htmlspecialchars($row['student_id']) . '</p>';
                    echo '<p><strong>Age:</strong> ' . htmlspecialchars($row['age']) . '</p>';
                    echo '<p><strong>Hometown:</strong> ' . htmlspecialchars($row['hometown']) . '</p>';
                    echo '<p><strong>Programming Skills:</strong> ' . htmlspecialchars($row['skills']) . '</p>';
                    echo '<p><strong>Work Experience:</strong> ' . htmlspecialchars($row['experience']) . '</p>';
                    echo '<p><strong>Interests:</strong> ' . htmlspecialchars($row['interests']) . '</p>';
                    echo '<a class="btn member-btn" href="#">Learn More</a>';
                    echo '</div></div>';
                }
                mysqli_free_result($result);
            } else {
                echo "<p>No members found in the database.</p>";
            }
            mysqli_close($conn);
        }
        ?>
    </div>

    <!-- Timetable Section -->
    <section class="about-section" id="div-timetable-employee">
        <h2>Timetable</h2>
        <table class="timetable-employee">
            <thead>
                <tr>
                    <th>Project</th>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Time</th>
                    <th>Activity</th>
                </tr>
            </thead>
            <tbody>
                <!-- Project 1 Events -->
                <tr class="project-1"><td rowspan="3" class="project-label">Project 1</td><td>12/02/2025</td><td>Wednesday</td><td>10:00 AM - 12:00 PM</td><td><span class="activity-tooltip" title="Kick-off meeting to introduce team and plan tasks.">Group Meeting</span></td></tr>
                <tr class="project-1"><td>21/02/2025</td><td>Friday</td><td>2:00 PM - 4:00 PM</td><td><span class="activity-tooltip" title="Brainstorm project ideas.">Brainstorming Session</span></td></tr>
                <tr class="project-1"><td>23/02/2025</td><td>Sunday</td><td>6:00 PM - 8:00 PM</td><td><span class="activity-tooltip" title="Work on layout and code.">Development Session</span></td></tr>
                <!-- Project 2 Events -->
                <tr class="project-2"><td rowspan="3" class="project-label">Project 2</td><td>19/03/2025</td><td>Wednesday</td><td>10:00 AM - 12:00 PM</td><td><span class="activity-tooltip" title="Review outcomes from Project 1.">Group Review</span></td></tr>
                <tr class="project-2"><td>28/03/2025</td><td>Friday</td><td>2:00 PM - 4:00 PM</td><td><span class="activity-tooltip" title="Plan new features using PHP.">Implementation Discussion</span></td></tr>
                <tr class="project-2"><td>30/03/2025</td><td>Sunday</td><td>6:00 PM - 8:00 PM</td><td><span class="activity-tooltip" title="Final polish and practice.">Final Presentation Prep</span></td></tr>
            </tbody>
        </table>
    </section>

    <!-- Contact Us Section -->
    <section class="about-section">
        <h2>Contact Us</h2>
        <p>For any inquiries, reach out via email:</p><br>
        <a href="mailto:105680164@student.swin.edu.au" class="btn">Email Us</a>
    </section>

    <!-- More About Us Section -->
    <section class="about-section">
        <h2>More About Us</h2>
        <h3>Programming Skills</h3>
        <p>Our team is skilled in HTML and CSS.</p>
        <h3>Geographic Context</h3>
        <p>We come from diverse communities in Ho Chi Minh City and globally, each contributing a unique perspective to the project.</p>
    </section>

    <!-- Mission and Benefits Section -->
    <section class="about-section mission-benefits">
  <h2>Our Mission and Benefits</h2>

  <div class="mission-content">
    <h3>Our Mission</h3>
    <p>
      <strong>We Are One - Swinburne University</strong> is a collaborative group of tech-savvy, innovative students. Guided by our tutor, Mr. Trung Nguyen, we combine diverse talents—from programming and artificial intelligence to teamwork and creativity—to develop meaningful, real-world solutions.
    </p>
    <p>
      Through regular meetings and focused development sessions, our mission is to support each other, grow together, and contribute impactful work that bridges ideas, cultures, and technology.
    </p>
  </div>

  <div class="benefits-content">
    <h3>Benefits of Joining Us</h3>
    <ul class="benefits-list">
      <li>
        <strong>Diverse Skill Enhancement:</strong> Learn and grow with peers experienced in Python, Java, HTML, CSS, JavaScript, SQL, React, Node.js, and AI.
      </li>
      <li>
        <strong>Global Collaboration:</strong> Work with a multicultural team from Bao Loc, Ho Chi Minh City, and Sri Lanka—bringing together unique experiences and perspectives.
      </li>
      <li>
        <strong>Hands-On Projects:</strong> Engage in brainstorming and development sessions to build real applications and refine your coding abilities.
      </li>
      <li>
        <strong>Supportive Learning:</strong> Gain knowledge through group work, shared resources, and mentorship from experienced team members and tutors.
      </li>
      <li>
        <strong>Real-World Experience:</strong> Contribute to solutions that go beyond classwork, with the potential to make an impact within and beyond the university.
      </li>
      <li>
        <strong>Flexible Involvement:</strong> Whether you're a beginner or advanced, our team structure allows you to contribute meaningfully at your own pace.
      </li>
    </ul>
<br>
    <div class="cta-join">
      <a href="apply.php" class="btn">Join Us Now</a>
    </div>
  </div>
</section>
</main>

<?php include 'footer.inc'; ?>
</body>
</html>