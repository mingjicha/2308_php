<!-- vueI 탭치면 자동 생성 -->
<template>
    <!-- 클래스는 css속성 주기위한 discount -->
    <div class="discount">
        <p>롤드컵 우승🏆 기념, {{ discountNum }}% 할인!!</p>
    </div>
</template>
<script>
    export default {
        name: 'Discount',
        data() {
            return {
                discountNum: 30,
                intervalInfo: null,
            }
        },
        // 라이프사이클훅 : mounted단게에서 실행되는 영역
        mounted() {
            // 1초씩 -1
            this.intervalInfo = setInterval(() => {
                this.discountNum--;
            }, 1000);
        },
        updated() {
            // 10%에서 멈춤
            if(this.discountNum === 10) {
                clearInterval(this.intervalInfo);
            }
        },
    }
</script>
<style>
    
</style>