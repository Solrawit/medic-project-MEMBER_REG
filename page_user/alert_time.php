<?php
require_once('../connections/mysqli.php');

session_start();

if ($_SESSION == NULL) {
  header("location:login.php");
  exit();
}

$strSQL = "SELECT * FROM mdpj_user WHERE user_username = '".$_SESSION['user_username']."'";
$objQuery = mysqli_query($Connection,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Alert Time</title>
</head>
<body>
<?php include '../includes/navbar_welcome.php';?>
  <br>
  <div class=container>
    <h1>Set Alert Time Page....</h1>
    <p>หน้าสำหรับการตั้งค่าเวลาแจ้งเตือน</p>
    </div>
</body>
</html>