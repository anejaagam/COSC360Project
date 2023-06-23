<?php
session_start();
$host = "localhost";
$database = "db_65683799";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

if ($error != null)
{
    $output = "<p>Unable to connect to the database!</p>";
    exit($output);
} 
else 
{
    if (isset($_GET['search'])) 
    {
        $searchTerm = $_GET['search'];
        $db = $connection;

        $query = "SELECT * FROM posts WHERE post_title LIKE '%$searchTerm%' OR post_content LIKE '%$searchTerm%';";
        $filteredPosts = mysqli_query($db, $query);

        foreach ($filteredPosts as $post) 
        {
            echo "<div class='card mb-4'>
                  <div class='card-body'>
                    <div class='container-fluid'>
                      <div class='row'>
                        <div class='col-md-12 card-title'>
                          " . $post['post_title'] . "
                        </div>
                      </div>
                    </div>
                    <p class='card-text'>" . $post['post_content'] . "</p>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-success mr-2'><i class='fa-solid fa-arrow-up' style='color: #ffffff;'></i></button>
                      <button type='button' class='btn btn-danger mr-2'><i class='fa-solid fa-arrow-up fa-rotate-180' style='color: #ffffff;'></i></button>
                      <a href='../client/post.php?post_id=" . $post['post_id'] . "' class='btn btn-outline-primary'><i class='fa-regular fa-comment' style='color: #1e8c03;'></i></a>
                    </div>";

            if (isset($_SESSION['username']) && ($_SESSION['userID'] == $post['user_id'] || $_SESSION['username'] == 'admin')) 
            {
                echo "</div><div class='card-footer'>
                        <div class='d-flex justify-content-end'>
                          <button type='button' class='btn btn-danger btn-delete' data-post-id='" . $post['post_id'] . "'><i class='fa-sharp fa-solid fa-trash'></i></button>
                        </div>
                      </div>";
            }

            echo "</div></div>";
        }
    }
}
?>

<script src = ../client/js/postactions.js></script>