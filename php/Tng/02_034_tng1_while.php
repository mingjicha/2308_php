<?php
// 구구단 2단
// $i = 1;
// while($i <= 9) {
//     $gu = $i*2;
//     echo "2 X {$i} = {$gu}\n";
//     $i++;
// }

// 구구단 1단 ~ 9단
$i = 1;
while($i <= 9) {
    $j = 1;
    echo "[{$i}단]\n";
    while($j <= 9) {
        $gu = $i*$j;
        echo "{$i} X {$j} = {$gu}\n";
        $j++;
    }
    $i++;
}



?>




