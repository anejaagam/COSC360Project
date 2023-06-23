<?php
session_start();
$host = "localhost";
$database = "db_65683799";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

if($error != null)
{
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
}
else
{
    $userId = $_SESSION['userID'];

    if($_POST['username']!='') 
    {
        $newUsername = $_POST['username'];

        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $newUsername);

        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0) 
        {
            echo 'Error';
        }

        else 
        {
            $stmt2 = $connection->prepare("UPDATE users SET username = ? WHERE user_id = ?");

            if ($stmt2 === false) 
            {
                header('Location: ../client/account.php');
            }

            $stmt2->bind_param("si", $newUsername, $userId);

            if($stmt2->execute()) 
            {
                $_SESSION['username'] = $newUsername;
                header('Location: ../client/account.php');
                
            } 
            else 
            {
                echo 'error: ';
            }
        }

        $stmt->close();
    }

    if($_POST['first_name']!='') 
    {
        $newFirstName = $_POST['first_name'];

        $stmt3 = $connection->prepare("UPDATE users SET first_name = ? WHERE user_id = ?");

        if ($stmt3 === false) 
        {
            header('Location: ../client/account.php');
        }

        $stmt3->bind_param("si", $newFirstName, $userId);

        if($stmt3->execute()) 
        {
            $_SESSION['first_name'] = $newFirstName;
            header('Location: ../client/account.php');
        } 
        else 
        {
            echo 'error';
        }
        $stmt3->close();
    }

    if($_POST['last_name']!='') 
    {
        $newLastName = $_POST['last_name'];

        $stmt = $connection->prepare("UPDATE users SET last_name = ? WHERE user_id = ?");

        if ($stmt === false) 
        {
            header('Location: ../client/account.php');
        }

        $stmt->bind_param("si", $newLastName, $userId);

        if($stmt->execute()) 
        {
            $_SESSION['last-name'] = $newLastName;
            header('Location: ../client/account.php');
        } 
        else 
        {
            echo 'Error';
        }
        $stmt->close();
    }

    $connection->close();
}
?>
