<?php
namespace router;

// 사용할 컨트롤러들 지정
use controller\UserController; 
// use controller\UserController as UC; // 별칭을 주는 경우도 있음
use controller\BoardController;

// 파일명 class 따라감
// 라우터 : 유저의 요청을 분석해서 해당 Controller로 연결해주는 클래스
class Router {
    public function __construct() {
        // URL 규칙
        // 1. 회원 정보 관련 URL 
        //      user/[해당기능]
        //      ex) 로그인 : 호스트(도메인)/user/login
        //      ex) 회원가입 : 호스트(도메인)/user/regist
        // 2. 게시판 관련 URL
        //      board/[해당기능]
        //      ex) 리스트 : 호스트(도메인)/board/list
        //      ex) 수정 : 호스트(도메인)/board/edit
        // (앞)보통 클래스가 됨 user, board/(뒤)어떤 메소드를 action할 건지 

        $url = $_GET["url"]; // 접속 url 획득
        $method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

        // url 값이 user/login으로 왔는지 확인하기
        if($url === "user/login") {
            if($method === "GET") {
                // 해당 컨트롤러 호출 // GET라면
                // 로그인에 GET메소드로 왔다 // new User("메소드명");
                // 파일 위치가 다르니까 상단에 위치 지정해줘야 함
                // 유저랑 관련 있으니까 UserController 사용
                new UserController("loginGet"); // 소괄호가 붙으면 실행시키겠다는 뜻
            } else {
                // 해당 컨트롤러 호출 // POST라면
                // 로그인에 POST메소드로 왔다
                // new User("loginPost");
                new UserController("loginPost");
            }
        } // url 값이 user/loout으로 왔는지 확인하기
          else if($url === "user/logout") { // 로그아웃일 때는 POST있을 경우가 없어서 없어도 됨
            if($method === "GET") {
                // 해당 컨트롤러 호출
                new UserController("logoutGet");
            } 
        } else if($url === "user/regist") {
            if($method === "GET") {
                new UserController("registGet");
            } else {
                // 해당 컨트롤러 호출
                new UserController("registPost");
            }    
        } else if($url === "user/idchk"){
			if($method === "POST") {
				new UserController("idChkPost");
			}
        } else if($url === "board/list") {
            if($method === "GET") {
                new BoardController("listGet");
            }
        } else if($url === "board/add") {
            if($method === "GET") {
                // 처리 없음
            } else {
                new BoardController("addPost");
            }
        } else if($url === "board/detail") {
            if($method === "GET") {
                new BoardController("detailGet");
            }
        } else if($url === "board/remove") {
            if($method === "GET") {
                new BoardController("removeGet");
            }
        }

        // 없는 경로일 경우 
        echo "이상한 URL : ".$url; // GET, POST 둘다 아니라면
        exit();
    }
}