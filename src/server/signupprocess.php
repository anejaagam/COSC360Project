<?php

$host = "localhost";
$database = "db_65683799";
$user     = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

session_start();

if($error != null)
{
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
}
else
{
    if (isset($_SERVER["REQUEST_METHOD"]) &&  $_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (isset($_POST["firstname"]))
        $firstname = $_POST["firstname"];
      if (isset($_POST["lastname"]))
        $lastname = $_POST["lastname"];
      if (isset($_POST["email"]))
        $email = $_POST["email"];
      if (isset($_POST["username"]))
        $username = $_POST["username"];
      if (isset($_POST["password"]))
        $password = $_POST["password"];

        if (isset($_SERVER['HTTP_REFERER']))
          $return_link = $_SERVER['HTTP_REFERER'];

        $sql = "SELECT * FROM users where username = '$username' OR email = '$email';";

        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results))
        {
          echo "<p>User already exists with this name and/or email<p>";
          if (isset($return_link))
          {
            echo '<a href="../client/signup.php">Return to signup page</a>';
          }
        }
        else 
        {
            $sql = "INSERT INTO users (first_name, last_name, email, password, username) values ('$firstname','$lastname','$email',md5('$password'), '$username');";
            if (mysqli_query($connection, $sql))
            {
              $_SESSION['username'] = $username;
              $count = mysqli_affected_rows($connection);
              $_SESSION['userID'] = $count;
              header('Location: ../client/mainpage.php');
              exit();
            }
        }
        mysqli_free_result($results);
    }
    else 
    {
      echo "<p>Bad information has been entered</p>";
      if (isset($return_link))
      {
        echo '<a href="src/client/signup.php">Return to signup page</a>';
      }
    }

    mysqli_close($connection);
}
?>