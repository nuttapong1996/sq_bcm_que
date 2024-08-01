<?php 
// require_once('.env');
// // function หลดไฟล์ .env
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new Exception('The .env file does not exist.');
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue; // Skip comments
        }

        list($key, $value) = explode('=', $line, 2);

        $key = trim($key);
        $value = trim($value);

        if (!array_key_exists($key, $_ENV)) {
            $_ENV[$key] = $value;
        }

        if (!array_key_exists($key, $_SERVER)) {
            $_SERVER[$key] = $value;
        }
    }
}

try{
    // ใช้งานฟังก์ชัน loadEnv
    loadEnv(__DIR__ . '/.env');
    
    //ตั้งค่าการเชื่อมต่อฐานข้อมูล
    $db_host = $_ENV['DB_HOST'];
    $db_user = $_ENV['DB_USERNAME'];
    $db_pass = $_ENV['DB_PASSWORD'];
    $db_name = $_ENV['DB_DATABASE'];
    $db_port = $_ENV['DB_PORT'];

    //สร้างตัวแปรการเชื่อมต่อฐานข้อมูล PDO Object
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    //ตั้งค่าโหมดการแจ้งเตือนข้อผิดพลาด
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

}catch(Exception $e){
    echo "Connection failed: " . $e->getMessage();
}
