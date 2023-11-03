<?php

namespace controller;

class ParentsController {
    // public function __construct($action) {
    //     echo "ParentsController 입니다.".$action;
    //     exit();
    // }

    // 헤더 표시 제어용 문자열
    protected $controllerChkUrl;
    // 화면에 표시할 에러메시지 리스트
    protected $arrErrorMsg = [];
    // 비로그인 시 접속 불가능한 URL 리스트
    private $arrNeedAuth = [ // 페이지 추가되면 여기서 추가하면 자동으로 권한 추가됨 (만들어준 메소드 때문에)
        "board/list"
    ];

    public function __construct($action) {
        // view관련 chk 접속 url 세팅
        $this->controllerChkUrl = $_GET["url"];

        // 세션 시작 
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

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
        if( !isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth) ) {
            header("Location: /user/login");
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