<!--KM_Bank Header.php-->
<?php
//Start up PHP session
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="scss/style.css" />
    <title>KM || Bank</title>
  </head>
  <body>
  
   <!--Use PHP to show different buttons at different states -->
        <?php 
            //Logged in - will show logout form
			// Still needs to be created with deposit and logout button
         //   if (isset($_SESSION['userId'])){
           //     echo '<form action="includes/logout.inc.php" method="post">
           //     <button type="submit" name="logout-submit">Logout</button>
           // </form>';
          //  }
            // Logged out of website - will show login button and signup button
      //  else {
      //          echo ' <div class="loginbox">
     // <i class="fas fa-user-circle fa-4x"></i>
     // <h1>Login Here</h1>
     // <form>
      //  <p>Username</p>
      //  <input type="text" name="" placeholder="Enter Username" />
      //  <p>Password</p>
      //  <input type="password" name="" placeholder="Enter Password" />
      //  <input type="submit" name="" value="Login" />
      //  <a href="#">Forgot password?</a><br />
      //  <a href="signup.html">Not Enrolled? Sign Up Now.</a>
      //</form>
    //</div>';
      //      }

        ?> 