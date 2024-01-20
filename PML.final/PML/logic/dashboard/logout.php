<?php
    session_start();
    session_destroy();
    header("location: ../../presentation/home/index.html");
?>
