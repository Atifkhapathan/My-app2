
<?php
session_start();
include("../data/connect.php");
    $email= $_POST['email'];
    $pass = $_POST['password'];
    
    $check = mysqli_query($conn, "select * from users where email='$email' and password='$pass'");
    if(mysqli_num_rows($check)>0)
    {
        $data=mysqli_fetch_array($check);
        $_SESSION['user_id']=$data['user_id'];
        $_SESSION['name']=$data['name'];
        $_SESSION['data']=$data;
      //  $_SESSION['status']=$data['status'];
      //  $_SESSION['data']=$data;
        echo '<script>
                window.location = "../logic/dashboard/dashboard.php";
            </script>';

    }
    else{
        echo '<script>
                alert("Username or Password Not Matched!");
                window.location = "../presentation/account/login.html";
            </script>';
    }


?>
