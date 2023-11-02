<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
define("ERROR_MSG_PARAM", "⛔ %s을 입력해 주세요."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB 연결용 변수
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 세팅
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 세팅
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 무슨 방식으로 가져오는 지 확인
$arr_err_msg = []; // 에러 메세지 저장용

try { 
    // DB 접속
    if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외 발생
    }

    // 첫번째 사용자가 처리할 수 없는 에러
    if($http_method === "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 세팅
        $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 세팅
        
        if($id === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
		}
		if($page === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
		}
        // 사용자 입력이 아닌 값이 잘못된 거기때문에 catch로 이동해서 에러 메시지 출력시켜주기
        if(count($arr_err_msg) >= 1) {
			throw new Exception(implode("<br>", $arr_err_msg));
		}
         
        // 두번째 사용자가 처리할 수 있는 에러
        } else {
            // POST Method
            // 게시글 수정을 위해 파라미터 세팅
            $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 세팅
            $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 세팅
            $title = trim(isset($_POST["title"]) ? trim($_POST["title"]) : ""); // title 세팅 // trim 왼쪽 오른쪽 공백을 없애줌
		    $content = trim(isset($_POST["content"]) ? trim($_POST["content"]) : ""); // content 세팅
            // id page는 표시해주기 위해서 한 번 더 id랑 page를 넣어줌
            if($id === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
            }
            if($page === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
            }
            if(count($arr_err_msg) >= 1) {
                throw new Exception(implode("<br>", $arr_err_msg));
            }
            if($title === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
            }
            if($content === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
            }

            // 에러 메세지가 없을 경우에 업데이트 처리를 할 것이다.
            if(count($arr_err_msg) === 0) {
                // 데이터 무결성
                $arr_param = [
                    "id" => $id
                    ,"title" => $title
                    ,"content" => $content 
                    // ,"title" => $_POST["title"]
                    // ,"content" => $_POST["content"]
                ];

                // 게시글 수정 처리 POST Nethod 일 경우에만 트랜잭션 시작 
                $conn->beginTransaction(); // 트랜잭션 시작

                // db_update_boards_id가 boolean 타입이니까 if문에 넣어도 됨
                if(!db_update_boards_id($conn, $arr_param)) {
                    // DB  Update_Boards 에러
                    throw new Exception("DB Error : Update_Boards_id");
                }
                $conn->commit(); // commit

                // 게시글 수정 했을 경우 detail page로 이동
                header("Location: 06_detail.php/?id={$id}&page={$page}"); 
                exit;
                }                                                    
            }
            // 게시글 데이터 조회를 위한 파라미터 셋팅
		$arr_param = [
			"id" => $id
		];

		// 게시글 데이터 조회
		$result = db_select_boards_id($conn, $arr_param);
		// 게시글 조회 예외처리
		if($result === false) {
			// 게시글 조회 에러
			throw new Exception("DB Error : PDO Select_id");
		} else if(!(count($result) === 1)) {
			// 게시글 조회 count 에러
			throw new Exception("DB Error : PDO Select_id Count, ".count($result));
		}
		$item = $result[0];
    } catch(Exception $e) {
        if($http_method === "POST") {
            $conn->rollBack(); // rollback
        }
        echo $e->getMessage(); // 예외 발생 메시지 출력
        exit; // 처리 종료
    } finally {
        db_destroy_conn($conn); // DB 파기
    }


?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수정</title>
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/homework/src/css/gnb.js"></script> -->
</head>
<body>
    <!-- 배경 이미지 -->
    <div class="back_img"></div>
    <!-- 에러메시지 -->
    <div class="error_up">
        <?php
            require_once(FILE_HEADER);
        ?>
        <?php 
                foreach($arr_err_msg as $val) {
            ?>
                <P><?php echo $val ?></P>
            <?php
                }
            ?>
    </div>
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
    <form action="/mini_board/src/update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <div class="main">
            <!-- 글 번호는 받아오고 제목, 내용은 수정할 수 있게 -->
            <table class="board">
                <tr>
                    <th>글 번호</th>
                    <td><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <td>
                        <input type="text" name="title" value="<?php echo $item["title"] ?>" class="input_up_tit">
                    </td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td>
                        <textarea name="content" id="content" cols="30" rows="10" class="input_up_con"><?php echo $item["content"] ?></textarea>    
                    </td>
                </tr>
            </table>
            <div class="page_num">
                <!-- 수정 : button, 취소 : a 태그 -->
                <button class="update_b" type="submit">수정</button>
                <a href="/homework/src/06_detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
            </div>
        </div>
</body>
</html>