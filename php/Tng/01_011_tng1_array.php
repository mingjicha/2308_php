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


?>