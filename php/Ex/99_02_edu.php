<?php

// // 함수 선언 : 함수를 만들어두는 것
// function my_sum($num1, $num2) {
// 	$sum = $num1 + $num2;
// 	return $sum; 
// return문이 함수안에서 호출된다면, 현재 함수의 수행을 즉시 끝내고
// 함수 호출 결과값으로 return의 인수값을 넘겨준다.
// return은 함수가 아닌 언어 구조이기 때문에, 인수를 괄호로 쌀 필요가 없습니다.
// }

// // 함수 호출 : 미리 만들어둔 함수를 부르는 것
// $result = my_sum(2, 5);

// echo $result;


// function my_sum($num1, $num2) {
// 	$sum = $num1 + $num2;
// 	echo $sum;
// 	return true;
// }

// $num1 = 2;
// $num2 = 5;

// $result = my_sum($num1, $num2);
// if(!$result) {
// 	echo "ERROR";
// }
// return값이 true니까 정상 작동이 되고 false로 들어가게 된다면 if조건에 따라 ERROR라고 뜨게 된다

// -----------
// 3개의 숫자를 빼기하는 함수를 만들어 주세요.
// function my_sub($a, $b, $c) {
// 	return $a - $b - $c;
// }

// echo my_sub(5, 4, 6);
// php주의! 변수에 숫자가 들어있는 걸 조건문으로 쓸 경우 조심해서 써야함, 변수에 값만 있어도 true라고 나올 경우가 있음


// 가변 파라미터 : ...하고 변수 선언
function my_all_sum(...$numbers) { // ...하고 변수를 파라미터로 적어주면 몇개 오든지 다 배열로 만들어 줌
	// print_r($numbers); 를 호출하면 my_all_sum(2, 4, 5); 배열로
	$sum = 0;
	foreach($numbers as $key => $val) {
		$sum = $sum + $val;  // 왜 이렇게 되는지 foreach문 잘 생각해보기
	}
	return $sum;
	// return array_sum($numbers);
}
// echo my_all_sum(2, 4, 5);

// 결과가 나오고 뭔가의 값이 나온다 그럼 변수를 쓸 생각하자 ...😥


// 레퍼런스 파라미터 (Pass by referance)
function my_ref ( $val, &$ref ) { // $val, &$ref 파라미터 매개변수, 인수
	$val = "my_ref";
	$ref = "my_ref";
}
// 지역변수로 함수를 만들어서 val와 ref를 만들어 줌

$str1 = "str1";
$str2 = "str2";
// 전역변수로 str1과 str2를 만들어 줌

my_ref($str1, $str2); // $str1, $str2 아규먼트 인자
// my_ref로 변수를 불러 줌

echo "str1 : {$str1}\n";
// 전역변수 출력

echo "str2 : {$str2}\n";
// 주소를 참조할 수 있게 만든 파라미터 &를 사용 했을 경우 함수내에 있는 값을 불러 옴


// print_r과 var_dump의 차이점
// print_r(true); // 트루인 값만 나오고
// echo "\n";
// var_dump(true); // 어디서 실행되고 타입과 값 다 보여줌
// 개발할 때만 사용하는 거지 실제로 소스코드에는 절대 들어가면 안 되는 출력 문구