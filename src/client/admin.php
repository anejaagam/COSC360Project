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
    if (isset($_SESSION['username'])) 
    {
        $accountUsername = $_SESSION['username'];

        $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $accountUsername);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) 
        {
            $stmt2 = mysqli_prepare($connection, "SELECT * FROM users WHERE username != ?");
            mysqli_stmt_bind_param($stmt2, "s", $accountUsername);
            mysqli_stmt_execute($stmt2);
            $result = mysqli_stmt_get_result($stmt2); 
        }
        else 
        {
            header('Location: ../client/mainpage.php');
            exit();
        }
    } 
    else 
    {
        header('Location: ../client/mainpage.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/2ae3d21054.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
  <title>Account | PearEdit</title>
</head>

<body>
  <nav>

    <h1 class="title"><a href="mainpage.php" class="title">PearEdit</a></h1>

    <a class='btn btn-primary form-logout' href='../server/logout.php'>Logout</a>
  </nav>
  <div class="container">
    <?php foreach($result as $row) { ?>
      <div class = 'users'>
    <div class="row">
      
            <h5 class="card-title col-10"><?php echo $row['username']; ?></h5>
            <button type="button" class="btn btn-danger btn-delete col-2" data-post-id="<?php echo $row['user_id']; ?>"><i class="fa-sharp fa-solid fa-trash"></i></button>
            </div><div class="row">
            <p class="card-text col-2"><?php echo $row['first_name']; ?></p>
            <p class="card-text col-2"><?php echo $row['last_name']; ?></p>
            <p class="card-text col-4"><?php echo $row['email']; ?></p>
    
            
          </div>
    </div>
      <?php } ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/adminactions.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
