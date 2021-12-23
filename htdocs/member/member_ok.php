<?php
include "../db.php";
include "../password.php";

$userid = $_POST['userid'];
$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
$pwquestion = $_POST['pwquestion'];
$pwanswer = $_POST['pwanswer'];
$username = $_POST['name'];
$dong = $_POST['dong'];
$ho = $_POST['ho'];
$gender = $_POST['gender'];
$email = $_POST['email'].'@'.$_POST['emadress'];

$sql = mq("insert into member (id,pw,question,answer,name,dong,ho,gender,email) values('".$userid."','".$userpw."','".$pwquestion."','".$pwanswer."','".$username."','".$dong."','".$ho."','".$gender."','".$email."')");

?>
<meta charset="utf-8" />
<script type="text/javascript">alert('회원가입이 완료되었습니다.');</script>
<meta http-equiv="refresh" content="0 url=/">