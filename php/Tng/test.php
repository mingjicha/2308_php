<?php
// 19단 찍어주세요 while문 사용
// [문법]
// while (조건이 만족할 때) {
//     실행 코드;
// }
$file=fopen("file_test.txt","a");
$i=1;
    
    while ($i<=19) {
        // echo "19 X {$i} = {$j}\n";
        fputs($file,"{$i}단\n");
        $l=1;
        while ($l<=19) {
            $a=$i*$l;
            fputs($file,"{$i}x{$l}={$a}\n");
            $l++;
        }
        $i++;
    }
fclose($file);

// txt 파일로 만들기
// fopen("파일이름", "파일 입출력 속성") //파일을 열음 또는 생성
// fwirte("파일이름", "입력할문자열") //파일에 내용 입력
// fclose("파일이름") //열었던 파일을 종료
// $file = fopen("file_test.txt", "w");
// fwrite($file, "구구단 떠야해");
// fclose($file);

?>