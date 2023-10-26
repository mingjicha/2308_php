// 인라인 이벤트
// html 파일에서 9-13line 확인
// 인라인, 잘 안 씀 소스코드가 난잡해지기 때문

// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
    location.href = 'http:\/\/google.com';
};

// addEventListener(eventType, function) // 최신 방식

// () => winOpen.close() 익명 함수이면서 콜백 함수
// function() { 
//    winOpen.close();
// }

// 팝업창으로 열기
function popOpen() {
    winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}
const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen); // 소괄호 빼줘야 함 (봉지 뜯어서 주고 안 뜯어서 주고 예시로 생각해보기)

// 팝업창 닫기
function popClose() {
    winOpen.close();
}
const BTNCLOSE = document.getElementById('btn_close');
BTNCLOSE.addEventListener('click',popClose); // 소괄호 빼줘야 함


// 이벤트 삭제
// BTNDAUM.removeEventListener('click', popOpen);
// BTNCLOSE.removeEventListener('click', popOpen);

// // 'test'를 콘솔에 출력하는 함수
// function test() {
//     console.log("test");
// }

// // 콜백함수를 실행하는 함수
// function cb(fnc) {
//     fnc();
// }



// 키보드 이벤트
// 한영키 누르면 이상하게 나옴 그래서 조금 조심해서 써야 함

// 마우스 이벤트
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
    alert('DIV1에 들어왔어요.'); // alert는 div1에 들어가면 팝업 뜸!
    DIV1.style.backgroundColor = "yellow"; // alert 때메 마우스 벗어날 때 팝업창 닫아야 배경 바뀜
});  


