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
  <link rel="stylesheet" href="./styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="./script.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places&callback=initMap" async
    defer></script>


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

    #map {
      height: 400px;
      width: 100%;
    }

    #locationInputs {
      margin-bottom: 20px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    iframe {
      margin-top: 20px;
      width: 100%;
      height: 300px;
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
  <div class="container">
    <h1>Choose Starting Point and Destination</h1>

    
    <a href="https://www.google.com/maps/dir//Pune,+Maharashtra/@18.408619,73.415641,8z/data=!4m9!4m8!1m0!1m5!1m1!1s0x3bc2bf2e67461101:0x828d43bf9d9ee343!2m2!1d73.8567437!2d18.5204303!3e3?hl=en&entry=ttu"class="btn btn-success" >Lets Begin The Journey</a>

    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.17005851687!2d73.6981553041223!3d18.52454504095413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1702932049126!5m2!1sen!2sin"
      width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <script>
   
  </script>
</body>

</html>
