<?php
// class 객체 지향을 할 때 사용하는 문법 // 03_105_ex1_classBasic.php 참고
// 사용하는 이유 ? 소스의 재사용을 위해 함수를 만들어서 씀
// 함수만으로는 한계가 있기 때문에 많이 쪼개기도 힘들고 함수는 어디서든 접근할 수 있음 그래서 보안성이 취약함
// 객체 지향은 해당 권한이 있는 사람만 접근 가능, 각각 필요한 걸로만 모아져 있음
// class ClassRoom {  } // 첫글자 대문자, 카멜기법

// 자동차 클래스
// class Car {
//     private $name = "레이";
//     private $comp = "기아";

//     private function move() {
//         echo "전진!\n";
//     }
//     private function stop() {
//         echo "정지!\n";
//     }
//     public function auto(){ // public은 외부에서 접근할 수 있게 따로 만듦
//         echo $this->comp." ".$this->name." ".$this->move();
//     }
// }

// $obj = new Car();
// // $obj->move();
// // private method Car::move() 오류가 뜸 권한이 없어서 클래스 외부에서 사용 할 수 없음 
// $obj->auto();

// // php: exception 검색해서 참고
// new PDO;
// new Exception();
// new DateTime;






class Car {
    protected $name = "레이";
    protected $comp = "기아";

    protected function move() {
        echo "전진!\n";
    }
    protected function stop() {
        echo "정지!\n";
    }
    public function auto(){ // 외부에서 접근할 수 있게 따로 만듦
        echo $this->comp." ".$this->name." ";
        $this->move();
        $this->stop();
    }
}

// php 부모클래스 접근 검색해서 참고
class Kia extends Car { // Kia가 Car를 상속받았기 때문에 부모한테 protected정의된 거한테 접근 가능
    public function __construct($name) {
        $this->name = $name;
        $this->comp = "기아";
    }
}

$obj = new Kia("레이");
$obj->auto();

class toyota extends Car {
    public function __construct($name) {
        $this->name = $name;
        $this->comp = "토요타";
    }
}

$obj = new toyota("토요타");
$obj->auto();
?>