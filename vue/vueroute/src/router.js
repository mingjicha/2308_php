// router 기본 설정
import { createWebHistory, createRouter } from 'vue-router';
import List from './components/List.vue';
import Add from './components/Add.vue';
import Edit from './components/Edit.vue';

// 컴포넌트 파일 만들어주고,
// import로 불러와주고,
// route 설정해주기
const routes = [
    {
        path: "/",
        // 기본 메인화면을 /list로 표시
        redirect: '/list',
    },
    {
        path: "/list",
        component: List,
    },
    {
        path: "/add",
        component: Add,
    },
    {
        path: "/edit",
        component: Edit,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;