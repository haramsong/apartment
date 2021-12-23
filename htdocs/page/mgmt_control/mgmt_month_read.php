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
                <td align="left" width="600" ><h2><?php echo substr($board["yr_month"],0,4);?>년 월간 관리비</h2></td>
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

        <table cellspacing="0", height="450" width="1800" class="list-table">
            </tr>
            <?php
            $av_sql2 = mq("SELECT *,elec_pub+elev_elec+wat_pub+mgt_reg+clean_fee+guard_fee+ins_fee AS plus2 FROM pub_mgmt_fee order by yr_month desc limit 0,12");
            $arr_rot = array( array(),
                array(),
                array(),
                array(),
                array(),
                array(),
                array(),
                array(),
                array()
            );

            $arr_title = ['연/월', '공동전기료', '승강기유지비','공동수도료', '관리비', '청소비', '경비비', '보험료'];

            $k = 0;
            while ($av_elec = $av_sql2->fetch_array()) {
                $j = 0;
                while ($j < 8) {
//                    switch($j) {
//                        case 0:
//                            $arr_rot[$j][$k] = $arr_title[$k];
//                            echo $arr_rot[$j][$k];
//                            echo ' ';
//                            break;
//                        default:
                            $arr_rot[$j][$k] = $av_elec[$j];
                             $arr_rot[$j][$k];
//                            echo ' ';
//                            break;
                    $j += 1;
                    }
                $k += 1;

            }
//            $a = 0;
//            while($a < 8) {
//                $b = 0;
//                echo '<tr>';
//                while($b < 12) {
//
//                    echo '<td>'; echo $arr_rot[$a][$b]; echo'</td>';
//                    $b += 1;
//                }
//                $a += 1;
//                echo '</tr>';
//            }
            $z = 0;
            while($z < 8) {
                $arr_rot[8][$z] = $arr_title[$z];
                $z += 1;
            }
//
            $a = 0;
            $b = 0;
            echo '<td align="center" width="120" class="line-col gray-col">'; echo $arr_rot[8][$a]; echo'</td>';
            while ($b < 12) {
                echo '<td align="right" width="110" class="line-col gray-col">'; echo substr($arr_rot[$a][$b],0,4);echo'/'; echo substr($arr_rot[$a][$b],4,2); echo'</td>';
                $b += 1;
            }
            $a += 1;
            while($a < 8) {
                $b = 0;
                echo '<tr>';
                echo '<td align="center" width="120" class="line-col yellow-col">'; echo $arr_rot[8][$a]; echo'</td>';
                while($b < 12) {
                    echo '<td align="right" width="110" class="line-col">'; echo number_format($arr_rot[$a][$b]); echo'</td>';
                    $b += 1;
                }
                $a += 1;
                echo '</tr>';
            }
//            ?>

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