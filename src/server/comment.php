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
    if(isset($_POST['comment']) && isset($_SESSION['post_id']) && isset($_SESSION['userID'])) 
    {
        $comment = $_POST['comment'];
        $post_id = $_SESSION['post_id'];
        $date = date('Y-m-d H:i:s');
        $user_id = $_SESSION['userID'];

        // Prepare statement
        $stmt = $connection->prepare("INSERT INTO comments (post_id, user_id, comment_content, comment_date) VALUES (?, ?, ?, ?)");
        if ($stmt === false) 
        {
            die("Prepare failed: " . "error");
        }

        // Bind parameters
        $bind = $stmt->bind_param("iiss", $post_id, $user_id, $comment, $date);
        if ($bind === false) 
        {
            die("Bind failed: " . "error");
        }

        // Execute statement
        $exec = $stmt->execute();
        if ($exec === false) 
        {
            die("Execute failed: " . "error");
        }

        $stmt->close();
    }

    $connection->close();
}
?>
