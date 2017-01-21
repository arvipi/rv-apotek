<?php

session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Apotek</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
<link rel="stylesheet" href="https://bootswatch.com/lumen/bootstrap.min.css">
<!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> -->
<!-- <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style media="screen">
  .center {
    text-align: center;
  }
  .teal {
    background-color: teal;
  }
  .skyblue {
    background-color: #75caeb;
  }
</style>
<script type="text/javascript" src="jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="validation.min.js"></script>
<!-- <link href="style.css" rel="stylesheet" type="text/css" media="screen"> -->
<script type="text/javascript" src="script.js"></script>

</head>

<body class="skyblue">

<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <div id="error">
      <!-- error will be shown here ! -->
      </div>
      <form method="post" class="form-signin" id="login-form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block" name="btn-login" id="btn-login">Sign in</button>
      </form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

</body>
</html>
