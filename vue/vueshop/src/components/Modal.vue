<template>
    <div class="bg_black">
        <div class="bg_white">
            <img :src="data.img" alt="img">
            <h4>{{ data.name }}</h4>
            <p>{{ data.content }}</p>
            <p>{{ data.price }} 원</p>
            <!-- 수량 입력 버튼 -->
            <!-- @change 또는 @input 사용 가능 -->
            <input 
                type="text" 
                v-model="productCnt">
            <p>총 가격 : {{ productCnt * data.price }} 원</p>
            <p>신고수 : {{ data.reportCnt }}</p>
            <button @click="$emit('closeModal')">닫기</button>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Modal',
    // 데이터 바인딩
    data() {
        return {
            // 수량을 정할 수 있는 데이터
            productCnt: 0,
        }
    },
    // watch : data()를 감시하는 함수를 정의하는 영역
    watch: {
        // 함수명은 감시하고 싶은 데이터바인딩명과 동일해야 함
        // 수량 개수 제한
        productCnt(input) {
            if(input > 10) {
                alert('텅장 괜챠나? (｡•́ - •̀｡)');
                this.productCnt = 10;
            } else if(input < 0) {
                alert('이건 아니쥐 ◟(`ﮧ´ ◟ )');
                this.productCnt = 1;
            }
        }
    },
    props: {
        data: Object,
    },
}
</script>
<style>
    
</style>