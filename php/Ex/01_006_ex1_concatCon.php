<?php
$str1 = "안녕";
$str2 = "하세요.";
$str3 = $str1.$str2;

echo $str3, "\n";

$str4 = "문자";
$num1 = 1;
$str5 = $str4.$num1;

echo $str5, "\n";

// 상수 : 절대 변하지 않는 값
// 이름은 무조건 대문자로 작성
define("NUM", 100);
echo NUM;

// NUM = 1;
// 상수를 선언하고 값을 대입하면 error 뜸
define("STR", "스트링"." "."타입");
echo "\n", STR;

echo "\n", 9223372036854775807;
// 64bit 900경
echo "\n", 9223372036854775807 + 1;



?>