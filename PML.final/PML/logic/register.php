<?php
session_start();
include('../data/connect.php');
$name = $_POST['name'];
$phone=$_POST['phone'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$photo = $_FILES['photo'];
$photo_name = $photo['name'];
$photo_tmp = $photo['tmp_name'];
$_SESSION['email'] = $email;
$upload_dir = "../data/uploads/photos/";
move_uploaded_file($photo_tmp, $upload_dir . $photo_name);
$insert = mysqli_query($conn, "INSERT INTO `otp` (`email`, `otp`) VALUES ('$email', '');");
if ($insert) {
    $_SESSION['name']=$name;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    $_SESSION['photo']=$photo_name;
    $_SESSION['phone']=$phone;
    echo '<script>
                        alert("Press ok for Email verification");
                        window.location = "../logic/OTP_LOGIN/index.php";
            </script>';
}

?>
<a href=""></a>