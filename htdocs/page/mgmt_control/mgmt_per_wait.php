<meta charset="utf-8" />
<?php
include $_SERVER['DOCUMENT_ROOT']."/db.php";

//POST로 받아온 아이다와 비밀번호가 비었다면 알림창을 띄우고 전 페이지로 돌아갑니다.
if(isset($_SESSION['userid'])){
    echo "<script>location.href='mgmt_per_read.php';</script>";
}else{
    echo "<script>alert('회원정보가 없습니다. 로그인 해주시기 바랍니다.'); history.back();</script>";
}
?>