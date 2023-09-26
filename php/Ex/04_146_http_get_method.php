<?php

// URL의 구조
// http://www.naver.com/mini_board/src/list.php/?page=2&num=10
// 프로토콜 : 통신을 하기위한 규약, 약속, 규칙 (http 부분)
// 도메인 : 접속하고자 하는 서버의 ip 또는 별칭 (www.naver.com 부분)
// 패스 : 실행 시키고자 하는 처리의 주소 (mini_board/src/list.php 부분)
// 쿼리스트링(파라미터) : Get Method로 통신할 때 보내주는 데이터 (?page=2&num=10 부분) 항상 시작 앞에 ? 붙여야 함

// HTTP(HyperText Transfer Protocol) 통신 : 하이퍼텍스트 전송 프로토콜(HTTP)은 월드 와이드 웹의 토대이며 
//											하이퍼텍스트 링크를 사용하여 웹 페이지를 로드하는 데 사용됩니다. 
//			   								HTTP는 네트워크 장치 간에 정보를 전송하도록 설계된 애플리케이션 계층 프로토콜이며 
//											네트워크 프로토콜 스택의 다른 계층 위에서 실행됩니다.
// HTML 파일(글자만 있는)을 Request, Response하는 프로토콜
// 단, 요즘은 JSON 등등 여러 텍스트 형식도 통신이 가능
// php는 HTML을 불러드려서 읽을 수 있게 가공하는 게 슈퍼글로벌 변수

// GET 전송할 때 
// POST 받을 때 

// GET Method : 외부에 유출이 됨
print_r($_GET);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<a href="/04_146_http_get_method.php/?page=1&num=10">test</a>
</body>
</html>

