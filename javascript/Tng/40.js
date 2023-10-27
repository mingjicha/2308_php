// 1. 버튼을 클릭 시 아래 내용의 알러트가 나옵니다.
//      "안녕하세요.""
//      "숨어있는 div를 찾아보세요.""
// 1-1. 버튼 생성하기
//      html 28line

// 2. 특정 영역에 마우스 포인트가 진입하면 아래 내용의 알러트가 나옵니다.
//      들킨 상태에서는 알러트가 안 나옵니다.
//      "두근두근"
// 2-1. 특정 영역에 알러트 생성하기
const HINT = document.getElementById('hint');
// HINT.addEventListener('mouseenter', () => {
//     alert('두근두근');
// });  
// 2-2. 들킨 상태에서는 알러트가 안 나옴(안 들켰으면 계속해서 알러트가 나와야 합니다.)

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
//      "들켰다."
const CORRECT = document.getElementById('correct');
// CORRECT.addEventListener('click', () => {
//     alert('들켰다.');
//     CORRECT.style.backgroundColor = "beige";
// });

// 4. 3번의 상태에서 다시 한 번 더 클릭하면 아래의 알러트를 출력하고, 
//      배경색이 흰색으로 바뀌어 안보이게 됩니다.
//      "다시 숨는다."
//     => 1. (2)정답 주변은 두근두근 2. (3)정답을 클릭하면 들켰다 3. (4)정답을 한 번 더 클릭하면 다시 숨는다.

let i = true; // 실행을 위한 true

// 두근두근 알러트 생성 11-14line 참고해서
HINT.addEventListener('mouseenter', div_hint); // 아래 함수를 만족 시키면, ~이렇게
function div_hint() { 
    if(i) { // i가 true라면 -> HINT에 mouseenter가 되는게 실행이 된다면
        alert('헙...두근두긍'); // 이러한 팝업을 띄울 거야 (12-14 line 확인)
    }
}

CORRECT.addEventListener('click', div_correct); // 아래 함수를 만족 시키면, ~이렇게
function div_correct() {
    if(i) { // i가 true라면 -> CORRECT에 click이 되는게 실행이 된다면
        alert('앗! 걸렸당!') // 이러한 팝업을 띄울 거야 (20-24 line 확인)
        CORRECT.style.backgroundColor = "beige"; // 그리고 스타일도 줄 거야
    } else { // i가 true가 아닌 모든 경우는
        alert('다시 수믈게 \nㅎㅎ 수플래 마싯썽') // 팝업을 띄우고
        CORRECT.style.backgroundColor = "white"; // 다시 숨길 거야
    }
    i = !i; // (i를 반전 시킴) i가 true면 flase로 반전시켜서 다시 돌 때 else 안에 있는 걸 출력 시켜주고
            // false로 됐을 경우 i를 반전 시켜서 true로 만들고 다시 실행되면 앗 걸렸당이 뜰 수 있게 함.
}
// 추가로 버튼을 클릭 했을 때 찾기 게임 시작하기
function button

// getEventListeners(확인할 것); 콘솔에서 확인해 볼 수 잇서요

// 또 다른 방법

