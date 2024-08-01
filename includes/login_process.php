<?php
session_start();
//ตรวจสอบปุ่ม login และ ตรวจสอบว่ามีค่า username และ password ที่ส่งมาหรือไม่
if(isset($_POST['login'])){

    //เรียกไฟล์ connect_db.php
    require_once('connect_db.php'); 

    //เก็บค่า username ที่ส่งมา
    $username= $_POST['username'];
    //เก็บค่า password ที่ส่งมา 
    $password= $_POST['password'];

    $sql = "SELECT 
                a.username , a.password , a.firstname , a.lastname , a.role , b.crusher_name 
            FROM 
                tbl_users as a , 
                tbl_crusher as b
            WHERE a.crusher_id = b.crusher_id
            AND
                username = :username";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $username_rersult = $stmt->fetch(PDO::FETCH_ASSOC);

    //ตรวจสอบว่ามี username อยู่ในระบบหรือไม่
    if($username_rersult){

        //ตรวจสอบว่า password ที่รับมากับ password ที่เก็บในฐานข้อมูล  
        if(password_verify($password, $username_rersult['password'])){

            //เก็บค่าที่ส่งมาลง SESSION 
            $_SESSION['username'] = $username_rersult['username'];
            $_SESSION['firstname'] = $username_rersult['firstname'];
            $_SESSION['lastname'] = $username_rersult['lastname'];
            $_SESSION['role'] = $username_rersult['role'];
            $_SESSION['crusher'] = $username_rersult['crusher_name'];

            //login สําเร็จ
            header('location: ../login.php?msg=0');
        }else{
            //error password ไม่ถูกต้อง
            header('location: ../login.php?msg=4');
        }

    }else{
        // error ไม่พบ Username
        header('location: ../login.php?msg=3');
    }

}else{
    // error กรอกข้อมูลไม่ครบ
    header('location: ../login.php?msg=2');

}
 ?>