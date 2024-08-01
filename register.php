<?php
    require_once('includes/connect_db.php');
    $sql= "SELECT * FROM tbl_crusher";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $crusher_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <?php include('includes/head.php'); ?>
        
    <title>สมัครสมาชิก</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="text-center mt-4"><img src="assets/images/logo.png" width="200px"></div>
                <div class="text-center text-white"><h2>ระบบบันทึกเที่ยวรถ</h2></div>
                <form class="row mt-3 bg-light p-3 rounded-3" action="includes/register_process.php" method="POST">
                    <h4 class="text-center mb-3">สมัครสมาชิก</h4>
                    <div class="col-sm-6">
                        <div class="form-floating mb-3">
                            <input type="text"  class="form-control form-control-sm" name="firstname" placeholder="Fristname" required>
                            <label for="firstname" class="floatingInput">ชื่อ</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating mb-3">
                            <input type="text"  class="form-control form-control-sm" name="lastname" placeholder="Lastname" required>
                            <label for="lastname" class="floatingInput">นามสกุล</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="text"  class="form-control form-control-sm" name="username" placeholder="Username" required>
                            <label for="username" class="floatingInput">Username</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <input type="password"  class="form-control form-control-sm" name="password" placeholder="Password" required>
                            <label for="password" class="floatingInput">Password</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating mb-3">
                            <select name="crusher" class="form-select" id="floatingSelect" required >
                                <option selected>เลือก Crusher</option>
                                <?php foreach($crusher_result as $crusher){ 
                                    echo "<option value=".$crusher['crusher_id'].">".$crusher['crusher_name']."</option>";
                                }?>
                            </select>
                            <label for="crusher" class="floatingSelect">ประจำอยู่ Crusher</label>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-3">
                        <input type="submit" class="btn btn-primary w-100" name="register" value="ตกลง">
                    </div>
                    <hr>
                    <div class="col-sm-12">
                        <div class="text-center"><a href="login.php">เข้าสู่ระบบ</a></div>
                    </div>
                </form>
                <hr>
                <div class="text-center text-white"><small>Developed by IT Department (Maemoh) <br> &copy; <?php echo date('Y'); ?> Sahakol Equipment PCL.</small></div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_GET['msg'])){
        if($_GET['msg'] == 1){
            echo '<script>
                    Swal.fire({
                        title: "เกิดข้อผิดพลาดในการสมัครสมาชิก",
                        text: "กรุณาติดต่อจนท.ผู้ดูแล",
                        icon: "error"
                    }).then((result) => {
                        setTimeout(function(){ location="register.php"; }, 500);
                    });
                </script>';
        }
    }
?>

