<?php

// 1. db_conn 이라는 함수를 만들어 주세요.
// 		1-1. 기능 : db 설정 및 pdo 객체 생성
function db_conn( &$conn ) {
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
//		1-2. function 불러오기
$conn=null; // 기초값이라 생각
db_conn( $conn ); // db_conn 불러오기

// 2. 사원별 현재 급여가 80,000 이상인 사원을 조회하기
//	 	2-1.쿼리 작성
// 			SELECT emp_no, salary
//			FROM   salaries
//			WHERE  to_date >= NOW()
// 			  and  salary >= 80000;

//		2-2. sql
$sql = " SELECT "
	."			emp_no "
	." 			,salary "
	."	   FROM "
	." 			 salaries "
	."     WHERE "
	." 			to_date >= now() "
	." 		AND "
	." 			salary >= :salary ";

//		2-3. arr
$arr_ps = [
		":salary"=>80000
];

//		2-4. Prepared Statement 생성
$stmt = $conn->prepare($sql); // 쿼리 실행 준비하기
$stmt->execute($arr_ps);  // execute 메소드를 이용해서 실행하기
$result = $stmt->fetchALL(); 

// 		2-3. 결과 확인
var_dump($result);

// 3. 조회한 데이터를 루프하면서 급여가 100,000 이상인 사원 번호를 출력해 주세요.
$cnt=0;
foreach($result as $key => $value) {
    if($value["salary"] >= 100000) {
		echo $value["emp_no"],"\n";
		$cnt++; // count될 떄마다 1씩 증가
    }
}
echo $cnt;

// 결과가 정확한지 알아보기
// SELECT count(salary)
// FROM   salaries
// WHERE  to_date >= NOW()
// and  salary >= 80000;
