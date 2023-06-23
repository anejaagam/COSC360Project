<?php

$host = "localhost";
$database = "db_65683799";
$user     = "65683799";
$password = "65683799";

$connection = mysqli_connect($host, $user, $password, $database);


$error = mysqli_connect_error();
if($error != null)
{
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
}
else
{
    if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (isset($_POST["username"]))
        $username = $_POST["username"];
      if (isset($_POST["Email"]))
        $email = $_POST["Email"];
      if (isset($_POST["newpassword"]))
          $newpassword = $_POST["newpassword"];

        $sql = "SELECT * FROM users where username = '$username' AND email = '$email';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
          $sql = "UPDATE users SET password = md5('$newpassword') WHERE username = '$username';";
          if (mysqli_query($connection, $sql))
          {
              header('Location: ../client/resetpasswordsuccess.php');
          }
        }
        else
        {
           header('Location: ../client/resetpasswordfail.php');
        }
        mysqli_free_result($results);

    }
    else 
    {
      echo "<p>Bad information has been entered</p>";
    }

    mysqli_close($connection);
}
?>