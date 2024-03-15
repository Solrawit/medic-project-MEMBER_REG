<?php
if ($_SESSION != NULL) {
  $sql_tb_user = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
  $query_tb_user = mysqli_query($Connection,$sql_tb_user);
  $result_tb_user = mysqli_fetch_array($query_tb_user,MYSQLI_ASSOC);
}
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <span class="navbar-brand"><?php echo $title; ?></span>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-home fa-lg"></i> หน้าหลัก <span class="sr-only"><!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-coffee fa-lg"></i> สนับสนุนค่ากาแฟ <span class="sr-only"><!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-plus-square fa-lg"></i> ช่องทางการติดต่อ <span class="sr-only"><!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-youtube-play fa-lg"></i> วิธีการใช้งาน <span class="sr-only"><!-- ไว้พิมข้อความเพื่ม --></span></a>
      </li>
    </ul>
</div>
    <?php
    if ($_SESSION == NULL) {
      ?>
      <button type="submit" class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>
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
