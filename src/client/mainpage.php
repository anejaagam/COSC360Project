<?php
session_start(); 
$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | PearEdit</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href = "css/stylesheetMain.css">
  <script src="https://kit.fontawesome.com/2ae3d21054.js" crossorigin="anonymous"></script>
  <script src="../client/js/ajaxSearch.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><span style="color: #409d29;">PearEdit</a></span>
    <form class="form-inline mx-auto">
      <input class="form-control mr-sm-2" id = "search-input" type="search" placeholder="Search" aria-label="Search">
    </form>
    <div class="navbar-nav ml-auto">
      <?php
        if(isset($_SESSION['username']))
        {
          $username = $_SESSION['username'];
          $username_clean = mysqli_real_escape_string($connection, $username);
          $query = "SELECT * FROM users WHERE username = '$username_clean'";
          $result = mysqli_query($connection, $query);
        
          if ($result) {
            $user = mysqli_fetch_assoc($result);
            $user_id = $user['user_id'];
            $_SESSION['userID'] = $user_id;
            if ($_SESSION['username'] == 'admin')
            {
              echo "<a class='btn btn-success mr-2' href='../client/admin.php'>Admin</a>";
            }else{
            echo "<span class = 'navbar-text mr-2'> Welcome: <a href = '../client/account.php'>" . $username . "</a></span>";}
          } else {
            // Handle query error here
            echo "Error: " . mysqli_error($connection);
          }
        }
        
        else
        {
          echo "<a class='btn btn-success mr-2' href='../client/loginform.php'>Login</a>";
          echo "<a class='btn btn-primary' href='../client/signup.php'>Sign Up</a>";
        }
      ?>
    </div>
  </nav>
<!--make a for loop that goes through all the posts in the database and displays them-->

<?php
// Connect to the database
$db = $connection;

// Fetch all posts
$query = "SELECT * FROM posts;";
$posts = mysqli_query($db, $query);


?>
<div class="container mt-5">
    <div class="row">
     <?php if (!isset($_SESSION['username'])){ echo("<div class='col-md-2'></div>");}?>
      <div class="col-md-8">
        <?php foreach($posts as $post) { ?>
        <div class="card mb-4">
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 card-title">
                <?php echo $post['post_title'];?> 
                </div>
              </div>
            </div>
            <p class="card-text"><?php echo $post['post_content']; ?></p>
            <div class="btn-group">
            <?php if (isset($_SESSION['username'])) { ?>
                <button type="button" class="btn btn-success mr-2 btn-upvote" data-post-id="<?php echo $post['post_id']; ?>">
                  <i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i>
                  <span class="vote-status"></span>
                </button>
                <button type="button" class="btn btn-danger mr-2 btn-downvote" data-post-id="<?php echo $post['post_id']; ?>">
                  <i class="fa-solid fa-arrow-up fa-rotate-180" style="color: #ffffff;"></i>
                  <span class="vote-status"></span>
                </button>
            <?php } else { ?>
                <button type="button" class="btn btn-success mr-2 btn-upvote" data-post-id="<?php echo $post['post_id']; ?>" disabled>
                  <i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i>
                  <span class="vote-status"></span>
                </button>
                <button type="button" class="btn btn-danger mr-2 btn-downvote" data-post-id="<?php echo $post['post_id']; ?>" disabled>
                  <i class="fa-solid fa-arrow-up fa-rotate-180" style="color: #ffffff;"></i>
                  <span class="vote-status"></span>
              </button>
            <?php } ?>
              <!-- gets the post id so we can refer to it in the post.php file -->
              <a href="../client/post.php?post_id=<?php echo $post['post_id']; ?>" class="btn btn-outline-primary"><i class="fa-regular fa-comment" style="color: #1e8c03;"></i></a>
            </div>
          </div>
          <?php if (isset($_SESSION['username']) && ($_SESSION['userID'] == $post['user_id'] || $_SESSION['username'] == 'admin')) { ?>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
              <button type="button" class="btn btn-danger btn-delete" data-post-id="<?php echo $post['post_id']; ?>"><i class="fa-sharp fa-solid fa-trash"></i></button>
            </div>
          </div>
          <?php } ?>
        </div>
        <?php

}


      ?>
      </div>
      <?php if (isset($_SESSION['username'])){?>
      <div class="col-md-4">
        <button type="button" class="btn btn-primary btn-block btn-create" data-toggle="modal" data-target="#CreatPost"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Create Post</button>
      </div>
      <?php } ?>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="CreatPost" tabindex="-1" aria-labelledby="CreatePost" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header create-header">
          <h5 class="modal-title" id="CreateLabel">Create Post</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-inline">
              <label for="post-title" class="col-form-label col-3">Post Title:</label>
              <input type="text" class="form-control col-9" id="post-title" >
            </div>
            
            <div class="form-group">
            Posting as: <?php echo($_SESSION['username'])?><br>
              <label for="post-body" class="col-form-label">Post Body:</label>
              <textarea class="form-control" id="post-body"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary create-post" id='create'>Create Post</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/postactions.js"></script>
  <script src="js/upvotedownvoteAjax.js"></script>
  <script src="js/ajaxSearch.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/createPostValidation.js"></script>

</body>

</html>