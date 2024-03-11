<?php
require_once('connections/mysqli.php');

session_start();

if ($_SESSION != NULL) {
  header("location:index.php");
  exit();
}

$check_submit = "";
$user_username = "";

if (isset($_POST["submit"])) {
  $strSQL = "SELECT * FROM mdpj_user WHERE user_username = '".mysqli_real_escape_string($Connection,$_POST['user_username'])."' and user_password = '".mysqli_real_escape_string($Connection,md5($_POST['user_password']))."'";
  $objQuery = mysqli_query($Connection,$strSQL);
  $objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

  if (!$objResult) {
    $user_username = $_POST['user_username'];
    $check_submit = '<div class="alert alert-danger" role="alert">';
    $check_submit .= '<span><i class="fa fa-exclamation"></i> ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบใหม่อีกครั้ง</span>';
    $check_submit .= '</div>';
  }else{
    $_SESSION["user_username"] = $objResult["user_username"];
    $_SESSION["user_level"] = $objResult["user_level"];

    header("location:index.php");
    exit();
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
  <?php include 'includes/navbar.php';?>
  <div class="container-fluid">
    <div class="col-md-12 mt-4">
      <div class="row justify-content-md-center">
        <div class="col-md-auto"><?php echo $check_submit; ?></div>
      </div>
    </div>
    <div class="row justify-content-md-center">
      <div class="col-md-5">
        <div class="card border-dark mt-2">
          <h5 class="card-header">ระบบล็อคอิน</h5>
          <div class="card-body">
            <div class="row justify-content-md-center mb-2">
              <div class="col col-lg-6">
                <img src="assets/images/log.png" style="width: 100%;">
              </div>
            </div>
            <form method="post">
              <div class="form-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" class="form-control" name="user_username" value="<?php echo $user_username;?>" placeholder="Enter Username" required=""/>
              </div>
              <div class="form-group">
                <label>รหัสผ่าน</label>
                <input type="password" class="form-control" name="user_password" placeholder="Enter Password" required=""/>
              </div>
              <button type="submit" class="btn btn-success" name="submit">เข้าสู่ระบบ</button>
              <a class="btn btn-warning" href="register.php" role="button">สมัครสมาชิก</a>
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

<?php
if (isset($_GET["register"])) {
  if ($_GET["register"] == "success") {
    ?>
    <script type="text/javascript">
      alert("สมัครสมาชิกสำเร็จแล้ว เข้าสู่ระบบได้เลย");
    </script>
    <?php
  }
}
?>
