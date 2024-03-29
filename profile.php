<?php
require_once('connections/mysqli.php');

## session_start(); ##

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
  <style>
    body {
      background-image: url('assets/images/bluewhite.jpg');
      background-size: cover;
      background-position: center;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
      background-color: #007bff;
      color: #000;
      border-top-left-radius: 15px;
      border-top-right-radius: 15px;
      padding: 20px 20px;
      font-weight: bold;
    }

    .card-body {
      padding: 20px;
    }

    .info-label {
      font-weight: bold;
    }

    .badge {
      padding: 8px 12px;
      border-radius: 20px;
    }

    .btn {
      border-radius: 20px;
      padding: 8px 20px;
    }

    .badge-primary {
      background-color: #007bff;
      color: #fff;
    }

    .badge-danger {
      background-color: #dc3545;
      color: #fff;
    }

    .badge-warning {
      background-color: #ffc107;
      color: #212529;
    }

    .badge-dark {
      background-color: #343a40;
      color: #fff;
    }
  </style>
</head>
<body class="default">
  <?php include 'component/navbar_profile.php';?>

<!-- หัวประกาศ -->
<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © Copyright 2024 Website By Computer Science RMUT All Rights Reserved.
            <a class="text-white" href="#">MEDIC OCR</a>
        </div>

    <!-- หัวประกาศ -->

  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-5">
        <div class="card border-dark mt-4">
          <h5 class="card-header"><i class="fa fa-address-card fa-lg"></i> ข้อมูลส่วนตัวของฉัน</h5>
          <div class="card-body">
            <h4>ชื่อผู้ใช้ : <span class="badge badge-dark"><?php echo $objResult["user_username"]; ?></span></h4>
            <h4>ชื่อ - นามสกุล : <span class="badge badge-dark"><?php echo $objResult["user_name"]." ".$objResult["user_surname"]; ?></span></h4>
            <h4>เพศ : <span class="badge badge-dark"><?php echo $objResult["user_sex"]; ?></span></h4>
            <h4>อีเมล์ :
              <?php
              if ($objResult["user_email"] == NULL) {
                ?>
                <span class="badge badge-danger">ว่าง</span>
                <?php
              } else {
                ?>
                <span class="badge badge-dark"><?php echo $objResult["user_email"]; ?></span>
                <?php
              }
              ?>
            </h4>
            <h4>ระดับผู้ใช้ : <span class="badge badge-warning"><?php echo ($objResult["user_level"] == "member") ? "สมาชิกทั่วไป" : "ผู้ดูแลระบบ"; ?></span></h4>

            <hr>
            <a class="btn btn-success" href="#" role="button" onclick="showAlert()">แก้ไขข้อมูล</a>
            <!-- การแจ้งเตือน sweetalert กรณีปุ่มยังไม่เปิดให้ user ใช้ -->
            <script>
              function showAlert() {
                Swal.fire({
                  icon: 'warning',
                  title: 'ยังไม่เปิดให้ใช้งาน',
                  text: 'ขออภัย การแก้ไขข้อมูลยังไม่เปิดให้ใช้งาน',
                  confirmButtonText: 'ตกลง'
                });
              }
            </script>

            <a class="btn btn-warning" href="changepassword.php" role="button">เปลี่ยนรหัสผ่าน</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'component/footer.php';?>
  <script type="text/javascript" src="assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <?php mysqli_close($Connection);?>
</body>
</html>
