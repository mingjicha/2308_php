<?php
// insert(추가) delete(삭제) update(수정)는 commit 필요함

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

// POST로 request가 왔을 때 처리
// 데이터를 담아서 서버에게 요청하는 GET방식과 POST방식 https://mommoo.tistory.com/60, https://free-eunb.tistory.com/41 참고
// HTTP 패킷
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 무슨 방식으로 가져오는 지 확인
if($http_method === "POST") {
	try {
		$arr_post = $_POST;
		$conn = null; // DB Connection 변수

		// DB 접속 true면 DB연결이 잘 된 것, false면 에러가 뜸
		if(!my_db_conn($conn)) {
			// DB Instance 에러
			throw new Exception("DB Error : PDO Instance");
		}
		$conn->beginTransaction(); // 트랜잭션 시작 auto commit 끔
		// https://www.php.net/manual/en/pdo.begintransaction.php beginTransaction() 참고

		// insert
		if(!db_insert_boards($conn, $arr_post)) {
			// DB Insert 에러
			throw new Exception("DB Error : Insert Boards");
		}
 
		$conn->commit(); // 모든 처리 완료 시 커밋
		// 커밋은 신중하게

		// insert가 끝났으니까 리스트 페이지로 이동
		header("Location: list.php");
		exit;
	} catch(Exception $e) {
		$conn->rollBack();
		echo $e->getMessage(); // Exception 메세지 출력
		exit;
	} finally {
		db_destroy_conn($conn); // DB 파기 > 할 일 끝난 insert한테 관련된 DB가 더이상 필요가 없으니 불필요한 메모리 제거
	}
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>작성 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
		<!-- form 양식
			action(백단. 서버단 주소)에 있는 걸 통해서 input 안에 있는 특정 "이름"이 있는 데이터 내용을 서버로 넘긴다 -->
	<form action="/mini_board/src/insert.php" method="post">
		<label for="title">제목 : </label>
		<input type="text" name="title" id="title" > 
		<!-- input 짧은 글 -->
		<br>
		<label for="content">내용 : </label>
		<textarea name="content" id="content" cols="30" rows="10"></textarea>
		<!-- textarea 긴 글 -->
		<br>
		<button type="submit">작성</button>
		<!-- action으로 선언한 서버로 submit(전송) 해준다 -->
		<a href="/mini_board/src/list.php">취소</a>
	</form>
</body>
</html>