<?php
//  $in_str = fgets(STDIN);
// $cnt = fgets(STDIN);

//  echo "입력값 : {$in_str}";

echo "(0 : 가위, 1 : 바위, 2 : 보)";
$in_str = fgets(STDIN);
$rsp_com = [0, 1, 2];
$random = array_rand($rsp_com);

if( $in_str == 0 ){
    if ( $random == 0 ){
        echo "무승부";
    }
    else if ( $random == 2 ){
        echo "승리";
    }
    else if( $random == 1 ){
            echo "패배";
        }  
}
else if( $in_str == 1 ){
    if ( $random == 1 ){
        echo "무승부";
    }
    else if ( $random == 0 ){
        echo "승리";
    }
    else if( $random == 2 ){
            echo "패배";
    }
}
else if( $in_str == 2 ){
    if ( $random == 2 ){
        echo "무승부";
    }
    else if ( $random == 1 ){
        echo "승리";
    }
    else if( $random == 0 ){
        echo "패배";
    }
    
}

echo "\n사용자 : {$in_str}";
echo "컴퓨터 : ".$rsp_com[$random]."\n";

// $num = 5;
// if( $num === 1 ){
//     echo "1등";
// }
// else if( $num === 2 ){
//     echo "2등";
// }
// else if( $num === 3 ){
//     echo "3등";
// }
// else {
//     if($num === 5){
//         echo "특별상";
//     }
//     else {echo "순위 외";
// }}

// php 88_02_tng1_rsp.php

?>