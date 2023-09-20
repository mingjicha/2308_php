<?php
//	-----------------------------------------------
// 함수명	: my_db_conn
// 기능 	: DB Connect
// 파라미터 : PDO &$conn
// 리턴 	: boolen
//	-----------------------------------------------

// 02_064_ex1_function.php 레퍼런스 파라미터 참고
function my_db_conn( &$conn ) {
	// $db_host	= "localhost"; // host // del v002 ** 현업에서는 이력을 철저하게 남겨둔다
	$db_host	= "localhost"; // host // add v002
	// 127.0.0.1 == localhost
	$db_user	= "root"; // user
	// root - 최상위
	$db_pw		= "php504"; // password
	$db_name 	= "mini_board"; // DB name
	$db_charset = "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset".$db_charset;

	try {
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
		return true;
	} catch (Exception $e) {
		$conn = null; // DB 파기
		return false;
	}
}

function db_destroy_conn( &$conn ) {
	$conn = null;
}

//	-----------------------------------------------
// 함수명	: db_select_boards_paging
// 기능 	: boards paging 조회
// 파라미터 : PDO &$conn
// 리턴 	: Array / false
//	-----------------------------------------------
function db_select_boards_paging(&$conn) {
	try {
		$sql = 
		" SELECT "
		."		id "
		."		,title "
		."		,create_at "
		." FROM "
		."		boards "
		." ORDER BY "
		." 		id DESC "
		;
		
		$arr_ps = [];

		$stmt = $conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result = $stmt->fetchAll();
		return $result; // 정상 : 쿼리 결과 리턴
	} catch(Exception $e) {
		return false; // 예외 발생 : false 리턴	
	}
}


?>