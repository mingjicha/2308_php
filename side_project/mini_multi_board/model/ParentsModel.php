<?php

namespace model;

// 경로 없이 적을 경우 보통 php 라이브러리에 있는 클래스들
use PDO;
use Exception;

// 객체지향이기 때문에 파일 하나 당 클래스 단위
class ParentsModel { // 파일명과 동일
    protected $conn;
    // 생성자
    public function __construct() {
        $db_dns = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
        try {
            $db_options = [
                PDO::ATTR_EMULATE_PREPARES		=> false
                // DB의 Prepared Statement 기능을 사용하도록 설정
                ,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
                // PDO EXception을 Throws하도록 설정
                ,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC
                // 연상배열로 Fetch를 하도록 설정
            ];
            // PDO Class로 DB 연동
            $this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);

        } catch (Exception $e) {
            echo "DB Connect Error : ".$e->getMessage(); // Exception 메시지 출력
            exit();
        }
    }
    // DB 파기
    public function destroy() {
        $this->conn = null;
    }
    // 트랜잭션 시작
    public function beginTransaction() {
        $this->conn->beginTransaction();
    } 
    // commit
    public function commit() {
        $this->conn->commit();
    }
    // commit
    public function rollBack() {
        $this->conn->rollBack();
    }
}

