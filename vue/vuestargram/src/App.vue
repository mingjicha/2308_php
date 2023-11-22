<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li 
        class="header-button header-button-left" 
        @click="headerCancle()" 
        v-if="$store.state.flgTabUI !== 0" >취소</li>
      <!-- <li class="header-button header-button-left" @click="$store.commit('setFlgTabUI, 0')">취소</li> -->
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li 
        v-if="$store.state.flgTabUI === 1"
        @click="addBoard()"
        class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- vuex 사용하기 예시 -->
  <!-- <p>{{ $store.state.phptest }}</p> -->

  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <!-- 데이터 없을 경우(마지막 값이 1일 때) 더보기 없애기 : v-if -->
  <button 
    v-if="$store.state.lastBoardId > 1"
    @click="loadMore">더보기</button>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  created() {
    // store의 actions 호출
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    // 작성 페이지 이동 및 이미지 관리
    updateImg(e) {
      const file = e.target.files; // + 버튼으로 업로드한 파일 가져오기
      const imgURL = URL.createObjectURL(file[0]); // URL이라는 객체에 메소드를 넣어주고 업로드를 임시로 저장해놓음
      // 작성 영역에 이미지를 표시하기 위한 셋팅 - imgURL 저장하기 -> store에 imgURL 변수 사용
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장 -> store에 postFileData 변수 사용
      this.$store.commit('setPostFileData', file[0]);
      // (컨테이너 컴포넌트에 포스트 설정)작성 UI 변경을 위한 플래그 수정 -> setFlg = 1 될 때 작성 페이지가 뜸 -> store에 flgTabUI 변수 사용
      this.$store.commit('setFlgTabUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
      // console.log(imgURL);
    },
    // 취소 버튼 숨기기
    headerCancle() { 
      // setFlg = 0 되면 작성 페이지가 사라짐
      this.$store.commit('setFlgTabUI', 0); // store
    },
    // 글 작성 처리
    addBoard() {
      // 글작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd');
    },
    // 더보기 버튼
    loadMore() {
      this.$store.dispatch('actionGetLoadMore'); // dispatch는 action에 있는 것을 불러올 때 사용
    }
  },
  components: {
    ContainerComponent
  },  
}

</script>

<style>
/* common.css 연결 */
/* css 문법으로 import @붙이기 */
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
