<?php
require_once('../connections/mysqli.php');

// Start session
## session_start(); ##

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_level']) || $_SESSION['user_level'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

$check_submit = ''; // Initialize check_submit variable

if (isset($_GET["add"]) && $_GET["add"] == "pass") {
    $check_submit = check_submit_p2("บันทึกข้อมูลเรียบร้อยแล้ว");
}

if (isset($_GET["update"]) && $_GET["update"] == "pass") {
    $check_submit = check_submit_p2("บันทึกข้อมูลเรียบร้อยแล้ว");
}

if (isset($_GET["delete"]) && $_GET["delete"] == "pass") {
    $check_submit = check_submit_p2("ลบข้อมูลออกจากระบบเรียบร้อยแล้ว");
}

$num = 1;

$sql = "SELECT * FROM mdpj_user ORDER BY user_level ASC";
$query = mysqli_query($Connection, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/dashboard.css">
    <title>ระบบหลังบ้าน</title>
</head>
<body>
<?php include 'component/header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <?php include 'component/sidebarMenu.php'; ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">ข้อมูลผู้ใช้งาน</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- เพิ่มข้อมูล -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#add_data">เพิ่มข้อมูล
                    </button>
                    <div class="modal fade" id="add_data" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <form class="modal-content" method="post" action="user_add_data.php">
                                <div class="modal-header">
                                    <h5 class="modal-title">เพิ่มข้อมูลผู้ใช้งาน</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อผู้ใช้</label>
                                        <input type="text" class="form-control" name="user_username" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">รหัสผ่าน</label>
                                        <input type="password" class="form-control" name="user_password"
                                               required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" name="user_name" required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">นามสกุล</label>
                                        <input type="text" class="form-control" name="user_surname"
                                               required/>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">เพศ</label>
                                        <select class="form-select" name="user_sex">
                                            <option value="ชาย">ชาย</option>
                                            <option value="หญิง">หญิง</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">อีเมล์ (ไม่จำเป็นต้องกรอกข้อมูลช่องนี้)</label>
                                        <input type="email" class="form-control" name="user_email"/>
                                    </div>
                                    <div>
                                        <label class="form-label">ระดับผู้ใช้</label>
                                        <select class="form-select" name="user_level">
                                            <option value="member">สมาชิก</option>
                                            <option value="admin">ผู้ดูแลระบบ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">ยกเลิก
                                    </button>
                                    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $check_submit; ?>
            <table class="table table-bordered table-hover"> <!-- table-sm -->
                <thead>
                <tr class="table-info">
                    <th scope="col" width="65px">ลำดับที่</th>
                    <th scope="col">ชื่อผู้ใช้</th>
                    <th scope="col" width="130px">รหัสผ่าน</th>
                    <th scope="col">ขื่อ</th>
                    <th scope="col">นามสกุล</th>
                    <th scope="col">เพศ</th>
                    <th scope="col">อีเมล์</th>
                    <th scope="col">ระดับผู้ใช้</th>
                    <th scope="col" width="90px">ตัวเลือก</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $num++; ?></th>
                        <td><?php echo $result['user_username']; ?></td>
                        <td>
                            <!-- เปลี่ยนรหัสผ่าน -->
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#edit_password<?php echo $result['user_id']; ?>">
                                เปลี่ยนรหัสผ่าน
                            </button>
                            <div class="modal fade" id="edit_password<?php echo $result['user_id']; ?>"
                                 tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <form class="modal-content" method="post"
                                          action="user_edit_password.php">
                                        <div class="modal-header">
                                            <h5 class="modal-title">เปลี่ยนรหัสผ่านผู้ใช้ ID : <?php echo $result['user_id']; ?></h5>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="form-label">รหัสผ่านใหม่</label>
                                                <input type="password" class="form-control"
                                                       name="user_password" required/>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                        </div>
                                        <input type="hidden" name="id"
                                               value="<?php echo $result['user_id']; ?>"/>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td><?php echo $result['user_name']; ?></td>
                        <td><?php echo $result['user_surname']; ?></td>
                        <td><?php echo $result['user_sex']; ?></td>
                        <td><?php echo $result['user_email']; ?></td>
                        <td><?php echo $result['user_level'] == "member" ? "สมาชิก" : "ผู้ดูแลระบบ"; ?></td>
                        <td>
                            <!-- ปุ่มแก้ไข -->
                            <button type="button" class="btn btn-success btn-sm"
                                    onclick="window.location.href='user_edit.php?id=<?php echo $result['user_id']; ?>'">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <!-- ลบข้อมูล-->
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete_data<?php echo $result['user_id']; ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                            <div class="modal fade" id="delete_data<?php echo $result['user_id']; ?>"
                                 tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">ลบข้อมูล</h5>
                                        </div>
                                        <div class="modal-body">
                                            กดยืนยันหากคุณต้องการลบผู้ใช้ <?php echo $result['user_username']; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">ยกเลิก
                                            </button>
                                            <button type="button" class="btn btn-primary"
                                                    onclick="window.location.href='user_delete.php?id=<?php echo $result['user_id']; ?>'">ยืนยัน
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </main>
        <?php include '../component/footer.php'; ?>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<?php mysqli_close($Connection); ?>
</body>
</html>