<?php
require_once('../connections/mysqli.php');

## session_start(); ##

if ($_SESSION == NULL) {
  header("location:../login.php");
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
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/medic.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
    <title>Set Alert Time</title>
</head>
<style type="text/css">
         body {
      background-image: url('../assets/images/bluewhite.jpg');
      background-size: cover;
      background-position: center;
        }
    .blurry-img {
      filter: blur(10px); /* Adjust as needed */
        }
        body {
            padding: 20px 100px;
            font-family: 'Sarabun', sans-serif;
        }
        .upper div {
            display: inline;
            margin-left: 100px;
            white-space: pre;
        }
        .bottom {
            margin-top: 30px;
            display: flex;
        }
        .bottom div {
            flex: 1;
            border: 1px solid rgb(118, 118, 118);
            height: 400px;
            margin: 10px;
            border-radius: 10px;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }
        .bottom div img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        .bottom div textarea {
            resize: none;
            width: calc(100% - 20px);
            height: calc(100% - 20px);
            padding: 10px;
            font-size: 20px;
            outline: none;
            border: none;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
<body>
<?php include '../component/navbar_welcome.php';?>
  <br>
  <div class=container>
    <h1>Set Alert Time Page....</h1>
    <p>หน้าสำหรับการตั้งค่าเวลาแจ้งเตือน</p>
    </div>
</body>
</html>