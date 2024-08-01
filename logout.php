<?php 
session_start();
session_destroy();
header("location:login.php?msg=5");
 ?>