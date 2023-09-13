<?php

// 폴더(디렉토리) 만들기
// 777 : 소유자, 그룹, 사용자 권한에게 모든 권한을 허용한다.
// if (mkdir("../testdir", 777)) {
//     echo "정상";
// }   else {

//     echo "실패";
// }

// rmdir("../testdir");

// 파일
// 파일 열기
// 파일 여는 옵션 a : 파일을 쓰기 전용으로 열기(기존 파일이 있을 경우, 내용 뒤에 덧붙임)
$file = fopen("zz.txt", "r");
// if(!$file) {
//       echo "파일 안 열림";
// }

// 파일이 제대로 열리는 지 확인
if($file) {
    echo "참";
}   else {
    echo "거짓";
}

// 파일 쓰기
// $f_write = fwrite($file, "짜장면\n");

// 파일 읽기
// 길이를 지정해서 가져옴
// $line = fread($file, 9);
// echo $line;

// 한 줄 씩 가져옴 ** 보통은 한 줄씩 가져옴 ex) 한 명의 회원 정보
// $line = fgets($file);
// echo $line;

// 다 가져오기
while( $line = fgets($file) ){
    echo $line;
}

// 파일 닫기
// fclose($file);
if( !fclose($file) ) {
    echo "파일 안 닫김";
}

// 파일 삭제
// unlink("zz.txt");


