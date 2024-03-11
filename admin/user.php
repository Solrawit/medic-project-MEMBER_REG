<?php
require_once('../connections/mysqli.php');

session_start();

if ($_SESSION == NULL) {
  header("location:../login.php");
  exit();
}elseif ($_SESSION["user_level"] != "admin") {
  header("location:../index.php");
  exit();
}

$num = 1;

$strSQL2 = "SELECT * FROM mdpj_user ORDER BY user_level ASC";
$objQuery2 = mysqli_query($Connection,$strSQL2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body class="default">
  <?php include '../includes/navbar_admin.php';?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-11 mt-4 mb-4">
        <div class="row">
          <div class="col-auto mr-auto">
            <h3>ข้อมูลผู้ใช้งาน <span class="badge badge-info"><i class="fa fa-list"></i></span></h3>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-body">
            <table class="table table-hover table-bordered mb-0" id="datatables">
              <thead>
                <tr class="bg-info">
                  <th scope="col" width="60px">ลำดับที่</th>
                  <th scope="col">ชื่อผู้ใช้</th>
                  <th scope="col" width="90px">รหัสผ่าน</th>
                  <th scope="col">ขื่อ</th>
                  <th scope="col">นามสกุล</th>
                  <th scope="col">เพศ</th>
                  <th scope="col">อีเมล์</th>
                  <th scope="col">ระดับผู้ใช้</th>
                  <th scope="col" width="60px">ตัวเลือก</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($objResult2 = mysqli_fetch_array($objQuery2,MYSQLI_ASSOC)) {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $num; ?></th>
                    <td><?php echo $objResult2["user_username"]; ?></td>
                    <td><button type="button" class="btn btn-warning btn-sm">เปลี่ยนรหัสผ่าน</button></td>
                    <td><?php echo $objResult2["user_name"]; ?></td>
                    <td><?php echo $objResult2["user_surname"]; ?></td>
                    <td><?php echo $objResult2["user_sex"]; ?></td>
                    <td><?php echo $objResult2["user_email"]; ?></td>
                    <td><?php if ($objResult2["user_level"] == "member") {echo "สมาชิก";}else{echo "ผู้ดูแลระบบ";} ?></td>
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
        </div>
      </div>
    </div>
  </div>
  <?php include '../includes/footer.php';?>
  <script type="text/javascript" src="../assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="../assets/popper/popper.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#datatables').DataTable();
    } );
  </script>
  <script type="text/javascript" src="/assets/DataTables/datatables.min.js"></script>
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <?php mysqli_close($Connection);?>
</body>
</html>
