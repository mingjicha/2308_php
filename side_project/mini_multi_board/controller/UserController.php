<?php

namespace controller;

// class 자식 extends 부모
class UserController extends ParentsController {
    // 로그인 페이지 이동
    protected function loginGet() {
        return "view/login.php";
    }

    // 회원가입 페이지 이동
    protected function registGet() {
        return "view/regist"._EXTENSION_PHP;
    }
}