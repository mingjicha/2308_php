<?php

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>목록</title>
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
    <a href="./05_insert.html" class="insert_btn">혼자 놀기</a>
    <div class="board">
        <table>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성일</th>
            </tr>
            <tr>
                <td>2</td>
                <td>햄찌 기여오</td>
                <td>2023-10-25</td>
            </tr>
            <tr>
                <td>1</td>
                <td>냠냠</td>
                <td>2023-10-24</td>
            </tr>
        </table>
    </div>    
</body>
</html>