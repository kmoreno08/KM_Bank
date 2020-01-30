<?php
if (isset($_POST["reset-password-submit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../index.php?newpwd=empty");
        exit();
    } else if ($password != $passworRepeat) {
        header("Location: ../create-new-password.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require 'dbh.inc.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
     $stmt = mysqli_stmt_init($conn);
     //If it does not succeed 
     if (!mysqli_stmt_prepare($stmt, $sql)){
         echo "There was an error";
         exit();
     } else {
         mysqli_stmt_bind_param($stmt, "s", $userEmail);
         mysqli_stmt_execute($stmt);

         $result = mysqli_stmt_get_result($stmt);

         //did not grab any rows
         if(!$row = mysqli_fetch_assoc()){
            echo "Need to re-submit your reset request.";
        //input information
         } else {
            
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            //Token Check
            if ($tokenCheck === false){
                echo "need to re-submit your reset request.";
                exit();

            //Update password
            } elseif($tokenCheck === true) {
                
                $tokenEmail = $row['pwdResetEmail'];


                //Error if did not connect to database
                $sql = "SELECT * FROM users WHERE emailUsers=?;";
                $stmt = mysqli_stmt_init($conn);
                //If it does not succeed 
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "There was an error";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                   

                    $result = mysqli_stmt_get_result($stmt);
           
                    //did not grab any rows
                    if(!$row = mysqli_fetch_assoc()){
                       echo "There was an error.";
                       exit();

                //update password
                } else {
                    $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";

                     //If it does not succeed 
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        echo "There was an error";
                        exit();
                    //Hash password
                    } else {
                        $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                        mysqli_stmt_execute($stmt);


                        // Delete token
                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($conn);

                        //If it does not succeed 
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            echo "There was an error";
                            exit();
                        
                        } else {
                            mysqli_stmt_bind_param($stmt, "s" $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../index.php?newpwd=passwordupdated");
                        }
                    }

                }
            }
        }

    }

} else {
    header("Location: ../index/php");
}
?>