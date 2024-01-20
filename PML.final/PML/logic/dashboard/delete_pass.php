<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../presentation/account/login.html");
    exit();
  }
include('../../data/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['pass_id'])) {
        $pass_id = $_GET['pass_id'];

        // Perform validation, authentication, and other security checks if needed

        // Delete the pass from the database
        $deleteQuery = "DELETE FROM passes WHERE pass_id = $pass_id";
        $deleteResult = $conn->query($deleteQuery);

        if ($deleteResult) {
            echo '<script>
                alert("Pass deleted successfully");
                window.location = "./status.php";
            </script>';
        } else {
            echo "Error deleting pass: " . $conn->error;
        }
    } else {
        echo "Invalid request. Pass ID not provided.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
