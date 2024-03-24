<?php
require_once('../connections/mysqli.php');

session_start();

// ตรวจสอบว่ามี Session หรือไม่ ถ้าไม่มีให้เปลี่ยนเส้นทางไปที่หน้า login.php
if (!isset($_SESSION["user_level"])) {
  header("location:../login.php");
  exit();
}
// ตรวจสอบว่าเป็นผู้ดูแลระบบหรือไม่ ถ้าไม่ใช่ให้เปลี่ยนเส้นทางไปที่หน้า index.php
elseif ($_SESSION["user_level"] != "admin") {
  header("location:../index.php");
  exit();
}

$num = 1;

// ทำคำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้งานจากตาราง mdpj_user โดยเรียงลำดับตาม user_level
$strSQL2 = "SELECT * FROM mdpj_user ORDER BY user_level ASC";
$objQuery2 = mysqli_query($Connection, $strSQL2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ข้อมูลผู้ใช้งาน</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/dashboard.css">
</head>
<body class="default">
  <?php include 'include/header.php';?>
  <div class="container-fluid">
    <div class="row">
      <?php include 'include/sidebarMenu.php'; ?>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">ข้อมูลผู้ใช้งาน</h1>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
          <table class="table table-hover table-bordered mb-0" id="datatables">
            <thead>
              <tr class="bg-warning">
                <th scope="col" width="90px">ลำดับที่</th>
                <th scope="col">ชื่อผู้ใช้</th>
                <th scope="col" width="125px">รหัสผ่าน</th>
                <th scope="col">ขื่อ</th>
                <th scope="col">นามสกุล</th>
                <th scope="col">เพศ</th>
                <th scope="col">อีเมล์</th>
                <th scope="col">ระดับผู้ใช้</th>
                <th scope="col" width="90px">ตัวเลือก</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($objResult2 = mysqli_fetch_array($objQuery2, MYSQLI_ASSOC)) {
              ?>
                <tr>
                  <th scope="row"><?php echo $num; ?></th>
                  <td><?php echo $objResult2["user_username"]; ?></td>
                  <td><button type="button" class="btn btn-warning btn-sm">เปลี่ยนรหัสผ่าน</button></td>
                  <td><?php echo $objResult2["user_name"]; ?></td>
                  <td><?php echo $objResult2["user_surname"]; ?></td>
                  <td><?php echo $objResult2["user_sex"]; ?></td>
                  <td><?php echo $objResult2["user_email"]; ?></td>
                  <td><?php echo ($objResult2["user_level"] == "member") ? "สมาชิก" : "ผู้ดูแลระบบ"; ?></td>
                  <td>
                    <button type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <?php
                $num++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  <?php include '../includes/footer.php';?>
  <script type="text/javascript" src="../assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="../assets/popper/popper.min.js"></script>
  <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#datatables').DataTable();
    } );
  </script>
  <?php mysqli_close($Connection);?>
</body>
</html>
