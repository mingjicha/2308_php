<?php
// cookie : 데이터를 브라우저에 저장
// *** 주의점 ***
// 보안에 매우 취약하므로 개인정보, 민감정보 등 보안상 공개하면 안 되는 데이터는 저장하면 안 된다.
// 4byte까지 저장 된다.
// 키와 값으로 된 문자열만 저장 가능

// 쿠키 생성
// setcookie("쿠키명", "값", "폐기시간");
setcookie("myCookie", "홍길동", time()+30);

// base64_encode = 암호화
setcookie("myCookie", base64_encode("홍길동"), time()+86400);

setcookie("myCookie2", "아버지를 아버지라 부르지 못하고", time()+86400);