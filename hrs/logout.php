<?php 
//ob_start();
session_start();
session_destroy();
//header("Localhost:login.php");
header("Location: login.php");
exit;
?>
