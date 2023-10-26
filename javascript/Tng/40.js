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
HINT.addEventListener('mouseenter', () => {
    alert('두근두근');
});  
// 2-2. 들킨 상태에서는 알러트가 안 나옴(안 들켰으면 계속해서 알러트가 나와야 합니다.)

// 3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
//      "들켰다."
const CORRECT = document.getElementById('correct');
CORRECT.addEventListener('mouseenter', () => {
    alert('들켰다.');
    CORRECT.style.backgroundColor = "beige";
});

// 4. 3번의 상태에서 다시 한 번 더 클릭하면 아래의 알러트를 출력하고, 
//      배경색이 흰색으로 바뀌어 안보이게 됩니다.
//      "다시 숨는다."