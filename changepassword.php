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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body class="default">
  <?php include 'includes/navbar_profile.php';?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-5">
        <div class="card border-dark mt-4">
          <h5 class="card-header"><i class="fa fa-key"></i> เปลี่ยนรหัสผ่าน</h5>
          <div class="card-body">
            <?php echo $check_submit; ?>
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
              <button type="submit" class="btn btn-primary" name="submit">เปลี่ยนรหัสผ่าน</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'includes/footer.php';?>
  <script type="text/javascript" src="assets/jquery/jquery-slim.min.js"></script>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<?php mysqli_close($Connection);?>
</body>
</html>
