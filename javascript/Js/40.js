// 인라인 이벤트
// html 파일에서 9-13line 확인
// 인라인, 잘 안 씀 소스코드가 난잡해지기 때문

// ------------
// 이벤트 생성
// ------------
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

// ------------
// 팝업창 열기
// ------------
function popOpen() {
    winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');
}
const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen); // 소괄호 빼줘야 함 (봉지 뜯어서 주고 안 뜯어서 주고 예시로 생각해보기)

// ------------
// 팝업창 닫기
// ------------
function popClose() {
    winOpen.close();
}
const BTNCLOSE = document.getElementById('btn_close');
BTNCLOSE.addEventListener('click',popClose); // 소괄호 빼줘야 함


// ------------
// 이벤트 삭제
// ------------
// BTNDAUM.removeEventListener('click', popOpen);
// BTNCLOSE.removeEventListener('click', popOpen);

// ------------
// 콜백함수 다시한번 확인
// ------------
// // 'test'를 콘솔에 출력하는 함수
// function test() {
//     console.log("test");
// }

// // 콜백함수를 실행하는 함수
// function cb(fnc) {
//     fnc();
// }

// ------------
// 이벤트 타입

// 1. 마우스 이벤트
// - mousedown - 마우스가 요소안에서 클릭이 눌릴 때
// - mouseup - 마우스가 요소안에서 클릭이 해제될 때
// - mouseenter - 마우스 포인터가 요소 안으로 진입 했을 때
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
    alert('DIV1에 들어왔어요.'); // alert는 div1에 들어가면 팝업 뜸!
    DIV1.style.backgroundColor = "yellow"; // alert 때메 마우스 벗어날 때 팝업창 닫아야 배경 바뀜
});  

// - mouseleave - 마우스 포인터가 요소 밖깥으로 나갔을 때
// - mousemove - 마우스 포인터가 요소 안에서 움직일 때
// - event.clientX, event.clientY - 브라우저 화면 기준 X, Y 좌표
// - event.pageX, event.pageY - 전체화면 기준(스크롤 포함) X, Y좌표
// - event.target.getBoundingClientRect() - 요소의 크기와 뷰포트로 부터 상대적인 위치를 반환

// 2. 키보드 이벤트 // 한영키 누르면 이상하게 나옴 그래서 조금 조심해서 써야 함
// - keydown
// - keypress
// - keyup
// - event.key : 사용자가 누른 키 값을 반환합니다.
// - event.keyCode : 사용자가 누른 키 코드(ASCII) 값을 반환합니다.
// const INTXT = document.getElementById('intxt');
// INTXT.addEventListener('keyup', (e) => console.log(e));

// 3. 포커스 이벤트
// - focus
// - blur
// - change

// 4. 폼 이벤트
// 	- submit : 양식(Form)이 제출하기전에 발생 하는 이벤트 입니다. 주로 전송될 값을 유효성 체크할 때 사용합니다.

// 5. 진행(progress) 이벤트
//	- load
//	- error