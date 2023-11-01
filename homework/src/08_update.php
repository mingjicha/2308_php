<?php

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정</title>
    <link rel="stylesheet" href="/과제애오/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/과제애오/src/css/gnb.js"></script> -->
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
                    <a href="./02_welcome.html">어스오세요</a>
                </li>
                <li>
                    <a href="./03_hello.html">반갑습니다</a>
                </li>
                <li>
                    <a href="./04_list.html">이래저래요</a>
                </li>
            </ul>
        </div>
    </div>     
    <div class="main">
        <!-- 글 번호는 받아오고 제목, 내용은 수정할 수 있게 -->
        <div class="board"> 
            <p>냠냠</p>
            <p>헤이즐넛 라떼 맛있오</p>
            <p>챱챱챱</p>
            <p>내일도 먹오야지🥰</p>
        </div>
        <!-- 수정 : button, 취소 : a 태그 -->
        <a href="./08_update.html">수정</a>
        <a href="./04_list.html">취소</a>
    </div>
</body>
</html>