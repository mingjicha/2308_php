<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {
    protected $arrBoardInfo;
    protected $titleBoardName;
    protected $boardType;

    // 게시판 리스트 페이지
    protected function listGet() {
        // 파라미터 셋팅
        $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";
        $arrBoardInfo = [
            "b_type" => $b_type
        ];

        // 페이지의 제목 셋팅
        foreach($this->arrBoardNameInfo as $item) {
            if($item["b_type"] === $b_type){
                $this->titleBoardName = $item["b_name"];
                $this->boardType = $item["b_type"];
                break;
            }
        }
        
        // 모델 인스턴스
        $boardModel = new BoardModel();

        // board 리스트 획득
        $this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfo); 

        // 데이터 가공처리
        // 리스트 페이지 상세 내용 글자 수 제한, 잘린 부분은 ...표시
        // $this->arrBoardInfo["b_content"] = mb_substr($this->arrBoardInfo["b_content"], 0, 10)."...";
        // 이미지 파일 경로
        // $this->arrBoardInfo["b_img"] = isset($this->arrBoardInfo["b_img"]) ? _PATH_USERIMG.$this->arrBoardInfo["b_img"] : "";
        
        // 사용한 모델 파기
        $boardModel->destroy();

        return "view/list.php";
    }

    // 글 작성
    protected function addPost() {
        // 작성 데이터 생성
        $b_type = $_POST["b_type"];
        $b_title = $_POST["b_title"];
        $b_content = $_POST["b_content"];
        $u_pk = $_SESSION["u_pk"];
        // var_dump($_FILES);exit; 찍어보면 배열에 파일명 'name' 찍힘 
        $b_img = $_FILES["b_img"]["name"];

        $arrAddBoardInfo = [
            "b_type" => $b_type
            ,"b_title" => $b_title
            ,"b_content" => $b_content
            ,"u_pk" => $u_pk
            ,"b_img" => $b_img
        ];
        
        // 실제 이미지가 저장된 경로 tmp_name
        // 이미지 파일 저장 
        move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);

        // 인서트 처리
        $boardModel = new BoardModel();
        $boardModel->beginTransaction(); // 인서트니까 트랜잭션 해줘야 함
        $result = $boardModel->addBoard($arrAddBoardInfo);
        if($result !== true) {
            $boardModel->rollBack();
        } else {
            $boardModel->commit();
        }
        
        // 모델 파기
        $boardModel->destroy();
        return "Location: /board/list?b_type=".$b_type;
    }
}