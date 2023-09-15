<?php
/*  
    [주제]
        숫자 맞추기 게임
    [조건]
        1. 1 ~ 100의 랜덤한 숫자를 맞추는 게임입니다.
        2. 총 5번의 기회를 제공합니다.
        3. 입력한 숫자가 정답보다 클 경우 "더 큼" 출력
        4. 입력한 숫자가 정답보다 작을 경우 "더 작음" 출력
        5. 5번의 기회를 다 썼을 경우 정답과 "실패"를 출력
        6. 정답일 경우 "정답" 출력 후 게임 종료 
*/
echo "🎈1 ~ 100의 랜덤한 숫자를 맞추는 게임입니다.🎈 \n\n --------총 5번의 기회가 제공됩니다.--------";

$num_com = rand(1, 100); // 컴퓨터의 랜덤한 데이터값 받기
for($i = 1; $i <= 5; $i++){ // 사용자에게 5번의 기회를 제공
    echo "\n\n💙1 ~ 100사이의 값 중 하나를 입력하시오.\n👉";
    $input = fgets(STDIN); // 사용자의 데이터 입력 받기
    if(is_numeric($input)){ //숫자인지 아닌지를 확인하여 결과를 반환하는 함수로 is_numeric()을 사용
        if($input > $num_com){
            echo "{$input} 값보다 작습니다.😋";
        }
        else if($input < $num_com){
            echo "{$input} 값보다 큽니다.🙄";
        }
        else if($input = $num_com){
            echo "⭕정답은 {$num_com}, {$i}번만에 성공하였습니다.⭕ \n 게임을 종료합니다.😂";
            break;}
        if($i == 5){ 
            echo "\n❌정답은 {$num_com}, 모든 기회를 사용하셨습니다❌. 새로운 게임을 시작해 주세요.🤗";} // 5번의 기회를 다 썼을 경우 "실패"
        }
    else{
        echo "다시 입력해 주세요.🤢";}
}


// for( $num1 = 1; $num1 <= 9; $num1++ ){
//         echo "\n[{$num1}단]";  
//     for( $num2 = 1; $num2 <= 9; $num2++ ){
//         $mul2 = $num1 * $num2;
//       echo "\n{$num1} X {$num2} = {$mul2}";
//     };
// }



// php 88_03_tng1_num.php