<?php 
session_start();
session_unset();
setcookie("login","",time()-1);
session_destroy();

header("Location: login.php");
?>