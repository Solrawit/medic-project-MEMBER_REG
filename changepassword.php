<?php
require_once('connections/mysqli.php');

## session_start(); ##

if ($_SESSION == NULL) {
    header("location:login.php");
    exit();
}
## กำหนด session ของhome page ##
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
        $check_submit = 'รหัสผ่านปัจจุบันไม่ถูกต้อง';
    } elseif ($new_password != $confirm_new_password) {
        // ตรวจสอบการยืนยันรหัสผ่านใหม่
        $check_submit = 'การยืนยันรหัสผ่านใหม่ไม่ตรงกัน';
    } else {
        // เปลี่ยนรหัสผ่านใหม่
        $strSQL = "UPDATE mdpj_user SET user_password = '".md5($new_password)."' WHERE user_id = '".$objResult['user_id']."'";
        $objQuery = mysqli_query($Connection, $strSQL);
        if ($objQuery) {
            $check_submit = 'เปลี่ยนรหัสผ่านสำเร็จ';
            // ทำการออกจากระบบหลังจากเปลี่ยนรหัสผ่าน
            session_destroy();
        } else {
            $check_submit = 'มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="default">
  <?php include 'component/navbar_profile.php';?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-5">
        <div class="card border-dark mt-4">
          <h5 class="card-header"><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</h5>
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <label>รหัสผ่านปัจจุบัน</label>
                <input type="password" class="form-control" name="current_password" placeholder="รหัสผ่านปัจจุบัน" required>
              </div>
              <div class="form-group">
                <label>รหัสผ่านใหม่</label>
                <input type="password" class="form-control" name="new_password" placeholder="รหัสผ่านใหม่" required>
              </div>
              <div class="form-group">
                <label>ยืนยันรหัสผ่านใหม่</label>
                <input type="password" class="form-control" name="confirm_new_password" placeholder="ยืนยันรหัสผ่านใหม่" required>
              </div>
              <br>
              <button type="submit" class="btn btn-primary" name="submit">เปลี่ยนรหัสผ่าน</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'component/footer.php';?>
  <script type="text/javascript" src="assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <?php mysqli_close($Connection);?>

  <script>
    // ฟังก์ชันสำหรับแสดง SweetAlert
    function showAlert(icon, title, text, button, callback) {
      Swal.fire({
        icon: icon,
        title: title,
        text: text,
        confirmButtonText: button
      }).then((result) => {
        if (result.isConfirmed && callback) {
          callback();
        }
      });
    }

    // ตรวจสอบค่า check_submit แล้วแสดง SweetAlert ตามเงื่อนไข
    <?php if(!empty($check_submit)): ?>
      <?php
        switch ($check_submit) {
          case 'รหัสผ่านปัจจุบันไม่ถูกต้อง':
            $icon = 'error';
            $title = 'ข้อผิดพลาด!';
            $text = 'รหัสผ่านปัจจุบันไม่ถูกต้อง';
            break;
          case 'การยืนยันรหัสผ่านใหม่ไม่ตรงกัน':
            $icon = 'error';
            $title = 'ข้อผิดพลาด!';
            $text = 'การยืนยันรหัสผ่านใหม่ไม่ตรงกัน';
            break;
          case 'เปลี่ยนรหัสผ่านสำเร็จ':
            $icon = 'success';
            $title = 'สำเร็จ!';
            $text = 'เปลี่ยนรหัสผ่านสำเร็จ';
            // เพิ่ม callback function เพื่อให้ทำการ redirect ไปยังหน้า login.php
            $callback = 'function() { window.location.href = "login.php"; }';
            break;
          case 'มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง':
            $icon = 'error';
            $title = 'ข้อผิดพลาด!';
            $text = 'มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง';
            break;
          default:
            $icon = 'info';
            $title = 'ข้อความ!';
            $text = 'ไม่พบข้อความที่ต้องการแสดง';
            break;
        }
      ?>
      showAlert('<?php echo $icon; ?>', '<?php echo $title; ?>', '<?php echo $text; ?>', 'ตกลง', <?php echo $callback ?? 'null'; ?>);
    <?php endif; ?>
  </script>
</body>
</html>

