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
<div id="div-container">
<div id="board_write">
    <h1><a href="/requirement.php">건의사항</a></h1>
    <div id="write_area">
        <form action="write_ok.php" method="post">
            <div id="in_title">
                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
            </div>
            <div class="wi_line"></div>
            <div id="in_name">
                <textarea name="name" id="uname" rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
            </div>
            <div class="wi_line"></div>
            <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
            </div>
            <div id="in_pw">
                <input type="password" name="pw" id="upw"  placeholder="비밀번호" required />
            </div>
            <div class="bt_se">
                <button type="submit">글 작성</button>
            </div>
        </form>
    </div>
</div>
</div>
</body>
</html>

