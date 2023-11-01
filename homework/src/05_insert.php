<?php

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>작성</title>
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/homework/src/css/gnb.js"></script> -->
</head>
<body>
    <!-- 배경 이미지 -->
    <div class="back_img"></div>
    <!-- 샤라락 버튼 -->
    <div class="main_btn">
        <a href="javascript:void(0);" class="menu_btn">샤라락</a>
        <div class="gnb_wrap">
            <ul class="gnb active">
                <li>
                    <a href="/homework/src/02_welcome.php">어스오세요</a>
                </li>
                <li>
                    <a href="/homework/src/03_hello.php">반갑습니다</a>
                </li>
                <li>
                    <a href="/homework/src/04_list.php">이래저래요</a>
                </li>
            </ul>
        </div>
    </div> 
    <!-- form 양식 만들어서 작성글 받아주기 -->
    <div class="main">
        <div class="board"> 
            <p>냠냠</p>
            <p>헤이즐넛 라떼 맛있오</p>
            <p>챱챱챱</p>
        </div> 
            <!-- 작성 : button, 취소 : a 태그 -->
            <a href="./05_insert.php">작성</a>
            <a href="./04_list.php">취소</a>
    </div> 
</body>
</html>