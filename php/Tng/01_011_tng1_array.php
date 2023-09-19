<?php
// 음식 종류 5개 이상을 배열로 만들어주세요
$food1 = ["파스타", "리조또", "필라프", "스테이크", "샐러드"];
var_dump($food1); 

// 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요. (배열 길이는 4)
$food2 = [ 
    "pasta" => "면"
    ,"risotto" => "밥"
    ,"pilaf" => "볶은 밥"
    ,"steak" => "소고기"
];
var_dump($food2); 

var_dump($food2["pasta"]);

echo count($food2);



// foreach *** using php i only want the specific data from array
// 현업에서 가장 많이 사용하므로 사용법 익히기

$arr = [
    [
        "emp_no" => 10001
        ,"gender" => "F"
    ] // key [0]
    ,[
        "emp_no" => 10002
        ,"gender" => "M"
    ] // key [1]
];
// 남자인 경우에만 사원번호를 출력해 주세요.
// 1-1. foreach로 배열 만들어주기 
foreach ($arr as $key => $item) { // ($arr as $item) 도 가능
// 1-2. 남자인 경우에만 => if 사용하기
    if($item["gender"] === "M") {
// 1-3. 사원번호 출력
        echo $item["emp_no"];
    }
};



?>