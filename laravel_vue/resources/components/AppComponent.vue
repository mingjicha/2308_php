<template>
<!-- 헤더 -->
<div class="header">
    <a href="">
        <img class="logo" alt="Sanrio logo" src="../img/sanrio_logo.png">
    </a>
    <div :data="navList"></div> 
        <ul>
            <li>COMPANY</li>
            <li>CHARACTER</li>
            <li>BOARD</li>
            <li>로그인</li>
        </ul>
     
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
        <li><a href="/login">로그인</a></li>
        <li><a href="/board">보드</a></li>
    </ul>
    <!-- 뷰의 라우터 ex) 로그인 페이지 같은 DB에서 받아올 데이터가 없을 때, 탭ui -->
    <router-link to="/login">라우터 로그인</router-link>
    <router-link to="/board">보드 로그인</router-link>
    <router-view></router-view>
</div>
</template>
<script>
// Header.vue 연결
import Header from './Header.vue';

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