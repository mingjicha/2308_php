<?php

// 이름공간 또는 네임스페이스(영어: namespace)는 개체를 구분할 수 있는 범위를 나타내는 말로 
// 일반적으로 하나의 이름 공간에서는 하나의 이름이 단 하나의 개체만을 가리키게 된다. 
// 보통 파일 시스템은 파일에 이름을 할당하는 이름공간이다.
namespace controller;

// 컨트롤러에서 모델로 접근하기 위한 파일 위치 설정
use model\BoardNameModel;

// class는 객체 지향 프로그래밍(OOP)에서 특정 객체를 생성하기 위해 변수와 메소드를 정의하는 일종의 틀(template)이다. 객체를 정의하기 위한 메소드와 변수로 구성된다.
class ParentsController {
    // public function __construct($action) {
    //     echo "ParentsController 입니다.".$action;
    //     exit();
    // }

    // 헤더 표시 제어용 문자열
    protected $controllerChkUrl;
    // 화면에 표시할 에러메시지 리스트
    protected $arrErrorMsg = [];
    // 헤더 게시판 드롭다운 표시용
    protected $arrBoardNameInfo; 

    // 비로그인 시 접속 불가능한 URL 리스트 -> 비로그인 상태에서 board/list로 이동하려고 하면 다시 로그인 페이지로 돌아옴
    private $arrNeedAuth = [ // 후에 페이지 추가 될 때 여기서 추가로 작성해주면 자동으로 권한 추가됨 (만들어준 메소드 때문에)
        "board/list"
        ,"board/add"
        ,"board/detail"
    ];

    // https://devjhs.tistory.com/516 - __construct - 참고
    public function __construct($action) {
        // view관련 chk 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // 세션 시작 
        // 세션(session)이란 웹 사이트의 여러 페이지에 걸쳐 사용되는 사용자 정보를 저장하는 방법을 의미
        // 사용자가 브라우저를 닫아 서버와의 연결을 끝내는 시점까지를 세션이라고 합니다.
        // https://www.tcpschool.com/php/php_cookieSession_session - session - 참고
        if(!isset($_SESSION)) {
            session_start(); // session_start() 함수는 세션 아이디가 이미 존재하는지를 확인하고, 존재하지 않으면 새로운 아이디를 만듦
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // 헤더 게시판 드롭박스 데이터 획득 ex) 자유게시판, 질문게시판, ...
        $boardNameModel = new BoardNameModel();
        $this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
        $boardNameModel->destroy();

        // controller 메소드 호출
        $resultAction = $this->$action();
        
        // view 호출
        // require_once($resultAction);
        $this->callView($resultAction);
        exit();
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"];
        // 생성된 세션 변수는 $_SESSION["세션변수이름"]으로 접근
        if( !isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth) ) { 
            header("Location: /user/login");
            exit();
        }
        // 로그인한 상태에서 로그인 페이지 접속 시 board/list로 이동
        if( isset($_SESSION["u_pk"]) && $url === "user/login" ){
            header("Location: /board/list");
            exit();
        }
    }

    // 뷰 호출용 메소드
    private function callView($path) {
        // view/list.php
        // Location: /board/list
        if( strpos($path, "Location:") === 0 ) {
            header($path);
            // exit();
        } else {
            require_once($path);
        }
    }
}