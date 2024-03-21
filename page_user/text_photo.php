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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Photo To Text</title>
    <style type="text/css">
        body{
            padding: 0px 100px;
            font-family: sans-serif;
        }

        .upper div{
            display: inline;
            margin-left: 100px;
            white-space: pre;
        }
        .bottom{
            margin-top: 30px;
            display: flex;
        }
        .bottom div{
            flex: 1;
            border: 1px solid rgb(118, 118, 118);
            height: 400px;
            margin: 10px;
        }
        .bottom div img{
            max-width: calc(100% - 20px);
            max-height: calc(100% - 20px);
            margin: 10px;
        }
        .bottom div textarea{
            resize: none;
            width: calc(100% - 21px);
            height: calc(100% - 21px);
            padding: 10px;
            font-size: 20px;
            outline: none;
            border: none;
        }
        .bottom div:first-child{
            margin-left: 0px;
            -webkit-box-align: center;
            -webkit-box-pack: center;
            display: -webkit-box;
        }
        .bottom div:last-child{
            margin-right: 0px;
        }
        .bottom div textarea {
    font-family: 'Sarabun', sans-serif; /* หรือ Arial */
    width: 100%;
    line-height: 1.5;
    letter-spacing: 1px;
    word-spacing: 2px;
}
    </style>
</head>
<body>
<?php include '../includes/navbar_welcome.php';?>
  <br>
  <div class="container">
        <div class="upper">
            <input type="file">
            <button>Start</button>
            <div class="progress"></div>
        </div>
        <div class="bottom">
            <div>
                <img src="">
            </div>
            <div>
                <textarea placeholder="text"></textarea>
            </div>
        </div>
    </div>
    <div class="container">
    <center><button type="button" class="btn btn-secondary btn-lg">Large button</button></center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/tesseract.js"></script>
    <script src="script.js"></script>
    <?php include '../includes/footer.php';?>
</body>
<?php mysqli_close($Connection);?>
</html>
