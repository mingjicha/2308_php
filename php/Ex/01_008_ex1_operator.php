<?php
// 1. 산술 연산자
echo "더하기 : 1 + 1 = ", 1 + 1, "\n";
echo "빼기 : 1 - 1 = ", 1 - 1, "\n";
echo "곱하기 : 2 * 3 = ", 2 * 3, "\n";
echo "나누기 : 2 / 3 = ", 2 / 3, "\n";
echo 10 - 5 * 8 / 10, "\n"; 
echo "나머지 : 2 % 3 = ", 2 % 3, "\n";

// 2. 증가/감소(증감) 연산자
$num1 = 8;
$num1++;
echo $num1, "\n";
$num1--;
echo $num1, "\n";

// 3. 산술 대입 연산자
$num = 5;
$num = $num + 2;
$num += 2;
$num -= 2;
$num *= 2;
$num /= 2;
$num %= 6;

echo $num, "\n";

// 4. 비교 연산자
// var_dump( 1 > 1 );
// bool(false)

// var_dump( 1 > 0 );
// bool(true)

// var_dump( 1 >= 0 );
// var_dump( 1 <= 0 );

$num = 1; // int
$str = '1'; // string
var_dump($num == $str); // 값의 형태만 비교(불완전 비교) 
// bool(true) ** 생긴게 비슷하면 true 
var_dump($num === $str); // 값의 데이터 타입까지 비교(완전 비교)
// bool(false) ** === 사용 하는 걸로 습관 들이기
var_dump($num != $str); // 불완전 비교
// bool(false)
var_dump($num !== $str); // 완전 비교
// bool(true)

// 5. 논리 연산자 책 P84
// and 연산자
var_dump( 1 === 1 && 2 === 2 );
var_dump( 1 === 1 && 2 === 1 );

// or 연산자
var_dump( 1 === 1 || 2 === 2 );
var_dump( 1 === 1 || 2 === 1 );
var_dump( 1 === 2 || 2 === 1 );

// not 연산자
var_dump( !( 1 === 1 ) );


?>