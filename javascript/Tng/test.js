// 두 수를 받아서 더한 값을 리턴해주는 함수를 만들어 봅시다.
// function sum(a, b) {
//     return a + b;
// }

// sum(2, 5);


// // 콜백함수 : 
// function sumCallBack(fnc) {
//     fnc();
// }

// sumCallBack(function() {
//     console.log('123');
// }); 

// sumCallBack(() => console.log('123')); // 위랑 같지만 적능 방식만 다름 
// // 화살표 함수는 성능 이슈가 생길 수 있으니 주의

// setTimeout( function() {
//     console.log('123');
// }, 1000);

// [1,2,3].filter(function(num){ // 1, 2, 3을 넣어보고 
//     return num === 3; // 3이면 true
// });

// function myPrint() {
//     console.log('123');
// }

// setTimeout( myPrint, 1000 );


// 함수를 3개 만들어주세요.
// - php를 출력하는 함수
// - 504를 출력하는 함수
// - 풀스택을 출력하는 함수


// 1번 함수는 3초 뒤에 출력
// 2번 함수는 5초 뒤에 출력
// 3번 함수는 바로 출력


// php
function php() {
    console.log('php');
}
setTimeout( php, 3000 );

// 504
function number() {
    console.log('504');
}
setTimeout( number, 5000 );

// 풀스택
function full() {
    console.log('풀스택');
}
full();

// 현재 시간 구해주세요.
let now = new Date();

let year = now.getFullYear();
let month = now.getMonth() + 1
let date = now.getDate();
let hours = now.getHours();
let minutes = now.getMinutes();
let seconds = now.getSeconds();

const FORMAT_TODAY = year + '-' + month + '-' + date + ' ' + hours + ':' + minutes + ':' + seconds; 

console.log(FORMAT_TODAY);

// 버튼을 하나 만듭시다.
// 버튼을 클릭하면 네이버로 이동시켜 주세요.
const BTNNAVER = document.getElementById('btn_naver');
BTNNAVER.addEventListener('click', function(){
    location.href = 'http:\/\/www.naver.com';
});

// function popOpen() {
//     winOpen = open('http:\/\/www.naver.com', '', 'width=500 height=500');
// }

// let winOpen;
// BTNNAVER.addEventListener('click', popOpen);


