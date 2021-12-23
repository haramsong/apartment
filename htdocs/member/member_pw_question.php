<?php
include "../db.php";
//if(isset($_SESSION['userid'])){
//    echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
//}else{ ?>
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>비밀번호 찾기</title>
        <style>
            * {margin: 0 auto;}
            .find {text-align:center; width:500px; margin-top:30px; }
        </style>
    </head>
    <body>
    <div class="find">
        <form method="post" action="member_pw_answer.php">
            <h1>비밀번호 질문</h1>
            <fieldset>
                <legend></legend>
                <table>
                    <tr>
                    <td align="left" width="130">비밀번호 찾기 질문</td>
                    <td align="left" width="400"><select name="pwquestion">
                            <option value="birthplace">당신의 출생지는 어디십니까?</option>
                            <option value="highschool">당신이 다니던 고등학교의 이름이 무엇입니까?</option>
                            <option value="treasure">당신의 보물 1호는 무엇입니까?</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td align="left" width="130">비밀번호 찾기 정답</td>
                        <td align="left" width="200"><input type="text" size="35" name="pwanswer" placeholder="정답" required></td>
                    </tr>
                </table>
                <input type="submit" value="변경하기" />
            </fieldset>
        </form>
    </div>
    </body>
    </html>
<?php //} ?>