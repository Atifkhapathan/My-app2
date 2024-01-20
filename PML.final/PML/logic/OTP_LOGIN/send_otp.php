<?php
session_start();
include("../../data/connect.php");
include("email.php");
$email=$_POST['user_email'];
$_SESSION['email']=$email;
$check = mysqli_query($conn, "select * from otp where email='$email'");
if(mysqli_num_rows($check)>0)
{
echo "Email Found";
$otp=rand(11111,99999);
send_otp($email,"PMPML Email Verification OTP",$otp);
$rs=mysqli_query($conn, "update otp set otp='$otp' where email='$email'");
header("location:verify.php?msg=Plz Check Your Email OTP and Verify!");
}
else
{
    header("location:index.php?msg=Email is Invalid....please check again!");
}

?>
<a href=""></a>