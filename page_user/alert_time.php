
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

// ฟังก์ชันสำหรับส่งข้อความไปยังไลน์
function sendLineNotification($token, $message, $image_path = null) {
    $url = 'https://notify-api.line.me/api/notify';
    $headers = array('Authorization: Bearer ' . $token);
    $data = array('message' => $message);
    

    // ถ้ามีการส่งรูปภาพ
    if ($image_path) {
        $data['imageFile'] = new CURLFile($image_path);
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// ตรวจสอบการส่งข้อมูลแบบ POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าเวลาแจ้งเตือนจากฟอร์ม
    $alert_time = $_POST['alert_time'];
    $token = 'oFxy3zhUONQsRo0dFS4ykSbfZdIruosnVsAP2oTABFj'; // แทนด้วย Token ของคุณ

    // ป้องกัน SQL Injection โดยการใช้ Prepared Statements
    $stmt = $Connection->prepare("UPDATE mdpj_user SET alert_time = ? WHERE user_username = ?");
    $stmt->bind_param("ss", $alert_time, $_SESSION['user_username']);
    

    // ทำการ Query และตรวจสอบผลลัพธ์
    if ($stmt->execute()) {
        $success_message = "บันทึกเวลาแจ้งเตือนสำเร็จ";
    } else {
        $error_message = "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $stmt->error;
    }
    $stmt->close();
    

    // ตรวจสอบและจัดการการอัปโหลดไฟล์
    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // ตรวจสอบประเภทไฟล์
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            // ตรวจสอบว่าไฟล์มีอยู่หรือไม่
            if (!file_exists($target_file)) {
                // อัปโหลดไฟล์
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $image_message = "ไฟล์ ". basename( $_FILES["image"]["name"]). " อัปโหลดสำเร็จ";
                    $image_path = $target_file;
                } else {
                    $image_message = "ขออภัย, เกิดข้อผิดพลาดในการอัปโหลดไฟล์ของคุณ";
                }
            } else {
                $image_message = "ขออภัย, ไฟล์นี้มีอยู่แล้ว";
                $image_path = $target_file;
            }
        } else {
            $image_message = "ขออภัย, ไฟล์ไม่ใช่รูปภาพ";
        }
    } else {
        $image_message = "ไม่มีไฟล์ถูกอัปโหลด";
    }

    // เรียกใช้ฟังก์ชันส่งข้อความไปยังไลน์พร้อมรูปภาพ
    sendLineNotification($token, "ตั้งเวลาแจ้งเตือนเป็นเวลา $alert_time", $image_path);
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

        input[type="time"],
        input[type="file"] {
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

        .message {
            text-align: center;
            margin-top: 20px;
        }

        .uploaded-image {
            display: block;
            margin: 20px auto;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <?php include '../component/navbar_welcome.php'; ?>
    <br>
    <div class="container">
        <h1>Set Alert Time Page</h1>
        <p>หน้าสำหรับการตั้งค่าเวลาแจ้งเตือน</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <label for="alert_time">Alert Time:</label>
            <input type="time" id="alert_time" name="alert_time">
            
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image">
            
            <button type="submit">Set Alert Time</button>
        </form>
        <?php if (isset($success_message)) : ?>
            <p class="message" style="color: green;"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <?php if (isset($error_message)) : ?>
            <p class="message" style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <?php if (isset($image_message)) : ?>
            <p class="message" style="color: blue;"><?php echo $image_message; ?></p>
        <?php endif; ?>
        <?php if (isset($target_file) && file_exists($target_file)) : ?>
            <img src="<?php echo htmlspecialchars($target_file); ?>" alt="Uploaded Image" class="uploaded-image">
        <?php endif; ?>
    </div>
    <?php include '../component/footer.php'; ?>
</body>
</html>
