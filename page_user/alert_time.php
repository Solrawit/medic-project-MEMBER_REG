<?php
// เชื่อมต่อกับ MySQL
require_once('../connections/mysqli.php');

// เริ่ม Session
## session_start();

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่ หากไม่ได้เข้าสู่ระบบให้ Redirect ไปยังหน้า Login
if (!isset($_SESSION['user_username'])) {
    header("location:../login.php");
    exit();
}

// ตรวจสอบการส่งข้อมูลแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าเวลาแจ้งเตือนจากฟอร์ม
    $alert_time = $_POST['alert_time'];
    $token = 'oFxy3zhUONQsRo0dFS4ykSbfZdIruosnVsAP2oTABFj'; // แทนด้วย Token ของคุณ

    // คำสั่ง SQL เพื่อบันทึกเวลาแจ้งเตือนลงในฐานข้อมูล
    $sql = "UPDATE mdpj_user SET alert_time = '$alert_time' WHERE user_username = '" . $_SESSION['user_username'] . "'";
    
    // ทำการ Query และตรวจสอบผลลัพธ์
    if (mysqli_query($Connection, $sql)) {
        echo "บันทึกเวลาแจ้งเตือนสำเร็จ";
        
        // เรียกใช้ฟังก์ชันส่งข้อความไปยังไลน์
        sendLineNotification($token, "ตั้งเวลาแจ้งเตือนเป็นเวลา $alert_time");
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($Connection);
    }
}

// ฟังก์ชันสำหรับส่งข้อความไปยังไลน์
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Alert Time</title>
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            padding: 20px 100px;
            background-image: url('../assets/images/bluewhite.jpg');
            background-size: cover;
            background-position: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        p {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="time"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
            margin-bottom: 20px;
            outline: none;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php include '../component/navbar_welcome.php'; ?>
    <br>
    <div class="container">
        <h1>Set Alert Time Page</h1>
        <p>หน้าสำหรับการตั้งค่าเวลาแจ้งเตือน</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="alert_time">Alert Time:</label>
            <input type="time" id="alert_time" name="alert_time">
            <button type="submit">Set Alert Time</button>
        </form>
    </div>
    <?php include '../component/footer.php'; ?>
</body>
</html>
