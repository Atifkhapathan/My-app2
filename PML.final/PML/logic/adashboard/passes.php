<?php
session_start();
include('../../data/connect.php');

// Handle updating comments
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pass_id'], $_GET['comment'])) {
    $pass_id = $_GET['pass_id'];
    $comment = urldecode($_GET['comment']);

    // Perform validation, authentication, and other security checks if needed

    // Update comment in the database
    $updateCommentQuery = "UPDATE passes SET comment='$comment' WHERE pass_id='$pass_id'";
    $conn->query($updateCommentQuery);

    // Display a confirmation dialog
    $confirmationMessage = "Comment updated successfully!";
    echo "<script>alert('$confirmationMessage');</script>";
}

$sql = "SELECT pass_id, pass_type, pass_cost, pass_status, approval_status, validity_start, validity_end, comment FROM passes WHERE approval_status='Inactive'";
$result = $conn->query($sql);

?>
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
    <a onclick="moveTo('adashboard.php')" style="color: #fff;">Info</a>
      <a onclick="moveTo('passes.php')" style="color: #fff;">Pass Requests</a>
      <a onclick="moveTo('Logout.php')" style="color: #fff;">Logout</a>
    </section>
  </nav>
  <br><br><br>
  <center>
    <h2>Applied Pass List</h2>
  </center>
  <?php
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

            .activate, .deactivate, .update-comment, .view-documents {
                cursor: pointer;
                padding: 5px 10px;
                border: none;
                border-radius: 5px;
                text-decoration: none;
                display: inline-block;
                margin-right: 5px;
            }

            .activate {
                background-color: #2ecc71;
                color: white;
            }

            .deactivate {
                background-color: #e74c3c;
                color: white;
            }

            .update-comment {
                background-color: #3498db;
                color: white;
            }

            .view-documents {
                background-color: #f39c12;
                color: white;
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
                <th>Action</th>
                <th>Update Comment</th>
                <th>View Documents</th>
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
                            <td>
                                <form method="post" action="activate.php" style="display: inline-block;">
                                    <input type="hidden" name="pass_id" value="' . $row["pass_id"] . '">
                                    <button class="activate" type="submit">Activate</button>
                                </form>
                                <form method="post" action="reject.php" style="display: inline-block;">
                                    <input type="hidden" name="pass_id" value="' . $row["pass_id"] . '">
                                    <button class="deactivate" type="submit">Reject</button>
                                </form>
                            </td>
                            <td>
                                <button class="update-comment" type="button" onclick="updateComment(' . $row["pass_id"] . ')">Update Comment</button>
                            </td>
                            <td>
                                <a class="view-documents" href="documents.php?pass_id=' . $row["pass_id"] . '">View Documents</a>
                            </td>
                        </tr>';
            }
            
  } else {
      echo "0 results";
  }

  $conn->close();
  ?>

  <script>
    function updateComment(passId) {
      var newComment = prompt("Enter the new comment:");
      if (newComment !== null) {
        window.location.href = 'passes.php?pass_id=' + passId + '&comment=' + encodeURIComponent(newComment);
      }
    }
  </script>
</body>

</html>