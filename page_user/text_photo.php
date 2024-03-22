<?php
require_once('../connections/mysqli.php');

session_start();

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Photo To Text</title>
    <style type="text/css">
         body {
      background-image: url('../assets/images/bg4.jpg');
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
</head>
<body>
<?php include '../includes/navbar_welcome.php';?>
<br>
<div class="container">
    <div class="upper">
        <input type="file" class="form-control"><br>
        <button class="btn btn-primary">เริ่มต้นการอ่านข้อความ.!</button>
        <div class="progress"></div>
    </div>
    <div class="bottom">
        <div>
            <img src="" alt="">
        </div>
        <div>
        <textarea id="myTextarea" class="form-control" placeholder="Text"></textarea>

        <script>
            document.getElementById("myTextarea").addEventListener("keypress", function(event) {
            event.preventDefault(); // ยกเลิกการกระทำของเหตุการณ์ keypress
            });
        </script>
        </div>
    </div>
</div>
<div class="container btn-container">
    <center><button type="button" class="btn btn-secondary btn-lg">ตั้งค่าการแจ้งเตือน</button></center>
    <br>
    <center><button type="button" class="btn btn-danger btn-lg" onclick="window.location.reload();">ยกเลิก</button></center>
</div>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js"></script>
<script src="script.js"></script>
<?php include '../includes/footer.php';?>
</body>
<?php mysqli_close($Connection);?>
</html>
