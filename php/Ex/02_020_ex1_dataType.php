<?php
// int : 숫자
$num = 1;

// string : 문자열
$str = "ssss";

// array : 배열
$arr = [1, 2, 3];

// double : 실수
$double = 2.343;

// boolean : 논리(참/거짓)
$bool = false;

// NULL
$obj = null;

// gettype() : 변수의 타입을 리턴
echo gettype($str); 

$num1 = 1;
$str1 = "1";

// 형변환 : 변수 앞에 (데이터타입)$num
echo $num1 + $str1;
// php의 특징, 자동으로 형변환을 해줌 편해보여도 실수하기 쉬움 

echo $num1 + (int)$str1;
// 앞에 int로 형변환 주면 자동으로 형변환 안함 

?>