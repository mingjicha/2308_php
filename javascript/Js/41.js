// 타이머 함수

// 1. setTimeout(콜백함수, 시간(단위ms)) : 일정 시간이 흐른 후에 콜백함수를 실행
// setTimeout(() => console.log('시간'), 3000);

// 콘솔에 1초 뒤에 'A', 2초 뒤에 'B', 3초 뒤에 'c'가 출력되도록 프로그램을 만들어주세요.
// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

// 2. clearTimeout(해당 setTimeout객체) : 타이머를 삭제
// let mySet = setTimeout(() => console.log('c'), 5000);
// clearTimeout(mySet);


// 3. setInterval(콜백함수, 시간(ms)) : 일정 시간마다 반복
// setInterval(() => console.log ('민경이 자지마', 1000));

// 4. clearInterval(해당 setInterval) : 인터벌 삭제
let myInter = setInterval(() => console.log ('민경이 자지마', 1000));
clearInterval(myInter);

// 화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.
const APPEAR = document.getElementById('appear');
setTimeout(() => APPEAR.innerHTML = '두둥등장 ㄷㄷㄷㅈ', 5000);

// 정답이애오😁
// 참참참, 공부할 때 먼저 날 것으로 만들어보고 어떻게 쪼갤 수 있을까? 생각 하면서 함수 만들기!

// 1. 태그를 만들고 글씨 나타나게 만들기
// const H1 = document.createElement('h1'); // h1 생성
// H1.innerHTML = '두둥등장!'; // h1에 글 넣기

// 2. body에 접근하기
// document.body.appendChild(H1); // h1 자식으로 넣어주기 -> <h1>두둥등장!</h1>

// 3. 5초 뒤에 나나타기
// setTimeout(() => {
//  const H1 = document.createElement('h1');
//  H1.innerHTML = '두둥등장!';
//  document.body.appendChild(H1); 
// }, 5000);

// 4. 함수 만들기 -> 좀 더 깔끔한 소스코드
// setTimeout(myAddH1, 5000);

// function myADDH1() {
//  const H1 = document.createElement('h1');
//  H1.innerHTML = '두둥등장!';
//  document.body.appendChild(H1); 
// }

// 콜백함수? 익명함수?
