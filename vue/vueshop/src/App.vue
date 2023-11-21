<template>
  <img alt="T1 logo" src="./assets/img/tilogo.png">

<!-- 헤더 -->
<!-- 자식 Header.vue에 데이터 보내기 -->
<Header :data="navList"></Header>
<img alt="Faker" src="./assets/img/opgg_faker.png" class="faker">
  <!-- <div class="nav">
    <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a>
    
     반복문
    <a v-for="item in navList" :key="item" class="nav_a">{{ item }}</a>
    <a v-for="(item, i) in navList" :key="i">{{ i + ' : ' + item }}</a>
  </div> -->

<!-- 할인 배너 -->
<!-- html에서 한번에 열고 닫기 -->
<Discount/> 
<!-- 컴포넌트로 이관
<div class="discount">
  <p>지금 당장 구매하시면, 30% 할인</p>
</div> -->

  <!-- 모달 -->
  <!-- 애니메이션 넣기 위한 태그 transition -->
  <transition name="modalAni">
    <!-- if문 사용하기 -->
    <Modal 
      v-if = "modalFlg"
      :data = "modalProduct"
      @closeModal = "modalClose" 
    ></Modal>
    <!-- 컴포넌트로 이관 -->
    <!-- <div class="bg_black" v-if="modalFlg" >
      <div class="bg_white">
        <img :src="modalProduct.img" alt="img">
        <h4>상품명 : {{ modalProduct.name }}</h4>
        <p>상품 설명 : {{ modalProduct.content }}</p>
        <p>가격 : {{ modalProduct.price }} 원</p>
        <p>신고수 : {{ modalProduct.reportCnt }}</p> -->
        <!-- <button @click="modalFlg = false">닫기</button> -->
        <!-- 함수를 만들어서 사용 -->
        <!-- <button @click="modalClose()">닫기</button>
      </div>
    </div> -->
  </transition>

  <!-- 상품 리스트 -->
  <div>
    <!-- for문 사용하기 -->
    <ProductList
      v-for = "(item, i) in products" :key="i"
      :data = "item"
      :productKey = "i"
      @fncReport = "plusOne" 
      @fncOpenModal = "modalOpen" 
    ></ProductList>
      <!-- <div>
        style은 속성 앞에다가 콜론 넣고 우리가 데이터 바인딩에 만들어둔 명을 쓰면 됨
        <h4 :style="sty_color_red">{{ products[0] }}</h4>
        컨텐츠 영역은 중괄호를 사용해서 쓰면 됨
        <p>{{ prices[0] }} 원</p> 
      </div>
      <div>
        <h4>{{ products[1] }}</h4>
        <p>{{ prices[1] }} 원</p>
      </div>
      <div>
        <h4>{{ products[2] }}</h4>
        <p>{{ prices[2] }} 원</p>
      </div> -->

      <!-- <div v-for="(item, i) in products" :key="item">
        <h4 :style="sty_color_blue" @click="modalFlg = true; modalProduct=item;">{{ item.name }}</h4>
        <h4 @click="modalFlg = true; modalProduct=item;">{{ item.name }}</h4>
        <p>{{ item.price }} 원</p>
        <button @click="plusOne(i)">허위 매물 신고</button>
        <button @mouseover="item.reportCnt++">허위 매물 신고</button>
        <span> 신고수 : {{ item.reportCnt }}</span>
      </div> -->
  </div>
</template>


<script>
// 자바스크립트 연결
import data from './assets/js/data.js';
// Discount.vue 연결
import Discount from './components/Discount.vue';
// Header.vue 연결
import Header from './components/Header.vue';
// Modal.vue 연결
import Modal from './components/Modal.vue';
// ProductList.vue 연결
import ProductList from './components/ProductList.vue';

export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간, 데이터 값이 변하면 자동으로 리로딩 해줌
  data() {
    return{
      navList: ['홈', '상품', '기타', '문의'],
      // sty_color_blue: 'color: blue',
      // products: ['모자', '티', '바지'],
      // prices: ['1,500', '50,000', '24,000'],
      // products: [
      //   {name: 'T1 Logo Ball Cap - Black', content: '우리 티원 믿고 있었다!!', price: '33,000', reportCnt: 0, img: require('./assets/img/00.jpg')},
      //   {name: '2023 T1 Uniform Worlds Jacket - Black', content: '제오페구케 드디어!!', price: '149,000', reportCnt: 0, img: require('./assets/img/01.jpg')},
      //   {name: '2023 T1 Uniform Worlds Pants', content: '멋지다 진짜루!!', price: '89,000', reportCnt: 0, img: require('./assets/img/02.jpg')},
      // ],

      // products의 data는 data.js에 설정함
      products: data,
      modalFlg: false,
      modalProduct: {}
    }
  },

  // methods() : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct = item;
    },
    modalClose() {
      this.modalFlg = false;
    }
  },
  
  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount, 
    Header, 
    Modal, 
    ProductList,
  },
}

</script>

<style>
#app { 
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css파일 불러오기 */
@import url('./assets/css/common.css');

/* css 파일로 이관 
.nav{
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
