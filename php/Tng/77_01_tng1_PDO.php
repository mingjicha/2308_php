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
	// 책 p351 참고
$sql = 

// 2-2. 이름을 "호이"로 변경
	// UPDATE employees
	// SET last_name = '호이'
	// WHERE emp_no = 500002;

// 3. 자신의 정보를 출력해 주세요.

// 4. 자신의 정보를 삭제해 주세요.

// 5. PDO클래스 사용법 숙지하기 ✔✔✔