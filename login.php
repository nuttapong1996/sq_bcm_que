<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/head.php'); ?>
    <title>Document</title>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center mt-4"><img src="assets/images/logo.png" width="200px"></div>
                <div class="text-center"><h1>ระบบบันทึกเที่ยวรถ</h1></div>
                <form class="mt-3 bg-light p-3 rounded-3 shadow-lg" action="includes/login_process.php" method="POST">
                <h3 class="text-center mb-3">Login</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                        <label class="floatingInput" for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Username">
                        <label class="floatingInput" for="password">Password</label>
                    </div>
                   
                    <div class="form-group mb-3 d-flex justify-content-between">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">จดจำฉัน</label>
                        </div>
                        <a href="register.php" class="btn btn-link">ลืมรหัสผ่าน ?</a>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    <hr>
                    <div class="text-center"><a href="register.php">สมัครสมาชิก</a></div>
                </form>
                <hr>
                <div class="text-center"><small>Developed by IT Department (Maemoh) <br> &copy; <?php echo date('Y'); ?> Sahakol Equipment PCL.</small></div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_GET['error'])){
        if($_GET['error'] == 1){
            echo '<script>
                        Swal.fire({
                            title: "Username หรือ Password <br> ไม่ถูกต้อง",
                            text: "กรุณาตรวจสอบอีกครั้ง",
                            icon: "error"
                        }).then((result) => {
                            location="login.php";
                        });
                    </script>';
        }
    }
?>