<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php"; /* db load */
?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>
    <script type="text/javascript" src="/js/common.js"></script>
</head>
<body>
<?php
$userdong = $_SESSION['userdong'];
$userho = $_SESSION['userho'];
$sql = mq("select * from per_mgmt_fee where dong='".$userdong."' and ho='".$userho."' order by yr_month desc limit 1"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
$plus_sql = mq("SELECT *, elec_per+tv_fee+wat_per+sew_per+waste_per AS plus FROM per_mgmt_fee ");
$board3 = $plus_sql->fetch_array();
$plus_sql2 = mq("SELECT *, ceiling(elec_pub / 4) AS elec_pub_per, ceiling(elev_elec / 4) AS elev_elec_per, ceiling(wat_pub / 4) AS wat_pub_per, ceiling(mgt_reg / 4) AS mgt_reg_per, 
                    ceiling(clean_fee / 4) AS clean_fee_per, ceiling(guard_fee / 4) AS guard_fee_per, ceiling(ins_fee / 4) AS ins_fee_per, 
                    ceiling((elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) / 4) AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 1 ");
$board4 = $plus_sql2->fetch_array();
//$plus_all = mq("SELECT * FROM per_mgmt_fee INNER JOIN pub_mgmt_fee ON per_mgmt_fee.yr_month = pub_mgmt_fee.yr_month,per_mgmt_fee.elec_per+per_mgmt_fee.tv_fee+
//                per_mgmt_fee.wat_per+per_mgmt_fee.sew_per+per_mgmt_fee.waste_per+ ceiling((pub_mgmt_fee.elec_pub+pub_mgmt_fee.elev_elec+pub_mgmt_fee.wat_pub+
//                pub_mgmt_fee.mgt_reg+pub_mgmt_fee.clean_fee+pub_mgmt_fee.guard_fee+pub_mgmt_fee.ins_fee) / 4) AS plus_all order by yr_month desc");
//$board5 = $plus_all->fetch_array();
?>
<!-- 글 불러오기 -->
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
<div id="div-container">


    <div id="board_read">
        <table cellspacing="0" height="200">
            <tr>
                <td align="left" width="600" ><h2><?php echo $board['dong'];?>동 <?php echo $board['ho'];?>호 의 관리비</h2></td>
                <td align="left" width="100">
                    <form action="mgmt_per_load.php/<?php echo $board['yr_month']; ?>" method="post" class="right-float">
                        <select name="yr_month_select">
                            <?php
                            $sql2 = mq("select * from pub_mgmt_fee order by yr_month desc limit 0,6");
                            while($board2 = $sql2->fetch_array()) {
                                $year = $board2["yr_month"];
                                echo '<option value="'; echo $board2["yr_month"]; echo '">'; echo $board2["yr_month"]; echo '</option>';} ?></select>
                    </form>
                </td>
            </tr>
        </table>
        <table cellspacing="0" height="470" class="list-table">
            <tr>
                <td algin="center" width="650" colspan="2"><h3>개별 요금</h3></td>
                <td algin="center" width="650" colspan="2"><h3>공동 요금</h3></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>개별 전기료</b></td>
                <td align="left" width="400"><?php echo $board['elec_per'];?></td>
                <td align="left" width="250" ><b>공동 전기료</b></td>
                <td align="left" width="400"><?php echo $board4['elec_pub_per'];?></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>TV 수신료</b></td>
                <td align="left" width="400"><?php echo $board['tv_fee']; ?></td>
                <td align="left" width="250" ><b>승강기 유지비</b></td>
                <td align="left" width="400"><?php echo $board4['elev_elec_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>개별 수도료</b></td>
                <td align="left" width="400"><?php echo $board['wat_per']; ?></td>
                <td align="left" width="250" ><b>공동 수도료</b></td>
                <td align="left" width="400"><?php echo $board4['wat_pub_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>하수도 금액</b></td>
                <td align="left" width="400"><?php echo $board['sew_per']; ?></td>
                <td align="left" width="250" ><b>관리비</b></td>
                <td align="left" width="400"><?php echo $board4['mgt_reg_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>음식물 처리비용</b></td>
                <td align="left" width="400"><?php echo $board['waste_per']; ?></td>
                <td align="left" width="250" ><b>청소비</b></td>
                <td align="left" width="400"><?php echo $board4['clean_fee_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ></td>
                <td align="left" width="400"></td>
                <td align="left" width="250" ><b>경비비</b></td>
                <td align="left" width="400"><?php echo $board4['guard_fee_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ></td>
                <td align="left" width="400"></td>
                <td align="left" width="250" ><b>보험료</b></td>
                <td align="left" width="400"><?php echo $board4['ins_fee_per']; ?></td>
            </tr>
            <tr>
                <td align="left" width="250" ><b>개인 Total</b></td>
                <td align="left" width="400"><?php echo $board3['plus']; ?></td>
                <td align="left" width="250" ><b>공동 Total</b></td>
                <td align="left" width="400"><?php echo $board4['plus2']; ?></td>
            </tr>
            <!--            <tr>-->
            <!--                <td align="left" width="250" >Total</td>-->
            <!--                <td align="left" width="400">--><?php //echo $board5['plus_all']; ?><!--</td>-->
            <!--                <td align="left" width="250" ></td>-->
            <!--                <td align="left" width="400"></td>-->
            <!--            </tr>-->
        </table>

        <div id="foot_box"></div>
    </div>
</div>
</body>
</html>