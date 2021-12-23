<?php

include $_SERVER['DOCUMENT_ROOT']."/db.php";
$total_fee = $_POST['elec_pub'] + $_POST['elev_elec'] + $_POST['wat_pub'] + $_POST['mgt_reg'] + $_POST['clean_fee'] + $_POST['guard_fee'] + $_POST['ins_fee'];
//sql문을 합계를 써서 table에 저장.
$sql = mq("insert into pub_mgmt_fee(dong,yr_month,total_fee,elec_pub,elev_elec,wat_pub,mgt_reg,clean_fee,guard_fee,ins_fee) values('".$_POST['dong']."','".$_POST['yr_month']."','".$total_fee."','".$_POST['elec_pub']."','".$_POST['elev_elec']."','".$_POST['wat_pub']."','".$_POST['mgt_reg']."','".$_POST['clean_fee']."','".$_POST['guard_fee']."','".$_POST['ins_fee']."')"); ?>
<script type="text/javascript">alert("글쓰기 완료되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=mgmt_pg.php" />