<?php
// trim() : 문자열의 공백을 없애주는 함수
echo " sdsd ", trim(" sdsd ");

// strtoupper // strtolower : 문자열을 대/소문자로 변환하는 함수
echo strtoupper("asdasd"), strtolower("ASDASFD");

// strlen() : 문자열의 길이를 반환 
// ** 바이트 단위라서 한글은 9로 나옴 정확하게 알고 싶으면 mb_strlen() 사용하기
echo strlen("asdasd"), mb_strlen("가나다");

// str_replace() : 특정 문자를 치환해주는 함수
echo str_replace("a", "/", "erwgjkkavkjd");

// substr() : 문자열을 자르는 함수
echo substr("abcdefg", 0, 3), mb_substr("가나다라마바사", 1, 4);

// strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
echo strpos("abcdefg", "d");
// ** 특정 문자 기준으로 잘라야 할 때
$str = "abcdefg";
echo substr($str, strpos($str, "d"));

// isset() : 변수의 존재를 확인하는 함수
$str1 = null; 
var_dump(isset($str1));

// empty() : 변수의 값이 비어있는지 확인하는 함수
// ** 값은 비어있지만 메모리에 등록은 되어 있는 것
// 0도 empty
var_dump(empty($str1));

// 차이점 settype $num 자체가 데이터형을 변경해주고
//  (string)$num; 는 이때만 데이터형을 변경해준다.
$num = 1;
settype($num, "string");
(string)$num; 
echo gettype($num);

// time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수
echo time();

// date() : 원하는 형식으로 시간 표시해주는 함수
echo date("Y-m-d H:i:s", time());

?>