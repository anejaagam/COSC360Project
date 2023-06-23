<?php
session_start();
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
    if (isset($_POST['action']) && $_POST['action'] === 'upvote') 
    {
        if (isset($_POST['post_id'])) 
        {
            $postId = $_POST['post_id'];
            
            if(isset($_SESSION['username']))
            {
                $query = "UPDATE posts SET upvotes = upvotes + 1 WHERE post_id = $postId";
                $result = mysqli_query($connection, $query);

                if ($result)
                {
                    exit();
                }
            }
        }
    }

    if (isset($_POST['action']) && $_POST['action'] === 'downvote') 
    {
        if (isset($_POST['post_id'])) 
        {
            $postId = $_POST['post_id'];

            if(isset($_SESSION['username']))
            {
                $query = "UPDATE posts SET downvotes = downvotes + 1 WHERE post_id = $postId";
                $result = mysqli_query($connection, $query);

                if ($result)
                {
                    exit();
                }
            }
        }
    }

    header("Location: ../client/mainpage.php");
    exit();
}

?>