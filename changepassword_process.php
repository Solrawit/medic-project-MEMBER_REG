<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<!-- ยังไม่ได้เรียกใช้หน้านี้ -->
<?php
require_once('connections/mysqli.php');

session_start();

if ($_SESSION == NULL) {
    header("location:login.php");
    exit();
}

$check_submit = "";
if (isset($_POST["submit"])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    $strSQL = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
    $objQuery = mysqli_query($Connection, $strSQL);
    $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    // ตรวจสอบรหัสผ่านปัจจุบัน
    if (md5($current_password) != $objResult['user_password']) {
        $check_submit = '<div class="alert alert-danger" role="alert">รหัสผ่านปัจจุบันไม่ถูกต้อง</div>';
    } elseif ($new_password != $confirm_new_password) {
        // ตรวจสอบการยืนยันรหัสผ่านใหม่
        $check_submit = '<div class="alert alert-danger" role="alert">การยืนยันรหัสผ่านใหม่ไม่ตรงกัน</div>';
    } else {
        // เปลี่ยนรหัสผ่านใหม่
        $strSQL = "UPDATE mdpj_user SET user_password = '".md5($new_password)."' WHERE user_id = '".$objResult['user_id']."'";
        $objQuery = mysqli_query($Connection, $strSQL);
        if ($objQuery) {
            $check_submit = '<div class="alert alert-success" role="alert">เปลี่ยนรหัสผ่านสำเร็จ</div>';

            // ทำการออกจากระบบหลังจากเปลี่ยนรหัสผ่าน
            session_destroy();
            echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ'); window.location.href = 'login.php';</script>";
            exit();
        } else {
            $check_submit = '<div class="alert alert-danger" role="alert">มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง</div>';
        }
    }
}
?>
