<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancements</title>
    
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef1f7;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            background-color: #222;
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        nav {
            text-align: center;
            background-color: #333;
            height: 50px;
            max-width: 100%;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        nav a:hover {
            color: #f4a261;
            transform: scale(1.1);

        }

        nav a:hover::after {
            width: 100%;
            left: 0;
        }
        nav a::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: -5px;
            width: 0;
            height: 3px;
            background-color: #f4a261;
            transition: width 0.3s ease, left 0.3s ease;
        }
        ul {
            list-style: none;
            padding-top: 0.5%;
        }

        ul li {
            padding: 5px 0;
            position: relative;
        }

        nav ul li {
            display: inline;
            margin:0 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
            font-size: large;
            
        }

        nav ul {
            justify-content: center;
            align-items: center;
            margin:auto;
        }


        main {
            padding: 40px;
            max-width: 900px;
            margin: auto;
        }
        section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        section:hover {
            transform: translateY(-10px);
        }
        ul {
            padding: 15px;
        }
        ul li {
            margin-bottom: 10px;
        }
        footer {
            text-align: center;
            padding: 15px;
            background-color: #222;
            color: white;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        h1#logo {
            color:#f4a261
        }
    </style>
</head>
<body>
    <header class="container">
        <div id="logo_text">
            <h1 id="logo">VNG Games</h1> 
            
        </div>
        
    </header>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="job.html">Career</a></li>
            <li><a href="apply.html">Apply</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Enhancements</h2>
            <p>We have made several improvements to our website to enhance user experience and accessibility. Below are some key enhancements:</p>
            <ul>
                <li><strong>Improved Responsive Design:</strong> Used CSS Flexbox and Grid to ensure adaptability across different screen sizes.</li>
                <li><strong>Enhanced Form Validation:</strong> Applied better form validation techniques in the Apply section to prevent incorrect submissions.</li>
                <li><strong>Smooth Scrolling & Hover Effects:</strong> Added smooth transitions for better user interaction.</li>
                <li><strong>Optimized Images & Performance:</strong> Improved loading speeds by optimizing image sizes and utilizing modern compression techniques.</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2025 VNG Games. All rights reserved.</p>
    </footer>
</body>
</html>