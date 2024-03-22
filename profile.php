<?php
require_once('connections/mysqli.php');

session_start();

if ($_SESSION == NULL) {
  header("location:login.php");
  exit();
}

$strSQL = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
$objQuery = mysqli_query($Connection,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
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
          <h5 class="card-header"><i class="fa fa-address-card fa-lg"></i> ข้อมูลส่วนตัวของฉัน</h5>
          <div class="card-body">
          <h4>ชื่อผู้ใช้ : <span class="badge badge-dark text-dark"><?php echo $objResult["user_username"]; ?></span></h4>
<h4>ชื่อ - นามสกุล : <span class="badge badge-dark text-dark"><?php echo $objResult["user_name"]." ".$objResult["user_surname"]; ?></span></h4>
<h4>เพศ : <span class="badge badge-dark text-dark"><?php echo $objResult["user_sex"]; ?></span></h4>
<h4>อีเมล์ :
  <?php
  if ($objResult["user_email"] == NULL) {
    ?>
    <span class="badge badge-danger">ว่าง</span>
    <?php
  }else{
    ?>
    <span class="badge badge-dark text-dark"><?php echo $objResult["user_email"]; ?></span>
    <?php
  }
  ?>
</h4>
<h4>ระดับผู้ใช้ : <span class="badge badge-dark text-warning"><?php if ($objResult["user_level"] == "member") {echo "สมาชิกทั่วไป";}else{echo "ผู้ดูแลระบบ";} ?></span></h4>

            <hr>
            <a class="btn btn-success" href="#" role="button">แก้ไขข้อมูล</a>
            <a class="btn btn-warning" href="#" role="button">เปลี่ยนรหัสผ่าน</a>
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
