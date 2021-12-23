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
$sql = mq("select * from pub_mgmt_fee order by yr_month desc limit 1"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
$plus_sql2 = mq("SELECT *, ceiling(elec_pub / 4) AS elec_pub_per, ceiling(elev_elec / 4) AS elev_elec_per, ceiling(wat_pub / 4) AS wat_pub_per, ceiling(mgt_reg / 4) AS mgt_reg_per, 
                    ceiling(clean_fee / 4) AS clean_fee_per, ceiling(guard_fee / 4) AS guard_fee_per, ceiling(ins_fee / 4) AS ins_fee_per, ceiling(elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) AS plus3,
                    ceiling((elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) / 4) AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 1 ");
$board4 = $plus_sql2->fetch_array();
$plus_sql3 = mq("SELECT *, ceiling(elec_pub / 4) AS elec_pub_per, ceiling(elev_elec / 4) AS elev_elec_per, ceiling(wat_pub / 4) AS wat_pub_per, ceiling(mgt_reg / 4) AS mgt_reg_per, 
                    ceiling(clean_fee / 4) AS clean_fee_per, ceiling(guard_fee / 4) AS guard_fee_per, ceiling(ins_fee / 4) AS ins_fee_per, ceiling(elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) AS plus3,
                    ceiling((elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) / 4) AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 1,1 ");
$last_month = $plus_sql3->fetch_array();
$plus_sql4 = mq("SELECT *, ceiling(elec_pub / 4) AS elec_pub_per, ceiling(elev_elec / 4) AS elev_elec_per, ceiling(wat_pub / 4) AS wat_pub_per, ceiling(mgt_reg / 4) AS mgt_reg_per, 
                    ceiling(clean_fee / 4) AS clean_fee_per, ceiling(guard_fee / 4) AS guard_fee_per, ceiling(ins_fee / 4) AS ins_fee_per, ceiling(elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) AS plus3,
                    ceiling((elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) / 4) AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 11,1 ");
$last_year = $plus_sql4->fetch_array();
//$plus_sql_av = mq("SELECT *, ceiling(elec_pub / 4) AS elec_pub_per, ceiling(elev_elec / 4) AS elev_elec_per, ceiling(wat_pub / 4) AS wat_pub_per, ceiling(mgt_reg / 4) AS mgt_reg_per,
//                    ceiling(clean_fee / 4) AS clean_fee_per, ceiling(guard_fee / 4) AS guard_fee_per, ceiling(ins_fee / 4) AS ins_fee_per, ceiling(elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) AS plus3,
//                    ceiling((elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee) / 4) AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 0, 12 ");

$av_sql = mq("SELECT *,elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee AS plus FROM pub_mgmt_fee order by yr_month desc limit 0,12");
$sum = 0;
$arr = array(0,0,0,0,0,0,0,0);
while ($av_elec = $av_sql->fetch_array()) {
    $i = 0;
    while ($i < 7) {
        $arr[$i] = $arr[$i] + $av_elec[$i + 1];
        $i += 1;
    }
    $sum = $sum + (int)$av_elec['plus'];
}



//$startzero = 0;
//while ($av_total = $plus_sql_av->fetch_array()) {
//    $find_av_elec = (int)$startzero + (int)av_total["elec_pub"];
//    $startzero = $find_av_elec;
//}
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
                <td align="left" width="600" ><h2><?php echo substr($board["yr_month"],0,4);?>년 <?php echo substr($board["yr_month"],4,2);?>월 총 관리비</h2></td>
                <td align="left" width="100">
                    <select name="yr_month_select">
                        <?php
                        $sql2 = mq("select * from pub_mgmt_fee order by yr_month desc limit 0,6");
                        while($board2 = $sql2->fetch_array()) {
                            $year = $board2["yr_month"];
                            echo '<option value="'; echo $board2["yr_month"]; echo '">'; echo substr($board2["yr_month"],0,4); ?>년 <?php echo substr($board2["yr_month"],4,2); ?>월<?php echo '</option>';
                        } ?>
                    </select>
                </td>
            </tr>
        </table>
        <table cellspacing="0" height="470" class="list-table">
            <tr>
                <td align="center" width="150" colspan="1"><h5><b>항목</b></h5></td>
                <td align="center" width="110" colspan="1"><h5><b>당월</b></h5></td>
                <td align="center" width="120" colspan="1"><h5><b>차액(전월)</b></h5></td>
                <td align="center" width="120" colspan="1"><h5><b>차액(전년)</b></h5></td>
                <td align="center" width="130" colspan="1"><h5><b>차액(연 평균)</b></h5></td>
            </tr>
            <tr>
                <td align="center" width="150" class="gray-col"><b>공동 전기료</b></td>
                <td align="right" width="120" class="blue-color line-col 1a" id="<?php echo number_format($board['elec_pub']);?>"><?php echo number_format($board['elec_pub']);?></td>
                <td align="right" width="80" class="yellow-col line-col 1b" id="<?php echo number_format((int)$board['elec_pub'] - (int)$last_month['elec_pub']);?>"><?php echo number_format((int)$board['elec_pub'] - (int)$last_month['elec_pub']);?></td>
<!--                <td align="right" width="80" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['elec_pub']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="70" class="yellow-col line-col" id="<?php echo number_format((int)$board['elec_pub'] - (int)$last_year['elec_pub']);?>"><?php echo number_format((int)$board['elec_pub'] - (int)$last_year['elec_pub']);?></td>
<!--                <td align="right" width="80" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['elec_pub']);?><!----><?php //echo ')';?><!--</td>-->

                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['elec_pub']-(int)$arr[0] / 12));?>"><?php echo number_format((int)((int)$board['elec_pub']-(int)$arr[0] / 12));?></td>
<!--                <td align="right" width="100" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$find_av_elec);?><!----><?php //echo ')';?><!--</td>-->
            </tr>
            <tr>
                <td align="center"  class="gray-col"><b>승강기 유지비</b></td>
                <td align="right"  class="blue-color line-col" id="<?php echo number_format($board['elev_elec']); ?>"><?php echo number_format($board['elev_elec']); ?></td>
                <td align="right"  class="yellow-col line-col" id="<?php echo number_format((int)$board['elev_elec'] - (int)$last_month['elev_elec']);?>"><?php echo number_format((int)$board['elev_elec'] - (int)$last_month['elev_elec']);?></td>
<!--                <td align="right"  class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['elev_elec']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['elev_elec'] - (int)$last_year['elev_elec']);?>"><?php echo number_format((int)$board['elev_elec'] - (int)$last_year['elev_elec']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['elev_elec']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['elev_elec']-(int)$arr[1] / 12));?>"><?php echo number_format((int)((int)$board['elev_elec']-(int)$arr[1] / 12));?></td>
            </tr>
            <tr>
                <td align="center" class="gray-col"><b>공동 수도료</b></td>
                <td align="right"  class="blue-color line-col" id="<?php echo number_format($board['wat_pub']); ?>"><?php echo number_format($board['wat_pub']); ?></td>
                <td align="right"  class="yellow-col line-col" id="<?php echo number_format((int)$board['wat_pub'] - (int)$last_month['wat_pub']);?>"><?php echo number_format((int)$board['wat_pub'] - (int)$last_month['wat_pub']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['wat_pub']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['wat_pub'] - (int)$last_year['wat_pub']);?>"><?php echo number_format((int)$board['wat_pub'] - (int)$last_year['wat_pub']);?></td>
<!--                <td align="right"  class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['wat_pub']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['wat_pub']-(int)$arr[2] / 12));?>"><?php echo number_format((int)((int)$board['wat_pub']-(int)$arr[2] / 12));?></td>
            </tr>
            <tr>
                <td align="center"  class="gray-col"><b>관리비</b></td>
                <td align="right" class="blue-color line-col" id="<?php echo number_format($board['mgt_reg']); ?>"><?php echo number_format($board['mgt_reg']); ?></td>
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['mgt_reg'] - (int)$last_month['mgt_reg']);?>"><?php echo number_format((int)$board['mgt_reg'] - (int)$last_month['mgt_reg']);?></td>
<!--                <td align="right"  class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['mgt_reg']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right"  class="yellow-col line-col" id="<?php echo number_format((int)$board['mgt_reg'] - (int)$last_year['mgt_reg']);?>"><?php echo number_format((int)$board['mgt_reg'] - (int)$last_year['mgt_reg']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['mgt_reg']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['mgt_reg']-(int)$arr[3] / 12));?>"><?php echo number_format((int)((int)$board['mgt_reg']-(int)$arr[3] / 12));?></td>
            </tr>
            <tr>
                <td align="center" class="gray-col"><b>청소비</b></td>
                <td align="right" class="blue-color line-col" id="<?php echo number_format($board['clean_fee']); ?>"><?php echo number_format($board['clean_fee']); ?></td>
                <td align="right" class="yellow-col line-col" id="-22"><?php echo number_format((int)$board['clean_fee'] - (int)$last_month['clean_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['clean_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['clean_fee'] - (int)$last_year['clean_fee']);?>"><?php echo number_format((int)$board['clean_fee'] - (int)$last_year['clean_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['clean_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['clean_fee']-(int)$arr[4] / 12));?>"><?php echo number_format((int)((int)$board['clean_fee']-(int)$arr[4] / 12));?></td>
            </tr>
            <tr>
                <td align="center" class="gray-col"><b>경비비</b></td>
                <td align="right" class="blue-color line-col" id="<?php echo number_format($board['guard_fee']); ?>"><?php echo number_format($board['guard_fee']); ?></td>
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['guard_fee'] - (int)$last_month['guard_fee']);?>"><?php echo number_format((int)$board['guard_fee'] - (int)$last_month['guard_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['guard_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['guard_fee'] - (int)$last_year['guard_fee']);?>"><?php echo number_format((int)$board['guard_fee'] - (int)$last_year['guard_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['guard_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['guard_fee'] -(int)$arr[5] / 12));?>"><?php echo number_format((int)((int)$board['guard_fee'] -(int)$arr[5] / 12));?></td>
            </tr>
            <tr>
                <td align="center" class="gray-col"><b>보험료</b></td>
                <td align="right" class="blue-color line-col" id="<?php echo number_format($board['ins_fee']); ?>"><?php echo number_format($board['ins_fee']); ?></td>
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['ins_fee'] - (int)$last_month['ins_fee']);?>"><?php echo number_format((int)$board['ins_fee'] - (int)$last_month['ins_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_month['ins_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board['ins_fee'] - (int)$last_year['ins_fee']);?>"><?php echo number_format((int)$board['ins_fee'] - (int)$last_year['ins_fee']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format((int)$last_year['ins_fee']);?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board['ins_fee']-(int)$arr[6] / 12));?>"><?php echo number_format((int)((int)$board['ins_fee']-(int)$arr[6] / 12));?></td>
            </tr>
            <tr>
                <td align="center" class="gray-col"><b>Total</b></td>
                <td align="right" class="blue-color line-col"><?php echo number_format($board4['plus3']); ?></td>
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board4['plus3'] - (int)$last_month['plus3']);?>"><?php echo number_format((int)$board4['plus3'] - (int)$last_month['plus3']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format($last_month['plus3']); ?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" class="yellow-col line-col" id="<?php echo number_format((int)$board4['plus3'] - (int)$last_year['plus3']);?>"><?php echo number_format((int)$board4['plus3'] - (int)$last_year['plus3']);?></td>
<!--                <td align="right" class="line-col">--><?php //echo '('; ?><!----><?php //echo number_format($last_year['plus3']); ?><!----><?php //echo ')';?><!--</td>-->
                <td align="right" width="100" class="yellow-col line-col" id="<?php echo number_format((int)((int)$board4['plus3']-(int)$sum / 12));?>"><?php echo number_format((int)((int)$board4['plus3']-(int)$sum / 12));?></td>

            </tr>
        </table>
        
        <script>

            $(".yellow-col").click(function(){
                var click_val = $(this).attr('id');
                var int_val = click_val.substr(0,1);
                if(int_val != "0") {
                    if(int_val == "-") {

                        $(this).addClass("red-col");
                    } else {

                        $(this).addClass("blue-col");
                    }
                }
            });
            $('.yellow-col').trigger("click");
        </script>
        <div id="foot_box"></div>
    </div>
</div>
</body>
</html>