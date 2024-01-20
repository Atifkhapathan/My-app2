<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMPML Online Bus Pass Generator Dashboard</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="./script.js"></script>

    <style>
        header {
            background-color: #2ecc71;
            /* Green */
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .logo {
            width: 50%;
            /* Set the width to 50% of the container */
            max-width: 200px;
            /* Set a maximum width if needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #333;
            overflow: hidden;
            animation: fadeInDown 0.5s;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            /* Added transition for box-shadow */
        }

        .container:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            /* Increase shadow on hover */
        }

        /* Additional styles for sections */
        section {
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 8px;
            color: #555;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #2ecc71;
            /* Green */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #28a745;
        }
    </style>
</head>

<body>
    <div id="loading-spinner"></div>
    <header>
        <img src="../../presentation/includes/image/logo.png" alt="PMPML Logo" class="logo">
        <h1>PMPML Online Bus Pass Generator</h1>

    </header>

    <nav>
        <section id="proceed">
            <a onclick="moveTo('dashboard.php')" style="color: #fff;">Info</a>
            <a onclick="moveTo('Profile.php')" style="color: #fff;">Profile</a>
            <a onclick="moveTo('pass.php')" style="color: #fff;">Pass</a>
            <a onclick="moveTo('status.php')" style="color: #fff;">Status</a>
            <a onclick="moveTo('documents.php')" style="color: #fff;">Document</a>
            <a onclick="moveTo('map.php')" style="color: #fff;">Routes & Planing</a>
            <a onclick="moveTo('logout.php')" style="color: #fff;">Logout</a>
        </section>
    </nav>
    <br><br><br>
    <form id="passForm" action="pass1.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
        <label for="passType">Select Pass Type:</label>
        <select id="passType" name="passType" onchange="showFields()" required>
            <option value="" selected disabled>Select Pass Type</option>
            <option value="daily">Daily Pass</option>
            <option value="monthly">Monthly Pass</option>
            <option value="senior">Senior Citizen Pass</option>
            <option value="student">Student Pass</option>
        </select>

        <!-- Additional divs for different pass type fields -->
        <div id="dailyFields" style="display: none;">
            <label for="dailyAdhaar">Adhaar Number:</label>
            <input type="text" id="dailyAdhaar" name="dailyAdhaar" maxlength="12">
            <label for="dailyAdh">Upload Adhar Card in pdf format:</label>
            <input type="file" id="dailyAdh" name="dailyAdh" accept=".pdf, .jpg, .jpeg, .png">
            <label for="dailyZone">Select Zone:</label>
            <select class="form-control" id="dailyZone" name="dailyZone">
                <option value="pp">PMC & PCMC Zone: Rs. 50</option>
                <option value="pmrda">PMRDA Region: Rs. 120</option>
            </select>
        </div>
        <div id="monthlyFields" style="display: none;">
            <label for="monthlyAdhaar">Adhaar Number:</label>
            <input type="text" id="monthlyAdhaar" name="monthlyAdhaar" maxlength="12">
            <label for="monthlyAdh">Upload Adhar Card both side in pdf format and contain birth year:</label>
            <input type="file" id="monthlyAdh" name="monthlyAdh" accept=".pdf, .jpg, .jpeg, .png">
            <label for="monthlyZone">Select Zone:</label>
            <select class="form-control" id="monthlyZone" name="monthlyZone">
                <option value="pp">PMC & PCMC Zone: Rs. 1200</option>
                <option value="pmrda">PMRDA Region: Rs. 2700</option>
            </select>
        </div>
        <div id="seniorFields" style="display: none;">
            <label for="seniorAdhaar">Adhaar Number:</label>
            <input type="text" id="seniorAdhaar" name="seniorAdhaar" maxlength="12">
            <label for="dob">Date of Birth:</label>
            <input type="date" id="seniorDob" name="seniorDob" max="1957-12-31">
            <label for="seniorAdh">Upload Adhar Card in pdf format and contain birth year:</label>
            <input type="file" id="seniorAdh" name="seniorAdh" accept=".pdf, .jpg, .jpeg, .png">
            <select class="form-control" id="seniorZone" name="seniorZone">
                <option value="pmrda">PMRDA Region: Rs. 500</option>
            </select>
            <!-- Add more fields as needed for the Senior Citizen Pass -->
        </div>

        <!-- Repeat similar structures for other pass types -->

        <div id="studentFields" style="display: none;">
            <label for="studentClass">Class:</label>
            <input type="text" id="studentClass" name="studentClass">
            <label for="studentCourse">Course:</label>
            <input type="text" id="studentCourse" name="studentCourse">
            <label for="studentDob">Date of Birth:</label>
            <input type="date" id="studentDob" name="studentDob" max="2015-12-31">
            <label for="studentBonafide">Upload Bonafide Certificate in pdf format:</label>
            <input type="file" id="studentBonafide" name="studentBonafide" accept=".pdf, .doc, .docx">
            <label for="studentIdCard">Upload id card in pdf format:</label>
            <input type="file" id="studentIdCard" name="studentIdCard" accept=".pdf, .jpg, .jpeg, .png">
            <label for="studentAdh">Upload Adhar Card in pdf format:</label>
            <input type="file" id="studentAdh" name="studentAdh" accept=".pdf, .jpg, .jpeg, .png">
        </div>

        <button type="submit">Submit</button>
    </form>
    <!-- ... (Your HTML code above) ... -->

    <script>
        function showFields() {
            var passType = document.getElementById("passType").value;

            // Hide all field sections
            document.getElementById("dailyFields").style.display = "none";
            document.getElementById("monthlyFields").style.display = "none";
            document.getElementById("seniorFields").style.display = "none";
            document.getElementById("studentFields").style.display = "none";

            // Show the selected field section
            if (passType === "daily") {
                document.getElementById("dailyFields").style.display = "block";
            } else if (passType === "monthly") {
                document.getElementById("monthlyFields").style.display = "block";
            } else if (passType === "senior") {
                document.getElementById("seniorFields").style.display = "block";
            } else if (passType === "student") {
                document.getElementById("studentFields").style.display = "block";
            }
        }

        function validateForm() {
            var passType = document.getElementById("passType").value;

            // Validate based on pass type
            if (passType === "daily") {
                // Implement validation for daily pass fields
                var dailyAdhaar = document.getElementById("dailyAdhaar").value;
                var dailyAdh = document.getElementById("dailyAdh").value;

                if (!dailyAdhaar || !dailyAdh) {
                    alert("Please fill in all fields for Daily Pass.");
                    return false;
                }
            } else if (passType === "monthly") {
                // Implement validation for monthly pass fields
                var monthlyAdhaar = document.getElementById("monthlyAdhaar").value;
                var monthlyAdh = document.getElementById("monthlyAdh").value;

                if (!monthlyAdhaar || !monthlyAdh) {
                    alert("Please fill in all fields for Monthly Pass.");
                    return false;
                }
            } else if (passType === "senior") {
                // Implement validation for senior pass fields
                var seniorAdhaar = document.getElementById("seniorAdhaar").value;
                var seniorDob = document.getElementById("seniorDob").value;
                var seniorAdh = document.getElementById("seniorAdh").value;

                if (!seniorAdhaar || !seniorDob || !seniorAdh) {
                    alert("Please fill in all fields for Senior Citizen Pass.");
                    return false;
                }
            } else if (passType === "student") {
                // Implement validation for student pass fields
                var studentClass = document.getElementById("studentClass").value;
                var studentCourse = document.getElementById("studentCourse").value;
                var studentDob = document.getElementById("studentDob").value;
                var studentBonafide = document.getElementById("studentBonafide").value;
                var studentIdCard = document.getElementById("studentIdCard").value;
                var studentAdh = document.getElementById("studentAdh").value;

                if (!studentClass || !studentCourse || !studentDob || !studentBonafide || !studentIdCard || !studentAdh) {
                    alert("Please fill in all fields for Student Pass.");
                    return false;
                }
            }

            // Return true if form submission is allowed
            return true;
        }
    </script>

    <!-- ... (Your HTML code below) ... -->

</body>

</html>