<?php
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
    $commentId = $_POST["comment_id"];
    $query = "DELETE FROM comments WHERE comment_id = ?";

    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $commentId); 

    if ($stmt->execute()) 
    {
        echo "success";
    } 
    else 
    {
        echo "Error deleting post: " . "Error";
    }

    $stmt->close();
    $connection->close();
}
?>
