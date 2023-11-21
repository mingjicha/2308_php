// vue에서 돌아가는 모든 설정을 담고 있는 파일
import { createApp } from 'vue'
import App from './App.vue'
import router from './router.js'

createApp(App)
    .use(router)
    .mount('#app')
