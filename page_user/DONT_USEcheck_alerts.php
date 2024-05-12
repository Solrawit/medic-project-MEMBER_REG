<?php
// เชื่อมต่อกับ MySQL
require_once('../connections/mysqli.php');

// เริ่ม Sessionn
session_start();

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่ หากไม่ได้เข้าสู่ระบบให้ Redirect ไปยังหน้า Login
if ($_SESSION == NULL) {
    header("location:../login.php");
    exit();
}

// ตรวจสอบการส่งข้อมูลแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าเวลาแจ้งเตือนจากฟอร์ม
    $alert_time = $_POST['alert_time'];
    
    // คำสั่ง SQL เพื่อบันทึกเวลาแจ้งเตือนลงในฐานข้อมูล
    $sql = "UPDATE mdpj_user SET alert_time = '$alert_time' WHERE user_username = '" . $_SESSION['user_username'] . "'";
    
    // ทำการ Query และตรวจสอบผลลัพธ์
    if (mysqli_query($Connection, $sql)) {
        // บันทึกเวลาแจ้งเตือนสำเร็จ
        
        // เรียกใช้ฟังก์ชั่นสำหรับส่งข้อความแจ้งเตือนไปยังไลน์
        $message = 'ถึงเวลาทานยาแล้ว! อย่าลืมรับประทานนะคะ';
        $token = 'YOUR_LINE_NOTIFY_TOKEN'; // แทนด้วย Token ของคุณ
        sendLineNotification($token, $message);
        
        echo "บันทึกเวลาแจ้งเตือนสำเร็จและส่งการแจ้งเตือนไปยังไลน์สำเร็จ";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($Connection);
    }
}

// ฟังก์ชั่นสำหรับส่งข้อความแจ้งเตือนไปยังไลน์ Line Notify
function sendLineNotification($token, $message) {
    $url = 'https://notify-api.line.me/api/notify';
    $data = array('message' => $message);
    $headers = array('Content-Type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $token);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
