<?php

// 간단하게 확인하기 위해 만든 파일
// 객체 지향으로 만들 거라서 닫는 태그 이제 안 쓸 것

// echo "멀티보드 인덱스 : ".$_GET["url"];
require_once("config.php"); // 설정 파일 불러오기

// require_once("router\Router.php"); // 라고 불러와줬어야 하는데 자동으로 php가 부를 수 있게 해주는 것(오토로드)
require_once("autoload.php"); // 오토로드 파일 불러오기 

// echo _EXTENSION_PHP; // config 연결 확인하기
// 라우터 호출
new router\Router(); // 라우터 파일 경로를 적고 호출


