<?php
session_start();

$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";

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
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $email = $row['email'];
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
  <link rel="stylesheet" href="css/styles.css">
  <title>Account | PearEdit</title>
</head>

<body>
  <nav>

    <h1 class="title"><a href="mainpage.php" class="title">PearEdit</a></h1>

    <a class='btn btn-primary form-logout' href='../server/logout.php'>Logout</a>
  </nav>
  <div class="container">
    <form method="POST" action="../server/processchange.php" id = "accountChange">
      <div class="form-inline account-info">
        <label for="username" class="col-6" style="justify-content: start;"> <?php echo "Username: " . $accountUsername; ?> </label>
        <input type="text" class="form-control col-6" id="username" placeholder="Change User" name="username">
      </div>
      <div class="form-inline account-info">
        <label for="email" class="col-6" style="justify-content: start;">Email</label>
        <label for="email" class="col-6" style="justify-content: start;"><?php echo $email; ?></label>
      </div>
      <div class="form-inline account-info">
        <label for="name" class="col-6" style="justify-content: start;"> <?php echo "First Name: ". $firstname; ?> </label>
        <input type="text" class="form-control col-6" id="first_name" placeholder="Change First Name" name="first_name" >
      </div>
      <div class="form-inline account-info">
        <label for="name" class="col-6" style="justify-content: start;"> <?php echo "Last Name: " . $lastname; ?> </label>
        <input type="text" class="form-control col-6" id="last_name" placeholder="Change Last Name" name="last_name">
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary form-button">Save Changes</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/validateAccountChange.js"></script>
</body>

</html>
