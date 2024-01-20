<?php
    session_start();
    session_destroy();
    header("location: ../../presentation/account/adminlogin.html");
?>
