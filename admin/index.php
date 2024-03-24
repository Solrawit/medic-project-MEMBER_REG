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
</head>
<style>
    body {
      background-color: #BFBFBF; /* พื้นหลัง */
    }

    .jumbotron {
      background-color: #FF795C; /* index ic */
    }
  </style>
<body class="default">
  <?php include '../includes/navbar_admin.php';?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-11">
        <?php
        for ($i=1; $i <= 3 ; $i++) {
          ?>
          <div class="jumbotron mt-4"> <!-- ความห่างของกรอบ -->
            <h1 class="display-4">TEST ADMIN HOMEPAGE MAIN</h1>
            <h4 class="display-10">ทดสอบหลังบ้าน</h4>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php include '../includes/footer.php';?>
  <script type="text/javascript" src="../assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
  <?php mysqli_close($Connection);?>
</body>
</html>