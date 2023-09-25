<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root path 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 path
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB Connection 변수

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board\src\css\common.css">
    <title>리스트 페이지 연습</title>
</head>
<body>
    <?php
		require_once(FILE_HEADER); // 헤더 영역 표시
	?>
    <main>
    
    </main>
</body>
</html>