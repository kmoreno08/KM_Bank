

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="scss/style.css" />
    <title>KM || Password</title>
  </head>
  <body>

    

      
      <!-- Create New Password -->
      <div class="loginbox">
      <i class="fas fa-user-circle fa-4x"></i>

      <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector) || empty($validator)) {
            echo "Could not validate your request";
        } else {
            if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>


                <form action="includes/reset-password.inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>;">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>;">
                    <input type="password" name="pwd" placeholder="Enter a new password...">
                    <input type="password" name="pwd-repeat" placeholder="Repeat new password...">
                    <button type="submit" name="reset-password-submit">Reset Password</button>
                </form>
                <?php
            }
        }
      ?>
      <h1>Login Here</h1>
      <form action="includes/login.inc.php" method="post">
        <p>Username</p>
        <input type="text" name="mailuid" placeholder="Enter Username" />
        <p>Password</p>
        <input type="password" name="pwd" placeholder="Enter Password" />
        <input type="submit" name="login-submit" value="Login" />
        <a href="reset-password.php">Forgot password?</a><br />
        <a href="signup.php">Not Enrolled? Sign Up Now.</a>
      </form>
    </div>
