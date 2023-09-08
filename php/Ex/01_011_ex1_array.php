<?php
// 1. 인덱스 배열
// 선언하는 방법
$arr1 = [1, 2, 3];

// 인덱스 (멀티 타입 배열)
$arr = array(0, "a", 2, 6, 10);
// a 는 문자로 인식하기 때문에 > PHP에서만 문자로 바꿔 줌 다른 건 에러뜸
$arr2 = [0, 1, 2];
// var_dump($arr);
// echo $arr[1];
// echo $arr[2];

// 2. 연상 배열 
$arr4 = [
    "name" => "홍길동"
    ,"age" => "18"
    ,"gender" => "남자"
];

echo $arr4["name"];

// 사용에 따라 둘 다 많이 씀

// 3. 다차원 배열 ** 앞에 배운 거는 1차원, $arr5는 2차원(x축과 y축) 3차원도 가능하고 
//                    보통 현업에서는 다차원 배열은 연상 배열을 이용해서 만든다
$arr5 = [ 
    [11, 12, 13]
    ,[21, 22, 23]
    ,[31, 32, 33]
];

var_dump($arr5);

var_dump($arr5[2] [1]);

// 보통 현업에서는 다차원 배열은 연상 배열을 이용해서 만든다
$arr6 = [
    "msg" => "OK"
    , "info" => [
        "name" => "홍길동"
        ,"age" => 20
    ]
];

var_dump($arr6["info"]["name"]); 
// ** 이름은 문자라서 앞에 string이 뜸 

echo $arr6["info"] ["name"];

// unset() : 배열의 원소 삭제
$arr_week = ["sun", "Mon", "delete", "Tue", "Wed"];
unset($arr_week[2]);
print_r($arr_week); // ** 변수 정보 추출하는 print_r 함수

// 배열의 정렬 : asort(), arsort(), ksort(), krsort()
// asort() : 배열의 값을 오름차순 정렬
$arr_asort = array("b", "a", "d", "c");
asort($arr_asort);
print_r($arr_asort);

// arsort() : 배열의 값을 내림차순 정렬
arsort($arr_asort);
print_r($arr_asort);

// ksort() : 배열의 키를 오름차순 정렬
$arr_ksort = [ 
    "b" => "1"
    ,"d" => "2"
    ,"a" => [3, 4]
    ,"c" => "4"
];
ksort($arr_ksort);
print_r($arr_ksort);

// krsort() : 배열의 키를 내림차순 정렬
krsort($arr_ksort);
print_r($arr_ksort);

// count() : 배열 혹은 그 외 것들의 사이즈를 반환하는 함수
echo count($arr_ksort), "\n";
echo count($arr_ksort["a"]), "\n";

// array_diff() : A배열과 B배열을 비교해서 중복되지 않는 A배열의 원소를 반환
$arr_diff1 = [ 1, 2, 3 ]; // A배열
$arr_diff2 = [ 1, 4, 5 ]; // B배열
$arr_diff = array_diff($arr_diff1, $arr_diff2);

print_r($arr_diff); // 중복되지 않는 A배열의 원소를 반환

// array_push() : 기존 배열에 값을 추가하는 함수
// 인덱스 배열
$arr_push = [ 1, 2, 3 ];
// 여러값을 추가할 때 
// array_push($arr_push, 4, 5);

// 하나의 값을 추가할 때
$arr_push[] = 4;
$arr_push[] = 5;

print_r($arr_push);

// 연상 배열
$arr_push2 = [
    "a" => 1
    ,"b" => 2
];
$arr_push2["c"] = 3;

print_r($arr_push2);



?>