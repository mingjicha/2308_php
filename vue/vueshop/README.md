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