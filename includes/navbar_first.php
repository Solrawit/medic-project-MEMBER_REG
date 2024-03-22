<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Title</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    /* CSS Style to add shadow to Navbar */
    .navbar {
      box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.1); /* Add shadow with specific values */
    }
  </style>
</head>
<body>

<?php
if ($_SESSION != NULL) {
  $sql_tb_user = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
  $query_tb_user = mysqli_query($Connection,$sql_tb_user);
  $result_tb_user = mysqli_fetch_array($query_tb_user,MYSQLI_ASSOC);
}
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Navbar brand with image -->
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/dog.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top me-2">
      <?php echo $title; ?>
    </a>
    <!-- Navbar toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="fa fa-home fa-lg me-1"></i>หน้าหลัก</a>
        </li>
        <!-- แทรกเมนูต่อจากนี้ได้ตามต้องการ -->
      </ul>
      <?php if ($_SESSION == NULL) { ?>
        <button type="button" class="btn btn-outline-info me-2" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>
        <button type="button" class="btn btn-outline-danger" onclick="window.location.href='register.php'">สมัครสมาชิก</button>
      <?php } else { ?>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-user-circle-o fa-lg me-1"></i>
              <span>ยินดีต้อนรับคุณ: <?php echo $result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a></li>
              <?php if ($_SESSION["user_level"] == "admin") { ?>
                <li><a class="dropdown-item" href="admin/index.php">ระบบหลังบ้าน</a></li>
              <?php } ?>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out me-1"></i>ออกจากระบบ</a></li>
            </ul>
          </li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>

<!-- Bootstrap JavaScript Bundle with Popper. -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
