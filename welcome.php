<?php
    include('includes/dbh.inc.php'); 
    session_start();
?>
<?php
 //Check for account amount change
if(isset($_POST['amount-submit'])){
  //include('includes/dbh.inc.php'); 
  // Get form data
  $amount = mysqli_real_escape_string($conn, $_POST['newAccountAmount']);
  $update_uid_user = mysqli_real_escape_string($conn, $_SESSION['userUid']);
  $currentUser = $_SESSION['userUid'];
  $query = "UPDATE users SET 
    accountAmount='$amount'
    WHERE uidUsers = '" . $update_uid_user . "'";

  if(mysqli_query($conn, $query)){
  
    $_SESSION['amount'] = $amount;
    //header('Location: http://localhost/KM_bank/welcome.php?login=success');
    
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}
?>
<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="scss/welcome.css" />
      <title>|| Welcome || </title>
   </head>

   <body>
     <div class="infobox-img">
  <div class="infobox_container">       
         <!--Info Box -->
       <div class="infobox">
      <i class="fas fa-user-edit fa-4x"></i>
      <h1>Welcome <?php echo $_SESSION['userUid']; ?>!</h1>
      
      <h3>Your current Amount is : $<?php echo $_SESSION['amount'] ?></h3> 

      <!--//User can enter new amount-->
      <div class="form-wrapper">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <h6>Please enter new amount in your bank account: </h6>
        <input type="number" name="newAccountAmount" value = "<?php echo $_SESSION['amount'];?>"><br>
        <input type="submit" name="amount-submit" value="Submit Amount">
        <a href = "index.php">
        <input type="button" name="sign-out" value="Sign Out">
        </a>
        
      </form>
      </div>
    </div>
</div>
</div>
<div class="db-info-container">

      <h2>Below are all the usernames and emails currently in the database:</h2>
      <h5>*Can only change the amount in logged account.</h5>
      <!--Show accounts in database-->
      <?php 
         $sql = "SELECT * FROM users;";
         $result = mysqli_query($conn, $sql);
         $resultCheck = mysqli_num_rows($result);
        //looping through database printing all accounts
         if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                  echo $row['uidUsers'] . " - " .  $row['emailUsers'] . " - Total amount in account is $" . $row['accountAmount'] . "<br>";
            }
         }
         ?>
      </br>
        </div>
<?php
  require "footer.php";
?>