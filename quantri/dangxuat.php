<?php
session_start();
session_destroy();
setcookie("id",0);
setcookie("tk","");
header('location:index.php');
?>