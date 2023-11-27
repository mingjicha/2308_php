<template>
<!-- 헤더 -->
<div class="header">
    <!-- 산리오 로고 -->
    <h1 class="logo">
        <a href="#">
            <!-- http://localhost:8000/login -->
            <img class="logo" alt="Sanrio logo" src="../img/sanrio_logo.png">
        </a>
    </h1>   
    <!-- 네비 -->
    <div class="nav_main">
        <ul>
            <li><a href="#">COMPANY</a></li>
            <li><a href="#">CHARACTER</a></li>
            <li><a href="#">BOARD</a></li>
            <li><a href="#">LOGIN</a></li>
        </ul>
    </div> 
</div>
<!-- 콘텐트 -->
<div class="content">
    <!-- 부농색 화면 -->
    <div class="main_content">
        <div class="main_tablet">
            <div class="tablet">
                <img src="../img/main_tablet.png" alt="main tablet">
            </div>
        </div>
    </div>
    <!-- CHARACTER 정보 -->
    <div class="charater_content">

    </div>
</div>
<div>
    <h1>APP VUE 컴포넌트!!!!</h1>
    <h2>{{ $store.state.testStr }}</h2>
    <!-- 서버에서 데이터 받아오기 -->
    <h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
    <h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
    <!-- 라라벨의 라우터 백앤드에서(php) DB에서 데이터 받아올 때 -->
    <ul>
        <li><a href="/">루트</a> </li>
        <li><a href="/home">홈</a></li>
        <li><a href="/login">로그인</a></li>
        <li><a href="/board">보드</a></li>
    </ul>
    <!-- 뷰의 라우터 ex) 로그인 페이지 같은 DB에서 받아올 데이터가 없을 때, 탭ui -->
    <router-link to="/home">홈</router-link>
    <router-link to="/login">라우터 로그인</router-link>
    <router-link to="/board">보드 로그인</router-link>
    <router-view></router-view>
</div>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    },
}
</script>
<style>

</style>