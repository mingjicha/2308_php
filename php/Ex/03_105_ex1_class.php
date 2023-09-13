<?php
// class는 동종의 객체들이 모여있는 집합을 정의한 것
class ClassRoom {
    // 멤버 필드 : 멤버 변수와 메소드가 정의되어 있는 장소
    // 접근제어 지시자 : public, private, protected
    // 멤버 변수 : class내에 있는 변수
    public $computer; // 어디에서나 접근 가능
    private $book; // class내에서만 접근 가능
    protected $bag; // class와 나를 상속 받은 자식 class내에서만 접근 가능 

    // 메소드(method) : class내에 있는 함수
    public function classRoomSetValue(){
        $this -> computer = "컴퓨터";
        $this -> book = "책";
        $this -> bag = "가방";
    }
    
    // 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.
    public function ClassRoomPrint(){
        $str = $this -> computer."\n"
               .$this -> book."\n"
               .$this -> bag;
        echo $str;
    }
}

// class instance 생성
$objClassRoom = new ClassRoom(); // 객체들을 사용할 수 있는 상태로 만들어 줌 (실행X)
$objClassRoom -> classRoomSetValue(); // 메소드 호출 그제서야 안에 있는 메소드가 실행
// var_dump($objClassRoom -> computer); // var_dump로 출력
$objClassRoom -> classRoomPrint();