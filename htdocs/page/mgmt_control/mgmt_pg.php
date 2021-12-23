<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/css/styles.css" />
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
                <a class="nav-link" href="../../login.php">로그인</a>
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
        <h1>관리세 설정</h1>
        <div id="border-set">
            <form method="post" action="mgmt_pub_set.php" name="memform">
                <div id="table-container">
                    <div class="margin-control">
                        <h1>공동 관리세</h1>
                        <table cellspacing="0" height="400">
                            <tr>
                                <td align="left" width="250" >동</td>
                                <td align="left" width="400"><input type="text" size="35" name="dong" id="udong" placeholder="동" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">년/월</td>
                                <td align="left" width="200"><input type="text" size="35" name="yr_month" id="uyr_month" placeholder="년/월" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">공동 전기세</td>
                                <td align="left" width="200"><input type="text" size="35" name="elec_pub" id="uelec_pub" placeholder="공동 전기세" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">승강기 요금</td>
                                <td align="left" width="200"><input type="text" size="35" name="elev_elec" placeholder="승강기 요금" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">공동 수도세</td>
                                <td align="left" width="200"><input type="text" size="35" name="wat_pub" placeholder="공동 수도세" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">기본 관리비</td>
                                <td align="left" width="200"><input type="text" size="35" name="mgt_reg" placeholder="기본 관리비" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">청소비</td>
                                <td align="left" width="200"><input type="text" size="35" name="clean_fee" placeholder="청소비" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">경비비</td>
                                <td align="left" width="200"><input type="text" size="35" name="guard_fee" placeholder="경비비" required></td>
                            </tr>
                            <tr>
                                <td align="left" width="250">보험료</td>
                                <td align="left" width="200"><input type="text" size="35" name="ins_fee" placeholder="보험료" required></td>
                            </tr>
                        </table>
                        <input type="submit" value="작성 완료" />
                    </div>
                </div>
            </form>
        </div>
        <div id="border-set">
        <form method="post" action="mgmt_per_set.php" name="memform">
            <div id="table-container">
                <div class="margin-control">
                    <h1>개인 관리세</h1>
                    <table cellspacing="0" height="400">
                        <tr>
                            <td align="left" width="250" >동</td>
                            <td align="left" width="400"><input type="text" size="35" name="dong" id="udong" placeholder="동" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">호</td>
                            <td align="left" width="200"><input type="text" size="35" name="ho" id="uho" placeholder="호" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">년/월</td>
                            <td align="left" width="200"><input type="text" size="35" name="yr_month" id="uyr_month" placeholder="년/월" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">개인 전기세</td>
                            <td align="left" width="200"><input type="text" size="35" name="elec_per" id="uelec_per" placeholder="개별 전기세" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">TV 수신료</td>
                            <td align="left" width="200"><input type="text" size="35" name="tv_fee" placeholder="TV 수신료" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">개인 수도세</td>
                            <td align="left" width="200"><input type="text" size="35" name="wat_per" placeholder="개인 수도세" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">하수도세</td>
                            <td align="left" width="200"><input type="text" size="35" name="sew_per" placeholder="하수도세" required></td>
                        </tr>
                        <tr>
                            <td align="left" width="250">음식물 쓰레기 처리비용</td>
                            <td align="left" width="200"><input type="text" size="35" name="waste_per" placeholder="처리 비용" required></td>
                        </tr>
                    </table>
                    <input type="submit" value="작성 완료" />
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>