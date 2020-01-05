//KM_Bank logout
<?php

session_start();
session_unset();
session_destroy();
//Goes back to home page
header("Location: ../index.php")

?>