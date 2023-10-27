// 1. 현재 시간을 화면에 표시
// const NOW = new Date();
// NOW.toLocaleTimeString();
const TIME = document.getElementById('time'); // TIME 생성

function getNow() {
    const DATE = new Date(); // 날짜와 시간을 얻기 위해 DATE 객체 호출
    TIME.innerHTML = '현재 시각 '+ DATE.toLocaleTimeString();  // TIME.innerHTML = NOW.tolocaleTimeString();
    // 시간을 HTML로 띄워줌, toLocaleTimeString은 현재 지역 표기법으로 변환하여 가져옴
} // 함수만 주면 화면에 보이지 않음 -> 밖에서 호출 해줘야 함 getNow();
// ** 시간 가져오는 다른 방법 공부

// 2. 실시간으로 시간을 화면에 표시 -> 1초마다 반복하기
// getNow(); // 아래만 해주면 1초 뒤에 화면이 뜸 -> getNow();하면 시작부터 화면에 떠있음
// let interval = setInterval(getNow, 1000); // 너무 날코딩이라 31 line 수정해주기
let interval;
startTime();

// 3. 멈춰 버튼을 누르면, 시간이 정지
const BTNSTOP = document.getElementById('btn-stop');

BTNSTOP.addEventListener('click', stopTime);

function stopTime() {
    clearInterval(interval);
}

// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const BTNRESTART = document.getElementById('btn-restart');

BTNRESTART.addEventListener('click', startTime);

function startTime() {
    getNow();
    interval = setInterval(getNow, 1000); // 14 line 호출
}