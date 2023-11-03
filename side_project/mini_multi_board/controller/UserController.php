<?php

namespace controller;

use model\UserModel;

// class 자식 extends 부모
class UserController extends ParentsController {
    // 로그인 페이지 이동
    protected function loginGet() {
        return "view/login.php";
    }

    // 로그인 처리(POST)
    protected function loginPost() {
        // ID, PW 설정(DB에서 사용할 데이터 가공)
        // 원본 데이터가 혹시나 바뀔 것을 대비하여 따로 만들어 놓기
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"];
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        // 유저정보 가져오기
        $modelUser = new UserModel();
        $resultUserInfo = $modelUser->getUserInfo($arrInput, true);

        // 유저정보 확인하기
        if(count($resultUserInfo) === 0) {
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
            // 메시지 출력 후 로그인 페이지로 리턴
            return "view/login.php";
        }
        // 유저정보 확인 후 정상인 유저들을 세션 u_id 저장
        $_SESSION["u_id"] = $resultUserInfo[0]["u_id"];
        return "Location: /board/list";
    }
    // 로그아웃 처리(GET)
    protected function logoutGet() {
        session_unset();
        session_destroy();

        // 로그아웃 후 로그인 페이지 리턴
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동(GET)
    protected function registGet() {
        return "view/regist"._EXTENSION_PHP;
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}