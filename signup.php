
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
    <link rel="stylesheet" href="scss/signup.css" />
    <title>KM || Signup</title>
  </head>
  <body>
  
  
  <?php
    //Checks for error in the URL 
        if(isset($_GET['error'])) {
            //Error equals emptyfields then show message
            if($_GET['error'] == "emptyfields") {
                echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if($_GET['error'] == "invaliduidmail") {
                echo '<p class="signuperror">Invalid username and e-mail!</p>';
            }
            else if($_GET['error'] == "invaliduid") {
                echo '<p class="signuperror">Invalid username!</p>';
            }
            else if($_GET['error'] == "invalidmail") {
                echo '<p class="signuperror">Invalid e-mail!</p>';
            }
            else if($_GET['error'] == "passwordcheck") {
                echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if($_GET['error'] == "usertaken") {
                echo '<p class="signuperror">Username is already taken!</p>';
            }
        }
        else {
           //Success statement  -> if ($_GET['signup'] == "success")
          //  echo '<p class="signuperror">Success!</p>';
            //header("Location: ../signup.php?error=invalidmailuid");
            
        }
    ?>
      
  
  <!-- login system-->
    <div class="bg-img">
      <div class="loginbox signup-box">
        <i class="fas fa-user-circle fa-4x"></i>
        <h1>Signup Here</h1>
        <form action="includes/signup.inc.php" method="post">
          <p>Username</p>
          <input type="text" name="uid" placeholder="Enter Username" />
          <p>Email</p>
          <input type="text" name="mail" placeholder="Enter E-mail" />
          <p>Password</p>
          <input type="password" name="pwd" placeholder="Enter Password" />
          <p>Repeat Password</p>
          <input type="password" name="pwd-repeat" placeholder="Repeat Password" />
          <input type="submit" name="signup-submit" value="Login" />
         <!-- <p class="signuperror"></p>-->
          <a href="index.php">Already enrolled? Sign in now.</a><br />
        </form>
      </div>
    </div>
	
	
	
	
	<!-- Use as reference. form class -->
	<!--<form class="form-signup" action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <button type="submit" name="signup-submit">Signup</button>

       </form>
        </section>
        </div>
    </main> -->

    <script
      src="https://kit.fontawesome.com/eb64753d4d.js"
      crossorigin="anonymous"
    ></script>
  </body>
  <footer>
    <div class="footer-wrapper">
      <h2>Connect with us</h2>
      <div class="icon-wrapper">
        <a class="footer-btn-icon" href="https://www.facebook.com">
          <i class="fab fa-facebook-square fa-2x"></i
        ></a>
        <a class="footer-btn-icon" href="https://www.instagram.com">
          <i class="fab fa-instagram fa-2x"></i
        ></a>
        <a class="footer-btn-icon" href="https://www.linkedin.com">
          <i class="fab fa-linkedin fa-2x"></i
        ></a>
        <a class="footer-btn-icon" href="https://www.pinterest.com">
          <i class="fab fa-pinterest-square fa-2x"></i
        ></a>
        <a class="footer-btn-icon" href="https://www.twitter.com">
          <i class="fab fa-twitter-square fa-2x"></i
        ></a>
        <a class="footer-btn-icon" href="https://www.youtube.com">
          <i class="fab fa-youtube fa-2x"></i
        ></a>
      </div>
      <p>&copy; 2019 KM Corporation. All rights reserved.</p>
    </div>
	
  </footer>
</html>
  
