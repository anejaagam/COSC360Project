<?php
    if(isset($_SESSION['username']))
    {
        header("Location: ../client/mainpage.php");
        exit();
    }
    else
    {
        header("Location: ../client/loginform.php");
        exit();
    }
?>