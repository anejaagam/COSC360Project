<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>Sign Up | PearEdit</title>
</head>

<body>
<a href = "../client/mainpage.php"><h1 class="title">PearEdit</h1></a>

  <div class="container">
    <h2 class="form-heading">Sign Up</h2>
    <form id="signupForm" method="POST" action="../server/signupprocess.php">
      <div class="form-group">
        <input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" id="confirmpass" placeholder="Confirm Password" name="confirmpass">
      </div>
      <div class="d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary form-button">Let's Go!</button>
      </div>
      <p class="form-text" style="text-align: center">Already Have an Account? <a class="green-text" href="../client/loginform.php">Log in here!</a></p>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="js/validateSignupForm.js"></script>
</body>

</html>
