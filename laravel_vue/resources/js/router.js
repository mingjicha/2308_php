// router 기본 설정
import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
// import Edit from './components/Edit.vue';

// 컴포넌트 파일 만들어주고,
// import로 불러와주고,
// route 설정해주기
const routes = [
    {
        path: "/",
        // 기본 메인화면을 /login로 표시
        redirect: '/login',
    },
    {
        path: "/login",
        component: LoginComponent,
    },
    {
        path: "/board",
        component: BoardComponent,
    },
    // {
    //     path: "/edit",
    //     component: Edit,
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;