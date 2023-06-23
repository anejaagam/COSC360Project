<?php
    session_start();
    $username = $_SESSION['username'];

    $username == null;
    $_SESSION['username'] = null;
    header("Location: ../client/mainpage.php");
    exit();
?>