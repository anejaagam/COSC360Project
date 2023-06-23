<?php
session_start();

$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

$db = $connection;

if (isset($_GET['post_id'])) 
{
    $post_id = $_GET['post_id'];
    $query = "SELECT * FROM posts WHERE post_id = $post_id";
    $query2 = "SELECT posts.post_id, comments.comment_id, comments.comment_content, users.username, comments.comment_date, users.first_name, users.last_name FROM posts JOIN comments ON posts.post_id = comments.post_id JOIN users ON comments.user_id = users.user_id WHERE posts.post_id = $post_id ORDER BY comments.comment_date ASC";
    $result = mysqli_query($db, $query);
    $comments = mysqli_query($db, $query2);
    $post = mysqli_fetch_assoc($result);
} 
else 
{
    header("Location: ../client/mainpage.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post | PearEdit</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/stylesheetMain.css">
  <script src="https://kit.fontawesome.com/2ae3d21054.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="../client/mainpage.php"><span style="color: #409d29; font-size: 0.8em;">Back to Main Page</a></span>
    <div class="navbar-nav ml-auto">
      <?php
        if(isset($_SESSION['username']))
        {
            $username = $_SESSION['username'];
            echo "<span class = 'navbar-text mr-2'> Welcome: <a href = '../client/account.php'>" . $username . "</a></span>";
        }
        else
        {
          echo "<a class='btn btn-success mr-2' href='../client/loginform.php'>Login</a>";
          echo "<a class='btn btn-primary' href='../client/signup.php'>Sign Up</a>";
        }
      ?>
    </div>
  </nav>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
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
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createComment"><i class="fa-regular fa-comment" style="color: #1e8c03;"></i></button>
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
            </div>
          </div>
          <?php if (isset($_SESSION['username']) && ($_SESSION['userID'] == $post['user_id'] || $_SESSION['username'] == 'admin')) { ?>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
            </div>
          </div>
          <?php } ?>
          <?php foreach($comments as $comment) {?>
        <div class="card comment">
          <div class="card-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-1 p-0">
                  <img src="https://via.placeholder.com/50" alt="Profile Picture" class="rounded-circle">
                  </div>
                  <div class="col-md-4 commentinfo pl-0">
                    <p class="name"><?php echo $comment['first-name'] . ' ' . $comment['last_name']; ?></p>
                    <p class="username">@<?php echo $comment['username']; ?></p>
                  </div>
                  <div class="col-md-7 pr-0"><p class="content-date"><?php echo $comment['comment_date']; ?></p></div>
                 
              </div>
            </div>
            <p class="card-text mt-2 mb-0"><?php echo $comment['comment_content']; ?></p>
            
            <div class="btn-group post-btns">
              <button type="button" class="btn btn-success mr-2"><i class="fa-solid fa-arrow-up" style="color: #ffffff;"></i></button>
              <button type="button" class="btn btn-danger mr-2"><i class="fa-solid fa-arrow-up fa-rotate-180" style="color: #ffffff;"></i></button>
            </div>
          </div>
          <?php if (isset($_SESSION['username']) && ($_SESSION['username'] == $comment['username'] || $_SESSION['username'] == 'admin')) { ?>
          <div class="card-footer">
            <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-danger btn-delete" data-post-id="<?php echo $comment['comment_id']; ?>"><i class="fa-sharp fa-solid fa-trash"></i></button>            </div>
          </div>
          <?php } ?>
        </div>
        <?php } ?>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="createComment" tabindex="-1" aria-labelledby="creatComment" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header create-header">
          <h5 class="modal-title" id="CreateLabel">Comment on Post</h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-inline">
              <p  class="col-12 justify-content-start fw-bold">Post Title: <?php echo $post['post_title']; ?></p>
            </div>
            
            <div class="form-group">
            Commenting as: <?php echo($_SESSION['username'])?><br>
              <label for="comment-body" class="col-form-label">Comment:</label>
              <textarea class="form-control" id="comment-body"></textarea>
             
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary create-post" id='create'>Comment</button>
        </div>
      </div>
    </div>
  </div>
  <?php $_SESSION['post_id'] = $post['post_id']; ?>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
var post_id = "<?php echo $_SESSION['post_id']; ?>";
</script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/upvotedownvoteAjax.js"></script>
  <script src="js/comment.js" type="text/javascript"></script>
  <script src="js/commentValidation.js"></script>
</body>

</html>
