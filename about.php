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

    <section class="about-section">
        <h2>More About Us</h2>
        <h3>Programming Skills</h3>
        <p>Our team is skilled in HTML and CSS.</p>
        <h3>Geographic Context</h3>
        <p>We come from diverse communities in Ho Chi Minh City and globally, each contributing a unique perspective to the project.</p>
    </section>
</main>
<?php   
    include 'footer.inc';
?>
</body>
</html>