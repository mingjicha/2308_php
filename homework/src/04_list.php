<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src/"); // 웹서버 root path 생성
// define 상수를 정의하는 것 상수란 ? 변하지 않는 값 define(name, value, case-insensitive)

// var_dump($_SERVER); // SERVER라는 슈퍼 글로벌 변수 안에 있는 데이터들 확인
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

$conn = null; // DB Connection 변수
// 쓰임새가 많을 경우 전역변수로 만들고 함수 안에서만 잠깐 쓰는 거면 지역변수로 만들기

try {
	// DB 접속
	if(!my_db_conn($conn)) {
		// DB Instance 에러
		throw new Exception("DB Error : PDO Instance"); // 강제 예외 발생
	}

	// ---------------
	// 페이징 처리
	// ---------------
	// https://velog.io/@dpdnjs402/qnwsh7kt 참고 
	$list_cnt = 5; // 한 페이지 최대 표시할 페이지 수
	$page_num = 1; // 페이지 번호 초기화 > 초기 세팅

	// 페이징을 구현하기 위해 구해야 할 값: prev, next, startPage, endPage
	// 총 게시글 수 검색
	$boards_cnt = db_select_boards_cnt($conn);
	if($boards_cnt === false) {
		throw new Exception("DB Error : SELECT Count"); // 강제 예외 발생
	}

	$max_page_num = ceil($boards_cnt / $list_cnt); // 최대 페이지 수(endPage)
	// $boards_cnt(전체 게시글 수) / $list_cnt(한 페이지 최대 표시할 게시글 수) 

	// GET Method 
	// $page_num 세팅
	if(isset($_GET["page"])) { // isset() 변수가 설정되면 true 없으면 false > 파라미터에 페이지가 들어갔냐 안 들어갔냐
		$page_num = $_GET["page"]; // 유저가 보내온 페이지 셋팅 > 페이지 저장
	}

	$offset = ($page_num - 1) * $list_cnt; // 오프셋 계산 https://betterdev.tistory.com/17 참고
	// offset = (현재 페이지 번호 - 1) * 페이지 당 요청하는 자료 개수

	// 이전버튼(prev)
	$prev_page_num = $page_num - 1;
	if($prev_page_num === 0) {
		$prev_page_num = 1;
	}

	// 다음버튼(next)
	$next_page_num = $page_num + 1;
	if($next_page_num > $max_page_num) {
		$next_page_num = $max_page_num;
	}

	// DB 조회 시 사용할 데이터 배열
	$arr_param = [
		"list_cnt" => $list_cnt
		,"offset" => $offset
	];

	// 게시글 리스트 조회
	$result = db_select_boards_paging($conn, $arr_param);

	if(!$result) {
		// select 게시글 리스트 조회 에러
		throw new Exception("DB Error : SELECT boards"); // 강제 예외 발생 : SELECT boards
	}
} catch(Exception $e) {
	// echo $e->getMessage(); // 예외 발생 메시지 출력
	exit; // 처리 종료
} finally {
	db_destroy_conn($conn); // DB 파기 // 에러가 나면 DB를 사용할 일이 없으니까 파기 해주는 것
}


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>목록</title>
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
	<!-- 오른쪽 메인 게시판 -->
    <div class="main">
        <!-- 작성 버튼  -->
        <a href="/homework/src/05_insert.php" class="page_btn insert_btn">작성하기</a>
        <!-- 게시글 리스트 -->
        <table class="board_list">
            <!-- 번호, 제목, 작성일자 순으로 가로 비율 맞추기 -->
            <colgroup>
				<col width="20%"> 
				<col width="50%">
				<col width="30%">
			</colgroup>
            <tr>
				<td>번호</td>
				<td>제목</td>
				<td>작성일</td>
			</tr>
            <!-- 리스트 불러오기 -->
			<?php
				foreach($result as $item) {
			?>
				<tr class="board_tb">
					<td><?php echo $item["id"]; ?></td>
					<td>
						<!-- get방식 사용 -->
						<a href="/homework/src/06_detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
						<?php echo $item["title"]; ?>
						<a>
					</td>
					<td><?php echo $item["create_at"]; ?></td>
				</tr>
			<?php
				} 
			?>
		</table>
        <!-- 페이징 처리  -->
        <div class="page_line">
			<!-- 이전 -->
			<a class="page_num" href="/homework/src/04_list.php/?page=<?php echo $prev_page_num; ?>"><</a>
				<?php 
					for($i = 1; $i <= $max_page_num; $i++) {
						$str = (int)$page_num === $i ? "bk-a" : ""; 
				?>
			<!-- 페이지 수 -->
			<a class="page_num <?php echo $str; ?>" href="/homework/src/04_list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
			<?php
				}
			?>
			<!-- 다음 -->
			<a class="page_num" href="/homework/src/04_list.php/?page=<?php echo $next_page_num; ?>">></a>
        </div>
    </div>
</body>
</html>