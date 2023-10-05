<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/mini_board/src/css/common.css">
	<title>에러 페이지</title>
</head>
<body>
	<?php
		require_once(FILE_HEADER);
	?>
    <main class="container">
        <div class="error_a">
            <p>해당 페이지를 찾을 수 없습니다.</p>
            <p>이전 페이지로 돌아가 주세요.</p>
            <P><?php echo $err_msg ?></p>
        </div>
        <a class="error_b" href="/mini_board/src/list.php">메인으로</a>
    </main>
</body>
</html>