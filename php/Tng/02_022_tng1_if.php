<?php
// IF로 만들어주세요.
// 성적
//   범위 :
//         이상 ~ 미만
//         100 : A+
//         90~100 : A
//         80~90 : B
//         70~80 : C
//         60~70 : D
//         60미만 : F

// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 0~100 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력해 주세요.

// 방법1
$num = 12;
$grade = "";
// 언제든지 값을 바꿔가면서 쓰기 위해 $grade를 선언해준다.

if( $num === 100 ){
    $grade = "A+";
    // echo "<A+>";
}
else if( $num >= 90 && $num < 100 ){
    $grade = "A+";
    // echo "<A>";
}
else if( $num >= 80 && $num < 90 ){
    $grade = "B";
    // echo "<B>";
}
else if( $num >= 70 && $num < 80 ){
    $grade = "C";
    // echo "<C>";
}
else if( $num >= 60 && $num < 70 ){
    $grade = "D";
    // echo "<D>";
}
else { 
    $grade = "F";
    // echo "<F>"; 
}

if( $num <= 100 && $num >= 0 ){
        echo "당신의 점수는 {$num}점 입니다. <{$grade}>";
    }
    else {
        echo "잘못된 값을 입력 했습니다.";
    }

// 결과는 나오지만 좀 더 효율적으로 하려면 아래 방법을 사용하면 된다.
// ** 잘못 입력 했을 때는 grade값이 필요 없어서 속도가 느려질 수 있다(?)

// 방법2
// if($num < 0 && $num > 100) {
// 	echo "잘못된 값을 입력 했습니다.";
// }
// else {
// 	if ($num >= 100) {
// 		$grade = "A+";
// 	}
// 	else if($num >= 90) {
// 		$grade = "A";
// 	}
// 	else if($num >= 80)  {
// 		$grade = "B";
// 	}
// 	else if($num >=70) {
// 		$grade = "C";
// 	}
// 	else if($num >=60) {
// 		$grade = "D";
// 	}
// 	else {
// 		$grade = "F";
// 	}

// 	$str = sprintf($answer, $num, $grade);
// 	echo $str;
// }

?>