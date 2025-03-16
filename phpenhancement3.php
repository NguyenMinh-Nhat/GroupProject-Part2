<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager Dashboard - VNG Corporation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', Arial, sans-serif;
            background: linear-gradient(145deg, #1A1A1A 0%, #2C2C2C 100%);
            color: #E0E0E0;
            line-height: 1.8;
            overflow-x: hidden;
            position: relative;
        }

        /* Particle Background Effect */
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 87, 34, 0.5);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% { transform: translateY(100vh) scale(1); opacity: 0.8; }
            100% { transform: translateY(-100vh) scale(0.5); opacity: 0; }
        }

        header {
            background: linear-gradient(90deg, rgba(255, 87, 34, 0.9) 0%, rgba(230, 74, 25, 0.9) 100%);
            padding: 20px 0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            backdrop-filter: blur(10px);
            animation: fadeInDown 1s ease;
        }

        .header-container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo span {
            color: #FFFFFF;
            font-weight: 800;
            font-size: 32px;
            margin-left: 15px;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
            animation: neonGlow 2s infinite alternate;
        }

        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
        }

        nav ul li {
            margin-left: 35px;
        }

        nav ul li a {
            text-decoration: none;
            color: #FFFFFF;
            font-weight: 600;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 50px;
            transition: all 0.4s ease;
            position: relative;
            background: linear-gradient(90deg, transparent 50%, rgba(255, 255, 255, 0.2) 50%);
            background-size: 200%;
            background-position: 0%;
        }

        nav ul li a:hover {
            background-position: 100%;
            color: #FFECB3;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
        }

        .hero {
            background: linear-gradient(135deg, #FF5722 0%, #E64A19 100%);
            color: #FFFFFF;
            text-align: center;
            padding: 60px 0;
            margin-top: 80px;
            border-radius: 0 0 25px 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
            animation: slideIn 1.2s ease;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
            opacity: 0.3;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 15px;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
            letter-spacing: 1px;
        }

        .hero p {
            font-size: 20px;
            font-weight: 300;
            opacity: 0.85;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3), inset 0 0 30px rgba(255, 87, 34, 0.15);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            z-index: 2;
            position: relative;
        }

        .container:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4), inset 0 0 40px rgba(255, 87, 34, 0.25);
        }

        h2 {
            color: #FF5722;
            font-size: 40px;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 3px;
            text-shadow: 0 0 15px rgba(255, 87, 34, 0.5);
            animation: fadeIn 1.5s ease;
        }

        h2::after {
            content: '';
            width: 100px;
            height: 6px;
            background: linear-gradient(90deg, #FF5722, #E64A19);
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 3px;
            animation: glow 2s infinite alternate;
        }

        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            margin-bottom: 40px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1s ease;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
            min-width: 280px;
        }

        label {
            font-weight: 500;
            font-size: 16px;
            color: #FFFFFF;
            text-transform: capitalize;
            opacity: 0.9;
        }

        input[type="text"], select {
            padding: 14px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            box-sizing: border-box;
            width: 100%;
            background: rgba(255, 255, 255, 0.15);
            color: #FFFFFF;
            transition: all 0.4s ease;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        input[type="text"]::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        input[type="text"]:focus, select:focus {
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(255, 87, 34, 0.5);
            outline: none;
        }

        input[type="submit"] {
            padding: 14px 30px;
            font-size: 16px;
            background: linear-gradient(45deg, #FF5722, #E64A19);
            color: #FFFFFF;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(255, 87, 34, 0.4);
        }

        input[type="submit"]:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(255, 87, 34, 0.6);
            background: linear-gradient(45deg, #E64A19, #FF5722);
        }

        input[type="submit"]:active {
            transform: translateY(0);
            box-shadow: 0 3px 10px rgba(255, 87, 34, 0.3);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeInUp 1.2s ease;
        }

        th, td {
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 20px;
            text-align: left;
            transition: all 0.4s ease;
        }

        th {
            background: linear-gradient(90deg, #FF5722, #E64A19);
            color: #FFFFFF;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            position: sticky;
            top: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        tr {
            background: rgba(255, 255, 255, 0.03);
            transition: all 0.4s ease;
        }

        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.05);
        }

        tr:hover {
            background: rgba(255, 87, 34, 0.2);
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        td {
            font-size: 15px;
            color: #E0E0E0;
        }

        td button {
            padding: 8px 15px;
            background: linear-gradient(45deg, #FF5722, #E64A19);
            color: #FFFFFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        td button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(255, 87, 34, 0.4);
        }

        .message {
            margin-top: 25px;
            padding: 15px;
            border-radius: 10px;
            font-size: 16px;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .success {
            background: linear-gradient(135deg, #4CAF50, #388E3C);
            color: #FFFFFF;
            animation: bounceIn 0.8s ease;
        }

        .error {
            background: linear-gradient(135deg, #F44336, #D32F2F);
            color: #FFFFFF;
            animation: shake 0.5s ease;
        }

        /* Animations */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { transform: translateY(-60px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes neonGlow {
            from { text-shadow: 0 0 10px rgba(255, 255, 255, 0.3); }
            to { text-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 30px #FF5722; }
        }

        @keyframes glow {
            from { box-shadow: 0 0 5px #FF5722; }
            to { box-shadow: 0 0 20px #FF5722, 0 0 30px #E64A19; }
        }

        @keyframes bounceIn {
            0% { transform: scale(0.7); opacity: 0; }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes shake {
            0% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
            75% { transform: translateX(-5px); }
            100% { transform: translateX(0); }
        }
    </style>
</head>
<body>
    <!-- Particle Background -->
    <div class="particles">
        <div class="particle" style="width: 10px; height: 10px; left: 10%; top: 0; animation-delay: 0s;"></div>
        <div class="particle" style="width: 8px; height: 8px; left: 20%; top: 0; animation-delay: 2s;"></div>
        <div class="particle" style="width: 12px; height: 12px; left: 30%; top: 0; animation-delay: 4s;"></div>
        <div class="particle" style="width: 6px; height: 6px; left: 40%; top: 0; animation-delay: 6s;"></div>
        <div class="particle" style="width: 9px; height: 9px; left: 50%; top: 0; animation-delay: 8s;"></div>
        <div class="particle" style="width: 11px; height: 11px; left: 60%; top: 0; animation-delay: 10s;"></div>
        <div class="particle" style="width: 7px; height: 7px; left: 70%; top: 0; animation-delay: 12s;"></div>
        <div class="particle" style="width: 10px; height: 10px; left: 80%; top: 0; animation-delay: 14s;"></div>
        <div class="particle" style="width: 8px; height: 8px; left: 90%; top: 0; animation-delay: 16s;"></div>
    </div>

    <header>
        <div class="header-container">
            <div class="logo">
                <span>VNG Corporation</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Apply</a></li>
                    <li><a href="#">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="hero">
        <h1>Welcome to HR Manager Dashboard</h1>
        <p>Unlock the Power of Seamless EOI Management</p>
    </div>

    <div class="container">
        <h2>Search EOI Records</h2>

        <!-- Search Form -->
        <form id="search-form" onsubmit="searchEOI(event)">
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
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="">Any</option>
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
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
                    <label> </label>
                    <input type="submit" value="Search Now">
                </div>
            </div>
        </form>

        <!-- Sample Table (Placeholder for Data) -->
        <table>
            <thead>
                <tr>
                    <th>EOI #</th>
                    <th>Job Reference</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>JOB123</td>
                    <td>John</td>
                    <td>Doe</td>
                    <td>Male</td>
                    <td>VIC</td>
                    <td>New</td>
                    <td>john.doe@email.com</td>
                    <td>123-456-7890</td>
                    <td><button>Update</button></td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>JOB124</td>
                    <td>Jane</td>
                    <td>Smith</td>
                    <td>Female</td>
                    <td>NSW</td>
                    <td>Current</td>
                    <td>jane.smith@email.com</td>
                    <td>098-765-4321</td>
                    <td><button>Update</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>