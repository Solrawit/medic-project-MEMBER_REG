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
      <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo "<i class='fa fa-wrench fa-lg'></i> <span> เมนูจัดการระบบของ : </span> ".$result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?>
        <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="">ติดต่อฝ่ายสนับสนุน</a>
          <a class="dropdown-item" href="../index.php">ออกจากการจัดการระบบ</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
