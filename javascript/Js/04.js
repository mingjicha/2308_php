// console.log("반갑습니다. js파일입니다.");

// -----------------
// 변수 (var, let, const)
// -----------------
// var : 중복 선언 가능, 재할당 가능(한 번 더 다른 값으로 넣을 수 있다), 함수레벨 스코프
// 중복 선언 가능 
// var u_name = "홍길동";
// console.log(u_name);
// var u_name = "갑순이";
// console.log(u_name);

// 재할당 가능
// var u_name = "홍길동";
// console.log(u_name);
// u_name = "갑순이";
// console.log(u_name)

// let(**보통 사용) : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// 중복 선언 불가능 -> 빨간 줄 뜸
// let u_name = "홍길동";
// console.log(u_name);
// let u_name = "갑순이";
// console.log(u_name);

// coset : 중복 선언 불가능, 재할당 불가능, 블록레벨 스코프 
// 상수는 무조건 대문자로 주기로 했음 개발자끼리의 약속이랄까나 ,,?
const AGE = 19;
// AGE = 20; // 불가능
console.log(AGE)