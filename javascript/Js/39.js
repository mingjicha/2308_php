// 1. DOM ( Document Object Model )이란? - 교재 679page 그림 참조
//  - 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
//  - DOM API를 통해서 HTML의 구조나 내용 또는 스타일 등을 동적으로 조작 가능

// 2. 요소 선택
//  2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title'); // 콘솔에 TITLE 쳐보면? <h1 id="title">DOM 실습</h1>

// 글자색을 바꿀려고 하면 콘솔에다 치면 브라우저에서 바로 바뀜 -> 동적 처리
// TITLE.style.color = 'blue';
// TITLE.style.fontSize = '100px';

TITLE.style.color = 'blue';

const SUB = document.getElementById('subtitle');
// SUB.style.backgroundColor = 'beige';

//  2-2. 태그명으로 요소를 선택 (해당 요소들을 컬랙션 객체로 가져온다.)
const H2 = document.getElementsByTagName('h2'); // HTMLCollection [h2#subtitle, subtitle: h2#subtitle]
H2[0].style.color = 'red';

// 태그명은 복수라 보통은 id를 사용, 여러개를 가져와야할 상황이라면 태그명을 사용 함.

//  2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');

//  2-4. CSS 선택자를 사용해 요소를 찾는 메서드
//      querySelector() : 복수일경우 가장 첫 번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li'); // 젤 위에 있는 <li class="none-li"> 한 개만 가져옴

//      querySelectorAll() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li'); // 모든 걸 가져옴

// 3. 요소 조작
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '탕수육'; // DOM 실습 -> 탕수육

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>트러플리조또</p>'; // <h1>탕수육</h1> -> <p>짬뽕</p>

// setAttribute('','') : 요소에 속성을 추가
const INTXT = document.getElementById('intxt');
// INTXT.setAttribute('placeholder', '여기');
// **몇몇 속성들은 DOM객체에서 바로 설정 가능
// ex) INTXT.placeholder = '바로 접근 가능'; 

// removeAttribute('') : 요소의 속성을 제거
INTXT.removeAttribute('placeholder');

// 4. 요소 스타일링
// style : 인라인으로 스타일 추가
TITLE.style.color = 'orange';

// classList : 클래스로 스타일 추가
// TITLE.classList.add('class1', 'class2', 'class3');
// TITLE.classList.remove('class2','class3');

// 5. 새로운 요소 생성
// 요소 만들기
const LI = document.createElement('li'); // li태그 만들기
// 태그 안에 글 쓰기
LI.innerHTML = "글 썻서요";

// li태그를 삽입할 부모 요소 접근
const UL = document.querySelector('#ul');

// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI); // UL(부모요소)에 LI(자식요소) 마지막 위치에 넣겠다

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('li:nth-child(3)');

UL.insertBefore(LI, SPACE); // (바꿀 것, 바꿀 위치) 테트리스 위에 LI가 올라감

// 요소를 따로따로 별개로 만들어야 여러개가 만들어 짐

// 해당 요소를 지우는 방법
// LI.remove();

// 6. 참조
//  DOM 속성
//      https://developer.mozilla.org/en/docs/Web/API/Element

// Document
//      https://developer.mozilla.org/ko/docs/Web/API/Document    

// ------------실습이지롱
// 1. 사과게임 위에 장기를 넣어주세요.
const LI_J = document.createElement('li'); // 콘솔에 쳐서 위치 확인하기
LI_J.innerHTML = "장기 재미업서요";
const UL_J = document.querySelector('#ul');
const SPACE_J = document.querySelector('li:nth-child(5)') // 마찬가지로 위치 보려면 콘솔에다가 쳐보고 
UL.insertBefore(LI_J, SPACE_J);

// 2. 갈틱폰에 베이지 배경색을 넣어주세요
const GARTIC = document.querySelector('li:nth-child(9)'); // 맨 밑에 있는 거니까 li:last-child로 해도 됨
GARTIC.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색 글씨, 홀수는 파란색 글씨로 만들어주세요.
const EVEN = document.querySelectorAll('li'); 
// console.log(EVEN); // li갯수를 구함 -> 배열로 나와서 length가 9개로 뜸
for(let i = 0; i < EVEN.length; i++) { // 배열 돌려주기 0번부터 시작
    if( i % 2 === 0 ) {
        EVEN[i].style.color = 'blue'; // 홀수
    } else {
        EVEN[i].style.color = 'red'; // 짝수
    }
    // EVEN[i].style.color = i % 2 === 0 ? 'blue' : 'red'; // 한 줄로 이렇게도 가능!
};
