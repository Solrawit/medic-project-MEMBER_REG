<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "mdpj_user";
$Connection = mysqli_connect($hostname, $username, $password, $database);

// ตรวจสอบการเชื่อมต่อ
if (!$Connection) {
    die("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// ตรวจสอบว่ามีการเข้าสู่ระบบหรือไม่
if (isset($_SESSION['user_username'])) {
    // สร้างคำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้
    $sql_tb_user = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
    $query_tb_user = mysqli_query($Connection, $sql_tb_user);

    // ตรวจสอบว่าคำสั่ง SQL ทำงานได้หรือไม่
    if ($query_tb_user) {
        $result_tb_user = mysqli_fetch_array($query_tb_user, MYSQLI_ASSOC);
    } else {
        echo "ข้อผิดพลาดในการดึงข้อมูลผู้ใช้: " . mysqli_error($Connection);
    }
}
    
    $title = "MEDIC PROJECT"; // ตั้งค่า title เริ่มต้น

// ตรวจสอบสถานะการเข้าสู่ระบบและระดับผู้ใช้
if (isset($_SESSION['user_username'])) {
    $isLoggedIn = true;
    if (isset($_SESSION["user_level"]) && $_SESSION["user_level"] == "admin") {
        $isAdmin = true;
    } else {
        $isAdmin = false;
    }
} else {
    $isLoggedIn = false;
}
?>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <span class="navbar-brand"><?php echo $title; ?></span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- เมนูหลัก -->
        </ul>
        <?php if (!$isLoggedIn): ?>
            <!-- ถ้ายังไม่ได้เข้าสู่ระบบ -->
            <button type="button" class="btn btn-outline-info" onclick="window.location.href='login.php'">ทดสอบ</button>
            <button type="button" class="btn btn-outline-danger" onclick="window.location.href='register.php'">ทดสอบ</button>
        <?php else: ?>
            <!-- ถ้าเข้าสู่ระบบแล้ว -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown('navbarDropdown')">
                        <?php echo "<i class='fa fa-user-circle-o fa-lg'></i> <span>ยินดีต้อนรับคุณ :</span> ".$result_tb_user["user_name"]." ".$result_tb_user["user_surname"]; ?>
                    </a>
                    <div id="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="profile.php">ข้อมูลส่วนตัว</a>
                        <?php if ($isAdmin): ?>
                            <a class="dropdown-item" href="admin/index.php">ระบบหลังบ้าน</a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        <?php endif; ?>
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
