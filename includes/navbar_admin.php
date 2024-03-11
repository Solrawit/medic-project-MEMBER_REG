<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Title</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap JavaScript Bundle with Popper -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$sql_tb_user = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
$query_tb_user = mysqli_query($Connection,$sql_tb_user);
$result_tb_user = mysqli_fetch_array($query_tb_user,MYSQLI_ASSOC);
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <span class="navbar-brand"><?php echo $title; ?></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-home fa-lg"></i> หน้าหลัก <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php"><i class="fa fa-user-o fa-lg"></i> ข้อมูลผู้ใช้งาน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php"><i class="fa fa-file-text-o fa-lg"></i> จัดการไฟล์</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php"><i class="fa fa-picture-o fa-lg"></i> จัดการเว็บไซต์</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo "<i class='fa fa-wrench fa-lg'></i> <span> เมนูจัดการระบบของ : </span> ".$result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">ติดต่อฝ่ายสนับสนุน</a>
          <a class="dropdown-item" href="../index.php">ออกจากการจัดการระบบ</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>
