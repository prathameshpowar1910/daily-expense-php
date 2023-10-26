<?php
require('config.php');
session_start();
$errormsg = "";
if (isset($_POST['email'])) {

  $email = stripslashes($_REQUEST['email']);
  $email = mysqli_real_escape_string($con, $email);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con, $password);
  $query = "SELECT * FROM `users` WHERE email='$email'and password='" . md5($password) . "'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $rows = mysqli_num_rows($result);
  if ($rows == 1) {
    $_SESSION['email'] = $email;
    header("Location: index.php");
  } else {
    $errormsg  = "Wrong";
  }
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

    body {
      color: #000;
      background: #00000030;
      font-family: 'Poppins', sans-serif;
    }

    .login-form {
      width: 500px;
      margin: 50px auto;
      font-size: 15px;
      
    }

    .login-form form {
      margin-bottom: 15px;
      background: #F5F5F5;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      padding: 30px;
      border: 2px solid #ddd;
      border-radius: 15px;
      filter:drop-shadow(4px 4px 5px black);
    }

    .login-form h2 {
      color: #072541;
      margin: 0 0 15px;
      position: relative;
      text-align: center;
    }

    .login-form .hint-text {
      color: #45474B;
      margin-bottom: 30px;
      text-align: center;
      font-size:20px
    }

    .login-form a:hover {
      text-decoration: none;
    }

    .form-control,
    .btn {
      min-height: 38px;
      border-radius: 8px;
    }


    .btn {
      font-size: 15px;
      font-weight: bold;
      /* border-radius: 0px; */
      border-radius: 15px;
    }
  </style>
</head>

<body>
  <div class="login-form">
    <form action="" method="POST" autocomplete="off">
      <h2 class="text-center">BudgetBuddy</h2>
      <p class="hint-text">Login Here</p>
      <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Email" required="required">
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-success btn-block" style="border-radius:0%;">Login</button>
      </div>
      <!-- <div class="clearfix">
        <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
        
      </div> -->
    </form>
    <p class="text-center">Don't have an account?<a href="register.php" class="text-danger"> Register Here</a></p>
  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="js/jquery.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<script>
  feather.replace()
</script>

</html>