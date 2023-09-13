<?php

// include : 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지하지 않습니다.
// 없는 파일을 불러올 경우 다음 처리를 계속해서 진행한다.
// include("./03_070_include2.php");

// require : 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지합니다.
// 잘못됐다고 인식할 경우 이후의 처리는 진행이 안 된다.
// require("./03_070_include2.php");


// 이미 불러온 파일은 중복해서 불러오지 않는다.
// include_once("./03_070_include1.php");
// include_once("./03_070_include2.php");
require_once("./03_070_include1.php");
require_once("./03_070_include2.php");

echo "include 11111\n";

test();

?>