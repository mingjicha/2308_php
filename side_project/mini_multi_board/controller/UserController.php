<?php

namespace controller;

use model\UserModel;
use lib\Validation;

// class 자식 extends 부모
class UserController extends ParentsController {
    // 로그인 페이지 이동
    protected function loginGet() {
        return "view/login.php";
    }

    // 로그인 처리(POST)
    protected function loginPost() {
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크(암호화 전에 먼저 해주고)
        if(!validation::userChk($inputData)) {
            $this->arrErrorMsg = Validation::getArrErrorMsg();
            return "view/login.php";
        }

        // 유효성 체크에 문제가 없을 경우 암호화 해줌
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
        $_SESSION["u_pk"] = $resultUserInfo[0]["id"];
        return "Location: /board/list?b_type=0";
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

    // 회원가입 처리
    Protected function registPost() {
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $_POST["u_pw"]
            ,"u_pw_chk" => $_POST["u_pw_chk"]
            ,"u_name" => $_POST["u_name"]
        ];

        $arrAddUserInfo = [
            "u_id" => $_POST["u_id"]
            ,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
            ,"u_name" => $_POST["u_name"]
        ];

       // TODO : 발리데이션 체크

       
       // 유효성 체크
       if(!validation::userChk($inputData)) {
           $this->arrErrorMsg = Validation::getArrErrorMsg();
           return "view/regist.php";
        }
        
        // TODO : 아이디 중복 체크 필요


        // 인서트 처리(유효성 체크 성공)
        $userModel = new UserModel();
        $userModel->beginTransaction();
        $result = $userModel->addUserInfo($arrAddUserInfo);

        if($result !== true) {
            $userModel->rollback();
        } else {
            $userModel->commit();
        }
        $userModel->destroy();

        return "Location: /user/login";
    }

    // 아이디 중복 검사
    protected function idChkPost() {
		$errorFlg = "0";
		$errorMsg = "";
		$inputData = [
			"u_id" => $_POST["u_id"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$errorFlg = "1";
			$errorMsg = Validation::getArrErrorMsg()[0];
		}

		// 중복 체크
		$userModel = new UserModel();
		$result = $userModel->getUserInfo($inputData);
		$userModel->destroy();

		if(count($result) > 0) {
			$errorFlg = "1";
			$errorMsg = "중복된 아이디입니다.";
		}

		// response 처리
		$response = [
			"errflg" => $errorFlg
			,"msg" => $errorMsg
		];

		header('Content-type: application/json');
		echo json_encode($response);
		exit();
	}
    
    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}