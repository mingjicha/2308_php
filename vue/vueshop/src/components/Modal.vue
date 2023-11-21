<template>
    <div class="bg_black">
        <div class="bg_white">
            <img :src="data.img" alt="img">
            <h4>상품명 : {{ data.name }}</h4>
            <p>상품 설명 : {{ data.content }}</p>
            <p>가격 : {{ data.price }} 원</p>
            <p>신고수 : {{ data.reportCnt }}</p>
            <button @click="$emit('closeModal')">닫기</button>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Modal',

    props: {
        data: Object,
    }
}
</script>
<style>
    
</style>