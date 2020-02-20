//KM_Bank logout
<?php

session_start();
session_unset();
session_destroy();
//Goes back to home page
//header("Location: ../index.php?logout=success");
echo '<p class="login-status">You are logged out! Test</p>';

?>