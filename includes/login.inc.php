//KM_Bank
<?php

//Check to see if they clicked on login-submit
if (isset($_POST['login-submit'])) {
    //script does not run without file -> 'require'
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $amount = $_POST['amount'];


    //Check if any field is empty
if (empty($mailuid) || empty($password))  {
    header("Location: ../index.php?error=emptyfields");
    exit();
   }
   else {
       //Check for user name or email
       $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=? OR accountAmount=?;";
       //Initialize new statement
       $stmt = mysqli_stmt_init($conn);

       // Check if there is an error with sql
       if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=sqlerror");
        exit();
       }

       else {
           mysqli_stmt_bind_param($stmt, "ssi", $mailuid, $mailuid, $amount);
           mysqli_stmt_execute($stmt);
           //Can grab the results
           $result = mysqli_stmt_get_result($stmt);

           //Check to see if result is empty or has an result
           if($row = mysqli_fetch_assoc($result)) {
            //See if the password matches with userid or emailid
            $pwdcheck = password_verify($password, $row['pwdUsers']);
            if ($pwdcheck == false) {
                header("Location: ../index.php?error=wrongpwd");
                 exit();
            } 
            else if ($pwdcheck == true) {
                //User put correct pwd and id
                session_start();
                $_SESSION['userId'] = $row['idUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];
                $_SESSION['amount'] = $row['accountAmount'];
                header("Location: ../welcome.php?login=success");
                exit();
            }
            //Incase $pwdcheck is not a bool
            else {
                header("Location: ../index.php?error=elsewrongpwd");
                exit();
            }

           }
           else {
               //Did not get user in database
               header("Location: ../index.php?error=nouser");
               exit();
           }
       }
   }
}

// User did not click on login-submit and got here by other means
else {
    //Send back to index page page if got there w/out clicking on signup button
    //When logging in this is where it is taking me
    header("Location: welcome.php?login=success");
    //exit();
}

?>