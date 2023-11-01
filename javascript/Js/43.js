// 1. HTTP ( Hypertext Transfer Protocol )란?
//     어떻게 Hypertext를 주고 받을지 규약한 프로토콜로
//     클라이언트가 서버에 데이터를 request(요청)을 하고,
//     서버가 해당 request에 따라 Response(응답)을 클라이언트에 보내주는 방식입니다.
//     Hypertext는 웹사이트에서 이용되는 하이퍼 링크나 리소스, 문서, 이미지 등을 모두 포함합니다.

// 2. AJAX ( Asynchronous JavaScript And XML )이란? 프론트와 백을 연결해주는 역할
//     웹 페이지에서 비동기 방식으로 서버에게 데이터를 Request하고,
//     서버의 Response를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식입니다.
//     즉, 웹 페이지 전체를 다시 로딩하지 않고도 일부분만을 갱신 할 수 있습니다.
//     대표적으로 XMLHttpRequest 방식과 Fetch Api(pure php) 방식이 있습니다.


// 3. JSON ( JavaScript Object Notation )이란? : 규칙을 전해서 서버에 전달
//     JavaScript의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷입니다.
//     장점은 다음과 같습니다.
//      - 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
//      - 가벼운 텍스트를 기반
//      - 가독성이 좋음
//      - Key와 Value가 짝을 이루고 있음
//      - 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
//      - 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

//     JSON.stringify( obj ) : object를 JSON 포맥의 String으로 변환(Serializing)해주는 메소드
//     JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deserializing)해주는 메소드


/*
xml 예시

<xml>
    <data>
        <id>56</id>
        <name>홍길동</name>
    </data>
</xml>
*/

/*
json 예시

{
    data: {
        id: 56
        ,name: '홍길동'
    }
}
*/

// 4. API 예제 사이트
//     https://picsum.photos/

const MY_URL = "https://picsum.photos/v2/list?page=2&limit=5";
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

// fetch(MY_URL)
// .then( response => console.log(response) )
// .catch( error => console.log(error) );

// console에 찍었을 때 status: 200 
// 서버와 통신한다는 뜻
// 200대 정상 처리 
// 300대 통신은 정상인데 서버에서 예외 처리 
// 400대 통신에 문제 (ex 404 not found)
// HTTP 상태 코드 검색 -> http status

// fetch(MY_URL)
// .then( response => response.json() ) // -> 결과가 그 다음 then으로 넘어 감
// .then( data => makeImg(data) )
// .catch( error => console.log(error) );

function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');

    fetch(INPUT_URL.value.trim())
    .then( reponse => {
        if( reponse.status >= 200 && reponse.status < 300 ){
            return reponse.json();
        } else {
            throw new Error('에러에러');
        }
    })
    .then( data => makeImg(data) )
    .catch( error => console.log(error) );
}


function makeImg(data) {
    data.forEach( item => {
        const NEW_IMG = document.createElement('img');
        const DIV_IMG = document.querySelector('#div-img');

        NEW_IMG.setAttribute('src', item.download_url);
        NEW_IMG.style.width = '200px';
        NEW_IMG.style.height = '200px';
        DIV_IMG.appendChild(NEW_IMG);
    });
}

// 지우기 버튼을 눌렀을 때 호출한 img를 지우기
// 자식 요소 삭제
const BTN_DEL = document.querySelector('#btn-del');
BTN_DEL.addEventListener('click', my_delete);

function my_delete() {
    const DIV_IMG = document.querySelector('#div-img');
    DIV_IMG.replaceChildren();
}

// 다른 방법 DIV_IMG.innerHTML = "";


// fetch 2번째 아규먼트
function infinityLoop() {
    let apiUrl = "http://112.222.157.156:6001/03_insert.php"
    let init = {
        method: "POST"
        ,body: {
            title: "아아아아"
            ,content: "오오오오"
            ,em_id: "2"
        }
    }; 
    fetch(apiUrl, init)
    .then( reponse => console.log(reponse) )
    .catch( error => console.log(error) );
}