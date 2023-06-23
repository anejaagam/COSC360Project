<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel = "stylesheet" href = "css/styles.css">
  <script src="../js/validateResetPassword.js"></script>
  <title>Reset Password | PearEdit</title>
</head>

<body>
<a href = "../client/loginform.php"><h1 class="title">< Back</h1></a>
  
  <div class="container">
    <h2 class="form-heading">Reset Password</h2>
    <form method = "POST" action = "../server/resetpassword.php" id = "resetPasswordForm">
    <div class="form-group">
        <input type="text" class="form-control" name = "username" id="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" placeholder="Email" name="Email" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="newpassword" placeholder="New Password" name="newpassword" required>
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary form-button">Reset</button>
      </div>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
