// 메인에다가 먼저 연결해주기
// npm install vuex@next 설치
import { createStore } from "vuex";
// npm install axios 설치
import axios from "axios";

const store = createStore({
    // state() : data를 저장하는 영역, data()와 똑같다고 생각하면 됨
    state() {
        return {
            // phptest: 'vuex 테스트용 입니다.',
            boardData: [], // 게시글 저장용
            flgTabUI: 0, // 탭 UI용 플래그
            imgURL: '', // 작성탭 표시용 이미지 URL 저장용
            postFileData: null, // 객체로 올거임, 글 작성 파일 데이터 저장용
            lastBoardId: 0, // 가장 마지막 로드된 게시글 번호 저장용
        }
    },

    // mutations : 데이터 수정하는 함수를 저장하는 영역
    // vuex는 데이터를 변경할 수 있는 셋팅용을 세트로 만들어 줘야 함
    mutations: {
        // 초기 데이터 셋팅용
        setBoardList(state, data) { // 첫번째는 state로 넣는게 문법
            state.boardData = data;
            state.lastBoardId = data[data.length - 1].id; // 마지막 게시글 번호 0번방 시작이니까 , 모든 데이터 3개씩 띄우기 위해 length - 1 사용
        },
        // 탭 UI 셋팅용
        setFlgTabUI(state, num) {
            state.flgTabUI = num;
        },
        // 작성탭 표시용 이미지 URL 셋팅용
        setImgURL(state, url) {
            state.imgURL = url;
        },
        // 글 작성 파일 데이터 셋팅용
        setPostFileData(state, file) {
            state.postFileData = file;
        },
        // unshift 위로 올리는 것 push는 아래로 내리는 것
        // 작성된 글 삽입용 unshift
        setUnshiftBoard(state, data) { 
            state.boardData.unshift(data);
        },
        // 작성된 글 삽입용 push
        setPushBoard(state, data) {
            state.boardData.push(data);
            state.lastBoardId = data.id; // push 반복할 때마다 새로운 값을 가져오기, 더보기 눌렀을 때는 1개씩 데려오니까 length - 1 = 0 되니까 사용 안 해도 됨
        },
        // 작성 후 초기화 처리 + 추가적인 초기화 있으면 아래에 더 넣어주면 됨
        setClearAddData(state) {
            state.imgURL = '';
            state.postFileData = null;
        },
    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수 등 비동기 처리를 정의하는 영역
    actions: {
        // 초기 게시글 데이터 획득 ajax 처리
        // node.js 사용하면 무조건 axios 사용
        actionGetBoardList(context) { // 첫번째는 context로 고정 하는게 문법, store에 있는 데이터를 접근할 수 있는 파라미터
            // 포스트맨에서 데이터 사용
            const url = 'http://112.222.157.156:6006/api/boards';
            // header는 기본적으로 객체
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat'
                }
            };
            axios.get(url, header)
            .then(res => {
                // mutations 호출
                // console.log(res.data);
                // console.log(res.status); 200 정상처리
                context.commit('setBoardList', res.data);
            })
            .catch(err => {
                console.log(err);
            })
        },
        // 글 작성 처리(글 한 개를 추가)
        actionPostBoardAdd(context) {
            const url = 'http://112.222.157.156:6006/api/boards';
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                    'Content-Type' : 'multipart/form-data', // 사진파일 옮기는 것
                }
            };
            const data = {
                name: '차민지',
                img: context.state.postFileData,
                content: document.getElementById('content').value,
            };

            axios.post(url, data, header)
            .then(res => {
                // 작성글 데이터 저장 위에 올리기(unshift)
                context.commit('setUnshiftBoard', res.data);

                // 리스트 UI로 전환, 파라미터는 다시 list로 돌아가야 하니까 0으로 설정
                context.commit('setFlgTabUI', 0);

                // 작성 후 초기화 처리
                context.commit('setClearAddData');
            })
            .catch(err => {
                console.log(err);
            });
        },
        // 더보기 처리(글 하나를 더보기)
        actionGetLoadMore(context) {
            const url = 'http://112.222.157.156:6006/api/boards/' + context.state.lastBoardId; // url에 파라미터 값 넣어주기
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                }
            };

            axios.get(url, header)
            .then(res => {
                // 작성글 데이터 저장 아래로 내리기(push)
                if(res.data) {
                    // 화면에 출력해줌
                    context.commit('setPushBoard', res.data);
                } else {
                    // res.data에 데이터가 없을 경우 lastBoardId 초기화로 0 설정 App.vue에서 v-if="$store.state.lastBoardId > 1" 설정해줬으니까 0이라서 더보기는 사라진다
                    context.state.lastBoardId = 0;
                }
                // 데이터가 없을 때 동작을 안 한다면

                // 리스트 UI로 전환, 파라미터는 다시 list로 돌아가야 하니까 0으로 설정
                // context.commit('setFlgTabUI', 0);
                // 더보기는 어차피 0인 상태니까 안 넣어줘도 됨

                // 작성 후 초기화 처리
                // context.commit('setClearAddData');
            })
            .catch(err => {
                console.log(err);
            });
        },
    }
});

// export return이랑 똑같다고 생각하면 됨
export default store;