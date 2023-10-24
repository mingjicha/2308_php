// 조건문
// if(조건) {

// } else if(조건) {

// } else {

// }

// switch(검증할 값) {
//     case 비교값1:
//         // 처리
//         break;
//     case 비교값2:
//         // 처리
//         break;
//     default:
//         // 처리
//         break;
// }

let age = 40;
switch(age) {
    case 20:
        console.log("20대");
        break;
    case 30:
        console.log("30대");
        break;
    default:
        console.log("몰?루");
        break;
}

// -------------------------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
// -------------------------------------------------------------
// for까지는 php랑 똑같음

// foreach : 배열만 사용 가능
// let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key ){
//     console.log(`${key} : ${val}`);
// });

// for...in : 모든 객체를 루프 가능, key에만 접근이 가능
// let obj = {
//     key1: 'val1'
//     ,key2: 'val2'
// }
// for( let key in obj ){
//     console.log(key);
// }

// for...of : 모든 iterable객체를 루프 가능, value에만 접근 가능(String, Array, Map, Set, TypeArray..)
// for( let key of obj ){
//     console.log(val);
// }



// 정렬 해주세요.

let sort_arr = [3, 5, 2, 7, 10];

// 자바스크립트 방법 
// sort_arr.sort(function(a, b){return a-b});
// sort_arr.sort((a, b) => a- b);
// console.log(sort_arr);


// for문 사용
for(let x = 0; x < sort_arr.length; x++ ) { // 배열은 0부터 세니까 0, 1, 2, 3, 4라서 둘이 비교를 하려면 length(count)를 0으로 맞춰서 비교하기
    // x는 배열 전체 도는 것 -> 0번방부터 4번방까지 돈다 (총 5번)
    for(let y = 0; y < sort_arr.length - 1 - x; y++) {
        // y는 안에 값 2개를 비교 하는 것
        if(sort_arr[y] > sort_arr[y + 1]) {
            // 0번(3) > 1번(5) 틀렸으니까 실행 안 되고 그대로 유지
            // 다음 1번(5) > 2번(2) 맞으니까 아래가 실행 됨
            let tamp = sort_arr[y];
            // if가 맞으니까 tmp에 1번(5)가 들어감
            sort_arr[y] = sort_arr[y + 1];
            // 1번(5) 변수에 2번(2) 값을 변경해줌 | 3 2 2 7 10 상태
            sort_arr[y + 1] = tamp;
            // 2번(2) 변수에 tmp(5)를 넣어줌 그러면 결론적으로 3 2 5 7 10 이 됨
        }
    }
}  
console.log(sort_arr);
