<template>
  <!-- 헤더 -->
  <div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">메일크림쑥마트🎅</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">프래잰또🎁</a>
        </li>
        <!-- 달력 띄우기 -->
        <li class="nav-item">
          <a class="nav-link" href="#">12월 25일🎄</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            울면 선물이 없어요😟
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">🐶 아싸 난 안 울었다</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">🦝 엉엉 나도 받을래</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">🐱 산타 그런거 없어</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="찾을 수 있으면 찾아보··" aria-label="Search">
        <button class="btn btn-outline-dark" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  </div>
  
  <!-- 컨테이너 -->
  <!-- <ContainerComponent></ContainerComponent> -->

  <!-- 더보기 버튼 -->
  <!-- <button 
    @click="$store.dispatch('actionGetBoardItem')"
    v-if="$store.state.flgBtnMoreView && $store.state.flgTabUI === 0">더보기</button> -->
  <!-- 메인 -->
  <router-view/>
  <div class="main">
    <div class="container mt-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card px-5 py-5" id="form1"> 
            <div class="form-data" v-if="!submitted">
              <div class="forms-inputs mb-4" :class="{ 'has-error': emailBlured && !validEmail(email) }"> 
                <span>🍪내가 만든 이름</span> 
                <input autocomplete="off" type="text" v-model="email">
                <div class="invalid-feedback">이름이 틀렸지라</div>
              </div>
              <div class="forms-inputs mb-4" :class="{ 'has-error': passwordBlured && !validPassword(password) }"> 
                <span>🍪내가 만든 비번</span> 
                <input autocomplete="off" type="password" v-model="password">
                <div class="invalid-feedback">비번이 틀렸지라</div>
              </div>
              <div class="mb-3"> 
                <button @click.prevent="submit" class="btn btn-dark w-100">Login</button> 
              </div>
              <div class="success-data">
                <div class="text-center d-flex flex-column"> 
                  <i class='bx bxs-badge-check'></i>
                  <span class="text-center">로그인을❓ 성공했당❗</span> 
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- 푸터 -->
  <div class="footer">

  </div>
</template>

<script>
import ContainerComponent from './ContainerComponent.vue';

export default {
  name: 'AppComponent',
  created() {
    // store의 action 호출
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    // 작성 페이지 이동 및 이미지 관리
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTabUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
    },
    // 글 작성 처리
    addBoard() {
      // 글작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd');
    },
  },
  components: {
    ContainerComponent,
  },
}
</script>

<style>
@import url('/css/common.css');
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;


}
</style>
