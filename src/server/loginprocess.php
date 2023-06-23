<?php
$host = "localhost";
$database = "db_65683799";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

session_start();

if ($error != null)
{
        $output = "<p>Unable to connect to the database!</p>";
        exit($output);
} 
else
{
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if (isset($_POST["username"]))
        {
            $username = $_POST["username"];
        }
        if (isset($_POST["password"])) 
        {
            $password = $_POST["password"];
        }

        $password_hash = md5($password);
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password_hash';";
        $results = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($results)) 
        {
            $_SESSION['username'] = $username;
            $_SESSION['userID'] = $row['user_id'];
            header('Location: ../client/mainpage.php');
            exit();
        } 
        else
        {
            header('Location: ../client/invalidpage.php');
        }

        mysqli_free_result($results);
    }
    else
    {
        echo "<p>Invalid request method</p>";
    }

    mysqli_close($connection);
}
?>

