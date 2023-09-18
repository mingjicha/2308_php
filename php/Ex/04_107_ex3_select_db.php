<?php
require_once("./04_107_ex2_fnc_db_connet.php");

$conn = null; // 객체 타입은 초기에 null 설정 해줘야 한다
my_db_conn($conn);

// SQL 작성
// 100004번 사원 정보를 출력해 주세요. ** 젤 앞과 젤 뒤는 공백 넣기, 세미콜론 빼기(보안상)
$sql = " SELECT "
	."			 * "
	." FROM "
	." 		employees "
	." WHERE "
	." 		emp_no = :emp_no " // ** 유저한테서 받는 거는 Prepared Statement
	;

// Prepared Statement 세팅
$arr_ps = [
	":emp_no" => 10004	
];

// Prepared Statement 생성
$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps); // 쿼리 실행
$result = $stmt -> fetchALL(); // 쿼리 결과를 fetch

print_r($result);

// DB 파기
// db_destroy_conn($conn);