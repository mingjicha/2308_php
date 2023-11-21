<!-- 
    🛸컴포넌트 사용법🛸
    1. 컴포넌트 파일을 만들고
    2. 컴포넌트 import 연결하고
    3. 컴포넌트 등록을 하고
    4. html 컴포넌트 사용하기 -->
<!-- ctrl + shift + L 누르면 같은 이름명을 다 선택해줌 -->
<template>
    <div class="nav">
        <!-- <a v-for="item in navList" :key="item" class="nav_a">{{ item }}</a> -->
        <!-- 부모한테 받은 데이터 명 data를 사용해서 넣어주기 -->
        <a v-for="item in data" :key="item" class="nav_a">{{ item }}</a>
    </div>
</template>
<script>
    export default {
        name : 'Header',

        // 부모요소에서 받은 데이터 사용
        // props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
        props: {
            data: Array,
        }
    }
</script>
<style>
    
</style>