<?php include "../db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>회원가입 폼</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <script>
        function checkid() {
            var userid = document.getElementById("uid").value;
            if (userid) {
                url = "check.php?userid=" + userid;
                window.open(url, "chkid", "width=300,height=100,top=200,left=700");
            } else {
                alert("아이디를 입력하세요");
            }
        }
        function checkpw() {
            var pwd1 = $("#upw").val();
            var pwd2 = $("#upwck").val();
            if (pwd1 != pwd2){
                alert
            }
        }
    </script>
    <script type="text/javascript">
        $(function(){
            $("#alert-success").hide();
            $("#alert-danger").hide();
            $("input").keyup(function(){
                var pwd1=$("#upw").val();
                var pwd2=$("#upwck").val();
                if(pwd1 != "" || pwd2 != ""){
                    if(pwd1 == pwd2){
                        $("#alert-success").show();
                        $("#alert-danger").hide();
                        $("#submit").removeAttr("disabled");
                    }else{
                        $("#alert-success").hide();
                        $("#alert-danger").show();
                        $("#submit").attr("disabled", "disabled");
                    }
                }
            });
        });
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
                <a class="nav-link" href="../login.php">로그인</a>
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
    <form method="post" action="member_ok.php" name="memform">
        <div id="table-container">
            <div class="margin-control">
        <h1>회원가입</h1>
            <table cellspacing="0" height="400">
                <tr>
                    <td align="left" width="250" >아이디</td>
                    <td align="left" width="400"><input type="text" size="35" name="userid" id="uid" placeholder="아이디" required>
                        <input class="left-margin" type="button" value="중복검사" onclick="checkid();" />
                        <input type="hidden" value="0" name="chs" />
                    </td>
                </tr>
                <tr>
                    <td align="left" width="250">비밀번호</td>
                    <td align="left" width="200"><input type="password" size="35" name="userpw" id="upw" placeholder="비밀번호" required></td>
                </tr>
                <tr>
                    <td align="left" width="250">비밀번호 확인</td>
                    <td align="left" width="200"><input type="password" size="35" name="userpwck" id="upwck" placeholder="비밀번호" required></td>
                    <td align="left" width="10">
                        <div class="alert alert-success alert-size" id="alert-success" >O</div>
                        <div class="alert alert-danger alert-size" id="alert-danger">X</div>
                    </td>
                </tr>
                <tr>
                    <td align="left" width="250">비밀번호 찾기 질문</td>
                    <td align="left" width="400"><select name="pwquestion">
                            <option value="birthplace">당신의 출생지는 어디십니까?</option>
                            <option value="highschool">당신이 다니던 고등학교의 이름이 무엇입니까?</option>
                            <option value="treasure">당신의 보물 1호는 무엇입니까?</option>
                        </select></td>
                </tr>
                <tr>
                    <td align="left" width="250">비밀번호 찾기 정답</td>
                    <td align="left" width="200"><input type="text" size="35" name="pwanswer" placeholder="정답" required></td>
                </tr>
                <tr>
                    <td align="left" width="250">이름</td>
                    <td align="left" width="200"><input type="text" size="35" name="name" placeholder="이름" required></td>
                </tr>
                <tr>
                    <td align="left" width="250">동</td>
                    <td align="left" width="200"><input type="text" size="35" name="dong" placeholder="동" required></td>
                </tr>
                <tr>
                    <td align="left" width="250">호</td>
                    <td align="left" width="200"><input type="text" size="35" name="ho" placeholder="호" required></td>
                </tr>
                <tr>
                    <td align="left" width="250">성별</td>
                    <td align="left" width="200">남<input type="radio" name="gender" value="남"> 여<input type="radio" name="gender" value="여"></td>
                </tr>
                <tr>
                    <td align="left" width="250">이메일</td>
                    <td align="left" width="400"><input type="text" name="email" required>@<select name="emadress" required>
                            <option value="naver.com">naver.com</option>
                            <option value="nate.com">nate.com</option>
                            <option value="hanmail.com">hanmail.com</option>
                        </select></td>
                </tr>
            </table>
            <input type="submit" onclick="checkpw();" value="가입하기" />
        </div>
        </div>
    </form>
    </div>
</div>
</body>
</html>