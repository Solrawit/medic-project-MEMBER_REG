<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><?php echo $title; ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><i class="bi bi-house-door"></i> หน้าหลัก</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php
        if ($_SESSION == NULL) {
          ?>
          <button class="btn btn-outline-primary" type="submit" onclick="window.location.href='login.php'">เข้าสู่ระบบ</button>
          <?php
        }else{
          ?>
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false"><?php echo "<i class='bi bi-people'></i> ".$result_tb_user[3].' '.$result_tb_user[4].' '; ?></button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
              <li><button class="dropdown-item" type="button" onclick="window.location.href='profile.php'">ข้อมูลส่วนตัว</button></li>
              <?php
              if ($_SESSION["user_level"] == "admin") {
                ?>
                <li><button class="dropdown-item" type="button" onclick="window.location.href='admin/index.php'">ระบบหลังบ้าน</button></li>
                <?php
              }
              ?>
              <hr>
              <li><button class="dropdown-item" type="button" onclick="window.location.href='logout.php'">ออกจากระบบ</button></li>
            </ul>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
</nav>
