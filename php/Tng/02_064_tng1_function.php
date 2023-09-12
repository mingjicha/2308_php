<?php
// 몇 개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
function add(...$num){
    $total = 0;
    foreach($num as $val) {
        // $total = $total + $val;
        $total += $val;
    }
    return $total; // $total은 function 안에서만 사용 가능함 밖에서 $total이면 동명이인일뿐 값은 다름.
}
echo add(2, 3, 5, 7);

// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// ex) "3421"일 경우, 3+4+2+1 해서 10이 리턴 되는 함수
function my_sum($str){
    $j = 0;
    $arr = str_split($str);
    foreach($arr as $key){
        $j += $key;
    }
    return $j;
}
echo my_sum("3421");
?>