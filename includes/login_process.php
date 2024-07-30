<?php
//ตรวจสอบปุ่ม login และ ตรวจสอบว่ามีค่า username และ password ที่ส่งมาหรือไม่
if(isset($_POST['login'])&& !empty($_POST['username']) && !empty($_POST['password'])){

    //เรียกไฟล์ connect_db.php
    require_once('connect_db.php'); 

    //เก็บค่า username ที่ส่งมา
    $username= $_POST['username'];
    //เก็บค่า password ที่ส่งมา 
    $password= $_POST['password'];

    $sql = "SELECT * FROM tbl_users
            WHERE username = :username
            AND password = :password";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $username_rersult = $stmt->fetch(PDO::FETCH_ASSOC);

    if($username_rersult){

        if(password_verify($password, $username_rersult['password'])){
            //เก็บค่า username และ password ที่ส่งมา
            $_SESSION['username'] = $username;
            header('location: ../home.php');
        }else{
            //error password ไม่ถูกต้อง
            header('location: ../login.php?error=3');
        }

    }else{
        // error ไม่พบ Username
        header('location: ../login.php?error=2');
    }

}else{
    // error กรอกข้อมูลไม่ครบ
    header('location: ../login.php?error=1');

}
 ?>