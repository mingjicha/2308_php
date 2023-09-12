<?php
// foreach : 배열의 길이만큼 루프하는 문법

// 배열
$arr = [1, 2, 3];
$arr = array(1, 2, 3);


// 배열의 길이
echo count($arr);

// 1, 2, 3이면 배열의 길이는 3이지만 배열은 0부터 시작하기 때문에 0번방 - 1, 1번방 - 2, 2번방 - 3 이렇게 된다.
// for문에 조건을 넣기 위해서는 배열의 길이에서 -1을 해주면 된다.
for($i = 0; $i <= count($arr) - 1; $i++) {
    echo $arr[$i];
}

foreach($arr as $key => $val){
    echo "\n{$key} : {$val}";
}

// $arr2 = [
//     "현희" => "불고기"
//     , "호철" => "김치"
//     , "휘야" => "못정함"
// ];

// foreach($arr2 as $key => $val) {
//     echo "{$key} : {$val}\n";
// }

// 키가 필요 없을 때 생략 가능
// foreach($arr2 as $val) {
//     echo "{$val}\n";
// }






?>