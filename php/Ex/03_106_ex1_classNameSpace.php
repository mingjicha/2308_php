<?php

// namespace : 클래스를 구분해주기 위해 설정, 보통은 해당 파일의 패스로 작성
namespace up;

class Class1{
    public function __construct(){
        echo "upClass";
    }
}

namespace down;

class Class1{
    public function __construct(){
        echo "upClass";
    }
}

// Class1 두가지 중에서 어떤 Class1를 부를지 지정해주는 \n\
// $objClass1 = new \up\Class1();

namespace test;

use \up\class1;

$objClass1 = new Class1();