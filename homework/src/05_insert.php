<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
define("ERROR_MSG_PARAM", "⛔ %s을 입력해 주세요."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리
$conn = null; // DB Connection 변수
$http_method = $_SERVER["REQUEST_METHOD"]; // Method 무슨 방식으로 가져오는 지 확인
$arr_err_msg = []; // 에러 메세지 저장용
$title = "";
$content = "";

if($http_method === "POST") {
	try {
		$arr_post = $_POST;

		// 파라미터 획득
		$title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 셋팅
		$content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 셋팅

		// 공백이 있을 경우 작성을 못하게 설정
		if($title === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
		}
		if($content === "") {
			$arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
		}
		// if(count($arr_err_msg) >= 1) {
		// 	throw new Exception(implode("<br>", $arr_err_msg));
		// }
		
		// 제목과 내용 둘 다 작성 했을 때는 실행
		if(count($arr_err_msg) === 0 ) {
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
			}
		} catch(Exception $e) {
			if($conn !== null) {
			$conn->rollBack(); 
			}
			// echo $e->getMessage(); // Exception 메세지 출력
			header("Location: error.php/?err_msg={$e->getMessage()}");
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
    <title>작성</title>
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- javascript -->
    <!-- <script src="/homework/src/css/gnb.js"></script> -->
</head>
<body>
    <!-- 배경 이미지 -->
    <div class="back_img"></div>
    <div class="error_in">
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
    <!-- form 양식 만들어서 작성글 받아주기 -->
	<form action="/homework/src/05_insert.php" method="post">
    	<div class="main">
        	<table class="board">
			    <tr>
					<td>
						<input type="text" name="title" id="title" value="<?php echo $title ?>" class="input_up_tit" placeholder="제목이지롱"> <!--빈 문자열로 선언을 해두고 value로 넣어줘야함 -->
							<!-- input 짧은 글 -->
					</td>
				</tr>
					<td>
						<textarea name="content" id="content" cols="30" rows="10" class="input_up_con" placeholder="내용이지롱"><?php echo $content ?></textarea>
						<!-- textarea 긴 글 -->
					</td>
			</table>
			<div class="page_btn">
				<!-- 작성 : button, 취소 : a 태그 -->
				<button class="insert_b" type="submit">작성</button>
				<a href="/homework/src/04_list.php">취소</a>
			</div>
    	</div> 
	</form>
</body>
</html>