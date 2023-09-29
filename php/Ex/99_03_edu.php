<?php
// HTTP 통신 // 04_146_ex1_http_get_method 참고
// 통신을 하는데 있어서 메소드라는 걸 지정해서 어떤 처리를 할거다 라는 걸 미리 약속 함 ex) GET, POST
// GET Mehtod url 파라미터 부분에 키와 값을 세트로 해서 설정하기 떄문에 쉽게 외부에서 어떤값이 들어가는 지 확인할 수 있음 - 보안성 취약
// ?pagd=2&num=10
// 유저가 입력하는 값은 웬만하면 post 사용 
// POST Method 유저가 입력한 값(회원가입, 로그인)을 숨겨서 헤드태그<head>에 담아서 사용하기 때문에 유저가 확인할 수가 없다
// 유저가 값을 입력해야 우리가 그걸보고 처리를 하니까

// 슈퍼 글로벌 변수
// 앞에 _로 시작할 경우 php에서 만들어준 슈퍼 글로벌 변수
// print_r($_SERVER);
print_r($_GET);
print_r($_POST);
// html 화면으로 보면 array가 세개가 있을 건데 server get post 순으로 나옴
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/99_03_edu.php" method="post"> 
        <!-- form action="/99_03_edu.php" 주소가 이렇게 되는 이유
            아파치 설정 파일에 DocumentRoot "${SRVROOT}/htdocs" 라고 설정해줬기 때문에 -->
        <input type="text" name="post_test">
        <button type="submit">post</button> 
        <!-- post로 보내주려면 button을 만들어서 보내줘야 함 -->
        <!-- 설정하고 주소창에 ?id=123이라고 쳐서 들어가보면 get에 Array([id] => 123)로 출력 됨 
            검색 했을 때 보안이 요구되지 않을 때나 단순 페이지 이동할 경우 사용 됨-->
        <!-- input에 비밀번호 같은 걸 넣어주고 post button을 누를 경우 post에 Array([post_test] => 504504)로 출력 됨 
            주소창은 아무일 없음😶 -->
    </form>
    <form action="/99_03_edu.php" method="post"> 
        <label for="id">ID : </label>
        <input type="text" name="id" id="id">
        <br>
        <label for="pw">PW : </label>
        <input type="password" name="pw" id="pw">
        <input type="hidden" name="name" value="미어캣">
        <!-- <input type="hidden"> 사용자에게는 보이지 않는 숨겨진 입력 필드
            폼 제출 시에 사용자가 변경해서는 안 되는 데이터를 함께 보낼 때 사용된다. 
            수정할 게시글이 데이터베이스 테이블에서 가지고 있는 Primary Key 값이 이에 해당될 수 있다.
            같이 제출되는 이 PK 값을 통해 DB에서 해당 레코드를 식별하여 정보를 알맞게 수정할 수 있는 것이다.
            이러한 입력 필드는 앞서 말한 것처럼 업데이트 되어야 하는 데이터베이스의 레코드를 저장하거나, 
            고유한 보안 토큰 등을 서버로 보낼 때 주로 사용된다고 한다.-->
        <button type="submit">post</button> 
    </form>
</body>
</html>
