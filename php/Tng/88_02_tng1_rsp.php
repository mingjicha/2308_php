<?php
// ***변수를 선언할 때 쓰지말아야 할 주의점
// ex) 특수문자, 앞 대문자 쓰면 안 된다 
// - 자바꺼니까 php도 어떤 주의점이 있는지 확인하기

/*
	[주제]
		사용자와 컴퓨터 간의 가위바위보 게임
	[조건]
		1. 사용자는 0, 1, 2 값을 입력 받을 수 있다.
		2. 컴퓨터는 0, 1, 2 값을 랜덤으로 받아야 한다.	
        3. if문을 사용해야 한다.
*/

echo "가위는 0, 바위는 1, 보는 2를 입력해 주세요.";

// 1. 사용자 가위, 바위, 보 입력 받기
$in_str = (int)fgets(STDIN);  // 입력 값 받기(fgets(STDIN))

// 2. 컴퓨터 가위, 바위, 보 지정하기 (2가지 경우)
/*
	2-1. array_rand() 함수 사용 
	[형식] array_rand(배열);
*/
$rsp_com = [0, 1, 2];	 // $resp_com 변수에 배열 초기화
$random = array_rand($rsp_com);	// $random 변수에 $rsp_com 변수에 담긴 배열의 index 값을 랜덤으로 추출(0혹은 1혹은 2)
// ** array_rand 배열(내가 배열로 지정을 해줬으니까)을 랜덤하게 한다.

/*
	2-2. rand() 함수 사용
	[형식] rand(최소값, 최대값);
*/
// $rsp_com2 = rand(0,2);	// $rsp_com2 변수에 랜덤으로 0~2 사이의 값을 추출

$rsp = ["가위", "바위", "보"]; // 랜덤인 index값을 뽑아낸다

// 3. 사용자와 컴퓨터 간의 가위, 바위, 보 비교하기
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

// 4. 가위, 바위, 보 결과 출력

echo "\n사용자 : {$rsp[$in_str]}\n";
// 대괄호 안에 배열값은 숫자만 가능하다
// echo "컴퓨터 : ".$rsp_com[$random]."\n";
// 처음에 .으로 붙인거는 문자열 + 변수명 + 문자열

echo "컴퓨터 : {$rsp[$random]}\n";
// 배열을 담을 때는 대괄호 사용 []
// 중괄호 안에 변수값을 넣으니까 한 번에 ""안에 글쓰기

// php 88_02_tng1_rsp.php

?>