<<<<<<< HEAD
<?php
    include 'menu.inc';
    

    // Visitors text file
    $file = "visitor_counter.txt";
    if (file_exists($file)) {
        $count = (int)file_get_contents($file);
    } else {
        $count = 0;
    }
    $count++;
    file_put_contents($file, $count);
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
    <section class="about-section group-info">
        <div class="group-info-title">
            <h2>Group Information</h2>
        </div>

        <div class="group-info-content"> <!-- Make this the flex container -->
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

    <div class="container-group">
        <h2>Group Profile</h2>
        
        <div class="member">
            <img src="styles/images/nhat.jpg" alt="Nguyen Minh Nhat">
            <div class="info">
                <h3>Nguyen Minh Nhat</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> Bao Loc</p>
                <p><strong>Programming Skills:</strong> Python, Java, HTML, CSS, C#, C++</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Coding, Gaming</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/phuc.jpg" alt="Dinh Hoang Phuc">
            <div class="info">
                <h3>Dinh Hoang Phuc</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> JavaScript, HTML</p>
                <p><strong>Work Experience:</strong> 1 year</p>
                <p><strong>Interests:</strong> Music, Traveling</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/cuong_cung.jpg" alt="Cung Duy Cuong">
            <div class="info">
                <h3>Cung Duy Cuong</h3>
                <p><strong>StudentID:</strong> 105727906</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> C++, SQL</p>
                <p><strong>Work Experience:</strong> 3 fyears</p>
                <p><strong>Interests:</strong> Reading, Sports</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/pahan.jpg" alt="Pahan Pathirathna">
            <div class="info">
                <h3>Pahan Pathirathna</h3>
                <p><strong>StudentID:</strong> 104657523</p>
                <p><strong>Age:</strong> 22</p>
                <p><strong>Hometown:</strong> Sri Lanka</p>
                <p><strong>Programming Skills:</strong> React, Node.js</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Tech, Movies</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/minh_truong.jpg" alt="Minh Truong">
            <div class="info">
                <h3>Minh Truong</h3>
                <p><strong>StudentID:</strong> 103845039</p>
                <p><strong>Age:</strong> 25</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> Python, AI</p>
                <p><strong>Work Experience:</strong> 4 years</p>
                <p><strong>Interests:</strong> AI, Writing</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>
    </div>

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
            <!-- Project 1 -->
            <tr class="project-1">
                <td rowspan="3" class="project-label">Project 1</td>
                <td>12/02/2025</td>
                <td>Wednesday</td>
                <td>10:00 AM - 12:00 PM</td>
                <td><span class="activity-tooltip" title="Kick-off meeting to introduce team and plan tasks.">Group Meeting</span></td>
            </tr>
            <tr class="project-1">
                <td>21/02/2025</td>
                <td>Friday</td>
                <td>2:00 PM - 4:00 PM</td>
                <td><span class="activity-tooltip" title="Collaborative session to brainstorm project ideas and layout.">Brainstorming Session</span></td>
            </tr>
            <tr class="project-1">
                <td>23/02/2025</td>
                <td>Sunday</td>
                <td>6:00 PM - 8:00 PM</td>
                <td><span class="activity-tooltip" title="Hands-on coding and layout implementation session.">Development Session</span></td>
            </tr>

            <!-- Project 2 -->
            <tr class="project-2">
                <td rowspan="3" class="project-label">Project 2</td>
                <td>19/03/2025</td>
                <td>Wednesday</td>
                <td>10:00 AM - 12:00 PM</td>
                <td><span class="activity-tooltip" title="Reviewed Project 1 outcomes, identified areas to improve for Project 2.">Group Review</span></td>
            </tr>
            <tr class="project-2">
                <td>28/03/2025</td>
                <td>Friday</td>
                <td>2:00 PM - 4:00 PM</td>
                <td><span class="activity-tooltip" title="Assigned roles and discussed how to implement new PHP and database features.">Implementation Discussion</span></td>
            </tr>
            <tr class="project-2">
                <td>30/03/2025</td>
                <td>Sunday</td>
                <td>6:00 PM - 8:00 PM</td>
                <td><span class="activity-tooltip" title="Practiced presenting, polished the interface, ensured accessibility and demo readiness.">Final Presentation Prep</span></td>
            </tr>
        </tbody>
    </table>
    </section>

    <section class="about-section">
        <h2>Contact Us</h2>
        <p>For any inquiries, reach out via email:</p><br>
        <a href="mailto:105680164@student.swin.edu.au" class="btn">Email Us</a>
    </section>

<!-- Existing "More About Us" Section -->
<section class="about-section">
        <h2>More About Us</h2>
        <h3>Programming Skills</h3>
        <p>Our team is skilled in HTML and CSS.</p>
        <h3>Geographic Context</h3>
        <p>We come from diverse communities in Ho Chi Minh City and globally, each contributing a unique perspective to the project.</p>
    </section>

    <!-- Expanded "Our Mission and Benefits" Section -->
    <section class="about-section">
        <h2>Our Mission and Benefits</h2>
        <h3>Our Mission</h3>
        <p>We Are One - Swinburne University is more than just a student group; it’s a collective of ambitious, tech-savvy individuals united by a shared vision to innovate and excel in the world of programming and development. Under the guidance of our dedicated tutor, Mr. Trung Nguyen, we strive to harness our diverse skill sets—ranging from Python and Java to React and AI—to create projects that reflect technical mastery and real-world relevance. Our mission is to cultivate a collaborative environment where students from Ho Chi Minh City, Sri Lanka, and beyond can merge their unique backgrounds and talents into something extraordinary. Whether it’s coding a sleek website, brainstorming solutions during our Friday 2:00 PM - 4:00 PM sessions, or pushing the boundaries of artificial intelligence in our Sunday development meetings, we aim to inspire each other, elevate our craft, and contribute meaningful solutions to both our university community and the global tech ecosystem. We Are One is about building bridges—between ideas, cultures, and technologies—and leaving a legacy of innovation at Swinburne University.</p>
        
        <h3>Benefits of Joining Us</h3>
        <p>Joining We Are One - Swinburne University is an opportunity to step into a dynamic, supportive, and forward-thinking team. Here’s a deeper look at what you’ll gain by becoming part of our group:</p><br>
        <ul class="benefits-list">
            <li>
                <strong>Diverse Skill Enhancement:</strong> Dive into a rich learning experience with a team proficient in Python, Java, HTML, CSS, C++, JavaScript, SQL, React, Node.js, and AI. Whether you’re a beginner looking to master the basics or an experienced coder eager to refine your expertise, our Wednesday 10:00 AM - 12:00 PM group meetings offer a space to grow alongside peers who bring years of collective experience to the table.<br><br>
            </li>
            <li>
                <strong>Global Networking:</strong> Connect with a multicultural team hailing from Bao Loc, Ho Chi Minh City, and Sri Lanka. Our members—Nguyen Minh Nhat, Dinh Hoang Phuc, Cung Duy Cuong, Pahan Pathirathna, and Minh Truong—each offer unique insights and professional networks, opening doors to friendships and collaborations that span continents and industries.<br><br>
            </li>
            <li>
                <strong>Creative Project Opportunities:</strong> Participate in hands-on projects that let your imagination soar. From designing interactive websites with HTML and CSS to exploring AI-driven applications or coding robust systems in C++, our brainstorming and development sessions (Fridays 2:00 PM - 4:00 PM and Sundays 6:00 PM - 8:00 PM) are your playground to innovate and experiment.<br><br>
            </li>
            <li>
                <strong>Supportive Learning Community:</strong> Join a group that thrives on teamwork and encouragement. With members boasting 1 to 4 years of work experience and a passion for coding, gaming, music, sports, and more, you’ll find mentors and peers ready to share knowledge and tackle challenges together, guided by Mr. Trung Nguyen’s expertise.<br><br>
            </li>
            <li>
                <strong>Impactful Contributions:</strong> Work on projects that resonate beyond the classroom. Whether it’s building tools for Swinburne University or creating solutions inspired by our diverse hometowns, your efforts with We Are One will have a tangible impact, showcasing your skills to potential employers and the wider tech community.<br><br>
            </li>
            <li>
                <strong>Personalized Mentorship:</strong> Benefit from the wisdom of our tutor, Mr. Trung Nguyen, and senior members like Minh Truong (with 4 years of experience) and Cung Duy Cuong (with 3 years). Their guidance ensures you’re not just learning but excelling in areas like AI, SQL, and web development.<br><br>
            </li>
            <li>
                <strong>Structured Yet Flexible Engagement:</strong> Fit growth into your schedule with our well-planned timetable—group meetings on Wednesdays, brainstorming on Fridays, and development on Sundays. Whether you’re 19 like Nhat, Phuc, and Cuong, or 25 like Pahan and Minh, there’s a place for you to contribute and shine at your own pace.<br><br>
            </li>
        </ul>
        <p>Ready to join a team where diversity fuels creativity, and collaboration drives success? We Are One - Swinburne University is your chance to grow, connect, and make a difference. Take the first step today!</p><br>
        <a href="apply.php" class="btn">Join Us Now</a>
    </section>

    <section class="about-section date-stats">
        <?php
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            echo "📅 Today is <strong>" . date("l, d F Y - h:i A") . "</strong><br>";
            echo "👁️ This page has been viewed <strong>$count</strong> times.";
        ?>
    </section>

</main>
<?php   
    include 'footer.inc';
?>
</body>
=======
<?php
    include 'menu.inc';
    include 'settings.php';
    


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About US | WE</title>

    <link rel="stylesheet" href="styles/footer.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f5f5;
            color: #333;
            line-height: 1.8;
            overflow-x: hidden;
        }

        #main_about {
            max-width: 1400px;
            margin: 60px auto;
            padding: 0 20px;
        }

        /* Headings */
        h2 {
            text-align: center;
            color: #1a1a1a;
            font-size: 42px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 40px;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: #ff6200;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        h2:hover::after {
            width: 120px;
        }

        h3 {
            color: #1a1a1a;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Super Outstanding Button Styling */
        .btn {
            display: inline-block;
            padding: 15px 40px;
            background: #ff6200;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
            border-radius: 50px;
            border: 3px solid #ff6200;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            z-index: 1;
        }

        /* Background Sweep Animation */
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: #fff;
            transition: left 0.4s ease;
            z-index: -1;
        }

        .btn:hover::before {
            left: 0;
        }

        /* Ripple Burst Effect */
        .btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.5s ease, height 0.5s ease;
            z-index: -1;
        }

        .btn:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Hover Effects */
        .btn:hover {
            color: #ff6200;
            transform: scale(1.15) rotate(5deg);
            box-shadow: 0 15px 30px rgba(255, 98, 0, 0.5);
        }

        /* Click Effect */
        .btn:active {
            transform: scale(0.9) rotate(-5deg);
            box-shadow: 0 5px 15px rgba(255, 98, 0, 0.3);
            transition: all 0.1s ease;
        }

        /* Idle Bounce Animation */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .btn {
            animation: bounce 1.5s infinite ease-in-out;
        }

        /* About Sections */
        .about-section {
            background: #fff;
            padding: 40px;
            margin-bottom: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 0.6s ease-out;
        }

        .about-section:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        dt {
            font-size: 24px;
            font-weight: 600;
            color: #ff6200;
            margin-bottom: 5px;
        }

        dd {
            font-size: 18px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Group Profile Container */
        .container-group {
            width: 100%;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }

        .member {
            display: flex;
            align-items: center;
            background: #fafafa;
            margin: 20px 0;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-left: 4px solid #ff6200;
        }

        .member:hover {
            transform: translateX(10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-right: 25px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .member:hover img {
            transform: scale(1.1);
        }

        .info {
            flex: 1;
        }

        .info p {
            margin: 5px 0;
            color: #666;
            font-size: 16px;
        }

        .info p strong {
            color: #ff6200;
            font-weight: 600;
        }

        .member-btn {
            margin-top: 15px;
        }

        /* Timetable */
        .timetable-employee {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .timetable-employee th, .timetable-employee td {
            padding: 15px;
            text-align: center;
        }

        .timetable-employee th {
            background: #ff6200;
            font-weight: 600;
            text-transform: uppercase;
            color: #fff;
        }

        .timetable-employee td {
            background: #fafafa;
            color: #333;
            transition: background 0.3s ease;
        }

        .timetable-employee tr:hover td {
            background: #f0f0f0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .member {
                flex-direction: column;
                text-align: center;
                padding: 20px;
            }

            .member img {
                margin: 0 auto 20px;
                width: 100px;
                height: 100px;
            }

            h2 {
                font-size: 32px;
            }

            .container-group, .about-section {
                padding: 25px;
            }

            .btn {
                padding: 12px 30px;
                font-size: 16px;
            }
            /* Benefits List Styling */
.benefits-list {
    list-style: none;
    margin: 25px 0;
    padding-left: 0;
}

.benefits-list li {
    font-size: 18px;
    color: #555;
    margin-bottom: 25px;
    padding: 20px;
    background: #fafafa;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    border-left: 4px solid #ff6200;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.benefits-list li:hover {
    transform: translateX(10px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.benefits-list li strong {
    color: #ff6200;
    font-weight: 600;
}
        }
    </style>
</head>
<body>
<main id="main_about">
    <section class="about-section">
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
            <img src="styles/images/nhat.jpg" alt="Nguyen Minh Nhat">
            <div class="info">
                <h3>Nguyen Minh Nhat</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> Bao Loc</p>
                <p><strong>Programming Skills:</strong> Python, Java, HTML, CSS, C#, C++</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Coding, Gaming</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/phuc.jpg" alt="Dinh Hoang Phuc">
            <div class="info">
                <h3>Dinh Hoang Phuc</h3>
                <p><strong>StudentID:</strong> 105680164</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> JavaScript, HTML</p>
                <p><strong>Work Experience:</strong> 1 year</p>
                <p><strong>Interests:</strong> Music, Traveling</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/cuong_cung.jpg" alt="Cung Duy Cuong">
            <div class="info">
                <h3>Cung Duy Cuong</h3>
                <p><strong>StudentID:</strong> 105727906</p>
                <p><strong>Age:</strong> 19</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> C++, SQL</p>
                <p><strong>Work Experience:</strong> 3 years</p>
                <p><strong>Interests:</strong> Reading, Sports</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/pahan.jpg" alt="Pahan Pathirathna">
            <div class="info">
                <h3>Pahan Pathirathna</h3>
                <p><strong>StudentID:</strong> 104657523</p>
                <p><strong>Age:</strong> 25</p>
                <p><strong>Hometown:</strong> Sri Lanka</p>
                <p><strong>Programming Skills:</strong> React, Node.js</p>
                <p><strong>Work Experience:</strong> 2 years</p>
                <p><strong>Interests:</strong> Tech, Movies</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>

        <div class="member">
            <img src="styles/images/minh_truong.jpg" alt="Minh Truong">
            <div class="info">
                <h3>Minh Truong</h3>
                <p><strong>StudentID:</strong> 103845039</p>
                <p><strong>Age:</strong> 25</p>
                <p><strong>Hometown:</strong> HCMC</p>
                <p><strong>Programming Skills:</strong> Python, AI</p>
                <p><strong>Work Experience:</strong> 4 years</p>
                <p><strong>Interests:</strong> AI, Writing</p>
                <a href="#" class="btn member-btn">Learn More</a>
            </div>
        </div>
    </div>

    <section class="about-section" id="div-timetable-employee">
        <h2>Timetable</h2>
        <table class="timetable-employee">
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

    <section class="about-section">
        <h2>Contact Us</h2>
        <p>For any inquiries, reach out via email:</p>
        <a href="mailto:105680164@student.swin.edu.au" class="btn">Email Us</a>
    </section>

<!-- Existing "More About Us" Section -->
<section class="about-section">
        <h2>More About Us</h2>
        <h3>Programming Skills</h3>
        <p>Our team is skilled in HTML and CSS.</p>
        <h3>Geographic Context</h3>
        <p>We come from diverse communities in Ho Chi Minh City and globally, each contributing a unique perspective to the project.</p>
    </section>

    <!-- Expanded "Our Mission and Benefits" Section -->
    <section class="about-section">
        <h2>Our Mission and Benefits</h2>
        <h3>Our Mission</h3>
        <p>We Are One - Swinburne University is more than just a student group; it’s a collective of ambitious, tech-savvy individuals united by a shared vision to innovate and excel in the world of programming and development. Under the guidance of our dedicated tutor, Mr. Trung Nguyen, we strive to harness our diverse skill sets—ranging from Python and Java to React and AI—to create projects that reflect technical mastery and real-world relevance. Our mission is to cultivate a collaborative environment where students from Ho Chi Minh City, Sri Lanka, and beyond can merge their unique backgrounds and talents into something extraordinary. Whether it’s coding a sleek website, brainstorming solutions during our Friday 2:00 PM - 4:00 PM sessions, or pushing the boundaries of artificial intelligence in our Sunday development meetings, we aim to inspire each other, elevate our craft, and contribute meaningful solutions to both our university community and the global tech ecosystem. We Are One is about building bridges—between ideas, cultures, and technologies—and leaving a legacy of innovation at Swinburne University.</p>
        
        <h3>Benefits of Joining Us</h3>
        <p>Joining We Are One - Swinburne University is an opportunity to step into a dynamic, supportive, and forward-thinking team. Here’s a deeper look at what you’ll gain by becoming part of our group:</p>
        <ul class="benefits-list">
            <li>
                <strong>Diverse Skill Enhancement:</strong> Dive into a rich learning experience with a team proficient in Python, Java, HTML, CSS, C++, JavaScript, SQL, React, Node.js, and AI. Whether you’re a beginner looking to master the basics or an experienced coder eager to refine your expertise, our Wednesday 10:00 AM - 12:00 PM group meetings offer a space to grow alongside peers who bring years of collective experience to the table.
            </li>
            <li>
                <strong>Global Networking:</strong> Connect with a multicultural team hailing from Bao Loc, Ho Chi Minh City, and Sri Lanka. Our members—Nguyen Minh Nhat, Dinh Hoang Phuc, Cung Duy Cuong, Pahan Pathirathna, and Minh Truong—each offer unique insights and professional networks, opening doors to friendships and collaborations that span continents and industries.
            </li>
            <li>
                <strong>Creative Project Opportunities:</strong> Participate in hands-on projects that let your imagination soar. From designing interactive websites with HTML and CSS to exploring AI-driven applications or coding robust systems in C++, our brainstorming and development sessions (Fridays 2:00 PM - 4:00 PM and Sundays 6:00 PM - 8:00 PM) are your playground to innovate and experiment.
            </li>
            <li>
                <strong>Supportive Learning Community:</strong> Join a group that thrives on teamwork and encouragement. With members boasting 1 to 4 years of work experience and a passion for coding, gaming, music, sports, and more, you’ll find mentors and peers ready to share knowledge and tackle challenges together, guided by Mr. Trung Nguyen’s expertise.
            </li>
            <li>
                <strong>Impactful Contributions:</strong> Work on projects that resonate beyond the classroom. Whether it’s building tools for Swinburne University or creating solutions inspired by our diverse hometowns, your efforts with We Are One will have a tangible impact, showcasing your skills to potential employers and the wider tech community.
            </li>
            <li>
                <strong>Personalized Mentorship:</strong> Benefit from the wisdom of our tutor, Mr. Trung Nguyen, and senior members like Minh Truong (with 4 years of experience) and Cung Duy Cuong (with 3 years). Their guidance ensures you’re not just learning but excelling in areas like AI, SQL, and web development.
            </li>
            <li>
                <strong>Structured Yet Flexible Engagement:</strong> Fit growth into your schedule with our well-planned timetable—group meetings on Wednesdays, brainstorming on Fridays, and development on Sundays. Whether you’re 19 like Nhat, Phuc, and Cuong, or 25 like Pahan and Minh, there’s a place for you to contribute and shine at your own pace.
            </li>
        </ul>
        <p>Ready to join a team where diversity fuels creativity, and collaboration drives success? We Are One - Swinburne University is your chance to grow, connect, and make a difference. Take the first step today!</p>
        <a href="apply.php" class="btn">Join Us Now</a>
    </section>

</main>
<?php   
    include 'footer.inc';
?>
</body>
</html>
</main>
<?php   
    include 'footer.inc';
?>
</body>
>>>>>>> 67d5cfcd2ae9fe148b9d721ee1756b189e7436e5
</html>