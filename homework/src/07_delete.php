<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$arr_err_msg = []; // 에러 메세지 저장용

try { 
    // DB Connect
	$conn = null; // PDO 객체 변수

    if(!my_db_conn($conn)) {
        // 강제 예외 발생 : DB Instance
        throw new Exception("DB Error : PDO Instance");
    }

    // Method 획득
    $http_method = $_SERVER["REQUEST_METHOD"];

    if($http_method === "GET") {
        // 3-1. GET일 경우 (상세 페이지의 삭제 버튼 클릭)
        // 3-1-1. 파라미터에서 id, page 획득
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $page = isset($_GET["page"]) ? $_GET["page"] : "";
        $arr_err_msg = [];
        if($id === "") {
            $arr_err_msg[] = "Parameter Error : id";
        }
        if($page === "") {
            $arr_err_msg[] = "Parameter Error : page";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        // 3-1-2. 게시글 정보
        $arr_param = [
            "id" => $id
        ];

        $result = db_select_boards_id($conn, $arr_param);
        
        // 3-1-3. 예외 처리
        if($result === false) {
            throw new Exception("DB Error : Select id");
        }

        else if(!(count($result) === 1)) {
            throw new Exception("DB Error : Select id count");
        }
        $item = $result[0];
    } else {
        // 3-2. POST일 경우 (삭제 페이지의 동의 버튼 클릭)
        // 3-2-1. 파라미터에서 id 획득
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $arr_err_msg = [];
        if($id === "") {
            $arr_err_msg[] = "Parameter Error : id";
        }
        if(count($arr_err_msg) >= 1) {
            throw new Exception(implode("<br>", $arr_err_msg));
        }

        // 3-2-2. Transaction 시작
        $conn->beginTransaction();

        // 3-2-3. 게시글 정보 삭제
        $arr_param = [
            "id" => $id
        ];

        // 3-2-4. 예외 처리
        if(!db_delete_boards_id($conn, $arr_param)) {
            throw new Exception("DB Error : Delete Boards id");
        }
        $conn->commit(); // commit
        header("Location: 04_list.php"); // 리스트 페이지로 이동
        exit; // 처리 종료
    }    
    } catch(Exception $e) {
        // POST일 경우
        if($http_method === "POST") {
            $conn->rollBack(); // collback
        }
        echo $e->getMessage();
        exit;
    } finally {
        db_destroy_conn($conn); // DB 파기
    }

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>삭제</title>
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/homeworksrc/css/gnb.js"></script> -->
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
    <!-- 오른쪽 메인 게시판 -->
    <div class="main">
        <!-- 삭제 화인 문구 -->
        <div>
            <p>삭제 할고야,,?</p>
            <p>진짜 삭제한다???</p>
        </div> 
        <!-- 게시글 삭제 화면 -->
        <table class="board">
            <colgroup>
                <col width="20%"> 
                <col width="80%">
			</colgroup>
            <tr>
                <td id="board_b">번호</td>
                <td id="board_c"><?php echo $item["id"] ?></td>
            </tr>
            <tr>
                <td id="board_b">작성일</td>
                <td id="board_c"><?php echo $item["create_at"] ?></td>
            </tr>
            <tr>
                <td id="board_b">제목</td>
                <td id="board_c"><?php echo $item["title"] ?></td>
            </tr>
            <tr>
                <td id="board_b">내용</td>
                <td id="board_c"><?php echo $item["content"] ?></td>
            </tr>
        </table>
        <div class="page_btn">
            <!-- 폼 태그 시작 -->
            <form action="/homework/src/07_delete.php" method="post">
                <!-- 페이지 버튼 -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div>
                <button type="submit">삭제</button>
                    <a href="/homework/src/06_detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>