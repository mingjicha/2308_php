<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
define("ERROR_MSG_PARAM", "※ %s을 입력해 주세요."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB 연결용 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 무슨 방식으로 가져오는 지 확인
$arr_err_msg = []; // 에러 메세지 저장용
$title = "";
$content = "";

try { 
    // DB 접속
    if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외 발생
    }

    // 첫번째 사용자가 처리할 수 없는 에러
    if($http_method === "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
        $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // page 셋팅
        
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
            // 게시글 수정을 위해 파라미터 셋팅
            $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
            $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 셋팅
            $title = trim(isset($_POST["title"]) ? trim($_POST["title"]) : ""); // title 셋팅
		    $content = trim(isset($_POST["content"]) ? trim($_POST["content"]) : ""); // content 셋팅
            // id page는 표시해주기 위해서 한 번 더 id랑 page를 넣어줌
            if($id === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "id");
            }
            if($page === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "page");
            }

            // id, page가 없을 경우(예외처리)
            if(count($arr_err_msg) >= 1) {
                throw new Exception(implode("<br>", $arr_err_msg));
            }

        	// title, content가 없을 경우
            if($title === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
            }
            if($content === "") {
                $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
            }

            // 에러 메세지가 없을 경우에 업데이트 처리
            if(count($arr_err_msg) === 0) {
                // 데이터 무결성
                $arr_param = [
                    "id" => $id
                    ,"title" => $title
                    ,"content" => $content 
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
    <form action="/homework/src/08_update.php" method="post">
        <!-- id랑 page값 받아오기 -->
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <!-- 오른쪽 메인 게시판 -->
        <div class="main">
            <!-- 에러메시지 -->
            <div class="error_msg">
                <?php 
                    foreach($arr_err_msg as $val) {
                ?>
                    <P><?php echo $val ?></P>
                <?php
                    }
                ?>
            </div>
            <!-- 게시글 수정 화면 -->
            <table class="board">
                <colgroup>
                    <col width="20%"> 
                    <col width="80%">
                </colgroup>
                <!-- 수정 에러 나도 내용 남을 수 있게 처리 -->
                <?php 
                if($http_method === "GET"){ // GET으로 처음 고유의 값 tit랑 con을 받아온다
                    $tit_stay= $item["title"];
                    $con_stay= $item["content"];
                } else { // 에러가 떴을 때 수정 중인 내용을 POST 메소드에 저장해서 그 값을 val값으로 넣어줘서 변경 중이던 값을 그대로 출력할 수 있게 해준다
                    $tit_stay= $_POST["title"];
                    $con_stay= $_POST["content"];
                }
                ?>
                <tr>
                    <td id="board_b">번호</td>
                    <td><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <td id="board_b">제목</td>
                    <td>
                        <input type="text" class='input_tit' name="title" id="title" value="<?php echo $tit_stay ?>" maxlength="20" spellcheck="false">
                    </td>
                </tr>
                <tr>
                    <td id="board_b">내용</td>
                    <td>
                        <textarea class='input_con' name="content" id="content" cols="25" rows="10" spellcheck="false"><?php echo $con_stay ?></textarea>
                    </td>
                </tr>
            </table>
            <!-- 페이지 버튼 -->
            <div class="update_btn">
                <button id="up_up" type="submit">수정</button>
                <a id="up_de" href="/homework/src/06_detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
            </div>
        </div>
    </form> 
</body>
</html>