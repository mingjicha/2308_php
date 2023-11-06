<?php
// model은 보통 DB 테이블명으로 따라감

namespace model;

// 경로 없이 적을 경우 보통 자체적으로 있는 php 라이브러리에 있는 클래스들
use PDO; // PDO (PHP Data Objects) 는 여러가지 데이터베이스를 객체지향적으로 제어하는 방법을 표준화 시킨 것
use Exception;

// 객체지향이기 때문에 파일 하나 당 클래스 단위
class ParentsModel { // 파일명과 동일
    // protected : 동일패키지에 속하는 클래스와 하위클래스 관계에서 접근 가능
    protected $conn;

    // 생성자
    // config에 설정해준 DB 관련 설정
    public function __construct() {
        $db_dns = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
        try {
            $db_options = [
                PDO::ATTR_EMULATE_PREPARES		=> false
                // DB의 Prepared Statement(쿼리 준비: 쿼리실행계획 분석과 컴파일이 완료되어서 DBMS의 캐시에 준비되어있는 쿼리를 사용한다는 의미) 기능을 사용하도록 설정
                // https://iksflow.tistory.com/127 prepared statement - 참고
                ,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
                // PDO Exception을 Throws(처리)하도록 설정
                // https://www.ibm.com/docs/ko/db2/11.1?topic=pdo-handling-db2-errors-warning-messages PDO Exception - 참고
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
    // rollBack
    public function rollBack() {
        $this->conn->rollBack();
    }
}

