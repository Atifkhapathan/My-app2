<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PMPML Online Bus Pass Generator Dashboard</title>
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
      max-width: 100%;
      overflow-x: auto;
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
  <center>
    <h2>Pass Status</h2>
  </center>

  <?php
  session_start();
  if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
  // Assuming you have a database connection
  include('../../data/connect.php');
  $user_id = $_SESSION['data']['user_id'];
  $sql = "SELECT pass_id,pass_type, pass_cost, pass_status, approval_status, validity_start, validity_end, comment FROM passes where user_id=$user_id ";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo '<style>
            table {
                font-family: Arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }

            th {
                background-color: #f2f2f2;
            }
        </style>';

    echo '<div class="container">';
    echo '<table>';
    echo '<tr>
                <th>Pass ID</th>
                <th>Pass Type</th>
                <th>Pass Cost</th>
                <th>Pass Status</th>
                <th>Approval Status</th>
                <th>Validity Start</th>
                <th>Validity End</th>
                <th>Comment</th>
                <th>Payment</th>
                <th>Download Pass</th>
                <th>Delete</th>
              </tr>';

    while ($row = $result->fetch_assoc()) {
      echo '<tr>
                        <td>' . $row["pass_id"] . '</td>
                        <td>' . $row["pass_type"] . '</td>
                        <td>' . $row["pass_cost"] . '</td>
                        <td>' . $row["pass_status"] . '</td>
                        <td>' . $row["approval_status"] . '</td>
                        <td>' . $row["validity_start"] . '</td>
                        <td>' . $row["validity_end"] . '</td>
                        <td>' . $row["comment"] . '</td>
                        <td>';

      if ($row["approval_status"] === "Active" && $row["pass_status"] === "Inactive") {
        echo '<a href="payment.php?pass_id=' . $row["pass_id"] . '&pass_cost=' . $row["pass_cost"] . '&pass_type=' . $row["pass_type"] . '">Payment</a>';
      } else {
        echo 'N/A';
      }

      echo '</td>
                        <td>';

      if ($row["pass_status"] === "Active") {
        echo '<a href="download_pass.php?pass_id=' . $row["pass_id"] . '">Download Pass</a>';
      } else {
        echo 'N/A';
      }

      echo '</td>
                        <td>';

      echo '<a href="#" onclick="confirmDelete(' . $row["pass_id"] . ')">Delete</a>';

      echo '</td>
                      </tr>';
    }
  } else {
    echo "0 results";
  }

  $conn->close();
  ?>

  <script>
    function confirmDelete(passId) {
      var confirmDelete = confirm("Are you sure you want to delete this pass?");
      if (confirmDelete) {
        window.location.href = "delete_pass.php?pass_id=" + passId;
      }
    }
  </script>

</body>

</html>