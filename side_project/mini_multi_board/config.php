<?php
// 데이터베이스 설정을 위한 값들, 파일들의 path 
// 데이터베이스 뿐만 아니라 다른 권한을 위한 아이디, 비밀번호 설정같은 모든 설정들을 담아둠

// 경로
define("_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");

// DB 관련
define("_DB_HOST", "localhost"); // host
define("_DB_USER", "root"); // user
define("_DB_PW", "php504"); // user
define("_DB_NAME", "mini_multi_board"); // DB name
define("_DB_CHARSET", "utf8mb4"); // charset

// 기타
define("_EXTENSION_PHP", ".php");