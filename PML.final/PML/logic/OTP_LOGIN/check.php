<?php
session_start();
include("../../data/connect.php");
$otp=$_POST['otp'];
$email=$_SESSION['email'];
$check = mysqli_query($conn, "select * from otp where otp='$otp'");
$name=$_SESSION['name'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$photo_name=$_SESSION['photo'];
$phone=$_SESSION['phone'];
try{if(mysqli_num_rows($check)>0)
    {
        $reg = mysqli_query($conn,"update otp set otpstatus= 1 where otp='$otp'");
        $insert=mysqli_query($conn,"INSERT INTO `users` (`user_id`, `user_name`, `name`, `email`, `phone`, `password`, `account_status`, `created_at`, `updated_at`, `photo`) 
        VALUES (NULL, '$username', '$name', '$email', '$phone', '$password', 'active', current_timestamp(), NULL, '$photo_name')");
        echo '<script>
                            alert("Regestration Sucessfull");
                            window.location = "../../presentation/account/login.html";
                </script>';
    session_destroy();
    }}
catch(mysqli_sql_exception $e)
{
    echo '<script>
    alert("Email Already Exists Please Login");
    window.location = "../../presentation/account/login.html";
</script>';
}
?>
