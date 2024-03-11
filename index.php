<?php
require_once('connections/mysqli.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $title; ?></title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<style>
    body {
      background-color: #BFBFBF; /* พื้นหลัง */
    }

    .jumbotron {
      background-color: #59A7E5; /* index ic */ 33333333333333333
      color: #ffffff; /* สีตัวอักษรของ jumbotron */ 44444444444444
      padding: 2rem; /* เพิ่ม padding ใน jumbotron */ 555555
      margin-top: 2rem; /* เพิ่ม margin-top ใน jumbotron */
    }

    .jumbotron h1, .jumbotron h4 {
      color: #ffffff; /* สีของตัวอักษรในหัวข้อของ jumbotron */
    }

    .jumbotron img {
      width: 100%; /* ทำให้รูปภาพขนาดเต็มความกว้างของ jumbotron */
    }

    .jumbotron .btn {
      margin-top: 1rem; /* เพิ่ม margin-top ในปุ่ม */
    }
  </style>
<body class="default">
  <?php include 'includes/navbar.php';?>
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-11">
        <?php
        for ($i=1; $i <= 4 ; $i++) { 
          ?> <!-- ความห่างของกรอบ -->
          <div class="jumbotron"> 
            <h1 class="display-4"><u>TEST HOMEPAGE MAIN</u></h1>
            <h4 class="display-10">ทดสอบหน้าหลัก</h4>
            <div class="row">
              <div class="col-md-3"> <!-- ให้รูปภาพใน column ขนาด 3/12 -->
                <!-- เริ่มต้น Bootstrap Carousel -->
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="assets/images/test.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="assets/images/test.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="assets/images/test.jpg" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
                <!-- จบ Bootstrap Carousel -->
              </div>
              <div class="col-md-4"> <!-- ให้ปุ่มอยู่ใน column ขนาด 4/12 -->
                <div class="text-right mb-2"> <!-- จัดตำแหน่งปุ่มอยู่ทางขวาและเว้นระยะห่างด้านล่าง -->
                  <button type="button" class="btn btn-outline-dark">ทดสอบ</button>
                </div>
              </div>
            </div>
          </div>
          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php include 'includes/footer.php';?>
  <script type="text/javascript" src="assets/jquery/jquery-slim.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <?php mysqli_close($Connection);?>
</body>

</html>
