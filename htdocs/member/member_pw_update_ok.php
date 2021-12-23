<?php

include "../db.php";
include "../password.php";
$userpwcheck = $_POST['pw'];
$userpwcorrect = $_POST['pwck'];
if ($userpwcheck == $userpwcorrect) {
    $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    $sql = mq("update member set pw='" . $userpw . "' where id = '" . $_SESSION['uid'] . "'");
    session_destroy();
    echo "<script>alert('비밀번호를 변경했습니다.'); window.close();</script>";
} else {
    echo "<script>alert('비밀번호를 확인해주세요.'); history.back();</script>";
}

?>