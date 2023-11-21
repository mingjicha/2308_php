# vueshop

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).

웹 열기 http://localhost:8080/
서버 열기  npm run serve
열기 전에 node_modules 폴더가 없다면 npm install 부터

-----------------------------------------------------------------------
Install

1. nodejs 설치
	- npm을 이용하기 위해 설치 (각종 웹개발 라이브러기 패키지 매니저)
	- 무조건 최신버전으로 설치할 것
	- 재설치시 제어판에서 삭제 후 재설치

2. 터미널에서 npm으로 아래 실행 (vue 프로젝트를 빠르게 생성해주는 라이브러리 설치)
	npm install -g @vue/cli

3. 터미널에서 아래 실행
	vue create 프로젝트명

-----------------------------------------------------------------------
디렉토리 설명

APP.vue가 메인페이지
웹브라우저는 vue를 해석하지 못합니다.
그러므로 vue를 HTML로 컴파일 작업을 거쳐서 html파일에 작성해줍니다.

node_modules : 프로젝트에 쓰이는 모든 라이브러리
src : 소스코드 모은 곳
public : html파일, 기타파일 보관
package.json : 라이브러리 버전, 프로젝트 설정 등 설정파일

-----------------------------------------------------------------------
데이터 바인딩
	1. 데이터를 data(){ return{ 데이터 } }에 정의
	2. {{데이터}} 로 HTML에 작성

사용 이유
	1. 자주 변경되는 곳은 수정이 편함
	2. 실시간 렌더링기능 쓰려면 데이터 바인딩
		data가 변경되면 data와 관련된 html에 실시간으로 반영
		이러한 사이트를 웹앱이라고 부름

속성도 가능
	속성명 앞에 콜론 붙이고 속성값에 data 삽입
		ex) <h1 :class="classname"></h1>

-----------------------------------------------------------------------
분기문
v-if="1 == 2"
v-else-if
v-else


반복문
	v-for="(val, i) in [반복횟수 || 자료형]" :key="i"

실습
	이거 반복문으로
	products : ['1번원룸', '2번원룸', '3번원룸'],

-----------------------------------------------------------------------
이벤트 핸들러
	@click  ||  v-on:click
	@mouseover
	<button @click="cnt++">허위매물신고</button><span>신고수 : {{cnt}}</span>

js function
	methods: {} 에 함수를 정의
	data에 접근할때는 this로 접근

-----------------------------------------------------------------------

모달창

-----------------------------------------------------------------------
실제 데이터 삽입
import export 문법
image를 동적으로 가져오기위해서는
require("@/assets/room0.jpg") 로 js에서 작성 후 데이터 바인딩해야 합니다.

-----------------------------------------------------------------------
Transition
	애니메이션 효과를 주는 문법

사용 방법
	아래를 스타일에 정의
		등장 애니메이션
			.클레스명-enter-from { 시작스타일 }
			.클레스명-enter-active { transition }
			.클레스명-enter-to { 끝 스타일}
		퇴장 애니메이션
			.클레스명-leave-from { 시작스타일 }
			.클레스명-leave-active { transition }
			.클레스명-leave-to { 끝 스타일}

기타
	조건부로 class명을 추가 하고 싶을 때,
	:class="{ 클레스명 : 조건}" 객체를 넣으면 조건이 true일때만 동작

-----------------------------------------------------------------------
컴포넌트
	HTML 짜다보면 <div> 수도없이 생성됩니다.
	그래서 컴포넌트라는 문법을 이용하여, 원하는 HTML 덩어리를 한 글자로 축약할 수 있습니다.

컴포넌트 사용법
	1. vue파일 만들기
	2. 만든 vue 파일을 import
	3. components: {} 에 등록
	4. <뷰파일명/> 으로 사용

**
package.json
	"rules": {
	"vue/multi-word-component-names": "off"
	} 

컴포넌트 쓰는 이유
	1. div가 너무 많아져서 보기 싫을 때
	2. 재사용성을 위해
	3. 페이지를 구분할 때 (1페이지 1컴포넌트)

단점
	데이터 관리가 복잡해 집니다.
	꼭 필요한 것만 만드는 것이 좋을 수도 있습니다.

-----------------------------------------------------------------------
props
	상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰고 싶을 때 사용하는 문법

사용방법
	1. 부모 컴포넌트에서 데이터 보내기
		<ConteinerComponet :보낼 데이터명="보낼 데이터" />
	2. 자식 컴포넌트에서 등록
		props: {
			보낸 데이터명: 데이터 타입,
		},
	3. 사용하기

주의사항
	Props는 read only이므로 수정하면 안됩니다.

하위 컴포넌트에 데이터를 안만드는 이유
	1. 상위 컴포넌트에서 절대 안쓰는 데이터라고 확신이 있으면 만들어도 상관은 없음
	2. 하지만 데이터를 만들때는 최상위 컴포넌트에 데이터를 생성해야 한다는 원칙이 있음
		2-1. 이유는 데이터를 상위로 전송하는 것은 복잡하고 추적이 어렵기 때문

-----------------------------------------------------------------------
v-model
	사용자의 input을 받아 데이터를 저장하는 문법
	@input="month = $event.target.value"를 짧게 쓸 수 있는 문법
	 <input> 태그말고도 <textarea> <select> 이런 것들에도 전부 적용 가능

주의사항
	사용자가 <input>에 적은건 무조건 문자열
	directive를 이용하여 v-model.number="month"처럼 적으면 숫자로 저장

-----------------------------------------------------------------------
Watcher
	data를 감시하는 함수
	사용자의 input을 받는 곳은 필수 적으로 사용

사용방법
	1. watch: {} 오브젝트 생성
	2. watch에 데이터명으로 함수 생성
		2-1. ex: month(input, [before])

기타
	Vue 용 form validation 라이브러리를 사용할 수 도 있음

-----------------------------------------------------------------------
lifecycle
	1. 컴포넌트를 보여줄 때 create -> mount 단계로 생성
		create는 데이터생성, mount는 index.html에 작성
	2. update 단계는 데이터가 바뀌어서 컴포넌트가 재렌더링되는 단계
	3. unmount 단계는 다른페이지로 이동하거나 종료 등등 컴포넌트가 삭제되는 단계

lifecycle hook
	필요한 시점에 따라 아래 함수를 이용
		beforeCreate() {}
		created() {}
		beforeMount() {}
		mounted() {}
		beforeUpdate() {}
		updated() {}
		beforeUnmount() {}
		unmounted() {}

vue 라이프사이플 다이어그램
	https://ko.vuejs.org/guide/essentials/lifecycle.html
-----------------------------------------------------------------------