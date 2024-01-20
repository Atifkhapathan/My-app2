<?php
session_start();
include("../../data/connect.php");

$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if ($password != $cpassword) {
    echo "
    <script>
        alert('Password and Confirm Password do not match');
        window.location.href = 'verify.php';
    </script>
    ";
}

$otp = $_POST['otp'];
$email = $_SESSION['email'];

// Check if the OTP is found in the database
$checkOtp = mysqli_query($conn, "SELECT * FROM otp WHERE otp='$otp'");

if (mysqli_num_rows($checkOtp) > 0) {
    // If OTP is found, update the password in the "users" table
    $updatePasswordQuery = mysqli_query($conn, "UPDATE users SET password='$password' WHERE email='$email'");

    if ($updatePasswordQuery) {
        echo "
        <script>
            alert('Password updated successfully');
            window.location.href = '../../presentation/account/login.html'; // Redirect to login page or any other page
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error updating password');
            window.location.href = 'verify.php';
        </script>
        ";
    }
} else {
    echo "
    <script>
        alert('Invalid OTP');
        window.location.href = 'verify.php';
    </script>
    ";
}
?>
