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
    .navbar {
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .navbar-brand img {
      border-radius: 50%;
    }
    .navbar-nav .nav-link {
      padding: 0.5rem 1rem;
    }
    .navbar-nav .nav-link i {
      margin-right: 5px;
    }
    .dropdown-menu {
      border: none;
      border-radius: 0.5rem;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }
    .dropdown-menu a {
      padding: 0.5rem 1rem;
    }
    .dropdown-divider {
      margin: 0;
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
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <!-- Navbar brand with image -->
    <a class="navbar-brand" href="page_user/welcome.php">
      <img src="./assets/images/dog.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top">
      <?php echo $title; ?>
    </a>
    <!-- Navbar toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="./page_user/welcome.php"><i class="fa fa-home fa-lg"></i> หน้าหลัก <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./page_user/text_photo.php"><i class="fa fa-language fa-lg"></i> แปลงข้อความ <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./page_user/alert_time.php"><i class="fa fa-clock-o fa-lg"></i> ตั้งค่าการแจ้งเตือน <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa fa-youtube-play fa-lg"></i> วิธีการใช้งาน <span class="sr-only"></span></a>
        </li>
      </ul>
      <?php if ($_SESSION == NULL) { ?>
        <button type="button" class="btn btn-outline-info my-2 my-sm-0" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>&nbsp;&nbsp;
        <button type="button" class="btn btn-outline-danger my-2 my-sm-0" onclick="window.location.href='register.php'">สมัครสมาชิก</button>
      <?php } else { ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle-o fa-lg"></i> ยินดีต้อนรับคุณ : <?php echo $result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
              <a class="dropdown-item" href="./profile.php">ข้อมูลส่วนตัว</a>
              <?php if ($_SESSION["user_level"] == "admin") { ?>
                <a class="dropdown-item" href="./admin/index.php">ระบบหลังบ้าน</a>
              <?php } ?>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
            </div>
          </li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>

<script>
// Initialize Bootstrap dropdown
var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})
</script>
</body>
</html>
