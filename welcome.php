<?php
    include('login.inc.php');
    include('dbh.inc.php');
    session_start();

    $user_check = $_SESSION['userID'];
    $ses_sql = mysqli_query($dBName, "SELECT userID from users from where userID = '$user_check'");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['userID'];

    if(!isset($_SESSION['userId'])){
        header("location:login.inc.php");
        die();
     }


?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <h2><a href = "index.php">Sign Out</a></h2>
   </body>
   
</html>