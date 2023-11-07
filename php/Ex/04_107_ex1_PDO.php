<?php
$db_host	= "localhost"; // host
// 127.0.0.1 == localhost
$db_user	= "root"; // user
// root - 최상위
$db_pw		= "php504"; // password
$db_name 	= "employees"; // DB name
$db_charset = "utf8mb4"; // charset
$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset".$db_charset;

$db_options = [
	// DB의 Prepared Statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES		=> false
	// PDO EXception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
	// 연상배열로 Fetch를 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC
];

// PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// SQL 작성
// // 100004번 사원 정보를 출력해 주세요. ** 젤 앞과 젤 뒤는 공백 넣기, 세미콜론 빼기(보안상)
// $sql = " SELECT "
// 	."			 * "
// 	." FROM "
// 	." 		employees "
// 	." WHERE "
// 	." 		emp_no = :emp_no " // ** 유저한테서 받는 거는 Prepared Statement
// 	;

// Prepared Statement 셋팅
// $arr_ps = [
// 	":emp_no" => 10004	
// ];

// Prepared Statement 생성
// $stmt = $obj_conn -> prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt -> fetchALL(); // 쿼리 결과를 fetch

// print_r($result);

// SELECT 예제
// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해 주세요.

// $sql = " SELECT "
// 	." sal.salary, sal.emp_no, emp.birth_date "
// 	." FROM "
// 	." 		salaries AS sal "
// 	."		INNER JOIN employees AS emp "
// 	."		ON sal.emp_no = emp.emp_no "
// 	."		AND sal.to_date >= NOW() "
// 	." where "
// 	."		sal.emp_no = :emp_no1 or sal.emp_no = :emp_no2 ";

// AND 안에 OR 사용할 경우 괄호로 묶어줘서 사용해야 된다 **제대로 인식하지 못함
// $arr_ps = [
// 	 	":emp_no1" => 10001
// 		,":emp_no2" => 10002
// 	];

// Prepared Statement 생성
// $stmt = $obj_conn -> prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt -> fetchALL(); // 쿼리 결과를 fetch

// print_r($result);

// INSERT
// 부서번호가 'd010', 부서명이 'php504' 데이터 insert

// $sql = 
// 	" INSERT INTO departments ( "
// 	."		dept_no "
// 	."		,dept_name "
// 	." ) "
// 	." VALUES ( "
// 	."			:dept_no "
// 	."			,:dept_name "
// 	." ) ";

// $arr_ps = [
// 	":dept_no" => "d010"
// 	,":dept_name" => "php504"
// ];

// $stmt = $obj_conn -> prepare($sql);
// $result = $stmt -> execute($arr_ps);
// $obj_conn -> commit(); // commit 

// var_dump($result);

// $obj_conn = null; // 안에 있는 내용을 다 없애기 **DB 파기

// DELETE
// 부서번호가 'd010' 삭제

$sql = 
	" DELETE FROM departments "
	." WHERE dept_no = :dept_no ";
$arr_ps =[
	":dept_no" => "d010"
];

$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount(); // 삭제되거나 업데이트 됐거나 영향받은 행이 몇개 있는지 숫자로 알려줌
var_dump($res_cnt);
if($res_cnt >= 2) {
	$obj_conn->rollBack(); // rollback
	echo "rollback";
} else {
	$obj_conn->commit(); // commit 
	echo "commit";
}
// if( !$result ){
// 	$obj_conn -> rollback(); // rollback
// } else {
// $obj_conn -> commit(); // commit 
// }

// $obj_conn -> commit(); // commit 

$obj_conn = null; // DB 파기
