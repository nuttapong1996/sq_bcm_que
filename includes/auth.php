<?php
    session_start();
    //เช็คว่ามี SESSION Email มาหรือไม่
    if(!isset($_SESSION['username'])){
        header("location:login.php");
        exit;
    }
?>