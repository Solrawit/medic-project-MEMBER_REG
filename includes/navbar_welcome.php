<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Title</title>
  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> เวอร์ชั่น 4 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap JavaScript Bundle with Popper. -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <a class="navbar-brand" href="welcome.php">
      <img src="./assets/images/dog.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top">
      <img src="../assets/images/dog.jpg" alt="Logo" width="30" height="30" class="d-inline-block align-top">
      <?php echo $title; ?>
    </a>
    <!-- Navbar toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./welcome.php"><i class="fa fa-home fa-lg"></i> หน้าหลัก <span class="sr-only"> <!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="page_user/text_photo.php"><i class="fa fa-coffee fa-lg"></i> แปลงข้อความ <span class="sr-only"> <!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./welcome.php"><i class="fa fa-plus-square fa-lg"></i> ตั้งค่าการแจ้งเตือน <span class="sr-only"> <!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./welcome.php"><i class="fa fa-youtube-play fa-lg"></i> วิธีการใช้งาน <span class="sr-only"> <!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
    </ul>
    
</div>
    <?php
    if ($_SESSION == NULL) {
      ?>
      <button type="submit" class="btn btn-outline-info my-2 my-sm-0" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>&nbsp;&nbsp;
      <button type="submit" class="btn btn-outline-danger my-2 my-sm-0" onclick="window.location.href='register.php'">สมัครสมาชิก</button>
      <?php
    }else{
      ?>
      <ul class="navbar-nav">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown('navbarDropdown')">
      <?php echo "<i class='fa fa-user-circle-o fa-lg'></i> <span>ยินดีต้อนรับคุณ :</span> ".$result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?>
    </a>
    <div id="navbarDropdown" class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a>
      <?php
      if ($_SESSION["user_level"] == "admin") {
        ?>
        <a class="dropdown-item" href="admin/index.php">ระบบหลังบ้าน</a>
        <?php
      }
      ?>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
    </div>
  </li>
</ul>

      <?php
    }
    ?>
  </div>
</nav>

<script>
function toggleDropdown(dropdownId) {
  var dropdown = document.getElementById(dropdownId);
  dropdown.classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropdown-toggle')) {
    var dropdowns = document.getElementsByClassName("dropdown-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>