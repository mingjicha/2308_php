<?php
// ----- 문제 -----
// INSERT INTO employees
// VALUES (
// 	70000
// 	,20000101
// 	,'first'
// 	,'last'
// 	,'M'
// 	,20230919
// 	,NULL
// );
// COMMIT;

// 0. PDO 

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

// 1. titles 테이블에 데이터가 없는 사원을 검색
// // 		1-1. 쿼리 
// 		// SELECT *
// 		// FROM employees emp
// 		// WHERE emp.emp_no NOT IN (SELECT tit.emp_no FROM titles tit);

// //		1-2. sql 
$sql = 
		" SELECT "
		."		* "
		." FROM "
		."	    employees emp "
		." WHERE "
		."      emp.emp_no "
		." NOT in ( "
		." 		SELECT "
		." 			tit.emp_no "
		." 		FROM "
		." 			titles tit "
		." ) ";
$arr_ps = [

];

//		1-3. ps 생성 -> 없으면 공백 
$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt -> fetchALL();

// 		1-4. 결과 확인
print_r($result);

$conn = null;

// 2. 1번에 해당하는 사원의 직책 정보를 INSERT
// 		2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
// 		2-2. 쿼리
// INSERT INTO titles (
// 				emp_no
// 				,title
// 				,from_date
// 				,to_date
// 				)
// VALUE (
// 		700000
// 		,"green"
// 		,20230919
// 		,99990101
// 		);

		// 2-3. sql

$sql = 
	" INSERT INTO titles "
	." VALUE ( "
	."		  :emp_no "
	."		  ,:title "
	."		  ,now() "
	."		  ,:to_date "
	." ) ";

// - 데이터가 없는 사원이 한 명일 경우 
// $arr_ps = [
// 	":emp_no"=>700000
// 	,":title"=>"green"
// 	,":to_date"=>99990101	
// ];

// - 데이터가 없는 사원이 여러명일 경우 foreach 사용
$a = 0;
foreach($result as $item){
	$a = $item["emp_no"];

	$arr_ps = [
		":emp_no"=>$a
		,":title"=>"green"
		,":to_date"=>99990101	
	];

	$stmt = $conn -> prepare($sql);
	$result2 = $stmt -> execute($arr_ps);

	var_dump($result2);

	$conn -> commit();
}
print_r($a);

//		2-5 결과 출력
// ***DB에서 FLUSH PRIVILEGES; 로 데이터 값 저장 시켜야 함. 

// 3. DB에 저장 될 것


