<?php
$host = "localhost";
$database = "db_65683799";
$user = "65683799";
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
    $postId = $_POST["post_id"];
    $query = "DELETE FROM posts WHERE post_id = ?";
    $query2 = "DELETE FROM comments WHERE post_id = ?";
    $stmt = $connection->prepare($query);
    $stmt2 = $connection->prepare($query2);
    $stmt->bind_param("i", $postId); 
    $stmt2->bind_param("i", $postId);

    if ($stmt->execute()) 
    {
        echo "success";
    } 
    else 
    {
        echo "Error";
    }
    if ($stmt2->execute()) 
    {
        echo "success";
    } 
    else 
    {
        echo "Error";
    }

    $stmt->close();
    $stmt2->close();
    $connection->close();
}
?>
