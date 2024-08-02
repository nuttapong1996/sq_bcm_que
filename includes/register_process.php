<?php 
//เช็คว่ามีการกดปุ่ม register หรือไม่
if(isset($_POST['register'])){
    //เรียกไฟล์ connect_db.php
    require_once('connect_db.php');

    //เก็บค่า username ที่ส่งมา
    $username= $_POST['username'];
    //เก็บค่า password ที่ส่งมา
    $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
    //เก็บค่า firstname ที่ส่งมา
    $firstname= $_POST['firstname'];
    //เก็บค่า lastname ที่ส่งมา
    $lastname= $_POST['lastname'];
    //เก็บค่า crusher ที่ส่งมา
    $crusher= $_POST['crusher'];

    $sql = "INSERT INTO tbl_users (
                        username, 
                        password, 
                        firstname, 
                        lastname,
                        role, 
                        crusher_id) 
                    VALUES (
                    :username, 
                    :password, 
                    :firstname, 
                    :lastname,
                    'g', 
                    :crusher)";

    $stmt = $conn->prepare($sql);
    
    //ผูกค่าที่ส่งมากับตัวแปร bindParam
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $stmt->bindParam(':crusher', $crusher, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt){

        //สมัครสมาชิกสําเร็จ ไปหน้าหลักและแสดงข้อความ
        header('location: ../login.php?msg=1');
    }else{
        //สมัครสมาชิกไม่สําเร็จ
        header('location: ../register.php?msg=1');
    }
}else{
    //กรอกข้อมูลไม่ครบ
    header('location: ../register.php?msg=1');
}

?>