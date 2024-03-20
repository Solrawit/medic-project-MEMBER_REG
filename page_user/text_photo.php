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
    <title>Photo To Text</title>
</head>
<body>
<?php include '../includes/navbar_welcome.php';?>
  <br>
  <div class=container>
    <h1>Photo To Text Page....</h1>
    <p>หน้าสำหรับการแปลงรูปภาพเป็นข้อความ</p>
    </div>
</body>
</html>