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
    }
</style>
<?php
include 'footer.inc';
?>