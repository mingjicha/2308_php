// ----------------
// 기본 데이터 타입
// ----------------
// 숫자(number)
let num = 1;

// 문자열(string)
let str = "string";

// boolean
let boo = true;

// null
let nu = null;

// undefined
// 선언만 하고 할당을 안 한 상태
let und;

// symbol : 고유한 ID를 가진 데이터 타입
// let symbol_1 = "symbol";
// let symbol_2 = "symbol";
// 안에 값은 같아도 각각의 ID를 부여해주기 때문에 다르다 라고 인식함
let symbol_1 = Symbol("symbol");
let symbol_2 = Symbol("symbol");



// 객체 타입(기본 타입을 제외한 나머지 전부)
// Object
let obj = {
    food1: "탕수육"
    ,food2: "짜장면"
    ,food3: "라조기"
    ,eat: function() {
        console.log("먹자")
    }
    ,list: {
        list1: "리스트1"
        ,list2: "리스트2"
    }
}

// Array
// php 사용 형태와 비슷 
let arr = [1, 2, 3];
// arr.length 하면 3 나옴

// Date
// Math
// 그 외에 기본 데이터 타입을 제외한 모든 것


// 자기자신의 회원정보를 객체로 만들어 보세요.
let info = {
    name: '차민지'
    ,age: '28'
    ,gender: '여'
    ,birth: '1996-09-10'
}