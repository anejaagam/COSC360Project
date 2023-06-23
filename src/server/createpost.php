<?php
session_start();
$host = "localhost";
$database = "db_65683799";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['post_title'], $_POST['post_body']) && isset($_SESSION['userID'])) 
{
    $postTitle = $_POST['post_title'];
    $postBody = $_POST['post_body'];
    $userId = $_SESSION['userID'];

    $stmt = $connection->prepare("INSERT INTO posts (user_id, post_title, post_content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $userId, $postTitle, $postBody); 

    if($stmt->execute()) 
    {
        echo 'success';
    } 
    else 
    {
        echo 'error';
    }

    $stmt->close();
    $connection->close();
} 
else 
{
    header('Location: ../client/mainpage.php');
}
?>
