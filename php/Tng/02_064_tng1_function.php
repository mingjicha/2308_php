<?php
// 몇 개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
// 

// 반복문을 이용해서 아래처럼 출력해 주세요.
// *
// **
// ***
// ****
// *****

// for문 사용
// for($i = 0; $i <= 5; $i++){
//     for($j = 0; $j <= $i; $j++){
//     echo "*";
//      }
//     echo "\n";
// }

// while문 사용
// $cnt = 5;
// $int_line = 1;
// $int_star = 1;
// while($int_line <= $cnt) {
//     while($int_star <= $int_line) {
//         echo "*";
//         $int_star++;
//     }
//     echo "\n";
//     $int_line++;
//     $int_star = 1;
// }

//     *
//    **
//   ***
//  ****
// *****
$cnt = 5;
for($int_line = $cnt; $int_line >= 1; $int_line--) {
    for($int_star = 1; $int_star <= $cnt; $int_star++)
        if($int_star >= $int_line) {
            echo "*";}
        else{
            echo " ";
        }
    echo "\n";
}

?>