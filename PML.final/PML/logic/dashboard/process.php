<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
include('../../data/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have processed the payment successfully, you can update the pass_status to 'Active'
    $pass_id = $_REQUEST['pass_id'];
    $cost=$_REQUEST['pass_cost'];
    if($cost<=120)
    {
    $updateQuery = "UPDATE passes SET pass_status = 'Active', validity_start = CURRENT_DATE, validity_end = CURRENT_DATE WHERE pass_id = $pass_id";
    $updateResult = $conn->query($updateQuery);
    }
    else
    {
        $updateQuery = "UPDATE passes SET pass_status = 'Active', validity_start = CURRENT_DATE, validity_end = DATE_ADD(CURRENT_DATE, INTERVAL 1 MONTH) WHERE pass_id = $pass_id";
        $updateResult = $conn->query($updateQuery); 
    }       
    if ($updateResult) {
        echo '<script>
        alert("payment For Pass Sucessfully");
        window.location = "./status.php";
        </script>';
    } else {
        echo "Error updating pass status: " . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
