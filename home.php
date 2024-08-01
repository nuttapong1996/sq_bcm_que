<?php
require_once 'includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('includes/head.php'); ?>
    <link rel="stylesheet" href="css/style.css">
    <title>Test</title>
</head>
<body>
    <h1>สวัสดี <?php echo $_SESSION['username']; ?></h1>
    <h3>คุณ <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></h3>
    <h3>Role : <?php echo $_SESSION['role'].'<br> Crusher No : '.$_SESSION['crusher']; ?></h3>
    <a href="logout.php?mgs=0"><input class="btn btn-danger" type="button" value="ออกจากระบบ"></a>
</body>
</html>