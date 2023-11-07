<?php
// try-catch문 : 예외 처리를 하기 위한 문법
require_once("./04_107_ex2_fnc_db_connet.php");
$conn = null;

try {	// 우리가 실행하고 싶은 소스코드를 작성	
	echo "트라이";
	my_db_conn($conn);
	// SQL 작성
	$sql = " SELECT * FROM EMPLOYEES WHERE emp_no = :emp_no "; // **SELECT에서 > SELEC로
	// Prepared Statement 셋팅
	$arr_ps = [
		":emp_no" => 10004
	];
	$stmt = $conn -> prepare($sql);
	$stmt -> execute($arr_ps);
	$result = $stmt -> fetchALL();
	// print_r($result);
} catch( Exception $e ) {	// 예외가 발생 했을 떄 실행되는 소스코드를 작성
	echo "예외 발생 : {$e -> getMessage()}";
} finally {	// 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드를 작성
	//db 파기
	db_destroy_conn($conn);
	echo "파이널리";
}
