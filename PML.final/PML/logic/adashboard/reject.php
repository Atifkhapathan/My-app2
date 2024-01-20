<?php
session_start();
include('../../data/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pass_id'])) {
    $pass_id = $_POST['pass_id'];

    // Perform validation, authentication, and other security checks if needed

    // Update approval_status in the database
    $updateQuery = "UPDATE passes SET approval_status='Rejected' WHERE pass_id='$pass_id'";
    $conn->query($updateQuery);

    // Display a confirmation dialog
    $confirmationMessage = "Pass successfully rejected!";
    echo "<script>alert('$confirmationMessage'); window.location.href = 'passes.php';</script>";
}
?>
