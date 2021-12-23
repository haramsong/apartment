<?php
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>극동 입주민 커뮤니티</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">KUKDONG COMMUNITY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <span class="mr-auto"></span>
       <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item form-inline">
                <a class="nav-link" href="#">주민 공지</a>
            </li>
            <li class="nav-item form-inline">
                <a class="nav-link" href="#">공동 생활</a>
            </li>
            <li class="nav-item form-inline">
                <a class="nav-link" href="#">주변 환경</a>
            </li>
        </ul>-->
        <ul class="navbar-nav">
            <li class="nav-item form-inline">
                <?php if (isset($_SESSION['userid'])) {
                echo '<a class="nav-link" href="#"><img class ="my-page-icon" src="img/my_icon.ico." width="25"/></a>';
                }?>
            </li>
            <li class="nav-item form-inline">

                <?php if (isset($_SESSION['userid'])) {
                    echo '
                        <a class="nav-link" href="member/logout.php">로그아웃</a>';
                }
                else {
                    echo '<a class="nav-link" href="login.php">로그인</a>';
                }
                ?>
            </li>
        </ul>
    </div>
    <!--    <a class="navbar-brand alarm-background" href="#"></a>-->
</nav>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active carousel1">
        </div>
        <div class="carousel-item carousel2">
        </div>
        <div class="carousel-item carousel3">
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
<div class="container ">
    <div class="row">
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="notice.php">
                <img src="img/001-smarthouse.png" width="80" height="80">
                <h3>공지사항</h3>
                </a>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="requirement.php">
                <img src="img/005-password.png" width="80" height="80">
                <h3>건의사항</h3>
                </a>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="anabada.php">
                <img src="img/011-door.png" width="80" height="80">
                <h3>아나바다</h3>
                </a>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <img src="img/013-light.png" width="80" height="80">
                <h3>공동구매</h3>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <img src="img/022-console.png" width="80" height="80">
                <h3>공동관리규약</h3>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="page/mgmt_control/mgmt_per_wait.php">
                <img src="img/024-socket.png" width="80" height="80">
                <h3>개별관리비내역</h3>
                </a>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="page/mgmt_control/mgmt_pub_wait.php">
                <img src="img/028-unlock.png" width="80" height="80">
                <h3>공동관리비내역</h3>
                </a>
            </div>
        </div>
        <div class="margin-control center-align col-12 col-md-6 col-lg-4 col-xl-3">
            <div>
                <a href="page/mgmt_control/mgmt_month_read.php">
                <img src="img/030-settings.png" width="80" height="80">
                <h3>월간 관리비 기록</h3>
                </a>
            </div>
        </div>
        <!--<div class="col-12 col-md-6 col-lg-4 col-xl-3">
          One of three columns
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          One of three columns
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          One of three columns
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          One of three columns
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
          One of three columns
        </div>
      </div>-->
    </div>
</body>
</html>