<?php
// ***********************************************
// 파일명 	: 04_107_fnc_db_connect.php
// 기능 	: DB 연동 관련 함수
// 버전		: 230918 new Cha.mj (or 사번)
// 				v002 dbconn 설정 변경 Cha.mj 230918 // 수정했을 경우
// ***********************************************

//	-----------------------------------------------
// 함수명	: my_db_conn
// 기능 	: DB Connect
// 파라미터 : PDO &$conn
// 리턴 	: 없음
//	-----------------------------------------------

// 02_064_ex1_function.php 레퍼런스 파라미터 - 참고
function my_db_conn( &$conn ) {
	// $db_host	= "localhost"; // host // del v002 ** 현업에서는 이력을 철저하게 남겨둔다
	$db_host	= "localhost"; // host // add v002
	// 127.0.0.1 == localhost
	$db_user	= "root"; // user
	// root - 최상위
	$db_pw		= "php504"; // password
	$db_name 	= "employees"; // DB name
	$db_charset = "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset".$db_charset;

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES		=> false
		// DB의 Prepared Statement 기능을 사용하도록 설정
		,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
		// PDO EXception을 Throws하도록 설정
		,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC
		// 연상배열로 Fetch를 하도록 설정
	];

	// PDO Class로 DB 연동
	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

function db_destroy_conn( &$conn ) {
	$conn = null;
}