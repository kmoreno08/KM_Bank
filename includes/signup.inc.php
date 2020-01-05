//KM_Bank signup
<?php
//User tried to signup using the sign up form
if(isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

//Check if any field is empty
if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat))  {
 header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
 exit();
}
//Check for valid mail and Username
else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invalidmailuid");
    exit();
}

//Check for valid email
 else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
 }

 //Check for valid Username
 else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
 }
 //Check if passwords are the same, if not error
 else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
 }
 else {
     //Checks to see if the username is already in database
     $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
     // Connects to database
     $stmt = mysqli_stmt_init($conn);
     //Check error - see if connection fail
      if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
    exit();
      }
      else {
          //Take information from user and send it to database later
          mysqli_stmt_bind_param($stmt, "s", $username);
          // execute statment in to database, now will run
          mysqli_stmt_execute($stmt);
          // stores result in variable $stmt if there is a match- Fetch information
          mysqli_stmt_store_result($stmt);
          //How many results we have the same as $stmt -> Results returns as rows
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if ($resultcheck > 0) {
            header("Location: ../signup.php?error=usertaken&mail=".$email);
            exit();
          } 
          else {
              // Insert values in to columns. Need "?" for security.
              // $resultCheck == 0 -> enter info to database.
              //idUsers-> Increment, Type InnoDB, name users
              $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              //Check if error in SQL, If no error then insert info.
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../signup.php?error=sqlerror");
                exit();
              } // No SQL Error, insert info
              else {
                  //Need to hash password -> BCrypt
                  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                //Take information from user and send it to database later
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          // execute statment in to database, now will run
          mysqli_stmt_execute($stmt);
          header("Location: ../signup.php?signup=success");
                exit();
              }
          }
        }
    }

    //Close to save resources from the website.
    mysqli_stmt_close($stmt);
    mysqli_close($conn);


}
else {
    //Send back to signup page if got there w/out clicking on signup button
    header("Location: ../signup.php");
    exit();
}