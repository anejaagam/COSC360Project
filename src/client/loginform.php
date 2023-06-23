<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "css/styles.css">
  <title>Login | PearEdit</title>
</head>

<body>
<a href = "../client/mainpage.php"><h1 class="title">PearEdit</h1></a>
  
  <div class="container">
    <h2 class="form-heading">Login</h2>
    <form method = "POST" action = "../server/loginprocess.php">
      <div class="form-group">
        <input type="text" class="form-control" name = "username" id="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name = "password" id="password" placeholder="Password" required>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary form-button">Login</button>
        <p class="text-left mb-0"><a class="green-text" href="../client/resetpassform.php">Forgot password?</a></p>
      </div>
      <p class="form-text" style = "text-align: center">New to PearEdit? <a class="green-text" href="../client/signup.php">Sign up here!</a></p>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
