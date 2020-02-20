<?php
session_start();
//Check to see if they clicked on login-submit
if (isset($_POST['login-submit'])) {
    //script does not run without file -> 'require'
    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    $amount = $_POST['amount'];


    //Check if any field is empty
if (empty($mailuid) || empty($password))  {
   // header("Location: ../index.php?error=emptyfields");
    exit();
   }
   else {

        $sql = "SELECT idUsers, uidUsers, emailUsers, pwdUsers, accountAmount From users WHERE uidUsers=? OR emailUsers=? OR accountAmount=?;";
        $stmt = mysqli_stmt_init($conn);
         // Check if there is an error with sql
		 //echo "else -> connect to server.";
       if(!mysqli_stmt_prepare($stmt, $sql)) {
        // header("Location: ../index.php?error=sqlerror");
			//echo "If not prepare";
         exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "ssi", $mailuid, $mailuid, $amount);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_store_result($stmt);

            //Get number of rows
            $num_of_rows = mysqli_stmt_num_rows($stmt);
			if ($num_of_rows > 0) {
				
				
				

				//Bind result to variables
				mysqli_stmt_bind_result($stmt, $idUsers, $uidUsers, $emailUsers, $pwdUsers, $accountAmount);

				//Checks if user password and hash password match
			   // $pwdcheck = password_verify($password, $pwdUsers);
				//echo "else -> Connected to server and store results";

				// fetch values 
				//if(mysqli_stmt_fetch($stmt)){
					//echo "if fetch";
			

					// *What is needed is an if statement to check for rows*
					//$fetch = $sql->fetch(PDO::FETCH_ASSOC);
					//if (is_array($fetch)) {
						
			
			
				while($stmt->fetch()) {
					//echo "while fetch";
                //Checks if user password and hash password match
				$pwdcheck = password_verify($password, $pwdUsers);
                //Password does not match exit
					if ($pwdcheck == false) {
						// header("Location: ../index.php?error=wrongpwd");
						//echo "pwdcheck False";
						exit();
					} 
					else if ($pwdcheck == true) {
						//User put correct pwd and id
						session_start();
						$_SESSION['userId'] = $idUsers;
						$_SESSION['userUid'] = $uidUsers;
						$_SESSION['amount'] = $accountAmount;
						//echo "session has started";
						header("Location: ../welcome.php?login=success");
						exit();
					}
					else {
						//header("Location: ../index.php?error=elsewrongpwd");
						echo "else wrong pwd";
						exit();
					}
				}
			}
		
			//*else statment Needed once found a way to count rows*
          else {
               //Did not get user in database
               //header("Location: ../index.php?error=nouser");
			   //echo "not fetch";
               exit();
				}
			}
     }
 }

			
            //Password does not match exit
            /*if ($pwdcheck == false) {
                // header("Location: ../index.php?error=wrongpwd");
                  exit();
             } 
             else if ($pwdcheck == true) {
                 //User put correct pwd and id
                 session_start();
                 $_SESSION['userId'] = $idUsers;
                 $_SESSION['userUid'] = $uidUsers;
                 $_SESSION['amount'] = $accountAmount;
                 //header("Location: ../welcome.php?login=success");
                 exit();*/

    /* Old way -----------------------------------------------------
       //Check for user name or email
       $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=? OR accountAmount=?;";
       //Initialize new statement
       $stmt = mysqli_stmt_init($conn);

       // Check if there is an error with sql
       if(!mysqli_stmt_prepare($stmt, $sql)) {
       // header("Location: ../index.php?error=sqlerror");
        exit();
       }

       else {

           
           mysqli_stmt_bind_param($stmt, "ssi", $mailuid, $mailuid, $amount);
           mysqli_stmt_execute($stmt);
           //Can grab the results
                $result = mysqli_stmt_fetch($stmt);
           //$result = mysqli_stmt_get_result($stmt);
           //Check to see if result is empty or has an result
           if($row = mysqli_fetch_assoc($result)) {
            //See if the password matches with userid or emailid
            $pwdcheck = password_verify($password, $row['pwdUsers']);
            if ($pwdcheck == false) {
               // header("Location: ../index.php?error=wrongpwd");
                 exit();
            } 
            else if ($pwdcheck == true) {
                //User put correct pwd and id
                session_start();
                $_SESSION['userId'] = $row['idUsers'];
                $_SESSION['userUid'] = $row['uidUsers'];
                $_SESSION['amount'] = $row['accountAmount'];
                //header("Location: ../welcome.php?login=success");
                exit();*/ 
          
           


   
//<------ May need to be deleted

// User did not click on login-submit and got here by other means
else {
    //Send back to index page page if got there w/out clicking on signup button
    //When logging in this is where it is taking me
    //header("Location: welcome.php?login=success");
    //exit();
}
?>