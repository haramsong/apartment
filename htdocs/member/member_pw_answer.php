<?php
include "../db.php";
$pwquestion = $_POST['pwquestion'];
$pwanswer = $_POST['pwanswer'];
$sql = mq("select * from member where question='{$pwquestion}' AND answer='{$pwanswer}'");
$result = $sql->fetch_array();

if($result["question"] == $pwquestion && $result["answer"] == $pwanswer){
    echo "<script>alert('회원님의 비밀번호를 변경합니다.'); location.href='member_pw_update.php';</script>";

}else{
    echo "<script>alert('틀렸습니다. 다시 확인해주세요.'); history.back();</script>";
}
?>