<?php
// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상 을 출력해 주세요.
$rank = 1;
$prize = "";

switch($prize){
    case 1:
        $prize = "금상";
    break;
    case 2:
        $prize = "은상";
    break;
    case 3:
        $prize = "동상";
    break;
    case 4:
        $prize = "장려상";
    break;
    default:
        $prize = "노력상";
    break;
}

echo $prize;
// 안에 echo로 다 하기보단 새로운 변수를 주고 echo는 마지막에 한 번만 찍는게 좋음. 

// IF를 이용하여 작성
$rank1 = 1;
$prize1 = "";

if( $rank1 === 1 ){
    $prize1 = "금상";
}
else if( $rank1 === 2 ){
    $prize1 = "은상";
}
else if( $rank1 === 3 ){
    $prize1 = "동상";
}
else if( $rank1 === 4 ){
    $prize1 = "장려상";
}
else{
    $prize1 = "노력상";
}
echo $prize1;
?>