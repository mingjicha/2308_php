// const BTN_DETAIL = document.querySelector('#btnDetail')
// const BTN_MODAL_CLOSE = document.querySelector('#btnModalClose');
// BTN_DETAIL.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.remove('displayNone');
// });
// BTN_MODAL_CLOSE.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.add('displayNone');
// });

// 상세 모달 제어
function openDetail(id) {
    const URL = '/board/detail?id='+id;
    // console.log(URL);
    fetch(URL)
    .then( response => response.json() )
    // .then( response => console.log(response) )
    .then( data => {
        // 요소에 데이터 셋팅
        const TITLE = document.querySelector('#b_title');
        const CONTENT = document.querySelector('#b_content');
        const IMG = document.querySelector('#b_img');
        const CREATED_AT = document.querySelector('#created_at');
        const UPDATE_AT = document.querySelector('#update_at');

        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = data.data.b_content;
        IMG.setAttribute('src', data.data.b_img);
        CREATED_AT.innerHTML = data.data.created_at;
        UPDATE_AT.innerHTML = data.data.update_at;

        // 모달 오픈
        openModal();
    })
    .catch( error => console.log(error) )
}

// 모달 오픈 함수
function openModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.add('show');
    MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수
function closeDetailModal() {
    const MODAL = document.querySelector('#modalDetail');
    MODAL.classList.remove('show');
    MODAL.style = 'display: none;';
}
