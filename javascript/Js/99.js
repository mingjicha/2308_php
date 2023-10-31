// const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";

const BTN_API = document.querySelector('#btn-api'); // 호출버튼에 id값 btn-api 생성
BTN_API.addEventListener('click', my_fetch); // 호출버튼 클릭 시 my_fetch 실행

function my_fetch() { // my_fetch란?
    const INPUT_URL = document.querySelector('#input-url'); // text입력값 input_url 생성
    
    // fetch-then-catch -> https://triplexblog.kr/79 참고하기
    fetch(INPUT_URL.value.trim()) // input에 들어가는 값을 공백없이 받아주겠다.
    .then( reponse => { // json으로 작업 결과 확인
        if( reponse.status >= 200 && reponse.status < 300 ){ 
            return reponse.json();
        } else {
            throw new Error('에러에러');
        }
    })
    .then( data => makeImg(data) ) // 성공
    .catch( error => console.log(error) ); // 실패
}

function makeImg(data) { // 데이터에서 불러오고 이미지를 보여주기 위한 함수
    data.forEach( item => { // 데이터를 배열로 가져올 것
        const NEW_IMG = document.createElement('img'); // img 생성
        const NEW_ID = document.createElement('div'); // div 생성
        const NEW_DIV = document.createElement('div-section'); // div-section 생성
        const DIV_IMG = document.querySelector('#div-img'); // #div-img 선택

        NEW_ID.innerHTML = item.id; // img에 id값을 html로 출력

        NEW_IMG.setAttribute('src', item.download_url); // 속성 설정 -> src 주소
        NEW_IMG.style.width = '200px'; // img 크기 설정
        NEW_IMG.style.height = '200px'; // img 크기 설정
        NEW_DIV.style.backgroundColor = '#888888'; // img 배경색 설정
        NEW_DIV.style.padding = '10px'; // img 간격
        NEW_DIV.appendChild(NEW_ID); // NEW_ID('div')를 NEW_DIV('div-section')의 자식으로 설정
        NEW_DIV.appendChild(NEW_IMG); // NEW_IMG('img')를 NEW_DIV('div-section')의 자식으로 설정
        DIV_IMG.appendChild(NEW_DIV); // NEW_DIV('div-section')을 DIV_IMG('#div-img')의 자식으로 설정
    });
}

// 지우기 버튼을 눌렀을 때
const BTN_DEL = document.querySelector('#btn-del');
BTN_DEL.addEventListener('click', my_delete);

function my_delete() {
    const DIV_IMG = document.querySelector('#div-img');
    DIV_IMG.replaceChildren();
}