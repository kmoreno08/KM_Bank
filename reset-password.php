

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

    

      
    <!-- Reset Password -->
    <div class="loginbox">
      <i class="fas fa-unlock-alt fa-4x"></i>
      <h1>Reset your Password</h1>
      <form action="includes/reset-request.inc.php" method="post">
        <p>An email will be sent to you with instuctions.</p>
        <input type="text" name="email" placeholder="Enter your e-mail address..." />
        <button type="submit" name="reset-request-submit">Receive new password by email</button>
        <?php
            if(isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p class="signupsuccess">Check your e-mail!</p>';
                }
            }
            ?>
      </form>
    </div>

       

   
