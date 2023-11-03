<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$id = ""; // 게시글 id
$conn = null; // DB Connect
$arr_err_msg = []; // 에러 메세지 저장용

try {
	// 아이디가 없거나 공백일경우
	if(!isset($_GET["id"]) || $_GET["id"] === "") {
		throw new Exception("Parameter ERROR : No id"); // 강제 예외 발생 :
	}
	$id = $_GET["id"]; // id 셋팅

	if(!isset($_GET["page"]) || $_GET["page"] === "") {
		throw new Exception("Parameter ERROR : No page"); // 강제 예외 발생 :
	}
	$page = $_GET["page"]; // page 셋팅
	
	// DB 연결
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance");
	}

	// // 파라미터 획득
	// $id = isset($_GET["id"]) ? $_GET["id"] : ""; // id 셋팅
	// $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 셋팅

	// if($id === "") {
	// 	$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
	// }
	// if($page === "") {
	// 	$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
	// }
	// if(count($arr_err_msg) >= 1) {
	// 	throw new Exception(implode("<br>", $arr_err_msg));
	// }

	// 게시글 데이터 조회
	$arr_param = [
		"id" => $id
	];
	$result = db_select_boards_id($conn, $arr_param);

	// 게시글 조회 예외처리
	if($result === false) {
		// 게시글 조회 에러
		throw new Exception("DB Error : PDO Select_id");
	} else if(!(count($result) === 1)) {
		// 게시글 조회 count 에러
		throw new Exception("DB Error : PDO Select_id count, ".count($result));
	}
	$item = $result[0];
} catch(Exception $e) {
	echo $e->getMessage(); // 예외 메세지 출력
	exit; // 처리종료
} finally {
	db_destroy_conn($conn); // DB 파기
}

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상세</title>
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/homework/src/css/gnb.js"></script> -->
</head>
<body>
    <!-- 배경 이미지 -->
    <div class="back_img"></div>
    <!-- 샤라락 버튼 -->
    <div class="main_btn">
        <a href="javascript:void(0);" class="menu_btn">샤라락</a>
        <div class="gnb_wrap">
            <ul class="gnb active">
                <li>
                    <a href="/homework/src/02_welcome.php">어스오세요</a>
                </li>
                <li>
                    <a href="/homework/src/03_hello.php">반갑습니다</a>
                </li>
                <li>
                    <a href="/homework/src/04_list.php">이래저래요</a>
                </li>
            </ul>
        </div>
    </div>   
    <!-- 폼 태그 시작 -->
    <form action="/todolist/src/05_delete.php" method="post">
        <!-- 오른쪽 메인 게시판 -->
        <div class="main">
            <!-- 게시글 불러오는 화면 -->
            <table class="board">
                <tr>
                    <td class="board_tit">번호</td>
                    <td class="board_tb"><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <td class="board_tit">제목</td>
                    <td class="board_tb"><?php echo $item["title"]; ?></td>
                </tr>
                <tr>
                    <td class="board_tit">내용</td>
                    <td class="board_tb"><?php echo $item["content"]; ?></td>
                </tr>
            </table>
        </div>
        <!-- 페이지 버튼 -->
        <div class="page_btn_list">
            <a href="/homework/src/04_list.php/?page=<?php echo $page; ?>">목록</a>
            <a href="/homework/src/08_update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>" >수정</a>
            <a href="/homework/src/07_delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>" >삭제</a>
        </div> 
    </form>    
    <!-- javascript -->
    <script src="/homework/src/css/effect.js"></script>
</body>
</html>