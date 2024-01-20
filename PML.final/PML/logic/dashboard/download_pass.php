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
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
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

                      table {
                          border-collapse: collapse;
                          width: 100%;
                          margin: 20px auto;
                      }

                      th, td {
                          border: 1px solid #ddd;
                          padding: 8px;
                          text-align: left;
                      }

                      th {
                          background-color: #2ecc71;
                          color: white;
                      }

                      img {
                          max-width: 100%;
                          max-height: 150px;
                          display: block;
                          margin: auto;
                          border-radius: 50%;
                      }

                      .button-container {
                          text-align: center;
                          margin-top: 20px;
                      }

                      .button-container button {
                          padding: 10px;
                          margin: 5px;
                          cursor: pointer;
                          background-color: #2ecc71;
                          color: white;
                          border: none;
                          border-radius: 5px;
                          text-decoration: none;
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
      <a onclick="moveTo('pass.php')" style="color: #fff;">Pass</a>
      <a onclick="moveTo('status.php')" style="color: #fff;">Status</a>
      <a onclick="moveTo('documents.php')" style="color: #fff;">Document</a>
      <a onclick="moveTo('logout.php')" style="color: #fff;">Logout</a>
    </section>
  </nav>

  
</body>

</html>
<?php
require_once('../../data/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pass_id'])) {
        $pass_id = $_GET['pass_id'];

        // Perform validation, authentication, and other security checks if needed

        // Fetch pass and user details from the database
        $selectQuery = "SELECT passes.*, users.name, users.email, users.photo FROM passes JOIN users ON passes.user_id = users.user_id WHERE pass_id = $pass_id";
        $result = $conn->query($selectQuery);

        echo '
              <body>
              ';

        if ($result && $result->num_rows > 0) {
            $passDetails = $result->fetch_assoc();

            // Display pass details in a table
            echo '
                    <div id="data">
                    <table id="passTable">
                      <tr>
                        <th colspan="2">PASS INFORMATION</th> 
                      </tr>
                      <tr>
                          <td>User Name</td>
                          <td>' . $passDetails['name'] . '</td>
                      </tr>
                      <tr>
                          <td>User Email</td>
                          <td>' . $passDetails['email'] . '</td>
                      </tr>
                      <tr>
                          <td>Pass ID</td>
                          <td>' . $passDetails['pass_id'] . '</td>
                      </tr>
                      <tr>
                          <td>Pass Type</td>
                          <td>' . $passDetails['pass_type'] . '</td>
                      </tr>
                      <tr>
                          <td>Pass Cost</td>
                          <td>' . $passDetails['pass_cost'] . '</td>
                      </tr>
                      <tr>
                          <td>Validity Start</td>
                          <td>' . $passDetails['validity_start'] . '</td>
                      </tr>
                      <tr>
                          <td>Validity End</td>
                          <td>' . $passDetails['validity_end'] . '</td>
                      </tr>
                      <tr>
                          <td colspan="2"><img src="../../data/uploads/photos/' . $passDetails['photo'] . '" alt="User Photo"></td>
                      </tr>
                      <tr>
                          <td colspan="2" class="button-container">
                          <a href="../../vendor/pdf.php?pass_id=' . $pass_id . '" class="btn btn-success">Download Pass</a>
                              <button onclick="goBack()">Back</button>
                          </td>
                      </tr>
                    </table>
                    </div>
                  ';

            echo '<script>
        

                    function goBack() {
                        window.history.back();
                    }
                </script>';
        } else {
            echo "Pass not found.";
        }

        echo '</body>
              </html>';
    } else {
        echo "Invalid request. Pass ID not provided.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
