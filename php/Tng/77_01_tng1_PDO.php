<?php

// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.

//	-----------------------------------------------
// 함수명	: my_db_conn
// 기능 	: DB Connect
// 파라미터 : PDO &$conn
// 리턴 	: 없음
//	-----------------------------------------------
require_once("../ex/04_107_ex2_fnc_db_connet.php");
// tng폴더로 넘어온 거니까 폴더 위치 확인하기

$conn = null;
// 초기화 하는 이유 : 레퍼런스 파라미터는 무조건 변수를 정해줘야 한다 
//					최종적으로 담기는 값은 PDO객체가 담긴다 
//					이 객체의 초기값인 null로 줘야한다. 
//					문자면 " ", 숫자면 0, 배열이면 [ ] 식으로 넣는다.
my_db_conn($conn);

// 1. 자신의 사원 정보를 employees테이블에 등록해 주세요.
// 1-1. DB 작성
	// INSERT INTO employees (
	// 	emp_no
	// 	,birth_date
	// 	,first_name
	// 	,last_name
	// 	,gender
	// 	,hire_date
	// )
		
	// VALUES (
	// 	500002
	// 	,19960910
	// 	,'minji'
	// 	,'Cha'
	// 	,'F'
	// 	,20230918
	// );

// 1-2. SQL 작성
$sql = " INSERT INTO employees ( "
		."				emp_no "
		."				,birth_date "
		."				,first_name "
		."				,last_name "
		."				,gender "
		."				,hire_date "
		." ) "
		."		VALUES ( "
		." 				:emp_no "
		."				,:birth_date "
		."				,:first_name "
		."				,:last_name "
		."				,:gender "
		."				,:hire_date "
		." ) ";
$arr_ps = [
		":emp_no" => 500002
		,":birth_date" => 19960910
		,":first_name" => "minji"
		,":last_name" => "Cha"
		,":gender" => "F"
		,":hire_date" => 20230918
];

// 1-3. Prepared Statement 생성
$stmt = $conn -> prepare($sql);
$result = $stmt -> execute($arr_ps);
$conn -> commit(); // 커밋

// 1-4. 결과 확인
var_dump($result);

// 1-5. DB에서 확인하기 
// 		FLUSH PRIVILEGES; 사용 후 새로고침 

// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해 주세요.
// 2-1. 이름을 "둘리"로 변경
// UPDATE employees
// SET first_name = '둘리'
// WHERE emp_no = 500002;

// 2-2. 성을 "호이"로 변경
// UPDATE employees
// SET last_name = '호이'
// WHERE emp_no = 500002;

$sql = " UPDATE "
." employees "
." SET "
." first_name = :first_name "
." ,last_name = :last_name "
." WHERE emp_no = 500002 ";
$arr_ps = [
	":first_name" => "둘리"
	,":last_name" => "호이"
];

// 2-3. Prepared Statement 생성
$stmt = $conn -> prepare($sql);
$result = $stmt -> execute($arr_ps);
$conn -> commit(); // 커밋

// 2-4. 결과 확인
var_dump($result);

// 3. 자신의 정보를 출력해 주세요.
// 3-1. 출력하기
$sql = " SELECT "
	."			 * "
	." FROM "
	." 		employees "
	." WHERE "
	." 		emp_no = :emp_no ";

// 3-2. Prepared Statement 세팅
$arr_ps = [
	":emp_no" => 500002
];

// 3-2. Prepared Statement 생성
$stmt = $conn -> prepare($sql);
$stmt -> execute($arr_ps); // 쿼리 실행 ** -> 띄우기 안 함
$result = $stmt -> fetchALL(); // 쿼리 결과를 fetch ** 연상 배열로 만들어 줌(SELECT)

// 3-3. 결과 확인
print_r($result);

// 4. 자신의 정보를 삭제해 주세요.
$sql = " DELETE "
." 		FROM "
." 			employees "
." 		WHERE "
." 			emp_no = :emp_no ";
$arr_ps = [
	":emp_no" => 500002
];
$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount();
var_dump($res_cnt);
if($res_cnt >= 2) {
	$obj_conn->rollBack(); // rollback
	echo "rollback";
} else {
	$obj_conn->commit(); // commit 
	echo "commit";
}
$conn = null; // 계속 사용되면 안되니까 null로 설정 null의 목적이 다 다름

// 5. PDO클래스 사용법 숙지하기 ✔✔✔