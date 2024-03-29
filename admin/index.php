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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/dashboard.css">
    <title>ระบบหลังบ้าน</title>
</head>
<style>
    body {
      background-color: #fff; /* พื้นหลัง */
    }

    .jumbotron {
      background-color: #E8E8E8; /* index ic */
    }
  </style>
 <body>
    <?php include 'component/header.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <?php include 'component/sidebarMenu.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <?php
          for ($i=1; $i <= 4 ; $i++) {
            ?>
            <br>
            <div class="jumbotron mt-4">
              <h1 class="display-4">ยินดีต้อนรับเข้าสู่ระบบหลังบ้าน</h1>
            </div>
            <?php
          }
          ?>
        </main>
      </div>
    </div>
    <?php include '../component/footer.php';?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <?php mysqli_close($Connection); ?>
  </body>
</html>