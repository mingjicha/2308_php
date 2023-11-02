<?php

namespace controller;

class ParentsController {
    // public function __construct($action) {
    //     echo "ParentsController 입니다.".$action;
    //     exit();
    // }
    protected $controllerChkUrl;

    public function __construct($action) {
        // view관련 chk 접속 url 세팅
        $this->controllerChkUrl = $_GET["url"];

        // controller 메소드 호출
        $resultAction = $this->$action();
        
        // view 호출
        require_once($resultAction);
        exit();
    }
}