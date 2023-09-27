<?php
// while반복문을 이용해서 
//     *
//    **
//   ***
//  ****
// *****
// while( $조건 ) {
// 	    처리할 내용
// }

$base = 5;
$line = $base;
while ($line >= 1) {
    $space = $line - 1;
    $one_line = $base;
    while($one_line >= 1) {
        if($space >= 1) {
            echo " ";
        } else {
            echo "*";
        }
        $space--;
        $one_line--;
    }
    echo "\n";
    $line--;
}

?>