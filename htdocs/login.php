<?php
include "db.php"; ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>회원가입 및 로그인 사이트</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="js/member_check.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        function findid(){
                url = "member/member_find.php";
                window.open(url,"chkid","width=500,height=500,top=100,left=600");
        }

    </script>
</head>
<body>
<nav class="nav-margin navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">KUKDONG COMMUNITY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <span class="mr-auto"></span>
        <ul class="navbar-nav">
            <li class="nav-item form-inline">
                <a class="nav-link" href="login.php">로그인</a>
            </li>
            <li class="nav-item form-inline">
                <a class="nav-link" href="#">내 활동</a>
            </li>
        </ul>
    </div>
    <!--    <a class="navbar-brand alarm-background" href="#"></a>-->
</nav>
<div class="center-align">
    <div class="login_box">
        <h1>로그인</h1>
        <form method="post" align="center" action="/member/login_ok.php">
            <div class="margin-control">
                <table align="center" border="0" cellspacing="0" width="300" height="80">
                    <tr>
                        <td width="130" colspan="1">
                            <input type="text" name="userid" class="inph">
                        </td>
                        <td rowspan="2" align="center" width="100" >
                            <button type="submit" id="btn" >로그인</button>
                        </td>
                    </tr>
                    <tr>
                        <td width="130" colspan="1">
                            <input type="password" name="userpw" class="inph">
                        </td>
                    </tr>
                </table>

            <div id="find-id">
                <a href="#" onclick="findid();">아이디/비밀번호 찾기</a><a href="/member/member.php">회원가입</a>
            </div>
            </div>
        </form>
    </div>
    </div>
</div>
</body>
</html>