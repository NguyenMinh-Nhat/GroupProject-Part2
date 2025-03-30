<?php
// Start output buffering to catch any unexpected output
ob_start();

// Start session at the very top
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'menu.inc';
include 'settings.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Welcome to VNG Corporation - Innovating the Future">
    <meta name="keywords" content="VNG, technology, innovation, gaming">
    <meta name="author" content="VNG Corporation">
    <title>Homepage | WE</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="styles/footer.css">
    <script src="scripts/main.js" defer></script>
    
    <style>
        /* Main Section */
        main {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #0d0d0d;
        }

        /* Image Container */
        .image_container {
            position: relative;
            width: 100%;
            height: 100vh;
        }

        .image_banner {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.65) contrast(1.1);
            transition: transform 0.8s ease, filter 0.5s ease;
        }

        .image_container:hover .image_banner {
            transform: scale(1.1);
            filter: brightness(0.85) contrast(1.2);
        }

        /* Gradient Overlay */
        .overlay-gradient {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(254, 254, 254, 0.3), rgba(111, 111, 111, 0.7));
            pointer-events: none;
        }

        /* Text Box */
        .text_box {
            position: absolute;
            top: 50%;
            left: 10%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.75);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            z-index: 2;
            animation: slideIn 1.2s ease-out;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(100px); }
            to { opacity: 1; transform: translateY(-50%); }
        }

        /* Main Title */
        .text_box_1 {
            text-decoration: none;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .title-main {
            color: #ff9500;
            font-size: 60px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 4px 10px rgba(255, 149, 0, 0.5);
            transition: color 0.3s ease;
        }

        .title-sub {
            color: #fff;
            font-size: 28px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .text_box_1:hover .title-main {
            color: #fff;
        }

        /* Arrow Button */
        .icon_arrow {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: #ff9500;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 50px;
            margin-top: 25px;
            transition: all 0.4s ease;
        }

        .arrow-text {
            transition: transform 0.3s ease;
        }

        .arrow-icon {
            font-size: 22px;
        }

        .icon_arrow:hover {
            background: #fff;
            color: #ff9500;
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 149, 0, 0.6);
        }

        .icon_arrow:hover .arrow-text {
            transform: translateX(5px);
        }

        .icon_arrow:active {
            transform: scale(0.95);
        }

        /* Enhancement Button */
        .enhancement-web {
            display: block;
            text-align: center;
            margin-top: 30px;
            padding: 18px 35px;
            background: linear-gradient(90deg, #ff9500, #ff6200);
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(255, 149, 0, 0.4);
        }

        .enhancement-web:hover {
            transform: translateY(-8px) scale(1.05);
            background: linear-gradient(90deg, #ff6200, #ff9500);
            box-shadow: 0 12px 25px rgba(255, 149, 0, 0.6);
        }

        /* About Section */
        .about-section {
            background: #1a1a1a;
            color: #fff;
            padding: 100px 10%;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 149, 0, 0.1) 0%, rgba(26, 26, 26, 0.8) 80%);
            z-index: 0;
        }

        .about-section h2 {
            font-size: 48px;
            font-weight: 900;
            text-transform: uppercase;
            color: #ff9500;
            letter-spacing: 3px;
            margin-bottom: 30px;
            text-shadow: 0 4px 10px rgba(255, 149, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        .about-section h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: #ff9500;
            border-radius: 2px;
            transition: width 0.4s ease;
        }

        .about-section h2:hover::after {
            width: 150px;
        }

        .about-section h3 {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            margin: 50px 0 20px;
            text-shadow: 0 2px 8px rgba(255, 149, 0, 0.3);
            position: relative;
            z-index: 1;
        }

        .about-section p {
            font-size: 18px;
            line-height: 1.8;
            color: #ccc;
            max-width: 900px;
            margin: 0 auto 40px;
            position: relative;
            z-index: 1;
        }

        .about-section .btn {
            display: inline-block;
            padding: 18px 40px;
            background: linear-gradient(90deg, #ff9500, #ff6200);
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(255, 149, 0, 0.4);
            position: relative;
            z-index: 1;
        }

        .about-section .btn:hover {
            transform: translateY(-8px) scale(1.05);
            background: linear-gradient(90deg, #ff6200, #ff9500);
            box-shadow: 0 12px 25px rgba(255, 149, 0, 0.6);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .text_box {
                left: 50%;
                transform: translateX(-50%) translateY(-50%);
                padding: 30px;
                width: 85%;
            }

            .title-main {
                font-size: 40px;
            }

            .title-sub {
                font-size: 20px;
            }

            .icon_arrow, .enhancement-web {
                font-size: 16px;
                padding: 12px 25px;
            }

            .about-section {
                padding: 60px 5%;
            }

            .about-section h2 {
                font-size: 36px;
            }

            .about-section h3 {
                font-size: 24px;
            }

            .about-section p {
                font-size: 16px;
            }

            .about-section .btn {
                padding: 14px 30px;
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
<main>
    <div class="image_container">
        <div class="text_box">
            <a href="https://youtu.be/kQ5BEWV8yno" class="text_box_1" aria-label="VNG Corporation Video">
                <span class="title-main">VNG</span><span class="title-sub">Corporation</span>
            </a>
            <a href="https://youtu.be/kQ5BEWV8yno" class="icon_arrow" aria-label="Watch Video">
                <span class="arrow-text">Discover</span> <span class="arrow-icon">➔</span>
            </a>
            <a href="phpenhancement3.php" class="enhancement-web">Work at VNG</a>
        </div>
        <img src="styles/images/BANNER-01.png" alt="VNG Games Banner" class="image_banner" loading="lazy" />
        <div class="overlay-gradient"></div>
    </div>
</main>

<!-- Expanded About Section -->
<section class="about-section">
    <h2>About VNG Corporation</h2>
    <p>Welcome to VNG Corporation, a trailblazing technology company rooted in Vietnam with a global vision. Since our founding, we’ve grown into a powerhouse of innovation, delivering transformative solutions that span gaming, cloud computing, financial technology, and digital services. Our journey began with a simple yet bold idea: to harness technology to connect people, empower businesses, and enrich lives. Today, we stand as a leader in Southeast Asia’s tech landscape, driven by a relentless pursuit of excellence and a commitment to shaping the future.</p>

    <h3>Our Mission</h3>
    <p>At VNG Corporation, our mission is to create a digital ecosystem where innovation thrives and possibilities are endless. We aim to bridge the gap between imagination and reality by developing cutting-edge products that resonate with millions worldwide. Whether it’s crafting immersive gaming experiences that bring players together, building robust cloud solutions that empower enterprises, or pioneering fintech platforms that redefine financial access, we’re dedicated to making technology a force for good. Our work is guided by a passion for creativity, a focus on user-centric design, and a deep sense of responsibility to our communities.</p>

    <h3>Our Vision</h3>
    <p>We envision a world where technology seamlessly integrates into every aspect of life, enhancing how we play, work, and connect. VNG Corporation aspires to be at the forefront of this transformation, setting global benchmarks in innovation and quality. We see a future where our games inspire joy and camaraderie, our cloud services fuel the next wave of digital businesses, and our fintech solutions make financial empowerment accessible to all. By fostering a culture of bold ideas and continuous learning, we’re building a legacy that extends beyond Vietnam to influence the global tech stage.</p>

    <h3>What We Do</h3>
    <p>VNG Corporation is a multifaceted innovator, excelling across several key domains. In gaming, we’ve created iconic titles that captivate millions, blending stunning visuals with engaging storytelling to redefine entertainment. Our cloud computing division offers scalable, secure solutions that support businesses of all sizes, from startups to multinational corporations, enabling them to thrive in a digital-first world. In fintech, we’re revolutionizing how people manage money with intuitive, secure platforms that simplify payments, investments, and more. Beyond these, we explore new frontiers in AI, data analytics, and digital services, always pushing the envelope to deliver value and impact.</p>

    <h3>Why Join Us</h3>
    <p>Joining VNG Corporation means becoming part of a dynamic, forward-thinking team that values creativity, collaboration, and growth. We offer a workplace where your ideas matter, your skills are honed, and your potential is unleashed. Our employees enjoy opportunities to work on groundbreaking projects, from developing the next big game to designing cloud infrastructure that powers global businesses. We foster a vibrant culture that celebrates diversity, encourages innovation, and rewards excellence. With competitive benefits, a supportive environment, and a chance to shape the future of technology, VNG is where you can build a career that’s as inspiring as it is impactful.</p>

    <a href="job.php" class="btn">Explore Opportunities</a>
</section>

<?php
include 'footer.inc';
?>
</body>
</html>
<?php
// End output buffering and flush
ob_end_flush();
?>