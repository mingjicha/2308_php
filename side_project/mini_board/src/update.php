<?php
// 사용자가 입력한 값은 POST로 보낸다

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); // 웹서버 root 패스 생성
// $_SERVER["DOCUMENT_ROOT"] 절대 주소
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
define("ERROR_MSG_PARAM", "⛔ %s을 입력해 주세요."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB 연결용 변수
// id가 있는지 확인, id가 있으면 id를 넣어주고 없으면 빈문자열을 넣어줘라 - 삼항 연산자 사용
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 셋팅
// var_dump($_GET);
// var_dump($_POST);
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 무슨 방식으로 가져오는 지 확인

// 기본 try - catch - finally
// try { 
//     // DB 접속
// 	if(!my_db_conn($conn)) {
// 		// DB Instance 에러
// 		throw new Exception("DB Error : PDO Instance"); // 강제 예외 발생
// 	}
// } catch(Exception $e) {
//     echo $e->getMessage(); // 예외 발생 메시지 출력
// 	exit; // 처리 종료
// } finally {
//     db_destroy_conn($conn); // DB 파기
// }

$arr_err_msg = []; // 에러 메세지 저장용

try { 
    // DB 접속
    if(!my_db_conn($conn)) {
        // DB Instance 에러
        throw new Exception("DB Error : PDO Instance"); // 강제 예외 발생
    }

    // 첫번째 사용자가 처리할 수 없는 에러
    if($http_method === "GET") {
        $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; // id 셋팅
        $page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"]; // id 셋팅
        
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
            $title = trim(isset($_POST["title"]) ? trim($_POST["title"]) : ""); // title 셋팅 // trim 왼쪽 오른쪽 공백을 없애줌
		    $content = trim(isset($_POST["content"]) ? trim($_POST["content"]) : ""); // content 셋팅
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
                header("Location: detail.php/?id={$id}&page={$page}"); 
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
        // echo $e->getMessage(); // 예외 발생 메시지 출력
                header("Location: error.php/?err_msg={$e->getMessage()}");
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
	<link rel="stylesheet" href="/mini_board/src/css/common.css"> <!-- 상대주소 -->
    <title>수정 페이지</title>
</head>
<body>
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
    <form action="/mini_board/src/update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
            <div class="update_tb">
                <table>
                    <tr>
                        <th>번호</th>
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
            </div>
        <!-- 수정 확인 버튼 클릭 
             post > update.php
             게시글의 id를 이용해서 update -->
        <div class="update_a">
            <button class="update_b" type="submit">수정확인</button>
            <a class="update_b" href="/mini_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
        </div>
    </form>
</body>
</html>