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
$bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
$hit = mysqli_fetch_array(mq("select * from mrk_notice where idx ='".$bno."'"));
$hit = $hit['hit'] + 1;
$fet = mq("update mrk_notice set hit = '".$hit."' where idx = '".$bno."'");
$sql = mq("select * from mrk_notice where idx='".$bno."'"); /* 받아온 idx값을 선택 */
$board = $sql->fetch_array();
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
    <h2><?php echo $board['title']; ?></h2>
    <div id="user_info">
        <?php echo $board['name']; ?> <?php echo $board['date']; ?> 조회:<?php echo $board['hit']; ?>
        <div id="bo_line"></div>
    </div>
    <div id="bo_content">
        <?php echo nl2br("$board[content]"); ?>
    </div>
    <!-- 목록, 수정, 삭제 -->
    <div id="bo_ser">
        <ul>
            <li><a href="/notice.php">[목록으로]</a></li>
            <li><a href="modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
            <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
        </ul>
    </div>

    <!--- 댓글 불러오기 -->
    <div class="reply_view">
        <h3>댓글목록</h3>
        <?php
        $sql3 = mq("select * from com_noticecomment where con_num='".$bno."' order by idx desc");
        while($com_noticecomment = $sql3->fetch_array()){
            ?>
            <div class="dap_lo">
                <div><b><?php echo $com_noticecomment['name'];?></b></div>
                <div class="dap_to comt_edit"><?php echo nl2br("$com_noticecomment[content]"); ?></div>
                <div class="rep_me dap_to"><?php echo $com_noticecomment['date']; ?></div>
                <div class="rep_me rep_menu">
                    <a class="dat_edit_bt" href="#">수정</a>
                    <a class="dat_delete_bt" href="#">삭제</a>
                </div>
                <!-- 댓글 수정 폼 dialog -->
                <div class="dat_edit">
                    <form method="post" action="rep_modify_ok.php">
                        <input type="hidden" name="rno" value="<?php echo $com_noticecomment['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                        <input type="password" name="pw" class="dap_sm" placeholder="비밀번호" />
                        <textarea name="content" class="dap_edit_t"><?php echo $com_noticecomment['content']; ?></textarea>
                        <input type="submit" value="수정하기" class="re_mo_bt">
                    </form>
                </div>
                <!-- 댓글 삭제 비밀번호 확인 -->
                <div class='dat_delete'>
                    <form action="reply_delete.php" method="post">
                        <input type="hidden" name="rno" value="<?php echo $com_noticecomment['idx']; ?>" /><input type="hidden" name="b_no" value="<?php echo $bno; ?>">
                        <p>비밀번호<input type="password" name="pw" /> <input type="submit" value="확인"></p>
                    </form>
                </div>
            </div>
        <?php } ?>

        <!--- 댓글 입력 폼 -->
        <div class="dap_ins">
            <input type="hidden" name="bno" class="bno" value="<?php echo $bno; ?>">
            <input type="text" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디">
            <input type="password" name="dat_pw" id="dat_pw" class="dat_pw" size="15" placeholder="비밀번호">
            <div style="margin-top:10px; ">
                <textarea name="content" class="reply_content" id="re_content" ></textarea>
                <button id="rep_bt" class="re_bt">댓글</button>
            </div>
        </div>
    </div><!--- 댓글 불러오기 끝 -->
    <div id="foot_box"></div>
</div>
</div>
</body>
</html>
