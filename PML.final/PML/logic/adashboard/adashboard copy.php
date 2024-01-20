<?php
session_start();
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

    a {
      color: #fff;
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
      <a onclick="moveTo('passes.php')" style="color: #fff;">Pass Requests</a>
    </section>
  </nav>

  <div class="container">
    <section>
      <h2>1. Daily Pass:</h2>
      <p><strong>Validity:</strong> Unlimited travel within your chosen zone (PMC & PCMC, or entire PMRDA region) for one calendar day.</p>
      <p><strong>Cost:</strong></p>
      <ul>
        <li>PMC & PCMC Zone: Rs. 50</li>
        <li>PMRDA Region: Rs. 120</li>
      </ul>
      <p><strong>Purchase:</strong></p>
      <ul>
        <li>Available at authorized PMPML bus conductors, ticket counters, and select mobile wallets.</li>
        <li>Conveniently purchase through the "PMPML Pravas app" (Android only).</li>
      </ul>
      <p><strong>Usage:</strong></p>
      <ul>
        <li>Hop on any PMPML bus within your chosen zone and show the pass to the conductor when requested.</li>
        <li>No need to swipe or validate - enjoy unlimited rides for the day!</li>
      </ul>
    </section>
    <section>
      <h2>2. Monthly Pass:</h2>
      <p><strong>Validity:</strong> Unlimited travel within your chosen zone (PMC & PCMC, or entire PMRDA region) for one calendar month.</p>
      <p><strong>Cost:</strong></p>
      <ul>
        <li>PMC & PCMC Zone: Rs. 1200</li>
        <li>PMRDA Region: Rs. 2700</li>
      </ul>
      <p><strong>Purchase:</strong></p>
      <ul>
        <li>Available at authorized PMPML bus conductors, ticket counters, and select mobile wallets.</li>
        <li>Purchase through the "PMPML Pravas app" (Android only) for added convenience.</li>
      </ul>
      <p><strong>Usage:</strong></p>
      <ul>
        <li>Board any PMPML bus within your chosen zone and present your pass to the conductor.</li>
        <li>The conductor will swipe your pass to validate it for the month.</li>
        <li>Make the most of unlimited travel throughout the month within your chosen zone!</li>
      </ul>
    </section>
    <!-- Continued from the previous code -->

    <section>
      <h2>3. Senior Citizen Pass:</h2>
      <p><strong>Eligibility:</strong> Indian citizens aged 65 years and above.</p>
      <p><strong>Validity:</strong> Enjoy unlimited travel within your chosen zone (PMC & PCMC, or entire PMRDA region) for one calendar year.</p>
      <p><strong>Cost:</strong> Rs. 500 per year for both zones.</p>
      <p><strong>Purchase:</strong></p>
      <ul>
        <li>Available at authorized PMPML bus conductors, ticket counters, and select mobile wallets.</li>
        <li>Remember to bring your valid ID proof (Aadhaar card, Senior Citizen Identity card) for verification.</li>
      </ul>
      <p><strong>Usage:</strong></p>
      <ul>
        <li>Board any PMPML bus within your chosen zone and show your pass to the conductor.</li>
        <li>The conductor will swipe your pass to validate it for the year.</li>
        <li>Travel worry-free with unlimited rides throughout the year within your chosen zone!</li>
      </ul>
    </section>

    <section>
      <h2>4. Student Pass:</h2>
      <p><strong>Eligibility:</strong> Students enrolled in recognized schools, colleges, or universities within Pune.</p>
      <p><strong>Validity:</strong> One calendar month of unlimited travel within your chosen zone (PMC & PCMC, or entire PMRDA region).</p>
      <p><strong>Cost:</strong> Rs. 750 per month for both zones.</p>
      <p><strong>Purchase:</strong></p>
      <ul>
        <li>Available at authorized PMPML bus conductors, ticket counters, and select mobile wallets.</li>
        <li>Don't forget to upload your valid ID proof (Student ID card, Bonafide certificate) for verification.</li>
      </ul>
      <p><strong>Usage:</strong></p>
      <ul>
        <li>Board any PMPML bus within your chosen zone and present your pass to the conductor.</li>
        <li>The conductor will swipe your pass to validate it for the year.</li>
        <li>Explore Pune with ease - enjoy unlimited rides throughout the year within your chosen zone!</li>
      </ul>
    </section>

    <!-- End of the structure for the Senior Citizen Pass and Student Pass sections -->

    <section>
      <h2>Additional Tips:</h2>
      <ul>
        <li>Always carry your valid epass while traveling on PMPML buses.</li>
        <li>Report any technical issue immediately to the nearest PMPML bus conductor or ticket counter.</li>
        <li>For more detailed information on PMPML passes, visit the official PMPML website (<a href="https://pmpml.org/">https://pmpml.org/</a>) or download the "PMPML Pravas app."</li>
      </ul>
    </section>

    <p>With this information at your fingertips, choosing the right PMPML pass and navigating Pune's public transport system has never been easier. So hop on board and enjoy a convenient and affordable travel experience!</p>
  </div>

</body>

</html>