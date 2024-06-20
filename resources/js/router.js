import { createRouter, createWebHistory } from 'vue-router';
import AuthenticatedLayout from './layouts/AuthenticatedLayout.vue';

const routes = [
    {
        path: '/',
        component: AuthenticatedLayout,
        children: [
            {
            path: '/posts',
            name: 'Posts',
            component: () => import('@/components/Posts.vue')
            },
            {
            path: '/',
            name: 'Login',
            component: () => import('@/components/Login.vue')
            },
            {
            path: '/signup',
            name: 'SignUp',
            component: () => import('@/components/SignUp.vue')
            },
            {
            path: '/create',
            name: 'CreatePost',
            component: () => import('@/components/CreateAPost.vue')
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;