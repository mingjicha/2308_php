<?php
// // 두 숫자를 받아서 더해주는 함수
// // 리턴이 없는 함수
// function my_sum($a, $b){
//     echo $a + $b;
// }
// my_sum(5, 4);

// // 리턴이 있는 함수
// function my_sum2($a, $b){
//     return $a + $b;
// }
// echo my_sum2(1, 2);

// $result = my_sum2(2, 2);
// echo $result;

// // 두 수를 받아서 - * / %를 리턴하는 함수를 만들어 주세요.
// function my_sub($a, $b){
//     return $a - $b;
// }
// $my_sub_test = my_sub(5, 4);
// echo $my_sub_test;

// function my_mul($a, $b){
//     return $a * $b;
// }
// $my_mul_test = my_mul(2, 3);
// echo $my_mul_test;

// function my_div($a, $b){
//     return $a / $b;
// }
// $my_div_test = my_div(15, 5);
// echo $my_div_test;

// function my_rem($a, $b){
//     return $a % $b;
// }
// $my_rem_test = my_rem(7, 3);
// echo $my_rem_test;

// // 파라미터의 기본값이 설정되어 있는 함수
// // ** 선택 사항을 받을 값은 항상 뒤쪽으로 주기 
// // 만약 디폴트 값을 아래처럼 $b에 말고 $a주면 에러남
// function my_sum3($a, $b = 5){
//     return $a + $b;
// }
// echo my_sum3(3);

// // 가변 파라미터
// // php-5.6 이상 가능
// function my_args_param(...$items){
//     print_r($items);
// }

// // php-5.5 이하 가능
// // function my_args_param(){
// //     $items = func_get_args();
// //     print_r($items);
// // }
// my_args_param("a", "b", "c");

// // 재귀함수
// // for 사용
// // function my_ap($i){
// //     $sum = 0;
// //     for($i; $i > 0; $i--) {
// //         $sum += $i;
// //     }
// //     return $sum;
// // }
// // echo my_ap(200);

// // while 사용
// // $i = 200;
// // $j = 0;
// // while($i >= 1){
// //     $j += $i;
// //     $i--;
// // } 
// // echo $j;

// // 재귀함수 사용
// function my_recursion($i){
//     if($i === 1){
//         return 1;
//     }
//     return $i + my_recursion($i - 1);
// }
// echo my_recursion(200);

// 레퍼런스 파라미터

// function test1( $str ) { // 함수 내에 str
//     $str = "함수 test1";
//     return $str; // return 해줬으니 담아줘야 한다
// }
// function test2( &$str ) {
//     $str = "함수 test2";
// }

// $str = "???"; // 함수 밖에 str
// $result = test1( $str );
// test1( $str );
// echo $str, "\n"; // echo 메인 영역에 있으니 "???"를 호출한다
// echo $result; // 담아주고 "함수 test1"를 호출한다

function test2( &$str ) { // &가 붙어있을 경우 주소값이 담긴다
     $str = "함수 test2";
     return $str;
}
$str = "???";
$result = test2( $str ); // 주소값이 있는 영역으로 가서 데이터를 바꾼다 *** "???" 에서 "함수 test2"로 바뀜.
echo $str, "\n"; 
echo $result; 

?>