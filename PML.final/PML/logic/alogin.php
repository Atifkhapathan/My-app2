<?php
session_start();
include("../data/connect.php");
    $auname= $_POST['auname'];
    $pass = $_POST['password'];
    
    $check = mysqli_query($conn, "select * from admin where auname='$auname' and password='$pass'");
    if(mysqli_num_rows($check)>0)
    {
                        
        echo '<script>
                window.location = "../logic/adashboard/adashboard.php";
            </script>';

    }
    else{
        echo '<script>
        alert("Username or Password Not Matched!");
        window.location = "../presentation/account/adminlogin.html";
    </script>';
    }



?>
<a href=""></a>
